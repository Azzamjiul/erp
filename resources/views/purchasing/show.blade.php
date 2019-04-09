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
            <th>No Pembelian</th>
            <th>No Detail</th>
            <th>Supplier</th>
            <th>Product Barcode</th>
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
                <td>Supplier 1</td>
                <td>89686041705</td>
                <td>INDOMIE GORENG SPESIAL JUMBO</td>
                <td>120</td>
                <td>Rp 2.000</td>
                <td>Rp 240.000</td>
                <td>Rp 24.000</td>
                <td>Rp 264.000</td>
            </tr>
            <tr>
                <td>PO201904042</td>
                <td>PO2019040410001</td>
                <td>Supplier 1</td>
                <td>89686011982</td>
                <td>INDOMIE GORENG VEGAN 5'S</td>
                <td>100</td>
                <td>Rp 2.000</td>
                <td>Rp 200.000</td>
                <td>Rp 20.000</td>
                <td>Rp 220.000</td>
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