<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Inventory;
use App\Product;
use App\Selling;
use App\SellingDetail;
use App\Journal;

class SellingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Selling::all();
        return view('selling.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Inventory::where('product_code','!=', NULL)->get();
        // $products = Product::all();
        // die($products);
        return view('selling.create-dynamic', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::BeginTransaction();
        try{
            //masukin table selling
            $date = Carbon::now();
            $tgl = $date->format('Y').$date->format('m').$date->format('d');
            $akhir = Selling::all();
            $akhiran = count($akhir) + 1;
            $urut = ($tgl * 10000) + $akhiran;
            $SO = 'SO'.$urut;
            $customer_id = $request->customer_id;
            $total = $request->totalharga;
            $ppn_keluaran = $total * 0.1;
            $courier = NULL;
            $delivery_date = $date;
            $shipping_type = NULL;
            $shipping_charge = NULL;

            $selling = [
                'sales_order_no' => $SO,
                'customer_id' => $customer_id,
                'total' => $total,
                'courier' => $courier,
                'delivery_date' => $delivery_date,
                'shipping_type' => $shipping_type,
                'shipping_charge' => $shipping_charge,
                'company_id' => $request->company_id,
                'user_id' => $request->user_id
            ];

            Selling::create($selling);

            //masukin table selling_detail
            $banyak_barang = $request->input('banyak_barang');

            for($i=0;$i<$banyak_barang;$i++){
               
                $SO_detail = 'SO'.(($urut*1000)+$i);
                $product_code = explode('-',$request->product_code[$i])[0];
                $inventory = Inventory::where('product_code','=',$product_code)->get();
                $quantity = $request->quantity[$i];
                $harga_beli = $inventory[0]->inventory_item_purchase_price;
                $hpp = $harga_beli * $quantity;
                $unit_price = $request->unit_price[$i]; //harga jual
                $subtotal = $request->subtotal[$i];
                $tax = 0.1 * $subtotal;

                $selling_detail = [
                    'sales_order_no' => $SO,
                    'sales_order_no_detail'=> $SO_detail,
                    'product_code' => $product_code,
                    'quantity' => $quantity,
                    'unit_price' => $unit_price,
                    'subtotal' => $subtotal,
                    'tax' => $tax,
                    'company_id' => $request->company_id,
                    'user_id' => $request->user_id
                ];
                
                SellingDetail::create($selling_detail);
            }

            // masukin journal
            $tgl = $date->format('Y').$date->format('m').$date->format('d');
            $banyak_jurnal_hari_ini = Journal::where('date','=',$date->format('Y-m-d'))->count();
            $urutan_journal = ($tgl * 10000) + $banyak_jurnal_hari_ini + 1;
            $journal_id = 'J'.$urutan_journal;

            $journal = [
                'date' => $date,
                'journal_id' => $journal_id,
                'line_debit_name' => 'Harga Pokok Penjualan',
                'line_credit_name' => NULL,
                'account_number' =>'5-10001',
                'line_debit' => $hpp,
                'line_credit' => NULL
            ];
            Journal::create($journal);
            $urutan_journal++;
            $journal_id = 'J'.$urutan_journal;

            $journal = [
                'date' => $date,
                'journal_id' => $journal_id,
                'line_debit_name' => NULL,
                'line_credit_name' => 'Persediaan Barang Dagangan',
                'account_number' =>'1-10201',
                'line_debit' => NULL,
                'line_credit' => $total
            ];
            Journal::create($journal);
            $urutan_journal++;
            $journal_id = 'J'.$urutan_journal;

            $journal = [
                'date' => $date,
                'journal_id' => $journal_id,
                'line_debit_name' => 'Kas',
                'line_credit_name' => NULL,
                'account_number' =>'1-10001',
                'line_debit' => $total + $shipping_charge + $ppn_keluaran,
                'line_credit' => NULL
            ];
            Journal::create($journal);
            $urutan_journal++;
            $journal_id = 'J'.$urutan_journal;

            $journal = [
                'date' => $date,
                'journal_id' => $journal_id,
                'line_debit_name' => NULL,
                'line_credit_name' => 'PPN Keluaran',
                'account_number' =>'2-10103',
                'line_debit' => NULL,
                'line_credit' => $ppn_keluaran
            ];
            Journal::create($journal);
            $urutan_journal++;
            $journal_id = 'J'.$urutan_journal;

            $journal = [
                'date' => $date,
                'journal_id' => $journal_id,
                'line_debit_name' => NULL,
                'line_credit_name' => 'Diskon Penjualan',
                'account_number' =>'4-10102',
                'line_debit' => NULL,
                'line_credit' => 0
            ];
            Journal::create($journal);
            $urutan_journal++;
            $journal_id = 'J'.$urutan_journal;

            $journal = [
                'date' => $date,
                'journal_id' => $journal_id,
                'line_debit_name' => NULL,
                'line_credit_name' => 'Pendapatan Penjualan',
                'account_number' =>'4-10101',
                'line_debit' => NULL,
                'line_credit' => $total - $hpp
            ];
            Journal::create($journal);
            $urutan_journal++;
            $journal_id = 'J'.$urutan_journal;


            // masukin inventory
            for($i=0;$i<$banyak_barang;$i++){
                $product_code = explode('-',$request->product_code[$i])[0];
                $inventory = Inventory::where('product_code','=',$product_code)->get();
                $quantity = $request->quantity[$i];
                $stok_lama = $inventory[0]->inventory_item_stock;
                $inventory[0]->update([
                    'inventory_item_stock' => $stok_lama - $quantity
                ]);
            }

            DB::commit();
            return redirect()->route('selling.index')->with('message','Penjualan Berhasil');
        }catch (Exception $e) {
            DB::rollback();
            return redirect()->route('selling.index')->with('message','Penjualan Gagal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sales_order_no)
    {
        $sale_details = DB::table('selling_detail')
            ->join('inventories', 'selling_detail.product_code', '=', 'inventories.product_code')
            ->where('selling_detail.sales_order_no','=',$sales_order_no)
            ->get();
        return view('selling.show', compact('sale_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
