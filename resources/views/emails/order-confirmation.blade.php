<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Order Confirmation #{{ $order->id }}</title>
  </head>
  <body>
    <p>
      Hey {{ $order->user->name }}
    </p>

    <p>
      Thank you for your order. You find all the details below
    </p>

    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Tax</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($order->items as $item)
          <tr>
            <td>
              {{ $item->name }} <br>
              {{ $item->description }}
            </td>
            <td>
              {{ $item->price }}
            </td>
            <td>
              {{ $item->quantity }}
            </td>
            <td>
              {{ $item->amount_tax }}
            </td>
            <td>
              {{ $item->amount_total }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>