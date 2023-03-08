@extends('layouts.frontend.include.master')
@section('title')
    @yield('Welcome to Test - Project')
@endsection

@section('content')
    {{-- @include('layouts.frontend.include.slider') --}}
    <div class="margin-top-10 margin-bottom-10">

        {{-- @include('layouts.frontend.include.userDetails') --}}
        @include('frontend.userSearchHistory')
    </div>
    {{-- @include('layouts.frontend.include.footer') --}}
@endsection
