<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\urlonecs; 

class urlonecontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$sdurl = urlonecs::all()->toArray();
        //return view('urlone.index', compact('sdurl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('urlone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'link' => 'required',
            'content' => 'required',
            'viewleft' => 'required',
            'valid' => 'required'
        ]);
        
        $urlonecs = new urlonecs([
            'link' => $request->get("link"),
            'content' => $request->get("content"),
            'viewleft' => $request->get("viewleft"),
            'valid' => $request->get("valid"),
            'ip' => $clientIP = \Request::getClientIp(true)     
        ]);

        $urlonecs -> save();
        return redirect()->route('urlone.create')->with('success','Your link: ' .  "127.0.0.1:8000/" . $request->get('link'));
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
