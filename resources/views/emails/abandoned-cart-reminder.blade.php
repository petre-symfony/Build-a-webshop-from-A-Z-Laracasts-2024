@component('mail::message')
  Hey {{ $cart->user->name }},

  You still have items in your cart. Click the button bellow to continue your checkup.

  @component('mail::button', ['url' => route('cart')])
    Continue Checkout
  @endcomponent
@endcomponent