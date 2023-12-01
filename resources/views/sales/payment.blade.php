@extends('layout')
@section('content')
{{-- {{dd($paymentInfo)}} --}}
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn-sm btn-warning bold-text mt-4 float-right"><i class="fa-solid fa-eye"></i>
                        Show All
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold black-text">PAYMENT SHEET</h6>
        </div>
        <div class="card-body black-text">
            <div class="table-responsive">
                <table class="table table-striped table-bordered black-text" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Booking Code</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Metode</th>
                            <th>Payment Status</th>
                            <th>Verified By</th>
                            <th>Barcode</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $iterator = 1;
                        @endphp
                        @foreach ($paymentInfo as $payment)
                        <tr>
                            <td>{{$iterator}}</td>
                            <td>{{$payment["kode"]}}</td>
                            <td>{{$payment["quantity"]}}</td>
                            <td>Rp{{ number_format($payment["totalHarga"], 0, ',', '.') }}</td>
                            <td>{{$payment["metode"]}}</td>
                            @if ($payment["status"] == null)
                                <td>
                                    <button type="button" class="btn btn-danger disabled-btn">Unpaid</button>
                                </td>
                            @else
                                <td>
                                    <button type="button" class="btn btn-success disabled-btn">Paid</button>
                                </td>
                            @endif
                            @if ($payment["nickname"] == null)
                                <td>
                                    <button type="button" class="btn btn-warning disabled-btn">Not Verified</button>
                                </td>
                            @else
                                <td>
                                    <button type="button" class="btn btn-success disabled-btn">{{$payment["nickname"]}}</button>
                                </td>
                            @endif
                            <td>{{$payment["barcode"]}}</td>
                            <td>
                                @if ($payment["nickname"] != null)
                                    <button type="button" class="btn-sm btn-danger disabled-btn" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="fa fa-xmark"></i></button>
                                @else
                                    <!-- Button trigger modal Edit -->
                                    <button type="button" class="btn-sm btn-info" data-toggle="modal"
                                    data-target="#exampleModalCenterEdit{{$payment["id"]}}">
                                    <i class="fa fa-edit"></i></button>
                                @endif

                                <!-- Modal Update Data -->
                                <div class="modal fade" id="exampleModalCenterEdit{{$payment["id"]}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title black-text bold" id="exampleModalLongTitle">Edit Payment</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="/payment/edit">
                                                    @csrf
                                                    @method("PUT")

                                                    <div class="mb-3 black-text bold">
                                                        <input type="hidden" id="id" name="id"
                                                            class="form-control" value="{{$payment["id"]}}">

                                                        <label for="InputWarna" class="form-label mt-2 black-text bold">Verified By</label>
                                                            <select type="text" class="form-select form-control black-text" id="verifiedBy"
                                                                name="admin_id">
                                                                <option value="" disabled selected hidden>Choose...</option>
                                                                @foreach ($adminInfo as $admin)
                                                                <option value="{{$admin->getId()}}" name="admin_id"> {{$admin->getNickname()}}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>

                                                    <div class="mb-3 float-right">
                                                        <button type="button" class="btn btn-info" id="updateButton">Update</button>
                                                        <button type="submit" class="btn btn-info" id="submitButton" style="display: none;">Update</button>
                                                    </div>
                                                </form>

                                                <script>
                                                    document.getElementById('updateButton').addEventListener('click', function() {
                                                        var verifiedBy = document.getElementById('verifiedBy').value;

                                                        if (verifiedBy === '') {
                                                            $('#warningModal').modal('show');
                                                        } else {
                                                            document.getElementById('submitButton').style.display = 'inline-block';
                                                            document.getElementById('updateButton').style.display = 'none';
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                            $iterator++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>

<!-- Modal Verified-->
<div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title red-text bold" id="warningModalLabel">Warning!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body black-text bold">
                Please fill in the "Verified By" field before updating.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
