<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h5>Laporan Order Periode ({{ $date[0] }} - {{ $date[1] }})</h5>
    <hr>
    <table width="100%" class="table-hover table-bordered">
        <thead>
            <tr>
                <th>InvoiceID</th>
                <th>Pelanggan</th>
                <th>Subtotal</th>
                <th>Ongkos Kirim</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php $sum_subtotal = 0; $sum_cost = 0; $sum_total = 0; @endphp
            @forelse ($orders as $row)
                <tr>
                    <td><strong>{{ $row->invoice }}</strong></td>
                    <td>
                        <strong>{{ $row->customer_name }}</strong><br>
                        <label><strong>Telp:</strong> {{ $row->customer_phone }}</label><br>
                        <label><strong>Alamat:</strong> {{ $row->customer_address }} {{ $row->customer->district->name }} - {{  $row->customer->district->city->name}}, {{ $row->customer->district->city->province->name }}</label>
                    </td>
                    <td>Rp {{ number_format($row->subtotal) }}</td>
                    <td>Rp {{ number_format($row->cost) }}</td>
                    <td>Rp {{ number_format($row->total) }}</td>
                    <td>{{ $row->created_at->format('d-m-Y') }}</td>
                </tr>

                @php $sum_subtotal += $row->subtotal @endphp
                @php $sum_cost += $row->cost @endphp
                @php $sum_total += $row->total @endphp

            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Total</td>
                <td>Rp {{ number_format($sum_subtotal) }}</td>
                <td>Rp {{ number_format($sum_cost) }}</td>
                <td>Rp {{ number_format($sum_total) }}</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>