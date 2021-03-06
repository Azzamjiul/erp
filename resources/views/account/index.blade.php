{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Chart of Account</h1>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
            <div class="box-body table-responsive no-padding">
                <p id="judul"></p>
                <table id="dg" class="easyui-treegrid" style="width:100%;height:auto" url="getAccount" toolbar="#toolbar" method="get" idField="id" treeField="account_number" rownumbers="true" fitColumns="true">
                    <thead>
                        <tr>
                            <th field="account_number" width=""
                            style="display:block;" 
                            id="namaProduk">Akun</th>
                            <th field="account_name" width="auto">Nama</th>
                        </tr>
                    </thead>
                </table>
                <div id="toolbar">
                    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newAcc()">New Account</a>
                    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editAcc()">Edit Account</a>
                </div>

                <!-- add account -->
                <div id="accForm" class="easyui-dialog" style=" height:auto; padding: 10px 20px" closed="true" buttons="#dialog-buttons">
                    <form id="fm" method="post" novalidate>
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        <input type="hidden" name="company_id" value="{{Auth::user()->company_id}}">
                        <div class="form-item">
                            <label for="acc_group" style="font-size: 16px; margin-top: 10px">Account Group</label><br />
                            <input class="easyui-combobox cleared" name="account_description" data-options="
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
                            <input id="acc_parent" class="easyui-combobox cleared" name="parentId" data-options="
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
                            <input id="acc_code1" type="text" name="acc_code1" class="easyui-textbox cleared" required="true" maxlength="50" readonly="true" />
                            <br>
                            <br>
                            <input id="acc_code2" type="text" name="account_number" class="easyui-numerbox cleared" required="true" maxlength="50" />
                        </div>
                        <div class="form-item">
                            <label for="type" style="font-size: 16px; margin-top: 10px">Account Name</label><br />
                            <input type="text" name="account_name" class="easyui-validatebox cleared" required="true" style="width:100%;" maxlength="50" />
                        </div>
                        <br>
                    </form>
                </div>

                <!-- Dialog Button -->
                <div id="dialog-buttons">
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="save()">Save</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:jQuery('#accForm').dialog('close')">Cancel</a>
                </div>

                <!-- Dialog Button -->

            </div><!-- /.box-body -->
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

    <!-- Easy UI JS -->
    <script type="text/javascript" src="{{asset('vendor/jeasyui/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/jeasyui/jquery.easyui.min.js')}}"></script>
    <script type="text/javascript" src="js/screen.js"></script>

    <script type="text/javascript">
        function newAcc() {
            $('#accForm').dialog('open').dialog('setTitle', 'New Account');
            var token = $('#form input[name=_token]').val();
            $('.cleared').form('clear');
            $('#form input[name=_token]').val(token);
            url = '{{route('account.store')}}';
        }

        function save() {
            $('#form').form('submit', {
                url: url,
                onSubmit: function() {
                    return jQuery(this).form('validate');
                },
                success: function(result) {
                    // var result = eval('(' + result + ')');
                    if (result == 1) {
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

        function editAcc() {

            var row = $('#dg').datagrid('getSelected');
            console.log(row);

            if (row) {
                $('#accForm').dialog('open').dialog('setTitle', 'Edit Account');
                $('#fm').form('load', row);
                url = 'update_user.php?id=' + row.id;
            }
        }
    </script>
@stop