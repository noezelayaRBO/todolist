@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center; margin-top: 50px;">Daily</h2><br><br>
        </div>
    </div>
    <div class="row">
    <div class="col-md-4">
        <form action="/storedaily/{{ auth()->user()->id }}" class="row g-3" method="POST" enctype="multipart/form-data">
            @csrf        
            <div class="row">
                        <div class="col-md-12" style="text-align: center"><h4>Add a Daily Task</h4></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                        <label for="validationCustom01" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                        {{ $errors->first('name') }}
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <input type="hidden" id="status" name="status" value="daily">
                            <label for="validationCustom01" class="form-label">Description</label>
                            <textarea type="text" name="description" value="{{ old('message') }}" cols="30" rows="6" class="form-control"></textarea>
                        </div>
                        <div class="col-md-1"></div>
                        
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <label for="validationCustom01" class="form-label">Group</label>
                            <select class="form-select" id="group" name="group">
                                <option value="" disabled selected>...</option>
                                @foreach ($group as $group)
                                <option value="{{ $group->name }}">{{ $group->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1"></div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <label for="validationCustom01" class="form-label">Time</label>
                            <input type="time" name="time" id="time" class="form-control">
                            {{ $errors->first('time') }}
                        </div>
                        <div class="col-md-1"></div>
                    </div>  
                    <div class="row hidden" style="padding-top: 20px">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <select class="form-select" name="user" id="user">
                                <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->name }} </option>
                            @foreach ($user as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>    
                            @endforeach
                        </select>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-11" style="text-align: right">
                            <button type="submit" class="btn btn-dark" style="margin-top: 10px;">Add</button>
                        </div>
                        <div class="col-md-1"></div>
                    </div>          
                </form>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align: center">My Day</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>Time</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>
                            <colgroup>
                                <col span="1" style="width: 20%;">
                                <col span="1" style="width: 20%;">
                                <col span="1" style="width: 50%;">
                                <col span="1" style="width: 5%;">
                                <col span="1" style="width: 5%;">
                             </colgroup>
                          @foreach ($daily as $daily)
                            <tr>
                              <td><input type="time" disabled value="{{ $daily->time }}"></td>
                              <td>{{ $daily->name }}</td>
                              <td>{{ $daily->description }}</td>
                              <form action="/deletedaily/{{ $daily->id }}" id="deletedaily{{ $daily->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                              <td><button type="button" onclick="deletedaily{{ $daily->id }}()" class="btn btn-danger" method="POST"><i class="fa fa-trash"></button></td>
                              </form>
                              <td><a href="/editdaily/{{ $daily->id }}" class="btn btn-primary"><i class="fa fa-edit"></a></td>
                            </tr>

                            <script>
                            function deletedaily{{ $daily->id }}(){
                                var notetwoid = "deletedaily" + {{ $daily->id }};
                                Swal.fire({
                                title: 'Delete this note',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                if (result.isConfirmed)
                                {
                                    Swal.fire(
                                    'Deleted!',
                                    'Your note has been deleted.',
                                    'success',
                                    )
                                    // jQuery("#deletenote").submit();
                                    document.getElementById(notetwoid).submit();
                                }
                                })
                            }
                        </script>

                              @endforeach
                            </table>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div> 
        </div> 
    </div>
</div>
<style>
    div.hidden{
        display:none;
    }
</style>
@if ( $id == 1)
<style>
    div.hidden{
        display:flex;
    }
</style>
@endif  


@endsection