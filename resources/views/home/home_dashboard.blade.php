@extends('layouts.dashboard-layout-v2')

@section('head')
   
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Kolom 1 -->
        <div class="col-md-4 col-sm-6 col-12 mb-3">
            <a id="content__button"  href="{{route('dashboard.home-hero-section.index')}}" class="grid-link ">
                <div class="p-3 border bg-light text-center">Home Hero Section</div>
            </a>
        </div>
        <!-- Kolom 2 -->
        <div class="col-md-4 col-sm-6 col-12 mb-3">
            <a href="{{route('dashboard.home-easy-section.index')}}" class="grid-link">
                <div class="p-3 border bg-light text-center">Home Easy Booking</div>
            </a>
        </div>
        
    </div>
</div>
@endsection