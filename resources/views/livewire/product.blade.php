<div class="grid grid-cols-2 gap-10">
  <div>
    <img src="{{ $product->image->path }}" alt="">
  </div>
  
  <div class="grid grid-cols-4 gap-4">
    @foreach($product->images as $image)
      <img src="{{ $image->path }}" class="rounded" alt="">
    @endforeach
  </div>
</div>
