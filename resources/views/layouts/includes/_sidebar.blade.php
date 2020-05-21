<div class="left side-menu">
      <div class="slimscroll-menu" id="remove-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                  <!-- Left Menu Start -->
                  <ul class="metismenu" id="side-menu">

                        @role('admin')

                        <li class="menu-title">Main</li>
                        <li>
                              <a href="{{route('admin')}}" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span>
                              </a>
                        </li>
                        <li>
                              <a href="{{route('daftar_absensi.index')}}" class="waves-effect">
                                    <i class="mdi mdi-calendar"></i> <span> Daftar Absensi Kehadiran </span>
                              </a>
                        </li>
                        <li>
                              <a href="{{route('jadwal_pelajaran.index')}}" class="waves-effect">
                                    <i class="mdi mdi-calendar-clock"></i> <span> Jadwal Pelajaran </span>
                              </a>
                        </li>
                        <li>
                              <a href="{{route('jadwal_piket.index')}}" class="waves-effect">
                                    <i class="mdi mdi-calendar-multiple-check"></i> <span> Jadwal Piket </span>
                              </a>
                        </li>
                        <li>
                              <a href="{{route('berkas.index')}}" class="waves-effect">
                                    <i class="mdi mdi-archive"></i> <span> Berkas </span>
                              </a>
                        </li>

                        <li class="menu-title">Manajement</li>

                        <li>
                              <a href="{{route('user_setting.index')}}" class="waves-effect">
                                    <i class="mdi mdi-account-multiple"></i> <span> Users </span>
                              </a>
                        </li>
                        <li>
                              <a href="{{route('siswa.index')}}" class="waves-effect">
                                    <i class="mdi mdi-account-multiple"></i> <span> Siswa </span>
                              </a>
                        </li>
                        <li>
                              <a href="{{route('guru.index')}}" class="waves-effect">
                                    <i class="mdi mdi-account-network"></i> <span> Guru </span>
                              </a>
                        </li>

                        <li>
                              <a href="{{route('mata_pelajaran.index')}}" class="waves-effect">
                                    <i class="mdi mdi-book-minus"></i> <span> Mata Pelajaran </span>
                              </a>
                        </li>

                        @endrole

                        @role('siswa')
                        <li class="menu-title">Main</li>
                        <li>
                              <a href="{{route('siswa')}}" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span>
                              </a>
                        </li>
                        <li>
                              <a href="{{route('absensi.index')}}" class="waves-effect">
                                    <i class="mdi mdi-account-check"></i> <span> Absensi Kehadiran </span>
                              </a>
                        </li>
                        <li>
                              <a href="{{route('list_guru')}}" class="waves-effect">
                                    <i class="mdi mdi-account-network"></i> <span> Guru </span>
                              </a>
                        </li>
                        <li>
                              <a href="{{route('jadwal_pelajaran')}}" class="waves-effect">
                                    <i class="mdi mdi-calendar-clock"></i> <span> Jadwal Pelajaran </span>
                              </a>
                        </li>
                        <li>
                              <a href="{{route('jadwal_piket')}}" class="waves-effect">
                                    <i class="mdi mdi-clock"></i> <span> Jadwal Piket </span>
                              </a>
                        </li>
                        <li>
                              <a href="{{route('mata_pelajaran')}}" class="waves-effect">
                                    <i class="mdi mdi-book-minus"></i> <span> Mata Pelajaran </span>
                              </a>
                        </li>
                        <li>
                              <a href="{{route('berkas')}}" class="waves-effect">
                                    <i class="mdi mdi-archive"></i> <span> Berkas </span>
                              </a>
                        </li>
                        @endrole

                  </ul>

            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

      </div>
      <!-- Sidebar -left -->

</div>
