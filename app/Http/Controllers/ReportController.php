<?php

namespace App\Http\Controllers;

use App\Item;
use App\Repair;
use App\Stuff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Fpdf;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function judul(\Codedge\Fpdf\Fpdf\Fpdf $fpdf, $teks1, $teks2, $teks3, $teks4, $teks5)
    {
        $fpdf->Cell(20);
        $fpdf->SetFont("Times", "B", "12");
        $fpdf->Cell(0, 5, $teks1, 0, 1, "C");
        $fpdf->Cell(20);
        $fpdf->Cell(0, 5, $teks2, 0, 1, "C");
        $fpdf->Cell(20);
        $fpdf->SetFont("Times", "B", "15");
        $fpdf->Cell(0, 5, $teks3, 0, 1, "C");
        $fpdf->Cell(20);
        $fpdf->SetFont("Times", "I", "8");
        $fpdf->Cell(0, 5, $teks4, 0, 1, "C");
        $fpdf->Cell(20);
        $fpdf->Cell(0, 2, $teks5, 0, 1, "C");
    }

    function garis(\Codedge\Fpdf\Fpdf\Fpdf $fpdf)
    {
        $fpdf->SetLineWidth(1);
        $fpdf->Line(10, 36, 138, 36);
        $fpdf->SetLineWidth(0);
        $fpdf->Line(10, 37, 138, 37);
    }

    function letak(\Codedge\Fpdf\Fpdf\Fpdf $fpdf, $gambar)
    {
        $fpdf->Image($gambar, 10, 10, 20, 20);
    }

    public function ttd(\Codedge\Fpdf\Fpdf\Fpdf $fpdf)
    {
        $fpdf->SetY(-60);
        $fpdf->SetFont("Times", "B", "8");
        $fpdf->Cell(0, 5,  "Madiun, ". Carbon::today('Asia/Jakarta')->format('d F Y'), 0, 1, "R");
        $fpdf->Cell(122, 5, "Mengetahui", 0, 1, "R");
        $fpdf->Cell(127, 3, "Ketua Unit Inventaris", 0, 1, "R");
        $fpdf->SetFont("Times", "U", "8");
        $fpdf->Cell(0, 15, "", 0, 1, "C");
        $fpdf->SetFont("Times", "BU", "8");
        $fpdf->Cell(127, 3, "Andi Rahman Putera", 0, 1, "R");
        $fpdf->Cell(0, 0, "", 0, 1, "C");
        $fpdf->SetFont("Times", "", "8");
        $fpdf->Cell(125.5, 3, "NIDN: 0711048701", 0, 1, "R");

        $fpdf->Footer();
    }

    public function generateReportItems()
    {
        $user = Auth::user();
        $items_unit = Item::all();

        $items_prodi = Item::join('stuffs', 'stuffs.id', 'items.stuff_id')->where('stuffs.program_id', '=', $user->program_id)->addSelect('stuffs.name', 'items.id', 'items.quantity', 'items.location', 'items.condition_id')->get();
        $header = array('Nama', 'Lokasi', 'Kondisi', 'Jumlah');
        $fpdf = new \Codedge\Fpdf\Fpdf\Fpdf();
        $fpdf->AddPage("P", "A5");
        $fpdf->SetFont('Courier', 'B', 18);
        $this->letak($fpdf, "img/unipma.png");
        $this->judul($fpdf, "Laporan Data Inventaris", "Fakultas Teknik", "UNIVERSITAS PGRI MADIUN", "Jl. Auri No. 6 Madiun, Jawa Timur, Indonesia", "Telp: 0351-462986 Email: rektorat@unipma.ac.id");
        $this->garis($fpdf);
        $fpdf->Cell(1000, 10, "", null);
        $fpdf->Ln();
        if ($user->role == 'admin' || $user->role == 'unit') {
            $this->FancyTableItems($fpdf, $header, $items_unit);
        } else {
            $this->FancyTableItemsProdi($fpdf, $header, $items_prodi);
        }
        $this->ttd($fpdf);
        $fpdf->Output();
    }

    public function generateReportRepairs()
    {
        $user = Auth::user();
        $repairs_unit = Repair::all();

        $repairs_prodi = Repair::join('items', 'items.id', '=', 'repairs.item_id')->join('stuffs', 'stuffs.id', '=', 'items.stuff_id')->join('conditions', 'conditions.id', '=', 'items.condition_id')->where('stuffs.program_id', '=', $user->program_id)->addSelect('stuffs.name','items.id', 'repairs.quantity', 'items.location', 'conditions.name as condition', 'repairs.created_at')->get();
        $header = array('Nama', 'Kondisi', 'Jumlah', 'Tanggal');
        $fpdf = new \Codedge\Fpdf\Fpdf\Fpdf();
        $fpdf->AddPage("P", "A5");
        $fpdf->SetFont('Courier', 'B', 18);
        $this->letak($fpdf, "img/unipma.png");
        $this->judul($fpdf, "Laporan Data Inventaris", "Fakultas Teknik", "UNIVERSITAS PGRI MADIUN", "Jl. Auri No. 6 Madiun, Jawa Timur, Indonesia", "Telp: 0351-462986 Email: rektorat@unipma.ac.id");
        $this->garis($fpdf);
        $fpdf->Cell(1000, 10, "", null);
        $fpdf->Ln();
        if ($user->role == 'admin' || $user->role == 'unit') {
            $this->FancyTableRepairs($fpdf, $header, $repairs_unit);
        } else {
            $this->FancyTableRepairsProdi($fpdf, $header, $repairs_prodi);
        }
        $this->ttd($fpdf);
        $fpdf->Output();
    }

    // Colored table
    public function FancyTableItems(\Codedge\Fpdf\Fpdf\Fpdf $fpdf, $header, $data)
    {
        // Colors, line width and bold font
        $fpdf->SetFillColor(230, 242, 242);
//        $fpdf->SetTextColor(0, 0, 0);
//        $fpdf->SetDrawColor(0,0,0);
        $fpdf->SetLineWidth(.3);
        $fpdf->SetFont('', 'B');
        // Header
        $w = array(50, 32, 26, 18);
        for ($i = 0; $i < count($header); $i++)
            $fpdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $fpdf->Ln();
        // Color and font restoration
//        $fpdf->SetFillColor(230,242,255);
        $fpdf->SetTextColor(0);
        $fpdf->SetFont('');
        // Data
        $fill = false;
        foreach ($data as $row) {
//            dd($row->stuff_id);
            $fpdf->Cell($w[0], 6, $row->stuff->name . ' - ' . $row->stuff->program->name, 'LR', 0, 'L', $fill);
            $fpdf->Cell($w[1], 6, $row->location, 'LR', 0, 'L', $fill);
            $fpdf->Cell($w[2], 6, $row->condition->name, 'LR', 0, 'R', $fill);
            $fpdf->Cell($w[3], 6, $row->quantity, 'LR', 0, 'R', $fill);
            $fpdf->Ln();
            $fill = !$fill;
        }
        // Closing line
        $fpdf->Cell(array_sum($w), 0, '', 'T');
    }

    // Colored table
    public function FancyTableStuffs(\Codedge\Fpdf\Fpdf\Fpdf $fpdf, $header, $data)
    {
        // Colors, line width and bold font
        $fpdf->SetFillColor(230, 242, 242);
//        $fpdf->SetTextColor(0, 0, 0);
//        $fpdf->SetDrawColor(0,0,0);
        $fpdf->SetLineWidth(.3);
        $fpdf->SetFont('', 'B');
        // Header
        $w = array(50, 32, 28, 20);
        for ($i = 0; $i < count($header); $i++)
            $fpdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $fpdf->Ln();
        // Color and font restoration
//        $fpdf->SetFillColor(230,242,255);
        $fpdf->SetTextColor(0);
        $fpdf->SetFont('');
        // Data
        $fill = false;
        foreach ($data as $row) {
//            dd($row->stuff_id);
            $fpdf->Cell($w[0], 6, $row->name, 'LR', 0, 'L', $fill);
            $fpdf->Cell($w[1], 6, $row->category->name, 'LR', 0, 'L', $fill);
            $fpdf->Cell($w[2], 6, $row->program->name, 'LR', 0, 'R', $fill);
            $fpdf->Cell($w[3], 6, $row->quantity, 'LR', 0, 'R', $fill);
            $fpdf->Ln();
            $fill = !$fill;
        }
        // Closing line
        $fpdf->Cell(array_sum($w), 0, '', 'T');
    }


    public function generateReportStuffs()
    {
        $user = Auth::user();
        if ($user->role == 'admin' || $user->role == 'unit') {
            $stuffs = Stuff::all();
        } else {
            $stuffs = Stuff::where('program_id', '=', $user->program_id)->get();
        }
        $header = array('Nama', 'Kategori', 'Prodi', 'Jumlah');
        $fpdf = new \Codedge\Fpdf\Fpdf\Fpdf();
        $fpdf->AddPage("P", "A5");
        $fpdf->SetFont('Courier', 'B', 18);
        $this->letak($fpdf, "img/unipma.png");
        $this->judul($fpdf, "Laporan Data Inventaris", "Fakultas Teknik", "UNIVERSITAS PGRI MADIUN", "Jl. Auri No. 6 Madiun, Jawa Timur, Indonesia", "Telp: 0351-462986 Email: rektorat@unipma.ac.id");
        $this->garis($fpdf);
        $fpdf->Cell(1000, 10, "", null);
        $fpdf->Ln();
        $this->FancyTableStuffs($fpdf, $header, $stuffs);
        $this->ttd($fpdf);

        $fpdf->Output();
    }

    // Colored table
    public function FancyTableItemsProdi(\Codedge\Fpdf\Fpdf\Fpdf $fpdf, $header, $data)
    {
        // Colors, line width and bold font
        $fpdf->SetFillColor(230, 242, 242);
//        $fpdf->SetTextColor(0, 0, 0);
//        $fpdf->SetDrawColor(0,0,0);
        $fpdf->SetLineWidth(.3);
        $fpdf->SetFont('', 'B');
        // Header
        $w = array(50, 32, 28, 20);
        for ($i = 0; $i < count($header); $i++)
            $fpdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $fpdf->Ln();
        // Color and font restoration
//        $fpdf->SetFillColor(230,242,255);
        $fpdf->SetTextColor(0);
        $fpdf->SetFont('');
        // Data
        $fill = false;
        foreach ($data as $row) {
//            dd($row->stuff_id);
            $fpdf->Cell($w[0], 6, $row->name, 'LR', 0, 'L', $fill);
            $fpdf->Cell($w[1], 6, $row->location, 'LR', 0, 'L', $fill);
            $fpdf->Cell($w[2], 6, $row->condition->name, 'LR', 0, 'R', $fill);
            $fpdf->Cell($w[3], 6, $row->quantity, 'LR', 0, 'R', $fill);
            $fpdf->Ln();
            $fill = !$fill;
        }
        // Closing line

        $fpdf->Cell(array_sum($w), 0, '', 'T');
    }

    // Colored table
    public function FancyTableRepairs(\Codedge\Fpdf\Fpdf\Fpdf $fpdf, $header, $data)
    {
        // Colors, line width and bold font
        $fpdf->SetFillColor(230, 242, 242);
//        $fpdf->SetTextColor(0, 0, 0);
//        $fpdf->SetDrawColor(0,0,0);
        $fpdf->SetLineWidth(.3);
        $fpdf->SetFont('', 'B');
        // Header
        $w = array(50, 32, 28, 20);
        for ($i = 0; $i < count($header); $i++)
            $fpdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $fpdf->Ln();
        // Color and font restoration
//        $fpdf->SetFillColor(230,242,255);
        $fpdf->SetTextColor(0);
        $fpdf->SetFont('');
        // Data
        $fill = false;
        foreach ($data as $row) {
//            dd($row->stuff_id);
            $fpdf->Cell($w[0], 6, $row->item->stuff->name, 'LR', 0, 'L', $fill);
            $fpdf->Cell($w[1], 6, $row->condition->name, 'LR', 0, 'L', $fill);
            $fpdf->Cell($w[2], 6, $row->quantity, 'LR', 0, 'R', $fill);
            $fpdf->Cell($w[3], 6, $row->created_at, 'LR', 0, 'R', $fill);
            $fpdf->Ln();
            $fill = !$fill;
        }
        // Closing line
        $fpdf->Cell(array_sum($w), 0, '', 'T');
    }

    // Colored table
    public function FancyTableRepairsProdi(\Codedge\Fpdf\Fpdf\Fpdf $fpdf, $header, $data)
    {
        // Colors, line width and bold font
        $fpdf->SetFillColor(230, 242, 242);
//        $fpdf->SetTextColor(0, 0, 0);
//        $fpdf->SetDrawColor(0,0,0);
        $fpdf->SetLineWidth(.3);
        $fpdf->SetFont('', 'B');
        // Header
        $w = array(50, 32, 28, 20);
        for ($i = 0; $i < count($header); $i++)
            $fpdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $fpdf->Ln();
        // Color and font restoration
//        $fpdf->SetFillColor(230,242,255);
        $fpdf->SetTextColor(0);
        $fpdf->SetFont('');
        // Data
        $fill = false;
        foreach ($data as $row) {
//            dd($row->stuff_id);
            $fpdf->Cell($w[0], 6, $row->name, 'LR', 0, 'L', $fill);
            $fpdf->Cell($w[1], 6, $row->condition, 'LR', 0, 'L', $fill);
            $fpdf->Cell($w[2], 6, $row->quantity, 'LR', 0, 'R', $fill);
            $fpdf->Cell($w[3], 6, $row->created_at, 'LR', 0, 'R', $fill);
            $fpdf->Ln();
            $fill = !$fill;
        }
        // Closing line
        $fpdf->Cell(array_sum($w), 0, '', 'T');
    }


}


