@extends('content.app')

@section('content')
<div class="container">
    <h1>Keranjang</h1>
    @if (session('cart') && count(session('cart')) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul Tiket</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach (session('cart') as $item)
                    <tr>
                        <td>{{ $item['title'] }}</td>
                        <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <input type="number" name="jumlah" value="{{ $item['jumlah'] }}" min="1" style="width: 50px;">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                        <td>Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @php $total += $item['harga'] * $item['jumlah']; @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <a href="#" class="btn btn-success">Checkout</a>
    @else
        <p>Keranjang kosong.</p>
        <a href="/" class="btn btn-secondary">Kembali ke Tiket</a>
    @endif
</div>
@endsection