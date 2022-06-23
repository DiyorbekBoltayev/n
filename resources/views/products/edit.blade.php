@extends('layouts/app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Mahsulotni tahrirlash</h3>
                    <!-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> -->
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <!-- <h4 class="card-title">Example Content</h4> -->
                </div>
                <div class="card-body">
                    <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur quas omnis laudantium tempore exercitationem, expedita aspernatur sed officia asperiores unde tempora maxime odio reprehenderit distinctio incidunt! Vel
                                                                                                                                                                                                                                                                                                                      aspernatur dicta consequatur! -->
                    <!-- Contact -->
                    <section id="contact">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <form action="{{ route('product.update', $product->id_produk) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Mahsulot nomi</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                aria-describedby="name" value="{{ $product->nama_produk }}" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategoriya</label>
                                            <select class="form-select" name="kategori"
                                                aria-label="Default select example">
                                                <option value="{{ $data->first()->id_kategori }}" selected>
                                                    {{ $data->first()->nama_kategori }}</option>
                                                @foreach ($kategori as $row)
                                                    <option value="{{ $row->id_kategori }}">{{ $row->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Akhir Contact -->
                </div>
            </div>
        </section>
    </div>
@endsection
