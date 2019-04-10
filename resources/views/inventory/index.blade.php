{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Inventory</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
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