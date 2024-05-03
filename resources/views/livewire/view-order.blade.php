<div class="grid grid-cols-2 gap-4">
  <x-panel class="mt-12 col-span-2" title="Your Order #{{ $this->order->id }}">
    <table class="w-full">
      <thead>
      <tr>
        <th class="text-left">Product</th>
        <th class="text-left">Quantity</th>
        <th class="text-right">Total</th>
      </tr>
      </thead>
      <tbody>
      @foreach($this->order->items as $item)
        <tr>
          <td>
            {{ $item->name }} <br>
            {{ $item->description }}
          </td>
          <td>{{ $item->quantity }}</td>

          <td class="text-right">{{ $item->amount_total }}</td>
        </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <td colspan="2" class="text-right font-medium">Total</td>
        <td class="font-medium text-right">{{ $this->order->amount_total }}</td>
        <td></td>
      </tr>
      </tfoot>
    </table>
  </x-panel>

  <x-panel class="col-span-1">
    {{ $orderId }}
  </x-panel>

  <x-panel class="col-span-1">
    {{ $orderId }}
  </x-panel>
</div>