@extends('template/main')

@section('content')

<!-- <div class="tabel-user" style="max-width: 1200p"> -->
@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif
<div class="table-responsive tabel-user">
  <table class="table table-hover col-lg-12 table-bordered table-striped dataTables" id="table-data">
      <thead>
        <tr>
          <th scope="col" class="text-center" style="width:5%">#</th>
          <th scope="col" class="text-center" style="width:10%">Nama</th>
          <th scope="col" class="text-center" style="width:10%">Email</th>
          <th scope="col" class="text-center" style="width:10%">Verifikasi</th>
          <th scope="col" class="text-center" style="width:10%">Dibuat Pada</th>
          <th scope="col" class="text-center" style="width:10%">Status</th>

          {{-- @if (Auth::check()) --}}
            <th scope="col" class="text-center" style="width:10%">Aksi</th>  
          {{-- @endif --}}
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $val)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$val->name}}</td>
            <td>{{$val->email}}</td>
            <td>{{$val->email_verified_at}}</td>
            <td>{{$val->created_at}}</td>
            <td>{{$val->remember_token}}</td>
            <td>
              <form action="{{route('users.destroy', $val->id)}}" method="POST">
                {{-- @if (Auth::check()) --}}
                  <a class="btn btn-success btn-sm" href="{{ route('users.edit', $val->id) }}">
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
