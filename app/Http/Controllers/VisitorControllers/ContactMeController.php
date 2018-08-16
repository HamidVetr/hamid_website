<?php

namespace App\Http\Controllers\VisitorControllers;

use App\Http\Requests\VisitorRequests\ContactMeRequest;
use App\Http\Controllers\Controller;

class ContactMeController extends Controller
{
    public function create()
    {
        return view('VisitorViews.contact-me.create');
    }

    public function store(ContactMeRequest $request)
    {

    }
}
