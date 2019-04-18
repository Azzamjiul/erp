<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Supplier;
use App\Product;
use App\Purchasing;
use App\PurchasingDetail;
use App\Journal;
use App\Inventory;

class PurchasingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Purchasing::all();
        return view('purchasing.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::where('parentId', '>', '0')->get();
        return view('purchasing.create', compact('suppliers', 'products'));
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
            //  masukin ke tabel purchasing
            $date = Carbon::now();
            $tgl = $date->format('Y').$date->format('m').$date->format('d');
            $akhir = Purchasing::where('created_at','=',$date->toDateTimeString());
            $akhiran = count($akhir) + 1;
            $urut = ($tgl * 10000) + $akhiran;
            $PO = 'PO'.$urut;
            $supplier_id = $request->input('supplier_id');
            $total = $request->input('totalharga');
            $ppn_masukan = $total * 0.1;
            $shipping_type = $request->input('shipping_type');
            $shipping_charge = $request->input('shipping_charge');

            $purchasing = [
                'purchase_order_no' => $PO,
                'supplier_id' => $supplier_id,
                'total' => $total,
                'shipping_type' => $shipping_type,
                'shipping_charge' => $shipping_charge,
                'company_id' => $request->company_id,
                'user_id' => $request->user_id
            ];
            
            Purchasing::create($purchasing);

            // masukin ke tabel purchasing_detail
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
            $tgl = $date->format('Y').$date->format('m').$date->format('d');
            $banyak_jurnal_hari_ini = Journal::where('date','=',$date->format('Y-m-d'))->count();
            $urutan_journal = ($tgl * 10000) + $banyak_jurnal_hari_ini + 1;
            $journal_id = 'J'.$urutan_journal;
            //masukin debit
            $journal = [
                'date' => $date->format('Y-m-d'),
                'journal_id' => $journal_id,
                'line_debit_name' => 'Persediaan Barang Dagangan',
                'line_credit_name' => NULL,
                'account_number' =>'1-10201',
                'line_debit' => $total,
                'line_credit' => NULL
            ];
            Journal::create($journal);
            $urutan_journal++;
            $journal_id = 'J'.$urutan_journal;

            $journal = [
                'date' => $date,
                'journal_id' => $journal_id,
                'line_debit_name' => 'Beban Angkut Pembelian',
                'line_credit_name' => NULL,
                'account_number' =>'5-10002',
                'line_debit' => $shipping_charge,
                'line_credit' => NULL
            ];
            Journal::create($journal);
            $urutan_journal++;
            $journal_id = 'J'.$urutan_journal;

            $journal = [
                'date' => $date,
                'journal_id' => $journal_id,
                'line_debit_name' => 'PPN Masukan',
                'line_credit_name' => NULL,
                'account_number' =>'1-10301',
                'line_debit' => $ppn_masukan,
                'line_credit' => NULL
            ];
            Journal::create($journal);
            $urutan_journal++;
            $journal_id = 'J'.$urutan_journal;
            
            $journal = [
                'date' => $date,
                'journal_id' => $journal_id,
                'line_debit_name' => NULL,
                'line_credit_name' => 'Kas',
                'account_number' =>'1-10001',
                'line_debit' => NULL,
                'line_credit' => $total + $shipping_charge + $ppn_masukan
            ];
            Journal::create($journal);
            $urutan_journal++;
            $journal_id = 'J'.$urutan_journal;

            // masukin inventory
            for($i=0;$i<$banyak_barang;$i++){
                $product_item_barcode = $request->item_barcode[$i];
                $product_code = $product_item_barcode.'/'.$date->format('Y').$date->format('m').$date->format('d').'/'.$supplier_id;
                $apakah_ada = Inventory::where('product_code','=',$product_code);

                if($apakah_ada){
                    $product = Product::where('barcode','=',$product_item_barcode)->get();
                    $parentId = $product[0]->id;
                    // echo($parentId);
                    $inventory_item_name = $product[0]->product_name;
                    $inventory_item_stock = $request->quantity[$i];
                    $supplier = Supplier::where('id','=',$supplier_id)->get();
                    $inventory_item_description = $product[0]->product_name.' dari '.$supplier[0]->supplier_name.' pada tanggal '.$date->toDateString();
                    $inventory_item_photo = NULL;
                    $inventory_item_purchase_price= $request->unit_price[$i];
                    $inventory_item_sale_price = NULL;

                    $inventory = [
                        'parentId' => $parentId,
                        'product_item_barcode' => $product_item_barcode,
                        'product_code' => $product_code,
                        'inventory_item_name' => $inventory_item_name,
                        'inventory_item_stock' => $inventory_item_stock,
                        'inventory_item_description' => $inventory_item_description,
                        'inventory_item_photo' => $inventory_item_photo,
                        'inventory_item_purchase_price' => $inventory_item_purchase_price,
                        'inventory_item_sale_price' => $inventory_item_sale_price,
                        'company_id' => $request->company_id,
                        'user_id' => $request->user_id
                    ];
                    Inventory::create($inventory);
                }else{
                    $inventory = Inventory::where('product_code','=',$product_code)->get();
                    die($inventory);
                    $harga_beli_lama = $inventory[0]->inventory_item_purchase_price;
                    $stok_lama = $inventory[0]->inventory_item_stock;
                    $inventory_item_purchase_price= $request->unit_price[$i];
                    $inventory_item_stock = $request->quantity[$i];
                    $inventory[0]->update([
                        'inventory_item_purchase_price' => (($stok_lama*$harga_beli_lama)+($inventory_item_purchase_price*$inventory_item_stock))/($stok_lama+$inventory_item_stock),
                        'inventory_item_stock' => $inventory_item_stock + $stok_lama
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('purchasing.index')->with('message','Pembelian Berhasil');
        }catch (Exception $e) {
            DB::rollback();
            return redirect()->route('purchasing.index')->with('message','Pembelian Gagal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    public function show($purchase_order_no)
    {
        // $purchases = PurchasingDetail::where('purchase_order_no','=',$purchase_order_no)->get();
        $purchases = DB::table('purchasing_detail')
            ->join('products', 'purchasing_detail.item_barcode', '=', 'products.barcode')
            ->where('purchasing_detail.purchase_order_no','=',$purchase_order_no)
            ->get();
        return view('purchasing.show', compact('purchases'));
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
