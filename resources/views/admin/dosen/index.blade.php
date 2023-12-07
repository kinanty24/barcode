@extends("layouts.master")
@section("content")
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Dosen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Data Dosen</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Data Dosen</h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah Dosen
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive-xxl">
                                <table class="table table-striped table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nidn</th>
                                            <th>Matkul</th>
                                            <th>Jadwal</th>
                                            <th>Barcode</th>

                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dosen as $item)
                                            <tr>

                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nidn }}</td>
                                                <td>{{ $item->matkul->nm_matkul }}</td>
                                                <td>{{ $item->days . " " . date("H:i", strtotime($item->start)) . " - " . date("H:i", strtotime($item->end)) }}
                                                </td>
                                                <td>{!! DNS2D::getBarcodeHTML((string) $item->barcode, "QRCODE", 7, 7) !!} </td>
                                                {{-- <td>{{ $item->agama }}</td> --}}
                                                {{-- <td>{{ $item->alamat }}</td> --}}

                                                <td>
                                                    {{-- <form method="POST" action="{{ route('dosen.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"><i class="bi bi-pencil-square" style="color:black;margin-right:4px"></i></a>
                                <button type="submit" ><i class="bi bi-trash" style="color:black"></i></button>
                            </form> --}}

                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $item->id }}"><i
                                                            class="bi bi-pencil-square"
                                                            style="color:black;margin-right:4px"></i></a>
                                                    <a href="{{ route("dosen.destroy", $item->id) }}"><i class="bi bi-trash"
                                                            style="color:black"></i></a>

                                                </td>

                                            </tr>
                                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form Dosen
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route("dosen.update", $item->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method("put")
                                                                <label for="" class="mt-2">Nama Dosen</label>
                                                                <input type="text" name="nama"
                                                                    class="form-control mt-2"
                                                                    value="{{ ucwords(strtolower($item->nama)) }}" required>
                                                                <label for="" class="mt-2">Email</label>
                                                                <input type="email" name="email"
                                                                    class="form-control mt-2"
                                                                    value="{{ ucwords(strtolower($item->user->email)) }}"
                                                                    required>
                                                                <label for="" class="mt-2">NIDN</label>
                                                                <input type="number" name="nidn"
                                                                    class="form-control mt-2"
                                                                    value="{{ ucwords(strtolower($item->nidn)) }}"
                                                                    required>
                                                                <label for="" class="mt-2">Matkul</label>
                                                                <select name="id_matkul" id="" class="form-select">
                                                                    <option value="" disabled selected> Pilih Matkul
                                                                    </option>
                                                                    @foreach ($matkul as $value)
                                                                        <option value="{{ $value->id }}"
                                                                            @if ($item->id_matkul == $value->id) selected @endif>
                                                                            {{ $value->nm_matkul }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label for="" class="mt-2">Hari</label>
                                                                <select name="days" id="" class="form-select">
                                                                    <option value="" disabled selected> Pilih Hari
                                                                    </option>
                                                                    @foreach ($days as $keys => $value)
                                                                        <option value="{{ $value }}"
                                                                            @if ($value == $item->days) selected @endif>
                                                                            {{ $value }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label for="" class="mt-2">Waktu Masuk</label>
                                                                <input type="time" name="start"
                                                                    value="{{ $item->start }}" class="form-control">
                                                                <label for="" class="mt-2">Waktu Keluar</label>
                                                                <input type="time" name="end"
                                                                    value="{{ $item->end }}" class="form-control">

                                                                {{-- <input type="text" name="matkul" class="form-control mt-2" value="{{ ucwords(strtolower($item->matkul))}}" required>
                                    <label for="" class="mt-2">Tempat Tanggal Lahir</label>
                                <input type="date" name="ttl" class="form-control mt-2" value="{{ $item->ttl}}" required>
                                    <label for="" class="mt-2">Agama</label>
                                <select name="agama" id="" class="form-select mt-2" required>
                                    <option value="" disabled selected>Pilih Agama</option>
                                    <option value="Islam" @if ($item->agama == "ISLAM" || $item->agama == "Islam") selected @endif >Islam</option>
                                    <option value="Kristen" @if ($item->agama == "KRISTEN" || $item->agama == "Kristen") selected @endif>Kristen</option>
                                    <option value="Hindu" @if ($item->agama == "HINDU" || $item->agama == "Hindu") selected @endif>Hindu</option>
                                    <option value="Buddha" @if ($item->agama == "BUDDHA" || $item->agama == "Buddha") selected @endif >Buddha</option>
                                </select>
                                    <label for="" class="mt-2">Jenis Kelamin</label>
                                <select name="jk" id="" class="form-select mt-2" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" @if ($item->jk == "LAKI-LAKI" || $item->jk == "Laki-Laki") selected @endif >Laki-Laki</option>
                                    <option value="Perempuan" @if ($item->jk == "PEREMPUAN" || $item->jk == "Perempuan") selected @endif >Perempuan</option>

                                </select>
                                    <label for="" class="mt-2">Alamat</label>
                                <textarea name="alamat" class="form-control mt-2" id="" cols="20" rows="10">{{$item->alamat}}</textarea> --}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Dosen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route("dosen.store") }}" method="post">
                        @csrf
                        <label for="" class="mt-2">Nama Dosen</label>
                        <input type="text" name="nama" class="form-control mt-2" required>
                        <label for="" class="mt-2">Email</label>
                        <input type="email" name="email" class="form-control mt-2" required>
                        <label for="" class="mt-2">NIDN</label>
                        <input type="number" name="nidn" class="form-control mt-2" required>
                        <label for="" class="mt-2">Matkul</label>
                        <select name="id_matkul" id="" class="form-select">
                            <option value="" disabled selected> Pilih Matkul</option>
                            @foreach ($matkul as $item)
                                <option value="{{ $item->id }}">{{ $item->nm_matkul }}</option>
                            @endforeach
                        </select>
                        <label for="" class="mt-2">Hari</label>
                        <select name="days" id="" class="form-select">
                            <option value="" disabled selected> Pilih Hari</option>
                            @foreach ($days as $item => $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <label for="" class="mt-2">Waktu Masuk</label>
                        <input type="time" name="start" class="form-control">
                        <label for="" class="mt-2">Waktu Keluar</label>
                        <input type="time" name="end" class="form-control">
                        {{-- <label for="" class="mt-2">Tempat Tanggal Lahir</label>
            <input type="date" name="ttl" class="form-control mt-2" required>
                <label for="" class="mt-2">Agama</label>
            <select name="agama" id="" class="form-select mt-2" required>
                <option value="" disabled selected>Pilih Agama</option>
                <option value="Islam" >Islam</option>
                <option value="Kristen" >Kristen</option>
                <option value="Hindu" >Hindu</option>
                <option value="Buddha" >Buddha</option>
            </select>
                <label for="" class="mt-2">Jenis Kelamin</label>
            <select name="jk" id="" class="form-select mt-2" required>
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-Laki" >Laki-Laki</option>
                <option value="Perempuan" >Perempuan</option>

            </select>
                <label for="" class="mt-2">Alamat</label>
            <textarea name="alamat" class="form-control mt-2" id="" cols="20" rows="10"></textarea> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
