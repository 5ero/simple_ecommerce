<div>

  <div class="grid md:grid-cols-5 gap-3 max-w-7xl">

    <div></div>
    
      <div class="md:col-span-4 md:border-l">
       
    <div class="text-3xl p-4 bg-white text-gray-600 border-r-2 border-l-2 border-white">
   
    </div>
    <div class="mx-auto w-6/12 text-center text-4xl p-4 pt-20">
      Processing your order
    
      <div class="relative pt-4">
        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
          <div id="bar" class="transition-all ease-out duration-1000 h-full bg-pink-500 relative w-0"></div>
        </div>
      </div>
      
    </div>
		</div>
	</div>
</div>



<script>
  document.addEventListener("DOMContentLoaded", function(){
            let bar = document.getElementById('bar');
            bar.classList.remove('w-0');
            bar.classList.add('w-full');
        });
</script>

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