<?php

namespace App\Http\Controllers;

use App\logo;
use Illuminate\Http\Request;
use File;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        {
            $logos = \App\logo::get();
            // dd($logos);
            return view('logos.index', ['logos' => $logos]);
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $logo = \App\logo::findOrFail($id);
        return view('logos.edit', ['logo' => $logo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $logo = \App\logo::findOrFail($id);

        \Validator::make($request->all(), [
            'caption' => 'required|min:15',
        ])->validate();

        $logo->caption = $request->get('caption');

        if ($request->file('image')) {
            // if($logo->image && file_exists(storage_path('app/public/'.$logo->image))){
            //     \Storage::delete('public/'.$logo->image);
            // }

            if ($logo->image) {
                File::delete('logo_image/' . $logo->image);
            }

            // $new_image = $request->file('image')->store('logo_image', 'public');
            $nama_file = time() . "_" . $request->file('image')->getClientOriginalName();
            $new_image = $request->file('image')->move('logo_image', $nama_file);
            $logo->image = $nama_file;
        }

        $logo->save();

        return redirect()->route('logos.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(logo $logo)
    {
        //
    }
}
