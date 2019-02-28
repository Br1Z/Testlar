<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;// Для того что бы такая запись    $input = $request->all(); работала 
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Message;
// use Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('home');
    }

    public function main()
    {
        return view('home');
    }
    public function send()
    {
        $users = User::all();
        $messages = Message::all()->sortByDesc('id');       
        return view('message', compact('users','messages'));
    }

    public function store(Requests\MessageRequest $request)
    {

            $input = $request->all();
           
            $msg = new Message;
            $msg->for_user= $input['for_user'];
            $msg->from_user= auth()->user()->name;
            $msg->txt_message= $input['txt_message'];
            $msg->save();

            \Session::flash('flash_message', 'Сообщение отправленно!');

            return redirect('message');            
    }
    
    public function del($id)
    {   

        $msg = Message::find($id);
        $msg->delete();
        return redirect('message');
    }
    public function all()
    {   

        // $delete = Message::all()->where('for_user', auth()->user()->name)->delete();
        $deletes = Message::all()->where('for_user', auth()->user()->name);
        foreach ($deletes as $del) {
            $del->delete();
            // echo json_encode($del, JSON_UNESCAPED_UNICODE);
        }
        return redirect('message');
    }
}
