@extends('layout.master')

@section('content')
<div class="container">
    <h3>Data Pegawai</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <td style="width: 5%;">No</td>
                <td style="width: 15%;">NIP</td>
                <td style="width: 25%;">Nama</td>
                <td>Divisi</td>
                <td style="width: 15%;">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPegawai as $key => $data)
            <tr>
                <td> {{$dataPegawai->FirstItem() + $key}} </td>
                <td> {{$data->nip}} </td>
                <td> {{$data->nama}} </td>
                <td> {{$data->divisi}} </td>
                <td>
                    <form action="{{route('pegawai.destroy',$data->nip)}}" method="POST">@csrf
                        <button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-right">
        {{ $dataPegawai->links() }}
    </div>
    <button class="btn btn-primary" id="show-form">Tambah Data</button>
    <!-- Form Tambah Data -->
    <div class="popup">
        <div class="close-btn">&times;</div>
        <form class="form-horizontal" action="{{route('pegawai.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nip" class="col-sm-2 control-label">NIP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP">
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                </div>
            </div>
            <div class="form-group">
                <label for="divisi" class="col-sm-2 control-label">Divisi</label>
                <div class="col-sm-10">
                    <select name="divisi" id="divisi" class="form-control">
                        @foreach($dataDivisi as $data)
                        <option value="{{$data->id}}">{{$data->divisi}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- End Form Tambah Data -->

</div>
@endsection