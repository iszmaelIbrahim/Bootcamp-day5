@extends('layouts.base')

@section('content')


<div class="container pt-4">

    <div class="row pt-4">
        <div class="card card-frame">

            <div class="card-header">
                <h5>Edit Catalog</h5>
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
                                </tr>
                            </thead>
                            <tbody>
                                <form method="PUT" action="/catalog">
                                    @method('PUT')
                                    <!-- @csrf -->
                                    <tr>
                                        <td class="text-center">
                                            <input type="text" class="form-control" value="{{$catalog->nama}}" name="nama">
                                        </td>
                                        <td class="text-center">
                                            <input type="text" class="form-control" value="{{$catalog->pemilik}}" name="pemilik">
                                        </td>
                                        <td class="text-center">
                                            <input type="text" class="form-control" value="{{$catalog->tag}}" name="tag">
                                        </td>
                                        <td class="text-center">
                                            <input type="text" class="form-control" value="{{$catalog->jenis}}" name="jenis">
                                        </td>
                                        <td class="text-center">
                                            <input type="submit" class="btn btn-primary">
                                        </td>
                                    </tr>
                                </form>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

@stop