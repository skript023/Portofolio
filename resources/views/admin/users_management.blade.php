@extends('admin.template_helper.template_helper')
@section('title', 'User Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @switch(request()->page)
                @case ('add')
                    @include('admin.user.add')
                @break
                
                @case ('edit')
                    @include('admin.user.edit')
                @break
                
                @default
                    @include( 'admin.user.view')
                @break
            @endswitch
        </div>
    </div>
</div>
@endsection