<div class="grid grid-cols-2 gap-10 my-12">
  <div class="spac-y-4">
    <div class="bg-white p-5 rounded-lg shadow">
      <img src="/{{ $this->product->image->path }}" alt="">
    </div>

    <div class="grid grid-cols-4 gap-4 my-4">
      @foreach($this->product->images as $image)
        <div class="rounded bg-white p-2 shadow">
          <img src="/{{ $image->path }}"  alt="">
        </div>
      @endforeach
    </div>
  </div>
  <div>
    <h1 class="text-3xl font-medium">{{ $this->product->name }}</h1>
    <div class="text-xl text-gray-700">{{ $this->product->price }}</div>

    <div class="mt-5">
      {{ $this->product->description }}
    </div>
  </div>
</div>
