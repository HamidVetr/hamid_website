{{--==========[ Row of buttons abpve table ]========= --}}
<div class="row l-flex">
    <div class="col-auto l-flex-auto pl-0 float-left">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-auto mr-4">
                    <a class="hi-button-btn1 orange darken-2 hi-shadow-1 hi-size-4" href="{{ route('agencies.trash') }}">
                        <i class="fa fa-trash white-text hi-fontSize-20" aria-hidden="true"></i>
                    </a>
                </div>
                {{--<div class="col-auto">--}}
                    {{--<input name="from" type="text" class="backupSelect backup_dateSelector mx-3 text-center px-2 is-translated-farsi-field" />--}}
                {{--</div>--}}
                {{--<div class="col-auto">--}}
                    {{--<p class="medium-title m-0">تا</p>--}}
                {{--</div>--}}
                {{--<div class="col-auto">--}}
                    {{--<input name="from" type="text" class="backupSelect backup_dateSelector mx-3 text-center px-2 is-translated-farsi-field" />--}}
                {{--</div>--}}
                {{--<div class="col-auto">--}}
                    {{--<p class="medium-title m-0">از تاریخ</p>--}}
                </div>
                <div class="col-auto ml-5">
                    <div class="Topbar_dropdown posts_dropdown dropdown">
                        {{--<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            {{--همه ی دسته بندی ها--}}
                        {{--</button>--}}
                        {{--<div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">--}}
                            {{--<a class="dropdown-item text-right py-1" href="#"><i class="fa fa-user ml-2" aria-hidden="true"></i>ویژه ها</a>--}}
                            {{--<a class="dropdown-item text-right py-1" href="#"><i class="fa fa-file-text-o ml-2" aria-hidden="true"></i> فوری ها</a>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-auto l-flex-auto text-right float-right">
        <div class="btn-group" role="group" aria-label="Basic example">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminControllers\AgencyController@multiDestroy', 'id'=>'deleteForm']) !!}
            {!! Form::text('ids', null, ['style' => 'display: none']) !!}
            <button id="multiDestroy" class="hi-button-simple hi-shadow-0 red darken-3">حذف</button>
            {!! Form::close() !!}
            {{--<a class="white-text ml-3 mr-3" href="{{ route('posts.create') }}">--}}
                {{--<button class="hi-button-simple hi-shadow-0 blue darken-3">ویرایش</button>--}}
            {{--</a>--}}
            <a href="{{route('agencies.create')}}">
                <button class="hi-button-simple hi-shadow-0 green darken-3">ایجاد</button>
            </a>
        </div>
    </div>
</div>

{{--==========[ Table Of Users ]========= --}}
<div class="row mt-3">
    <div class="col-12 px-0">
        <table class="users_table">
            <thead class="table_tableHeader white-text">

            {{--==========[ Table Headers ]========= --}}
            <tr>
                <th class="pl-0">
                    <div class="pure-checkbox mt-2">
                        <input id="selectAllUsers" class="selectAllCheckboxes" name="checkbox" type="checkbox" onclick="selectAllCmnt()">
                        <label for="selectAllUsers"></label>
                    </div>
                </th>
                <th class="text-right">علامت زدن همه</th>
                <th>نام آژانس</th>
                <th>مدیر آژانس</th>
                <th>شهر و استان</th>
                <th>شماره تلفن</th>
                <th>وضعیت</th>
                <th></th>
            </tr>

            </thead>
            <tbody>
            @if($agencies)
            @foreach($agencies as $agency)
                {{--==========[ Table Row ]=========--}}
                <tr>
                    {{--==========[ Table Row items ]=========--}}
                    <td>
                        <div class="pure-checkbox mt-2 mr-2">
                            <input id="{{$agency->id}}" class="checkbox-{{$agency->id}}" onclick="selectCmntCheckbox(event)" name="users_checkbox-{{$agency->id}}" type="checkbox" value="{{$agency->id}}">
                            <label for="{{$agency->id}}"></label>
                        </div>
                    </td>
                    <td class="py-1 text-right userInfoPlace">
                        <img class="rounded-circle Topbar_avatar" src="{{isset($agency->photo[0]) ? asset('gallery/'.$agency->photo[0]->name) : asset('images/nobody_m.original.jpg') }}">
                    </td>
                    <td>{{$agency->name}}</td>
                    <td>{{is_null($agency->users()->whereRoleIs('superConsultant')->first()) ? 'برای این آژانس مدیری انتخاب نشده' : $agency->users()->whereRoleIs('superConsultant')->first()->getFullNameAttribute()}}</td>
                    <td>{{$agency->getBriefAddressAttribute()}}</td>
                    <td>{{$agency->getPhoneNumberAttribute()}}</td>
                    <td><img class="img-fluid userConfirmTick" src="{{ asset('images/tick.png') }}"></td>

                    {{--==========[ More Button Dropdown ]=========--}}
                    <td>
                        <div class="Topbar_dropdown dropdown table_dropDown">
                            <button class="btn btn-secondary dropdown-toggle py-1 px-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v black-text hi-fontSize-20" aria-hidden="true"></i>
                            </button>

                            {{--==========[ Dropdown Menu ]=========--}}
                            <div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item text-right py-0" href="{{route('agencies.show',$agency->id)}}"><i class="fa fa-eye ml-2" aria-hidden="true"></i>مشاهده</a>
                                <a class="dropdown-item text-right py-0" href="{{route('agencies.edit',$agency->id)}}"><i class="fa fa-pencil ml-2" aria-hidden="true"></i> ویرایش</a>
                                <div class="dropdown-divider my-1"></div>
                                {!! Form::open(['method'=>'DELETE','action'=>['AdminControllers\AgencyController@destroy',$agency->id]]) !!}
                                <button class="dropdown-item text-right py-0 mt-1" id="destroyUser" data-id="{{$agency->id}}"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>

{{--============[ Pagination of Page ]===========--}}
{{$agencies->links()}}