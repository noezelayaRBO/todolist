@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <select class="form-select" id="status" name="status" style="width: 30%">
                <option value="2">All</option>
                <option value="1">Program</option>
                <option value="0">In Progress</option>
            </select>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        @foreach ($tasks as $task)
                <div class="row" style="padding-top: 10px;">
                    <div class="col-lg-4">
                      <a href="/edit/{{ $task->id }}">{{ $task->name }}</a>
                        {{-- @can('view', $task)
                        <a href="/edit/{{ $task->id }}">{{ $task->name }} </a>
                        @endcan
                        @cannot('view',$task)
                            {{ $task->name }}
                        @endcannot --}}
                    </div>  
                    <div class="col-lg-4"> {{ $task->status }} </div>
                    <div class="col-lg-2"> {{ $task->description }} </div>
                </div>
            @endforeach
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <a href="/update" class="btn btn-dark">edit</a>
        </div>
    </div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8 table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Status</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
          </tbody>          
        </table>
      </div>
    </div>
</div>

<script>
  $(document).ready(function(){
  
   load_data();
   
   function load_data(query='')
   {
    $.ajax({
     url:"fetch.php",
     method:"POST",
     data:{query:query},
     success:function(data)
     {
      $('tbody').html(data);
     }
    })
   }
  
   $('#multi_search_filter').change(function(){
    $('#hidden_country').val($('#multi_search_filter').val());
    var query = $('#hidden_country').val();
    load_data(query);
   });
   
  });
  </script>


<style>
    .showtable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: black;
  color: white;
  height: 25%;
</style>
@endsection