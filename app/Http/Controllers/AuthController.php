<?php

namespace App\Http\Controllers;

use App\Models\ChildMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\UserActivity;
use App\Models\Post;
use App\Models\Emiten;
use App\Models\TransaksiHarian;
use Carbon\Carbon;
use App\Exports\StockExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
// use PDF;

class AuthController extends Controller
{
    protected $casts = [
        'date_transaction' => 'datetime',
    ];
    public function landing()
    {
        $posts = Post::with(['user', 'likes', 'comments.user'])
            ->where('DELETE_MARK', '0')
            ->latest('CREATE_DATE')
            ->get();
        $userRoleId = auth()->user()->ID_JENIS_USER;
        $setting_menu_user = DB::table('SETTING_MENU_USER')
            ->join('MENU', 'SETTING_MENU_USER.MENU_ID', '=', 'MENU.ID_MENU')
            ->where('SETTING_MENU_USER.ID_JENIS_USER', $userRoleId)
            ->where('MENU.DELETE_MARK', '!=', '1')
            ->select('MENU.MENU_NAME', 'MENU.MENU_LINK', 'MENU.MENU_ICON', 'MENU.PARENT_ID as PARENT_ID', 'SETTING_MENU_USER.ID_JENIS_USER')
            ->get();
        $submenus = DB::table('MENU_LEVEL')->where('DELETE_MARK', '!=', '1')->get();
        $bukus = DB::table('bukus')->get();
        return view('index', ['submenus' => $submenus, 'setting_menu_user' => $setting_menu_user, 'bukus' => $bukus, 'posts' => $posts]);

    }
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request){
        $validate =  $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect()->intended('landing-page');
        }
        Session::flash('failed','Account not found');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard(Request $request)
    {
        $selectedMonth = $this->getSelectedMonth($request);
        $monthList = $this->getMonthList();

        // Get stock data with transactions
        $stockData = $this->getFilteredStockData($selectedMonth);
        $transactionTotals = $this->getTransactionTotals($selectedMonth);
        
        // Prepare chart data
        $chartData = $this->prepareChartData($stockData);
        $lineChartData = $this->prepareLineChartData($selectedMonth);

        // @dd($lineChartData); // Add this temporarily to inspect the final output structure


        return view('dashboard', [
            'emitenData' => $stockData,
            'totals' => $transactionTotals,
            'labels' => $chartData['labels'],
            'values' => $chartData['values'],
            'percentages' => $chartData['percentages'],
            'frequencies' => $chartData['frequencies'],
            'percentagesFreq' => $chartData['percentagesFreq'],
            'lineChartData' => $lineChartData,
            'months' => $monthList,
            'selectedMonth' => $selectedMonth
        ]);
    }

    /**
     * Get selected month from request or default to current month
     */
            private function getSelectedMonth(Request $request): int
            {
                return $request->input('month', now()->month);
            }

            /**
             * Get list of months for dropdown
             */
            private function getMonthList(): array
            {
                return [
                    1 => 'Januari',
                    2 => 'Februari',
                    3 => 'Maret',
                    4 => 'April',
                    5 => 'Mei',
                    6 => 'Juni',
                    7 => 'Juli',
                    8 => 'Agustus',
                    9 => 'September',
                    10 => 'Oktober',
                    11 => 'November',
                    12 => 'Desember'
                ];
            }

            /**
             * Get stock data filtered by month
             */
            private function getFilteredStockData(int $month)
            {
                return Emiten::with(['transaksiHarians' => function($query) use ($month) {
                    $query->select('stock_code')
                        ->selectRaw('SUM(volume) as total_volume')
                        ->selectRaw('SUM(value) as total_value')
                        ->selectRaw('SUM(frequency) as total_frequency')
                        ->whereMonth('date_transaction', $month)
                        ->groupBy('stock_code');
                }])->get();
            }

            /**
             * Get transaction totals for selected month
             */
            private function getTransactionTotals(int $month)
            {
                return TransaksiHarian::whereMonth('date_transaction', $month)
                    ->selectRaw('
                        SUM(volume) as total_volume,
                        SUM(value) as total_value,
                        SUM(frequency) as total_frequency
                    ')
                    ->first();
            }

            /**
             * Prepare data for pie and bar charts
             */
            private function prepareChartData($stockData): array
            {
                $labels = $stockData->pluck('stock_code')->toArray();
                
                // Calculate values and frequencies
                $values = $this->calculateTotalValues($stockData);
                $frequencies = $this->calculateTotalFrequencies($stockData);

                // Calculate percentages
                $totalValue = array_sum($values);
                $totalFreq = array_sum($frequencies);

                return [
                    'labels' => $labels,
                    'values' => $values,
                    'frequencies' => $frequencies,
                    'percentages' => $this->calculatePercentages($values, $totalValue),
                    'percentagesFreq' => $this->calculatePercentages($frequencies, $totalFreq)
                ];
            }

            /**
             * Calculate total values for each stock
             */
            private function calculateTotalValues($stockData): array
            {
                return $stockData->map(function($stock) {
                    return $stock->transaksiHarians->sum('total_value');
                })->toArray();
            }

            /**
             * Calculate total frequencies for each stock
             */
            private function calculateTotalFrequencies($stockData): array
            {
                return $stockData->map(function($stock) {
                    return $stock->transaksiHarians->sum('total_frequency');
                })->toArray();
            }

            /**
             * Calculate percentages from array of values
             */
            private function calculatePercentages(array $values, float $total): array
            {
                if ($total <= 0) {
                    return array_fill(0, count($values), 0);
                }

                return array_map(function($value) use ($total) {
                    return round(($value / $total) * 100, 2);
                }, $values);
            }

            /**
             * Prepare data for line chart
             */
            private function prepareLineChartData(int $month): array
{
    $stocks = Emiten::with(['transaksiHarians' => function($query) use ($month) {
        $query->select('stock_code', 'date_transaction', 'close')
            ->whereMonth('date_transaction', $month)
            ->orderBy('date_transaction');
    }])->get();

    $days = [];
    $lineChartData = [];

    // Get all dates in the selected month
    $firstDay = Carbon::create(null, $month, 1);
    $lastDay = $firstDay->copy()->endOfMonth();
    
    // Pre-fill days array
    for ($date = $firstDay->copy(); $date <= $lastDay; $date->addDay()) {
        $days[] = $date->format('d');
    }

    foreach ($stocks as $stock) {
        $dailyData = array_fill(0, count($days), null); // Initialize with nulls
        
        foreach ($stock->transaksiHarians as $transaction) {
            $dateTransaction = new \DateTime($transaction->date_transaction); // Convert to DateTime object
            $dayIndex = (int)$dateTransaction->format('d') - 1;
            $dailyData[$dayIndex] = (float)$transaction->close;
        }
        

        $lineChartData[] = [
            'name' => $stock->stock_code,
            'data' => $dailyData
        ];
    }

    return [
        'datasets' => $lineChartData,
        'labels' => $days
    ];
}

            /**
             * Get stocks with their daily transactions
             */
            private function getStocksWithDailyTransactions(int $month)
            {
                return Emiten::with(['transaksiHarians' => function($query) use ($month) {
                    $query->select('stock_code', 'date_transaction', 'close')
                        ->whereMonth('date_transaction', $month)
                        ->orderBy('date_transaction');
                }])->get();
            }

            /**
             * Format daily transactions for line chart
             */
            private function formatDailyTransactions($transactions): array
            {
                return $transactions->map(function($transaction) {
                    return [
                        'date' => Carbon::parse($transaction->date_transaction)->format('d'),
                        'close' => $transaction->close,
                    ];
                })->values()->toArray();
            }
            /**
            * Download stock data in selected format
            */
           public function downloadStock(Request $request)
           {
               $format = $request->input('format');
               $month = $request->input('month', now()->month);
               
               // Get stock data
               $stockData = $this->getFilteredStockData($month);
               
               // Generate filename
               $filename = 'stock_data_' . date('F_Y', mktime(0, 0, 0, $month, 1));
       
               switch($format) {
                   case 'pdf':
                       return $this->downloadPDF($stockData, $month, $filename);
                   case 'excel':
                       return $this->downloadExcel($stockData, $month, $filename);
                   case 'csv':
                       return $this->downloadCSV($stockData, $month, $filename);
                   default:
                       return back()->with('error', 'Invalid format selected');
               }
           }
       
           /**
            * Generate PDF download
            */
           private function downloadPDF($data, $month, $filename)
           {
               $pdf = PDF::loadView('exports.stock-pdf', [
                   'data' => $data,
                   'month' => $month
               ]);
               
               return $pdf->download($filename . '.pdf');
           }
       
           /**
            * Generate Excel download
            */
           private function downloadExcel($data, $month, $filename)
           {
               return Excel::download(
                   new StockExport($data, $month),
                   $filename . '.xlsx'
               );
           }
       
           /**
            * Generate CSV download
            */
           private function downloadCSV($data, $month, $filename)
           {
               return Excel::download(
                   new StockExport($data, $month),
                   $filename . '.csv'
               );
           }
    public function downloadTransactionReport()
    {
        $transactionData = TransaksiHarian::select(
            'stock_code',
            'date_transaction',
            'volume',
            'value',
            'frequency'
        )
        ->get()
        ->groupBy('stock_code')
        ->map(function ($transactions, $stockCode) {
            return [
                'Stock Code' => $stockCode,
                'Date Transaction: Month' => \Carbon\Carbon::parse($transactions->first()->date_transaction)->format('F Y'),
                'Sum of Volume' => $transactions->sum('volume'),
                'Sum of Value' => $transactions->sum('value'),
                'Sum of Frequency' => $transactions->sum('frequency'),
            ];
        })
        ->values()
        ->toArray();
    
        $filename = 'transaction_report.pdf';
    
        $pdf = PDF::loadView('reports.transaction-report', [
            'transactionData' => $transactionData
        ]);
        
        return $pdf->download('transaction-report.pdf');
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:60',
            'username' => 'required|string|max:60|unique:users,USERNAME',
            'email' => 'required|string|email|max:100|unique:users,EMAIL',
            'password' => 'required|string|min:6|confirmed',
        ]);

        DB::table('users')->insert([
            'NAMA_USER' => $request->input('name'),
            'USERNAME' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'ID_JENIS_USER' => 2,
            'STATUS_USER' => 'active',
            'CREATE_DATE' => now(),
            'DELETE_MARK' => '0',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful, please login.');
    }
}
