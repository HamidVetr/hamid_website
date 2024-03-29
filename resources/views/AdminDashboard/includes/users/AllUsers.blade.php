
{{--==========[ Row of buttons abpve table ]========= --}}
<div class="row l-flex">
    <div class="col-auto l-flex-auto pl-0">
        <a href="{{route('user.trash')}}">
        <button class="hi-button-btn1 orange darken-2 hi-shadow-1 hi-size-4">
            <i class="fa fa-trash white-text hi-fontSize-20" aria-hidden="true"></i>
        </button>
        </a>
    </div>

    <div class="col-auto l-flex-auto text-right float-right">
        <div class="btn-group" role="group" aria-label="Basic example">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminControllers\UserController@multiDestroy', 'id'=>'deleteForm']) !!}
            {!! Form::text('ids', null, ['style' => 'display: none']) !!}
            <button id="multiDestroy" class="hi-button-simple hi-shadow-0 red mr-3 darken-3">حذف</button>
            {!! Form::close() !!}
            <a href="{{route('users.create')}}">
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
                <th>نام</th>
                <th>پست الکترونیکی</th>
                <th>تلفن همراه</th>
                <th>وضعیت</th>
                <th></th>
            </tr>

            </thead>
            <tbody>
            @if($users)
            @foreach($users as $user)
                {{--==========[ Table Row ]========= --}}
                <tr>
                    {{--==========[ Table Row items ]========= --}}
                    <td>
                        <div class="pure-checkbox mt-2 mr-2">
                            <input id="{{$user->id}}" class="checkbox-{{$user->id}}" onclick="selectCmntCheckbox(event)" name="users_checkbox-{{$user->id}}" type="checkbox" value="{{$user->id}}">
                            <label for="{{$user->id}}"></label>
                        </div>
                    </td>
                    <td class="py-1 text-right userInfoPlace">
                        <img class="rounded-circle Topbar_avatar" src="{{isset($user->photos[0]) ? asset('gallery/'.$user->photos[0]->name) : asset('images/nobody_m.original.jpg') }}">
                        <p class="username">{{$user->username}}</p>
                    </td>
                    <td>{{$user->getFullNameAttribute()}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{is_null($user->mobile) ? 'شماره همراه وارد نشده':$user->mobile}}</td>
                    <td><img class="img-fluid userConfirmTick" src="{{ asset('images/tick.png') }}"></td>

                    {{--==========[ More Button Dropdown ]========= --}}
                    <td>
                        <div class="Topbar_dropdown dropdown table_dropDown">
                            <button class="btn btn-secondary dropdown-toggle py-1 px-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v black-text hi-fontSize-20" aria-hidden="true"></i>
                            </button>

                            {{--==========[ Dropdown Menu ]========= --}}
                            <div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item text-right py-0" href="{{route('users.show',$user->id)}}"><i class="fa fa-eye ml-2" aria-hidden="true"></i>مشاهده</a>
                                <a class="dropdown-item text-right py-0" href="{{route('users.edit',$user->id)}}"><i class="fa fa-pencil ml-2" aria-hidden="true"></i> ویرایش</a>
                                <div class="dropdown-divider my-1"></div>
                                {!! Form::open(['method'=>'DELETE','action'=>['AdminControllers\UserController@destroy',$user->id]]) !!}
                                <button class="dropdown-item text-right py-0 mt-1" id="destroyUser" data-id="{{$user->id}}"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</button>
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
{{$users->links()}}