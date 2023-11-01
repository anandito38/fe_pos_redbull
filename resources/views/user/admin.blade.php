@extends('layout')
@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn-sm btn-success bold-text mt-4 float-right ml-2" data-toggle="modal"
                        data-target="#exampleModalCenterAdd"><i class="fa-solid fa-pencil"></i>
                        Add Admin
                    </button>
                    <button type="button" class="btn-sm btn-warning bold-text mt-4 float-right"><i
                            class="fa-solid fa-eye"></i>
                        Show All
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold black-text">ADMIN SHEET</h6>
        </div>
        <div class="card-body black-text">
            <div class="table-responsive">
                <table class="table table-striped table-bordered black-text" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Full Name</th>
                            <th>Nickname</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($adminInfo))
                        @php
                        $iterator = 1
                        @endphp
                        @foreach ($adminInfo as $admin)
                        <tr>
                            <td>{{$iterator}}</td>
                            <td>{{$admin->getfullName()}}</td>
                            <td>{{$admin->nickname}}</td>
                            <td>{{$admin->phoneNumber}}</td>
                            <td>{{$admin->address}}</td>
                            <td>{{$admin->role}}</td>
                            <td>
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn-sm btn-info" data-toggle="modal"
                                    data-target="#exampleModalCenterEdit{{$admin->id}}">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <!-- Modal Update Data -->
                                <div class="modal fade" id="exampleModalCenterEdit{{$admin->id}}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title bold" id="exampleModalLongTitle">Edit Admin</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="/admin/edit">
                                                    @csrf
                                                    @method("PUT")

                                                    <div class="mb-3 bold">
                                                        <input type="hidden" id="id" name="id"
                                                            class="form-control" value="{{$admin->id}}">

                                                        <label for="InputWarna" class="form-label">Full Name</label>
                                                        <input type="text" id="id" name="fullName"
                                                            class="form-control black-text"
                                                            value="{{$admin->getfullName()}}">

                                                        <label for="InputWarna" class="form-label mt-3">Phone
                                                            Number</label>
                                                        <input type="text" id="id" name="phoneNumber"
                                                            class="form-control black-text"
                                                            value="{{$admin->getPhoneNumber()}}">

                                                        <label for="InputWarna" class="form-label mt-3">Address</label>
                                                        <input type="text" id="id" name="address"
                                                            class="form-control black-text"
                                                            value="{{$admin->getAddress()}}">

                                                        <label for="InputWarna" class="form-label mt-3">Role</label>
                                                        <select type="text" class="form-select form-control black-text" id=""
                                                            name="role">
                                                            <option value="" disabled selected hidden>{{$admin->getRole()}}</option>
                                                            <option value="Administrator" name="role"> Administrator</option>
                                                            <option value="Sales" name="role"> Sales</option>
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
                                    data-target="#exampleModalCenterDelete{{$admin->id}}">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <!-- Modal delete -->
                                <div class="modal fade" id="exampleModalCenterDelete{{$admin->id}}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                <form method="POST" action="/admin/delete">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="hidden" id="id" name="id" class="form-control"
                                                        value="{{$admin->id}}">
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
                <h5 class="modal-title black-text" id="exampleModalLongTitle">New Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/admin/add">
                    @csrf
                    @method("POST")

                    <div class="mb-3 black-text">
                        <label for="InputWarna" class="form-label">Full Name</label>
                        <input type="text" id="id" name="fullName" class="form-control black-text"
                            placeholder="-- Enter Fullname --">

                        <label for="InputWarna" class="form-label mt-3">Nickname</label>
                        <input type="text" id="id" name="nickname" class="form-control black-text"
                            placeholder="-- Enter Nickname --">

                        <label for="InputWarna" class="form-label mt-3">Password</label>
                        <input type="password" id="id" name="password" class="form-control black-text"
                            placeholder="-- Enter Password --">

                        <label for="InputWarna" class="form-label mt-3">Phone Number</label>
                        <input type="text" id="id" name="phoneNumber" class="form-control black-text"
                            placeholder="-- Enter PhoneNumber --">

                        <label for="InputWarna" class="form-label mt-3">Address</label>
                        <input type="text" id="id" name="address" class="form-control black-text"
                            placeholder="-- Enter Address --">

                        <label for="InputWarna" class="form-label mt-3">Role</label>
                        <select type="text" class="form-select form-control black-text" id=""
                            name="role">
                            <option value="" disabled selected hidden>Choose...</option>
                            <option value="Administrator" name="role"> Administrator</option>
                            <option value="Sales" name="role"> Sales</option>
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
