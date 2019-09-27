<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Manga;
use App\Settings;
use App\Trade_marks;
use App\TranslateGroup;
use App\Unique_Length;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Str;

// Model
use Storage;

class MangaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['dashboard']);
        $this->unique = Unique_Length::find(1);
    }

    protected function getStorage()
    {
        return Settings::findOrFail(1)->STORAGE_PATH;
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
        $manga = get_model('manga', $request->language);

        return response()->json($manga);
    }

    /**
     * Display a listing of the registered manga.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view_list', Manga::class);

        return view('admin.manga.index');
    }

    /**
     * Display a listing of the available manga for registering.
     *
     * @return \Illuminate\Http\Response
     */
    public function copyrightIndex()
    {
        $this->authorize('copyright', Manga::class);

        return view('admin.manga.copyright_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create_form', Manga::class);

        return view('admin.manga.create');
    }

    /**
     * Show the form for creating a new trademark.
     *
     * @return \Illuminate\Http\Response
     */
    public function tradeMark()
    {
        $this->authorize('copyright', Manga::class);

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
        $this->authorize('create_form', Manga::class);

        $request->validate([
            'manga_title' => 'required|string|min:5|max:255',
            'language' => 'required|string|max:3',
        ]);

        Storage::makeDirectory($this->getStorage() . 'logo');

        $manga = new Manga();

        $manga->name = $request->manga_title;
        $manga->slug = $request->slug;
        $manga->language = $request->language;

        $manga->uniqueString = Hash::make(Str::random(20)) . Str::random($this->unique->manga_length) . '_' . time();

        $manga->logo = storage_store('single', $request->logo, $this->getStorage() . 'logo');

        $manga->save();

        return redirect(route('manga.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function addTradeMark(Request $request)
    {
        $this->authorize('copyright', Manga::class);

        $request->validate([
            'group_name' => 'required',
            'trade_mark_manga' => 'required',
            'group_language' => 'required|string|max:3',
        ]);

        $group = TranslateGroup::find($request->group_name);

        $manga = Manga::find($request->trade_mark_manga);

        // dd($group);

        Storage::makeDirectory($this->getStorage() . $group->slug . '/' . $manga->slug);

        $manga->group_id = $request->group_name;

        if ($manga->save()) {
            return redirect(route('manga.copyright'));
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
