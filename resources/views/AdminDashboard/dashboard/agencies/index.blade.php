@extends('layouts.main')
@section('search')
    <div class="hi-search-1">
        {!! Form::open(['method'=>'GET', 'action'=>'AdminControllers\UserController@index']) !!}
        {!! Form::text('query', isset($_GET['query'])? $_GET['query'] : '', ['class' => 'hi-search_field', 'placeholder'=>'جست و جو کنید...', 'id'=>'searchUser']) !!}
        <button class="hi-button-btn1 pull-left" id="userSearch"><i class="fa fa-search white-text hi-fontSize-19" aria-hidden="true"></i></button>
        {!! Form::close() !!}
    </div>
@endsection

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">آژانس ها</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('agencies.index') }}">همه آژانس ها</a></li>
    @endcomponent
@endsection

@section('content')

    <nav dir="rtl">
        @if(count($errors) > 0)
            @component('components.errors.errors') @endcomponent
        @endif

        @if(Session::has('success') || Session::has('warning') || Session::has('danger'))
            @component('components.errors.flash') @endcomponent
        @endif
    </nav>

    <section class="usersSection">
        <div class="row">
            <div class="col-12 bgCard hi-shadow-2">
                <div class="container-fluid" id="user">
                    @include('AdminDashboard.includes.agencies.AllAgencies')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    {{--<script src="{{asset('/js/dashboard/userIndex.js')}}"></script>--}}
@endsection