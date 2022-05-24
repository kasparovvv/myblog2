@extends('layouts.master')


@section('css')


<style>


</style>

@endsection




@section('content')

<div class="container-fluid">

    <div class="row mt-4">
        <div class="col-lg-4 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$posts}}</h3>
                    <p>Active Posts</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
               
            </div>
        </div>

        <div class="col-lg-4 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$category}}</h3>
                    <p>Active Categories</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
               
            </div>
        </div>

        <div class="col-lg-4 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$users}}</h3>
                    <p>Active Users</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
               
            </div>
        </div>

       

    </div>

    @endsection