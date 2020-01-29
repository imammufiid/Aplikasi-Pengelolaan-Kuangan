<?php

namespace App\Http\Controllers;

use App\Account;
use App\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DataTables;

use App\Income;
use Illuminate\Support\Facades\Validator;

class IncomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pemasukan';

        //-- no serverside datatable
        $income = Income::all();
        //--

        return view('income.index', compact('title', 'income'));
    }

    public function dt_json(){
        return datatables()->of(Income::all())
        ->addIndexColumn()->make(true);
    }

    public function json(){
        $income = Income::all();
        return response()->json([
            'income' => $income
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Pemasukkan';
        $accounts = Account::all();
        $assets = Asset::all();
        return view('income.create', compact('title', 'accounts', 'assets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request);die();
        // dd($_POST);
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'total' => 'required|numeric',
            'info' => 'required',
        ]);

        if($validator->fails()){
            return back()->withInput($request->all())->withErrors($validator);
        } else {
            Income::create($request->all());
            return redirect()
                ->route('income.index')
                ->with('success', 'Pemasukkan Berhasil Ditambahkan');
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
        return Income::findOrFail($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        // return $income;
        $title = 'Edit Pemasukkan';
        $accounts = Account::all();
        $assets = Asset::all();
        return view('income.edit', compact('income', 'title', 'accounts', 'assets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'total' => 'required|numeric',
            'info' => 'required',
        ]);

        if($validator->fails()){
            return back()->withInput($request->all())->withErrors($validator);
        } else {
            $income->update($request->all());
            return redirect()
                ->route('income.index')
                ->with('success', 'Pemasukkan Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()
                ->route('income.index')
                ->with('success','Income berhasil dihapus');
    }
}
