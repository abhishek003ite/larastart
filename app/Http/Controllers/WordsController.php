<?php

namespace App\Http\Controllers;

use App\model\words;
use Illuminate\Http\Request;
use App\model\member;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Words::latest()->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return words::latest()->paginate(10);
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
            'preacher_name' =>  'required|string|max:150',
            'topic'         =>  'required|string|max:200',
            'date_preached' =>  'required|date',
            'message'       =>  'required|max:200'
        ]);
        return Words::create([
            'members'   =>  $request['members'],
            'preacher_name' =>  $request['preacher_name'],
            'topic'     =>  $request['topic'],
            'date_preached' =>  $request['date_preached'],
            'message'   =>  $request['message'],
            'uploadFile'    =>  $request['uploadFile'],
            'checkRadio'    =>  $request['checkRadio']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\words  $words
     * @return \Illuminate\Http\Response
     */
    public function show(words $words)
    {
        //
    }

    public function allMembers() {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\words  $words
     * @return \Illuminate\Http\Response
     */
    public function edit(words $words)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\words  $words
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $words = Words::findOrFail($id);
        $this->validate($request, [
            'members'       =>  'required',
            'preacher_name' =>  'required|string|max:150',
            'topic'         =>  'required|string|max:200',
            'date_preached' =>  'required|date',
            'message'       =>  'required|max:200'
        ]);
        $words->update($request->all());
        return ['message' => 'Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\words  $words
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $words = Words::findOrFail($id);

        //Delete WordLog
        $words->delete();

        return ['message' => 'WordLog Deleted.'];
    }
}
