{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Asset</h1>
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        {{-- <h3 class="box-title">Daftar Asset</h3> --}}
        <div class="input-group-btn">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            Tambah Asset
          </button>
        </div>
        <div class="box-tools">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control pull-right" name="table_search" placeholder="search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <th>NO</th>
            <th>Nama Asset</th>
            <th>Harga Asset</th>
            <th>Jumlah</th>
            <th>Durasi (tahun)</th>
            <th>Nilai Sisa</th>
            <th>Rasio Depresiasi (%)</th>
            <th>Depresiasi per Tahun</th>
            <th>Aksi</th>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>Gedung Toko</td>
              <td>500.000.000</td>
              <td>2</td>
              <td>10</td>
              <td>50.000.000</td>
              <td>5</td>
              <td>22.500.000</td>
              <td><button class="btn btn-danger">Delete</button></td>
            </tr>
          </tbody>
        </table>
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
        <form role="form">
          <!-- text input -->
          <div class="form-group">
            <label>Nama Asset</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama Asset">
          </div>
          <div class="form-group">
            <label>Harga Asset</label>
            <input type="number" class="form-control" placeholder="Masukkan Harga Asset">
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" placeholder="Masukkan Jumlah Asset">
          </div>
          <div class="form-group">
            <label>Durasi Pakai</label>
            <input type="number" class="form-control" placeholder="Masukkan Masa Pakai Asset">
          </div>
          <div class="form-group">
            <label>Rasio Depresiasi</label>
            <input type="number" class="form-control" placeholder="Masukkan Rasio Depresiasi Asset">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tambah Asset</button>
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