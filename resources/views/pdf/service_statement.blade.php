<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Statement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Service Statement</h2>
    @foreach ($services as $service)
    <h3>Invoice #{{ $service->id }}</h3>
    <p>Reference: {{ $service->reference }}</p>
    <p>Date: {{ $service->invoice_compleat_date }}</p>
    <p>{{ $service->description  }}</p>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Item Description</th>
                <th>Part No</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoiceItems[$service->id] as $item)
            <tr>
                <td>{{ $item->productname }}</td>
                <td>{{ $item->barcode }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ number_format($item->discount,2) }}</td>
                <td>{{ number_format($item->subamount,2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table border="1" width="100%">
        <tr>
            <td>Total Amount - {{ number_format($service->total_bill,2)  }}</td>
        </tr>
        <tr>
            <td>Discount - {{ number_format($service->discount,2)  }}</td>
        </tr>
        <tr>
            <td>Net Total - {{ number_format($service->net_total,2)  }}</td>
        </tr>
    </table>
    <hr>
    @endforeach
</body>

</html>