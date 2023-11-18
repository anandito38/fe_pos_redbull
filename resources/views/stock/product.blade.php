@extends('layout')
@section('content')

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn-sm btn-success bold-text mt-4 float-right ml-2" data-toggle="modal"
                        data-target="#exampleModalCenterAdd"><i class="fa-solid fa-pencil"></i>
                        Add Product
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
            <h6 class="m-0 font-weight-bold black-text">PRODUCT SHEET</h6>
        </div>
        <div class="card-body black-text">
            <div class="table-responsive">
                <table class="table table-striped table-bordered black-text" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Product Stock</th>
                            <th>Capital Price</th>
                            <th>Selling Price</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($productInfo))
                        @php
                            $iterator = 1;
                        @endphp
                        @foreach ($productInfo as $product)
                        <tr>
                            <td>{{$iterator}}</td>
                            <td>{{$product->getKode()}}</td>
                            <td>{{$product->getNama()}}</td>
                            <td>{{$product->getQuantity()}}</td>
                            <td>Rp{{ number_format(5000, 0, ',', '.') }}</td>
                            <td>Rp{{ number_format($product->getHargaJual(), 0, ',', '.') }}</td>
                            <td>
                                <button type="button" class="btn-sm btn-primary">
                                    <i class="fa fa-window-restore"></i>
                                </button>
                            </td>
                            <td>
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn-sm btn-info" data-toggle="modal"
                                    data-target="#exampleModalCenterEdit{{$product->id}}">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <!-- Modal Update Data -->
                                <div class="modal fade" id="exampleModalCenterEdit{{$product->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title black-text bold" id="exampleModalLongTitle">Edit Product</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="/product/edit">
                                                    @csrf
                                                    @method("PUT")

                                                    <div class="mb-3 black-text bold">
                                                        <input type="hidden" id="id" name="id"
                                                            class="form-control" value="{{$product->getId()}}">

                                                        <div class="mb-3 black-text bold">
                                                            <label for="InputWarna" class="form-label">Product Name</label>
                                                            <input type="text" id="nama" name="nama" class="form-control" value="{{$product->getNama()}}">
                                                        </div>

                                                        <div class="mb-3 black-text bold">
                                                            <label for="InputWarna" class="form-label">Selling Price</label>
                                                            <input type="number" id="hargaJual" name="hargaJual" class="form-control" value="{{$product->getHargaJual()}}">
                                                        </div>

                                                        <div class="mb-3 black-text bold">
                                                            <label for="InputWarna" class="form-label">Quantity</label>
                                                            <input type="number" id="quantity" name="quantity" class="form-control" value="{{$product->getQuantity()}}">
                                                        </div>

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
                                    data-target="#exampleModalCenterDelete{{$product->id}}">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Modal delete -->
                                <div class="modal fade" id="exampleModalCenterDelete{{$product->id}}" tabindex="-1" role="dialog"
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
                                                <form method="POST" action="/product/delete">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        value="{{$product->id}}">
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
                <h5 class="modal-title black-text bold" id="exampleModalLongTitle">New Data Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/product/add">
                    @csrf
                    @method("POST")

                    <div class="mb-3 black-text bold">
                        <label for="InputWarna" class="form-label">Product Name</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="-- Enter Product Name --">
                    </div>

                    <div class="mb-3 black-text bold">
                        <label for="InputWarna" class="form-label">Selling Price</label>
                        <input type="number" id="hargaJual" name="hargaJual" class="form-control" placeholder="-- Enter Selling Price --">
                    </div>

                    <div class="mb-3 black-text bold">
                        <label for="InputWarna" class="form-label">Product Stock</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" placeholder="-- Enter Product Stock --">
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
