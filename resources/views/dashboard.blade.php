@extends('layout.master')

@section('content')
<div class="container">
    <!-- Card -->
    <div class="row">
        <div class="col-xs-3">
            <div class="panel panel-primary" style="width: 250px;">
                <div class="panel-heading">Total Pegawai</div>
                <div class="panel-body text-center" style="font-size: 20px;">
                    {{$totalPegawai}}
                </div>
                <div class="panel-footer"><a href="{{url('/pegawai')}}" class="btn btn-primary sm-3">View</a></div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="panel panel-warning" style="width: 250px;">
                <div class="panel-heading">Total Rapat</div>
                <div class="panel-body text-center" style="font-size: 20px;">
                    {{$totalRapat}}
                </div>
                <div class="panel-footer"><a href="{{url('/rapat')}}" class="btn btn-warning sm-3">View</a></div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="panel panel-info" style="width: 250px;">
                <div class="panel-heading">Total Notulensi</div>
                <div class="panel-body text-center" style="font-size: 20px;">
                    {{$totalNotulensi}}
                </div>
                <div class="panel-footer"><a href="{{url('/notulensi')}}" class="btn btn-info sm-3">View</a></div>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td style="width: 5%;">No</td>
                <td style="width: 15%;">NIP</td>
                <td style="width: 25%;">Nama</td>
                <td style="width: 15%;">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPegawai as $data)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$data->nip}} </td>
                <td> {{$data->nama}} </td>
                <td>
                    <form action="{{route('statistik.show',[$data->nip,$data->id_divisi])}}" method="POST">@csrf
                        <button class="btn btn-success" type="submit">Show</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dataPegawai->links() }}
</div>
@endsection
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>