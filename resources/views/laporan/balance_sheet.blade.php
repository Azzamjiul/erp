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
        <h2>Laporan Balance Sheet</h2>
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
                        <td  style="background-color: #d9d9d9" colspan="2">Aktiva</td>
                        <?php $total_aktiva = 0; ?>
                    </tr>
                        <tr>
                            <td colspan="1" style="padding-left:5%">Aktiva Lancar</td>
                            <th colspan="1"></th>
                            
                        </tr>
                            <!-- foreach di sini -->
                            @foreach($aktiva_lancar as $aktiva_lancar)
                            <tr>
                                <th colspan="1" style="padding-left:7%">{{$aktiva_lancar->account_name}}</th>
                                <th colspan="1" class="text-right">{{$aktiva_lancar->total_debit - $aktiva_lancar->total_kredit}}</th>
                                
                            </tr>
                            @endforeach
                            <!-- end foreach -->
                        <tr>
                            <td colspan="1" style="padding-left:5%">Total Aktiva Lancar</td>
                            @foreach($aktiva_lancar_total as $aktiva_lancar_total)
                            <th colspan="1" class="text-right">{{$aktiva_lancar_total->total_debit - $aktiva_lancar_total->total_kredit}}</th>
                            <?php $total_aktiva += $aktiva_lancar_total->total_debit - $aktiva_lancar_total->total_kredit; ?>
                            @endforeach
                        </tr>
                        
                        <tr>
                            <td colspan="1" style="padding-left:5%">Aktiva Tetap</td>
                            <th colspan="1"></th>
                            
                        </tr>
                            <!-- foreach di sini -->
                            @foreach($aktiva_tetap as $aktiva_tetap)
                            <tr>
                                <th colspan="1" style="padding-left:7%">{{$aktiva_tetap->account_name}}</th>
                                <th colspan="1" class="text-right">{{$aktiva_tetap->total_debit - $aktiva_tetap->total_kredit}}</th>
                            </tr>
                            @endforeach
                            <!-- end foreach -->
                        <tr>
                            <td colspan="1" style="padding-left:5%">Total Aktiva Tetap</td>
                            
                            @foreach($aktiva_tetap_total as $aktiva_tetap_total)
                            <th colspan="1" class="text-right">{{$aktiva_tetap_total->total_debit - $aktiva_tetap_total->total_kredit}}</th>
                            <?php $total_aktiva += $aktiva_tetap_total->total_debit - $aktiva_tetap_total->total_kredit; ?>
                            @endforeach
                        </tr>

                        <!-- <tr>
                            <td colspan="1" style="padding-left:5%">Depresiasi dan Amortisasi</td>
                            <th colspan="1"></th>
                            
                        </tr>
                            <tr>
                                <th colspan="1" style="padding-left:7%"></th>
                                <th colspan="1" class="text-right"></th>
                            </tr>
                        <tr>
                            <td colspan="1" style="padding-left:5%">Total Depresiasi dan Amortisasi</td>
                            
                            <th colspan="1" class="text-right"></th>
                            
                        </tr> -->
                    <!-- end pendapatan -->

                    <tr>
                        <td colspan="1" style="padding-left:0%;background-color: #f2f248">Total Aktiva</td>
                        <th colspan="1" style="background-color: #f2f248" class="text-right">{{ $total_aktiva }}</th>
                    </tr>

                    <tr>
                        <td  style="background-color: #d9d9d9" colspan="2">Kewajiban dan Modal</td>
                        <?php $total_kewajiban_modal = 0; ?>
                    </tr>

                        <!-- harga pokok penjualan -->
                        <tr>
                            <td colspan="1" style="padding-left:5%">Kewajiban Lancar</td>
                            <th colspan="1"></th>
                            
                        </tr>
                            <!-- foreach di sini -->
                            @foreach($kewajiban_lancar as $kewajiban_lancar)
                            <tr>
                                <th colspan="1" style="padding-left:7%">{{$kewajiban_lancar->account_name}}</th>
                                <th colspan="1" class="text-right">{{$kewajiban_lancar->total_kredit - $kewajiban_lancar->total_debit}}</th>
                            </tr>
                            @endforeach
                            <!-- end foreach -->
                        <tr>
                            <td colspan="1" style="padding-left:5%">Total Kewajiban Lancar</td>
                            @foreach($kewajiban_lancar_total as $kewajiban_lancar_total)
                            <th colspan="1" class="text-right">{{$kewajiban_lancar_total->total_kredit - $kewajiban_lancar_total->total_debit}}</th>
                            <?php $total_kewajiban_modal += $kewajiban_lancar_total->total_kredit - $kewajiban_lancar_total->total_debit; ?>
                            @endforeach
                        </tr>
                        <!-- end harga pokok penjualan -->

                        <!-- harga pokok penjualan -->
                        <tr>
                            <td colspan="1" style="padding-left:5%">Modal Pemilik</td>
                            <th colspan="1"></th>
                            
                        </tr>
                            <!-- foreach di sini -->
                            @foreach($modal as $modal)
                            <tr>
                                <th colspan="1" style="padding-left:7%">{{$modal->account_name}}</th>
                                <th colspan="1" class="text-right">{{$modal->total_kredit - $modal->total_debit}}</th>
                            </tr>
                            @endforeach
                            <!-- end foreach -->
                        <tr>
                            <td colspan="1" style="padding-left:5%">Total Modal Pemilik</td>
                            @foreach($modal_total as $modal_total)
                            <th colspan="1" class="text-right">{{$modal_total->total_kredit - $modal_total->total_debit}}</th>
                            <?php $total_kewajiban_modal += $modal_total->total_kredit - $modal_total->total_debit; ?>
                            @endforeach
                        </tr>
                        <!-- end harga pokok penjualan -->

                    <!-- TOTAL-->
                    <br>

                    <tr>
                        <td colspan="1" style="padding-left:0%;background-color: #f2f248">Total Kewajiban dan Modal</td>
                        <th colspan="1" style="background-color: #f2f248" class="text-right">{{ $total_kewajiban_modal }}</th>
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