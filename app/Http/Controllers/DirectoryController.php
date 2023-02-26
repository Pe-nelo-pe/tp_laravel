<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directory = new Directory;
        $directories = $directory->selectLangFiles();
        return view('directory.index', ['directories'=>$directories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('directory.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
    
         $request->validate([
            'name'=> 'required',
            'name_fr'=> 'required',
            'file' => 'required | mimes:doc,pdf,docx,zip',
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();

        
        $file->storeAs('public/uploads', $filename);

        $newfile = Directory::create([
            'name'=> $request->name,
            'name_fr'=> $request->name_fr,
            'path_file' => $filename,
            'user_id'=> Auth::user()->id,
        ]);

        return redirect(route('file.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function show(Directory $directory)
    {
         return view('directory.show', ['directory' => $directory ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function edit(Directory $directory)
    {
        return view('directory.edit', ['directory' => $directory ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Directory $directory)
    {
        $directory->update([
            'name'=> $request->name,
            'name_fr'=> $request->name_fr,

        ]);

        return redirect(route('file.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Directory $directory)
    {
      
        Storage::delete('public/uploads/'.$directory->path_file);
        $directory->delete();

        return redirect(route('file.index'));
    }

    /**
     * Download the specified resource.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function download(Directory $directory)
    {
    
        $filename = $directory->path_file;
        $file_path = storage_path('app/public/uploads/'.$filename);

        if (file_exists($file_path)) {
            
            return response()->download($file_path);
        } else {
            abort(404, 'File not found');
        }

    }

    
}
