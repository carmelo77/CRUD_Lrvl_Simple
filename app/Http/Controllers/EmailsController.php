<?php

namespace App\Http\Controllers;
use App\Models\Email;

use Illuminate\Http\Request;

class EmailsController extends Controller
{
    public function index() 
    {
        $email = Email::where('from', auth()->user()->email)->paginate(8);

        return view('dashboard.email.index',compact('email'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'subject' => 'required|max: 30',
            'to' => 'required|email',
            'content' => 'required|max: 100',
        ]);

        $data = [
            'from' => auth()->user()->email,
            'subject' => $request->subject,
            'to' => $request->to,
            'content' => $request->content,
        ];

        Email::create($data);

        return redirect()->route('emails.index')
            ->with('success','Email created successfully.');
    }
}
