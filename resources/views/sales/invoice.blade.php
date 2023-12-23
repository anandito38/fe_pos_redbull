@extends('layout')
@section('content')

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <a href="/payment">
                        <button type="button" class="btn-sm btn-warning bold-text mt-4 float-right"><i class="fa-solid fa-eye"></i>
                            Show All
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold black-text">INVOICE SHEET</h6>
        </div>
        <div class="card-body black-text">
            <div class="table-responsive">
                <table class="table table-striped table-bordered black-text" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Booking Code</th>
                            <th>Customer Name</th>
                            <th>Phone Number</th>
                            <th>Verified By</th>
                            <th>Payment Method</th>
                            <th>Total Price</th>
                            <th>Booking Created Date</th>
                            <th>Booking Paid Date</th>
                            <th>Create Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($invoiceInfo))
                            @foreach ($invoiceInfo as $invoice)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $invoice['booking']['kode'] }}</td>
                                    <td>{{ $invoice['booking']['customer']['fullname'] }}</td>
                                    <td>{{ $invoice['booking']['customer']['phoneNumber'] }}</td>
                                    <td>{{ $invoice['payment']['admin']['nickname'] ?? '-' }}</td>
                                    <td>{{ $invoice['payment']['metode'] }}</td>
                                    <td>Rp{{ number_format($invoice['booking']['totalHarga'], 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($invoice['booking']['created_at'])->format('d M Y H:i:s') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($invoice['payment']['updated_at'])->format('d M Y H:i:s') }}</td>
                                    <td>
                                        <a href="/invoice/detail/{{ $invoice['id'] }}">
                                            <button type="button" class="btn-sm btn-success">
                                                <i class="fa fa-receipt"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
