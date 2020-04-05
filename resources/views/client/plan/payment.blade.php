@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row py-4">
                <div class="col-12 col-sm-6 col-md-6">
                    <h2 class="heading-title">Billing details</h2>
                    <form action="{{ route('plan.pay') }}" method="post" id="payment_form" >
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 form-group">
                                <label for="first_name">FIRST NAME<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder=""
                                    required>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 form-group">
                                <label for="last_name">LAST NAME <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder=""
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company_name">COMPANY NAME (OPTIONAL) </label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                placeholder="">
                        </div>


                        <div class="form-group">
                            <label for="company_name">COUNTRY </label>
                            <input type="text" class="form-control" name="country" id="country" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="street_address">STREET ADDRESS </label>
                            <input type="text" class="form-control" id="street_address" name="street_address"
                                placeholder="House number and street name">
                        </div>


                        <div class="form-group">
                            <label for="town_city">CITY<sup class="text-danger">*</sup> </label>
                            <input type="text" class="form-control" id="locality" name="town_city" placeholder=""
                                required>
                        </div>
                        <div class="form-group">
                            <label for="state_county">STATE<sup class="text-danger">*</sup> </label>
                            <input type="text" class="form-control" name="state_county" id="administrative_area_level_1"
                                placeholder=" " required>
                        </div>
                        <div class="form-group">
                            <label for="pincode_zip">ZIP<sup class="text-danger">*</sup> </label>
                            <input type="text" class="form-control" id="pincode_zip" name="pincode_zip" placeholder=""
                                required>
                        </div>
                        <div class="form-group">
                            <label for="phone">PHONE<sup class="text-danger">*</sup> </label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="email">EMAIL ADDRESS<sup class="text-danger">*</sup> </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                        </div>
                </div>
            </div>

            <h2 class="heading-title py-3">Your order </h2>
            <div class="product-cart-table table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="product-name">
                                <p> {{ $plan->title }}&nbsp; <strong class="product-quantity">× 1</strong></p>
                            </td>
                            <td>
                                ${{ number_format($plan->price, 2)  }}
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="cart-subtotal">
                            <td><strong> Subtotal</strong></td>
                            <td>${{ number_format($plan->price, 2)  }}</td>
                        </tr>
                        <tr class="order-total">
                            <td><strong>Total</strong> </td>
                            <td><strong>${{ number_format($plan->price, 2)  }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="card my-3">

                <div class="card card-view-cart">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 col-sm-8">
                                <p class="card-text">CREDIT CARD (STRIPE)</p>
                            </div>
                            <div class="col-12 col-sm-4">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                        <input type="hidden" name="plan" value="{{ $plan->id }}" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-lg" type="submit">Pay now</button>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script src="https://js.stripe.com/v3/"></script>

<script>
$( document ).ready(function() {
  $("#payment_form").validate();
});

  // Create a Stripe client.
var stripe = Stripe('{{ env("STRIPE_KEY") }}');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment_form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment_form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form
  $("#last_name-error1").attr("style", "display:block");
}
</script>
@endpush

@push('css')
<style>
    .error {
        color: red;
    }
</style>
@endpush