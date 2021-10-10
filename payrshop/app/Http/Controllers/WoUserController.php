<?php

namespace App\Http\Controllers;

use App\Models\WoUser;
use Illuminate\Http\Request;

class WoUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "This is User";
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
     * @param  \App\Models\WoUser  $woUser
     * @return \Illuminate\Http\Response
     */
    public function show(WoUser $woUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WoUser  $woUser
     * @return \Illuminate\Http\Response
     */
    public function edit(WoUser $woUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WoUser  $woUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WoUser $woUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WoUser  $woUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(WoUser $woUser)
    {
        //
    }
}
