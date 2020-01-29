@extends('template/main')

@section('content')
<div class="row">
    <div class="col-lg-3 mb-4">
    <a href="{{route('income.index')}}" class="btn btn-success" id="tambahPemasukan">Kembali</a>
    </div>
</div>

<div class="card">
  <div class="card-header">
    Tambah Pemasukkan
  </div>
  <?php dd($income)?>
  <form action="{{route('income.update', $income->id)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="card-body">
      <div class="form-group">
        <label for="">Tanggal</label>
        <input type="text" class="form-control datepicker-exec @error('date') is-invalid @enderror" name="date" value="{{$income->date}}">
        @error('date')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Aset</label>
        <select type="text" class="form-control @error('assets') is-invalid @enderror" name="assets" value="{{old('assets')}}">
          <option value selected disabled>-- Pilih --</option>
          @foreach ($accounts as $account)
            <option value="{{$account->kode}}" @if ($income->assets == $account->kode)
                {{ "selected" }}
            @endif >{{$account->kode. ' - '.$account->account}}</option>  
          @endforeach
        </select>
        @error('asset')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Akun</label>
        <select type="text" class="form-control @error('accounts') is-invalid @enderror" name="accounts" value="{{old('accounts')}}">
          <option value selected disabled>-- Pilih --</option>
          @foreach ($assets as $asset)
            <option value="{{$asset->kode}}" @if ($income->accounts == $asset->kode)
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
        <input type="number" class="form-control @error('total') is-invalid @enderror" value="{{$income->total}}" name="total">
        @error('total')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Keterangan</label>
        <textarea name="info" id="" class="form-control @error('info') is-invalid @enderror" value="">{{$income->info}}</textarea>
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