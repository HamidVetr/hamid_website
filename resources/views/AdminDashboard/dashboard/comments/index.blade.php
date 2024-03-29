@extends('layouts.main')

@section('search')
    <div class="hi-search-1">
        {!! Form::open(['method'=>'GET', 'action'=>'AdminControllers\CommentController@index']) !!}
            {!! Form::text('query', isset($_GET['query'])? $_GET['query'] : '', ['class' => 'hi-search_field', 'placeholder'=>'جست و جو کنید...', 'id'=>'searchCmt']) !!}
            <button class="hi-button-btn1 pull-left" id="cmtSearch"><i class="fa fa-search white-text hi-fontSize-19" aria-hidden="true"></i></button>
        {!! Form::close() !!}
    </div>
@endsection

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('comments.index') }}">نظرات</a></li>
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
                <div class="container-fluid" id="categories">
                    @include('AdminDashboard.includes.comments.AllComments')
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('/js/dashboard/commentIndex.js')}}"></script>

@endsection
@section('javascript')
    <script src="{{ asset('Hi_Framework/javascript/Time And Date Picker/Other Libraries/PersianDatePicker/persian-date.js') }}"></script>
    <script src="{{ asset('Hi_Framework/javascript/Time And Date Picker/Other Libraries/PersianDatePicker/persian-datepicker-0.4.5.js') }}"></script>
    {{--<script src="{{asset('js/application.js')}}"></script>--}}
@endsection

