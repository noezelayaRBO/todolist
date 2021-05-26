@extends('layouts.layout')

@section('content')

<div class="container-fluid" style="margin-top: 70px;">
    {{-- <div class="row" style="margin-bottom: 50px;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <select class="form-select" id="status" name="status" style="width: 30%">
                <option value="2">All</option>
                <option value="1">Program</option>
                <option value="0">In Progress</option>
            </select>
        </div>
        <div class="col-md-2"></div>
    </div> --}}
    <div class="row">
      <div class="col-md-12" style="text-align: center">
        <h1 class="display-1">Schedule</h1><br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Status</th>
              <th scope="col">Description</th>
            </tr>
          </thead>
        @foreach ($tasks as $task)
          <tr>
            <td><a href="/edit/{{ $task->id }}">{{ $task->name }}</a></td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->description }}</td>
            <td ><span class="text-muted">{{ $task->notes }}</span></td>
          </tr>
            @endforeach
          </table></div>
          <div class="col-md-1"></div>
    <div class="row">
      <div class="col-md-2"></div>
    </div>
    <div class="row hidden" style="margin-top: 60px;">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">User</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Description</th>
              </tr>
            </thead>
            <tbody>
      @foreach ($admin as $admin)
                  <tr> 
                    <td>{{ $admin->user }}</td>  
                    <td><a href="/edit/{{ $admin->id }}">{{ $admin->name }}</a></td>
                    <td>{{ $admin->status }} </div></td>
                    <td>{{ $admin->description }}</td>
                    <td><span class="text-muted">{{ $admin->notes }}</span></td>
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
</style>
@endsection