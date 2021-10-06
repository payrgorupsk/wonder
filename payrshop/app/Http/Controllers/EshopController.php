<?php

namespace App\Http\Controllers;

use App\Models\Eshop;
use Illuminate\Http\Request;

class EshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        return view('welcome');
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
     * @param  \App\Models\Eshop  $eshop
     * @return \Illuminate\Http\Response
     */
    public function show(Eshop $eshop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eshop  $eshop
     * @return \Illuminate\Http\Response
     */
    public function edit(Eshop $eshop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eshop  $eshop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eshop $eshop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eshop  $eshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eshop $eshop)
    {
        //
    }
}
