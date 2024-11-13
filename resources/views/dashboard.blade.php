    @extends('layouts.app')

    @section('content')
<div class="card shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body d-flex align-items-center justify-content-between p-4">
    <h4 class="fw-semibold mb-0">Dashboard</h4>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a class="text-muted text-decoration-none" href="../dark/index.html">Home</a>
        </li>
        <li class="breadcrumb-item" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    </div>
</div>
{{-- <div class="mb-4">
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
<section class="welcome">
    <div class="row">
      <div class="col-lg-12 col-xl-6 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body position-relative">
            <div>
              <h5 class="mb-1 fw-bold">Welcome Abdul Alim</h5>
              <p class="fs-3 mb-3 pb-1">Check all the statastics</p>
              <button class="btn btn-primary rounded-pill" type="button">
                Visit Now
              </button>
            </div>
            <div class="school-img d-none d-sm-block">
              <img src="{{ asset('/landing/assets/images/backgrounds/school.png') }}" class="img-fluid" alt="" />
            </div>

            <div class="d-sm-none d-block text-center">
              <img src="{{ asset('/landing/assets/images/backgrounds/school.png') }}" class="img-fluid" alt="" />
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12 col-xl-6">
        <div class="row">
          <div class="col-sm-4 d-flex align-items-strech">
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

            <div class="card warning-card overflow-hidden text-bg-primary w-100">
              <div class="card-body p-4">
                <div class="mb-7">
                  <i class="ti ti-brand-producthunt fs-8 fw-lighter"></i>
                </div>
                <h5 class="text-white fw-bold fs-14 text-nowrap">
                    {{ formatNumber($totals->total_volume) }}
                </h5>
                <p class="opacity-50 mb-0 ">Volume Transaksi</p>
              </div>
            </div>
          </div>

          <div class="col-sm-4 d-flex align-items-strech">
            <div class="card danger-card overflow-hidden text-bg-primary w-100">
              <div class="card-body p-4">
                <div class="mb-7">
                  <i class="ti ti-report-money fs-8 fw-lighter"></i>
                </div>
                <h5 class="text-white fw-bold fs-14">
                    {{ formatNumber($totals->total_value) }}
                </h5>
                <p class="opacity-50 mb-0">Value Transaksi</p>
              </div>
            </div>
          </div>

          <div class="col-sm-4 d-flex align-items-strech">
            <div class="card info-card overflow-hidden text-bg-primary w-100">
              <div class="card-body p-4">
                <div class="mb-7">
                  <i class="ti ti-currency-dollar fs-8 fw-lighter"></i>
                </div>
                <h5 class="text-white fw-bold fs-14 text-nowrap">
                    {{ formatNumber($totals->total_frequency) }}
                </h5>
                <p class="opacity-50 mb-0">Jumlah Frekuensi</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="row">
      <div class="col-lg-12 col-xl-6 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <canvas id="transactionPieChart"></canvas>
            </div>
        </div>
      </div>

      <div class="col-lg-12 col-xl-6">
        <div class="card">
            <div class="card-body">
                <canvas id="frequencyBarChart" style="height: 400px;"></canvas>
            </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="row">
      <div class="col-lg-12 col-xl-12 d-flex align-items-strech">
        <div class="card w-100">
          <div class="chart-container">
              <canvas id="closeComparisonChart"></canvas>
          </div>
        </div>
      </div>
  <section>
    <div class="row">
      <div class="col-lg-12 col-xl-12 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body">
            <div class="d-flex mb-4 justify-content-between align-items-center">
              <h5 class="mb-0 fw-bold">Top Employees</h5>

              <div class="dropdown">
                <button id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                  class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                  <i class="ti ti-dots-vertical fs-7 d-block"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li>
                    <a class="dropdown-item" href="#">Another action</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="table-responsive" data-simplebar>
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
    </div>
    </div>
  </section>

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
    </style> --}}
  
@endsection
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
