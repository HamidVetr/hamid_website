{{--==========[ Row of buttons abpve table ]========= --}}
<div class="row l-flex-auto">
    <div class="col-auto pl-0 l-flex">
        <a href="{{route('comments.trash')}}">
        <button class="hi-button-btn1 orange darken-2 hi-shadow-1 hi-size-4">
            <i class="fa fa-trash white-text hi-fontSize-20" aria-hidden="true"></i>
        </button>
        </a>
    </div>

    <div class="col-auto l-flex-auto text-right">
        {!! Form::open(['method'=>'POST','action'=>'AdminControllers\CommentController@multiDestroy', 'id'=>'deleteForm']) !!}
            {!! Form::text('ids', null, ['style' => 'display:none']) !!}
            <button class="hi-button-simple hi-shadow-0 red darken-3 text-right" id="multiDestroy">حذف</button>
        {!! Form::close() !!}
    </div>

</div>
{{--==========[ Table Of Users ]========= --}}
<div class="row mt-3">
    <div class="col-12 px-0">
        <table class="comments_table">
            <thead class="table_tableHeader white-text">

            {{--==========[ Table Headers ]========= --}}
            <tr>
                <th class="pl-0">
                    <div class="pure-checkbox mt-2">
                        <input id="selectAllComments" class="selectAllCheckboxes" name="checkbox" type="checkbox" onclick="selectAllCmnt()">
                        <label for="selectAllComments"></label>
                    </div>
                </th>
                <th class="text-right">علامت زدن همه</th>
                <th width="50%">متن</th>
                <th>محتوا</th>
                <th>زمان</th>
                <th>وضعیت</th>
                <th></th>
            </tr>

            </thead>
            <tbody>
            @foreach($comments as $comment)
                {{--==========[ Table Row ]========= --}}
                <tr>
                    {{--==========[ Table Row items ]========= --}}
                    <td>
                        <div class="pure-checkbox mt-2 mr-2">
                            <input id="cmnt_checkbox-{{ $comment->id }}" class="checkbox-{{ $comment->id }}" onclick="selectCmntCheckbox(event)" name="cmnt_checkbox-{{ $comment->id }}" type="checkbox" value="{{ $comment->id }}">
                            <label for="cmnt_checkbox-{{ $comment->id }}"></label>
                        </div>
                    </td>
                    <td class="text-right"><b>{{ $comment->full_name }}</b></td>
                    <td class="text-right py-2">{{ $comment->message }}</td>
                    <td>{{ $comment->subject }}</td>
                    <td class="py-1">
                        <p class="my-1 is-translated-farsi"><span>{{ $comment->created_at->format('H:i') }}</span></p>
                        <p class="my-1 is-translated-farsi"><span>{{ $comment->created_at->format('y/m/d') }}</span></p>
                    </td>
                    <td>
                        @if($comment->status==='not-checked')
                            <i class="fa fa-times fa-2x red-text" aria-hidden="true"></i>
                        @elseif($comment->status==='checked')
                            <i class="fa fa-check fa-2x green-text" aria-hidden="true"></i>
                        @endif
                    </td>
                    {{--==========[ More Button Dropdown ]========= --}}
                    <td>
                        <div class="Topbar_dropdown dropdown table_dropDown">
                            <button class="btn btn-secondary dropdown-toggle py-1 px-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v black-text hi-fontSize-20" aria-hidden="true"></i>
                            </button>
                            {{--==========[ Dropdown Menu ]========= --}}
                            <div data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" class="dropdown-menu hi-shadow-2" aria-labelledby="dropdownMenuButton">
                                {!! Form::open(['method'=>'POST','action'=>['AdminControllers\CommentController@approve',$comment->id]]) !!}
                                    <button class="dropdown-item text-right hi-shadow-0 py-0" href="#"><i class="fa fa-check ml-2" aria-hidden="true"></i>تایید</button>
                                {!! Form::close() !!}
                                @if($user = $comment->user()->first())
                                    @if($user->hasRole('superadministrator'))
                                    <a class="dropdown-item text-right py-0" href="{{route('comments.edit',$comment->id)}}"><i class="fa fa-pencil ml-2" aria-hidden="true"></i> ویرایش</a>
                                    @endif
                                @endif
                                        @if($comment->parent_id === NULL)
                                         <a class="dropdown-item text-right py-0" href="{{route('comments.show',$comment->id)}}"><i class="fa fa-reply ml-2" aria-hidden="true"></i> پاسخ</a>
                                @endif
                                <div class="dropdown-divider my-1"></div>

                                {!! Form::open(['method'=>'DELETE','action'=>['AdminControllers\CommentController@destroy',$comment->id]]) !!}
                                    <button class="dropdown-item text-right hi-shadow-0 py-0 mt-1" id="destroyComment" data-id="{{$comment->id}}"><i class="fa fa-trash ml-2" aria-hidden="true"></i>حذف</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>

{{--============[ Pagination of Page ]===========--}}
{{$comments->links()}}
<script src="{{asset('js/dashboard/allComment.js')}}"></script>
