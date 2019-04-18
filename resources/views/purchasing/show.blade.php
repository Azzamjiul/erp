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
        <div class="input-group-btn">
          <button type="button" class="btn btn-warning">
            <a href="{{route('purchasing.index')}}" style="color:azure">Kembali</a>
          </button>
        </div>
      </div>

      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <th>No Pembelian</th>
            <th>No Detail</th>
            <th>Product Barcode</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Subtotal</th>
            <th>Tax</th>
            <th>Total</th>
          </thead>

          <tbody>
            @foreach($purchases as $purchase)
            <tr>
              <td>{{$purchase->purchase_order_no}}</td>
              <td>{{$purchase->purchase_order_no_detail}}</td>
              <td>{{$purchase->item_barcode}}</td>
              <td>{{$purchase->product_name}}</td>
              <td>{{$purchase->quantity}}</td>
              <td>{{$purchase->unit_price}}</td>
              <td>{{$purchase->subtotal}}</td>
              <td>{{$purchase->tax}}</td>
              <td>{{$purchase->subtotal + $purchase->tax}}</td>
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