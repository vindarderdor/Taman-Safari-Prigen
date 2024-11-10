// resources/views/exports/stock-pdf.blade.php
<!DOCTYPE html>
<html>
<head>
    <title>Stock Data Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
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
    <h2>Stock Data Report - {{ date('F', mktime(0, 0, 0, $month, 1)) }}</h2>
    <table>
        <thead>
            <tr>
                <th>Stock Code</th>
                <th>Transaction Month</th>
                <th>Total Volume</th>
                <th>Total Value</th>
                <th>Total Frequency</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $stock)
            <tr>
                <td>{{ $stock->stock_code }}</td>
                <td>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</td>
                <td>{{ number_format($stock->transaksiHarians->sum('total_volume')) }}</td>
                <td>{{ number_format($stock->transaksiHarians->sum('total_value')) }}</td>
                <td>{{ number_format($stock->transaksiHarians->sum('total_frequency')) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>