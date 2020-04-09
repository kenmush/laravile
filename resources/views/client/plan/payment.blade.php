<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
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
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('plan.pay') }}" method="post" id="payment-form" name="payment_form">
                    @csrf
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
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('js/jquery.blockUI.js')}}"></script>


    <script>
        $("payment-form").validate();

  // Create a Stripe client.
var stripe = Stripe("pk_test_oDjIJoc0ThMRafL6PkUq9Oxn00kgF3ZVx6");

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
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  showLoader()
  stripe.createToken(card).then(function(result) {
    if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
        hideLoader();
    } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
    }
  });
});


// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form
  form.submit();
}
    </script>
</body>

</html>