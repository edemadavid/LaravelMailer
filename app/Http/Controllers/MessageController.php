<?php

namespace App\Http\Controllers;

use App\Mail\sendmessage;
use App\Models\EmailMessages;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($messageId)
    {
        // dd($messageId);
        $id = [
            'id'=> $messageId
        ];

        return view('sending', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createMessage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new EmailMessages();

        $message->subject = $request->subject;
        $message->body = $request->body;

        $message ->save();


        $messageId = DB::table('email_messages')->where('subject', $message->subject)->value('id');

        // dd($messageId);

        return Redirect::route('preview', $messageId);
        // return view('emails.sendmessage', compact('message'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmailMessages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(EmailMessages $messageId)
    {

        $message = (new sendmessage($messageId));


        return $message;

    }

    public function send(EmailMessages $messageId)
    {
        // dd($messageId);
        $emails = DB::table('email_lists')->pluck('email');

        foreach ($emails as $email) {
            Mail::to($email)->send(new sendmessage($messageId));
        }

        return 'All email sent succesfully';



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messages $messages)
    {
        //
    }
}
