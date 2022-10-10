<?php

namespace App\Http\Controllers;

use App\Models\EmailLists;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $emailLists = new EmailLists();
            $emailLists->name = $request->name;
            $emailLists->email = $request->email;

            $email_id_finder = $emailLists->email;

            #checks if the email exist
            $email_check = DB::table('email_lists')->where('email', $email_id_finder)->first();

            #if email doesnt exist, it saves it
            if (!$email_check) {
              $emailLists->save();
            }

            #gets the email id after the email is saved
            $email_id = DB::table('email_lists')->where('email', $email_id_finder)->value('id');

            // dd($email_id);

            $messages = new Messages();
            $messages->email_id = $email_id;
            $messages->message = $request->message;

            $messages->save();


        } catch (Throwable $error) {
            return response()->json($error->getMessage(), 500);
        }

        return "save succesfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmailLists  $emailLists
     * @return \Illuminate\Http\Response
     */
    public function show($emailid)
    {
        try {

            $email = EmailLists::find($emailid);

            $messages = DB::table('messages')->where('email_id', $emailid)->pluck('message');

            // dd($email);

            return view('messages', compact('messages', 'email'));

        } catch (Throwable $error) {
            return response()->json($error->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmailLists  $emailLists
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailLists $emailLists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmailLists  $emailLists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailLists $emailLists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmailLists  $emailLists
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailLists $emailLists)
    {
        //
    }
}
