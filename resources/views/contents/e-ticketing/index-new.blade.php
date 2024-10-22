@extends('layouts.main-new')

@section('content')
    <div class="px-3">
        <h3>{{ $type }}</h3>
        <div class="row bg-tosca pt-3 mb-4">
            <div class="col-md-3 d-flex align-items-center gap-2 mb-3">
                <label for="pilihTahun" class="form-label text-nowrap mb-0">Tahun Anggaran</label>
                <select class="form-select form-select-sm" name="tahun" id="pilihTahun">
                    <option value="">Semua</option>
                    @php $tahun = date("Y")-1; @endphp
                    @for ($i = 0; $i <= 5; $i++)
                        <option value="{{ $tahun }}" {{ $tahun == date('Y') ? 'selected' : '' }}>{{ $tahun }}
                        </option>
                        @php $tahun++; @endphp
                    @endfor
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-center gap-2 mb-3">
                <label for="pilihBulan" class="form-label text-nowrap mb-0">Bulan</label>
                <select class="form-select form-select-sm" name="bulan" id="pilihBulan">
                    @for ($i = 0; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $i == date('n') ? 'selected' : '' }}>{{ $months[$i] }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex align-items-center gap-2 mb-3">
                    <label for="pilihProv" class="form-label text-nowrap mb-0">Pilih Provinsi</label>
                    <select class="form-select form-select-sm" name="provinsi" id="pilihProv">
                        @foreach ($provinsi as $prov)
                            <option value="{{ $prov->id_prov }}">{{ $prov->namaprov }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 d-flex align-items-center gap-2 mb-3">
                    <label for="pilihSatker" class="form-label text-nowrap mb-0">Pilih Satker</label>
                    <select class="form-select form-select-sm" name="satker" id="pilihSatker">
                    </select>
                </div>
                @if ($isPPK)
                    <div class="col-md-2 d-flex align-items-center gap-2 mb-3">
                        <a href="#" id="btn-new" class="btn btn-dongker"><i class="fas fa-plus"></i> Usulan Baru</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="row bg-tosca py-3 d-flex align-content-stretch">
            @foreach ($opsi as $status)
                <div style="width: calc(100%/5);">
                    <div class="bg-tosca p-3 h-100 text-center">
                        <h5 class="text-center">{{ $label[$status] }}<br><br></h5>
                        <p class="h3 text-center" data-status="{{ $status }}">
                            {{ isset($rekap[$status]) ? $rekap[$status] : 0 }}</p>
                        <a href="#" data-status="{{ $status }}"
                            class="btn btn-success rounded-pill btn-list">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div>

    </div>

    <script src="{{ asset('') }}landing-pages/js/jquery-3.3.1.min.js"></script>
    <script>
        $('#pilihProv').on('change', function() {
            loadSatker();
        }).trigger('change');

        $('#pilihSatker').on('change', function() {
            loadRekapSatker();
        });

        $('#pilihTahun').on('change', function() {
            loadRekapSatker();
        });

        $('#pilihBulan').on('change', function() {
            loadRekapSatker();
        }).trigger('change');

        function loadSatker() {
            var namaprov = $('#pilihProv option:selected').text() || '';

            $.post('{{ route('ticketing.satker-provinsi') }}', {
                _token: '{{ csrf_token() }}',
                namaprov
            }, function(res) {
                var optionSatker = ''
                for (satker of res.data) {
                    var satkerText = satker.kode + '-' + satker.nama_satker
                    optionSatker += '<option value="' + satkerText + '">' + satkerText + '</option>';
                }
                $("#pilihSatker").html('').html(optionSatker).change();
            });
        }

        function loadRekapSatker() {
            var tahun = $('#pilihTahun option:selected').val();
            var bulan = $('#pilihBulan option:selected').val();
            var satker = $('#pilihSatker option:selected').val();

            $.post('{{ route('ticketing.rekap-satker') }}', {
                _token: '{{ csrf_token() }}',
                satker,
                tahun,
                bulan
            }, function(res) {
                for (const status in res.data) {
                    $("p[data-status='" + status + "']").html('').html(res.data[status]);
                }
            });
        }


        $('a#btn-new').on('click', function() {
            var provinsi = $('#pilihProv option:selected').val() + '-' + $('#pilihProv option:selected').text();
            var satker = $('#pilihSatker option:selected').val();
            var tahun = $('#pilihTahun option:selected').val();

            window.location.href = '/ticketing/baru/' + tahun + '/' + provinsi + '/' + satker;
        });

        $('a.btn-list').on('click', function() {
            var provinsi = $('#pilihProv option:selected').val() + '-' + $('#pilihProv option:selected').text();
            var satker = $('#pilihSatker option:selected').val();
            var tahun = $('#pilihTahun option:selected').val();
            var bulan = $('#pilihBulan option:selected').val();
            var status = $(this).data('status');

            window.location.href = '/ticketing/list/' + tahun + '/' + bulan + '/' + provinsi + '/' + satker + '/' +
                status;
        });
    </script>
@endsection
