<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Carbon;
use App\Capital;
use App\Journal;

class CapitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capitals = Capital::all();
        return view('capital.index',compact('capitals'));
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
        DB::BeginTransaction();
        try{
            // masukin journal
            $date = Carbon::now();
            $tgl = $date->format('Y').$date->format('m').$date->format('d');
            $banyak_jurnal_hari_ini = Journal::where('date','=',$date->format('Y-m-d'))->count();
            $urutan_journal = ($tgl * 10000) + $banyak_jurnal_hari_ini + 1;
            $journal_id = 'J'.$urutan_journal;

            $journal = [
                'date' => $date,
                'journal_id' => $journal_id,
                'line_debit_name' => 'Modal Pemilik',
                'line_credit_name' => NULL,
                'account_number' =>'3-10001',
                'line_debit' => NULL,
                'line_credit' => $request->capital_amount
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
                'line_debit' => $request->capital_amount,
                'line_credit' => NULL
            ];
            Journal::create($journal);

            Capital::create($request->all());
            DB::commit();
            return redirect()->route('capital.index')->with('message','Penambahan Modal Berhasil');
        }catch (Exception $e) {
            DB::rollback();
            return redirect()->route('selling.index')->with('message','Penambahan Modal Gagal');
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
