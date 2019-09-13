<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

// Model
use App\Manga;
use App\Settings;
use App\Trade_marks;
use App\TranslateGroup;

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
        return $root_path . $request->language . '/' . $request->slug;
    }

    /**
     * Fetch Group by language using language options
     * Data: language = ajax request, leader = Null
     *
     * @param  Illuminate\Http\Request;  ajax
     * @return \Illuminate\Http\Response
     */
    public function loadGroup(Request $request)
    {
        $groups = TranslateGroup::select('id', 'name')->select_language($request->language)->leader('!=', null)->get();
        return response()->json($groups);
    }

    /**
     * Fetch Manga by language using language options
     * Data: language = ajax request
     * Constraint: Not exist in trade_marks
     *
     * @param  Illuminate\Http\Request;  ajax
     * @return \Illuminate\Http\Response
     */
    public function loadManga(Request $request)
    {
        $array = [];

        $exist_manga = Trade_marks::select('manga_id')->get();

        foreach ($exist_manga as $manga) {
            $array = Arr::prepend($array, $manga->manga_id);
        }

        $manga = Manga::select('id', 'name')->language($request->language)->whereNotIn('id', $array)->get();

        return response()->json($manga);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manga.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manga.create');
    }

    /**
     * Show the form for creating a new trademark.
     *
     * @return \Illuminate\Http\Response
     */
    public function tradeMark()
    {
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

        make_directory($this->getFullPath($this->getMangaPath(), $request));
        make_directory($this->getFullPath($this->getVideoPath(), $request));

        $manga = new Manga();

        $manga->name = $request->manga_title;
        $manga->slug = $request->slug;
        $manga->language = $request->language;

        $manga->logo = file_upload($this->getFullPath($this->getMangaPath(), $request), $request->logo);

        $manga->save();

        return redirect(route('manga.action.create.trade_mark'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function addTradeMark(Request $request)
    {
        $request->validate([
            'group_name' => 'required',
            'trade_mark_manga' => 'required',
            'group_language' => 'required|string|max:3',
        ]);

        $trade_mark = new Trade_marks();

        $trade_mark->group_id = $request->group_name;
        $trade_mark->manga_id = $request->trade_mark_manga;
        $trade_mark->language = $request->group_language;

        if ($trade_mark->save()) {
            # code...
            return redirect(route('manga.index'));
        } else {
            return redirect()->back();
        }
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
