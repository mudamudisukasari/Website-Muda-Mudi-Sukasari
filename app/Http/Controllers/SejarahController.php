<?php

namespace App\Http\Controllers;

use App\sejarah;
use Illuminate\Http\Request;
use File;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        {
            $sejarahs = \App\sejarah::get();
            // dd($sejarahs);
            return view('sejarahs.index', ['sejarahs' => $sejarahs]);
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
    public function show(sejarah $sejarah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $sejarah = \App\sejarah::findOrFail($id);
      return view('sejarahs.edit', ['sejarah' => $sejarah]);
  }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $sejarah = \App\sejarah::findOrFail($id);

      \Validator::make($request->all(),[
          'caption'     => 'required|min:15',
      ])->validate();
      
      $sejarah->caption         = $request->get('caption');        

      if($request->file('image')){
          // if($sejarah->image && file_exists(storage_path('app/public/'.$sejarah->image))){
          //     \Storage::delete('public/'.$sejarah->image);
          // }

          if($sejarah->image){
              File::delete('sejarah_image/'.$sejarah->image);
          }

          // $new_image = $request->file('image')->store('sejarah_image', 'public');
          $nama_file = time()."_".$request->file('image')->getClientOriginalName();
          $new_image = $request->file('image')->move('sejarah_image', $nama_file);
          $sejarah->image = $nama_file;
      }

      $sejarah->save();

      return redirect()->route('sejarahs.index')->with('success', 'Data successfully updated');
  }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sejarah $sejarah)
    {
        //
    }
}
