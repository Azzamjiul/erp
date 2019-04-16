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
            <!-- <input type="text" class="form-control pull-right" name="table_search" placeholder="search"> -->
            <div class="input-group-btn">
              <!-- <button class="btn btn-default" type="submit"> -->
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
            <th>Tanggal</th>
            <th>Modal</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
          </thead>
          
          <tbody>
          @if(count($capitals))
            <?php $i = 1; ?>
            @foreach($capitals as $capital)
            <tr>
              <td>{{$i, $i++}}</td>
              <td>{{$capital->created_at}}</td>
              <td>{{$capital->capital_name}}</td>
              <td>Rp {{$capital->capital_amount}}</td>
              <td>{{$capital->explanation}}</td>
            </tr>
            @endforeach
          @else
            <tfoot>
              <td colspan="6">Tidak Ada Data</td>
            </tfoot>
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
        <h4 class="modal-title">Form Menambah Modal</h4>
      </div>
      <div class="modal-body">
        <form role="form" action="{{route('capital.store')}}" method="post">
          @csrf
          <!-- hidden input -->
          <input type="hidden" name="user_id" value="{{Auth::id()}}">
          <input type="hidden" name="company_id" value="{{Auth::user()->company_id}}">
          <div class="form-group">
            <label>Modal</label>
            <input name="capital_name" type="text" class="form-control" placeholder="Masukkan Nama Modal">
          </div>

          <div class="form-group">
            <label>Jumlah</label>
            <input name="capital_amount" type="number" class="form-control" placeholder="Masukkan Besar Modal">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <textarea name="explanation" id="" cols="30" rows="5" class="form-control"></textarea>
          </div>

          <button class="btn btn-primary" type="submit">Tambah Modal</button>
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