@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
    <h1>Dashboard Admin</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Profil Perusahaan</h3>
                </div>
                <div class="card-body">
                    <p>Kelola data profil perusahaan Anda.</p>
                    <a href="#" class="btn btn-primary">Kelola Profil</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manajemen Pengguna</h3>
                </div>
                <div class="card-body">
                    <p>Tambah, ubah, atau hapus data pengguna/karyawan.</p>
                    <a href="#" class="btn btn-primary">Kelola Pengguna</a>
                </div>
            </div>
        </div>
    </div>
@stop