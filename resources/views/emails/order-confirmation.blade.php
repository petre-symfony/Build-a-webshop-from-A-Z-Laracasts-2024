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
      <tfoot>
        @if($order->amount_shipping>0)
          <tr>
            <td>
              Shipping Costs
            </td>
            <td>
              {{ $order->amount_shipping }}
            </td>
          </tr>
        @endif
        @if($order->amount_discount>0)
          <tr>
            <td>
              Amount Discount
            </td>
            <td>
              {{ $order->amount_discount }}
            </td>
          </tr>
        @endif
        @if($order->amount_tax>0)
          <tr>
            <td>
              Amount Tax
            </td>
            <td>
              {{ $order->amount_tax }}
            </td>
          </tr>
        @endif
        @if($order->amount_subtotal>0)
          <tr>
            <td>
              Amount Subtotal
            </td>
            <td>
              {{ $order->amount_subtotal }}
            </td>
          </tr>
        @endif
        @if($order->amount_total>0)
          <tr>
            <td>
              Amount Total
            </td>
            <td>
              {{ $order->amount_total }}
            </td>
          </tr>
        @endif
      </tfoot>
    </table>
  </body>
</html>