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

                    <h4 class="card-title">Inventorizatsiyalar ro'yhati</h4>
                    <a href="{{ route('inventory.create') }}" class="btn btn-primary"><i class="bi bi-plus">
                            Inventorizatsiya qo'shish</i></a>
                </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                {{-- <th>Id</th> --}}
                                <th>Mahsulot nomi</th>
                                <th>Ombor nomi</th>
                                <th>Miqdori</th>
                                <th>Holat</th>
                                <th>Harakat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->nama_produk }}</td>
                                    <td>{{ $row->nama_gudang }}</td>
                                    <td>{{ $row->jumlah }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        <form action="{{ route('inventory.destroy', $row->id_inventory) }}" method="POST">
                                            <a class="btn btn-success"
                                                href="{{ route('inventory.edit', $row->id_inventory) }}">Tahrirlash</a>
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
