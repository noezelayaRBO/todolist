@extends('layouts.layout')

@section('content')

<div class="container" style="margin-top: 70px;">
    <div class="row">
        <div class="col-md-12">
            <p class="fs-2" style="text-align: center">Welcome {{ auth()->user()->name }}</p>
        </div>
    </div>
     <div class="row">
        <div class="col-md-12" style="text-align: center">
            <a href="/create" class="btn btn-dark" style="margin-top: 50px;">Add Task</a>
            <a href="/mytask/{{ auth()->user()->name }}" class="btn btn-dark" style="margin-top: 50px;">My Task</a>
        </div>
    {{-- </div> --}}
    {{-- <div class="row">
        <div class="col-md-6">
            <form class="row g-3" style="padding-top: 30px" action="/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align: center;">Add a Task</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nametask" name="nametask" value="">
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="Program">Program</option>
                            <option value="In Progess">In Progress</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Description</label>
                        <textarea type="text" name="description" value="{{ old('message') }}" cols="30" rows="6" class="form-control"></textarea>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group d-flex flex-column">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="py-3">
                        <div>{{ $errors->first('image') }}</div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div> --}}
                {{-- <div class="row">
                    <div class="col-md-6">
                        <button type="button" onclick="myFunction()" class="btn btn-dark">Add Task</button>    
                    </div>
                </div>
            </form>
        </div>

    </div>
</div> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                {{-- <script type="text/javascript">
                    function myFunction(){
                        console.log('yes');
                        var user = "{{ auth()->user()->name }}";
                        var name = $("#nametask").val();
                        var status = $("#status").val();
                        var description = $("#description").val();
                        $.ajax({
                            //console.log('yes ajax');
                            type: 'POST',
                            url: '/store',
                            data:{
                                "_token": "{{ csrf_token() }}",
                                user: user,
                                name: name,
                                status: status,
                                description: description,
                            },
                            //document.getElementById("company_id").innerHTML

                            success: function(data){
                                console.log(data);
                                // if (data == 1){
                                //     $.get(route, function(res){
                                //         $('#company_id').append($('<option>',{
                                //         value: res.id,
                                //         text: text1,
                                //     }));
                                //     });
                                    
                                //     $('.selectpicker').selectpicker('refresh');
                                // }
                                // var com = document.getElementById("company_id").innerHTML;
                                // console.log(com);
                            }                           
                            });
                        }
                        // var table = $('#companies_id').DataTable( {
                        //     ajax: "data.json"
                        // } );
                        
                        // setInterval( function () {
                        //     table.ajax.reload( null, false);
                        // }, 30000 );
                </script>  --}}
                

@endsection
