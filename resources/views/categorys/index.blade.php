@extends('layouts/app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Category</h3>
                    <p class="text-subtitle text-muted">List Category</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Main</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Category</h4>
                    <a href="category/create" class="btn btn-primary"><i class="bi bi-plus">New Category</i></a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->id_kategori }}</td>
                                    <td>{{ $row->nama_kategori }}</td>
                                    <td>
                                        <form action="{{ route('category.destroy', $row->id_kategori) }}" method="POST">
                                            <a class="btn btn-success"
                                                href="{{ route('category.edit', $row->id_kategori) }}">Edit</a>
                                            {{-- <a class="btn btn-danger" href="#">Hapus</a> --}}

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
