@extends('layouts.layout')

@section('content')

<div class="container-fluid" style="margin-top: 70px;">
    <div class="row">
      <div class="col-md-12" style="text-align: center">
        <h1 class="display-1">Schedule</h1><br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <table class="table table-striped table-hover">
          <colgroup>
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 15%;">
            <col span="1" style="width: 15%;">
            <col span="1" style="width: 35%;">
            <col span="1" style="width: 5%;">
            <col span="1" style="width: 5%;">
            <col span="1" style="width: 5%;">
         </colgroup>
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th colspan="2">Date </th>
              <th scope="col">Description</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
        @foreach ($tasks as $task)
          <tr>
            <td>{{ $task->name }}</td>
            <td>
              {{--<input type="time" disabled value="{{ $task->time }}">--}} 
              {{-- {{ date('m-d-Y', strtotime($task->end)) }} --}}
              {{-- {{ date('m-d-Y', strtotime($task->date)) }} --}}
              {{ $task->date }} 
            </td>
            <td>{{ $task->end }} </td>
            <td>{{ $task->description }}</td>
            <td><a href="/edit/{{ $task->id }}" class="btn btn-primary"><i class="fa fa-edit"></a></td>
            <td>
              <div class="modal fade" id="exampleModalone{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="/delete/{{ $task->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete this task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="text-align: center">
                        <p>You won't be able to revert this!</p>
                        <input type="hidden" id="usertask" name="usertask" value="{{ auth()->user()->name }}">
                        <i class="bi bi-exclamation" style="text-align: center; font-size: 6rem; color: red;"></i>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Delete" class="btn btn-danger">
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalone{{ $task->id }}"><i class="fa fa-trash"></i></button>
            </td>
            <td>
              <div class="modal fade" id="completed{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <form action="/complete/{{ $task->id }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Complete this task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- <?php echo date('Y-m-d'); ?> --}}
                    <div class="modal-body" style="text-align: center">
                    <p>Your task "{{ $task->name }}" is complete at </p>
                    <input type="date" value="<?php echo date('Y-m-d'); ?>" id="datefinish" name="datefinish">
                    <input type="time" class="form-control" id="time" name="time">
                    <input type="hidden" id="user_id" name="user_id" value="{{ $task->user_id }}">
                    <input type="hidden" id="name" name="name" value="{{ $task->name }}">
                    <input type="hidden" id="description" name="description" value="{{ $task->description }}">
                    <input type="date" id="date" name="date" class="hidden" value="{{ $task->date }}">
                    
                    <i class="bi bi-question" style="text-align: center; font-size: 6rem; color: blue;"></i>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Completed" class="btn btn-success">
                    </div>
                </div>
                </div>
            </form>
        </div>

              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#completed{{ $task->id }}"><i class="bi bi-calendar-check-fill"></i></button>
            </td>
          </tr>
            @endforeach
          </table>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row" style="margin-top: 50px">
      <div class="col-md-3"></div>
      <div class="col-md-6" style="text-align: center">
        <h3>Tasks Completed</h3>
      </div>
      <div class="col-md-3"></div>
    </div>
    <div class="row" style="margin-top: 50px">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <table class="table table-striped table-hover">
          <colgroup>
            <col span="1" style="width: 80%;">
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 10%;">
         </colgroup>
         <tbody>
          @foreach ($completed as $completed)
          <tr>
            <td> {{ $completed->name }} </td>
            <td><a href="/edit/{{ $completed->id }}" class="btn btn-primary"><i class="fa fa-edit"></a></td>
            <td>

              <div class="modal fade" id="exampleModalone{{ $completed->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="/delete/{{ $completed->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete this task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="text-align: center">
                        <p>You won't be able to revert this!</p>
                        <input type="hidden" id="usertask" name="usertask" value="{{ auth()->user()->name }}">
                        <i class="bi bi-exclamation" style="text-align: center; font-size: 6rem; color: red;"></i>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Delete" class="btn btn-danger">
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalone{{ $completed->id }}"><i class="fa fa-trash"></i></button>

            </td>
          </tr>
          @endforeach 
         </tbody>

        </table>
      </div>
      <div class="col-md-3"></div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-11">
        <a href="/create/{{ auth()->user()->id }}" class="btn btn-dark" style="margin-top: 50px; margin-right: 25px;">Add Task</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2"></div>
    </div>
    <div class="row hidden" style="margin-top: 60px;">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <table class="table table-striped table-hover"  id="tablepag">
            <thead>
              <colgroup>
                <col span="1" style="width: 10%;">
                <col span="1" style="width: 10%;">
                <col span="1" style="width: 15%;">
                <col span="1" style="width: 15%;">
                <col span="1" style="width: 25%;">
                <col span="1" style="width: 10%;">
                <col span="1" style="width: 5%;">
                <col span="1" style="width: 5%;">
                <col span="1" style="width: 5%;">
             </colgroup>
              <tr>
                <th scope="col">User</th>
                <th scope="col">Name</th>
                <th colspan="2">Date</th>
                <th scope="col">Description</th>
                <th>Complete</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
      @foreach ($admin as $admin)
                  <tr> 
                    <td>{{ $admin->user_id }}</td>  
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->date }}</td>
                    <td>{{ $admin->end }}</td>
                    <td>{{ $admin->description }}</td>
                    <td>{{ $admin->complete }}</td>
                    <td><a href="/edit/{{ $admin->id }}" class="btn btn-primary"><i class="fa fa-edit"></a></td>
                    <td>
                      <div class="modal fade" id="exampleModalone{{ $admin->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="/delete/{{ $admin->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete this task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <p>You won't be able to revert this!</p>
                                <input type="hidden" id="usertask" name="usertask" value="{{ auth()->user()->name }}">
                                <i class="bi bi-exclamation" style="text-align: center; font-size: 6rem; color: red;"></i>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" value="Delete" class="btn btn-danger">
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalone{{ $admin->id }}"><i class="fa fa-trash"></i></button>
                    </td>
                    <td>
                      <div class="modal fade" id="completed{{ $admin->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <form action="/complete/{{ $admin->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Complete this task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            {{-- <?php echo date('Y-m-d'); ?> --}}
                            <div class="modal-body" style="text-align: center">
                            <p>Your task "{{ $admin->name }}" is complete at </p>
                            <input type="date" value="<?php echo date('Y-m-d'); ?>" id="datefinish" name="datefinish">
                            <input type="time" class="form-control" id="time" name="time">
                            <input type="hidden" id="user_id" name="user_id" value="{{ $admin->user_id }}">
                            <input type="hidden" id="name" name="name" value="{{ $admin->name }}">
                            <input type="hidden" id="description" name="description" value="{{ $admin->description }}">
                            <input type="date" id="date" name="date" class="hidden" value="{{ $admin->date }}">
                            
                            <i class="bi bi-question" style="text-align: center; font-size: 6rem; color: blue;"></i>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="Completed" class="btn btn-success">
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
        
                      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#completed{{ $admin->id }}"><i class="bi bi-calendar-check-fill"></i></button>
                    </td>
                  </tr>
            @endforeach
          </tbody>
          </table>
        </div>
        <div class="col-md-1"></div>
          </div>
</div>
<style>
  div.hidden{
      display:none;
  }
</style>
@if ( $user == "admin")
<style>
  div.hidden{
      display:flex;
  }
</style>

@endif



<style>
    .showtable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: black;
  color: white;
  height: 25%;
    }
</style>






@endsection