{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Tambah Pembelian</h1>
@stop

@section('content')
<div class="row">
  <form action="{{route('purchasing.store')}}" method="POST" id='tambahpembelian'>
    @csrf
    <div class="col-xs-12">
    <input type='hidden' class='form-control' name='user_id' value="{{Auth::user()->id}}">
    <input type='hidden' class='form-control' name='company_id' value="{{Auth::user()->company_id}}" >
    <input type='hidden' class='form-control' name='banyak_barang' id="banyak_barang">

      <div class="box">
        <div class="box-header">
          {{-- <h3 class="box-title">Tambah Purchasing</h3> --}}
          <div class="input-group-btn">
            <button type="button" class="btn btn-warning">
              <a href="{{route('purchasing.index')}}" style="color:azure">Kembali</a>
            </button>
          </div>
        </div>

        <div class="box-body">
            <div class="form-group">
              <label for="">Supplier</label>
              <select name="supplier_id" id="" class="form-control">
                @foreach($suppliers as $supplier)
                <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="">Jenis Ongkir</label>
              <select name="shipping_type" id="" class="form-control">
                <option value="1">Shipping Point</option>
                <option value="2">Destination Point</option>
              </select>
            </div>

            <div class="form-group">
              <label for="">Besar Ongkos Kirim</label>
              <input name="shipping_charge" type="text" class="form-control" required>
            </div>
        </div>


      </div>

      <script>
        var a = 0;
        var test_qty = 0
      </script>

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Detail Pembelian</h3>
        </div>

        <div class="box-body">
          <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
              <div class="col-sm-6"></div>
              <div class="col-sm-6"></div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                  <table id="table" class="table table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                      <tr role="row">
                        <th rowspan="1" colspan="1">Nama Barang</th>
                        <th rowspan="1" colspan="1">Jumlah</th>
                        <th rowspan="1" colspan="1">Harga Satuan</th>
                        <th rowspan="1" colspan="1">Subtotal</th>
                        <th rowspan="1" colspan="1">Actions</th>
                      </tr>
                    </thead>

                    <tbody id="data">
                      {{-- tambah data disini --}}
                    </tbody>

                    <tfoot>
                      <th colspan="3" style="text-align:right;">Total</th>
                      <th colspan="2">
                        <input type='text' class='total form-control' id='totaltampil' disabled>
                        <input type='hidden' class='total form-control' name='totalharga' id="total">
                      </th>
                    </tfoot>

                  </table>
                </div>
              </div>

              <div align="center">
                <a class="btn btn-primary" id="tambahdataclick">Tambah Data</a>
                <button type="submit" class="btn btn-success">Send</button>
              </div>

            </div>
          </div>
        </div>
      </div>
  </form>
</div>
@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script>
          $('#table').on('keyup', '.unit_price, .quantity, .subtotal', calculateRow);
          $('#table').on('keyup', '.unit_price, .quantity, .subtotal', hoho);

          $('#tambahdataclick').click(function() {
            $("#table").append("<tr role='row' id='table" + a + "'> <td> <select name='item_barcode[]'> @foreach($products as $product) <option value='{{$product->barcode}}'>{{$product->product_name}}</option> @endforeach </select> </td> <td> <input required type='text' class='quantity form-control' id='jumlahbarang"+ a +"' name='quantity[]'> </td> <td> <input required type='text' class='unit_price form-control' id='hargabarang"+ a +"' name='unit_price[]'> </td> <td> <input type='text' class='cal subtotal form-control' id='subtotalbarang"+ a +"' name='subtotal[]'> </td> <td> <button onClick='hapus(" + a + ")' class='btn btn-xs btn-danger form-control'>Hapus</button> </td></tr>");
            a++;
          });

          function hoho(){
            test_qty = 0;
            $("input[name^='subtotal']").each(function() { 
                test_qty +=parseInt($(this).val(), 10)  
            })
            $('#totaltampil').val(1.1*test_qty);
            $('#total').val(test_qty);
            $('#banyak_barang').val(a);
          }
      
          function calculateSum() {
              var sum = 0;
              $(".cal").each(function () {
                  if (!isNaN(this.value) && this.value.length != 0) {
                      sum += parseFloat(this.value);
                  }
              });
          }

          function calculateRow() {
              var cost = 0;
              var $row = $(this).closest("tr");
              var qty = parseFloat($row.find('.quantity').val());

              // changed the following line to only look within the current row
              var rate = parseFloat($row.find('.unit_price').val());

              cost = qty * rate;

              if (isNaN(cost)) {
                  $row.find('.cal').val("0");
              } else {
                  $row.find('.cal').val(cost);
              }
              calculateSum();
          }

          function hapus(index) {
            $("#table" + index).remove();
          }

  </script>
@stop
       