{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Product</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Product List</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <ul class="file-tree">
                    <li><a href="#">Makanan</a>
                        <ul>
                            <li><a href="#">Mie</a>
                                <ul>
                                    <li><a href="#link2">89686041705 - INDOMIE GORENG SPESIAL JUMBO</a></li>
                                    <li><a href="#link2">89686011982 - INDOMIE GORENG VEGAN 5'S</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Snack</a>
                                <ul>
                                    <li><a href="#">89686611519 - QTELA SINGKONG ORIGINAL 60G</a></li>
                                    <li><a href="#">8997004301146 - OISHI RIN BEE KEJU</a></li>
                                    <li><a href="#">89686600247 - CHEETOS JAGUNG BAKAR 40G</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Minuman</a>
                        <ul>
                            <li><a href="#">Link 1</a> </li>
                            <li><a href="#">Link 2</a> </li>
                            <li><a href="#">Link 3</a> </li>
                            <li><a href="#">Link 4</a> </li>
                        </ul>
                    </li>
                    <li><a href="#">Elektronik</a>
                        <ul>
                            <li><a href="#">Link 1</a> </li>
                            <li><a href="#">Link 2</a> </li>
                            <li><a href="#">Link 3</a> </li>
                            <li><a href="#">Link 4</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@stop

@section('')

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="css/file-explore.css" rel="stylesheet">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>

// file-exploler tree
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="js/file-explore.js"></script>
<script>
    $(document).ready(function() {
        $(".file-tree").filetree();
    });

    $(document).ready(function() {
        $(".file-tree").filetree({
            animationSpeed: 'fast'
        });
    });

    $(document).ready(function() {
        $(".file-tree").filetree({
            collapsed: true,
        });
    });
</script>
@stop