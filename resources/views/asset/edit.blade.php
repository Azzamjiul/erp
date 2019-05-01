{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Edit Asset</h1>
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="input-group-btn">
          <a href="{{route('asset.index')}}" class="btn btn-warning">Kembali</a>
        </div>
      </div>

      <div class="box-body">
      <form role="form" action="{{route('asset.update', $asset->id)}}" method="post">
          @csrf
          @method('PATCH')
          <!-- hidden input -->
          <input type="hidden" name="user_id" value="{{Auth::id()}}">
          <input type="hidden" name="company_id" value="{{Auth::user()->company_id}}">
          <div class="form-group">
            <label>Nama Asset</label>
            <input name="asset_name" type="text" class="form-control" placeholder="Masukkan Nama Asset" value="{{$asset->asset_name}}">
          </div>
          <div class="form-group">
            <label>Harga Asset</label>
            <input name="asset_cost" type="number" class="form-control" placeholder="Masukkan Harga Asset" value="{{$asset->asset_cost}}">
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input name="asset_quantity" type="number" class="form-control" placeholder="Masukkan Jumlah Asset" value="{{$asset->asset_quantity}}">
          </div>
          <div class="form-group">
            <label>Durasi Pakai</label>
            <input name="asset_duration" type="number" class="form-control" placeholder="Masukkan Masa Pakai Asset" value="{{$asset->asset_duration}}">
            <br>
            <select name="asset_duration_type" id="" class="form-control">
              <option value="{{$asset->asset_duration_type}}">{{ucfirst($asset->asset_duration_type)}}</option>
              @if($asset->asset_duration_type === 'tahun')
              <option value="bulan">Bulan</option>
              @else
              <option value="tahun">Tahun</option>
              @endif
            </select>
          </div>
          <div class="form-group">
            <label>Nilai Sisa</label>
            <input name="asset_salvation_value" type="number" class="form-control" placeholder="Masukkan Sisa Nilai Asset" value="{{$asset->asset_salvation_value}}">
          </div>


          <button type="submit" class="btn btn-success">Update Asset</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Menambah Asset</h4>
      </div>
      <div class="modal-body">
        <form role="form" action="{{route('asset.store')}}" method="post">
          @csrf
          <!-- hidden input -->
          <input type="hidden" name="user_id" value="{{Auth::id()}}">
          <input type="hidden" name="company_id" value="{{Auth::user()->company_id}}">
          <div class="form-group">
            <label>Nama Asset</label>
            <input name="asset_name" type="text" class="form-control" placeholder="Masukkan Nama Asset">
          </div>
          <div class="form-group">
            <label>Harga Asset</label>
            <input name="asset_cost" type="number" class="form-control" placeholder="Masukkan Harga Asset">
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input name="asset_quantity" type="number" class="form-control" placeholder="Masukkan Jumlah Asset">
          </div>
          <div class="form-group">
            <label>Durasi Pakai</label>
            <input name="asset_duration" type="number" class="form-control" placeholder="Masukkan Masa Pakai Asset">
            <select name="asset_duration_type" id="" class="form-control">
              <option value="tahun">Tahun</option>
              <option value="bulan">Bulan</option>
            </select>
          </div>
          <div class="form-group">
            <label>Nilai Sisa</label>
            <input name="asset_salvation_value" type="number" class="form-control" placeholder="Masukkan Sisa Nilai Asset">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tambah Modal</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  console.log('Hi!');
</script>
@stop