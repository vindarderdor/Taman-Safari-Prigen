<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket - {{ $purchasedTicket->ticket_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .ticket {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin: 20px auto;
            max-width: 900px;
            background: #fff;
        }
        .ticket-header {
            background: #90C659;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .ticket-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .ticket-body {
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .ticket-info {
            flex: 1;
        }
        .ticket-qr {
            text-align: right;
            margin-left: 30px;
        }
        .info-group {
            margin-bottom: 20px;
        }
        .info-group h2 {
            margin: 0 0 5px 0;
            font-size: 14px;
            color: #666;
            text-transform: uppercase;
        }
        .info-group p {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }
        .ticket-footer {
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="ticket-header">
            <h1>{{ $purchasedTicket->content->TITLE }}</h1>
            <div>This is your ticket</div>
        </div>
        
        <div class="ticket-body">
            <div class="ticket-info">
                {{-- <div class="info-group">
                    <h2>Lokasi</h2>
                    <p>{{ $purchasedTicket->content->LOCATION }}</p>
                </div> --}}
                
                <div class="info-group">
                    <h2>Tanggal Kunjungan</h2>
                    <p>{{ $purchasedTicket->booking_date->format('d F Y') }}</p>
                </div>

                {{-- <div class="info-group">
                    <h2>Issued To</h2>
                    <p>{{ $purchasedTicket->user->NAMA_USER }}</p>
                </div> --}}

                <div class="info-group">
                    <h2>Ticket Number</h2>
                    <p>{{ $purchasedTicket->ticket_number }}</p>
                </div>

                <div class="info-group">
                    <h2>Ticket Type</h2>
                    <p>{{ ucfirst($purchasedTicket->ticket_type) }}</p>
                </div>

                <div class="info-group">
                    <h2>Quantity</h2>
                    <p>{{ $purchasedTicket->quantity }}</p>
                </div>
            </div>
            
            <div class="ticket-qr">
                <img src="data:image/png;base64,{{ $qrCode }}" width="200">
                <p>Scan to confirm ticket</p>
            </div>
        </div>
        
        <div class="ticket-footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.
        </div>
    </div>
</body>
</html>

