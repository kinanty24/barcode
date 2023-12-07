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
    </style>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Daftar Rekap Absen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url("home") }}">Home</a></li>
                    <li class="breadcrumb-item active">Rekap Absen</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
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
                    <td>{{ date("H:i", strtotime($dosen->start)) }}</td>
                </tr>
                <tr>
                    <td>Dosen</td>
                    <td>:</td>
                    <td>{{ date("H:i", strtotime($dosen->end)) }}</td>
                </tr>
            </table>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Mahasiswa yang telah absen</h5>
                            <div class="table">
                                <table class="table table-striped table-hover " id="datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mahasiswa</th>
                                            {{-- <th>Dosen</th> --}}
                                            <th>Tanggal Absen</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rekapAbsen as $absen)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $absen->mahasiswa->nama }}</td>

                                                <td>{{ Carbon\Carbon::parse($absen->tanggal)->isoFormat("dddd, D MMMM Y") }}
                                                </td>
                                                {{-- <td>
                                                    <a href="{{ route('rekap_absen.show', $absen->id) }}"
                                                        class="btn btn-info">Lihat Detail</a>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
            $('#datatable').DataTable({
                dom: 'Bfrtip',
                buttons: ['excel', 'pdf'],
            })
        })
    </script>
@endsection
