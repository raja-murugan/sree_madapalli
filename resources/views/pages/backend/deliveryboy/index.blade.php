@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Delivery Boy</h4>
                            <div class="page-title-right">
                                <div>
                                    <button type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create</button>

                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        @include('pages.backend.deliveryboy.create')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (\Session::has('add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    {!! \Session::get('add') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (\Session::has('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-bullseye-arrow me-2"></i>
                    {!! \Session::get('update') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (\Session::has('soft_destroy'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-block-helper me-2"></i>
                    {!! \Session::get('soft_destroy') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (\Session::has('destroy'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-block-helper me-2"></i>
                    {!! \Session::get('destroy') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead style="background: lightgrey">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                            @hasrole('Super-Admin')
                                            <th>Status</th>
                                            @endhasrole
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $keydata => $datas)
                                        <tr>
                                            <td>{{ ++$keydata }}</td>
                                            <td>{{ $datas->name }}</td>
                                            <td>{{ $datas->contact_number }}</td>
                                            @hasrole('Super-Admin')
                                            <td>
                                                @if ($datas->soft_delete == 1)
                                                <span class="badge bg-danger">In Active</span>
                                                @else
                                                <span class="badge bg-success">Active</span>
                                                @endif
                                            </td>
                                            @endhasrole
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li>
                                                        <a href="{{ route('deliveryboy.edit', ['id' => $datas->id]) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#jobDelete{{ $datas->id }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="jobDelete{{ $datas->id }}" tabindex="-1" aria-labelledby="jobDeleteLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-body px-4 py-5 text-center">
                                                        <div class="avatar-sm mb-4 mx-auto">
                                                            <div class="avatar-title bg-primary text-primary bg-opacity-10 font-size-20 rounded-3">
                                                                <i class="mdi mdi-trash-can-outline"></i>
                                                            </div>
                                                        </div>
                                                        <p class="text-muted font-size-16 mb-4">Please confirm that you wish to remove the delivery boy.</p>

                                                        <div class="hstack gap-2 justify-content-center mb-0">
                                                            <form autocomplete="off" method="POST" action="{{ route('deliveryboy.delete', ['id' => $datas->id]) }}">
                                                                @method('PUT')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Get Back</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.general.footer')

    </div>
</div>
@endsection