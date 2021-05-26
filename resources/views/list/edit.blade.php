@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <form class="row g-3" style="padding-top: 30px" action="/update/{{ $task->id }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 style="text-align: center;">Edit Task</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="nametask" value="{{ old('name') ?? $task->name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="Program" {{$task->status == 'Program' ? 'selected' : '' }}>Program</option>
                                <option value="In Progress" {{$task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Description</label>
                            <textarea type="text" name="description" value="{{ old('description')}}" cols="30" rows="6" class="form-control" value="{{ old('name') ?? $task->description }}">{{ $task->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <input type="hidden" class="form-control" id="user" name="user" value="{{ auth()->user()->name }}">
                            <button type="submit" class="btn btn-dark" style="margin-top: 20px;">Update</button>
                        </div></form>
                        <div class="col-md-2">
                            <form action="/delete/{{ $task->id }}" method="POST" id="delete">
                                @method('DELETE')
                                @csrf
                                {{-- <button onclick="return confirm('Are you sure?')" href="/delete/{{ $task->id }}" class="btn btn-danger" style="margin-top: 20px;">Delete</a> --}}
                                <button type="button" onclick="sweet()" class="btn btn-danger" style="margin-top: 20px;">Delete</button>
                            </form>
                        </div>
                        <div class="col-md-10"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="container-fluid">
                    <form action="/storenotes/{{ $task->id }}" class="row g-3" style="padding-top: 60px" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Notes</label>
                                <input type="text" name="notes" value="{{ old('name') }}" class="form-control">
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
                            <table class="table table-striped table-hover" style="margin-top: 30px">
                                @foreach ($notes as $notes)
                                    <tr>
                                    <td>{{ $notes->notes }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function sweet(){
        Swal.fire({
            title: 'Are you sure?',
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
                'Your file has been deleted.',
                'success',
                )
                jQuery("#delete").submit();
            }
            })
        }
</script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    function myFunction(){
        //console.log('yes');
        var id = $("#idjv")val();
        var note = $("#notes").val();
        $.ajax({
            type: 'POST',
            url: '/store/'+ id,
            data:{
                id_tasks: id,
                notes: note,
            },
            success: function(data){
            console.log(data);
        });
    }
</script> --}}


@endsection