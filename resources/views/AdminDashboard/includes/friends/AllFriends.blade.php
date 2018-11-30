<div class="row">    <table class="table hi-roundedDashboardTagsTable">        <thead class="hi-roundedDashboardTagsTable_thead">        <tr class="hi-roundedDashboardTagsTable_thead_tr_td_m">            <td class="pt-4 hi-roundedDashboardTagsTable_thead_tr_td_r text-right"><h4>پیوندها</h4></td>            <td class="hi-roundedDashboardTagsTable_thead_tr_td_m"></td>            <td class="hi-roundedDashboardTagsTable_thead_tr_td_m"></td>            <td class="pl-4 hi-roundedDashboardTagsTable_thead_tr_td_l">                {!! Form::open(['method'=>'POST', 'action'=>'AdminControllers\FriendController@multiDestroy', 'id'=>'deleteForm']) !!}                    {!! Form::text('ids', null, ['style' => 'display: none']) !!}                    <button id="multiDestroy" class="btn pull-left hi-fontSize-14 pt-2 pb-1 mt-1                                             hi-roundedDashboardTagsTable_thead_tr_td_button">حذف                    </button>                {!! Form::close() !!}            </td>        </tr>        </thead>        <tbody>            @foreach($friends as $friend)                <tr>                    <td>                        <li class="hi-roundedDashboardTagsTable_tbody_tr_td_li text-right">                            <div class="pure-checkbox mt-2 mr-2">                                <input id="{{ $friend->id }}" class="checkbox-{{ $friend->id }}" onclick="selectCmntCheckbox(event)" name="{{ $friend->id }}" type="checkbox">                                <label for="{{ $friend->id }}">{{ $friend->site_name }}</label>                            </div>                        </li>                    </td>                    <td class="hi-roundedDashboardTagsTable_tbody_tr_td_edit text-center"><a href="{{ route('friends.edit', $friend->id) }}" class="edit">ویرایش</a></td>                    <td class="hi-roundedDashboardTagsTable_tbody_tr_td_edit text-center"><a target="_blank" href="{{ $friend->address }}">باز کردن سایت</a></td>                    <td class="hi-roundedDashboardTagsTable_tbody_tr_td_delete text-left pl-4">                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminControllers\FriendController@destroy', $friend->id], 'class'=>'singleDestroy']) !!}                            {!! Form::submit('حذف', ['id'=>'single-' . $friend->id ,'style' => 'background: none; border: none; color: #b32e2e; font-weight: bold;']) !!}                        {!! Form::close() !!}                    </td>                </tr>            @endforeach        </tbody>    </table></div>{{ $friends->links() }}<script src="{{ asset('js/dashboard/friendAll.js') }}"></script>