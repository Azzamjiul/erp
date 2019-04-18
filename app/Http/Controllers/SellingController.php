<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Inventory;
use App\Product;
use App\Selling;
use App\SellingDetail

class SellingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('selling.index');
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
            $total = $request->totalHarga;
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
            // 'sales_order_no',
            // 'sales_order_no_detail',
            // 'product_code',
            // 'quantity',
            // 'unit_price',
            // 'subtotal',
            // 'tax',
            // 'total',
            // 'company_id',
            // 'user_id'
            $banyak_barang = $request->input('banyak_barang');

            for($i=0;$i<$banyak_barang;$i++){
               
                $PO_detail = $PO.$i;
                $item_barcode = $request->item_barcode[$i];
                $quantity = $request->quantity[$i];
                $unit_price = $request->unit_price[$i];
                $subtotal = $request->subtotal[$i];
                $tax = 0.1 * $subtotal;

                $purchasing_detail = [
                    'purchase_order_no' => $PO,
                    'purchase_order_no_detail'=> $PO_detail,
                    'item_barcode' => $item_barcode,
                    'quantity' => $quantity,
                    'unit_price' => $unit_price,
                    'subtotal' => $subtotal,
                    'tax' => $tax,
                    'company_id' => $request->company_id,
                    'user_id' => $request->user_id
                ];
                
                PurchasingDetail::create($purchasing_detail);
            }

            // masukin journal
            // masukin inventory

            DB::commit();
            return redirect()->route('purchasing.index')->with('message','Penjualan Berhasil');
        }catch (Exception $e) {
            DB::rollback();
            return redirect()->route('purchasing.index')->with('message','Penjualan Gagal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('selling.show');
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
