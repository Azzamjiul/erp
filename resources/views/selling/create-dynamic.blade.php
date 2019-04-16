{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Tambah Selling</h1>
@stop
@section('content')
    <script>
        var a = 1;
    </script>
    
    <form>
    <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Hover Data Table</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
              <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Rendering engine</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Browser</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Platform(s)</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Engine version</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">CSS grade</th></tr>
              </thead>
              <tbody id="tambah">
                  {{-- tambah data disini --}}
            </tbody>
              <tfoot>
              <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
              </tfoot>
            </table>
        </div>
        <div align="center">
            <a class="btn btn-primary" id="tambahdataclick">Tambah Data</a>
            <a class="btn btn-success">Simpan</a>
        </div>
    </div>
    </form>
      </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script>
        $('#tambahdataclick').click(function () {
            $( "#tambah" ).append( " <tr role='row' id='table"+a+"'> <td class='sorting_1'> <input type='text' class='form-control' name='nama[]'> </td> <td> <input type='text' class='form-control' name='umur[]'> </td> <td> <input type='text' class='form-control' name='email[]'> </td> <td> <input type='text' class='form-control' name='alamat[]'> </td> <td> <button onClick='hapus("+a+")' class='btn btn-xs btn-danger'>Hapus</button> </td> </tr>" );
            a++;
        });
        function hapus(index){
            $("#table"+index).remove();
        }
    </script>
@endsection