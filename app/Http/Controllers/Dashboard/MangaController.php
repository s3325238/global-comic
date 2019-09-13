<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

// Model
use App\Manga;
use App\Settings;

class MangaController extends Controller
{
    protected function getMangaPath()
    {
        return Settings::findOrFail(1)->MANGA_PATH;
    }

    protected function getVideoPath()
    {
        return Settings::findOrFail(1)->VIDEO_PATH;
    }

    protected function getFullPath($root_path, Request $request)
    {
        return $root_path.$request->language.'/'.$request->slug;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.manga.create');
    }

    /**
     * Show the form for creating a new trademark.
     *
     * @return \Illuminate\Http\Response
     */
    public function tradeMark()
    {
        //

        return view('admin.manga.trademark');
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
        $request->validate([
            'manga_title' => 'required|string|min:5|max:255',
            'language' => 'required|string|max:3',
        ]);

        make_directory( $this->getFullPath($this->getMangaPath(), $request) );
        make_directory( $this->getFullPath($this->getVideoPath(), $request) );

        $manga = new Manga();
        
        $manga->manga_title = $request->manga_title;
        $manga->slug = $request->slug;
        $manga->language = $request->language;

        $manga->logo = file_upload( $this->getFullPath($this->getMangaPath(), $request), $request->logo );

        $manga->save();

        // return redirect(route('group.leader'));

        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function show(Manga $manga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function edit(Manga $manga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manga $manga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manga $manga)
    {
        //
    }
}
