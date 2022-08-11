@extends('layout.master')

@section('content')

<div class="container">
    <h3>Notulensi Rapat</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <td style="width: 5%;">No</td>
                <td style="width: 25%;">Nama Rapat</td>
                <td style="width: 30%;">Divisi</td>
                <td style="width: 20%;">Notulensi</td>
                <td>Download</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataNotulen as $data)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$data->nama_rapat}} </td>
                <td> {{$data->divisi}} </td>
                <td> {{$data->file}} </td>
                <td>
                    <a href="dokumen/{{$data->file}}"><button class="btn btn-success" type="button">Notulen</button></a>
                    <a href="dokumen/{{$data->undangan}}"><button class="btn btn-warning" type="button">Undangan</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn btn-info" id="show-form">Upload</button>
    <!-- Form Tambah Data -->
    <div class="popup">
        <div class="close-btn">&times;</div>
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="rapat" class="col-sm-2 control-label">Nama Rapat</label>
                <div class="col-sm-10">
                    <select name="rapat" id="rapat" class="form-control">
                        @foreach($dataNotulen as $data)
                        <option value="{{$data->id}}">{{$data->nama_rapat}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="file" class="col-sm-2 control-label">Notulensi</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="file" id="file">
                </div>
            </div>
            <div class="form-group">
                <label for="undangan" class="col-sm-2 control-label">Undangan</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="undangan" id="undangan">
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