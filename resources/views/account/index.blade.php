{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Chart of Account</h1>
@stop

@section('')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                        Tambah Kode Akun
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
            <!-- /.box-header -->

            <div class="box-body">
                <ul class="file-tree">
                    <li><a href="#">Asset</a>
                        <ul>
                            <li><a href="#">Asset Lancar</a>
                                <ul>
                                    <li><a href="#link2">Link 2</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Asset Tetap</a>
                                <ul>
                                    <li><a href="#">Link 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Kewajiban</a>
                        <ul>
                            <li><a href="#">Link 1</a> </li>
                            <li><a href="#">Link 2</a> </li>
                            <li><a href="#">Link 3</a> </li>
                            <li><a href="#">Link 4</a> </li>
                        </ul>
                    </li>
                    <li><a href="#">Ekuitas</a>
                        <ul>
                            <li><a href="#">Link 1</a> </li>
                            <li><a href="#">Link 2</a> </li>
                            <li><a href="#">Link 3</a> </li>
                            <li><a href="#">Link 4</a> </li>
                        </ul>
                    </li>
                    <li><a href="#">Pendapatan</a>
                        <ul>
                            <li><a href="#">Link 1</a> </li>
                            <li><a href="#">Link 2</a> </li>
                            <li><a href="#">Link 3</a> </li>
                            <li><a href="#">Link 4</a> </li>
                        </ul>
                    </li>
                    <li><a href="#">Beban</a>
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
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Menambah Kode Akun</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <!-- text input -->
          <div class="form-group">
            <label>Account Group</label>
            <select name="" id="" class="form-control">
              <option value="">1 - Asset</option>
              <option value="">2 - Kewajiban</option>
              <option value="">3 - Ekuitas</option>
              <option value="">4 - Pendapatan</option>
              <option value="">5 - Beban</option>
            </select>
          </div>
          <div class="form-group">
            <label>Account Parent</label>
            <select name="" id="" class="form-control">
              <option value="">1-20101 Tanah</option>
              <option value="">1-20102 Bangunan</option>
              <option value="">3 - Ekuitas</option>
              <option value="">4 - Pendapatan</option>
              <option value="">5 - Beban</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" value="1-20101">
            <input type="text" class="">
          </div>
          <div class="form-group">
            <label>Account Name</label>
            <input type="text" class="form-control" placeholder="Masukkan Besar Modal">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tambah Kode Akun</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop

@section('content')
<div class="container">
    <table title="Account" class="easyui-treegrid" method="get" style="width:700px;height:300px" url="getAccount" rownumbers="true" idField="id" treeField="account_number">
        <thead>
            <tr>
                <th field="account_number" width="300">Account Number</th>
                <th field="account_name" width="100" align="right">Account Name</th>
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