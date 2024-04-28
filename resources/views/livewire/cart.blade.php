<div class="bg-white rounded-lg shadow p-5 mt-12">
  @foreach($this->items as $item)
    {{ $item->id }} - {{ $item->product_variant_id }} - {{ $item->quantity }}
  @endforeach
</div>
