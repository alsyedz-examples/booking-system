<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsFormRequest;
use App\Jobs\ContactUsFormSubmittedJob;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Queue;

class ContactUsController extends Controller
{
    /**
     * Display contact us page.
     */
    public function index(): Factory|View
    {
        return view('contact-us');
    }

    /**
     * Submits contact us form and redirects back.
     */
    public function store(ContactUsFormRequest $request): Factory|View
    {
        Queue::push(new ContactUsFormSubmittedJob($request->get('email'), $request->get('subject'), $request->get('message')));

        session()->now('message', 'Message sent!');

        return view('contact-us');
    }
}
