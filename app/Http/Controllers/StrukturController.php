<?php

namespace App\Http\Controllers;

use App\struktur;
use Illuminate\Http\Request;
use File;

class StrukturController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $strukturs = \App\struktur::get();
    // dd($strukturs);
    return view('strukturs.index', ['strukturs' => $strukturs ]);
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
   * @param  \App\struktur  $struktur
   * @return \Illuminate\Http\Response
   */
  public function show(struktur $struktur)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\struktur  $struktur
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $struktur = \App\struktur::findOrFail($id);
      return view('strukturs.edit', ['struktur' => $struktur]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\struktur  $struktur
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      $struktur = \App\struktur::findOrFail($id);

      \Validator::make($request->all(),[
          'caption'     => 'required|min:15',
      ])->validate();
      
      $struktur->caption         = $request->get('caption');        

      if($request->file('image')){
          // if($struktur->image && file_exists(storage_path('app/public/'.$struktur->image))){
          //     \Storage::delete('public/'.$struktur->image);
          // }

          if($struktur->image){
              File::delete('struktur_image/'.$struktur->image);
          }

          // $new_image = $request->file('image')->store('struktur_image', 'public');
          $nama_file = time()."_".$request->file('image')->getClientOriginalName();
          $new_image = $request->file('image')->move('struktur_image', $nama_file);
          $struktur->image = $nama_file;
      }

      $struktur->save();

      return redirect()->route('strukturs.index')->with('success', 'Data successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\struktur  $struktur
   * @return \Illuminate\Http\Response
   */
  public function destroy(struktur $struktur)
  {
      //
  }
}
