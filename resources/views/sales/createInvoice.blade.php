<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Kang Bakery</title>
    <link rel="stylesheet" href="{{ asset('css/invoice-style.css') }}">
</head>

<body>
    @if (isset($invoiceInfo))
    <div class="invoice-box">
        <h2>Kang Bakery</h2>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('img/LogoKB.png') }}" />
                            </td>

                            <td>
                                Invoice : {{ $invoiceInfo[0]['bookings'][2]['kode'] }}<br />
                                Created : {{ \Carbon\Carbon::parse($invoiceInfo[0]['bookings'][2]['created_at'])->isoFormat('DD MMMM, YYYY - HH:mm:ss') }}<br />
                                Paid : {{ \Carbon\Carbon::parse($invoiceInfo[0]['payment']['updated_at'])->isoFormat('DD MMMM, YYYY - HH:mm:ss') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Verified by :<br />
                                {{ $invoiceInfo[0]['payment']['admin']['nickname'] }}<br />
                                {{ $invoiceInfo[0]['payment']['admin']['phoneNumber'] }}<br />
                                {{ $invoiceInfo[0]['payment']['admin']['role'] }}
                            </td>

                            <td>
                                Customer :<br />
                                {{ $invoiceInfo[0]['bookings'][2]['customer']['fullname'] }}<br />
                                {{ $invoiceInfo[0]['bookings'][2]['customer']['phoneNumber'] }}<br />
                                {{ $invoiceInfo[0]['bookings'][2]['customer']['address'] }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Payment Method</td>
                <td></td>
            </tr>

            <tr class="details">
                <td>{{ $invoiceInfo[0]['payment']['metode'] }}</td>
            </tr>

            <tr class="heading">
                <td>Product</td>
                <td>Price</td>
            </tr>

            @foreach ($invoiceInfo[0]['bookings'][2]['memilihs'] as $dataProduct)
            <tr class="item">
                <td>{{ $dataProduct['kode'] }} - {{ $dataProduct['nama'] }}</td>
                <td>Rp{{ number_format(5000, 0, ',', '.') }}</td>
            </tr>
            @endforeach

            <tr class="item last">
                <td></td>
                <td></td>
            </tr>

            <tr class="total">
                <td></td>
                <td>Rp{{ number_format($invoiceInfo[0]['bookings'][2]['totalHarga'], 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>
    @endif
</body>

</html>
