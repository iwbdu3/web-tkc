<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    @auth

        {{-- <div style="padding: 10px; color:red;">
            Role aktif: {{ implode(', ', Auth::user()->getRoleNames()->toArray()) }}
        </div> --}}

        <!-- Dashboard bisa untuk semua role -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
                </svg>
                {{ __('Dashboard') }}
            </a>
        </li>

        {{-- Admin Only --}}
        @role('admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg>
                    {{ __('Users') }}
                </a>
            </li>
        @endrole

        {{-- Panitia dan Admin --}}
        @role('panitia|admin')
            <!-- Dropdown Menu Ujian -->
            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-library') }}"></use>
                    </svg>
                    {{ __('Ujian') }}
                </a>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jadwal-ujian.index') }}">
                            <span class="nav-icon" style="font-size: 20px; color: #adb5bd;">›</span>
                            {{ __('Jadwal Ujian') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('peserta.index') }}">
                            <span class="nav-icon" style="font-size: 20px; color: #adb5bd;">›</span>
                            {{ __('Pendaftaran') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hasil_ujian.index') }}">
                            <span class="nav-icon" style="font-size: 20px; color: #adb5bd;">›</span>
                            {{ __('Hasil Ujian') }}
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        {{-- Penguji --}}
        @role('admin|penguji')
            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-library') }}"></use>
                    </svg>
                    {{ __('Penilaian') }}
                </a>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('penilaian.index') }}">
                            <span class="nav-icon" style="font-size: 20px; color: #adb5bd;">›</span>
                            {{ __('Input Nilai') }}
                        </a>

                    </li>
                </ul>
            </li>
        @endrole

        {{-- Peserta --}}
        @role('peserta')

            <!-- Dropdown Menu Ujian -->
            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-library') }}"></use>
                    </svg>
                    {{ __('Ujian') }}
                </a>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('daftar_ujian.index') }}">
                            <span class="nav-icon" style="font-size: 20px; color: #adb5bd;">›</span>
                            {{ __('Daftar Ujian') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hasil_ujian.index') }}">
                            <span class="nav-icon" style="font-size: 20px; color: #adb5bd;">›</span>
                            {{ __('Hasil Ujian') }}
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

    @endauth
</ul>
