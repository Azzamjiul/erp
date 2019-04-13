{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Supplier</h1>
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        {{-- <h3 class="box-title">Daftar Supplier</h3> --}}
        <div class="input-group-btn">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            Tambah Supplier
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
            <th>Nama Supplier</th>
            <th>Email</th>
            <th>Telpon</th>
            <th>Alamat</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </thead>

          <tbody>
          <?php $i = 1; ?>
            @if(count($assets))
            @foreach($assets as $asset)
            <tr>
              <td>{{ $i, $i++ }}</td>
              <td>{{$asset->asset_name}}</td>
              <td>{{$asset->asset_cost}}</td>
              <td>{{$asset->asset_quantity}}</td>
              <td>{{$asset->asset_duration}} {{$asset->asset_duration_type}}</td>
              <td>{{$asset->asset_salvation_value}}</td>
              <td>
                <a href="{{route('asset.edit', $asset->id)}}" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a>
                {!! Form::open(array('route' => array('asset.destroy', $asset->asset_id),'method' => 'delete','style' => 'display:inline')) !!}
                <button class='btn btn-sm btn-danger delete-btn' type='submit'>
                  <i class='fa fa-times-circle'></i> Delete
                </button>
                {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="">Tidak Ada Data</td>
            </tr>
            @endif
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
        <h4 class="modal-title">Form Menambah Supplier</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <!-- text input -->
          <div class="form-group">
            <label>Nama Supplier</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama Supplier">
          </div>
          <div class="form-group">
            <label>Email Supplier</label>
            <input type="email" class="form-control" placeholder="Masukkan Harga Supplier">
          </div>
          <div class="form-group">
            <label>Telpon</label>
            <input type="number" class="form-control" placeholder="Masukkan Jumlah Supplier">
          </div>
          <div class="form-group">
            <label>Alamat Supplier</label>
            <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Deskripsi Supplier</label>
            <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tambah Supplier</button>
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