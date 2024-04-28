<div class="bg-white rounded-lg shadow p-5 mt-12">
  <table>
    <thead>
      <tr>
        <th>Product</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>
      @foreach($this->items as $item)
      <tr>
        <td>{{ 'product' }}</td>
        <td>{{ $item->quantity }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
