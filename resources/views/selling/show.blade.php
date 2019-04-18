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
          <button type="button" class="btn btn-warning">
            <a href="{{route('selling.index')}}" style="color:azure">Kembali</a>
          </button>
        </div>
      </div>

      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <thead>
            <th>No Penjualan</th>
            <th>No Detail</th>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Subtotal</th>
            <th>Tax</th>
            <th>Total</th>
          </thead>

          <tbody>
          @foreach($sale_details as $sale_detail)
            <tr>
                <td>{{$sale_detail->sales_order_no}}</td>
                <td>{{$sale_detail->sales_order_no_detail}}</td>
                <td>{{$sale_detail->product_code}}</td>
                <td>{{$sale_detail->inventory_item_name}}</td>
                <td>{{$sale_detail->quantity}}</td>
                <td>{{$sale_detail->unit_price}}</td>
                <td>{{$sale_detail->subtotal}}</td>
                <td>{{$sale_detail->subtotal*0.1}}</td>
                <td>{{$sale_detail->subtotal*1.1}}</td>
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