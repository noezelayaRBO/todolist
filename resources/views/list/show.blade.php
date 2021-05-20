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
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table showtable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">Status</th>
                    <th scope="col">Description</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, recusandae unde dolorem omnis praesentium, quis nisi modi consequuntur voluptatibus asperiores rerum illum? Voluptas, obcaecati a molestiae laudantium eius temporibus nemo.</td>
                  </tr>
                  <tr>
                    <td scope="row">2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <td scope="row">3</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <a href="/update" class="btn btn-dark">edit</a>
        </div>
    </div>
</div>


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