@extends('layout.layout')
@section('title-tag', 'Company List')
@section('header-title', 'Company List')
@section('content')
<div class="container-fluid px-0 mx-0">
    <div class="card">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-8">
                    <form action="{{ route('company-list') }}" method="get">
                        <div class="form-group">
                            <select class="form-control form-control-lg font-weight-bold border-dark" name="status">
                                <option value="null">Filter Record.....</option>
                                <option value="viewall">All</option>
                                <option value="pending">Pending</option>
                                <option value="process">Process</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-lg w-100 bg-dark border-0 font-weight-bold">Search</button>
                </div>
                </form>
            </div>

            <div class="data-tables datatable-dark">
                <table id="dataTable3" class="text-center">
                    <thead class="text-capitalize">
                        <tr>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>View Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $company->company_name }}</td>
                            <td>
                                {{ $company->company_email }}
                                @if($company->email_verify === 0)
                                    <span class="badge badge-danger" style="font-size:12px">Unverified</span>
                                @else
                                    <span class="badge badge-success" style="font-size:12px">Verified</span>
                                @endif
                            </td>
                            <td>{{ $company->company_mobile_number}}</td>
                            <td><a href="{{ route('view-company-details', $company->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
