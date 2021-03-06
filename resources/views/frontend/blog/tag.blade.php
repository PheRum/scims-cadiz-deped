@extends('layouts.frontend-bulma')

@section('title', $tag->name)

@section('content')
        <div class="flex flex-col lg:items-stretch md:items-stretch sm:items-center items-center mt-8">
        @if(strpos($tag->name, 'School') === false && strpos($tag->name, 'Training') === false)
            <h2 class="lg:text-3xl md:text-3xl sm:text-2xl text-2xl text-center mb-8">List of {{ $tag->name }}</h2>
        @else
            <h2 class="lg:text-3xl md:text-3xl sm:text-2xl text-2xl text-center mb-8">List of Posts in {{ $tag->name }}</h2>
        @endif
            @include('frontend.blog.partials.published-posts')
        </div>
@endsection
