@extends('template/main')

@section('content')
<div class="row">
    <div class="col-lg-3 mb-4">
    <a href="{{route('spending.index')}}" class="btn btn-success" id="tambahPengeluaran">Kembali</a>
    </div>
</div>

<div class="card">
  <div class="card-header">
    Edit Pengeluaran
  </div>
  <form action="{{route('spending.update', $spending->id)}}" method="POST">
  @csrf
  @method('PUT')
  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
  <div class="card-body">
      <div class="form-group">
        <label for="">Tanggal</label>
        <input type="text" class="form-control datepicker-exec @error('date') is-invalid @enderror" name="date" value="{{$spending->date}}">
        @error('date')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Aset</label>
        <select type="text" class="form-control @error('accounts') is-invalid @enderror" name="accounts" value="{{old('accounts')}}">
          <option value selected disabled>-- Pilih --</option>
          @foreach ($assets as $asset)
            <option value="{{$asset->id}}" @if ($spending->asset_id == $asset->id)
                {{"selected"}}
            @endif >{{$asset->kode. ' - '.$asset->asset}}</option>  
          @endforeach
        </select>
        @error('account')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Jumlah</label>
        <input type="number" class="form-control @error('total') is-invalid @enderror" value="{{$spending->total}}" name="total">
        @error('total')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Keterangan</label>
        <textarea name="info" id="" class="form-control @error('info') is-invalid @enderror" value="">{{$spending->info}}</textarea>
        @error('info')
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