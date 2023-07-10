<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return view('dashboard.response.index', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {

            $request->validate([
                'type' => 'required',
                'schedule' => 'required',
            ]);

            Response::create([
                'interview_id' => $id,
                'type' => $request->type,
                'schedule' => $request->schedule,
            ]);

            return redirect('/data/type')->with('success', 'Response berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $response = Response::where('interview_id', $id)->first();
        return view('dashboard.response.edit', compact('response','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'schedule' => 'required',
        ]);

        $response = Response::where('interview_id', $id)->first();

        $response->update([
            'interview_id' => $id,
            'type' => $request->type,
            'schedule' => $request->schedule,
        ]);

        return redirect('/data/type')->with('success', 'Response berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Response $response)
    {
        //
    }
}
