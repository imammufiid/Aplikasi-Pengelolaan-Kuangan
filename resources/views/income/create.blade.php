@extends('template/main')

@section('content')
<div class="row">
    <div class="col-lg-3 mb-4">
    <a href="{{route('income.index')}}" class="btn btn-success" id="tambahPemasukan">Kembali</a>
    </div>
</div>

<div class="card">
  <div class="card-header">
    Pemasukkan
  </div>
  <form action="{{route('income.store')}}" method="POST">
  @csrf
  <div class="card-body">
      <div class="form-group">
        <label for="">Tanggal</label>
        <input type="text" class="form-control datepicker-exec @error('date') is-invalid @enderror" name="date" id="tanggal" value="{{old('date')}}">
        @error('date')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Aset</label>
        <select type="text" class="form-control @error('account_id') is-invalid @enderror" name="account_id" >
          <option value selected disabled>-- Pilih --</option>
          @foreach ($accounts as $account)
            <option value="{{$account->id}}">{{$account->kode. ' - '.$account->account}}</option>  
          @endforeach
        </select>
        @error('account_id')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Akun</label>
        <select type="text" class="form-control @error('asset_id') is-invalid @enderror" name="asset_id" ">
          <option value selected disabled>-- Pilih --</option>
          @foreach ($assets as $asset)
            <option value="{{$asset->id}}">{{$asset->kode. ' - '.$asset->asset}}</option>  
          @endforeach
        </select>
        @error('asset_id')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Jumlah</label>
        <input type="number" class="form-control @error('total') is-invalid @enderror" value="{{old('total')}}" name="total">
        @error('total')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Keterangan</label>
        <textarea name="info" id="" class="form-control @error('info') is-invalid @enderror" value="{{old('total')}}"></textarea>
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

@section('js')
    <script>
    // script untuk datepicker
    $('.datepicker-exec').datepicker({
        format: "dd / mm / yyyy",
        autoclose: true
    });</script>
@endsection