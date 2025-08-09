<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeris = \App\galeri::paginate(10);
        return view('galeris.index', ['galeris'=>$galeris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galeris.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(),[
            'name'          => 'required|min:2|max:20|unique:galeris',
            'description'   => 'required',
            'image'         => 'required',
        ])->validate();

        $new_galeri = new \App\galeri;
        $new_galeri->name         = strtoupper($request->get('name'));

        $new_galeri->create_by    = \Auth::user()->id;
        $new_galeri->slug         = \Str::slug($request->get('name'), '-');

        if($request->file('image')){
            // $image_path = $request->file('image')->store('galeri_image', 'public');
            $nama_file = time()."_".$request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->move('galeri_image', $nama_file);
            $new_galeri->image = $nama_file;
        }

        $new_galeri->save();
        return redirect()->route('galeris.index')->with('success', 'galeri successfully created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeri = \App\galeri::findOrFail($id);
        return view('galeris.edit', ['galeri'=>$galeri]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $galeri = \App\galeri::findOrFail($id);

        \Validator::make($request->all(),[
            'name'          => 'required|min:2|max:20',
            'description'   => 'required',
            'slug'          => 'required',
        ])->validate();
        
        $galeri->name         = $request->get('name');

        $galeri->slug         = $request->get('slug');
        

        if($request->file('image')){
            // ebook
            // if($galeri->image && file_exists(storage_path('app/public/'.$galeri->image))){
            //     \Storage::delete('public/'.$galeri->image);
            // }
            // $new_image = $request->file('image')->store('galeri_image', 'public');
            
            if($galeri->image){
                File::delete('galeri_image/'.$galeri->image);
            }
            // $new_image = $request->file('image')->store('galeri_image', 'public');
            $nama_file = time()."_".$request->file('image')->getClientOriginalName();
            $new_image = $request->file('image')->move('galeri_image', $nama_file);

            $galeri->image = $nama_file;
        }

        $galeri->update_by    = \Auth::user()->id;
        $galeri->slug         = \Str::slug($request->get('name'));

        $galeri->save();

        return redirect()->route('galeris.index')->with('success', 'galeri successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = \App\galeri::findOrFail($id);
        $galeri->articles()->sync([]);
        if($galeri->image){
            File::delete('galeri_image/'.$galeri->image);
        }
        $galeri->forceDelete();

        return redirect()->route('galeris.index')->with('success', 'galeri successfully deleted.');
    }

    public function restore($id){
        $galeri = \App\galeri::withTrashed()->findOrFail($id);
        $galeri->restore();
    }

    public function deletePermanent($id){
        $galeri = \App\galeri::withTrashed()->findOrFail($id);
        $galeri->articles()->sync([]);

        // if($galeri->image && file_exist(storage_path('app/public/'.$galeri->image))){
        //     \Storage::delete('public/'.$galeri->image);
        // }
        if($galeri->image){
            File::delete('galeri_image/'.$galeri->image);
        }
        $galeri->forceDelete();

        return redirect()->route('galeris.index')->with('success', 'galeri successfully deleted.');
    }



    // ajax select2
    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $galeris = \App\galeri::where('name', 'Like', "%$keyword%")->get();
        return $galeris;
    }

}
