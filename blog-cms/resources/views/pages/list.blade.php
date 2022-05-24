@extends('layouts.master')


@section('css')


<style>

.card,.navbar,.my_dropdown{
      background-color : rgb(37 42 55);
    }
    .card{
      border-style: dashed;
      border-color: white;
    }

</style>

@endsection




@section('content')

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="row row-cols-1 row-cols-md-2 g-4 mt-5 mb-5" >
            @forEach($cards as $card)
                <div class="col">
                    <div class="card text-white">
                        <div class="card-body">
                            <h5 class="card-title text-danger">{{$card["title"]}}</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection



