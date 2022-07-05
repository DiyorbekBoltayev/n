@extends('layouts/app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Inventorizatsiya qo'shish</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                                                                                                                                                                                                                                                                                                                                                              aspernatur dicta consequatur! -->
                    <!-- Contact -->
                    <section id="contact">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <form action="{{ route('inventory.store') }}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="nama_gudang" class="form-label">Ombor nomi</label>
                                            <select class="form-select" name="id_gudang"
                                                aria-label="Default select example">
                                                <option selected>Ma'lumotlarni tanlang</option>
                                                @foreach ($gudang as $row)
                                                    <option value="{{ $row->id_gudang }}">{{ $row->nama_gudang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah" class="form-label">Miqdori</label>
                                            <input  type="number" class="form-control" id="jumlah"
                                                    name="jumlah" aria-describedby="name" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Holat</label>
                                            <select class="form-select" name="status"
                                                    aria-label="Default select example">
                                                <option selected>Ma'lumotlarni tanlang</option>
                                                <option value="KIRITILDI">KIRITILDI</option>
                                                <option value="CHIQARILDI">CHIQARILDI</option>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="nama_produk" class="form-label">Mahsulot nomi</label>
                                            <input type="text" autofocus id="focus_input" name="id_produk" class="form-control " style="display: none">

                                        </div>
                                        <button type="button" onclick="birnarsa()" id="btn_b"  class="btn btn-primary">Skanerlang</button>
                                        <button type="submit"  class="btn btn-primary d-none">Qo'shish</button>
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
    <script>
        function birnarsa(){
                    document.getElementById('focus_input').style.display='block';
                    document.getElementById('focus_input').autocapitalize;

        }
    </script>
@endsection
