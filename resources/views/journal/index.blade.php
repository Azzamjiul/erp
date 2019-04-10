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
            Tambah Jurnal
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

      <div class="box-body table-responsive">
        <table class="table table-hover table-bordered">
          <thead>
            <th>Date</th>
            <th>Nomor Jurnal</th>
            <th>Akun Debit</th>
            <th>Akun Kredit</th>
            <th>Kode Akun</th>
            <th>Debit</th>
            <th>Kredit</th>
          </thead>

          <tbody>
            <tr>
              <td>04 April 2019</td>
              <td>J201904040000001</td>
              <td>Persediaan Barang Dagangan</td>
              <td></td>
              <td>1-10201</td>
              <td>Rp 720.000</td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td>J201904040000002</td>
              <td>Beban Angkut Pembelian</td>
              <td></td>
              <td>5-10002</td>
              <td>Rp 0</td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td>J201904040000003</td>
              <td>PPN Masukan</td>
              <td></td>
              <td>1-10301</td>
              <td>Rp 72.000</td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td>J201904040000004</td>
              <td></td>
              <td>Kas</td>
              <td>1-10001</td>
              <td></td>
              <td>Rp 792.000</td>
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
        <h4 class="modal-title">Form Menambah Jurnal</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <!-- text input -->
          <div class="form-group">
            <label>Jenis Akun</label>
            <select name="" id="" class="form-control">
              <option value="">Debit</option>
              <option value="">Kredit</option>
            </select>
          </div>
          <div class="form-group">
            <label>Akun</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama Akun">
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" placeholder="Masukkan Besar Akun">
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