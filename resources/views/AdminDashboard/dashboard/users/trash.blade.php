@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')
        <li><a href="{{ route('home') }}">داشبورد</a></li>
        <li><a class="breadcrumb_currentPage" href="{{ route('users.index') }}">همه کاربران</a></li>
        <li><a href="#">زباله</a></li>
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

    <section class="usersSection">
        <div class="row">
            <div class="col-12 bgCard hi-shadow-2">
                <div class="container-fluid" id="user">
                    @include('AdminDashboard.includes.users.AllTrashedUsers')
                </div>
            </div>
        </div>
    </section>

@endsection