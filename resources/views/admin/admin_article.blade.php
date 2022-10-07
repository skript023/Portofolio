@extends('admin.template_helper.template_helper')
@section('title', 'Articles Manager')

@section('content')
    @if (request()->page)
        {{ $page = request()->page }}
    @else
        {{ $page = '' }}
    @endif
    @switch($page)
        @case ('add')
            @include('admin.article.add')
        @break
        
        @case ('edit')
            @include('admin.article.edit')
        @break
        
        @default
            @include( 'admin.article.view')
        @break
    @endswitch
@endsection