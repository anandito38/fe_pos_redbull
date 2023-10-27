@extends('layout')
@section('content')

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn-sm btn-success bold-text mt-4 float-right ml-2" data-toggle="modal"
                        data-target="#exampleModalCenterAdd"><i class="fa-solid fa-pencil"></i>
                        Add Category
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
            <h6 class="m-0 font-weight-bold black-text">CATEGORY SHEET</h6>
        </div>
        <div class="card-body black-text">
            <div class="table-responsive">
                <table class="table table-striped table-bordered black-text" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Flavor</td>
                            <td>
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn-sm btn-info" data-toggle="modal"
                                    data-target="#exampleModalCenterEdit">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <!-- Modal Update Data -->
                                <div class="modal fade" id="exampleModalCenterEdit" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="">
                                                    @csrf
                                                    @method("PUT")

                                                    <div class="mb-3">
                                                        <input type="hidden" id="id" name="color_id"
                                                            class="form-control" value="">
                                                        <label for="InputWarna" class="form-label">Nama</label>
                                                        <input type="text" id="id" name="color_name"
                                                            class="form-control" value="">
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
                                    data-target="#exampleModalCenterDelete">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Modal delete -->
                                <div class="modal fade" id="exampleModalCenterDelete" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Data</h5>
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
                                                <form method="POST" action="">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        value="">
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
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
                <h5 class="modal-title black-text" id="exampleModalLongTitle">New Data Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @csrf
                    @method("POST")

                    <div class="mb-3 black-text">
                        <label for="InputWarna" class="form-label">Nama</label>
                        <input type="text" id="color_name" name="color_name" class="form-control">
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
