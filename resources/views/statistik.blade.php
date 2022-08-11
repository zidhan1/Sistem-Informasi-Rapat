@extends('layout.master')

@section('content')
<div class="container">
    <h3>Informasi Pegawai</h3>
    <div class="row">
        <div class="col-xs-4" style="font-size: 15px;">
            @foreach($infoPegawai as $data)
            <label for="nama">Nama :</label>
            <div id="nama" class="nama">{{$data->nama}}</div>
            <label for="nip">NIP : </label>
            <div id="nip" class="nip">{{$data->nip}}</div>
            <label for="divisi">Divisi : </label>
            <div id="divisi" class="divisi">{{$data->divisi}}</div>
            @endforeach
        </div>
        <div class="col-xs-4">
            <div id="piechart"></div>
        </div>
    </div>
    <a href="{{url('/')}}" class="btn btn-info">Kembali</a>
</div>
@endsection
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    var absen = JSON.parse('{!! json_encode($dataAbsen) !!}');
    var total = JSON.parse('{!! json_encode($dataTotal) !!}');
    var bolos = total - absen;
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Hadir', absen],
        ['Tidak Hadir', bolos]
    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': 'Statistik Kehadiran Pegawai \nTotal Rapat :' + total,
        'width': 450,
        'height': 200
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}
</script>