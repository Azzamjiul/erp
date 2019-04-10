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
            <th>Customer</th>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Subtotal</th>
            <th>Tax</th>
            <th>Total</th>
          </thead>

          <tbody>
            <tr>
                <td>PO201904041</td>
                <td>PO2019040410001</td>
                <td>Customer 1</td>
                <td>89686041705-1</td>
                <td>INDOMIE GORENG SPESIAL JUMBO</td>
                <td>120</td>
                <td>Rp 3.500</td>
                <td>Rp 420.000</td>
                <td>Rp 42.000</td>
                <td>Rp 462.000</td>
            </tr>
            <tr>
                <td>PO201904042</td>
                <td>PO2019040410001</td>
                <td>Customer 1</td>
                <td>89686011982-1</td>
                <td>INDOMIE GORENG VEGAN 5'S</td>
                <td>100</td>
                <td>Rp 3.000</td>
                <td>Rp 300.000</td>
                <td>Rp 30.000</td>
                <td>Rp 330.000</td>
            </tr>
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