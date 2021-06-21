@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <form class="row g-3" style="padding-top: 30px" action="/update/{{ $task->id }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="color: white;">Edit Task</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label" style="padding-top: 30px">Name</label>
                        <input type="text" class="form-control" id="name" name="nametask" value="{{ old('name') ?? $task->name }}" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label" style="padding-top: 30px">Description</label>
                        <textarea type="text" name="description" value="{{ old('description')}}" cols="30" rows="6" class="form-control" value="{{ old('name') ?? $task->description }}" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">{{ $task->description }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label" style="padding-top: 30px">Start Day</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ $task->date }}" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label" style="padding-top: 30px">Finish Day</label>
                        <input type="date" name="datefinish" id="datefinish" class="form-control" value="{{ $task->end }}" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label" style="padding-top: 30px">Time End</label>
                        <input type="time" name="time" id="time" class="form-control" value="{{ $task->time }}" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                    </div>
                </div>
                <div class="row hidden" style="padding-top: 20px">
                    <div class="col-md-12">
                        <select class="form-select" name="user" id="user">
                            {{-- <option value="{{ auth()->user()->name }}" selected>{{ auth()->user()->name }} </option> --}}
                        @foreach ($user as $user)
                            <option value="{{ $user->name }}" {{ $user->name == $task->user_id ? 'selected' : '' }} style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px;">{{ $user->name }}</option>    
                        @endforeach
                    </select>
                    </div>
                </div>
                    <style>
                        div.hidden{
                            display:none;
                        }
                    </style>
                    
                    @if ( auth()->user()->name == "admin")
                    <style>
                        div.hidden{
                            display:flex;
                        }
                    </style>
                    @endif
                
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="form-control" id="usertwo" name="usertwo" value="{{ auth()->user()->name }}">
                        <button type="submit" class="btn btn-dark" style="margin-top: 20px;">Update</button>
                    </div>
                </div>
            </form>
            </div>
            <div class="col-md-2"></div>
        <div class="col-md-4">
            <form action="/storenotes/{{ $task->id }}" class="row g-3" style="padding-top: 60px" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Notes</label>
                                <input type="text" name="notes" value="{{ old('name') }}" class="form-control" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                                {{ $errors->first('notes') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" class="form-control" id="idjv" name="idjv" value="{{ $task->id }}">
                                <button type="submit" class="btn btn-dark" style="margin-top: 20px;">Add Note</a>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover width:100%" style="margin-top: 30px">
                                <colgroup>
                                    <col span="1" style="width: 75%;">
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 15%;">
                                 </colgroup>
                                @foreach ($notes as $notes)
                                    <tr style="color: white;">
                                        <td>{{ $notes->notes }}</td>
                                        <div class="modal fade" id="exampleModal{{ $notes->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="/updatenote/{{ $notes->id }}" method="POST">
                                                @method('PATCH')
                                                @csrf    
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit The Note</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label for="validationCustom01" class="form-label">Note:</label>
                                                            <input type="text" name="notesupdate" value="{{ old('name') ?? $notes->notes}}" class="form-control">
                                                            {{ $errors->first('notes') }}
                                                            <input type="hidden" id="id_task" name="id_task" value="{{ $task->id }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                        <input type="submit" value="Update" class="btn btn-primary">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form> 
                                        </div>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $notes->id }}"><i class="fa fa-edit"></i></button>
                                            </td>
                                           
                                        <td>
                                            <div class="modal fade" id="exampleModalone{{ $notes->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form action="/deletenote/{{ $notes->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete this note</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <p>You won't be able to revert this!</p>
                                                        <i class="bi bi-exclamation" style="text-align: center; font-size: 6rem; color: red;"></i>
                                                        <input type="hidden" id="id_task" name="id_task" value="{{ $task->id }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                        </div>
                                                    </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalone{{ $notes->id }}"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
        </div> 
    </div> 
</div> 

@endsection