@extends('layout')
@section('content')

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn-sm btn-success bold-text mt-4 float-right ml-2" data-toggle="modal"
                        data-target="#exampleModalCenterAdd"><i class="fa-solid fa-pencil"></i>
                        Add Vendor
                    </button>
                    <a href="/vendors">
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
            <h6 class="m-0 font-weight-bold black-text">VENDOR SHEET</h6>
        </div>
        <div class="card-body black-text">
            <div class="table-responsive">
                <table class="table table-striped table-bordered black-text" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Material Name</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Capital Price</th>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($vendorInfo) && isset($categoryInfo))
                        @php
                            $iterator = 1;
                        @endphp
                        @foreach ($vendorInfo as $vendor)
                        <tr>
                            <td>{{$iterator}}</td>
                            <td>{{$vendor['namaBarang']}}</td>
                            <td>{{$vendor['merek']}}</td>
                            <td>{{$vendor['quantity']}}</td>
                            <td>Rp{{ number_format($vendor['hargaModal'], 0, ',', '.') }}</td>
                            <td>{{$vendor['category_name']}}</td>
                            <td>
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn-sm btn-info" data-toggle="modal"
                                    data-target="#exampleModalCenterEdit{{$vendor['id']}}">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <!-- Modal Update Data -->
                                <div class="modal fade" id="exampleModalCenterEdit{{$vendor['id']}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title black-text bold" id="exampleModalLongTitle">Edit Vendor</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="/vendors/edit">
                                                    @csrf
                                                    @method("PUT")

                                                    <div class="mb-3 black-text bold">
                                                        <input type="hidden" id="id" name="id"
                                                            class="form-control" value="{{$vendor['id']}}">

                                                            <div class="mb-3 black-text bold">
                                                                <label for="InputWarna" class="form-label">Material Name</label>
                                                                <input type="text" id="id" name="namaBarang" class="form-control" value="{{$vendor['namaBarang']}}">
                                                            </div>

                                                            <div class="mb-3 black-text bold">
                                                                <label for="InputWarna" class="form-label ">Brand</label>
                                                                <input type="text" id="id" name="merek" class="form-control" value="{{$vendor['merek']}}">
                                                            </div>

                                                            <div class="mb-3 black-text bold">
                                                                <label for="InputWarna" class="form-label ">Quantity</label>
                                                                <input type="number" id="id" name="quantity" class="form-control" value="{{$vendor['quantity']}}">
                                                            </div>

                                                            <div class="mb-3 black-text bold">
                                                                <label for="InputWarna" class="form-label mt-1">Capital Price</label>
                                                                <input type="number" id="id" name="hargaModal" class="form-control" value="{{$vendor['hargaModal']}}">
                                                            </div>

                                                            <label for="InputWarna" class="form-label mt-1 black-text bold">Category Name</label>
                                                                <select type="text" class="form-select form-control black-text" id=""
                                                                    name="category_id">
                                                                    <option value="{{$vendor['category_id']}}" name="category_id" disabled selected hidden>{{$vendor['category_name']}}</option>
                                                                    @foreach ($categoryInfo as $category)
                                                                    <option value="{{$category->getId()}}" name="category_id"> {{$category->getNamaCategory()}}</option>
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
                                    data-target="#exampleModalCenterDelete{{$vendor['id']}}">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Modal delete -->
                                <div class="modal fade" id="exampleModalCenterDelete{{$vendor['id']}}" tabindex="-1" role="dialog"
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
                                                <form method="POST" action="/vendors/delete">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        value="{{$vendor['id']}}">
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
                <h5 class="modal-title black-text bold" id="exampleModalLongTitle">New Data Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/vendors/add">
                    @csrf
                    @method("POST")

                    <div class="mb-3 black-text bold">
                        <label for="InputWarna" class="form-label">Material Name</label>
                        <input type="text" id="id" name="namaBarang" class="form-control" placeholder="-- Enter Material Name --">
                    </div>

                    <div class="mb-3 black-text bold">
                        <label for="InputWarna" class="form-label mt-1">Brand</label>
                        <input type="text" id="id" name="merek" class="form-control" placeholder="-- Enter Brand --">
                    </div>

                    <div class="mb-3 black-text bold">
                        <label for="InputWarna" class="form-label mt-1">Quantity</label>
                        <input type="number" id="id" name="quantity" class="form-control" placeholder="-- Enter Quantity --">
                    </div>

                    <div class="mb-3 black-text bold">
                        <label for="InputWarna" class="form-label mt-2">Capital Price</label>
                        <input type="number" id="id" name="hargaModal" class="form-control" placeholder="-- Enter Capital Price --">
                    </div>

                    <div class="mb-3 black-text bold">
                    <label for="InputWarna" class="form-label mt-2">Category Name</label>
                        <select type="text" class="form-select form-control black-text" id=""
                            name="category_id">
                            <option value="" disabled selected hidden>Choose...</option>
                            @foreach ($categoryInfo as $category)
                            <option value="{{$category->getId()}}" name="category_id"> {{$category->getNamaCategory()}}</option>
                            @endforeach
                        </select>
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
