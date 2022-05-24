@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css">

    <style>
        label.error {
            color: #dc3545;
            font-size: 14px;
        }
    </style>
@endsection


@section('content')

<h2 class="mb-3">Add Post</h2>

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
        <h3 class="card-title">New Post</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>


    <div class="card-body">
        <form  action="{{url('post/add_post')}}" enctype="multipart/form-data" method="POST" id="addForm">
        @csrf
            <div class="from-group">
                <label for="title">Title<span class="text-danger">* @error("title"){{$message}} !@enderror </span></label>
                <input type="text" class="form-control" id="title"  value="{{ old('mobile')}}" name="title" placeholder="Post Title">
            </div>
            <div class="form-group mt-2">
                <label for="image_path">Post Image<span class="text-danger">* @error("image_path"){{$message}} !@enderror </span></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image_path" id="image_path">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="from-group">
                <label for="content">Content<span class="text-danger">* @error("content"){{$message}} !@enderror </span></label>
                <textarea class="summernote" name="content" id="content">
                 
                </textarea>
            </div>
            <div class="from-group">
                <label for="summary">Summary<span class="text-danger">*     @error("category_name"){{$message}} !@enderror </span></label>
                <textarea class="summernote" name="summary" id="summary">
                   
                </textarea>
            </div>
            <div class="from-group">
                <label for="category_name">Category Names<span class="text-danger">*     @error("category_name"){{$message}} !@enderror </span></label>
                <select id="category_name" name="category_name[]" class="form-control select2"  multiple="multiple">
                    @forEach($categories as $category)
                            <option value="{{$category["id"]}}">{{$category["category_name"]}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="from-group mt-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>


 @endsection


 @section('scripts')

 <script src="https://adminlte.io/themes/v3/plugins/select2/js/select2.full.min.js"></script>
 <script src="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <script src="https://adminlte.io/themes/v3/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();

            $('.summernote').summernote()
            
            jQuery.validator.setDefaults({
                ignore: ":hidden, [contenteditable='true']:not([name])"
            });

            $('.select2').select2({
                theme: 'bootstrap4',
                tags: true,
            })

           
            $("#addForm").validate({
                rules: {
                    "category_name[]": {
                        required: true,
                    },
                    "title": {
                        required: true,
                    },
                    "content": {
                        required: true,
                    },
                    "summary": {
                        required: true,
                    },
                    "image_path": {
                        required: true,
                    }
                },
                messages: {
                    "category_name[]": {
                        required: "Categorys names is required",
                    },
                    "title": {
                        required: "Title is required",
                    },
                    "content": {
                        required: "Content is required",
                    },
                    "summary": {
                        required: "Summary is required",
                    },
                    "image_path": {
                        required: " Post image is required",
                    }
                }
            });

        });

 </script>

 @endsection