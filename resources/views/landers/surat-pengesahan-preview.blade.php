<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Surat Persetujuan Revisi Anggaran" />
        <meta name="author" content="Ditjen Bina Adwil Kemendagri" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Surat Persetujuan Revisi Anggaran</title>
        <style>
            body
            {
                font-size: 12px;
                font-family: Arial, Helvetica, sans-serif;
            }
            tr.border_bottom td
            {
                border-bottom: 6px double black;
            }
            /* .watermark{
                display: block;
                margin-left: auto;
                margin-right: auto;
                opacity:0.5;
                z-index:99;
                color:white;
            } */

            .watermark {
                /* Used to position the watermark */
                position: relative;
            }

            .watermark__inner {
                /* Center the content */
                align-items: center;
                display: flex;
                justify-content: center;

                /* Absolute position */
                left: 0px;
                position: absolute;
                top: 500px;

                /* Take full size */
                height: 100%;
                width: 100%;
            }

            .watermark__body {
                /* Text color */
                color: rgba(0, 0, 0, 0.2);

                /* Text styles */
                font-size: 3rem;
                font-weight: bold;
                text-transform: uppercase;

                /* Disable the selection */
                user-select: none;
            }

            .watermark-image{
                opacity:0.3;
                width:170px;
            }
        </style>
    </head>
    <body>
        <div class="watermark">
            <!-- Watermark container -->
            <div class="watermark__inner">
                <!-- The watermark -->
                <div class="watermark__body">
                    <img class="watermark-image" src="{{$img_emonev}}" alt="Logo Emonev">
                </div>
            </div>
        </div>
        <table style="width: 100%">
            <tr class="border_bottom">
                <td style="text-align: center">
                    <img src="{{$img_logo}}" width="100px" alt="Logo Kemendagri">
                </td>
                <td style="padding: 20px 0px;text-align: center; font-weight: bolder; line-height: 22px;">
                    KEMENTERIAN DALAM NEGERI <br>
                    REPUBLIK INDONESIA <br>
                    DITJEN BINA ADMINISTRASI KEWILAYAHAN <br>
                    Jalan Medan Merdeka Utara No. 7 Jakarta Pusat 10110 <br>
                    Telp/Fax 021 3142917. www.kemendagri.go.id. email: ditjenbinaadwil@kemendagri.go.id
                </td>
            </tr>
            <tr>
                <td style="padding: 15px 5px; text-align: right" colspan="2">
                    Jakarta, {{dateMasked($data['tanggal_pengesahan'])}}
                </td>
            </tr>
        </table>
        
        <table style="width: 100%">
            <tr>
                <td style="width: 50%">
                    <table>
                        <tr>
                            <td style="padding: 2px;">Nomor</td>
                            <td style="padding: 2px;">:</td>
                            <td style="padding: 2px;">{{$data['nomor_surat_pengesahan']}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 2px;">Sifat</td>
                            <td style="padding: 2px;">:</td>
                            <td style="padding: 2px;">Segera</td>
                        </tr>
                        <tr>
                            <td style="padding: 2px;">Lampiran</td>
                            <td style="padding: 2px;">:</td>
                            <td style="padding: 2px;">-</td>
                        </tr>
                        <tr>
                            <td style="padding: 2px;vertical-align:top">Hal</td>
                            <td style="padding: 2px;vertical-align:top">:</td>
                            <td style="vertical-align:top">Persetujuan {{$data['perihal']}}</td>
                        </tr>
                    </table>
                </td>
                <td style="padding-top: 15px; padding-left: 55px;vertical-align: top">
                    Yth. &nbsp;&nbsp; Kuasa Pengguna Anggaran <br>
                    <div style="margin-left: 35px">Satker {{$data['satker']}} {{$data['nama_provinsi']}}</div>
                    Di - <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tempat
                </td>
            </tr>
        </table>

        <table style="margin-top: 25px;">
            <tr>
                <td style="width: 10%"></td>
                <td><span style="padding: 50px">Sehubungan dengan surat Saudara Nomor {{$data['nomor_surat']}} Tanggal {{dateMasked($data['tanggal_surat'])}}, bersama ini disampaikan hal-hal berikut:</span></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <table>
                        <tr>
                            <td style="padding: 5px; vertical-align:top">1.</td>
                            <td style="padding: 5px; text-align: justify">
                                <!-- Sesuai dengan Peraturan Menteri Keuangan Nomor 199/PMK.O2/2021 tentang Tata Cara Revisi Anggaran Tahun Anggaran {{$data['tahun_anggaran']}}, bahwa salah satu pertimbagan revisi anggaran adalah mempercepat pencapaian kinerja Satker dan Unit Eselon 1 Ditjen Bina Adminstrasi Kewilayahan. -->

                                Sesuai dengan Peraturan Menteri Keuangan Nomor 62 Tahun 2023 tentang Perencanaan Anggaran, Pelaksanaan Anggaran, serta Akuntansi dan Pelaporan Keuangan, bahwa salah satu pertimbangan revisi anggaran adalah mempercepat pencapaian kinerja Satker dan Unit Eselon 1 Ditjen Bina Adminstrasi Kewilayahan.
                            </td>
                        </tr>
                        @php $no = 2; @endphp
                        @if($data['deskripsi_pengesahan'] != NULL && count($data['deskripsi_pengesahan']) > 0)
                            @foreach($data['deskripsi_pengesahan'] as $deskripsi)
                                <tr>
                                    <td style="padding: 5px; vertical-align:top">{{$no}}.</td>
                                    <td style="padding: 5px; text-align: justify">{{$deskripsi}}</td>
                                </tr>
                                @php $no++; @endphp
                            @endforeach
                        @endif
                        <tr>
                            <td></td>
                            <td style="padding: 10px"> Demikian disampaikan, atas kerjasamanya diucapkan terima kasih. </td>
                        </tr>
                    </table>

                    <table style="width: 100%">
                        <tr>
                            <td style="width: 60%; text-align:right:; padding: 10px"></td>
                            <td style="padding: 10px">
                                @if(strtotime($data['tanggal_pengesahan']) > 1704041940)
                                    PLH. Sekretaris Ditjen <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bina Administrasi Kewilayahan<br>
                                    <img src="{{public_path('images/ttd-sekjen-skr.png')}}" style="margin-left: 30px;" width="200px" alt=""> <br>
                                @elseif(strtotime($data['tanggal_pengesahan']) > 1695574800)
                                    PLH. Sekretaris Ditjen <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bina Administrasi Kewilayahan<br>
                                    <img src="{{public_path('images/ttd-sekjen-old1.png')}}" style="margin-left: 30px;" width="200px" alt=""> <br>
                                @else
                                    Sekretaris Ditjen <br>
                                    Bina Administrasi Kewilayahan<br>
                                    <img src="{{public_path('images/ttd-sekjen-old.png')}}" width="200px" alt=""> <br>
                                @endif
                                <!-- <span style="text-decoration: underline">Indra Gunawan SE, M.PA</span> <br> -->
                                <!-- Pembina Utama Muda (IV/c) <br>
                                NIP. 19700715 199603 1 001 -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table style="margin-top: 5px">
            <tr>
                <td colspan="2">Tembusan:</td>
            </tr>
            @php $no=1; @endphp
            @if($data['tembusan'] != NULL && count($data['tembusan']) > 0)
                @foreach($data['tembusan'] as $tembusan)
                    <tr>
                        <td>{{$no}}.</td>
                        <td>{{$tembusan}}</td>
                    </tr>
                    @php $no++; @endphp
                @endforeach
            @endif
        </table>
    </body>
</html>
