<?php

namespace App\Http\Controllers\Dashboard\Leader;

use App\Chapters;
use App\Http\Controllers\Controller;
use App\Leader_members;

// Model
use App\Manga;
use App\Settings;
use App\TranslateGroup;
use App\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    protected function getStorage()
    {
        return Settings::findOrFail(1)->STORAGE_PATH;
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
     * Display a listing of the pending video.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        return view('admin.video.pending');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id == '3') {
            $group = TranslateGroup::select('id')->where('leader_id', '=', Auth::id())->first();

            $mangas = TranslateGroup::findOrFail($group->id)->mangas;

            return view('admin.video.upload', compact(['mangas']));

        } else if (Auth::user()->role_id == '4') {
            $leader = Leader_members::select('leader_id')->where('member_id', Auth::id())->first();

            $group = TranslateGroup::select('id')->where('leader_id', '=', $leader->leader_id)->first();

            $mangas = TranslateGroup::findOrFail($group->id)->mangas;

            return view('admin.video.upload', compact(['mangas']));
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Creating new video
        $file = $request->video;

        // foreach ($request->images as $image) {
        //     echo md5_file($image->getRealPath()) . '<br/>';
        // }
        // dd($request->images->hashName());
        // die;

        // dd($file->getClientOriginalExtension());

        $this->validate($request, [
            'video_name' => 'required|string|max:191',
            'manga' => 'required',
            'chapter' => 'numeric|required',
            'video' => 'mimetypes:video/mp4,video/quicktime|min: 35000',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:3072',
            'published_time' => 'date_format:Y-m-d H:i',
        ]);

        // Creating new video
        $file = $request->video;

        // Getter
        $manga_slug = Manga::select('slug')->where('id', $request->manga)->first();

        $existed = Chapters::select('slug')->where('manga_id', '=', $request->manga)->get();

        if (Auth::user()->role_id == '3') {

            $group = TranslateGroup::where('leader_id', Auth::id())->first();

        } else if (Auth::user()->role_id == '4') {

            $belong_to_leader = Leader_members::select('leader_id')->where('member_id', Auth::id())->first();

            $group = TranslateGroup::where('leader_id', $belong_to_leader->leader_id)->first();

        }
        // Constructor
        $chapter = new Chapters();

        $video = new Videos();

        // Chapter
        $chapter->name = 'Chapter ' . $request->chapter;

        $chapter->manga_id = $request->manga;

        if (isset($existed)) {
            foreach ($existed as $item) {
                if ($item->slug == slugging_manually($chapter->name)) {
                    return redirect()->back();
                }
            }
        }

        $chapter->slug = slugging_manually($chapter->name);

        $path =  $this->getStorage(). $group->slug . '/' . $manga_slug->slug . '/' . $chapter->slug;

        $chapter->source = storage_store('multiple', $request->images, $path);

        $chapter->save(); // Chapter table save function

        $get_latest_chapter = Chapters::find($chapter->id);

        // Video
        $video->name = $request->video_name;

        $video->slug = $request->slug;

        $video->manga_id = $request->manga;

        $video->uploaded_by = Auth::id();

        if (isset($request->published_time)) {
            # code...
            $video->published_time = $request->published_time;
        }

        $video->source = storage_store('single', $request->video, $path);

        $video->chapter = slugging_manually($chapter->name);

        $video->group_id = $group->id;

        $video->chapter_id = $get_latest_chapter->id;

        $video->save(); // Video table save function

        // if ($carbon->format('d-m-Y H:i')->diffInDays($video->published_time)) {
        //     # code...
        // }

        // $carbon  = Carbon::now('Asia/Ho_Chi_Minh');
        // dd($carbon->format('h:i A'));
        // if ($request->published_time < $carbon->format('d-m-Y H:i')) {
        //     echo "True";
        // } else {
        //     echo "False";
        // }
        // dd($carbon->format('d-m-Y H:i'));

        return redirect(route('dashboard'));
        // dd($video->getMimeType());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $video = Videos::where('slug', $slug)->first();

        return view('admin.video.edit', compact(['video']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
