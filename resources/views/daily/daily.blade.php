@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h1 style="margin-top: 50px; color: white;">Daily</h1><br>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <form action="/storedaily/{{ auth()->user()->id }}" class="row g-3" method="POST" enctype="multipart/form-data">
                @csrf        
                <div class="row">
                            <div class="col-md-12"><p style="color: white;">Add a Daily Task</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <label for="validationCustom01" class="form-label" style="padding-top: 30px">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                            {{ $errors->first('name') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="status" name="status" value="daily">
                                <label for="validationCustom01" class="form-label" style="padding-top: 30px">Description</label>
                                <textarea type="text" name="description" value="{{ old('message') }}" cols="30" rows="6" class="form-control" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label" style="padding-top: 30px">Time</label>
                                <input type="time" name="time" id="time" class="form-control" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                                {{ $errors->first('time') }}
                            </div>
                        </div>  
                        <div class="row hidden" style="padding-top: 20px">
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label" style="padding-top: 30px">User</label>
                                <select class="form-select" name="user" id="user">
                                    <option value="{{ auth()->user()->id }}" selected >{{ auth()->user()->name }} </option>
                                @foreach ($user as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>    
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="email" name="email" value="{{ auth()->user()->email }}">
                                <p>Add <button type="submit" style="margin-top: 10px; background-color: Transparent;"><i class="bi bi-arrow-right" style="color: red"></i></button></p>
                            </div>
                        </div>          
                    </form>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        <h2 style="color: white;">My Day</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        <table class="table table-striped table-hover">
                            <thead>
                              <tr style="color: white;">
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
                            <tr style="color: #f0f0f0">
                              <td><input type="time" disabled value="{{ $daily->time }}" style="background-color: Transparent; color: #f0f0f0"></td>
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
                    
                </div>
            </div> 
            <div class="col-md-1"></div>
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