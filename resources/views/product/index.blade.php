{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Product</h1>
@stop

@section('')
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

@section('content')
<!-- <div class="container">
    <table id="dg" title="Product List" class="easyui-datagrid" method="get" url="getProduct" toolbar="#toolbar" rownumbers="true" fitColumns="true" singleSelect="true" style="width:550px;height:250px">
        <thead>
            <tr>
                <th field="product_item_barcode" width="50">Barcode</th>
                <th field="product_item_name" width="50">Product Name</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New User</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>
    </div>
</div> -->

<div class="container">
    <table title="Products" class="easyui-treegrid" method="get" style="width:700px;height:300px" url="getProduct" rownumbers="true" idField="id" treeField="name">
        <thead>
            <tr>
                <th field="name" width="250">Name</th>
                <th field="quantity" width="100" align="right">Quantity</th>
                <th field="price" width="150" align="right">Price</th>
                <th field="total" width="150" align="right">Total</th>
            </tr>
        </thead>
    </table>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="css/file-explore.css" rel="stylesheet">
<!-- Easy UI CSS -->
<link href="{{asset('vendor/jeasyui/themes/default/easyui.css')}}" rel="stylesheet">
<link href="{{asset('vendor/jeasyui/themes/icon.css')}}" rel="stylesheet">
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

<!-- Easy UI JS -->
<script type="text/javascript" src="{{asset('vendor/jeasyui/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/jeasyui/jquery.easyui.min.js')}}"></script>
@stop