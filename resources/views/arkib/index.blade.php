@extends('layouts.base')

@section('content')


<div class="container pt-4">

    <div class="row pt-4">
        <div class="col">

            <div class="card card-frame">

                <div class="card-header">
                    <h5>Tambah Arkib</h5>
                </div>
                <div class="card-body">
                    <div class="col">
                        <form method="POST" action="/arkib">
                            @csrf

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Name</label>
                                <input class="form-control" type="text" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Pemilik</label>
                                <input class="form-control" type="text" name="pemilik">
                            </div>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tag</label>
                                <input class="form-control" type="text" name="tag">
                            </div>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jenis</label>
                                <input class="form-control" type="text" name="jenis">
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card card-frame">

                <div class="card-header">
                    <h5>Senarai Arikib</h5>
                </div>
                <div class="card-body">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Fail</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pemilik</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tag</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($arkibs as $arkib)
                                    <tr>
                                        <td class="text-center"> {{$arkib->nama}}</td>
                                        <td class="text-center"> {{$arkib->pemilik}}</td>
                                        <td class="text-center"> {{$arkib->tag}}</td>
                                        <td class="text-center"> {{$arkib->jenis}}</td>
                                        <td class="text-center">
                                            <a class="btn btn-icon btn-2 btn-primary" type="button" href="{{ URL::to('arkib/' . $arkib->id) }}">
                                                <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                            </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>




</div>





@stop