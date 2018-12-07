<?php

namespace App\Http\Controllers;

use App\Clap;
use Illuminate\Http\Request;

class ClapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
    $messages = [
    'required' => 'The :attribute field is required.',
    'unique_with' => "You have already clapped this post"
    ];
    
    \Validator::make($request->all(), [
    'post_id' => 'required|unique_with:claps,user_id',
    ],$messages)->validate();


        $clap = new Clap();
        $clap->post_id = $request->post_id;
        $clap->user_id = 1;
        $clap->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clap  $clap
     * @return \Illuminate\Http\Response
     */
    public function show(Clap $clap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clap  $clap
     * @return \Illuminate\Http\Response
     */
    public function edit(Clap $clap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clap  $clap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clap $clap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clap  $clap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clap $clap)
    {
        //
    }
}
