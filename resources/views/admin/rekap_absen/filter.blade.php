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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Filter Rekap Absen</h5>
                            <form action="{{ route("rekap_absen.index") }}" method="get">

                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Mata Kuliah</label>
                                            @if (auth()->user()->role_id != 3)
                                                <select name="dosen" id="" class="form-control">
                                                    <option value="" disabled selected>Pilih Mata Kuliah</option>
                                                    @foreach ($dosen as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if (auth()->user()->name == $item->nama) selected @else @endif>
                                                            {{ $item->nama . " - " . $item->matkul->nm_matkul }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Tanggal</label>
                                            <input type="date" class="form-control" name="tanggal"
                                                id="formGroupExampleInput" placeholder="Tanggal Absen">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
