{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Selling</h1>
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        {{-- <h3 class="box-title">Daftar Selling</h3> --}}
        <div class="input-group-btn">
          <a href="{{route('selling.create')}}" >
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            Tambah Selling
            </button>
          </a>
        </div>
      </div>

      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <th>Tanggal</th>
            <th>No Penjualan</th>
            <th>Customer</th>
            <th>Casheer</th>
            <th>Subtotal</th>
            <th>Tax</th>
            <th>Total</th>
            <th>Action</th>
          </thead>

          <tbody>
          @foreach($sales as $sale)
            <tr>
              <td>{{$sale->created_at->format('d-m-Y')}}</td>
              <td>S{{$sale->sales_order_no}}</td>
              <td>{{$sale->customer_id}}</td>
              <td>{{$sale->user_id}}</td>
              <td>{{$sale->total}}</td>
              <td>10%</td>
              <td>{{$sale->total*1.1}}</td>
              <td><a class="btn btn-primary" href="{{ route('selling.show',$sale->sales_order_no) }}"><i class="fa fa-eye"></i></a></td>
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