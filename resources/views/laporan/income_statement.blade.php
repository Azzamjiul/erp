{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header text-center">
        <h2>Laporan Laba Rugi</h2>
      </div>

      <div class="box-body table-responsive">
        <div class="col-md-offset-2 col-md-8">
            <table class="table">
                <tbody>
                    <tr>
                        <th colspan="1"></th>
                        <td class="text-right">Saldo</td>
                    </tr>

                    <!-- pendapatan -->
                    <tr>
                        <td>Pendapatan</td>
                        <th colspan="1"></th>
                    </tr>
                    <tr>
                        <td colspan="1" style="padding-left:5%">Pendapatan dari Penjualan</td>
                        <th colspan="1"></th>
                        
                    </tr>
                        <!-- foreach di sini -->
                        @foreach($pendapatan_array as $pendapatan)
                        <tr>
                            <th colspan="1" style="padding-left:7%">{{$pendapatan->account_name}}</th>
                            <th colspan="1" class="text-right">{{$pendapatan->total_kredit - $pendapatan->total_debit}}</th>
                        </tr>
                        @endforeach
                        <!-- end foreach -->
                    <tr>
                        <td colspan="1" style="padding-left:5%">Total Pendapatan dari Penjualan</td>
                        @foreach($pendapatan_total as $pendapatan_total)
                        <th colspan="1" class="text-right">{{$pendapatan_total->total_kredit - $pendapatan_total->total_debit}}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Beban</td>
                        <th colspan="1"></th>
                    </tr>
                    <!-- end pendapatan -->

                    <!-- harga pokok penjualan -->
                    <tr>
                        <td colspan="1" style="padding-left:5%">Beban</td>
                        <th colspan="1"></th>
                    </tr>
                        <!-- foreach di sini -->
                        @foreach($beban_array as $beban)
                        <tr>
                            <th colspan="1" style="padding-left:7%">{{$beban->account_name}}</th>
                            <th colspan="1" class="text-right">{{$beban->total_kredit - $beban->total_debit}}</th>
                        </tr>
                        @endforeach
                        <!-- end foreach -->
                    <tr>
                        <td colspan="1" style="padding-left:5%">Total Beban</td>
                        @foreach($beban_total as $beban_total)
                        <th colspan="1" class="text-right">{{$beban_total->total_kredit - $beban_total->total_debit}}</th>
                        @endforeach
                    </tr>
                    <!-- end harga pokok penjualan -->

                    <!-- TOTAL-->
                    <br>

                    <tr>
                        <td colspan="1" style="padding-left:5%;background-color: #d9d9d9">Pendapatan Bersih</td>
                        <th colspan="1" style="background-color: #d9d9d9" class="text-right">{{($pendapatan_total->total_kredit - $pendapatan_total->total_debit) + ($beban_total->total_kredit - $beban_total->total_debit)}}</th>
                    </tr>
                    <!-- end harga pokok penjualan -->

                </tbody>
            </table>
        </div>
      </div>
    </div>
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