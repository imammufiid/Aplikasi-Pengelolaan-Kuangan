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
      <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" name="name">
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="card-footer">
      <button class="btn btn-primary">
        <i class="fa fa-share-square"></i> Save
      </button>
    </form>
  </div>
</div>
@endsection