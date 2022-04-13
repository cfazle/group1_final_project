@extends('layouts.main')

@section('content')




@if($products->isNotEmpty())
    @foreach ($products as $product)
    <div class="container-fluid pt-5">
        <div class="container">

            <p style="color:green"><b> {{ $product->name }}</b>
            </p>

           <p> <img src="{{  asset('img/'.$product->image)  }}" style="object-fit:fill;
                                                                        width:100px;
                                                                        height:100px;
                                                                        border-radius: 50%;
                                                                        border: solid 1px #CCC
                                                                          " />
           <br>

           </pr>

           <form class="mx-auto mt-3" method="POST" action="{{route('add_to_cart')}}">

                                       @csrf
                                       <input type="hidden" name="id" value="{{$product->id}}">
                                       <input type="hidden" name="name" value="{{$product->name}}">
                                       <input type="hidden" name="price" value="{{$product->price}}">
                                       <input type="hidden" name="sale_price" value="{{$product->sale_price}}">
                                       <input type="hidden" name="quantity" value="1">
                                       <input type="hidden" name="image" value="{{$product->image}}">
                                       <input type="submit" value="Add to Cart" class="btn btn-warning">
           </form>
            <br>
            <br>


        </div>
     </div>
    @endforeach
@else
    <div>
        <h2>No posts found</h2>
    </div>
@endif


@endsection
