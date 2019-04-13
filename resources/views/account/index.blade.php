{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Chart of Account</h1>
@stop


@section('content')
<div class="container">
    <table title="Account" class="easyui-treegrid" method="get" style="width:100%;height:100%" url="getAccount" rownumbers="true" idField="id" treeField="account_number" toolbar="#toolbar">
        <thead>
            <tr>
                <th field="account_number" width="300">Account Number</th>
                <th field="account_name" width="300" align="left">Account Name</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newAccount()">New Account</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>
    </div>
    <div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
        <div class="ftitle">Tambah Kode Akun</div>
        <form id="fm" method="post" novalidate>
            <div class="fitem form-group">
                <label>Account Parent   :</label>
                <input name="firstname" class="easyui-textbox" required="true">
            </div>
            <div class="fitem form-group">
                <label>Account Code     :</label>
                <input name="lastname" class="easyui-textbox" required="true">
            </div>
            <div class="fitem form-group">
                <label>Account Name     :</label>
                <input name="phone" class="easyui-textbox">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveAccount()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
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

<!-- Easy UI JS -->
<script type="text/javascript" src="{{asset('vendor/jeasyui/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/jeasyui/jquery.easyui.min.js')}}"></script>
<script type="text/javascript">
    function newAccount(){
        $('#dlg').dialog('open').dialog('setTitle','New Account');
        $('#fm').form('clear');
        url = 'save_user.php';
    }

    function saveAccount(){
        $('#fm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if (result.errorMsg){
                    $.messager.show({
                        title: 'Error',
                        msg: result.errorMsg
                    });
                } else {
                    $('#dlg').dialog('close');        // close the dialog
                    $('#dg').datagrid('reload');    // reload the user data
                }
            }
        });
    }

    var row = $('#dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('setTitle','Edit User');
        $('#fm').form('load',row);
        url = 'update_user.php?id='+row.id;
    }
</script>
@stop

