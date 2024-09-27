        <div class="navigasi">
            <!-- <div class="mainmenu mt-2 collapse" id="menuNav"> -->
            <ul class="list-unstyled">
                <li><a href="/" class="btn btn-dongker">Home</a></li>
                <li>
                    <a href="#menuTiketing" class="btn btn-dongker" data-bs-toggle="collapse">E Tiketing &#11206;</a>
                    <ul class="list-unstyled collapse ps-3" id="menuTiketing">
                        @if (empty(Auth::user()->prov) ||
                                Auth::user()->level == '0' ||
                                Auth::user()->prov == 'pusat' ||
                                Auth::user()->username == '198505062004121001')
                            <li><a href="{{ route('ticketing.view-revisi-pusat') }}"
                                    class="btn btn-sm btn-primary btn-pills my-1">Pengajuan Revisi Pusat</a></li>
                            <li><a href="{{ route('usulan.kegiatan') }}"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Usulan kegiatan</a></li>
                        @endif

                        @if (!empty(Auth::user()->prov) || Auth::user()->level == '0' || Auth::user()->username == '198505062004121001')
                            <li>
                                <a href="#menuRevda" class="btn btn-sm btn-primary btn-pills mb-1"
                                    data-bs-toggle="collapse">Pengajuan Revisi Daerah &#11206;</a>
                                <ul class="list-unstyled collapse ps-3" id="menuRevda">
                                    <li><a href="{{ route('ticketing.revisi-gwpp') }}"
                                            class="btn btn-sm btn-warning btn-pills mb-1">Revisi kegiatan GWPP</a></li>
                                    <li><a href="{{ route('ticketing.view-sarpras-daerah') }}"
                                            class="btn btn-sm btn-warning btn-pills mb-1">Revisi kegiatan Sarpras</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#" class="btn btn-sm btn-primary btn-pills mb-1">Quality Surveyor</a>
                            </li>
                        @endif
                    </ul>
                </li>

                @if (empty(Auth::user()->prov) || Auth::user()->username == '198505062004121001')
                    @if (Auth::user()->level == 0 ||
                            Auth::user()->level == 1 ||
                            Auth::user()->level == 5 ||
                            Auth::user()->level == 6 ||
                            Auth::user()->username == '198505062004121001')
                        <li><a href="{{ route('pok.terbit-pok') }}" class="btn btn-dongker">Penerbitan POK</a></li>
                    @endif
                @endif

                @if (Auth::user()->level == 0 ||
                        Auth::user()->level == 5 ||
                        Auth::user()->level == 2 ||
                        Auth::user()->level == 3 ||
                        Auth::user()->level == 27 ||
                        Auth::user()->username == '198505062004121001')
                    <li>
                        <a href="#menuCapaiOut" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Output
                            &#11206;</a>
                        <ul class="list-unstyled collapse ps-3" id="menuCapaiOut">
                            @if (empty(Auth::user()->prov))
                                <li>
                                    <a href="#menuCapaiPus" class="btn btn-sm btn-primary btn-pills my-1"
                                        data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
                                    <ul class="list-unstyled collapse ps-3" id="menuCapaiPus">
                                        <li><a href="{{ route('capaian.capaian-output') }}/ki"
                                                class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
                                        <li><a href="{{ route('capaian.capaian-output') }}/ro"
                                                class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
                                    </ul>
                                </li>
                            @endif
                            <li>
                                <a href="#menuCapaiDa" class="btn btn-sm btn-primary btn-pills mb-1"
                                    data-bs-toggle="collapse">Capaian Daerah &#11206;</a>
                                <ul class="list-unstyled collapse ps-3" id="menuCapaiDa">
                                    <li><a href="{{ route('capaian.capaian-output-daerah') }}"
                                            class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
                                    <li><a href="{{ route('capaian.capaian-output-daerah') }}"
                                            class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif

                <li>
                    <a href="#menuCapaiKin" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Kinerja
                        &#11206;</a>
                    <ul class="list-unstyled collapse ps-3" id="menuCapaiKin">
                        <li>
                            <a href="#menuCapaiKiPus" class="btn btn-sm btn-primary btn-pills my-1"
                                data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
                            <ul class="list-unstyled collapse ps-3" id="menuCapaiKiPus">
                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKP</a></li>
                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKK</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#menuCapaiKiDa" class="btn btn-sm btn-primary btn-pills mb-1"
                                data-bs-toggle="collapse">Capaian Daerah &#11206;</a>
                            <ul class="list-unstyled collapse ps-3" id="menuCapaiKiDa">
                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKK</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                @if (Auth::user()->level == 0 || Auth::user()->username == '198505062004121001')
                    <li><a href="#menuMaster" class="btn btn-dongker" data-bs-toggle="collapse">Master &#11206</a>
                        <ul class="list-unstyled collapse ps-3" id="menuMaster">
                            <li><a href="{{ route('capaian.capaian-output') }}/tc"
                                    class="btn btn-sm btn-warning btn-pills mb-1">Target Capaian</a></li>
                            <li><a href="{{ route('capaian.capaian-setting') }}"
                                    class="btn btn-sm btn-warning btn-pills mb-1">Setting Capaian</a></li>
                            <li>
                                <a href="#menuImport" class="btn btn-sm btn-primary btn-pills mb-1"
                                    data-bs-toggle="collapse">Import Sakti&#11206;</a>
                                <ul class="list-unstyled collapse ps-3" id="menuImport">
                                    <li><a href="{{ route('capaian.import-sakti') }}/ag"
                                            class="btn btn-sm btn-warning btn-pills mb-1">Anggaran</a></li>
                                    <li><a href="{{ route('capaian.import-sakti') }}/as"
                                            class="btn btn-sm btn-warning btn-pills mb-1">Anggaran Eselon 1</a></li>
                                    <li><a href="{{ route('capaian.import-sakti') }}/rg"
                                            class="btn btn-sm btn-warning btn-pills mb-1">Realisasi</a></li>
                                    <li><a href="{{ route('capaian.import-sakti') }}/rs"
                                            class="btn btn-sm btn-warning btn-pills mb-1">Realisasi Eselon 1</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('master.history-pagu') }}" class="btn btn-dongker"
                            class="btn btn-dongker">Riwayat Pagu</a></li>
                @endif

                @if (Auth::user()->level == 0 || Auth::user()->username == '198505062004121001')
                    <li><a href="" class="btn btn-dongker">Angket</a></li>
                @endif

                @if (Auth::user()->level == '0' || Auth::user()->username == '198505062004121001')
                    <li><a href="{{ route('tes.index') }}" class="btn btn-dongker">Realisasi Anggaran</a></li>
                    <li><a href="{{ route('importes1.index') }}" class="btn btn-dongker">Import Eselon 1</a></li>
                    {{-- <ul class="list-unstyled collapse ps-3" id="menuRealisasi">
							<li>
								<a href="" class="btn btn-sm btn-primary btn-pills my-1">Realisasi Pusat</a>
							</li>
							<li>
								<a href="" class="btn btn-sm btn-primary btn-pills mb-1">Realisasi Dekon </a>
							</li>
                            <li>
								<a href="" class="btn btn-sm btn-primary btn-pills mb-1">Realisasi TP</a>
							</li>
						</ul> --}}
                    </li>
                @endif

                @if (Auth::user()->level == '0' || Auth::user()->username == '198505062004121001')
                    <li>
                        <a href="#menuAplikasi" class="btn btn-dongker" data-bs-toggle="collapse">ERD &#11206;</a>
                        <ul class="list-unstyled collapse ps-3" id="menuAplikasi">
                            <li>
                                <a href="" class="btn btn-sm btn-primary btn-pills mb-1">Integrasi SAKTI</a>
                            </li>
                            <li>
                                <a href="https://sipgwpp.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">SIP GWPP</a>
                            </li>
                            <li>
                                <a href="https://simlinmas.kemendagri.go.id/management/login"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Simlinmas</a>
                            </li>
                            <li>
                                <a href="https://siapkk.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">SIAPKK</a>
                            </li>
                            <li>
                                <a href="https://sidamkar.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">SiDamkar</a>
                            </li>
                            <li>
                                <a href="https://sarina.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Sarina</a>
                            </li>
                            <li>
                                <a href="https://payroll-adwil.kemendagri.go.id/login"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Payroll</a>
                            </li>
                            <li>
                                <a href="https://ikm-adwil.kemendagri.go.id/login"
                                    class="btn btn-sm btn-primary btn-pills mb-1">IKM</a>
                            </li>
                            <li>
                                <a href="https://jf-polpp.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">JFPolPP</a>
                            </li>
                            <li>
                                <a href="https://kodewilayah.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Kode Wilayah</a>
                            </li>
                            <li>
                                <a href="https://profilpulau.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Pulau</a>
                            </li>
                            <li>
                                <a href="https://spm.bangda.kemendagri.go.id/2021/home"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Trantibumlinmas</a>
                            </li>
                            <li>
                                <a href="https://emonev-dpmptsp.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">DPMPTSP</a>
                            </li>
                            <li>
                                <a href="https://puu-adwil.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">PUU</a>
                            </li>
                            <li>
                                <a href="https://siratu.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Siratu</a>
                            </li>
                            <li>
                                <a href="https://pagarspmbencana.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Pagar SPM Bencana</a>
                            </li>
                            <li>
                                <a href="https://satpolpp.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">SimpolPP</a>
                            </li>
                            <li>
                                <a href="https://ditjenbinaadwil.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Ditjen Bina Adwil</a>
                            </li>
                            <li>
                                <a href="https://cloud-adwil.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Cloud keuangan</a>
                            </li>
                            <li>
                                <a href="https://index-suburusanbencana.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Index Bencana</a>
                            </li>
                            <li>
                                <a href="https://simpeg-adwil.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Simpeg Adwil</a>
                            </li>
                            <li>
                                <a href="https://registrasi-sidamkar.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Registrasi Sidamkar</a>
                            </li>
                            <li>
                                <a href="https://pertanahan.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Pertanahan</a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li><a href="{{ route('profile') }}" class="btn btn-dongker">Profile</a></li>
                <li>
                    <a class="btn btn-dongker" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            <!-- </div> -->
        </div>
