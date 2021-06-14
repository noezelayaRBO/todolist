<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\UserTasks;
use App\Models\User;
use App\Models\Notes;
use App\Models\Daily;
use App\Models\Weekly;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;

class DailyController extends Controller
{
    public function daily($id){
        $user = UserTasks::all();
        $daily = Daily::where('user', $id)->orderBy('time')->get();
        return view('daily.daily', compact('user', 'id', 'daily'));
    }
    public function store($id){
        $data = request ()->validate([
            'name' => 'required|min:3',
            'time' => 'required'
        ]);
        $daily = new Daily();
        $daily->user = request('user');
        $daily->name = request('name');
        $daily->description = request('description');
        $daily->time = request('time');
        // $daily->group = request('group');
        $daily->save();
        $details = request('email');
        \Mail::to($details)->send(new \App\Mail\MyTestMail($daily));
        return redirect('/daily/'.$id);
        // dd($daily);

        
        // $to_name = 'RECEIVER_NAME';
        // $to_email = 'RECEIVER_EMAIL_ADDRESS';
        // $data = array('name'=>'Ogbonna Vitalis(sender_name)', 'body' => 'A test mail');
        // Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        // $message->to($to_email, $to_name)
        // ->subject(Laravel Test Mail’);
        // $message->from('SENDER_EMAIL_ADDRESS','Test Mail');
        // });

        }
        public function destroy($id){
            $daily = Daily::findOrFail($id);
            $daily->delete();
            return redirect('/daily/' .$daily->user);
        }
        public function edit($id){
            $daily = Daily::where('id', $id)->firstOrFail();
            // dd($daily);
            return view('daily.edit', compact('daily'));
        }
        public function update($id){
            $data = request ()->validate([
            'nametask' => 'required|min:3',
            ]);
            $user = request('user');
            $info = [
                'user'=>request('user'),
                'name'=>request('nametask'),
                'description'=>request('description'),
                'time'=>request('time'),
            ];
            $daily = Daily::updateOrCreate(
                ['id'=> $id,], $info);
            return redirect('/daily/'.$user);
            //dd($info);
        }
}
