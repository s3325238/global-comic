<?php

namespace App\Http\Controllers\Dashboard\Leader;

use App\Chapters;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Leader_members;
use App\Unique_Length;
use App\Manga;
use Str;

// Model
use App\Settings;
use App\TranslateGroup;
use App\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->unique = Unique_Length::find(1);
    }

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
        $this->authorize('only_leader', Videos::class);

        return view('admin.video.index');
    }

    /**
     * Display a listing of the pending video.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $this->authorize('only_leader', Videos::class);

        return view('admin.video.pending');
    }

    public function personal()
    {
        $this->authorize('only_member', Videos::class);

        return view('admin.video.member');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create_video', Videos::class);

        if (Auth::user()->role->leader == true) {

            $group = TranslateGroup::select('id')->where('leader_id', '=', Auth::id())->first();

            if (!isset($group)) {
                return redirect(route('dashboard'));
            } else {
                $mangas = $group->mangas;

                return view('admin.video.upload', compact(['mangas']));
            }
        } else if (Auth::user()->role->member == true) {

            $leader = Leader_members::select('leader_id')->where('member_id', Auth::id())->first();

            $group = TranslateGroup::select('id')->where('leader_id', '=', $leader->leader_id)->first();

            if (!isset($group)) {
                return redirect(route('dashboard'));
            } else {
                $mangas = $group->mangas;

                return view('admin.video.upload', compact(['mangas']));
            }
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
        $this->authorize('create_video', Videos::class);

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
        $manga_slug = Manga::where('id', $request->manga)->first();

        $chapter_existed = Chapters::where('manga_id', '=', $request->manga)->get();

        if (Auth::user()->role->leader == true) {

            $group = TranslateGroup::where('leader_id', Auth::id())->first();

        } else if (Auth::user()->role->member == true) {

            $belong_to_leader = Leader_members::select('leader_id')->where('member_id', Auth::id())->first();

            // dd($belong_to_leader);

            $group = TranslateGroup::where('leader_id', $belong_to_leader->leader_id)->first();

        } 

        if ($manga_slug->group_id != $group->id) {
            return redirect()->back()->withErrors(['Manga is not existed. Please choose again.']);
        }
        // Constructor
        $chapter = new Chapters();

        $video = new Videos();

        // Chapter
        $chapter->name = 'Chapter ' . $request->chapter;

        $chapter->manga_id = $request->manga;

        if (isset($chapter_existed)) {
            foreach ($chapter_existed as $item) {
                if ($item->slug == slugging_manually($chapter->name)) {
                    return redirect()->back()->withErrors(['Chapter has existed. Pleae contact your leader!']);
                    // return redirect()->back()->with('info', 'Chapter has existed! Contact your leader for more information!');
                }
            }
        }

        $chapter->slug = slugging_manually($chapter->name);

        // $chapter->uniqueString = Hash::make(Str::random(20)).Str::random($this->unique->chapter_length).str_shuffle(time());
        $chapter->uniqueString = Str::random($this->unique->chapter_length).str_shuffle(time());

        $path = $this->getStorage() . $group->slug . '/' . $manga_slug->slug . '/' . $chapter->slug;

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

        // $string = str_shuffle(Str::random(60)).str_shuffle(time());

        // $string = Hash::make(Str::random(20)).Str::random($this->unique->video_length).str_shuffle(time());

        $video->uniqueString = Str::random($this->unique->video_length).str_shuffle(time());

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
        if (Auth::user()->role->leader == true) {
            return redirect(route('video.pending'));
        } else {
            return redirect(route('video.member.personal'));
        }
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
    public function edit($uniqueString)
    {
        $this->authorize('update_video', Videos::class);

        // dd($uniqueString);

        $video = Videos::where('uniqueString', $uniqueString)->first();

        if ($video == null) {
            return redirect()->back()->withErrors(['System cannot find video']);
        }

        if (Auth::user()->can('can_update', $video)) {
            return view('admin.video.edit', compact(['video']));
        } else {
            echo "Failed here!";
            die;
            // abort(404);
        }
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
        $this->authorize('update_video', Videos::class);

        $this->validate($request, [
            'published_time' => 'date_format:Y-m-d H:i',
        ]);
        $video = Videos::find($id);

        if (Auth::user()->can('can_update', $video)) {
            $video->published_time = $request->published_time;

            $video->save();

            return redirect(route('video.pending'));
        } else {
            abort(404);
        }
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
