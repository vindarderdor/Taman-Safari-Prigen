<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('/assets2/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('/assets2/css/styles.min.css') }}" />
</head>

<body>

    @php
    function formatNumber($number) {
        if ($number >= 1_000_000_000_000) {
            return number_format($number / 1_000_000_000_000, 1) . 'T';
        } elseif ($number >= 1_000_000_000) {
            return number_format($number / 1_000_000_000, 1) . 'B';
        } else {
            return number_format($number);
        }
    }
    @endphp
<div class="mb-4">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
      <button id="monthDropdown" type="button" 
              class="btn bg-primary-subtle text-primary dropdown-toggle rounded-end"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ $months[$selectedMonth] ?? 'Select Month' }}
      </button>
      <div class="dropdown-menu" aria-labelledby="monthDropdown">
          <form action="{{ route('dashboard') }}" method="GET" id="monthFilterForm">
              <input type="hidden" name="month" id="selectedMonth">
              @foreach($months as $key => $month)
                  <a class="dropdown-item {{ $selectedMonth == $key ? 'active' : '' }}" 
                     href="#" 
                     onclick="submitMonth({{ $key }})">
                      {{ $month }}
                  </a>
              @endforeach
          </form>
      </div>
      <button id="btnGroupVerticalDrop1" type="button"
      class="btn bg-primary-subtle text-primary  dropdown-toggle" data-bs-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
  Download
  </button>
  <div class="dropdown-menu" aria-labelledby="downloadDropdown">
  <form action="{{ route('download.stock') }}" method="POST" id="downloadForm">
      @csrf
      <input type="hidden" name="month" value="{{ $selectedMonth }}">
      <input type="hidden" name="format" id="downloadFormat">
      <a class="dropdown-item" href="#" onclick="submitDownload('pdf')">PDF</a>
      <a class="dropdown-item" href="#" onclick="submitDownload('excel')">Excel</a>
      <a class="dropdown-item" href="#" onclick="submitDownload('csv')">CSV</a>
  </form>
  </div>
  </div>
  </div>
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body p-4">
                  <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
                  <div class="table-responsive">
                    <table class="table table-borderless align-middle text-nowrap">
                      <thead>
                        <tr>
                          <th>Stock Code</th>
                          <th>Stock Name</th>
                          <th>Total Volume</th>
                          <th>Total Value</th>
                          <th>Total Frequency</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($emitenData as $emiten)
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="me-4">
                                <img src="../assets/images/profile/user-2.jpg" width="50" class="rounded-circle" alt="" />
                              </div>
      
                              <div>
                                <h6 class="mb-1 fw-bolder">{{ $emiten->stock_code }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="fs-3 fw-normal mb-0">{{ $emiten->stock_name }}</p>
                          </td>
                          <td>
                              <p class="fs-3 fw-normal mb-0">
                                  {{ formatNumber($emiten->transaksiHarians?->sum('total_volume') ?? 0) }}
                              </p>
                          </td>
                          </td>
                          <td>
                              <p class="fs-3 fw-normal mb-0">
                                  {{ formatNumber($emiten->transaksiHarians?->sum('total_value') ?? 0) }}
                              </p>
                          </td>
                          </td>
                          <td>
                              <p class="fs-3 fw-normal mb-0">
                                  {{ formatNumber($emiten->transaksiHarians?->sum('total_frequency') ?? 0) }}
                              </p>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="row">
            <div class="col-lg-8 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body">
                    <canvas id="frequencyBarChart" style="height: 400px;"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row">
                <div class="col-lg-12">
                  <!-- Yearly Breakup -->
                  <div class="card overflow-hidden">
                    <div class="card-body p-4">
                      <canvas id="transactionPieChart"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                </div>
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="chart-container">
                    <canvas id="closeComparisonChart"></canvas>
                </div>
            </div>
          </div>
        </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
        </div>
  </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('transactionPieChart').getContext('2d');    
        
        // Data dari controller
        const labels = @json($labels);
        const values = @json($values);
        const percentages = @json($percentages);
    
        // Format angka dengan pemisah ribuan
        const formatNumber = (number) => {
            return new Intl.NumberFormat('id-ID').format(number);
        };
    
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: [
                        '#90CDF4', // ANTM - Light blue
                        '#4299E1', // BBCA - Blue
                        '#3182CE', // BBRI - Dark blue
                        '#E9967A', // GOTO - Salmon
                        '#805AD5'  // BRIS - Purple
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            generateLabels: function(chart) {
                                const data = chart.data;
                                return data.labels.map((label, i) => ({
                                    text: `${label} (${percentages[i]}%)`,
                                    fillStyle: chart.data.datasets[0].backgroundColor[i],
                                    hidden: false,
                                    index: i
                                }));
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = formatNumber(context.raw);
                                const percentage = percentages[context.dataIndex];
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('frequencyBarChart').getContext('2d');
        
        // Data dari controller
        const labels = @json($labels);
        const frequencies = @json($frequencies);
        const percentages = @json($percentages);
    
        // Format angka dengan pemisah ribuan
        const formatNumber = (number) => {
            return new Intl.NumberFormat('id-ID').format(number);
        };
    
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Frekuensi Transaksi',
                    data: frequencies,
                    backgroundColor: [
                        '#90CDF4', // ANTM
                        '#4299E1', // BBCA
                        '#3182CE', // BBRI
                        '#E9967A', // GOTO
                        '#805AD5'  // BRIS
                    ],
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return formatNumber(value);
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Sembunyikan legend karena sudah ada label di bawah bar
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const value = formatNumber(context.raw);
                                const percentage = percentages[context.dataIndex];
                                return `Frekuensi: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    });
    </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('closeComparisonChart').getContext('2d');
        
        // Data from controller
        const chartData = @json($lineChartData);
        
        // Function to format numbers with commas
        const formatNumber = (value) => {
            return new Intl.NumberFormat('id-ID').format(value);
        };
    
        // Get month name
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        const currentMonth = monthNames[{{ $selectedMonth - 1 }}];
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData.labels,  // Will be days of the month
                datasets: chartData.datasets.map((item, index) => ({
                    label: item.name,
                    data: item.data,
                    borderColor: ['#90CDF4', '#4299E1', '#3182CE', '#E9967A', '#805AD5'][index],
                    backgroundColor: ['#90CDF4', '#4299E1', '#3182CE', '#E9967A', '#805AD5'][index],
                    tension: 0.1,
                    spanGaps: true // This will connect points even if there are null values
                }))
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: `Daily Close Price Comparison for ${currentMonth}`
                    },
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItems) {
                                return `Day ${tooltipItems[0].label}`;
                            },
                            label: function(context) {
                                if (context.parsed.y === null) {
                                    return `${context.dataset.label}: No data`;
                                }
                                return `${context.dataset.label}: ${formatNumber(context.parsed.y)}`;
                            }
                        }
                    },
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Day of Month'
                        },
                        ticks: {
                            callback: function(value, index) {
                                return `${index + 1}`;
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Close Price'
                        },
                        ticks: {
                            callback: function(value) {
                                return formatNumber(value);
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });
    });
    </script>
    
    <style>
    .chart-container {
        height: 400px;
        margin: 20px 0;
    }
    </style>
    <style>
      .dropdown-item.active {
          background-color: var(--bs-primary-bg-subtle);
          color: var(--bs-primary);
      }
      
      .dropdown-item:hover {
          background-color: var(--bs-primary-bg-subtle);
          color: var(--bs-primary);
      }
      </style>
        <script>
            function submitDownload(format) {
                document.getElementById('downloadFormat').value = format;
                document.getElementById('downloadForm').submit();
            }
            </script>
        
        <script>
          function submitMonth(month) {
              document.getElementById('selectedMonth').value = month;
              document.getElementById('monthFilterForm').submit();
          }
          </script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="{{ asset('/assets2/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/assets2/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/assets2/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('/assets2/js/app.min.js') }}"></script>
  <script src="{{ asset('/assets2/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('/assets2/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('/assets2/js/dashboard.js') }}"></script>
</body>

</html>