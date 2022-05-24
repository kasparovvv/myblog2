@extends('layouts.master')

@section('css')

@endsection


@section('content')

<h2 class="mb-3">Add User</h2>



@if(Session::get('success'))
        <div class="alert alert-success mt-5 text-center">
            {{Session::get('success')}}
        </div>
    @endif

    @if(Session::get('fail'))
        <div class="alert alert-danger mt-5 text-center">
            {{Session::get('fail')}}
        </div>
    @endif

    <!-- @if(session()->get('errors'))
        <div class="alert alert-danger mt-5 text-center">
        {{ session()->get('errors')->first() }}
        </div>
    
    @endif -->

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Add User</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>


    <div class="card-body">
        <form  action="{{url('user_management/add_user')}}" method="POST" id="addForm">
        @csrf
            <!-- <div class="from-group">
                <label for="category_name">Role<span class="text-danger">*     @error("category_name"){{$message}} !@enderror </span></label>
                <input type="text" class="form-control" id="user_role"  value="" name="user_role" placeholder="Post Title">
            </div> -->
            <div class="form-group">
                <label for="exampleSelectRounded0">User Role</label>
                <select class="custom-select" name="role" id="exampleSelectRounded0">
                    @forEach($roles as $role)
                        <option value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="from-group">
                <label for="category_name">First Name<span class="text-danger">*     @error("first_name"){{$message}} !@enderror </span></label>
                <input type="text" class="form-control" id="first_name"  value="" name="first_name" placeholder="Firs Name">
            </div>
            <div class="from-group">
                <label for="category_name">Last Name<span class="text-danger">*     @error("last_name"){{$message}} !@enderror </span></label>
                <input type="text" class="form-control" id="last_name"  value="" name="last_name" placeholder="Last Name">
            </div>
            <div class="from-group">
                <label for="category_name">Email<span class="text-danger">*     @error("last_name"){{$message}} !@enderror </span></label>
                <input type="text" class="form-control" id="email"  value="" name="email" placeholder="Email">
            </div>
            <div class="from-group">
                <label for="category_name">Password<span class="text-danger">*     @error("password"){{$message}} !@enderror </span></label>
                <input type="password" class="form-control" id="password"  value="" name="password" placeholder="Password">
            </div>
            <div class="from-group mt-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>


 @endsection


 @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {

           
            $("#addForm").validate({
                rules: {
                    "first_name": {
                        required: true,
                    },
                    "last_name": {
                        required: true,
                    },
                    "email": {
                        required: true,
                    },
                    "password": {
                        required: true,
                    },
                },
                messages: {
                    "first_name": {
                        required: "First names is required",
                    },
                    "last_name": {
                        required: "Last names is required",
                    },
                    "email": {
                        required: "Email is required",
                    },
                    "password": {
                        required: "Password is required",
                    }
                }
            });

        });

 </script>

 @endsection