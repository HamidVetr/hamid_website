@extends('layouts.main')

@section('search')
    <div class="hi-search-1">
        {!! Form::open(['method'=>'GET', 'action'=>'AdminControllers\TagController@index']) !!}
        {!! Form::text('query', isset($_GET['query'])? $_GET['query'] : '', ['class' => 'hi-search_field', 'placeholder'=>'جست و جو کنید...', 'id'=>'searchTag']) !!}
        <button class="hi-button-btn1 pull-left" id="loading"><i class="fa fa-search white-text hi-fontSize-19" aria-hidden="true"></i></button>
        {!! Form::close() !!}
    </div>
@endsection

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="{{ route('posts.index') }}">پست ها</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('tags.index') }}">برچسب ها</a></li>
    @endcomponent
@endsection

@section('content')
    <div class="hi-whiteCategoryDashboardBox">
        <div class="row p-5">
            <div class="col-5 offset-1" id="boxOfTags">
                @include('AdminDashboard.includes.tags.AllTags')
            </div>

            <div class="col-4 offset-1 categoryRightDirection">
                <div class="row">
                    {!! Form::open(['method'=>'POST','action'=>'AdminControllers\TagController@store','id'=>'chipsTag']) !!}
                    <div class="form-group">
                        <label for="hi-whiteCategoryDashboardBox_input"><h3> تگ ها:</h3></label>
                        <input id="chipsText" type="text" name="name" class="form-control hi-whiteCategoryDashboardBox_input">
                    </div>
                </div>
                <div class="row pr-1 pl-0">
                    <button id="addChips" class="btn hi-whiteCategoryDashboardBox_button light-blue darken-2">تایید</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
    <script src="{{asset('/js/dashboard/tagIndex.js')}}"></script>
@endsection


