<x-nav-link href="{{ route('cart') }}" :active="request()->routeIs('home')">
  {{  __('Your Cart') }} ({{ $this->count }})
</x-nav-link>
