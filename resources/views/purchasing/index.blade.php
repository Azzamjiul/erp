{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Purcashing</h1>
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        {{-- <h3 class="box-title">Daftar Purchasing</h3> --}}
        @if(Session::has('message'))
          <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <div class="input-group-btn">
          <a href="{{route('purchasing.create')}}" >
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            Tambah Purchasing
            </button>
          </a>
        </div>
      </div>

      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <th>Tanggal</th>
            <th>No Pembelian</th>
            <th>Total</th>
            <th>Action</th>
          </thead>

          <tbody>
            @foreach($datas as $data)
            <tr>
              <td colspan="1">{{$data->created_at->format('d-m-Y')}}</td>
              <td colspan="1">{{$data->purchase_order_no}}</td>
              <td colspan="1">{{1.1*$data->total}}</td>
              <td colspan="1"><a class="btn btn-primary" href="{{route('purchasing.show',$data->purchase_order_no)}}">Detail</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  console.log('Hi!');
</script>
@stop