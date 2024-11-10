<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Laporan Transaksi</h1>
    <table>
        <thead>
            <tr>
                <th>Stock Code</th>
                <th>Stock Name</th>
                <th>Sum of Volume</th>
                <th>Sum of Value</th>
                <th>Sum of Frequency</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactionData as $row)
            <tr>
                <td>{{ $row['Stock Code'] }}</td>
                
                <td>{{ number_format($row['Sum of Volume']) }}</td>
                <td>{{ number_format($row['Sum of Value'], 0, ',', '.') }}</td>
                <td>{{ number_format($row['Sum of Frequency']) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>