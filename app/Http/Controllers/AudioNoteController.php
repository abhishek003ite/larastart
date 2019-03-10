<?php

namespace App\Http\Controllers;

use App\model\AudioNote;
use Illuminate\Http\Request;

class AudioNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AudioNote::latest()->paginate(10);
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
        $this->validate($request, [
            'members'       =>  'required',
            'minister' =>  'required|string|max:150',
            'title'         =>  'required|string|max:200',
            'date_of_event' =>  'required|date'
        ]);
        return AudioNote::create([
            'members'   =>  $request['members'],
            'minister'  =>  $request['minister'],
            'title'     =>  $request['title'],
            'link'      =>  $request['link'],
            'date_of_event' => $request['date_of_event']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\AudioNote  $audioNote
     * @return \Illuminate\Http\Response
     */
    public function show(AudioNote $audioNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\AudioNote  $audioNote
     * @return \Illuminate\Http\Response
     */
    public function edit(AudioNote $audioNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\AudioNote  $audioNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AudioNote $audioNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\AudioNote  $audioNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(AudioNote $audioNote)
    {
        //
    }
}
