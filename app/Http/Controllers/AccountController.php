<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index');
    }

    public function getAccountList(Request $request)
    {
        $id = isset($request->id) ? $request->id : 0;
        $results = array();
        $results = Account::where('parentId','=',$id)->get();
        foreach($results as $result){
            $result->state = $this->has_child($result->id) ? 'closed' : 'open';
        }
        return json_encode($results);
    }

    public function has_child($id){
        $rs = DB::select('select count(*) as jumlah from gl_account where parentId='.$id);
        $row = $rs[0]->jumlah;
        return $row>0 ? true : false;
    }

    public function getAccountGroup(){
        $id = 0;
        $results = array();
        $results = Account::where('parentId','=',$id)->get();
        foreach($results as $result){
            $result->text = $result->account_number.' - '.$result->account_name;
        }
        return json_encode($results);
    }

    public function getAccountDetail($id){
        $results = array();
        $results = Account::where('parentId','=',$id)->orWhere('id','=',$id)->get();
        foreach($results as $result){
            $result->text = $result->account_number.' - '.$result->account_name;
        }
        return json_encode($results);
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
        Account::create($request->all());
        // return redirect()->route('account.index');
        return 1;
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
