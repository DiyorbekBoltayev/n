@extends('layouts/app')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Inventorizatsiyani tahrirlash</h3>
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
                                    <form action="{{ route('inventory.update', $data->first()->id_inventory) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="nama_produk" class="form-label">Mahsulot nomi</label>
                                            <select class="form-select" name="id_produk"
                                                aria-label="Default select example">
                                                <option selected value="{{ $data->first()->id_produk }}">
                                                    {{ $data->first()->nama_produk }}
                                                </option>
                                                @foreach ($produk as $row)
                                                    <option value="{{ $row->id_produk }}">{{ $row->nama_produk }}

                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_gudang" class="form-label">Ombor nomi</label>
                                            <select class="form-select" name="id_gudang"
                                                aria-label="Default select example">
                                                <option selected value="{{ $data->first()->id_gudang }}">
                                                    {{ $data->first()->nama_gudang }}
                                                </option>
                                                @foreach ($gudang as $row)
                                                    <option value="{{ $row->id_gudang }}">{{ $row->nama_gudang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah" class="form-label">Miqdori</label>
                                            <input  type="number" class="form-control" id="jumlah"
                                                name="jumlah" aria-describedby="name"
                                                value="{{ $data->first()->jumlah }}" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Holat</label>
                                            <select class="form-select" name="status"
                                                aria-label="Default select example">
                                                @if ($data->first()->status == 'KIRITILDI')
                                                    <option value="KIRITILDI">KIRITILDI</option>
                                                    <option value="CHIQARILDI">CHIQARILDI</option>
                                                @elseif($data->first()->status == 'CHIQARILDI')
                                                    <option value="CHIQARILDI">CHIQARILDI</option>
                                                    <option value="KIRITILDI">KIRITILDI</option>
                                                @endif

                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
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
