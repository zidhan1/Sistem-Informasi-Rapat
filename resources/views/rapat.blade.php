@extends('layout.master')

@section('content')
<div class="container">
    <h3>Data Rapat</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <td style="width: 5%;">No</td>
                <td style="width: 35%;">Nama Rapat</td>
                <td style="width: 35%;">Divisi</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($dataRapat as $data)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$data->nama_rapat}} </td>
                <td> {{$data->divisi}} </td>
                <td>
                    <form action="{{route('rapat.destroy',$data->id)}}" method="POST">@csrf
                        <a href="{{route('detail.show',$data->id)}}" type="button" class="btn btn-success">Show</a>
                        <button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dataRapat->links() }}
    <a href="{{url('/create')}}" class="btn btn-primary">Tambah Data</a>
    <!-- Modal Detail  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Nama Rapat : <span id="rapat"></span> </p>
                    <p>Divisi : <span id="divisi"></span> </p>
                    <p>Tanggal : <span id="tanggal"></span> </p>
                    <p>Anggota : <span id="anggota"></span> </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Detail -->
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script>
    $(document).on("click", "#tombolShow", function() {
        let rapat = $(this).data('rapat');
        let divisi = $(this).data('divisi');
        let tanggal = $(this).data('tanggal');
        let anggota = $(this).data('anggota');

        $(".modal-body #rapat").text(rapat);
        $(".modal-body #divisi").text(divisi);
        $(".modal-body #tanggal").text(tanggal);
        $(".modal-body #anggota").text(anggota);
    })
</script>