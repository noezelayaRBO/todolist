<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\UserTasks;
use App\Models\User;
use App\Models\Notes;

class NoteController extends Controller
{
    public function storenotes($id){
        $validate = request()->validate([
            'notes' => 'required',
        ]);
        $notes = new Notes();
        $notes->id_tasks = $id;
        $notes->notes = request('notes');
        $notes->save();
        return redirect('/edit/' .$id);
        // Notes::create($request->all());
        // return json_encode(array(
        //     "statusCode"=>200
        // ));
    }
    public function updatenote($id)
    {
        // $request = request();
        // dd($request);
        $validate = request()->validate([
            'notesupdate' => 'required',
        ]);
        $idtask = request('id_task');
        $info = [
            'id'=>$id,
            'id_tasks'=>request('id_task'),
            'notes'=>request('notesupdate'),
        ];
        // dd($info);
        // dd(request());
        $notes = Notes::updateOrCreate(
            ['id'=> $id,], $info);
        return redirect('/edit/' .$idtask);
    }
    public function destroynote($id)
    {
        $notes = Notes::findOrFail($id);
        $notes->delete();
        $idtask = request('id_task');
        // dd($id, $task);
        return redirect('/edit/' .$idtask);
    }
}
