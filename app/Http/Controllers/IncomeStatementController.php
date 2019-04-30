<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class IncomeStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendapatan_array = DB::table('journal')
        ->select(DB::raw('gl_account.account_name, sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->join('gl_account', 'journal.account_number','=','gl_account.account_number')
        ->where('journal.account_number','like','4-%')
        ->groupBy('gl_account.account_name')
        ->groupBy('gl_account.account_number')
        ->orderBy('gl_account.account_number', 'asc')
        ->get();

        $pendapatan_total = DB::table('journal')
        ->select(DB::raw('sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->where('journal.account_number','like','4-%')
        ->get();

        $hpp_array = DB::table('journal')
        ->select(DB::raw('gl_account.account_name, sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->join('gl_account', 'journal.account_number','=','gl_account.account_number')
        ->where('journal.account_number','like','5-%')
        ->groupBy('gl_account.account_name')
        ->get();

        $hpp_total = DB::table('journal')
        ->select(DB::raw('sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->where('journal.account_number','like','5-%')
        ->get();

        $beban_array = DB::table('journal')
        ->select(DB::raw('gl_account.account_name, sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->join('gl_account', 'journal.account_number','=','gl_account.account_number')
        ->where('journal.account_number','like','6-%')
        ->groupBy('gl_account.account_name')
        ->get();

        $beban_total = DB::table('journal')
        ->select(DB::raw('sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->where('journal.account_number','like','6-%')
        ->get();

        // die($pendapatan_array);

        return view('laporan.income_statement', compact('pendapatan_array','beban_array','pendapatan_total','beban_total','hpp_array','hpp_total'));
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
