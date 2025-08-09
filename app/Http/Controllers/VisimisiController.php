<?php

namespace App\Http\Controllers;

use App\visimisi;
use Illuminate\Http\Request;
use File;

class VisimisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        {
            $visimisis = \App\visimisi::get();
            // dd($visimisis);
            return view('visimisis.index', ['visimisis' => $visimisis]);
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
    public function show(visimisi $visimisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $visimisi = \App\visimisi::findOrFail($id);
        return view('visimisis.edit', ['visimisi' => $visimisi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $visimisi = \App\visimisi::findOrFail($id);

        \Validator::make($request->all(), [
            'caption' => 'required|min:15',
        ])->validate();

        $visimisi->caption = $request->get('caption');

        if ($request->file('image')) {
            // if($visimisi->image && file_exists(storage_path('app/public/'.$visimisi->image))){
            //     \Storage::delete('public/'.$visimisi->image);
            // }

            if ($visimisi->image) {
                File::delete('visimisi_image/' . $visimisi->image);
            }

            // $new_image = $request->file('image')->store('visimisi_image', 'public');
            $nama_file = time() . "_" . $request->file('image')->getClientOriginalName();
            $new_image = $request->file('image')->move('visimisi_image', $nama_file);
            $visimisi->image = $nama_file;
        }

        $visimisi->save();

        return redirect()->route('visimisis.index')->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(visimisi $visimisi)
    {
        //
    }
}
