@extends('layout.client')

@section('content')
<div class="container">
    <h3>Informasi Rapat</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <td style="width: 5%;">No</td>
                <td style="width: 30%;">Nama Rapat</td>
                <td style="width: 30%;">Divisi</td>
                <td style="width: 15%;">Tanggal</td>
                <td style="width: 20%;">Notulensi</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataNotulen as $data)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$data->nama_rapat}} </td>
                <td> {{$data->divisi}} </td>
                <td> {{$data->tanggal}} </td>
                <td> {{$data->file}} </td>
                <td>
                    <a href="dokumen/{{$data->file}}"><button class="btn btn-success" type="button">Download</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection