
@extends('layouts.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Data Dosen/h1>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Dosen
                      </button>
                </div>

                <div class="card-body">
<div class="table-responsive-xxl">
               <table class="table table-striped table-hover datatable" >
                <thead>
                    <tr>
                        <th>NIDN</th>
                        <th>Nama</th>
                        <th>Matkul</th>
                        <th>Hari</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosen as $item)
                    <tr>
                            <td>{{ $item->nidn }}</td>
                            <td>{{ ucwords(strtolower($item->nama)) }}</td>
                            <td>{{ ucwords(strtolower($item->matkul)) }}</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"><i class="bi bi-pencil-square" style="color:black;margin-right:4px"></i></a>

                                <a href="{{route('dosen.destroy',$item->id)}}"><i class="bi bi-trash" style="color:black"></i></a>
                            </td>

                        </tr>
                        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Form Dosen</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{route('dosen.update',$item->id)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <label for="" class="mt-2">Nama Dosen</label>
                                <input type="text" name="nama" class="form-control mt-2" value="{{ ucwords(strtolower($item->nama))}}" required>
                                    <label for="" class="mt-2">NIDN</label>
                                <input type="number" name="nim" class="form-control mt-2" value="{{ ucwords(strtolower($item->nidn))}}" required>
                                    <label for="" class="mt-2">Matkul</label>
                                <input type="date" name="ttl" class="form-control mt-2" value="{{ $item->matkul}}" required>
                                <label for="" class="mt-2">Hari</label>
                                <input type="date" name="ttl" class="form-control mt-2" value="{{ $item->hari}}" required>
                                    <label for="" class="mt-2">Agama</label>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
              <form action="{{route('dosen.store')}}" method="post">
                @csrf
                <label for="" class="mt-2">Nama Dosen</label>
            <input type="text" name="nama" class="form-control mt-2" required>
                <label for="" class="mt-2">NIDN</label>
            <input type="number" name="nim" class="form-control mt-2" required>
                <label for="" class="mt-2">Matkul</label>
            <input type="text" name="prodi" class="form-control mt-2" required>
                <label for="" class="mt-2">Hari</label>
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
            <textarea name="alamat" class="form-control mt-2" id="" cols="20" rows="10"></textarea>
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
