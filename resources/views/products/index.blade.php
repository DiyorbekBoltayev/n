@extends('layouts/app')

@section('content')
    @if (session('Berhasil'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('Berhasil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('Gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('Gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Mahsulotlar ro'yhati</h3>
                    <a href="{{ route('product.create') }}" class="btn btn-primary"><i class="bi bi-plus">Mahsulot qo'shish</i></a>
                    </div>
                    </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                {{-- <th>Id</th> --}}
                                <th>Mahsulot nomi</th>

                                <th>Kategoriyalar</th>
                                <th>Harakat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->nama_produk }}</td>

                                    <td>{{ $row->nama_kategori }}</td>
                                    <td>
                                        <form action="{{ route('product.destroy', $row->id_produk) }}" method="POST">
                                            <a class="btn btn-success"
                                                href="{{ route('product.edit', $row->id_produk) }}">Tahrirlash</a>
                                            {{-- <a class="btn btn-danger" href="#">Hapus</a> --}}

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Bu maʼlumotlarni oʻchirib tashlamoqchimisiz?')">O'chirish</button>
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
