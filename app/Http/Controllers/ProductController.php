<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductList(Request $request)
    {
        // $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
     
        // include 'conn.php';
        // $result = array();
        // $rs = mysql_query("select * from products where parentId=$id");
        // while($row = mysql_fetch_array($rs)){
        //     $row['state'] = has_child($row['id']) ? 'closed' : 'open';
        //     $row['total'] = $row['price']*$row['quantity'];
        //     array_push($result, $row);
        // }
         
        // echo json_encode($result);
         
        // function has_child($id){
        //     $rs = mysql_query("select count(*) from products where parentId=$id");
        //     $row = mysql_fetch_array($rs);
        //     return $row[0] > 0 ? true : false;
        // }
        $id = isset($request->id) ? $request->id : 0;
        $results = array();
        $results = Product::where('parentId','=',$id)->get();
        // dd($request);
        foreach($results as $result){
            // dd('HERE');
            $result->state = $this->has_child($result->id) ? 'closed' : 'open';
            if($result->quantity != NULL){
                $result->total = $result->price * $result->quantity;
            }
        }
        return json_encode($results);
    }

    public function has_child($id){
        $rs = DB::select('select count(*) as jumlah from products where parentId='.$id);
        // dd($rs[0]);
        $row = $rs[0]->jumlah;
        // dd('here');
        return $row>0 ? true : false;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
