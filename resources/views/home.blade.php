@extends('layouts.app')

@section('title') داشبورد @endsection

@section('top-assets')
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 40%;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .container {
            padding: 2px 16px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">داشبورد</div>
                <p style="padding: 10px">شما تا الان {{ auth()->user()->movies->sum('runtime') }} دقیقه از عمر خود را فیلم دیده اید</p>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['method' => 'GET', 'route' => 'movie.index']) !!}
                        {!! Form::label('title', 'عنوان فیلم را وارد کنید', ['class' => '']) !!}
                        <br>
                        {!! Form::text('title', null, ['class' => 'form-control', 'style' => 'direction: ltr;']) !!}
                        <br>
                        {!! Form::submit('جست و جو', ['id'=>'']) !!}
                    {!! Form::close() !!}
                </div>

                @if(isset($results))
                    @foreach($results['Search'] as $result)
                        @if($loop->first || $loop->iteration % 2 == 1)
                            <div class="row">
                        @endif
                            <div class="card col-md-6">
                                <img src="{{ $result['Poster'] == 'N/A' ? 'https://via.placeholder.com/350x150' : $result['Poster'] }}" style="width:100%">
                                <div class="">
                                    <h4><b>{{ $result['Title'] }}</b></h4>
                                    <a href="{{ route('movies.addMovieToWatched', $result['imdbID']) }}"><button type="button" class="btn btn-info">Add as watched</button></a>
                                </div>
                            </div>
                        @if($loop->last || $loop->iteration % 2 == 0)
                            </div>
                        @endif
                    @endforeach
                @endif

                @if(isset($results))
                    <nav aria-label="Page navigation example">
                        {{ \App\Helpers\Pagination::view(isset($_GET['page']) ? $_GET['page'] : 1, $results['totalResults'], 10, env('APP_LOCAL_URL') . 'movie?title=' . $_GET['title']) }}
                    </nav>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
