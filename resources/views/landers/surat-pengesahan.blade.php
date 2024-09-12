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
                border-collapse: collapse;
                border-spacing: 0;
                border-bottom: 6px double black;
            }

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
                left: 265px;
                position: absolute;
                top: 400px;

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
                width:200px;
            }
        </style>
    </head>
    <body>
        <div class="watermark">
            <!-- Watermark container -->
            <div class="watermark__inner">
                <!-- The watermark -->
                <div class="watermark__body">
                    <img class="watermark-image" src="{{public_path('images/logo-emonev.png')}}" alt="Logo Emonev">
                </div>
            </div>
        </div>

        <div style="margin: 0 !important; width: 100%; text-align: center">
            <img src="{{public_path('images/kop-header.png')}}" width="100%">
        </div>
        
        <table style="width: 100%">
            <tr>
                <td style="width: 50%">
                    <table>
                        <tr>
                            <td style="padding: 2px;"> <br><br> Nomor</td>
                            <td style="padding: 2px;"> <br><br> :</td>
                            <td style="padding: 2px;"> <br><br> {{$data['nomor_surat_pengesahan']}}</td>
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
                <td style="text-align:justify; padding-left: 165px;vertical-align: top">
                    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Jakarta, {{dateMasked($data['tanggal_pengesahan'])}} <br><br> -->
                    <div style="margin-bottom: 15px; width: 100%; text-align:right">Jakarta, {{dateMasked($data['tanggal_pengesahan'])}}</div>
                    Yth. &nbsp;&nbsp; Kuasa Pengguna Anggaran <br>
                    <!-- <div style="margin-left: 35px">Satker {{$data['satker']}} {{$data['nama_provinsi']}}</div> -->
                    <div style="margin-left: 35px; text-transform: capitalize;">Satker {{strtolower($data['satker'])}}</div>
                    <div style="margin-left: 35px">Di - <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tempat </div>
                </td>
            </tr>
        </table>

        <table style="margin-top: 25px;">
            <tr>
                <td style="width: 10%"></td>
                <td style="text-align: justify"><span style="padding: 32px 5px 32px 32px">Sehubungan dengan surat Saudara Nomor {{$data['nomor_surat']}} Tanggal {{dateMasked($data['tanggal_surat'])}}, bersama ini disampaikan hal-hal berikut:</span></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <table>
                        <tr>
                            <td style="padding: 5px; vertical-align:top">1.</td>
                            <td style="padding: 5px; text-align: justify">
                                <!-- Sesuai dengan Peraturan Menteri Keuangan Nomor 199/PMK.O2/2021 tentang Tata Cara Revisi Anggaran Tahun Anggaran {{$data['tahun_anggaran']}}, bahwa salah satu pertimbangan revisi anggaran adalah mempercepat pencapaian kinerja Satker dan Unit Eselon 1 Ditjen Bina Adminstrasi Kewilayahan. -->
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
                            <td style="padding: 10px 10px 10px 5px"> Demikian disampaikan, atas kerjasamanya diucapkan terima kasih. </td>
                        </tr>
                    </table>

                    <table style="width: 100%">
                        <tr>
                            <td style="width: 60%; text-align:right:; padding: 10px"></td>
                            <td style="padding: 10px">
                                @if(strtotime($data['tanggal_pengesahan']) > 1704041940)
                                    Plh. Sekretaris Ditjen <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bina Administrasi Kewilayahan<br>
                                    <img src="{{public_path('images/ttd-sekjen-skr.png')}}" style="margin-left: 23px;" width="200px" alt=""> <br>
								@elseif(strtotime($data['tanggal_pengesahan']) > 1695574800)
                                    Plh. Sekretaris Ditjen <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bina Administrasi Kewilayahan<br>
                                    <img src="{{public_path('images/ttd-sekjen-old1.png')}}" style="margin-left: 23px;" width="200px" alt=""> <br>
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

        <table style="margin-top: 5px; margin-bottom: 10px">
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

        <footer style="vertical-align: bottom; position: fixed; left: 0; bottom: 15px; width: 100%;">
            @php $qr_code = 'qr/qr_'.$token.'.png'; @endphp
            <div style="float: left; display: inline">
                <img src="{{public_path($qr_code)}}" alt="QR Code" width="50px">
            </div>
            <div style="height: 50px; margin-top: 23px; vertical-align: bottom; height: 100px; margin-left: 58px; float: right; display: inline;">
                <span style="float: left;">
                    <small>
                    Sesuai dengan ketentuan peraturan perundang-undangan yang berlaku, dokumen ini telah ditandatangani secara elektronik, sehingga tidak diperlukan tandatangan dengan stempel basah
                    </small>
                </span>

                <span style="margin-top: 15px; margin-right: 12px; float: right; font-size: 0.8em">
                    <em>Dokumen ini diunduh melalui aplikasi emonev tanggal {{date("d/m/Y")}}</em>
                </span>
            </div>
        <footer>
    </body>
</html>
