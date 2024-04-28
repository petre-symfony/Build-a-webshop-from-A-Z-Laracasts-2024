<x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
  {{  __('Your Cart (0)') }}
</x-nav-link>
