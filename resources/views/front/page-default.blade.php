@extends('front.template')
@section('title', $page->title)
@section('meta-description', $page->meta_description)

@section('content')

    @foreach($page_section as $ps)
        <section
            @if($ps->background_type == 'image')
                data-bg-parallax="{{ url($ps->background_image_original)}}"
            @endif

            @if($ps->background_type == 'video')
                data-bg-video="{{ url($ps->background_video)}}"
            @endif

            style="
                {{$ps->background_type == 'color' ? "background-color:$ps->background_color;" : ''}}
                {{$ps->pt != '' ? "padding-top:{$ps->pt}px;" : ''}}
                {{$ps->pr != '' ? "padding-right:{$ps->pr}px;" : ''}}
                {{$ps->pb != '' ? "padding-bottom:{$ps->pb}px;" : ''}}
                {{$ps->pl != '' ? "padding-left:{$ps->pl}px;" : ''}}
                {{$ps->mt != '' ? "margin-top:{$ps->mt}px;" : ''}}
                {{$ps->mr != '' ? "margin-right:{$ps->mr}px;" : ''}}
                {{$ps->mb != '' ? "margin-bottom:{$ps->mb}px;" : ''}}
                {{$ps->ml != '' ? "margin-left:{$ps->ml}px;" : ''}}
            ">
            @if($ps->divider != 0)
                @if($ps->background_overlay == 1)
                    <div class="bg-overlay"></div>
                @endif
                <div class="shape-divider" data-style="{{ $ps->divider }}"></div>
                <div class="shape-divider" data-style="{{ $ps->divider }}" data-position="top" data-height="{{ $ps->divider_height }}" data-flip-vertical="{{ $ps->divider_flip }}"></div>
            @endif

            @if($ps->background_type == 'image')
                <div class="bg-overlay"></div>
            @endif
            <div class="container">

            </div>
        </section>
    @endforeach

@endsection
