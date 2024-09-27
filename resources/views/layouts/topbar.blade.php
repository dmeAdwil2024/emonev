            <div class="row">
                <div class="toggle col-md-1" id="menuNav">
                    <a href="#menuNav">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                <div class="col-md-8 d-flex logo-admin">
                    <img src="{{ asset('newdashboard/images/logo-emonev.png') }}" alt="logo emonev"
                        class="img-fluid margin-auto logo-smaller">
                    <div class="text-center">
                        <h1 class="title">E-MONEV</h1>
                        <h2 class="subtitle">DITJEN BINA ADMINISTRASI KEWILAYAHAN</h2>
                    </div>
                </div>
                <div class="avatar col-md-3 p-2 d-flex">
                    <img src="{{ asset('newdashboard/images/user-avatar.png') }}" alt=""
                        class="img-fluid avatar-img me-2">
                    <div class="avatar-name small fw-bold">
                        Selamat Datang {{ Auth::user()->nama }},<br>
                        @php
                            $str = 'select nama from tbm_level where id=' . Auth::user()->level;
                            $data_level = DB::select($str);
                            foreach ($data_level as $item) {
                                echo $item->nama;
                            }
                            $str = 'select alias_dir from tbm_dir where id_dir=' . Auth::user()->id_dir;
                            $data_level = DB::select($str);
                            foreach ($data_level as $item) {
                                echo ', ' . $item->alias_dir;
                            }
                        @endphp
                    </div>
                </div>
            </div>
