@extends('layouts.master')

@section('content')
    <style>
        .content {
            display: inline-flex;
        }

        .content .table {
            margin-left: 60px;
            margin-top: 15px;
        }

        #reader {
            border: 0 !important;
        }

        #loading {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
        }

        #loading-image {
            z-index: 100;
        }
    </style>
    <div id="loading">
        <img id="loading-image" src="{{ asset('template/assets/loader.gif') }}" alt="Loading..." />
    </div>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @if (auth()->user()->role_id == 2)
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $title }}</h5>
                                <table class="table table borderless">
                                    <tr>
                                        <td>Dosen</td>
                                        <td>:</td>
                                        <td>{{ $dosen->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mata Kuliah</td>
                                        <td>:</td>
                                        <td>{{ $dosen->matkul->nm_matkul }}</td>
                                    </tr>
                                    <tr>
                                        <td>Hari</td>
                                        <td>:</td>
                                        <td>{{ $dosen->days }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jam Masuk</td>
                                        <td>:</td>
                                        <td>{{ date('H:i', strtotime($dosen->start)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dosen</td>
                                        <td>:</td>
                                        <td>{{ date('H:i', strtotime($dosen->end)) }}</td>
                                    </tr>
                                </table>
                                <center>
                                    <h5 class="card-title">Barcode Absen</h5>

                                    <div>

                                        {!! DNS2D::getBarcodeHTML((string) $dosen->barcode, 'QRCODE', 17, 17) !!}
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if (auth()->user()->role_id == 3)
            <span class="loader"></span>
            <section class="section">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Mahasiswa</h5>
                                <table class="table table borderless">

                                    <tr>
                                        <td>Mahasiswa</td>
                                        <td>:</td>
                                        <td>{{ $mahasiswa->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>NIM</td>
                                        <td>:</td>
                                        <td>{{ $mahasiswa->nim }}</td>
                                    </tr>
                                    <tr>
                                        <td>Prodi</td>
                                        <td>:</td>
                                        <td>{{ $mahasiswa->prodi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>:</td>
                                        <td>{{ date('d - m - y', strtotime($mahasiswa->ttl)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td>{{ $mahasiswa->jk }}</td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>:</td>
                                        <td>{{ $mahasiswa->agama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{ $mahasiswa->alamat }}</td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Kamera Absensi</h5>
                                <div id="reader"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </main><!-- End #main -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#loading').hide();
        })
    </script>
    @if (auth()->user()->role_id == 3)
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.7/html5-qrcode.min.js" integrity="sha512-dH3HFLqbLJ4o/3CFGVkn1lrppE300cfrUiD2vzggDAtJKiCClLKjJEa7wBcx7Czu04Xzgf3jMRvSwjVTYtzxEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
        <script type="text/javascript">
            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    }
                },
                /* verbose= */
                false);

            function onScanSuccess(decodedText, decodedResult, event) {
                // event.preventDefault();
                // handle the scanned code as you like, for example:
                // console.log(`Code matched = ${decodedText}`, decodedResult);
                $.ajax({
                    url: `{{ route('absensi') }}`,
                    type: 'POST',
                    data: {
                        _methode: 'POST',
                        _token: `{{ csrf_token() }}`,
                        code: decodedText,
                    },

                    success: function(res) {
                        console.log(res);

                        // console.log(e)




                        if (res['status'] == 200) {

                            Swal.fire({
                                title: "Terima Kasih!",
                                text: "Anda Telah Berhasil Absen Mata Kuliah " + res['data']['matkul'][
                                    'nm_matkul'
                                ],
                                icon: "success"
                            }).then(function(result) {
                                if (true) {
                                    window.location = `{{ route('home') }}`;
                                }
                            });

                        } else {


                            Swal.fire({
                                title: "Absen Gagal",
                                text: "Hari ini anda telah absen mata kuliah " + res['data']['matkul'][
                                    'nm_matkul'
                                ],
                                icon: "error"
                            }).then(function(result) {
                                if (true) {
                                    window.location = `{{ route('home') }}`;
                                }
                            });

                        }

                    }
                })
                html5QrcodeScanner.clear();
            }

            // function onScanFailure(error) {
            //     // handle scan failure, usually better to ignore and keep scanning.
            //     // for example:
            //     console.warn(`Code scan error = ${error}`);
            // }

            html5QrcodeScanner.render(onScanSuccess);
        </script>
    @endif
@endsection
