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

@section('')
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

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="row">
    <div class="col-xs-12 col-lg-12">
        <div class="box">
            <div class="box-body table-responsive no-padding">
                <table id="laporan" class="easyui-treegrid" style="width:auto;height:450px" url="getProduct" toolbar="#toolbar" method="get" idField="id" treeField="product_name" rownumbers="true" fitColumns="true">
                    <thead>
                        <tr>
                            <th field="product_name" width="50">Nama Produk</th>
                        </tr>
                    </thead>
                </table>
                <div id="toolbar">
                    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newAcc()">Add Product</a>
                    <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editComp()">Edit Company</a> -->
                    <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove Company</a> -->
                </div>

                <!-- add account -->
                <div id="accForm" class="easyui-dialog" style="width:50%; height:auto; padding: 10px 20px" closed="true" buttons="#dialog-buttons">
                    <form id="form" method="post" novalidate>
                        <div class="form-item">
                            <label for="acc_group" style="font-size: 16px; margin-top: 10px">Account Group</label><br />
                            <input class="easyui-combobox" name="acc_group" data-options="
                            valueField:'account_number', 
                            textField:'text', 
                            url:'getAccountGroup', 
                            panelHeight:'auto', 
                            editable:false, 
                            onSelect: function(rec){
                              var url = 'getAccountDetail/'+rec.account_number;
                              $('#acc_parent').combobox('reload', url);
                            }" required="true" style="width:100%;" method="get" />
                        </div>
                        <div class="form-item">
                            <label for="acc_parent" style="font-size: 16px; margin-top: 10px">Account Parent</label><br />
                            <input id="acc_parent" class="easyui-combobox" name="acc_parent" data-options="
                            valueField:'account_number', 
                            textField:'text', 
                            panelHeight:'auto', 
                            editable:false,
                            onSelect: function(rec){
                              $('#acc_code1').textbox('setValue', rec.account_number);
                            }" required="true" style="width:100%;" method="get" />
                        </div>
                        <div class="form-item">
                            <label for="type" style="font-size: 16px; margin-top: 10px">Account Code</label><br />
                            <input id="acc_code1" type="text" name="acc_code1" class="easyui-textbox" required="true" maxlength="50" readonly="true" />
                            <input id="acc_code2" type="text" name="acc_code2" class="easyui-numerbox" required="true" maxlength="50" />
                        </div>
                        <div class="form-item">
                            <label for="type" style="font-size: 16px; margin-top: 10px">Account Name</label><br />
                            <input type="text" name="acc_name" class="easyui-validatebox" required="true" style="width:100%;" maxlength="50" />
                        </div>
                    </form>
                </div>

                <!-- Dialog Button -->
                <div id="dialog-buttons">
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="save()">Save</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:jQuery('#accForm').dialog('close')">Cancel</a>
                </div>

                <!-- Dialog Button -->

            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="row">
            <div class="col-md-12 text-center">
                <?php
                ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            function newAcc() {
                        $('#accForm').dialog('open').dialog('setTitle', 'New Account');
                        $('#form').form('clear');
                        url = '#';
            }

            function save() {
                        jQuery('#form').form('submit', {
                            url: url,
                            onSubmit: function() {
                                return jQuery(this).form('validate');
                            },
                            success: function(result) {
                                var result = eval('(' + result + ')');
                                if (result.success) {
                                    jQuery('#accForm').dialog('close');
                                    jQuery('#laporan').treegrid('reload');
                                    $.messager.alert({
                                        title: 'Berhasil',
                                        msg: 'Berhasil memasukkan data!',
                                        icon: 'info'
                                    });
                                } else {
                                    $.messager.alert({
                                        title: 'Error',
                                        msg: result.msg,
                                        icon: 'error'
                                    });
                                }
                            }
                        });
            }
        });
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- Easy UI CSS -->
    <link href="{{asset('vendor/jeasyui/themes/default/easyui.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/jeasyui/themes/icon.css')}}" rel="stylesheet">
@stop

@section('js')
    <!-- Easy UI JS -->
    <script type="text/javascript" src="{{asset('vendor/jeasyui/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/jeasyui/jquery.easyui.min.js')}}"></script>
@stop