<?php

namespace App\Http\Controllers\Dashboard\Leader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// Model
use App\Manga;
use App\Videos;
use App\Settings;
use App\Chapters;
use App\Leader_members;
use App\TranslateGroup;

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
            $leader = Leader_members::select('leader_id')->where('member_id',Auth::id())->first();

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
        $this->validate($request, [
            'video_name' => 'required|string|max:191',
            'manga' => 'required',
            'chapter' => 'numeric|required',
            'video' => 'mimetypes:video/mp4,video/quicktime|min: 35000',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'published_time' => 'date_format:Y-m-d H:i'
        ]);
        
        // Creating new video
        $file = $request->video;

        // Getter
        $manga_slug = Manga::select('slug')->where('id',$request->manga)->first();

        $existed = Chapters::select('slug')->where('manga_id','=', $request->manga)->get();

        if (Auth::user()->role_id == '3') {
            $group = TranslateGroup::where('leader_id',Auth::id())->first();
        } else if (Auth::user()->role_id == '4'){
            $belong_to_leader = Leader_members::select('leader_id')->where('member_id',Auth::id())->first();

            $group = TranslateGroup::where('leader_id',$belong_to_leader->leader_id)->first();
            
        }
        // Add new chapter
        $chapter = new Chapters();

        $chapter->name = 'Chapter '.$request->chapter;

        $chapter->manga_id = $request->manga;

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

        

        $video = new Videos();

        $video->name = $request->video_name;

        $video->slug = $request->slug;
        
        $video->manga_id = $request->manga;
        
        $video->uploaded_by = Auth::id();
        
        if (isset($request->published_time)) {
            # code...
            $video->published_time = $request->published_time;
        }

        $video->source = file_upload($this->getFullPath($this->getVideoPath(), $request), $request->video);

        $video->chapter = $chapter->slug;

        $video->group_id = $group->id;

        $video->save(); // Video table save function

        $chapter->save(); // Chapter table save function

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
