<div class="mainmenu mt-2" id="menuNav">
    <ul class="list-unstyled">
        <li>
            <a href="/" class="btn btn-dongker">Home</a>
        </li>
<!-- 
        <li class="nav-item ">
            <ul class="nav nav-treeview">
                @if(empty(Auth::user()->prov) || Auth::user()->level == "0" || Auth::user()->prov == "pusat" || Auth::user()->username == "198505062004121001")
                <li class="nav-item">
                    <a href="{{route('ticketing.view-revisi-pusat')}}" class="nav-link @if($current == "Pengajuan Revisi Pusat") active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pengajuan Revisi Pusat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('usulan.kegiatan')}}" class="nav-link @if($current == "Usulan Kegiatan") active @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Usulan Kegiatan
                        </p>
                    </a>
                </li>
                @endif
                @if(!empty(Auth::user()->prov) || Auth::user()->level == "0"  || Auth::user()->username == "198505062004121001")
                    <li class="nav-item @if($current == "Kegiatan GWPP" || $current == "Sarana & Prasarana") menu-open @endif">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pengajuan Revisi Daerah</p>
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link @if($current == "Kegiatan GWPP") active @endif">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Revisi Kegiatan GWPP</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link @if($current == "Sarana & Prasarana") active @endif">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Revisi Kegiatan Sarpras</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </li> -->

        <li>
            <a href="#menuTiketing" class="btn btn-dongker @if($modul == "E-Ticketing") show @endif" data-bs-toggle="collapse">E Tiketing &#11206;</a>
            <ul class="list-unstyled @if($modul == "E-Ticketing") show @else collapse @endif" ps-3" id="menuTiketing">
                <li><a href="#" class="btn btn-sm btn-primary btn-pills my-1">Pengajuan Revisi Pusat</a></li>
                <li><a href="#" class="btn btn-sm btn-primary btn-pills mb-1">Usulan kegiatan</a></li>
                <li>
                    <a href="#menuRevda" class="btn btn-sm btn-primary btn-pills mb-1 @if($kegiatan == "GWPP" || $kegiatan == "SARPRAS") show @endif" data-bs-toggle="collapse" aria-expanded="@if($kegiatan == "GWPP" || $kegiatan == "SARPRAS") true @endif">Pengajuan Revisi Daerah &#11206;</a>
                    <ul class="list-unstyled @if($kegiatan == "GWPP" || $kegiatan == "SARPRAS") show @else collapse @endif ps-3" id="menuRevda">
                        <li><a href="{{route('ticketing.revisi-gwpp')}}" class="btn btn-sm btn-warning btn-pills mb-1 @if($kegiatan == "GWPP") active @endif">Revisi kegiatan Dekonsentrasi</a></li>
                        <li><a href="{{route('ticketing.view-sarpras-daerah')}}" class="btn btn-sm btn-warning btn-pills mb-1 @if($kegiatan == "SARPRAS") active @endif">Revisi kegiatan Tugas Pembantuan</a></li>
                    </ul>
                </li>
                <li><a href="#" class="btn btn-sm btn-primary btn-pills mb-1">Quality Surveyor</a></li>
            </ul>
        </li>

        @php
        /*
        - Penerbitan POK untuk user:
        - pusat (prov = 0)
        - Level -> 0, 1, 5, 6
        - username 198505062004121001
        */
        @endphp

        @if(empty(Auth::user()->prov)  || Auth::user()->username == "198505062004121001")
            @if(Auth::user()->level == 0 || Auth::user()->level == 1 || Auth::user()->level == 5 || Auth::user()->level == 6  || Auth::user()->username == "198505062004121001")
            <li><a href="{{route('pok.terbit-pok')}}" class="btn btn-dongker">Penerbitan POK</a></li>
            @endif
        @endif

        @php
        /*
        - Capaian Output untuk user:
        - Level -> 0, 2, 3, 5
        - username 198505062004121001
        */
        @endphp

        @if(Auth::user()->level == 0 || Auth::user()->level == 5 || Auth::user()->level == 2 || Auth::user()->level == 3  || Auth::user()->username == "198505062004121001")
        <li>
            <a href="#menuCapaiOut" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Output &#11206;</a>
            <ul class="list-unstyled collapse ps-3" id="menuCapaiOut">
                @if(empty(Auth::user()->prov))
                <li>
                    <a href="#menuCapaiPus" class="btn btn-sm btn-primary btn-pills my-1" data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
                    <ul class="list-unstyled collapse ps-3" id="menuCapaiPus">
                        <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
                        <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="#menuCapaiDa" class="btn btn-sm btn-primary btn-pills mb-1" data-bs-toggle="collapse">Capaian Daerah &#11206;</a>
                    <ul class="list-unstyled collapse ps-3" id="menuCapaiDa">
                        <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
                        <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        @endif

        <li>
            <a href="#menuCapaiKin" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Kinerja &#11206;</a>
            <ul class="list-unstyled collapse ps-3" id="menuCapaiKin">
                <li>
                    <a href="#menuCapaiKiPus" class="btn btn-sm btn-primary btn-pills my-1" data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
                    <ul class="list-unstyled collapse ps-3" id="menuCapaiKiPus">
                        <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKP</a></li>
                        <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKK</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#menuCapaiKiDa" class="btn btn-sm btn-primary btn-pills mb-1" data-bs-toggle="collapse">Capaian Daerah &#11206;</a>
                    <ul class="list-unstyled collapse ps-3" id="menuCapaiKiDa">
                        <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKK</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        
        @php
        /*
        Modul master untuk user:
        - level -> 0
        - username 198505062004121001
        */
        @endphp

        @if(Auth::user()->level == 0  || Auth::user()->username == "198505062004121001")
        <li>
            <a href="#menuMaster" class="btn btn-dongker" data-bs-toggle="collapse">Master</a>
            <ul class="list-unstyled collapse ps-3" id="menuMaster">
                <li>
                    <a href="{{route('master.data-subdit')}}" class="btn btn-dongker">Data Subdit</a>
                </li>
                <li>
                    <a href="{{route('master.satuan-kerja')}}" class="btn btn-dongker">Satuan Kerja</a>
                </li>
                <li>
                    <a href="{{route('master.satker-eselon-1')}}" class="btn btn-dongker">Satker Eselon 1</a>
                </li>
                <li>
                    <a href="{{route('master.view-users')}}" class="btn btn-dongker">Data Pengguna</a>
                </li>
                <li>
                    <a href="{{route('master.users-request')}}" class="btn btn-dongker">Pengajuan Pengguna</a>
                </li>
                <li>
                    <a href="{{route('master.subkomponen-pusat')}}" class="btn btn-dongker">Kode Subkomponen Pusat</a>
                </li>
                <li>
                    <a href="{{route('master.subkomponen-dekon')}}" class="btn btn-dongker">Kode Subkomponen Dekon</a>
                </li>
                <li>
                    <a href="{{route('capaian.target-capaian-output')}}" class="btn btn-dongker">Target Capaian</a>
                </li>
                
            </ul>
        </li>
        @endif

        <li>
            <a href="{{route('master.history-pagu')}}" class="btn btn-dongker">Riwayat Pagu</a>
        </li>

        @php
        /*
        SIP GWPP untuk user:
        - provinsi
        - level -> 0
        - username 198505062004121001
        */
        @endphp

        @if(is_numeric(Auth::user()->prov) || Auth::user()->level == "0"  || Auth::user()->username == "198505062004121001")
        <li>
            <a href="https://sipgwpp.kemendagri.go.id/" target="_blank" class="btn btn-dongker">SIP GWPP</a>
        </li>
        @endif

        @php
        /*
        Integrasi SAKTI untuk user
        - level -> 0
        - username 198505062004121001
        */
        @endphp

        @if(Auth::user()->level == "0"  || Auth::user()->username == "198505062004121001")
        <li>
            <a href="#menuSakti" class="btn btn-dongker" data-bs-toggle="collapse">Integrasi SAKTI</a>
            <ul class="list-unstyled collapse ps-3" id="menuSakti">
                <li>
                    <a href="{{route('sakti.data-anggaran')}}" class="btn btn-dongker">Data Anggaran</a>
                </li>
                <li>
                    <a href="{{route('sakti.data-realisasi')}}" class="btn btn-dongker">Data Realisasi</a>
                </li>
            </ul>
        </li>
        @endif
      
        {{-- <li>
            <a class="btn btn-dongker" href="javascript:void(0)" onclick="changePassword('{{Auth::user()->username}}')">Ubah Password</a>
        </li>

        <li>
            <a href="{{route('profile')}}" class="btn btn-dongker">Profile</a>
        </li>

        <li>
            <a class="btn btn-dongker" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </li> --}}
    </ul>
</div>
