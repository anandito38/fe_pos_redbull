@extends('layout')
@section('content')
{{-- {{dd($productInfo)}} --}}
<div class="container-fluid">
    @if (isset($productInfo))
    {{-- <a class="mb-2" href="/dashboard"> &larr; Back to Product Sheet</a> --}}
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-base">PRODUCT INFORMATION</h6>
                </div>
                <div class="card-body">
                    <h5 class="mb-2 text-gray-700 bold-text">CODE: {{$productInfo["kode"]}}</h5>
                    <h5 class="mb-2 text-gray-700 bold-text">NAME: {{$productInfo["nama"]}}</h5>
                </div>
            </div>
            <button type="button" class="btn-sm btn-success bold-text float-right ml-2" data-toggle="modal"
                data-target="#exampleModalCenterAdd"><i class="fa-solid fa-pencil"></i>
                Add Material
            </button>
            <button type="button" class="btn-sm btn-warning bold-text float-right"><i class="fa-solid fa-eye"></i>
                Show All
            </button>
        </div>

    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold black-text">PRODUCT DETAIL SHEET</h6>
        </div>
        <div class="card-body black-text">
            <div class="table-responsive">
                <table class="table table-striped table-bordered black-text" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Material Name</th>
                            <th>Brand</th>
                            <th>Capital Price</th>
                            <th>Category Name</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($vendorsInfo))
                        @php
                            $iterator = 1;
                        @endphp
                        @foreach ($vendorsInfo as $vendor)
                        <tr>
                            <td>{{$iterator}}</td>
                            <td>{{$vendor["namaBarang"]}}</td>
                            <td>{{$vendor["merek"]}}</td>
                            <td>Rp{{ number_format($vendor["hargaModal"], 0, ',', '.') }}</td>
                            <td>{{$vendor["namaCategory"]}}</td>
                            <td>
                                <!-- Button trigger modal Delete -->
                                <button type="button" class="btn-sm btn-danger" data-toggle="modal"
                                    data-target="#exampleModalCenterDelete{{$vendor["id"]}}">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Modal delete -->
                                <div class="modal fade" id="exampleModalCenterDelete{{$vendor["id"]}}" tabindex="-1" role="dialog"
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
                                            @if (isset($productInfo))
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>

                                                <form method="POST" action="/product/detail/delete">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="hidden" id="idProduct" name="idProduct" class="form-control"
                                                        value="{{$productInfo["id"]}}">
                                                    <input type="hidden" id="idVendor" name="idVendor" class="form-control"
                                                        value="{{$vendor["id"]}}">
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
                <h5 class="modal-title black-text bold" id="exampleModalLongTitle">New Data Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if (isset($dataVen) && isset($productInfo))

            <div class="modal-body">
                <form method="POST" action="/product/detail/add">
                    @csrf
                    @method("POST")
                    <input type="hidden" id="id" name="idProduct" class="form-control"
                        value="{{$productInfo["id"]}}">
                    <div class="mb-3 black-text bold">
                    <label for="InputWarna" class="form-label mt-2">Material Name</label>
                        <select type="text" class="form-select form-control black-text" id=""
                            name="idVendor">
                            <option value="0" disabled selected hidden>Choose...</option>
                            @foreach ($dataVen as $ven)
                            <option value="{{$ven["id"]}}" name="idVendor"> {{$ven["namaBarang"]}}</option>
                            @endforeach
                        </select>
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
