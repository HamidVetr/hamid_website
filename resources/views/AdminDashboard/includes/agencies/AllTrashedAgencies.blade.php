{{--==========[ Row of buttons abpve table ]=========--}}
<div class="row justify-content-end">
    <div class="col-auto text-right">
        {!! Form::open(['method'=>'POST','action'=>'AdminControllers\CommentController@multiForceDelete', 'id'=>'deleteForm']) !!}
            {!! Form::text('ids', null, ['style' => 'display:none']) !!}
            <button class="hi-button-simple hi-shadow-0 yellow darken-3" id="forceMultiDestroy">حذف دائمی</button>
        {!! Form::close() !!}
    </div>
</div>

{{--==========[ Table Of Users ]=========--}}
<div class="row mt-3">
    <div class="col-12 px-0">
        <table class="comments_trashTable">
            <thead class="table_tableHeader white-text">
                {{--==========[ Table Headers ]=========--}}
                <tr>
                    <th class="pl-0">
                        <div class="pure-checkbox mt-2">
                            <input id="selectAllComments" class="selectAllCheckboxes" name="checkbox" type="checkbox" onclick="selectAllCmnt()">
                            <label for="selectAllComments"></label>
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
            {{--==========[ Table Row ]=========--}}
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
                                    {!! Form::open(['method'=>'POST','action'=>['AdminControllers\AgencyController@restore',$agency->id]]) !!}
                                    <button class="dropdown-item text-right py-0 mt-1" id="destroyUser" data-id="{{$agency->id}}"><i class="fa fa-trash ml-2" aria-hidden="true"></i>بازگردانی</button>
                                    {!! Form::close() !!}
                                    <div class="dropdown-divider my-1"></div>
                                    {!! Form::open(['method'=>'DELETE','action'=>['AdminControllers\AgencyController@forceDelete',$agency->id]]) !!}
                                    <button class="dropdown-item text-right py-0 mt-1" id="destroyUser" data-id="{{$agency->id}}"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف دائمی</button>
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

<script src="{{asset('js/dashboard/allTrashedComment.js')}}"></script>