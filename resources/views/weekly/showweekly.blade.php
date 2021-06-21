@extends('layouts.layout')

@section('content')

<div class="container" style="padding-top: 50px">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            
            <div class="row">
                <div class="col-md-12">
                    <h1 style="color: white; margin-top: 50px;">Your Weekly Task</h1>
                </div>
            </div>
            <div class="row" style="padding-top: 50px">
                <div class="col-md-12">
                    <input type="hidden" id="id" name="id" value="{{ $info->id }}">
                    <p><strong style="color: white">Name: </strong>{{ $info->name }}</p>
                    <p><strong style="color: white">Description: </strong>{{ $info->description }}</p>
                    <p><strong style="color: white">Day: </strong>{{ $info->day }}</p>
                    <p><strong style="color: white">Time: </strong><input type="time" disabled value="{{ $info->time }}" style="background-color: transparent;"></p>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-md-2">
                    <a href="/weekly/{{ $info->id }}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                </div>
                <div class="col-md-2">
                    <form action="/weekly/{{ $info->id }}" method="POST" id="deleteform">
                        @method('DELETE')
                        @csrf
                        <button type="button" onclick="deletew()" class="btn btn-danger" method="POST"><i class="fa fa-trash"></i></button>
                        <input type="hidden" name="id_user" id="id_user" value="{{ auth()->user()->id }}">
                    </form>
                    <script>
                        function deletew(){
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
                                document.getElementById('deleteform').submit();
                            }
                            })
                        }
                    </script>

                </div>
                <div class="col-md-8"></div>
            </div>



        </div>
        <div class="col-md-4"></div>
    </div>
</div>

@endsection