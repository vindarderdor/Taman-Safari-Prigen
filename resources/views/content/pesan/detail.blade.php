@extends('content.app')

@section('content')
    {{-- <div class="position-relative overflow-hidden">
        <div class="position-relative overflow-hidden rounded-3">
            <img src="{{ asset('assets/images/backgrounds/banner.png') }}" alt="" class="w-100">
        </div>
    </div> --}}
    <section class="hero-section bg-body-secondary position-relative overflow-hidden">
        <div class="container">
            <div class="row justify-content-center pt-5">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <!-- Ticket Title -->
                            <h2 style="font-family: 'Mikado', sans-serif; font-weight: 900; color: #274E13; margin-bottom: 20px;">
                                {{ $ticket->TITLE }}
                            </h2>

                            <!-- Ticket Image -->
                            <div class="mb-4">
                                <img src="{{ asset('/assets/images/blog/blog-img1.png') }}" alt="Ticket Image" class="img-fluid rounded">
                            </div>

                            <!-- Ticket Description -->
                            <div class="mb-4">
                                <h4 style="font-family: 'Mikado', sans-serif; color: #274E13;">Deskripsi</h4>
                                <p style="color: #555;">{{ $ticket->DESCRIPSION }}</p>
                            </div>

                            <!-- Date Selection -->
                            <div class="mb-4">
                                <h4 style="font-family: 'Mikado', sans-serif; color: #274E13;">Pilih Tanggal Kunjungan</h4>
                                <div class="calendar-wrapper border rounded p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <button class="btn btn-outline-secondary" onclick="previousMonth()">&lt;</button>
                                        <h5 class="mb-0" id="currentMonth">December 2024</h5>
                                        <button class="btn btn-outline-secondary" onclick="nextMonth()">&gt;</button>
                                    </div>
                                    <div class="calendar-header d-flex justify-content-between mb-2">
                                        <div class="calendar-cell">MON</div>
                                        <div class="calendar-cell">TUE</div>
                                        <div class="calendar-cell">WED</div>
                                        <div class="calendar-cell">THU</div>
                                        <div class="calendar-cell">FRI</div>
                                        <div class="calendar-cell">SAT</div>
                                        <div class="calendar-cell">SUN</div>
                                    </div>
                                    <div id="calendar-body"></div>
                                    <div class="mt-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="d-flex align-items-center">
                                                <span class="available-dot"></span>
                                                <small class="ms-1">Available</small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="sold-dot"></span>
                                                <small class="ms-1">Sold Out</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ticket Selection Form -->
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $ticket->ID_KONTEN }}">
                                <input type="hidden" name="booking_date" id="selected_date">
                                
                                <div class="mb-4">
                                    <h4 style="font-family: 'Mikado', sans-serif; color: #274E13;">Quantity</h4>
                                    
                                    <!-- Adult Tickets -->
                                    <div class="ticket-type-row d-flex justify-content-between align-items-center mb-3 p-3 border rounded">
                                        <div>
                                            <h5 class="mb-1">Adult</h5>
                                            <small class="text-muted">Age Range (7 - 100)</small>
                                            <div class="ticket-price">IDR {{ number_format($ticket->HARGA_ADULT, 0, ',', '.') }}</div>
                                        </div>
                                        <div class="quantity-control d-flex align-items-center">
                                            <button type="button" class="btn btn-outline-secondary" onclick="updateQuantity('adult', -1)">-</button>
                                            <input type="number" class="form-control text-center mx-2" style="width: 60px" id="adult_quantity" name="adult_quantity" value="0" readonly>
                                            <button type="button" class="btn btn-outline-secondary" onclick="updateQuantity('adult', 1)">+</button>
                                        </div>
                                    </div>

                                    <!-- Child Tickets -->
                                    <div class="ticket-type-row d-flex justify-content-between align-items-center p-3 border rounded">
                                        <div>
                                            <h5 class="mb-1">Child</h5>
                                            <small class="text-muted">Age Range (1 - 6)</small>
                                            <div class="ticket-price">IDR {{ number_format($ticket->HARGA_CHILD, 0, ',', '.') }}</div>
                                        </div>
                                        <div class="quantity-control d-flex align-items-center">
                                            <button type="button" class="btn btn-outline-secondary" onclick="updateQuantity('child', -1)">-</button>
                                            <input type="number" class="form-control text-center mx-2" style="width: 60px" id="child_quantity" name="child_quantity" value="0" readonly>
                                            <button type="button" class="btn btn-outline-secondary" onclick="updateQuantity('child', 1)">+</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Total Price -->
                                <div class="mb-4">
                                    <h4 style="font-family: 'Mikado', sans-serif; color: #274E13;">Total</h4>
                                    <p class="h3" style="color: #90C659;" id="totalPrice">
                                        IDR 0
                                    </p>
                                </div>

                                <!-- Add to Cart Button -->
                                <button type="submit" class="btn btn-primary w-100" id="addToCartBtn" disabled
                                    style="background-color: #274E13; border: none; padding: 15px; font-weight: bold; font-size: 16px;">
                                    Add To Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .calendar-wrapper {
            background: white;
        }
        .calendar-cell {
            width: calc(100% / 7);
            text-align: center;
            padding: 10px;
            font-size: 0.9em;
        }
        .calendar-date {
            cursor: pointer;
            position: relative;
            padding-bottom: 10px;
        }
        .calendar-date.disabled {
            color: #ccc;
            cursor: not-allowed;
        }
        .calendar-date.selected {
            background-color: #274E13;
            color: white;
            border-radius: 4px;
        }
        .available-dot, .sold-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }
        .available-dot {
            background-color: #90C659;
        }
        .sold-dot {
            background-color: #dc3545;
        }
        .date-dot {
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }
        .ticket-type-row {
            background-color: #f8f9fa;
        }
        .ticket-price {
            color: #90C659;
            font-weight: bold;
        }
    </style>

    <script>
        let selectedDate = null;
        const adultPrice = {{ $ticket->HARGA_ADULT }};
        const childPrice = {{ $ticket->HARGA_CHILD }};
        let currentDate = new Date(Date.UTC(new Date().getUTCFullYear(), new Date().getUTCMonth(), new Date().getUTCDate()));
        
        function updateCalendar() {
            const year = currentDate.getUTCFullYear();
            const month = currentDate.getUTCMonth();
            
            document.getElementById('currentMonth').textContent = 
                new Date(Date.UTC(year, month, 1)).toLocaleString('default', { month: 'long', year: 'numeric' });
            
            const firstDay = new Date(Date.UTC(year, month, 1));
            const lastDay = new Date(Date.UTC(year, month + 1, 0));
            const daysInMonth = lastDay.getUTCDate();
            const startingDay = firstDay.getUTCDay() || 7; // Convert Sunday from 0 to 7
            
            let calendarHTML = '<div class="d-flex flex-wrap">';
            
            // Add empty cells for days before the first day of the month
            for (let i = 1; i < startingDay; i++) {
                calendarHTML += '<div class="calendar-cell"></div>';
            }
            
            // Add days of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const date = new Date(Date.UTC(year, month, day));
                const isDisabled = date < new Date(Date.UTC(new Date().getUTCFullYear(), new Date().getUTCMonth(), new Date().getUTCDate()));
                const isSelected = selectedDate && date.toISOString().split('T')[0] === selectedDate.toISOString().split('T')[0];
                
                calendarHTML += `
                    <div class="calendar-cell calendar-date ${isDisabled ? 'disabled' : ''} ${isSelected ? 'selected' : ''}"
                         onclick="${isDisabled ? '' : `selectDate(${year}, ${month}, ${day})`}">
                        ${day}
                        ${!isDisabled ? '<span class="date-dot available-dot"></span>' : ''}
                    </div>`;
            }
            
            document.getElementById('calendar-body').innerHTML = calendarHTML + '</div>';
        }

        function selectDate(year, month, day) {
            selectedDate = new Date(Date.UTC(year, month, day));
            document.getElementById('selected_date').value = selectedDate.toISOString().split('T')[0];
            updateCalendar();
            updateAddToCartButton();
        }

        function previousMonth() {
            currentDate.setUTCMonth(currentDate.getUTCMonth() - 1);
            updateCalendar();
        }

        function nextMonth() {
            currentDate.setUTCMonth(currentDate.getUTCMonth() + 1);
            updateCalendar();
        }

        function updateQuantity(type, change) {
            const input = document.getElementById(`${type}_quantity`);
            const currentValue = parseInt(input.value);
            const newValue = Math.max(0, currentValue + change);
            input.value = newValue;
            updateTotal();
            updateAddToCartButton();
        }

        function updateTotal() {
            const adultQuantity = parseInt(document.getElementById('adult_quantity').value);
            const childQuantity = parseInt(document.getElementById('child_quantity').value);
            const total = (adultQuantity * adultPrice) + (childQuantity * childPrice);
            document.getElementById('totalPrice').textContent = 'IDR ' + total.toLocaleString('id-ID');
        }

        function updateAddToCartButton() {
            const adultQuantity = parseInt(document.getElementById('adult_quantity').value);
            const childQuantity = parseInt(document.getElementById('child_quantity').value);
            const hasDate = selectedDate !== null;
            const hasQuantity = adultQuantity > 0 || childQuantity > 0;
            
            document.getElementById('addToCartBtn').disabled = !(hasDate && hasQuantity);
        }

        // Initialize calendar
        updateCalendar();
    </script>
@endsection

