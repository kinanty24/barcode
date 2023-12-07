
@extends('layouts.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Data Mahasiswa</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Data Mahasiswa</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
        <div class="row">
            <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Data Mahasiswa</h5>

                </div>

                <div class="card-body">
<div class="table-responsive-xxl">
               <table class="table table-striped table-hover datatable" >
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        {{-- <th>Barcode Absensi</th> --}}

                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $item)
                    <tr>


                            <td>{{ $item->nim }}</td>
                            <td>{{ ucwords(strtolower($item->nama)) }}</td>
                            <td>{{ ucwords(strtolower($item->prodi)) }}</td>



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
