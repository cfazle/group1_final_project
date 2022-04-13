@extends('layouts.main')

@section('content')


  <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Thank you</h1>
            <div class="d-inline-flex mb-lg-5">

                <p class="m-0 text-white"><a class="text-white" href="{{route('home')}}">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Thank you for contacting us. We will get back to you</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


   <section class="cart container mt-2 my-3 py-5">
        <div class="container mt-2">
            <h4>Thank you</h4>

                   @if(Session::has('order_id') && Session::get('order_id') != null)

                <h4 style="color:blue" class="my-5" > Order ID:{{Session::get('order_id')}}</h4>

                    <!-- Set up a container element for the button -->
                          <p>Please keep your order id in a safe place for the future reference.</p>

                   @endif

        </div>

    </section>

    @endsection
