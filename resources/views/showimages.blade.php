@extends('layout.master')

@section('content')
<div class="container">
    <h3>Images</h3>
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-success" style="width: 950px;">
                <div class="panel-heading">Detail Rapat</div>
                <div class="panel-body" style="font-size: 20px;">
                    @foreach($images as $data)
                    <img src="{{URL::to($data)}}" alt="" style="height: 200px; width:auto;">&nbsp;
                    @endforeach
                </div>
                <div class="panel-footer"><a href="{{url('/images')}}" class="btn btn-default sm-3">Kembali</a></div>
            </div>
        </div>
    </div>
</div>
@endsection