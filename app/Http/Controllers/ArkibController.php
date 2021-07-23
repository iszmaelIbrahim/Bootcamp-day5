<?php

namespace App\Http\Controllers;

use App\Models\Arkib;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ArkibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arkib = Arkib::all();
        return view('arkib.index',[
            'arkibs'=>$arkib,
        ]);
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
        $arkib = new Arkib();

        $arkib->nama = $request->nama;
        $arkib->pemilik = $request->pemilik;
        $arkib->tag = $request->tag;
        $arkib->jenis = $request->jenis;

        $arkib->save();

        return redirect('/arkib/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arkib  $arkib
     * @return \Illuminate\Http\Response
     */
    public function show(Arkib $arkib)
    {
        return view('arkib.show',[
            'arkib'=>$arkib
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arkib  $arkib
     * @return \Illuminate\Http\Response
     */
    public function edit(Arkib $arkib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arkib  $arkib
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arkib $arkib)
    {
        // echo $catalog;
        $arkib->nama = $request->nama;
        $arkib->pemilik = $request->pemilik;
        $arkib->tag = $request->tag;
        $arkib->jenis = $request->jenis;

        $arkib->save();

        return redirect('/arkib/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arkib  $arkib
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arkib $arkib)
    {
        //
    }
}
