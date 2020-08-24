<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #333;
            text-align: left;
            font-size: 18px;
            margin: 0;
        }

        .container {
            margin: 2 auto;
            margin-top: 35px;
            padding: 40px;
            width: 750px;
            height: auto;
            background-color: #fff;
        }

        caption {
            font-size: 28px;
            margin-bottom: 15px;
        }

        table {
            border: 1px solid #333;
            border-collapse: collapse;
            margin: 0 auto;
            width: 740px;
        }

        td,
        tr,
        th {
            padding: 12px;
            border: 1px solid #333;
            width: 185px;
        }

        th {
            background-color: #f0f0f0;
        }

        h4,
        p {
            margin: 0px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <caption>
                Invoice
            </caption>
            <thead>
                <tr>
                    <th colspan="3">Invoice <strong>#{{ $invoice->id }}</strong></th>
                    <th>{{ $invoice->created_at->format('D, d M Y') }}</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Buyer: </h4>
                        <p>Test<br>
                            Test<br>
                            085343966997<br>
                            Test@gmail.com
                        </p>
                    </td>
                    <td colspan="2">
                        <h4>Customer: </h4>
                        <p>{{ $invoice->customer->name }}<br>
                            {{ $invoice->customer->address }}<br>
                            {{ $invoice->customer->phone }} <br>
                            {{ $invoice->customer->email }}
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>product</th>
                    <th>price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
                @foreach ($invoice->detail as $row)
                <tr>
                    <td>{{ $row->product->title }}</td>
                    <td>$ {{ number_format($row->price) }}</td>
                    <td>{{ $row->qty }}</td>
                    <td>$ {{ $row->subtotal }}</td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="3">Subtotal</th>
                    <td>$ {{ number_format($invoice->total) }}</td>
                </tr>
                <tr>
                    <th>discount</th>
                    <td>2%</td>
                    <td>$ {{ number_format($invoice->discount) }}</td>
                    <td>$ {{ number_format($invoice->discount) }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <td>$ {{ number_format($invoice->total_price) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>