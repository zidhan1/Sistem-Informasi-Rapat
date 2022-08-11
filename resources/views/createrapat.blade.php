@extends('layout.master')

@section('content')

<div class="container">
    <h3>Tambah Data Rapat</h3>
    <form class="form-horizontal" action="{{route('rapat.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_rapat" class="col-sm-1 control-label">Nama Rapat</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_rapat" id="nama_rapat" placeholder="Nama Rapat">
            </div>
        </div>
        <div class="form-group">
            <label for="tempat" class="col-sm-1 control-label">Tempat Rapat</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Rapat">
            </div>
        </div>
        <div class="form-group">
            <label for="tanggal" class="col-sm-1 control-label">Tanggal</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="tanggal" id="tanggal">
            </div>
        </div>
        <div class="form-group">
            <label for="divisi" class="col-sm-1 control-label">Divisi</label>
            <div class="col-sm-6">
                <select name="divisi" id="divisi" class="form-control">
                    <option value="0">Select Department</option>
                    @foreach($dataDivisi as $data)
                    <option value="{{$data->id}}">{{$data->divisi}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="anggota" id="anggota1"></div>

        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <button class="btn btn-default" id="addmember">Add Member</button>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#addmember").click(function() {
            var angg = '<div class="form-group"><label for="pegawai" class="col-sm-1 control-label">Member</label><div class="col-sm-6"><select name="pegawai[]" id="pegawai[]" class="form-control">@foreach($dataAnggota as $data)<option value="{{$data->nip}}">{{$data->nama}}</option>@endforeach</select></div></div>';
            $(".anggota").append(angg);
        });
    });
</script>