@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a href="#">تیکت ها</a></li>
        <li><a href="{{ route('tickets.index') }}">همه تیکت ها</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('tickets.show', $ticket->id) }}">پاسخ به تیکت {{ $ticket->full_name }} از آژانس {{ $ticket->agency_name }}</a></li>
    @endcomponent
@endsection

@section('css_resources')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
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
        <div class="col-xl-8 col-lg-10 col-12 my-3 m-curved-bg gradient-background rounded-8 pr-2 px-0">
            <div class="m-gradient-placeholder grey lighten-4 l-fullPage rounded-8 py-2">
                <div class="container-fluid pt-4 pb-2">
                    {{--title of news and date of relase --}}
                    <a data-toggle="collapse" href="#ticket2" aria-expanded="false" aria-controls="ticket2">
                        <div class="row justify-content-between l-rtl l-flex">
                            <div class="col-10 l-flex-auto col-sm-auto">
                                <div class="row px-3">
                                    <div class="col-12 px-0 col-sm-auto l-flex">
                                        <p class="mb-0 hi-fontSize-15 text-right l-rtl"><span class="cyan-text ml-2 text-right"> موضوع پیام :</span>{{ $ticket->subject }}</p>
                                    </div>
                                    <div class="col-12 col-sm-auto mt-3 mt-sm-0">
                                        <p class="mb-0 is-translated-farsi">{{ $ticket->create_date() }}</p>
                                    </div>
                                </div>
                            </div>
                            {{--open message text--}}
                            <div class="col-2 l-flex-auto col-sm-auto">
                                <button class="hi-button-btn1"><i class="fa fa-chevron-down fa-2x grey-text"></i> </button>
                            </div>
                        </div>
                    </a>
                    {{--text of news collpasable opened by top <a> --}}
                    <div class="collapse" id="ticket2">
                        <hr>
                        {!! Form::open(['method'=>'POST', 'route' => 'conversations.store']) !!}
                        <div class="row l-rtl">
                            <div class="col-12 px-0 col-sm-auto l-flex">
                            </div>
                            <div class="col-12">
                                <p class="mb-0 hi-fontSize-15 text-right l-rtl"><span class="cyan-text ml-2 text-right"> متن پیام :</span>{{ $ticket->message }}</p>
                                @foreach($ticket->conversations as $conversation)
                                    @if($conversation->user->roles[0]->name == 'superadministrator')
                                        <p class="grey-text mt-3 mb-0 text-darken-2 hi-fontSize-14 hi-lineHeight-30 thin-title"><span class="black-text medium-title"> پاسخ پشتیبان: </span>{{ $conversation->message }}</p>
                                    @elseif($conversation->user->roles[0]->name == 'consultant')
                                        <p class="grey-text mt-3 mb-0 text-darken-2 hi-fontSize-14 hi-lineHeight-30 thin-title"><span class="cyan-text medium-title"> پیام مشاور: </span>{{ $conversation->message }}</p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-12">
                                @if(!$ticket->done)
                                    {!! Form::text('ticket_id', $ticket->id, ['style' => 'display: none']) !!}
                                    {!! Form::textarea('message', null, ['class' => 'rounded-6 l-fullWidth p-3 my-3 t-gray-border hi-fontSize-14', 'rows' => '4', 'placeholder' => 'متن پیام را وارد کنید']) !!}
                                    <button class="hi-button-simple cyan hi-shadow-1 mt-2 px-4" type="submit">ارسال</button>
                                @endif
                            </div>
                        </div>

                        {{--end of discussion--}}
                        {!! Form::close() !!}
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                @if(!$ticket->done)
                                    {!! Form::open(['method'=>'POST', 'route' => ['tickets.done', $ticket->id]]) !!}
                                    <button class="hi-button-btn1 grey-text hi-fontSize-12 thin-title">اتمام گفت و گو</button>
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/dashboard/CreatePostIndex.js') }}"></script>
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
