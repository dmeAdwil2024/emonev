@extends('layouts.caput')

@section('contents')
    <div class="main">
        <div class="topbar">
                <div class="toggle col-md-1"  id="menuNav">
                    <a href="#menuNav">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                <div class="col-md-8 d-flex logo-admin">
                    <img src="{{asset('newdashboard/images/logo-emonev.png')}}" alt="logo emonev" class="img-fluid margin-auto logo-smaller">
                    <div class="text-center">
                        <h1 class="title">E-MONEV</h1>
                        <h2 class="subtitle">DITJEN BINA ADMINISTRASI KEWILAYAHAN</h2>
                    </div>
                </div>
                <div class="avatar col-md-3 p-2 d-flex">
                    <img src="{{asset('newdashboard/images/user-avatar.png')}}" alt="" class="img-fluid avatar-img me-2">
                    <div class="avatar-name small fw-bold">
                        Selamat Datang Admin,<br>
                        Bagian Perencanaan
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 p-2 font-tebala" style="background-color:#ebebeb;">
                    Komponen Input
                </div>
                <div class="col-md-6 p-2 font-tebala" style="background-color:#ebebeb;text-align:right">
                
                Capaian Output > Capaian Pusat > Komponen Input > Komponen
                </div>
            </div>
            <div style="height:10px"></div>
            <div class="row">
                <div class="col-md-11 p-2" style="background-image: linear-gradient(to right, rgba(204,204,255,0.7) , rgba(102,255,204,0.7));">
                    <div class="row">
                        <div class="col-md-11 font-tebala font-tebal">
                            Informasi Cascading Output
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 font-tebal">
                            Direktorat
                        </div>
                        <div class="col-md-10 font-tebal">
                            <font class="font-tebala">Dekonsentrasi, Tugas Pembantuan dan Kerjasama</font>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 font-tebal">
                            Tahun
                        </div>
                        <div class="col-md-10 font-tebal">
                            <font class="font-tebala">2024</font>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 font-tebal">
                            K/L
                        </div>
                        <div class="col-md-10 font-tebal">
                            <font class="font-tebala">[00]</font>-Kementerian Dalam Negeri
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 font-tebal">
                            UK Eselon I
                        </div>
                        <div class="col-md-10 font-tebal">
                            <font class="font-tebala">[04]</font>-Ditjen Bina Administrasi Kewilayahan
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 font-tebal">
                            Program
                        </div>
                        <div class="col-md-10 font-tebal">
                            <font class="font-tebala">[CM]</font>-Program Pembinaan Kapasitas Pemerintahan dan Desa
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 font-tebal">
                            Sasaran Program
                        </div>
                        <div class="col-md-10 font-tebal">
                            <font class="font-tebala">[04]</font>-Meningkatnya tertib administrasi kewilayahan, penyelenggaraan pelayanan perizinan dan non perizinan yang terintegrasi dan terpadu, kinerja Gubernur sebagai Wakil Pemerintah Pusat, serta pengelolaan kawasan dan perbatasan negara
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 font-tebal">
                            Indikator Kinerja Program
                        </div>
                        <div class="col-md-10 font-tebal">
                            <font class="font-tebala">[04]</font>-Jumlah Provinsi dengan indeks kinerja Gubernur sebagai wakil pemerintahan pusat kategori Baik
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 font-tebal">
                            Kegiatan
                        </div>
                        <div class="col-md-10 font-tebal">
                            <font class="font-tebala">[1237]</font>-Pembinaan Pennyelenggaraan Hubungan Pusat dan Daerah serta Kerja Sama Daerah
                        </div>
                    </div>
                </div>
            </div>
            <div style="height:10px"></div>
            <div class="row">
                <div class="col-md-11" style="background-image: linear-gradient(to right, rgba(204,204,255,0.7) , rgba(102,255,204,0.7));"><br>
                    <div class="row">
                        <div class="col-md-8 p-2 font-tebala font-tebal">
                            Capaian Output (Komponen)
                        </div>
                        <table cellpadding=3 class="tbl_caput" width=100%>
                            <tr>
                                <td rowspan=2 width=7% align=center><div class="hd_caputa">+</div></td>
                                <td rowspan=2 class="hd_caput" width=20% align=center>Kode dan Nomenklatur</td>
                                <td rowspan=2 class="hd_caput" width=10% align=center>Capaian Output<br>(% kumulatif)</td>
                                <td class="hd_caput" width=24% colspan=3 align=center>Anggaran</td>
                                <td rowspan=2 class="hd_caput" width=38% align=center>Capaian Output</td>
                            </tr>
                            <tr>
                                <td align=center class="hd_caput" width=8% align=center>Alokasi</td>
                                <td align=center class="hd_caput" width=8% align=center>Realisasi</td>
                                <td align=center class="hd_caput" width=8% align=center>%</td>
                            </tr>
                            <tr>
                                <td align=center><div class="isi_caputa">+</div></td>
                                <td><div class="isi_caput"><a href="{{route('capaian.kegiatan')}}" class="btn">1237<br>Pembinaan Penyelenggaraan Hubungan Pusat dan Daerah serta Kerja Sama Daerah</div></td>
                                <td><div class="isi_caput">100%</div></td>
                                <td><div class="isi_caput">539427293</div></td>
                                <td><div class="isi_caput">539427293</div></td>
                                <td><div class="isi_caput">100%</div></td>
                                <td>
                                    <div class="chart-box" style="height:90px; width:100%;">
                                        <canvas id="graph1"></canvas>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align=center><div class="isi_caputa">+</div></td>
                                <td><div class="isi_caput"><a href="{{route('capaian.kro')}}" class="btn">1237.PBL<br>Kebijakan Bidang Tata Kelola Pemerintahan</a></div></td>
                                <td><div class="isi_caput">100%</div></td>
                                <td><div class="isi_caput">539427293</div></td>
                                <td><div class="isi_caput">539427293</div></td>
                                <td><div class="isi_caput">100%</div></td>
                                <td>
                                    <div class="chart-box" style="height:90px; width:100%;">
                                        <canvas id="graph2"></canvas>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align=center><div class="isi_caputa">+</div></td>
                                <td><div class="isi_caput"><a href="{{route('capaian.ro')}}" class="btn">1237.PBL.001<br>Pelaksanaan Tugas dan Wewenang GWPP dengan kinerja baik</a></div></td>
                                <td><div class="isi_caput">100%</div></td>
                                <td><div class="isi_caput">539427293</div></td>
                                <td><div class="isi_caput">539427293</div></td>
                                <td><div class="isi_caput">100%</div></td>
                                <td>
                                    <div class="chart-box" style="height:90px; width:100%;">
                                        <canvas id="graph3"></canvas>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align=center><div class="isi_caputa">+</div></td>
                                <td><a href="{{route('capaian.subkomponen')}}" class="btn"><div class="isi_caput">1237.PBL.001.061<br>Penguatan Sekertariat Bersama Pembinaan GWPP</div></td>
                                <td><div class="isi_caput">100%</div></td>
                                <td><div class="isi_caput">539427293</div></td>
                                <td><div class="isi_caput">539427293</div></td>
                                <td><div class="isi_caput">100%</div></td>
                                <td>
                                    <div class="chart-box" style="height:90px; width:100%;">
                                        <canvas id="graph4"></canvas>
                                    </div>
                                </td>
                            </tr>
                        </table><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const graph1 = document.getElementById('graph1');
        const graph2 = document.getElementById('graph2');
        const graph3 = document.getElementById('graph3');
        const graph4 = document.getElementById('graph4');
        const graph5 = document.getElementById('graph5');
        const graph6 = document.getElementById('graph6');
        
        new Chart(graph1, {
            type: 'bar',
            data: {
                responsive:false,
                maintainAspectRatio: false,
                labels: ["JAN","FEB","MAR","APR","MEI","JUN","JUL","AGU","SEP","OKT","NOV","DES"],
                datasets: [{
                    data: ["8","9","9","10","10","10","11","11","12","13","15","16"],
                    backgroundColor: ["#005ebb"],
                },
                {
                    data: ["92","91","91","90","90","90","89","89","88","87","85","84"],
                    backgroundColor: ["#007bff"],
                }],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                    scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        min: 0,
                        max: 100,
                        ticks: {
                            stepSize: 20
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        
        new Chart(graph2, {
            type: 'bar',
            data: {
                responsive:false,
                maintainAspectRatio: false,
                labels: ["JAN","FEB","MAR","APR","MEI","JUN","JUL","AGU","SEP","OKT","NOV","DES"],
                datasets: [{
                    data: ["8","9","9","10","10","10","11","11","12","13","15","16"],
                    backgroundColor: ["#005ebb"],
                },
                {
                    data: ["92","91","91","90","90","90","89","89","88","87","85","84"],
                    backgroundColor: ["#007bff"],
                }],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                    scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        min: 0,
                        max: 100,
                        ticks: {
                            stepSize: 20
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        
        new Chart(graph3, {
            type: 'bar',
            data: {
                responsive:false,
                maintainAspectRatio: false,
                labels: ["JAN","FEB","MAR","APR","MEI","JUN","JUL","AGU","SEP","OKT","NOV","DES"],
                datasets: [{
                    data: ["8","9","9","10","10","10","11","11","12","13","15","16"],
                    backgroundColor: ["#005ebb"],
                },
                {
                    data: ["92","91","91","90","90","90","89","89","88","87","85","84"],
                    backgroundColor: ["#007bff"],
                }],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                    scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        min: 0,
                        max: 100,
                        ticks: {
                            stepSize: 20
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        new Chart(graph4, {
            type: 'bar',
            data: {
                responsive:false,
                maintainAspectRatio: false,
                labels: ["JAN","FEB","MAR","APR","MEI","JUN","JUL","AGU","SEP","OKT","NOV","DES"],
                datasets: [{
                    data: ["8","9","9","10","10","10","11","11","12","13","15","16"],
                    backgroundColor: ["#005ebb"],
                },
                {
                    data: ["92","91","91","90","90","90","89","89","88","87","85","84"],
                    backgroundColor: ["#007bff"],
                }],
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                    scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        min: 0,
                        max: 100,
                        ticks: {
                            stepSize: 20
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // menu togle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
        // add hovered class in selected list items 
        let list = document.querySelectorAll('.navigation li');
        function activelink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover', activelink));
    </script>
@endsection
