@extends('layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <!-- <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p> -->
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">

                    <div class="d-flex justify-content-between">

                        <h4 class="card-title">Omborlardagi mahsulotlar umumiy tahlili</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Ombor nomi</th>
                            <th>Jami mahsulotlar soni</th>
                            <th>Mahsulot xar xil turga mansubligi </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($omborlar as $ombor)

                            <tr>

                                <td>{{$loop->index+1}}</td>
                                <td>{{$ombor['nomi']}}</td>
                                <td>{{$ombor['jami']}}</td>
                                <td>{{$ombor['tanho']}} turdagi mahsulot mavjud</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>


        <section class="section">
            <div class="card">
                <div class="card-header">

                    <div class="d-flex justify-content-between">

                        <h4 class="card-title">Har bir mahsulotning umumiy tahlili</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mahsulot nomi</th>
                            <th>Joylashgan ombori</th>
                            <th>Miqdori </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($mahsulotlar as $m)

                            <tr>

                                <td>{{$loop->index+1}}</td>
                                <td>{{$m['nomi']}}</td>
                                <td>{{$m['ombor']}}</td>
                                <td>{{$m['soni']}} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection
