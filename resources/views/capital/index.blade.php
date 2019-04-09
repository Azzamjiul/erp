{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Modal</h1>
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="input-group-btn">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            Tambah Modal
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
            <th>Nomor Akun</th>
            <th>Modal</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>1-1000</td>
              <td>Modal Pak Budi</td>
              <td>Rp 10.000.000</td>
              <td>11-7-2014</td>
              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
            </tr>
            <tr>
              <td>2</td>
              <td>1-1000</td>
              <td>Modal Pak Budi</td>
              <td>Rp 10.000.000</td>
              <td>11-9-2014</td>
              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
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
        <h4 class="modal-title">Form Menambah Modal</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <!-- text input -->
          <div class="form-group">
            <label>Jenis Modal</label>
            <select name="" id="" class="form-control">
              <option value="">Jenis 1</option>
              <option value="">Jenis 2</option>
            </select>
          </div>
          <div class="form-group">
            <label>Modal</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama Modal">
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" placeholder="Masukkan Besar Modal">
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