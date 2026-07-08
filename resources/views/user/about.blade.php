@extends('layouts.user.layout')

@section('title')
    About Us
@endsection

@section('main-content')
    @include('user.pages.aboutus')

    @include('user.pages.values')

    @include('user.pages.team')

    @include('user.pages.whyus')

    @include('user.pages.remark')


@endsection