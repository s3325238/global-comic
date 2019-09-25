<?php

namespace App\Http\Controllers;

use App\TranslateGroup;
use Illuminate\Http\Request;

class TranslateGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $locale = app()->getLocale();
        $groups = TranslateGroup::select_language('vi')->get();
        return view('ui.pages.group.index',compact(['groups']));
        // return view('ui.pages.group.index')->with('locale',$locale);
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
     * @param  \App\TranslateGroup  $translateGroup
     * @return \Illuminate\Http\Response
     */
    public function show(TranslateGroup $translateGroup)
    {
        //
        return view('ui.pages.group.single');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TranslateGroup  $translateGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(TranslateGroup $translateGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TranslateGroup  $translateGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TranslateGroup $translateGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TranslateGroup  $translateGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranslateGroup $translateGroup)
    {
        //
    }
}
