<div>
    <livewire:toast-messenger />
    <livewire:navbar-top />
    
    <div class="p-4">
    	<h2 class="text-3xl text-blue-600">Checkout</h2>
    </div>
    <button id="checkout-button">Checkout</button>
   
    </div>
</div>



<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    // Create an instance of the Stripe object with your publishable API key
    var stripe = Stripe("{{ config('stripe.pk') }}");
    //var checkoutButton = document.getElementById('checkout-button');

    window.addEventListener('load', (event) => {
      // Create a new Checkout Session using the server-side endpoint you
      // created in step 3.
      fetch('/stripe/create-checkout-session', {
        method: 'POST',
      })
      .then(function(response) {
        return response.json();
      })
      .then(function(session) {
        return stripe.redirectToCheckout({ sessionId: session.id });
      })
      .then(function(result) {
        // If `redirectToCheckout` fails due to a browser or network
        // error, you should display the localized error message to your
        // customer using `error.message`.
        if (result.error) {
          alert(result.error.message);
        }
      })
      .catch(function(error) {
        console.error('Error:', error);
      });
    });
  </script>