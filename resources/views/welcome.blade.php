@extends('layouts.layout')

@section('content')

<div class="container" style="margin-top: 70px;">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="row" style="padding-bottom: 50px;">
                <div class="col-md-12">
                    <p>We hope you can complete all your task</p><br>
                    <p style="padding-left: 60px; font-size: 60px">Welcome {{ auth()->user()->name }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p style="padding-left: 60px; width: 520px;">“Decide on your most important task. Begin immediately and work on that task with self-discipline until it is 100% complete. In life, all success comes from completing tasks. It’s not from working at tasks, it’s from completing tasks. It is only when you complete tasks that you become successful.”
                    <br> – Brian Tracy</p>
                </div>
                <div class="col-md-6">
                    <p style="padding-left: 60px;">10 steps to finishing what you start <a href="https://medium.com/@onepixelout/completing-tasks-10-steps-to-finishing-what-you-start-393ccba958b9"><i class="bi bi-arrow-right" style="color: red"></i></a></p>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
     <div class="row">
        <div class="col-md-12" style="text-align: center">
    </div>
</div>

@endsection