@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">مدیران</a></li>
        <li><a href="{{ route('admins.index') }}">همه مدیران</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('admins.create') }}">ساخت مدیر جدید</a></li>
    @endcomponent
@endsection

@section('css_resources')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
@endsection

{{--@section('gallery')--}}
{{--@component('components.galleries.galleryModal')--}}
{{--@slot('gallery')--}}
{{--<div class="row gallery_files l-rtl gallery_uploadedImage" id="loadPhotos">--}}
{{--@include('AdminDashboard.includes.galleries.AllPhotos')--}}
{{--</div>--}}
{{--@endslot--}}
{{--@endcomponent--}}
{{--@endsection--}}

@section('content')

    <nav dir="rtl">
        @if(count($errors) > 0)
            @component('components.errors.errors') @endcomponent
        @endif

        @if(Session::has('success') || Session::has('warning') || Session::has('danger'))
            @component('components.errors.flash') @endcomponent
        @endif
    </nav>

    <div class="row"></div>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminControllers\UserController@adminStore', 'files' => true]) !!}
    <div class="row">
        <div class="col-8 mt-3">
            <div class="card hi-aboutMePanelCard">
                <div class="card-header hi-aboutMePanelCard_card-header blue-grey darken-1">
                    &nbsp;
                </div>
                <div class="card-block pl-4 text-right">
                    <div class="row pl-2">
                        <div class="col-3">
                            <div class="row">
                                <div class="form-group pl-2">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label l-rtl"><span
                                                class="red-star">*</span> مدیر آژانس:</label>
                                    {!! Form::text('first_name', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'tabindex' => '2']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group pl-2">
                                    <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label l-rtl"><span
                                                class="red-star">*</span> کد صنفی:</label>
                                    {!! Form::text('last_name', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'tabindex' => '3']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                            <h5 class="l-rtl">درباره آژانس:</h5>
                            <div class="form-group">
                                {!! Form::textarea('about', null, ['class'=>'form-control hi-aboutMePanelCard_textarea', 'tabindex'=>'1']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label l-rtl">مشاور
                                    ٣:</label>
                                {!! Form::text('land_line', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'tabindex' => '5']) !!}
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label l-rtl">مشاور
                                    ٢:</label>
                                {!! Form::text('land_line', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'tabindex' => '5']) !!}
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label l-rtl">مشاور
                                    ١:</label>
                                {!! Form::text('land_line', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'tabindex' => '5']) !!}
                            </div>
                        </div>
                        <div class="col-3 l-rtl">
                            <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label l-rtl">تعداد مشاوران:</label>
                            <div class="hi-profileCard_PictureSelectorBox_selector consultant-counter">
                            {!! Form::select('gender',['1' => '١نفر', '0' => '٢نفر'], null, ['class'=>'dropdown hi-fontSize-16', 'data-settings'=>'{"wrapperClass":"metro"}']) !!}
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input"
                                       class="hi-aboutMePanelCard_label l-rtl">ایمیل:</label>
                                {!! Form::text('address', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'tabindex' => '9']) !!}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label l-rtl"><span
                                            class="red-star">*</span> تلفن ثابت:</label>
                                {!! Form::text('zip', null, ['class' => 'form-control hi-aboutMePanelCard_input',  'tabindex' => '8']) !!}
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label l-rtl">تلفن
                                    همراه:</label>
                                {!! Form::text('occupation', null, ['class' => 'form-control hi-aboutMePanelCard_input',  'tabindex' => '7']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label l-rtl"><span
                                            class="red-star">*</span> آدرس:</label>
                                {!! Form::text('address', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'tabindex' => '12']) !!}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label l-rtl">کد
                                    پستی:</label>
                                {!! Form::text('zip', null, ['class' => 'form-control hi-aboutMePanelCard_input',  'tabindex' => '11']) !!}
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label l-rtl"><span
                                            class="red-star">*</span> سال تاسیس:</label>
                                {!! Form::text('occupation', null, ['class' => 'form-control hi-aboutMePanelCard_input',  'tabindex' => '10']) !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-4 mt-3">
            <div class="card hi-profileCard">
                <div class="card-header hi-profileCard_cardHeader blue-grey darken-1">
                    &nbsp;
                </div>
                <div class="hi-profileCard_PictureSelectorBox">
                    <div class="row justify-content-center">
                        <div class="col-4 px-2 hi-profileCard_PictureSelectorBox_pictureBox">
                            <div class="hi-profileCard_PictureSelectorBox_pictureBox_hover">
                                {!! Form::text('indexPhoto', null, ['style' => 'display: none;']) !!}
                                <figure data-toggle="modal" data-target="#galleryModal">
                                    <img src="{{ asset('images/nobody_m.original.jpg') }}"
                                         class="hi-profileCard_PictureSelectorBox_picture img-fluid"
                                         alt="Responsive image"
                                         id="indexPhoto">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-block pt-0 hi-profileCard_formBox pb-4">
                    <h4 class="card-title text-center hi-fontSize-15">آژانس املاک محمود</h4>
                    <fieldset class="form-group px-3 pt-3">
                        <div class="form-group row">
                            {!! Form::text('user_name', null, ['class' => 'form-control text-center hi-profileCard_formBox_input', 'placeholder' => 'نام آژانس']) !!}
                        </div>
                        <div class="form-group row">
                            <input name="password" class="form-control text-center hi-profileCard_formBox_input"
                                   type="password" placeholder="رمز عبور">
                        </div>
                        <div class="form-group row">
                            <input name="email" class="form-control text-center hi-profileCard_formBox_input"
                                   type="email" placeholder="ایمیل">
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 l-rtl mt-3 px-0">
            <h6 class="py-4 light-back-gray"><span class="red-star">*</span> آدرس آژانس را روی نقشه مشخص کنید</h6>
        </div>
    </div>

    <div class="row justify-content-end mt-4">
        <div class="col-7 hi-aboutMePanelCard" style=" height: 300px">

        </div>
    </div>

    <div class="row pr-5 mt-5 mb-5 pb-5">
        <div class="col-3 push-11">
            {!! Form::submit('تایید', ['class'=>'btn hi-confirmButtonDashboard light-blue darken-2']) !!}
        </div>
    </div>
    {!! Form::close() !!}


@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/CreateAdminUploadProfilePic.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            init: function () {
                this.on("success", function () {
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