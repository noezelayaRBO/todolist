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
                        <label for="validationCustom01" class="form-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ $task->date }}">
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Time</label>
                        <input type="time" name="time" id="time" class="form-control" value="{{ $task->time }}">
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
                                        <form action="/updatenote/{{ $notes->id }}/{{ $task->id }}" id="updatenote{{ $notes->id }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" name="valuenote{{ $notes->id }}" id="valuenote{{ $notes->id }}" value="{{ $notes->notes }}">
                                            <td><button type="button" onclick="noteone{{ $notes->id }}()" class="btn btn-primary" method="POST"><i class="fa fa-edit"></button></td>
                                        </form>    
                                        <form action="/deletenote/{{ $notes->id }}/{{ $task->id }}" id="deletenote{{ $notes->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <td><button type="button" onclick="notetwo{{ $notes->id }}()" class="btn btn-danger" method="POST"><i class="fa fa-trash"></button></td>
                                        </form>
                                    </tr>
                                    <script type="text/javascript">
                                    function noteone{{ $notes->id }}(){
                                        var noteid = "updatenote" + {{ $notes->id }};
                                        var info = "valuenote" + {{ $notes->id }};
                                        // console.log(noteid);
                                        // const { value: text } = await 
                                        Swal.fire({
                                        title: 'Update Your Note',
                                        text: "type your note!",
                                        // content: "input",
                                        // input: 'text',
                                        icon: 'question',
                                        html:
                                            '<input id="newnote" class="swal2-input" name="newnote">',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Update',
                                        inputValidator: (value) => {
                                        if (!value) {
                                        return 'You need to write something!'
                                        }}
                                        }).then((result) => {
                                        if (result.isConfirmed)
                                        {
                                            document.getElementById(info).innerHTML = 'hello';
                                            Swal.fire(
                                            'Updated!',
                                            'Your note has been updated. ${result} ${text}',
                                            'success',
                                            )
                                            console.log('${text}');
                                            document.getElementById(noteid).submit();
                                            //jQuery(noteid).submit();
                                        }
                                        })
                                    }
                                    function notetwo{{ $notes->id }}(){
                                        var notetwoid = "deletenote" + {{ $notes->id }};
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
                            
                        
{{-- <h2>Animated Modal</h2> --}}

<!-- Trigger/Open The Modal -->
{{-- <button id="myBtn">Open Modal</button> --}}

<!-- The Modal -->
{{-- <div id="myModal" class="modal"> --}}

  <!-- Modal content -->
  {{-- <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2></h2>
    </div>
    <div class="modal-body">
      <input id="newnote" class="swal2-input" name="newnote">
    </div>
    <div class="modal-footer">
      <h3></h3>
    </div>
  </div>

</div> --}}

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<style>
    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 40%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>

<script type="text/javascript">
    function sweet(){
        Swal.fire({
            title: 'Delete this task',
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
                'Your task has been deleted.',
                'success',
                )
                jQuery("#delete").submit();
            }
            })
        }
</script>



@endsection