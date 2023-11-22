@extends('layout')
@section('content')

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn-sm btn-success bold-text mt-4 float-right ml-2" data-toggle="modal"
                        data-target="#exampleModalCenterAdd"><i class="fa-solid fa-pencil"></i>
                        Add Booking
                    </button>
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
            <h6 class="m-0 font-weight-bold black-text">BOOKING SHEET</h6>
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
                            <th>Customer Nickname</th>
                            <th>Customer Phone Number</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($bookingInfo) && isset($customerInfo))
                        @php
                            $iterator = 1;
                        @endphp
                        @foreach ($bookingInfo as $book)
                        <tr>
                            <td>{{$iterator}}</td>
                            <td>{{$book["kode"]}}</td>
                            <td>{{$book["quantity"]}}</td>
                            <td>Rp{{ number_format($book["totalHarga"], 0, ',', '.') }}</td>
                            <td>{{$book["customer_nickname"]}}</td>
                            <td>{{$book["customer_phoneNumber"]}}</td>
                            <td>
                                <a href="/book/detail/{{$book["id"]}}">
                                    <button type="button" class="btn-sm btn-primary">
                                        <i class="fa fa-window-restore"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn-sm btn-info" data-toggle="modal"
                                    data-target="#exampleModalCenterEdit{{$book["id"]}}">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <!-- Modal Update Data -->
                                <div class="modal fade" id="exampleModalCenterEdit{{$book["id"]}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title black-text bold" id="exampleModalLongTitle">Edit Booking</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="/book/edit">
                                                    @csrf
                                                    @method("PUT")

                                                    <div class="mb-3 black-text bold">
                                                        <input type="hidden" id="id" name="id"
                                                            class="form-control" value="{{$book["id"]}}">

                                                            <label for="InputWarna" class="form-label mt-1 black-text bold">Customer Information</label>
                                                                <select type="text" class="form-select form-control black-text" id=""
                                                                    name="customer_id">
                                                                    <option value="{{$book["customer_id"]}}" name="customer_id" disabled selected hidden>{{$book["customer_nickname"] . " - " . $book["customer_phoneNumber"]}}</option>
                                                                    @foreach ($customerInfo as $customer)
                                                                    <option value="{{ $customer->getId() }}" name="customer_id"> {{$customer->getNickname() . " - " . $customer->getPhoneNumber()}}</option>
                                                                    @endforeach
                                                                </select>
                                                    </div>

                                                    <div class="mb-3 float-right">
                                                        <button type="sumbit" class="btn btn-info">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <!-- Button trigger modal Delete -->
                                <button type="button" class="btn-sm btn-danger" data-toggle="modal"
                                    data-target="#exampleModalCenterDelete{{$book["id"]}}">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Modal delete -->
                                <div class="modal fade" id="exampleModalCenterDelete{{$book["id"]}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title black-text bold" id="exampleModalLongTitle">Delete Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>
                                                <form method="POST" action="/book/delete">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        value="{{$book["id"]}}">
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                </form>
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
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Modal Add Data-->
<div class="modal fade" id="exampleModalCenterAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title black-text bold" id="exampleModalLongTitle">New Data Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column">
                <form method="POST" action="/book/add">
                    @csrf
                    @method("POST")

                    <div class="mb-3 black-text bold">
                    <label for="InputWarna" class="form-label mt-2">Customer Information</label>
                        <select type="text" class="form-select form-control black-text" id=""
                            name="customer_id">
                            <option value="" disabled selected hidden>Choose...</option>
                            @foreach ($customerInfo as $customer)
                            <option value="{{$customer->getId()}}" name="customer_id"> {{$customer->getNickname() . " - " . $customer->getPhoneNumber()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                    <button type="button" class="btn btn-warning float-left" data-toggle="modal" data-target="#exampleModalCenterAddBook">Add Customer</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Data Book Customer-->
<div class="modal fade" id="exampleModalCenterAddBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title black-text bold" id="exampleModalLongTitle">New Data Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/book/addcustomer">
                    @csrf
                    @method("POST")

                    <div class="mb-3 black-text bold">
                        <label for="InputWarna" class="form-label">Full Name</label>
                        <input type="text" id="id" name="fullName" class="form-control black-text"
                            placeholder="-- Enter Fullname --">

                        <label for="InputWarna" class="form-label mt-3">Nickname</label>
                        <input type="text" id="id" name="nickname" class="form-control black-text"
                            placeholder="-- Enter Nickname --">

                        <label for="InputWarna" class="form-label mt-3">Phone Number</label>
                        <input type="text" id="id" name="phoneNumber" class="form-control black-text"
                            placeholder="-- Enter PhoneNumber --">

                        <label for="InputWarna" class="form-label mt-3">Address</label>
                        <input type="text" id="id" name="address" class="form-control black-text"
                            placeholder="-- Enter Address --">
                    </div>

                    <button type="submit" class="btn btn-success float-right">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
