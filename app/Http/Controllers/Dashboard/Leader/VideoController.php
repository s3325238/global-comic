<?php

namespace App\Http\Controllers\Dashboard\Leader;

use App\Chapters;
use App\Http\Controllers\Controller;
use App\Settings;
use App\TranslateGroup;

// Model
use App\Manga;
use App\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
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
        return $root_path . Auth::user()->language . '/' . $request->slug;
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
        if (Auth::user()->role_id == '3') {
            $group = TranslateGroup::select('id')->where('leader_id', '=', Auth::id())->first();

            $mangas = TranslateGroup::findOrFail($group->id)->mangas;

        } else {

        }

        return view('admin.video.upload', compact(['mangas']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = [];

        // dd($file->getClientOriginalName());

        // $this->validate($request, [
        //     'video_name' => 'required|string|max:191',
        //     'manga' => 'required',
        //     'chapter' => 'numeric|required',
        //     'video' => 'mimetypes:video/mp4,video/quicktime|min: 35000',
        //     'images' => 'required',
        //     'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        //     'published_time' => 'date_format:Y-m-d H:i'
        // ]);

        // $file = $request->video;

        // $video = new Videos();

        // $video->name = $request->video_name;
        // $video->slug = $request->slug;
        // $video->source = file_upload($this->getFullPath($this->getVideoPath(), $request), $request->video);
        // // $request->video;
        // $video->manga_id = $request->manga;
        // $video->uploaded_by = Auth::id();
        // $video->published_time = $request->published_time;

        // $video->save();

        $manga_slug = Manga::select('slug')->where('id',$request->manga)->first();

        $existed = Chapters::select('slug')->where('manga_id','=', $request->manga)->get();

        // $manga_image = $request->images;

        $chapter = new Chapters();

        $chapter->name = 'Chapter '.$request->chapter;

        $chapter->manga_id = $request->manga;

        // dd($existed);

        if (isset($existed)) {
            foreach ($existed as $item) {
                if ($item->slug == slugging_manually($chapter->name)) {
                    return redirect()->back();
                }
            }
        }

        $chapter->slug = slugging_manually($chapter->name);

        $path = $this->getMangaPath() . Auth::user()->language . '/' . $manga_slug->slug . '/' . $chapter->slug;

        $chapter->source = multiple_file_upload($path,$request->images);

        $chapter->save();

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
    public function edit($id)
    {
        //
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
