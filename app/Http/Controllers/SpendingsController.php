<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DataTables;

use App\Spending;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SpendingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index()
    {
        $title = 'Pengeluaran';
        $user = Auth::user();
        // dd($user->id);
        $spending = Spending::where('user_id', '=', $user->id)->get();

        return view('spending.index', compact('title', 'spending'));
    }

    public function dt_json()
    {
        return datatables()->of(Spending::all())
            ->addIndexColumn()->make(true);
    }

    public function json()
    {
        $spending = Spending::all();
        return response()->json([
            'spending' => $spending
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Pengeluaran';
        $assets = Asset::all();
        return view('spending.create', compact('title', 'assets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd($_POST);
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'total' => 'required|numeric',
            'info' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors($validator);
        } else {
            Spending::create($request->all());
            return redirect()
                ->route('spending.index')
                ->with('success', 'Pengeluaran Berhasil Ditambahkan');
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
        return Spending::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Spending $spending)
    {
        // return $spending;
        $title = 'Edit Pengeluaran';
        $assets = Asset::all();
        return view('spending.edit', compact('spending', 'title', 'assets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spending $spending)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'total' => 'required|numeric',
            'info' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors($validator);
        } else {
            $spending->update($request->all());
            return redirect()
                ->route('spending.index')
                ->with('success', 'Pengeluaran Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spending $spending)
    {
        $spending->delete();
        return redirect()
            ->route('spending.index')
            ->with('success', 'Pengeluaran berhasil dihapus');
    }
}
