@extends('layout.master')

@section('content')
<div class="container">
    <h3>Data Pegawai</h3>
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-success" style="width: 650px;">
                <div class="panel-heading">Detail Rapat</div>
                <div class="panel-body" style="font-size: 20px;">
                    <span>Nama Rapat : {{$upper->nama_rapat}}</span><br>
                    <span>Tempat Rapat : {{$upper->tempat}}</span><br>
                    <span>Nama Divisi : {{$upper->divisi}}</span><br>
                    <span>Tanggal : {{$upper->tanggal}}</span><br>
                    <span>Anggota : @foreach($detail as $data){{$data->nama}} ,@endforeach</span>
                </div>
                <div class="panel-footer"><a href="{{url('/rapat')}}" class="btn btn-default sm-3">Kembali</a></div>
            </div>
        </div>
    </div>
</div>
@endsection