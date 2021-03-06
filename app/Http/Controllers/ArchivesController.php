<?php

namespace App\Http\Controllers;

use App\Models\Archives;
use Illuminate\Http\Request;

class ArchivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archives = Archives::with('cars')->get();

        return view('archive.index', compact('archives'));
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
     * @param  \App\Models\Archives  $archives
     * @return \Illuminate\Http\Response
     */
    public function show(Archives $archives)
    {
        return view('archive.show', compact('archives'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archives  $archives
     * @return \Illuminate\Http\Response
     */
    public function edit(Archives $archives)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archives  $archives
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archives $archives)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archives  $archives
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archives $archives)
    {
        //
    }
}
