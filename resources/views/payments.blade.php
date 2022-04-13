@extends('layouts.main')

@section('content')

  <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Payment</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Payment</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

   <section class="cart container mt-2 my-3 py-5">
        <div class="container mt-2">
            <h4>Payment</h4>
                @if(Session::has('total') && Session::get('total')!= null)
                   @if(Session::has('order_id') && Session::get('order_id') != null)

                <h4 style="color:blue" class="my-5" > Total: ${{Session::get('total')}}</h4>

                    <!-- Set up a container element for the button -->
                          <div id="paypal-button-container"></div>

                   @endif
                @endif
        </div>

    </section>


       <script src="https://www.paypal.com/sdk/js?client-id=Ab3UB4yhckWVBLmnCfbz14M0UN7VeJaAH8fjMUx3bgnWKvfEwF2pRVI4JQescpNoBB0sKtYYDqhzpPcO&currency=USD"></script>



          <script>
            paypal.Buttons({

              // Sets up the transaction when a payment button is clicked
              createOrder: function(data, actions) {
                return actions.order.create({
                  purchase_units: [{
                    amount: {
                      value: "{{Session::get('total')}}" // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                    }
                  }]
                });
              },

              // Finalize the transaction after payer approval
              onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                  // Successful capture! For dev/demo purposes:
                      console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                      var transaction = orderData.purchase_units[0].payments.captures[0];
                      alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');


                    window.location.href= "/verify_payment/"+transaction.id;

                  // When ready to go live, remove the alert and show a success message within this page. For example:
                  // var element = document.getElementById('paypal-button-container');
                  // element.innerHTML = '';
                  // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                  // Or go to another URL:  actions.redirect('thank_you.html');
                });
              }
            }).render('#paypal-button-container');

          </script>



@endsection
