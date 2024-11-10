<div class="bg-gray-200 p-4 h-screen sticky top-0">
    <h3 class="text-lg font-bold mb-4">Menu</h3>
    <nav>
        <ul>
            <li class="mb-2">
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800">Dashboard</a>
            </li>
            <li class="mb-2">
                <a href="#" class="text-blue-600 hover:text-blue-800">Settings</a>
            </li>
            <li class="mb-2">
                <form action="{{ route('download.stock') }}" method="POST" class="inline">
                    @csrf
                    <input type="hidden" name="month" value="{{ $selectedMonth }}">
                    <select name="format" class="form-select rounded-md shadow-sm mr-2">
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                        <option value="csv">CSV</option>
                    </select>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Download
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</div>