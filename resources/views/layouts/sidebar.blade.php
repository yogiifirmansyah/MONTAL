<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{url('index')}}" class="logo logo-dark">
            <span class="logo-sm">
                {{-- <img src="{{ URL::asset('/assets/images/logo-sm.png') }}" alt="" height="22"> --}}
                Montal
            </span>
            <span class="logo-lg">
                {{-- <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="20"> --}}
                Montal
            </span>
        </a>

        <a href="{{url('index')}}" class="logo logo-light">
            <span class="logo-sm">
                {{-- <img src="{{ URL::asset('/assets/images/logo-sm.png') }}" alt="" height="22"> --}}
                Montal
            </span>
            <span class="logo-lg">
                {{-- <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="" height="20"> --}}
                Montal
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">@lang('translation.Menu')</li>

                @if(auth()->user()->role == 2)
                <!-- Admin Sidebar -->
                <li>
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="dripicons-home"></i><span class="badge rounded-pill bg-primary float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/variabel') }}">
                        <i class="dripicons-article"></i>
                        <span>Variabel</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/indikator') }}">
                        <i class="dripicons-checklist"></i>
                        <span>Indikator</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/wali-kelas') }}">
                        <i class="dripicons-user"></i>
                        <span>Wali Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/kelas') }}">
                        <i class="dripicons-store"></i>
                        <span>Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/siswa') }}">
                        <i class="dripicons-user-group"></i>
                        <span>Siswa</span>
                    </a>
                </li>

                @elseif (auth()->user()->role == 1)
                <li>
                    <a href="{{ url('dashboard-walikelas') }}">
                        <i class="dripicons-home"></i><span class="badge rounded-pill bg-primary float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/bimbingan-fisik') }}">
                        <i class="dripicons-lifting"></i>
                        <span>Bimbingan Fisik</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/bimbingan-mental') }}">
                        <i class="dripicons-heart"></i>
                        <span>Bimbingan Mental</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/bimbingan-sosial') }}">
                        <i class="bx bxs-group"></i>
                        <span>Bimbingan Sosial</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/kemandirian-emosional') }}">
                        <i class="bx bx-angry"></i>
                        <span>Kemandirian Emosional</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/kemandirian-perilaku') }}">
                        <i class="bx bx-street-view"></i>
                        <span>Kemandirian Perilaku</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/kemandirian-nilai') }}">
                        <i class="bx bx-list-check"></i>
                        <span>Kemandirian Nilai</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('dashboard') }}">
                        <i class="dripicons-home"></i><span class="badge rounded-pill bg-primary float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->