@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">گالری</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('photo.all') }}">عکس ها</a></li>
    @endcomponent
@endsection

@section('content')

    <section class="usersSection">
        <div class="row">
            <div class="col-12 bgCard hi-shadow-2">
                <div class="container galleryModal">
                    {{--==========[ Dropzone to upload file ]=========--}}
                    <div class="row mt-2 px-4" id="gallery_row">
                        <div class="col-12">
                            {{--==========[ Dropzone to upload file ]=========--}}
                            <div class="gallery_files p-0">
                                <form action="{{route('photo.store')}}" method="POST" class="dropzone"
                                      id="myAwesomeDropzone">
                                    {{csrf_field()}}
                                    <input name="file" type="file" multiple class="dz-hidden-input" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
                                    {{--<button type="submit" class="hi-button-simple light-blue darken-2 ml-3">افزودن فایل</button>--}}
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            {{--<div class="btn-group pull-left ml-4" role="group" aria-label="Basic example">--}}
                                {{--<button type="submit" class="hi-button-simple light-blue darken-2 ml-3">افزودن فایل</button>--}}
                            {{--</div>--}}
                        </div>
                        <div class="col-6">
                            <div class="btn-group pull-right mr-4" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-danger mr-4" id="multiDestroy">حذف</button>
                            </div>
                        </div>
                    </div>

                    <div class="row px-4 mt-3" id="photos">
                       @include('AdminDashboard.includes.galleries.AllPhotosGallery')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')

        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.js"></script>--}}
    @endsection

