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

<h2 class="mb-3">Edit Post</h2>

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
        <h3 class="card-title">Edit Post</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>


    <div class="card-body">
        <form  action="{{url('post/edit_post')}}"  enctype="multipart/form-data" method="POST" id="addForm">
        @csrf
            <input id="invisible_id" name="id" type="hidden" value="{{$post['id']}}">

            <img src="{{$post['image_path']}}"   width="200px" height="200px" class="rounded mx-auto d-block" alt="Responsive image">
            
            <div class="from-group">
                <label for="title">Title<span class="text-danger">* @error("title"){{$message}} !@enderror </span></label>
                <input type="text" class="form-control" id="title"  value="{{$post['title']}}" name="title" placeholder="Post Title">
            </div>
            <div class="form-group mt-4">
                <label for="image_path">Post Image<span class="text-danger">* @error("image_path"){{$message}} !@enderror </span></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image_path" id="image_path">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="from-group">
                <label for="content">Content<span class="text-danger">* @error("content"){{$message}} !@enderror </span></label>
                <textarea class="summernote" name="content" id="content">
                    {{$post["content"]}}
                </textarea>
            </div>
            <div class="from-group">
                <label for="summary">Summary<span class="text-danger">*  @error("summary"){{$message}} !@enderror </span></label>
                <textarea class="summernote" name="summary" id="summary">
                    {{$post["summary"]}}
                </textarea>
            </div>
            <div class="from-group">
                <label for="category_name">Category Names<span class="text-danger">*  @error("category_name"){{$message}} !@enderror </span></label>
                <select id="category_name" name="category_name[]" class="form-control select2"  multiple="multiple">
                    {{ $selected = ''}}
                    @forEach($categories as $category)
                        @forEach($post["categories"] as $post_category_id)
                        {{$selected = ''}}
                            @if($post_category_id == $category["id"])
                                {{ $selected = 'selected'}}
                               @break
                            @endif
                        @endforeach
                       <option value="{{$category["id"]}}" {{$selected}}>{{$category["category_name"]}}</option>
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
                    }
                }
            });

        });

 </script>

 @endsection