@extends('layout')
@section('content')

<div class="container-fluid">
    @if (isset($bookingInfo))
    {{-- <a class="mb-2" href="/book"> &larr; Back to Booking Sheet</a> --}}
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-base">BOOKING INFORMATION</h6>
                </div>
                <div class="card-body" >
                    <h5 class="mb-2 text-gray-700 bold-text">CODE        : {{$bookingInfo["kode"]}}</h5>
                    <h5 class="mb-2 text-gray-700 bold-text">NICKNAME    : {{$bookingInfo["nickname"]}}</h5>
                    <h5 class="mb-2 text-gray-700 bold-text">PHONE NUMBER: {{$bookingInfo["phoneNumber"]}}</h5>
                    <h5 class="mb-2 text-gray-700 bold-text">TOTAL PRICE: Rp{{ number_format($bookingInfo["totalHarga"], 0, ',', '.') }}</h5>
                </div>
            </div>
            <button type="button" class="btn-sm btn-success bold-text float-right ml-2" data-toggle="modal"
                data-target="#exampleModalCenterAdd"><i class="fa-solid fa-pencil"></i>
                Add Product
            </button>
            <a href="/book/detail/{{$bookingInfo["id"]}}">
                <button type="button" class="btn-sm btn-warning bold-text float-right"><i class="fa-solid fa-eye"></i>
                    Show All
                </button>
            </a>
        </div>

    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold black-text">BOOKING DETAIL SHEET</h6>
        </div>
        <div class="card-body black-text">
            <div class="table-responsive">
                <table class="table table-striped table-bordered black-text" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produt Code</th>
                            <th>Product Name</th>
                            <th>Selling Price</th>
                            <th>Quantity</th>
                            <th>Total Product Price</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($productsInfo))
                        @php
                            $iterator = 1;
                        @endphp
                        @foreach ($productsInfo as $index => $product)
                        @if(isset($qtyMemilih[$index]))
                        <tr>
                            <td>{{$iterator}}</td>
                            <td>{{$product["kode"]}}</td>
                            <td>{{$product["nama"]}}</td>
                            <td>Rp{{ number_format($product["hargaJual"], 0, ',', '.') }}</td>
                            <td>
                                <form action="/book/detail/edit" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="idBook" name="idBook" class="form-control"
                                        value="{{$bookingInfo["id"]}}">
                                    <input type="hidden" id="idProduct" name="idProduct" class="form-control"
                                        value="{{$product["id"]}}">
                                    <div class="input-group">
                                        <input type="number" name="qtyMemilih" class="form-control form-control-sm" value="{{ $qtyMemilih[$index]['qtyMemilih'] }}">
                                        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                                    </div>
                                </form>
                            </td>
                            <td>Rp{{ number_format($product["hargaJual"]*$qtyMemilih[$index]['qtyMemilih'], 0, ',', '.') }}</td>
                            <td>
                                <!-- Button trigger modal Delete -->
                                <button type="button" class="btn-sm btn-danger" data-toggle="modal"
                                    data-target="#exampleModalCenterDelete{{$product["id"]}}">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Modal delete -->
                                <div class="modal fade" id="exampleModalCenterDelete{{$product["id"]}}" tabindex="-1" role="dialog"
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
                                            @if (isset($bookingInfo))
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>

                                                <form method="POST" action="/book/detail/delete">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="hidden" id="idBook" name="idBook" class="form-control"
                                                        value="{{$bookingInfo["id"]}}">
                                                    <input type="hidden" id="idProduct" name="idProduct" class="form-control"
                                                        value="{{$product["id"]}}">
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                </form>

                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                            $iterator++;
                        @endphp
                        @endif
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
                <h5 class="modal-title black-text bold" id="exampleModalLongTitle">New Data Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if (isset($dataProduct) && isset($bookingInfo))

            <div class="modal-body">
                <form method="POST" action="/book/detail/add">
                    @csrf
                    @method("POST")
                    <input type="hidden" id="id" name="idBook" class="form-control"
                        value="{{$bookingInfo["id"]}}">
                    <div class="mb-3 black-text bold">
                    <label for="InputWarna" class="form-label mt-2">Product Name</label>
                        <select type="text" class="form-select form-control black-text" id=""
                            name="idProduct">
                            <option value="0" disabled selected hidden>Choose...</option>
                            @foreach ($dataProduct as $prod)
                            <option value="{{$prod->getId()}}" name="idProduct"> {{"[".$prod->getKode()."] ".$prod->getNama()}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 black-text bold">
                        <label for="InputWarna" class="form-label">Quantity</label>
                        <input type="number" id="qtyMemilih" name="qtyMemilih" class="form-control" placeholder="-- Enter Quantity --">
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                </form>
            </div>
            @endif
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
