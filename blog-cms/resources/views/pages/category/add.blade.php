@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <style>
        label.error {
            color: #dc3545;
            font-size: 14px;
        }
    </style>
@endsection


@section('content')

<h2 class="mb-3">Add Categories</h2>



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
        <h3 class="card-title">New Categories</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>


    <div class="card-body">
        <form  action="{{url('category/add_category')}}" method="POST" id="addForm">
        @csrf
            <div class="from-group">
                <label for="category_name">Category Names<span class="text-danger">*     @error("category_name"){{$message}} !@enderror </span></label>
                <select id="category_name" name="category_name[]" class="form-control select2"  multiple="multiple">
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {

            $('.select2').select2({
                theme: 'bootstrap4',
                tags: true
            })

           
            $("#addForm").validate({
                rules: {
                    "category_name[]": {
                        required: true,
                    },
                },
                messages: {
                    "category_name[]": {
                        required: "Categorys names is required",
                    },
                }
            });

        });

 </script>

 @endsection