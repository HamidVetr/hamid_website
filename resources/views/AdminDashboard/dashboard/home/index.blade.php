@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')

    @endcomponent
@endsection

@section('content')

    <section class="usersSection">
        <div class="container-fluid mb-2">
            <div class="row">
                {{--==========[ Stats Progress Part One Left ]=========--}}
                <div class="col-12 col-md-3 col-lg-6 col-xl-3" id="firstCols">
                    <div class="homeCard">
                        <div class="container-fluid">
                            {{--==========[ Horizental Stat Contains two parts of circular and text ]=========--}}
                            <div class="row horizentalStat">
                                <div class="col-7 horizentalStat_stat px-0" id="stat1Container">
                                    <h5>ثبت نام ها</h5>
                                    <br>
                                </div>
                                <div class="col-5 horizentalStat_circular">
                                    <div id="stat1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--==========[ Stats Progress Part Second Left ]=========--}}
                <div class="col-12 col-md-3 col-lg-6 col-xl-3">
                    <div class="homeCard">
                        <div class="homeCard">
                            <div class="container-fluid">
                                {{--==========[ Horizental Stat Contains two parts of circular and text ]=========--}}
                                <div class="row horizentalStat">
                                    <div class="col-7 horizentalStat_stat px-0" id="stat2Container">
                                        <h5>بازدید سالانه</h5>
                                        <br>
                                    </div>
                                    <div class="col-5 horizentalStat_circular">
                                        <div id="stat2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--==========[ Stats Progress Part Third Left ]=========--}}
                <div class="col-12 col-md-3 col-lg-6 col-xl-3">
                    <div class="homeCard">
                        <div class="homeCard">
                            <div class="container-fluid">
                                {{--==========[ Horizental Stat Contains two parts of circular and text ]=========--}}
                                <div class="row horizentalStat">
                                    <div class="col-7 horizentalStat_stat px-0" id="stat3Container">
                                        <h5>بازدید ماهانه</h5>
                                        <br>
                                    </div>
                                    <div class="col-5 horizentalStat_circular">
                                        <div id="stat3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--==========[ Stats Progress Part Fourth Left ]=========--}}
                <div class="col-12 col-md-3 col-lg-6 col-xl-3">
                    <div class="homeCard">
                        <div class="homeCard">
                            <div class="container-fluid">
                                {{--==========[ Horizental Stat Contains two parts of circular and text ]=========--}}
                                <div class="row horizentalStat">
                                    <div class="col-7 horizentalStat_stat px-0" id="stat4Container">
                                        <h5>بازدید هفتگی</h5>
                                        <br>
                                    </div>
                                    <div class="col-5 horizentalStat_circular">
                                        <div id="stat4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid my-2">
            <div class="row">
                {{--==========[ Chat js Widget in Home Page ]=========--}}
                <div class="col-12 col-md-6 col-lg-12 col-xl-6 mt-4">
                    <div class="homeCard">
                        <div class="carousel pt-2" data-flickity>
                            <div class="carousel-cell">
                                <p class="text-right px-5 pt-2 mb-0">آمار فروش ماهیانه</p>
                                <canvas id="doughnutChart"></canvas>
                            </div>
                            <div class="carousel-cell">
                                <p class="text-right px-5 pt-2 mb-0">آمار فروش هفلگی</p>
                                <canvas id="polarChart"></canvas>
                            </div>
                            <div class="carousel-cell">
                                <p class="text-right px-5 pt-2 mb-02">آمار درخواست ها</p>
                                <canvas id="pieChart"></canvas>
                            </div>
                            <div class="carousel-cell">
                                <p class="text-right px-5 pt-2 mb-0">آمار لغوها</p>
                                <canvas id="radarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                {{--==========[ Chat js Widget in Home Page ]=========--}}
                <div class="col-12 col-md-6 col-lg-12 col-xl-6 mt-4">
                    <div class="homeCard">
                        <div class="carousel pt-2" data-flickity>
                            <div class="carousel-cell">
                                <p class="text-right px-5 pt-2 mb-0">آمار فروش ماهیانه</p>
                                <canvas id="doughnutChart-2"></canvas>
                            </div>
                            <div class="carousel-cell">
                                <p class="text-right px-5 pt-2 mb-0">آمار فروش هفلگی</p>
                                <canvas id="polarChart-2"></canvas>
                            </div>
                            <div class="carousel-cell">
                                <p class="text-right px-5 pt-2 mb-02">آمار درخواست ها</p>
                                <canvas id="pieChart-2"></canvas>
                            </div>
                            <div class="carousel-cell">
                                <p class="text-right px-5 pt-2 mb-0">آمار لغوها</p>
                                <canvas id="radarChart-2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4">
            <div class="row">
                {{--==========[ To-Do Widget ]=========--}}
                <div class="col-12 col-md-4 TodoWidget" id="gridWith">
                    <div class="homeCard l-fullHeight">
                        <div class="Card-Box Card-Box_dayMode hi-shadow-1 l-fullHeight">
                            {{--==========[ Header Of Card ]=========--}}
                            <div class="container-fluid l-fullHeight">
                                <div class="row deep-purple lighten-1 Card_Header">
                                    <div class="col-md-12">
                                        <h3 class="Card-Box_dayMode_cardTitle Card-Box_dayMode_title pt-4 pb-3 px-3 text-right"> یادداشت ها</h3>
                                    </div>
                                </div>
                                <div class="row" id="listOfTodos">
                                    <div class="col-md-12">
                                        <ul class="list">
                                            @if(isset($todos))
                                                @foreach($todos as $key=>$todo)
                                                    @if($todo->done)
                                                        <li class="list-item">
                                                            <input name="done" type="checkbox" onclick="task_done('{{$todo->id}}')" class="hidden-box active" id="todo[{{$key}}]"/>
                                                            <label for="todo[{{$key}}]" class="check--label">
                                                                <span class="check--label-box checkBoxDone"></span>
                                                                <span id="todo_checkbox_{{$todo->id}}" class="check--label-text checkDone">{{$todo->task}}</span>
                                                                <form method="post" action="/todos/{{$todo->id}}">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}
                                                                    <button type="submit" class="hi-button-btn1 todo_deleteBtn"><i class="fa fa-times grey-text"></i> </button>
                                                                </form>
                                                            </label>
                                                        </li>
                                                    @else
                                                        <li class="list-item">
                                                            <input name="done" type="checkbox" onclick="task_done('{{$todo->id}}')" class="hidden-box" id="todo[{{$key}}]"/>
                                                            <label for="todo[{{$key}}]" class="check--label">
                                                                <span class="check--label-box"></span>
                                                                <span class="check--label-text">{{$todo->task}}</span>
                                                                <form method="post" action="/todos/{{$todo->id}}">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}
                                                                    <button type="submit" class="hi-button-btn1 todo_deleteBtn"><i class="fa fa-times grey-text"></i> </button>
                                                                </form>
                                                            </label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <form action="/todos" method="post" class="form-inline">
                                            {{csrf_field()}}
                                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                            <div class="input-group" id="addTodo">
                                                <button type="submit" id="tagSubmit"><img class="img-fluid" src="{{asset('images/Add-icone.png')}}"></button>
                                                <input name="task" type="text" class="form-control" id="todoText" placeholder="یادداشت جدید">
                                            </div>
                                            <button type="submit" id="hiddenSubmitBtn">Sign in</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--==========[ Akharin Paiam ha Widget ]=========--}}
                <div class="col-12 col-md-4">
                    <div class="homeCard">
                        <div class="Card-Box Card-Box_dayMode hi-shadow-1 l-fullHeight">
                            {{--==========[ Header Of Card ]=========--}}
                            <div class="container-fluid">
                                <div class="row indigo Card_Header mb-2">
                                    <div class="col-6">
                                        <a href="{{ route('inbox.index') }}" class="inbox_btn">مشاهده همه</a>
                                    </div>
                                    <div class="col-6">
                                        <h3 class="Card-Box_dayMode_cardTitle Card-Box_dayMode_title pt-4 pb-3 px-1 text-right"> آخرین پیام ها</h3>
                                    </div>
                                </div>
                            </div>
                            <!-------- Start of Cell Block -------->
                            @foreach($inboxes as $inbox)
                                <div class="ListCellWithIcon">
                                    <div class="row">
                                        <div class="col-10">
                                            {{--==========[ Title Of List ]=========--}}
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="Card-Box__text text-right hi-fontSize-14">{{ $inbox->full_name }}</p>
                                                </div>
                                            </div>

                                            {{--==========[ Text Of List ]=========--}}
                                            <p class="Card-Box__text Card-Box_dayMode_text text-right">{{ str_limit($inbox->message, 60) }}</p>
                                            <p class="Card-Box__text Card-Box_dayMode_text indigo-text hi-fontSize-11 text-right"><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $inbox->createdAgo() }}</p>
                                        </div>
                                        {{--==========[ Avatar of List ]=========--}}
                                        <div class="col-2 ListCellWithIcon__Icon">
                                            <img alt="در حال بارگزاری عکس" class="rounded-circle" src="{{ asset('images/nobody_m.original.jpg') }}">
                                        </div>
                                    </div>
                                    <hr class="dayMode_line">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{--==========[ Akharin Faaliat ha Widget ]=========--}}
                <div class="col-12 col-md-4" >
                    <div class="homeCard">
                        <div class="Card-Box Card-Box_dayMode">
                            {{--==========[ Header Of Card ]=========--}}
                            <div class="container-fluid">
                                <div class="row teal darken-3 Card_Header mb-2">
                                    <div class="col-12">
                                        <h3 class="Card-Box_dayMode_cardTitle Card-Box_dayMode_title pt-4 pb-3 px-3 text-right"> آخرین فعالیت ها</h3>
                                    </div>
                                </div>
                            </div>
                            <!-------- Start of Cell Block -------->
                            @foreach($comments as $comment)
                                <div class="ListCellWithIcon">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            {{--==========[ Title Of List ]=========--}}
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <p class="Card-Box__text text-right hi-fontSize-14">{{ $comment->full_name }}</p>
                                                </div>
                                                <div class="col-12">
                                                    {{--==========[ Text Of List ]=========--}}
                                                    <p class="Card-Box__text Card-Box_dayMode_text teal-text text-darken-3 hi-fontSize-11 text-right"><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $comment->createdAgo() }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        {{--==========[ Avatar of List ]=========--}}
                                        <div class="col-2 ListCellWithIcon__Icon">
                                            <img alt="در حال بارگزاری عکس" class="rounded-circle" src="{{ asset('images/nobody_m.original.jpg') }}">
                                        </div>
                                    </div>
                                    <hr class="dayMode_line">
                                </div>
                            @endforeach
                        <!--******* End of Cell Block *******-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

@section('js_resources')
    {{--<script src="{{ asset('Hi_Framework/css/Loader/Other Libraries/Progressbar/progressbar.js') }}"></script>--}}
    {{--<script src="{{ asset('Hi_Framework/javascript/Carousel/Other Libraries/Flicklity/flickity.pkgd.min.js') }}"></script>--}}
    {{--<script src="{{ asset('Hi_Framework/javascript/Drag/Other Libraries/Draggabilly/draggabilly.pkgd.min.js') }}"></script>--}}
    {{--<script src="{{ asset('Hi_Framework/javascript/Time And Date Picker/Other Libraries/PersianDatePicker/persian-date.js') }}"></script>--}}
    {{--<script src="{{ asset('Hi_Framework/javascript/Time And Date Picker/Other Libraries/PersianDatePicker/persian-datepicker-0.4.5.js') }}"></script>--}}
    {{--<script src="{{ asset('Hi_Framework/css/Grid/Other Libraries/Packery/packery.pkgd.min.js') }}"></script>--}}
    <script src="{{ asset('js/dashboard/todo.js') }}"></script>
@endsection