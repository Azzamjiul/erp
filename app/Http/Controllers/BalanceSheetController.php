<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BalanceSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aktiva_lancar = DB::table('journal')
        ->select(DB::raw('gl_account.account_name, sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->join('gl_account', 'journal.account_number','=','gl_account.account_number')
        ->where('journal.account_number','like','1-1%')
        ->groupBy('gl_account.account_name')
        ->get();

        $aktiva_lancar_total = DB::table('journal')
        ->select(DB::raw('sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->where('journal.account_number','like','1-1%')
        ->get();

        $aktiva_tetap = DB::table('journal')
        ->select(DB::raw('gl_account.account_name, sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->join('gl_account', 'journal.account_number','=','gl_account.account_number')
        ->where('journal.account_number','like','1-2%')
        ->groupBy('gl_account.account_name')
        ->get();

        $aktiva_tetap_total = DB::table('journal')
        ->select(DB::raw('sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->where('journal.account_number','like','1-2%')
        ->get();

        $kewajiban_lancar = DB::table('journal')
        ->select(DB::raw('gl_account.account_name, sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->join('gl_account', 'journal.account_number','=','gl_account.account_number')
        ->where('journal.account_number','like','2-%')
        ->groupBy('gl_account.account_name')
        ->get();

        $kewajiban_lancar_total = DB::table('journal')
        ->select(DB::raw('sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->where('journal.account_number','like','2-%')
        ->get();

        $modal = DB::table('journal')
        ->select(DB::raw('gl_account.account_name, sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->join('gl_account', 'journal.account_number','=','gl_account.account_number')
        ->where('journal.account_number','like','3-%')
        ->groupBy('gl_account.account_name')
        ->get();

        $modal_total = DB::table('journal')
        ->select(DB::raw('sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->where('journal.account_number','like','3-%')
        ->get();

        $pendapatan_total = DB::table('journal')
        ->select(DB::raw('sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->where('journal.account_number','like','4-%')
        ->get();

        $beban_total = DB::table('journal')
        ->select(DB::raw('sum(line_credit) as total_kredit, sum(line_debit) as total_debit'))
        ->where('journal.account_number','like','5-%')
        ->whereOr('journal.account_number','like','6-%')
        ->get();

        // $retained_earning = ($pendapatan_total[0]->total_kredit - $pendapatan_total[0]->total_debit) + ($beban_total[0]->total_kredit - $beban_total[0]->total_debit);
        // die($aktiva_lancar_total[0]->total_kredit);
        return view('laporan.balance_sheet', compact('aktiva_lancar','aktiva_lancar_total','aktiva_tetap','aktiva_tetap_total','kewajiban_lancar','kewajiban_lancar_total','modal','modal_total','retained_earning'));
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
