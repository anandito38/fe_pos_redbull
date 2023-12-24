<!DOCTYPE html>
<html>
{{-- {{dd($invoiceInfo)}} --}}
<head>
    <meta charset="utf-8" />
    <title>Kang Bakery</title>
    <link rel="stylesheet" href="{{ asset('css/invoice-style.css') }}">
</head>

<body>
    @if (count($invoiceInfo) > 0)
    @foreach ($invoiceInfo as $invoice)
    <div class="invoice-box">
        <h2>Kang Bakery</h2>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('img/LogoKB.png') }}" />
                            </td>

                            <td>
                                <strong>Invoice</strong> : {{ $invoice['bookings'][$invoice['payment']['id']]['kode'] }}<br />
                                <strong>Created</strong> : {{ \Carbon\Carbon::parse($invoice['bookings'][$invoice['payment']['id']]['created_at'])->isoFormat('DD MMMM, YYYY - HH:mm:ss') }}<br />
                                <strong>Paid</strong> : {{ \Carbon\Carbon::parse($invoice['payment']['updated_at'])->isoFormat('DD MMMM, YYYY - HH:mm:ss') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                                <strong>Verified by :</strong><br />
                                {{ $invoice['payment']['admin']['nickname'] }}<br />
                                {{ $invoice['payment']['admin']['phoneNumber'] }}<br />
                                {{ $invoice['payment']['admin']['role'] }}
                            </td>

                            <td>
                                <strong>Customer :</strong><br />
                                {{ $invoice['bookings'][$invoice['payment']['id']]['customer']['fullname'] }}<br />
                                {{ $invoice['bookings'][$invoice['payment']['id']]['customer']['phoneNumber'] }}<br />
                                {{ $invoice['bookings'][$invoice['payment']['id']]['customer']['address'] }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Payment Method</td>
                <td></td>
                <td></td>
            </tr>

            <tr class="details">
                <td>{{ $invoice['payment']['metode'] }}</td>
            </tr>

            <tr class="heading text-center">
                <td>Product</td>
                <td>Qty</td>
                <td>Price</td>
            </tr>

            @foreach ($invoice['bookings'][$invoice['payment']['id']]['memilihs'] as $product)
            <tr class="item">
                <td>[{{ $product['kode'] }}] - {{ $product['nama'] }}</td>
                <td>{{ $product['qty'] }}</td>
                <td>Rp{{ number_format($product['qty'] * $product['hargaJual'], 0, ',', '.') }}</td>
            </tr>
            @endforeach

            <tr class="item last">
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr class="total">
                <td></td>
                <td>Total Price :</td>
                <td>Rp{{ number_format($invoice['bookings'][$invoice['payment']['id']]['totalHarga'], 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>
    @endforeach
    @endif
</body>

</html>
