<?php

namespace App\Http\Controllers;

use App\Pembangunan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;



class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(){
        $pengguna = Pembangunan::count();
        return view('pengguna/index',compact('pengguna'));
    }

    public function data(){
        return Datatables::of(Pembangunan::query())
               ->addColumn('action', function($item){
                  return '
                   <a href="'.route('pengguna.show', ['pengguna' => $item->id]).'" class="btn btn-sm btn-info">Detail</a>
                ';
               })
               ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function show(pembangunan $pengguna)
    {
       return view('pengguna.show',compact('pengguna'));
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
    public function graphPengguna(){
        return view('pengguna.grafik');
    }
}
