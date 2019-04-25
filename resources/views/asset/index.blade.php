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
        <div class="x" style="display:block;">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control pull-right" name="table_search" placeholder="search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
        <br>
        <br>
        <h3 class="box-title" style="display:block;">Daftar Asset</h3>
        <br>
        <div class="input-group-btn" style="display:block;">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            Tambah Asset
          </button>
        </div>
      </div>

      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <th>NO</th>
            <th>Nama Asset</th>
            <th>Harga Asset</th>
            <th>Jumlah</th>
            <th>Durasi</th>
            <th>Nilai Sisa</th>
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
                {!! Form::open(array('route' => array('asset.destroy', $asset->id),'method' => 'delete','style' => 'display:inline')) !!}
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


          <button type="submit" class="btn btn-primary">Tambah Asset</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
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