@extends('layouts.user.layout')

@section('title')
    Home
@endsection

@section('main-content')
    @include('user.pages.aboutus')

    @include('user.pages.values')

    @include('user.pages.advisor')

    @include('user.pages.whyus')
    
    @include('user.pages.projects')

    @include('user.pages.remark')
    
@endsection