@extends('template/main')

@section('content')

<div class="row">
    <div class="col-lg-3 mb-4">
    <a href="{{route('users.index')}}" class="btn btn-success" id="editUser">Kembali</a>
    </div>
</div>

<div class="card">
  <div class="card-header">
    Edit User
  </div>
  
  <form action="{{route('users.update', $user->id)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="card-body">
  <input type="hidden" name="password" value="{{$user->password}}">
      <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" name="name">
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" name="email" readonly>
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Role</label>
        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
          @if ($user->role == "admin")
            <option value="admin" selected>Admin</option>
            <option value="user">User</option>
          @else
            <option value="admin">Admin</option>
            <option value="user" selected>User</option>
          @endif
        </select>
        @error('status')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Status</label>
        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
          @if ($user->status == 1)
            <option value="1" selected>Aktif</option>
            <option value="0">Non-Aktif</option>
          @else
            <option value="1">Aktif</option>
            <option value="0" selected>Non-Aktif</option>
          @endif
        </select>
        @error('status')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    <div class="card-footer">
      <button class="btn btn-primary">
        <i class="fa fa-share-square"></i> Save
      </button>
    </form>
  </div>
</div>
@endsection