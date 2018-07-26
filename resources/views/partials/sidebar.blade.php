<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            {{--<!-- User profile image -->--}}
            {{--<div class="profile-img"> <img src="{{ asset("assets/images/users/profile.png") }}" alt="user" />--}}
                {{--<!-- this is blinking heartbit-->--}}
                {{--<div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>--}}
            {{--</div>--}}
            {{--<!-- User profile text-->--}}
            <div class="profile-text">
                <h5>Hello, {{ Auth::user()->name }}</h5>
                {{--<a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>--}}
                {{--<a href="app-email.html" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>--}}
                {{--<a href="{{ url('/logout') }}"--}}
                   {{--onclick="event.preventDefault();--}}
                                    {{--document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>--}}
                {{--<form id="logout-form"--}}
                      {{--action="{{ url('/logout') }}"--}}
                      {{--method="POST"--}}
                      {{--style="display: none;">--}}
                    {{--{{ csrf_field() }}--}}
                {{--</form>--}}
                <div class="dropdown-menu animated flipInY">
                    <!-- text-->
                    {{--<a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<!-- text-->--}}
                    {{--<a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>--}}
                    {{--<!-- text-->--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<!-- text-->--}}
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                    <form id="logout-form"
                          action="{{ url('/logout') }}"
                          method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <!-- text-->
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                {{--<li class="nav-devider"></li>--}}
                <li class="nav-small-cap">NAVIGASI</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="{{ url('') }}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Dashboard</span></a>

                </li>
                @if(Auth::user()->role == 'admin'|| Auth::user()->role == 'unit')
                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Kategori</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('category') }}">Data Kategori</a></li>
                        <li><a href="{{ url('category/create') }}">Tambah Kategori</a></li>
                    </ul>
                </li>
                @endif
                @if(Auth::user()->role == 'admin'|| Auth::user()->role == 'unit')
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open"></i><span class="hide-menu">Prodi</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('program') }}">Data Prodi</a></li>
                        <li><a href="{{ url('program/create') }}">Tambah Prodi</a></li>
                    </ul>
                </li>
                @endif
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Master Barang</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('stuff') }}">Master Barang</a></li>
                        <li><a href="{{ url('stuff/create') }}">Tambah Master Barang</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Barang</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('item') }}">Detail Barang</a></li>
                        <li><a href="{{ url('item/create') }}">Tambah Barang</a></li>
                    </ul>
                </li>

                @if(Auth::user()->role == 'admin')
                <li class="nav-small-cap">TRANSAKSI & PENGGUNA</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Pengguna</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('users') }}">Data Pengguna</a></li>
                        <li><a href="{{ url('users/create') }}">Tambah Pengguna</a></li>
                    </ul>
                </li>
                @endif
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Perbaikan</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('repair') }}">Data Perbaikan</a></li>
                        <li><a href="{{ url('repair/create') }}">Tambah Perbaikan</a></li>
                        <li><a href="{{ url('repairback') }}">Pengembalian Perbaikan</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
