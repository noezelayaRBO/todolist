@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <form class="row g-3" style="padding-top: 30px" action="/update/{{ $task->id }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align: center;">Edit Task</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="nametask" value="{{ old('name') ?? $task->name }}">
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Description</label>
                        <textarea type="text" name="description" value="{{ old('description')}}" cols="30" rows="6" class="form-control" value="{{ old('name') ?? $task->description }}">{{ $task->description }}</textarea>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Start Day</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ $task->date }}">
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Finish Day</label>
                        <input type="date" name="datefinish" id="datefinish" class="form-control">
                        {{-- <label for="validationCustom01" class="form-label">Time</label> --}}
                        {{-- <input type="time" name="time" id="time" class="form-control" value="{{ $task->time }}"> --}}
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <input type="hidden" class="form-control" id="user" name="user" value="{{ auth()->user()->name }}">
                        <button type="submit" class="btn btn-dark" style="margin-top: 20px;">Update</button>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </form>
            </div>
        <div class="col-md-4">
            <form action="/storenotes/{{ $task->id }}" class="row g-3" style="padding-top: 60px" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <label for="validationCustom01" class="form-label">Notes</label>
                                <input type="text" name="notes" value="{{ old('name') }}" class="form-control">
                                {{ $errors->first('notes') }}
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <input type="hidden" class="form-control" id="idjv" name="idjv" value="{{ $task->id }}">
                                <button type="submit" class="btn btn-dark" style="margin-top: 20px;">Add Note</a>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </form>
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-edit"></i>modal</button> --}}
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-striped table-hover width:100%" style="margin-top: 30px">
                                <colgroup>
                                    <col span="1" style="width: 75%;">
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 15%;">
                                 </colgroup>
                                @foreach ($notes as $notes)
                                    <tr>
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
                        <div class="col-md-4"></div>
                    </div>
        </div> {{-- Col --}}
    </div> {{-- MainRow --}}
</div> {{-- Container --}}

            <div class="col-md-4">
                <div class="container-fluid">
                    
                        <div class="row">
                            <div class="col-md-12">
                                
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12">

@endsection