<?php

namespace App\Http\Controllers;

use App\quote;
use Illuminate\Http\Request;
use File;

class QuoteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $quotes = \App\quote::get();
    // dd($quotes);
    return view('quotes.index', ['quotes' => $quotes ]);
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
   * @param  \App\quote  $quote
   * @return \Illuminate\Http\Response
   */
  public function show(quote $quote)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\quote  $quote
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $quote = \App\quote::findOrFail($id);
      return view('quotes.edit', ['quote' => $quote]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\quote  $quote
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      $quote = \App\quote::findOrFail($id);

      \Validator::make($request->all(),[
          'caption'     => 'required|min:15',
      ])->validate();
      
      $quote->caption         = $request->get('caption');        

      if($request->file('image')){
          // if($quote->image && file_exists(storage_path('app/public/'.$quote->image))){
          //     \Storage::delete('public/'.$quote->image);
          // }

          if($quote->image){
              File::delete('quote_image/'.$quote->image);
          }

          // $new_image = $request->file('image')->store('quote_image', 'public');
          $nama_file = time()."_".$request->file('image')->getClientOriginalName();
          $new_image = $request->file('image')->move('quote_image', $nama_file);
          $quote->image = $nama_file;
      }

      $quote->save();

      return redirect()->route('quotes.index')->with('success', 'Data successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\quote  $quote
   * @return \Illuminate\Http\Response
   */
  public function destroy(quote $quote)
  {
      //
  }
}
