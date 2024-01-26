@extends("layouts.master")

@section("content")
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
        <img id="loading-image" src="{{ asset("template/assets/loader.gif") }}" alt="Loading..." />
    </div>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url("home") }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <span class="loader"></span>
        <section class="section">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kamera Absensi</h5>
                            <div id="reader"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection

@section("js")
    <script>
        $(document).ready(function() {
            $('#loading').hide();
        })
    </script>
    @if (auth()->user()->role_id == 2)
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
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
                    url: `{{ route("absensi") }}`,
                    type: 'POST',
                    data: {
                        _methode: 'POST',
                        _token: `{{ csrf_token() }}`,
                        code: decodedText,
                    },

                    success: function(res) {
                        console.log(res);

                        // console.log(e)




                        // if (res['status'] == 200) {

                        //     Swal.fire({
                        //         title: "Terima Kasih!",
                        //         text: "Anda Telah Berhasil Absen Mata Kuliah " + res['data']['nama'],
                        //         icon: "success",
                        //         showConfirmButton: false,
                        //         timer: 1500
                        //     }).then(function(result) {
                        //         html5QrcodeScanner.pause().then(function(result) {
                        //             html5QrcodeScanner.resume()
                        //         })
                        //     })

                        // } else {


                        //     Swal.fire({
                        //         title: "Absen Gagal",
                        //         text: "Hari ini anda telah absen mata kuliah " + res['data']['nama'],
                        //         icon: "error",
                        //         showConfirmButton: false,
                        //         timer: 1500
                        //     }).then(function(result) {
                        //         html5QrcodeScanner.pause().then(function(result) {
                        //             html5QrcodeScanner.resume()
                        //         })
                        //     })

                        // }

                    }
                })

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
