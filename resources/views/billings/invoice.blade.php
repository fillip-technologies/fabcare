<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 20px;
            color: #000;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .company h2 {
            margin: 0;
        }

        .invoice-title {
            text-align: right;
            font-weight: bold;
        }

        .customer-details {
            margin: 20px 0;
            line-height: 1.6;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        table th {
            font-weight: bold;
        }

        .summary {
            margin-top: 15px;
            width: 100%;
        }

        .summary td {
            padding: 6px;
        }

        .total-section {
            margin-top: 15px;
            text-align: right;
        }

        .grand-total {
            font-size: 18px;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="invoice-box">

    <div class="header">
        <div class="company">
            <h2>FabCare Dry Cleaning & Laundry</h2>
            <p>House no - 257, Prem Chand Marg, Rajendra Nagar, Patna</p>
            <p>Phone: +91 9546770555</p>
        </div>

        <div class="invoice-title">
            INVOICE <br>
            {{ $billing->invoice_number }} <br>
            Laundry No: {{ $billing->laundry_number }}
        </div>
    </div>

    <div class="customer-details">
        <strong>Bill To:</strong><br>
        {{ $billing->user->name }} <br>
        {{ $billing->user->phone }} <br>
        {{ $billing->user->email }} <br>
        {{ $billing->user->address }}
    </div>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Price (₹)</th>
                <th>Total (₹)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item['item_name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ number_format($item['price'],2) }}</td>
                <td>{{ number_format($item['total'],2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="summary">
        <tr>
            <td width="70%"></td>
            <td><strong>Subtotal:</strong></td>
            <td>₹ {{ number_format($subtotal,2) }}</td>
        </tr>
        <tr>
            <td></td>
            <td><strong>GST:</strong></td>
            <td>₹ {{ number_format($billing->gst,2) }}</td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Discount:</strong></td>
            <td>₹ {{ number_format($billing->discount,2) }}</td>
        </tr>
    </table>

    <div class="total-section">
        <p class="grand-total">
            Total: ₹ {{ number_format($billing->total_amount,2) }}
        </p>
        <p>
            Paid: ₹ {{ number_format($billing->paid_amount,2) }} <br>
            Due: ₹ {{ number_format($billing->due_amount,2) }}
        </p>
    </div>

    <div class="footer">
        Thank you for your business.
    </div>

</div>

</body>
</html>
