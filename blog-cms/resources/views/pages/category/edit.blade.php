@extends('layouts.master')

@section('css')

@endsection


@section('content')

<h2 class="mb-3">Edit Category Name</h2>



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
        <h3 class="card-title">Edit</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>


    <div class="card-body">
        <form  action="{{url('category/edit_category')}}" method="POST" id="addForm">
        @csrf
        <input id="invisible_id" name="id" type="hidden" value="{{$category["id"]}}">
            <div class="from-group">
                <label for="category_name">Category Name<span class="text-danger">*     @error("category_name"){{$message}} !@enderror </span></label>
                <input type="text" class="form-control" id="category_name"  value="{{$category['category_name']}}" name="category_name" placeholder="Post Title">
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
                    "category_name": {
                        required: true,
                    },
                },
                messages: {
                    "category_name": {
                        required: "Categorys names is required",
                    },
                }
            });

        });

 </script>

 @endsection