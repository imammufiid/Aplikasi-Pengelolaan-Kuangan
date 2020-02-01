@extends('template/main')

@section('content')
<div class="row">
  <div class="col-lg-3 mb-4">
    <a href="{{route('spending.create')}}" class="btn btn-primary" id="tambahPengeluaran">Tambah Pengeluaran</a>
  </div>
</div>
<!-- <div class="tabel-pengeluaran" style="max-width: 1200p"> -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="table-responsive tabel-pengeluaran">
  <table class="table table-hover col-lg-12 table-bordered table-striped dataTables" id="table-data">
    <thead>
      <tr>
        <th scope="col" class="text-center" style="width:5%">#</th>
        <th scope="col" class="text-center" style="width:10%">Tanggal</th>
        <th scope="col" class="text-center" style="width:10%">Aset</th>
        <th scope="col" class="text-center" style="width:10%">Jumlah</th>
        <th scope="col" class="text-center" style="width:10%">Keterangan</th>
        {{-- @if (Auth::check()) --}}
        <th scope="col" class="text-center" style="width:10%">Aksi</th>
        {{-- @endif --}}
      </tr>
    </thead>
    <tbody>

      @foreach ($spending as $val)
      @foreach ($nama_asset as $nama)
      @if ($val->asset_id == $nama->asset_id)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$val->date}}</td>
        <td> {{$nama->asset}}</td>
        <td>{{$val->total}}</td>
        <td>{{$val->info}}</td>
        <td>
          <form action="{{route('spending.destroy', $val->id)}}" method="POST">
            {{-- @if (Auth::check()) --}}
            <a class="btn btn-success btn-sm" href="{{ route('spending.edit', $val->id) }}">
              <i class="fa fa-edit"></i>
            </a>
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">
              <i class="fa fa-trash"></i>
            </button>
            {{-- @endif --}}
          </form>
        </td>
      </tr>
      @endif
      @endforeach
      @endforeach

    </tbody>
  </table>
</div>
@endsection
@section('js')
<script>
  $('#table-data').DataTable();
</script>
@endsection
{{-- @section('js')
    <script>
        $('#newTransModalLabel').html('Edit Data')
        let table;
        table = $('#table-data').DataTable({
            responsive: true,
            serverSide: true,
			ajax: {
                url: "{{route('income.dt_json')}}",
},
columns: [
{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
{ data: 'date', name: 'date'},
{ data: 'assets', name: 'assets' },
{ data: 'accounts', name: 'accounts' },
{ data: 'total', name: 'total' },
{ data: 'info', name: 'info' },
{
data: 'id', name: 'id',
"render": function(data, type, row, meta) {
return "<button type='button' class='btn btn-info btn-icon btn-sm' onclick='edit(" + data + ")'><i
    class='fa fa-edit'></i></button>&nbsp;&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-icon btn-sm'
  onclick='deleteData(" + data + ")'><i class='fa fa-trash'></i></button>&nbsp;&nbsp;&nbsp;";
}
}
],
order: [[0, 'desc']]
});

function edit(id){
console.log(id);
$('#newTransModal').modal('show');
$('#newTransModalLabel').html('Edit Data');
$('#btn_save').html('Ubah');
$.ajax({
type: 'post',
url: "{{URL::to('income')}}/"+ id,
method: "GET",
dataType: "json",
data: {
id: id,
_token: '{{ csrf_token() }}'
},
success: function(data) {
console.log(data);
$('#id').val(data.id);
$('#tanggal').val(data.date);
$('#terimaDari').val(data.assets);
$('#simpanKe').val(data.accounts);
$('#jumlah').val(data.total);
$('#keterangan').val(data.info);
}
});
}

let form = $('#form');
$('#form').submit(function(e) {
e.preventDefault();
$.ajax({
url: $('#form').attr('action'),
type: $('#form').attr('method'),
data: new FormData(this),
processData: false,
contentType: false,
cache: false,
async: false,
dataType: 'json',
success: function(response) {
console.log(response);
table.ajax.reload(null,false);
$('#newTransModal').modal('hide');
resetForm();
if(response.msg == 'Berhasil') {
Swal.fire(response.msg, response.info, response.icon);
} else if(response.msg == 'Gagal') {
Swal.fire(response.msg, response.info, response.icon)
}
// resetForm();
}
});
});

function deleteData(id){
console.log(id);
$('#modal_delete').modal('show');
$('#btn_delete').html('Hapus');
$('#removeDataForm').submit(function(e){
e.preventDefault();
let form = $(this);
$.ajax({
type: 'DELETE',
url: form.attr('action')+"/"+ id,
// dataType: "json",
data: {
_token: '{{ csrf_token() }}'
},
success: function(response) {
table.ajax.reload(null,false);
$('#modal_delete').modal('hide');

if(response.status == 1) {
Swal.fire(response.msg, response.info, response.icon);
} else {
Swal.fire(response.msg, response.info, response.icon);
}

}
});
})
}

function resetForm(){
$('#id').val('');
$('#tanggal').val('');
$('#terimaDari').val('');
$('#simpanKe').val('');
$('#jumlah').val('');
$('#keterangan').val('');
// $('#form').trigger('reset');
}

</script>
@endsection --}}