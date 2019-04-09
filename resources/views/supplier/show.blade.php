{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Profil Supplier 1</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

                <h3 class="profile-username text-center">Supplier 1</h3>

                <p class="text-muted text-center">Supplier Makanan Ringan</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                    <b>Produk</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                    <b>Point</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                    <b>Supplier ID</b> <a class="pull-right">13,287</a>
                    </li>
                </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
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