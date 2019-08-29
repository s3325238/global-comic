@extends('ui.pages.master')

@section('title','Manga List')

@section('detail-title','Manga List')

@section('class','section-page')

@section('content')
@include('ui.pages.partials._header')

<div class="main main-raised">
    <div class="section">
        <div class="container">
            @include('ui.pages.manga._new-update')
            @include('ui.pages.manga._hot-manga')
            <div class="text-center" style="font-size:15px">

                <a title="0-9" href="" class="btn btn-success btn-round btn-sm">0-9</a>

                @foreach (range('A','Z') as $i)
                <a title="{{ $i }}" href="#pablo" class="btn btn-success btn-round btn-sm">
                    {{ $i }}
                </a>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection