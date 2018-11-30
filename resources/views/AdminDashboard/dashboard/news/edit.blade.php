@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">اخبار</a></li>
        <li><a href="{{ route('posts.index') }}">همه خبرها</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('posts.create') }}">ساخت خبر</a></li>
    @endcomponent
@endsection

@section('css_resources')
    <script src="https://lib.arvancloud.com/ar/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://lib.arvancloud.com/ar/dropzone/5.1.1/min/dropzone.min.js"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('gallery')
    {{--@component('components.galleries.galleryModal')--}}
        {{--@slot('gallery')--}}
            {{--<div class="row gallery_files l-rtl gallery_uploadedImage" id="loadPhotos">--}}
                {{--@include('AdminDashboard.includes.galleries.AllPhotos')--}}
            {{--</div>--}}
        {{--@endslot--}}
    {{--@endcomponent--}}
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

    <div class="row hi-createPostBox">
        <div class="col-8">
            {!! Form::model($announcement,['method'=>'PATCH', 'action'=>['AdminControllers\AnnouncementController@update',$announcement], 'id'=>'createPostForm', 'files' => true]) !!}
                <div class="row">
                    <div class="col-auto">
                        <div class="form-group makeCreatePostTitleBox">
                            {!! Form::label('title', 'ایجاد خبر جدید', ['class' => 'createPostLabel']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control makeCreatePostTitle', 'placeholder'=>'عنوان خبر را وارد کنید']) !!}
                        </div>
                    </div>
                   <div class="col-auto m-dropdown mr-4">
                       <label for="role">دسته بندی خبر</label><br>
                       {!! Form::select('role[]',\App\Role::pluck('display_name','name'),$role,["id"=>"news_category","class"=>"is-checkbox-dropdown","multiple"=>"multiple"]) !!}
                   </div>
                </div>
                <br>
                <div class="row">
                    {{--============[ Right box without image ]===========--}}
                    <div class="col-10">
                        <div class="row pr-0">
                            <div class="col-6 pr-0 pt-3">
                                {!! Form::label('body', 'متن خبر را وارد کنید:', ['class' => 'pull-right createPostLabel']) !!}
                            </div>
                            {{--<div class="col-6 pl-0">--}}
                                {{--<button type="button" data-toggle="modal" data-target="#galleryModal" class="btn btn-primary pull-left mb-2 createPostAddFileButton hi-fontSize-13">--}}
                                    {{--<i class="fa fa-camera" aria-hidden="true"></i>--}}
                                    {{--افزودن فایل--}}
                                    {{--<i class="fa fa-plus" aria-hidden="true"></i>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        </div>
                        <div class="row">
                            {!! Form::textarea('body', null, ['class'=>'form-control writeCreatePostBox', 'rows'=>'10']) !!}
                        </div>
                        <script>
                            CKEDITOR.replace('body', {
                                filebrowserUploadUrl : '{{ route('posts.imageUpload') }}',
                                filebrowserImageUploadUrl : '{{ route('posts.imageUpload') }}'
                            });
                        </script>
                        <br>
                        {{--'style' => 'display: none;'--}}
                        {!! Form::text('selectedCategories', $selectedCategories, ['style' => 'display: none;']) !!}
                        {!! Form::text('draft', null, ['style' => 'display: none;']) !!}
                        {{--{!! Form::text('indexPhoto', null, ['style' => 'display: none;']) !!}--}}

                        <div class="row">
                            <div class="col-auto ml-3">
                                <button class="hi-button-simple blue darken-2" id="releaseButton">انتشار</button>
                            </div>
                            <div class="col-auto">
                                <button class="hi-button-simple blue darken-2" id="draftButton">پیش نویس کن</button>
                            </div>
                            {{--{!! Form::submit('انتشار', ['class'=>'hi-button-simple createPostPublicationButton px-3 py-0 light-blue darken-2', 'id'=>'releaseButton']) !!}--}}
                            {{--{!! Form::submit('پیش نویس کن', ['class'=>'hi-button-simple createPostPublicationButton px-3 py-0 light-blue darken-2 mr-3', 'id'=>'draftButton']) !!}--}}
                        </div>
                    </div>
                    {{--============[ image box ]===========--}}
                    <div class="col-2 pr-0">
                        <br><br>
                        <img src="{{asset('images/nobody_m.original.jpg')}}" alt="در حال بارگذاری عکس" class="createPostImage mr-2" id="indexPhoto">
                    </div>
                </div>
            {!! Form::close() !!}
        </div>

        <div class="col-4 mt-1">
            <div class="row">
                @component('AdminDashboard.components.posts.CreatePostLeftSidebar')
                    @slot('title') دسته بندی ها @endslot
                    @slot('list')
                        <div id="postCategories">
                            @include('AdminDashboard.includes.news.NewsCategories')
                        </div>
                    @endslot
                    @slot('search_form')
                        {!! Form::open(['method'=>'GET', 'action'=>'AdminControllers\CategoryController@index']) !!}
                            {!! Form::text('query', null, ['class' => 'form-control searchFormListGroup mr-2 pb-1 hi-fontSize-13', 'placeholder'=>'جست و جو کنید', 'id'=>'categorySearch']) !!}
                        {!! Form::close() !!}
                    @endslot
                    @slot('create_form')
                        {!! Form::open(['method'=>'POST', 'action'=>'AdminControllers\CategoryController@store', 'class'=>'form-inline TodoWidget l-ltr', 'id'=>'createCategoryForm']) !!}
                            <div class="input-group" id="addTodo">
                                <button type="submit" id="categorySubmit"><img class="img-fluid" src="{{asset('images/Add-icone.png')}}"></button>
                                {!! Form::text('name', null, ['class' => 'form-control', 'id'=>'todoText', 'placeholder'=>'دسته بندی جدید']) !!}
                            </div>
                        {!! Form::close() !!}
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    {{--<script src="{{ asset('js/dashboard/CreatePostIndex.js') }}"></script>--}}
    <script>
//        var categoryCheckboxes = createPost.find("input[name=selectedCategories]").val().split(",");
        var createPost = $("#createPostForm");
        var categoryCheckboxes = createPost.find("input[name=selectedCategories]").val().split(",");
        $.each(createPost.find("input[name=selectedCategories]").val().split(","), function (index, value) {
            $('#postCategories').find('input[id=' + value + ']').prop('checked', true);
        });
        $('#draftButton').click(function (e) {
           e.preventDefault();
           $("input[name=draft]").val(1);
        });
        $('#categorySubmit').click(function (event) {

            event.preventDefault();
            var dataArray = $(this).parents('#createCategoryForm').serializeArray();
            $.ajax({
                type: "POST",
                url: "/categories",
                data: dataArray
            }).success(function (data) {
                $("#createCategoryForm").find("input[name=name]").val('');
                $('#postCategories').html(data);
                ShowNotification('دسته بندی ساخته شد');
            }).fail(function () {
                ShowNotification('وارد کردن دسته بندی الزامی است');
            });

//            window.history.pushState("", "", "/posts/create");
        });

$('#postCategories').find('input[type=checkbox]').unbind('click').click(function () {
    var checkedId = this.id;
    if (this.checked) {
        categoryCheckboxes.push(checkedId);
    } else {
        $.each(categoryCheckboxes, function (index, value) {
            if (checkedId === value) {
                categoryCheckboxes.splice(index, 1);
            }
        });
    }
    $("#createPostForm").find("input[name=selectedCategories]").val(categoryCheckboxes.toString());

});
//var checkboxes;
//$('input[type=checkbox]').change(function () {
//    var val = [];
//    $(':checkbox:checked').each(function(i){
//        val[i] = $(this).val();
//    });
//    checkboxes = val;
//});
//$("#createPostForm").find("input[name=selectedCategories]").val(categoryCheckboxes.toString());
//});
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            init: function() {
                this.on("success", function() {
                    $.ajax({
                        type: "GET",
                        url: "/photo_loader",
                        data: [],
                        success: function (data) {
                            $('#loadPhotos').html(data);
                        },
                        fail: function () {
                            alert('مشکلی در آپلود تصویر مورد نظر ایجاد شد');
                        }
                    });
                });
            }
        };
    </script>
@endsection
