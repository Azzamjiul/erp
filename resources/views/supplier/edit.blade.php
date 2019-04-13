{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Edit Supplier</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="input-group-btn">
                    <a href="{{route('supplier.index')}}" class="btn btn-warning">Kembali</a>
                </div>
            </div>

            <div class="box-body">
                <form role="form" action="{{route('supplier.update', $supplier->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <!-- hidden input -->
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                    <input type="hidden" name="company_id" value="{{Auth::user()->company_id}}">
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input name="supplier_name" type="text" class="form-control" placeholder="Masukkan Nama Supplier" value="{{$supplier->supplier_name}}">
                    </div>
                    <div class="form-group">
                        <label>Email Supplier</label>
                        <input name="supplier_email" type="email" class="form-control" placeholder="Masukkan Harga Supplier" value="{{$supplier->supplier_email}}">
                    </div>
                    <div class="form-group">
                        <label>Telpon</label>
                        <input name="supplier_phone" type="number" class="form-control" placeholder="Masukkan Jumlah Supplier" value="{{$supplier->supplier_phone}}">
                    </div>
                    <div class="form-group">
                        <label>Alamat Supplier</label>
                        <textarea name="supplier_address" id="" cols="30" rows="3" class="form-control">{{$supplier->supplier_address}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Supplier</label>
                        <textarea name="supplier_description" id="" cols="30" rows="3" class="form-control">{{$supplier->supplier_description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Supplier</button>
                </form>
            </div>
        </div>
    </div>
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