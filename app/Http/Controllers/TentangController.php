<?php

namespace App\Http\Controllers;

use App\tentang;
use Illuminate\Http\Request;
use File;

class TentangController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tentangs = \App\tentang::get();
    // dd($tentangs);
    return view('tentangs.index', ['tentangs' => $tentangs ]);
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
   * @param  \App\tentang  $tentang
   * @return \Illuminate\Http\Response
   */
  public function show(tentang $tentang)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\tentang  $tentang
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $tentang = \App\tentang::findOrFail($id);
      return view('tentangs.edit', ['tentang' => $tentang]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\tentang  $tentang
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      $tentang = \App\tentang::findOrFail($id);

      \Validator::make($request->all(),[
          'caption'     => 'required|min:15',
      ])->validate();
      
      $tentang->caption         = $request->get('caption');        

      if($request->file('image')){
          // if($tentang->image && file_exists(storage_path('app/public/'.$tentang->image))){
          //     \Storage::delete('public/'.$tentang->image);
          // }

          if($tentang->image){
              File::delete('tentang_image/'.$tentang->image);
          }

          // $new_image = $request->file('image')->store('tentang_image', 'public');
          $nama_file = time()."_".$request->file('image')->getClientOriginalName();
          $new_image = $request->file('image')->move('tentang_image', $nama_file);
          $tentang->image = $nama_file;
      }

      $tentang->save();

      return redirect()->route('tentangs.index')->with('success', 'Data successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\tentang  $tentang
   * @return \Illuminate\Http\Response
   */
  public function destroy(tentang $tentang)
  {
      //
  }
}
