@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">کاربران</a></li>
        <li><a href="{{ route('agencies.index') }}">همه کاربران</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('agencies.create') }}">ساخت کاربر</a></li>
    @endcomponent
@endsection

@section('css_resources')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
@endsection

@section('gallery')
    @component('components.galleries.galleryModal')
        @slot('gallery')
            <div class="row gallery_files l-rtl gallery_uploadedImage" id="loadPhotos">
                @include('AdminDashboard.includes.galleries.AllPhotos')
            </div>
        @endslot
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

    <div class="row"></div>

    {!! Form::open(['method'=>'POST','action'=>'AdminControllers\AgencyController@store']) !!}
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
                                    {{--<label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">: نام</label>--}}
                                    {{--{!! Form::text('first_name', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'placeholder' => 'نام', 'tabindex' => '2']) !!}--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group pl-2">
                                    {{--<label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:نام خانوادگی </label>--}}
                                    {{--{!! Form::text('last_name', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'placeholder' => 'نام خانوادگی', 'tabindex' => '3']) !!}--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                            <h5>: درباره</h5>
                            <div class="form-group">
                                {{--{!! Form::textarea('about', null, ['class'=>'form-control hi-aboutMePanelCard_textarea', 'tabindex'=>'1', 'placeholder'=>'چیزی درباره خود بنویسید']) !!}--}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:کد پستی</label>
                                {!! Form::number('postal_code', null, ['class' => 'form-control hi-aboutMePanelCard_input text-left', 'placeholder'=>'you@example.com', 'tabindex'=>'6']) !!}
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:پیش شماره</label>
                                {!! Form::text('zip', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'placeholder' => '013', 'tabindex' => '5']) !!}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:تلفن ثابت</label>
                                {!! Form::text('phone', null, ['class' => 'form-control hi-aboutMePanelCard_input text-left', 'placeholder' => '3357426', 'tabindex' => '4']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:آدرس</label>
                                {!! Form::text('address', null, ['class' => 'form-control hi-aboutMePanelCard_input', 'placeholder' => 'آدرس خود را وارد کنید', 'tabindex' => '9']) !!}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:شهر</label>
                                {!! Form::select('city',['رشت' => 'رشت', 'انزلی' => 'انزلی']) !!}
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label for="hi-aboutMePanelCard_input" class="hi-aboutMePanelCard_label">:استان</label>
                                {!! Form::select('state',['گیلان' => 'گیلان']) !!}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                {!! Form::number('latitude', null,['readonly','id'=>'latitude']) !!}
                                {!! Form::number('longitude', null,['readonly','id'=>'longitude']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" id="add">add</button>
            <button type="button" id="delete">delete</button>
            <div id="map" style="width:800px;height:400px" class="pull-left"></div>
        </div>

        <div class="col-4 mt-3">
            <div class="card hi-profileCard">
                <div class="card-header hi-profileCard_cardHeader blue-grey darken-1">
                    &nbsp;
                </div>

                <div class="hi-profileCard_PictureSelectorBox">
                    <div class="row">
                        <div class="col-4 pr-0 pt-5">
                            <div class="hi-profileCard_PictureSelectorBox_selector mt-4">
                                {{--{!! Form::select('gender',['1' => 'مرد', '0' => 'زن'], null, ['class'=>'dropdown', 'data-settings'=>'{"wrapperClass":"metro"}']) !!}--}}
                            </div>
                        </div>
                        {{--profile pic upload - start--}}

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

                        {{--profile pic upload - end--}}
                        <div class="col-4 pt-5">
                            <div class="hi-profileCard_PictureSelectorBox_selector hi-profileCard_PictureSelectorBox_selector_first mt-4">
                                {!! Form::select('users_id',$users, null, ['multiple'=>'multiple','class'=>'dropdown', 'data-settings'=>'{"wrapperClass":"metro"}']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-block pt-0 hi-profileCard_formBox pb-4">
                    <h4 class="card-title text-center"></h4>
                    <fieldset class="form-group px-3 pt-3">
                        <div class="form-group row">
                            {!! Form::text('name', null, ['class' => 'form-control text-center hi-profileCard_formBox_input', 'placeholder' => 'نام کاربری']) !!}
                        </div>
                        <div class="form-group row">
                            {!! Form::number('established_at', null, ['class' => 'form-control text-center hi-profileCard_formBox_input', 'placeholder' => 'سال تاسیس']) !!}
                            {{--<input name="password" class="form-control text-center hi-profileCard_formBox_input" type="password" placeholder="رمز عبور">--}}
                        </div>
                        <div class="form-group row">
                            {{--<input name="password_confirmation" class="form-control text-center hi-profileCard_formBox_input" type="password" placeholder="تکرار رمز عبور">--}}
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <div class="row pr-5 mt-5">
        <div class="col-3 push-11">
            {!! Form::submit('ایجاد', ['class'=>'btn hi-confirmButtonDashboard light-blue darken-2']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/CreateAdminUploadProfilePic.js') }}"></script>
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
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(37.280834,49.583057),
                zoom:8
            });
            google.maps.event.addListenerOnce(map, 'idle', function() {
                google.maps.event.trigger(map, 'resize');
            });

            $('#add').click(function () {
                /////add pin to map
                google.maps.event.addListener(map, 'click', function (event) {
                    $('#delete').css("visibility","visible");
                    $('#add').css("visibility","hidden");
                    lat = event.latLng.lat();
                    lng = event.latLng.lng();
                    $('#latitude').val(lat);
                    $('#longitude').val(lng);
                    var myCenter = new google.maps.LatLng(lat, lng);
                    marker = new google.maps.Marker({
                        position: myCenter,
                        map: map
                    });
                    google.maps.event.clearListeners(map, 'click');
                });
            });
            $('#delete').click(function () {
                $('#add').css("visibility","visible");
                $('#delete').css("visibility","hidden");
                $('#latitude').val('');
                $('#longitude').val('');
                marker.setMap(null);
                marker = [];
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArU3mY8fbl0T_xAN99_KqP84VhaqsEsD0&callback=initMap">
    </script>
@endsection