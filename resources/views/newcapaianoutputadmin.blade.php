<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    </head>
    <body>
        @php 
            $persen_realisasi = $realisasi/$anggaran*100;
            $persen_selisih = $selisih/$anggaran*100;
            $persen_pagu_pusat      = $pagu_pusat/$anggaran*100;
            $persen_realisasi_pusat = $realisasi_pusat/$pagu_pusat*100;
            $persen_sisa_pusat      = $sisa_pusat/$pagu_pusat*100;
            if($pagu_dekon === 0)
            {
                $persen_pagu_dekon      = 0;
                $persen_realisasi_dekon = 0;
                $persen_sisa_dekon      = 0;
            }
            else
            {
                $persen_pagu_dekon      = $pagu_dekon/$anggaran*100;
                $persen_realisasi_dekon = $realisasi_dekon/$pagu_dekon*100;
                $persen_sisa_dekon      = $sisa_dekon/$pagu_dekon*100;
            }

            if($pagu_tp <> 0)
            {
                $persen_pagu_tp      = $pagu_tp/$anggaran*100;
                $persen_realisasi_tp = $realisasi_tp/$pagu_tp*100;
                $persen_sisa_tp      = $sisa_tp/$pagu_tp*100;
            }
            else
            {
                $persen_pagu_tp      = 0;
                $persen_realisasi_tp = 0;
                $persen_sisa_tp      = 100;
            }

            $persen_rm_pusat        = $rm_pusat/$pagu_pusat*100;
            $persen_realisasi_rm    = $realisasi_pusat/$rm_pusat*100;
            $persen_sisa_rm         = $sisa_rm_pusat/$rm_pusat*100;

            $realisasi_rm_pusat     = $realisasi_pusat-$realisasi_phln;
            $sisa_rm_pusat          = $rm_pusat-$realisasi_rm_pusat;

            $persen_sisa_rm         = ($sisa_rm_pusat/$rm_pusat)*100;
            $persen_realisasi_rm    = 100-$persen_sisa_rm;

            $persen_pagu_phln       = $phln_pusat/$pagu_pusat*100;
            $persen_realisasi_phln  = $realisasi_phln/$phln_pusat*100;
            $persen_sisa_phln       = (($phln_pusat-$realisasi_phln)/$phln_pusat)*100;
        @endphp
        <!-- {{ $real_eselon1 }} -->
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-12 d-flex logo-admin align-items-center">
                    <img src="{{asset('newdashboard/images/logo-emonev.png')}}" alt="logo emonev" class="img-fluid margin-auto logo-smaller">
                    <div class="text-center">
                        <h1 class="title">E-MONEV</h1>
                        <h2 class="subtitle">DITJEN BINA ADMINISTRASI KEWILAYAHAN</h2>
                    </div>
                </div>
                <div class="position-relative">
                    <div class="usermenu">
                        <div class="avatar d-flex align-items-center">
                            <a href="#menuNav" data-bs-toggle="collapse"><img src="{{asset('newdashboard/images/user-avatar.png')}}" alt="" class="img-fluid avatar-img me-2"></a>
                            <div class="avatar-name small fw-bold">
                                Selamat Datang Admin,<br>
                                Bagian Perencanaan
                            </div>
                        </div>
                        <div class="mainmenu mt-2 collapse" id="menuNav">
                            <ul class="list-unstyled">
                                <li><a href="#" class="btn btn-dongker">Home</a></li>
                                <li>
                                    <a href="#menuTiketing" class="btn btn-dongker" data-bs-toggle="collapse">E Tiketing &#11206;</a>
                                    <ul class="list-unstyled collapse ps-3" id="menuTiketing">
                                        <li><a href="#" class="btn btn-sm btn-primary btn-pills my-1">Pengajuan Revisi Pusat</a></li>
                                        <li><a href="#" class="btn btn-sm btn-primary btn-pills mb-1">Usulan kegiatan</a></li>
                                        <li>
                                            <a href="#menuRevda" class="btn btn-sm btn-primary btn-pills mb-1" data-bs-toggle="collapse">Pengajuan Revisi Daerah &#11206;</a>
                                            <ul class="list-unstyled collapse ps-3" id="menuRevda">
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Revisi kegiatan GWPP</a></li>
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Revisi kegiatan Sarpras</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" class="btn btn-sm btn-primary btn-pills mb-1">Quality Surveyor</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="btn btn-dongker">Penerbitan POK</a></li>
                                <li>
                                    <a href="#menuCapaiOut" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Output &#11206;</a>
                                    <ul class="list-unstyled collapse ps-3" id="menuCapaiOut">
                                        <li>
                                            <a href="#menuCapaiPus" class="btn btn-sm btn-primary btn-pills my-1" data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
                                            <ul class="list-unstyled collapse ps-3" id="menuCapaiPus">
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#menuCapaiDa" class="btn btn-sm btn-primary btn-pills mb-1" data-bs-toggle="collapse">Capaian Daerah &#11206;</a>
                                            <ul class="list-unstyled collapse ps-3" id="menuCapaiDa">
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
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
                                <li><a href="" class="btn btn-dongker">Master</a></li>
                                <li><a href="" class="btn btn-dongker">Riwayat Pagu</a></li>
                                <li><a href="" class="btn btn-dongker">SIP GWPP</a></li>
                                <li><a href="" class="btn btn-dongker">Integrasi SAKTI</a></li>
                                <li><a href="" class="btn btn-dongker">Profile</a></li>
                                <li><a href="" class="btn btn-dongker">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-5 mb-3">
                capaian output
            </div>
        </div>

        
        
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Chartjs -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
        <script>
            function myFunction() {
                var element = document.getElementById("loginBlock");
                element.classList.toggle("open");
            }
            // myFunction();
            const chartPusat = document.getElementById('chartPusat');
            const chartDekon = document.getElementById('chartDekon');
            const chartTugas = document.getElementById('chartTugas');
            const chartRealisasi = document.getElementById('chartRealisasi');
            const chartSandingan = document.getElementById('chartSandingan');
            const chartPaguUke2 = document.getElementById('chartPaguUke2');
            const chartPaguKew = document.getElementById('chartPaguKew');
            const chartPaguSum = document.getElementById('chartPaguSum');

            new Chart(chartPusat, {
                type: 'doughnut',
                data: {
                    labels: ['Realisasi', 'Sisa'],
                    datasets: [{
                        data: [{{number_format((float)$persen_realisasi_pusat, 2, '.', '')}}, {{number_format((float)$persen_sisa_pusat, 2, '.', '')}}],
                        backgroundColor: [
                        'rgb(32, 125, 49)',
                        'rgb(248, 191, 23)'
                        ],
                        hoverOffset: 4
                    }]
                }
            });

            new Chart(chartDekon, {
                type: 'doughnut',
                data: {
                    labels: ['Realisasi', 'Sisa'],
                    datasets: [{
                        data: [{{number_format((float)$persen_realisasi_dekon, 2, '.', '')}}, {{number_format((float)$persen_sisa_dekon, 2, '.', '')}}],
                        backgroundColor: [
                        'rgb(32, 125, 49)',
                        'rgb(248, 191, 23)'
                        ],
                        hoverOffset: 4
                    }]
                }
            });

            new Chart(chartTugas, {
                type: 'doughnut',
                data: {
                    labels: ['Realisasi', 'Sisa'],
                    datasets: [{
                        data: [{{number_format((float)$persen_realisasi_tp, 2, '.', '')}}, {{number_format((float)$persen_sisa_tp, 2, '.', '')}}],
                        backgroundColor: [
                        'rgb(32, 125, 49)',
                        'rgb(248, 191, 23)',
                        ],
                        hoverOffset: 4
                    }]
                }
            });

            new Chart(chartRealisasi, {
                type: 'bar',
                data: {
                    responsive:true,
                    maintainAspectRatio: false,
                    labels: {!! $satker_eselon1 !!},
                    datasets: [{
                        data: {!! $real_eselon1 !!},
                        borderWidth: 1,
                        backgroundColor: '#2C83D2'
                    }]
                }
            });

            new Chart(chartSandingan, {
                type: 'line',
                data: {
                    datasets: [{
                        label: 'Dataset',
                        data: [72980037000, 10288880000, 9478727000, 9225201000, 8823924000, 6814001000],
                        fill: false,
                        borderColor: '#2C83D2',
                        tension: 0.1
                    }]
                }
            });

            new Chart(chartPaguUke2, {
                type: 'bar',
                data: {
                labels: ['Sekretariat', 'Direktorat A', 'Direktorat B', 'Direktorat C', 'Diraktorat D', 'Direktorat E'],
                datasets: [{
                    label: 'Pagu Anggaran per UKE II',
                    data: [12, 10, 8, 6, 4, 2],
                    borderWidth: 1
                }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
            });

            new Chart(chartPaguKew, {
                type: 'doughnut',
                data: {
                    labels: ['Pusat', 'Dekonsentrasi', 'Tugas Pembantuan'],
                    datasets: [{
                        label: 'Pagu per Kewenangan',
                        data: [300, 50, 100],
                        backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                    }]
                }
            });

            new Chart(chartPaguSum, {
                type: 'doughnut',
                data: {
                    labels: ['Rupiah Murni', 'PLN', 'HLN'],
                    datasets: [{
                        label: 'Pagu per Sumber Dana',
                        data: [12, 10, 8],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                            ],
                        hoverOffset: 4
                    }]
                }
            });
        </script>
    </body>
</html>
