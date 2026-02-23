<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .info-table,
        .bill-table {
            width: 100%;
            border-collapse: collapse;
        }

        .bill-table th,
        .bill-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .bill-table th {
            background: #f2f2f2;
        }

        .totals {
            margin-top: 15px;
            width: 100%;
        }

        .totals td {
            padding: 5px;
        }

        .right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: gray;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>Fresh Basket Laundry</h2>
        <p>Professional Laundry Service</p>
    </div>

    <table class="info-table">
        <tr>
            <td>
                <strong>Invoice No:</strong> {{ $billing->invoice_number }}<br>
                <strong>Laundry No:</strong> {{ $billing->laundry_number }}<br>
                <strong>Date:</strong> {{ $billing->created_at->format('d M Y') }}
            </td>
            <td class="right">
                <strong>Customer Name:</strong> {{ $billing->user->name }}<br>
                <strong>Phone:</strong> {{ $billing->user->phone }}<br>
                <strong>Email:</strong> {{ $billing->user->email }}
            </td>
        </tr>
    </table>

    <br>

    <table class="bill-table">
        <thead>
            <tr>
                <th>Service Type</th>
                <th>Weight (KG)</th>
                <th>Rate / KG</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $billing->laundryType->name ?? '-' }}</td>
                <td>{{ number_format($billing->weight, 2) }}</td>
                <td>{{ number_format($billing->rate, 2) }}</td>
                <td>{{ number_format($billing->total, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <table class="totals">

        <tr>
            <td class="right">Subtotal:</td>
            <td class="right">{{ number_format($billing->total, 2) }}</td>
        </tr>

        <tr>
            <td class="right">Discount:</td>
            <td class="right">- {{ number_format($billing->discount, 2) }}</td>
        </tr>

        <tr>
            <td class="right">Amount After Discount:</td>
            <td class="right">
                {{ number_format($billing->total - $billing->discount, 2) }}
            </td>
        </tr>

        <tr>
            <td class="right">
                GST ({{ number_format($billing->gst_percent, 2) }}%)
            </td>
            <td class="right">
                {{ number_format($billing->gst_amount, 2) }}
            </td>
        </tr>

        <tr>
            <td class="right bold">Grand Total:</td>
            <td class="right bold">
                {{ number_format($billing->total - $billing->discount + $billing->gst_amount, 2) }}
            </td>
        </tr>

        <tr>
            <td class="right">Paid:</td>
            <td class="right">{{ number_format($billing->paid, 2) }}</td>
        </tr>

        <tr>
            <td class="right bold">Due:</td>
            <td class="right bold">{{ number_format($billing->due, 2) }}</td>
        </tr>

        @if ($billing->total == 500)
            <tr>
                <td class="right bold">Delivery Fee:</td>
                <td class="right bold">Free</td>
            </tr>
        @endif

    </table>

    <div class="footer">
        Thank you for choosing Fresh Basket Laundry! <br>
        This is a computer generated invoice.
    </div>

</body>

</html>
