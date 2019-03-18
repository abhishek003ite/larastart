<?php

namespace App\Http\Controllers;

use App\model\code;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Code::latest()->paginate(10);
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
            'queryCode'     =>  'required'
        ]);
        $queryCode = $request->queryCode;
        $q = ($queryCode > 0) ? $queryCode : 10;
        $codeNew = "";
        for($i = 0; $i < $q; $i++)
        {
            $codeNew = "VHL".$this->codes(6);
            Code::create([
                'code'  => $codeNew,
                'used'  => '0000-00-00 0000:00:00'
            ]);
        }
    }

    private function codes($q = 6)
    {
        $abc = range("a", "z");
        $numb = range(0, 9);
        $merge = array_merge($abc, $numb);
        $code = '';
        for($i = 0; $i < $q; $i++)
        {
            $code .= $merge[rand(0, (count($merge) - 1))];
        }
        return $code;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\code  $code
     * @return \Illuminate\Http\Response
     */
    public function show(code $code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\code  $code
     * @return \Illuminate\Http\Response
     */
    public function edit(code $code)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\code  $code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, code $code)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\code  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $codes = Code::findOrfail($id);

        //Delete Codes
        $codes->delete();

        return ['message' => 'Code deleted'];
    }
}
