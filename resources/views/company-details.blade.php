@extends('layout.layout')
@section("title-tag", $companydetails[0]->company_name . "  ". "Company Details")
@section("header-title",$companydetails[0]->company_name . "  ". "Company Details")
@section('content')
  <div class="card">
    <div class="card-body">
        <div class="row ">
            <div class="col-3"></div>
            <div class="col-6">
                <ul class="list-group">
                    @foreach ($companydetails as $companydetail )
                      <li class="list-group-item font-weight-bold ">Name <span class="pull-right">{{ $companydetail->company_name }}</span></li>
                      <li class="list-group-item font-weight-bold">
                          <span class="pull-left">
                            Email &nbsp;&nbsp;
                            @if($companydetail->email_verify === 0)
                                <span class="badge badge-danger" style="font-size:12px">Unverified</span>
                            @else
                                <span class="badge badge-success" style="font-size:12px">Verified</span>
                            @endif
                          </span>
                          <span class="pull-right">{{ $companydetail->company_email }}</span> 
                      </li>                    
                      <li class="list-group-item font-weight-bold">Mobile Number <span class="pull-right">{{ $companydetail->company_mobile_number }}</span></li>
                      <li class="list-group-item font-weight-bold">State <span class="pull-right">{{ $companydetail->company_state }}</span></li>
                      <li class="list-group-item font-weight-bold">City<span class="pull-right">{{ $companydetail->company_city }}</span></li>
                      <li class="list-group-item font-weight-bold">Pincode <span class="pull-right">{{ $companydetail->company_pincode }}</span></li>
                      <li class="list-group-item font-weight-bold">Address<span class="pull-right">{{ $companydetail->company_address }}</span></li>
                      <li class="list-group-item font-weight-bold"> Document <span class="pull-right">{{ $companydetail->company_document }}</span></li>
                      <li class="list-group-item font-weight-bold"> Status <span class="pull-right">{{ $companydetail->company_status }}</span></li>
                      <li class="list-group-item font-weight-bold"> CreateAt <span class="pull-right">{{ convertDate($companydetail->created_at) }}</span></li>
                      <li class="list-group-item font-weight-bold"> UpdateAt <span class="pull-right">{{ convertDate($companydetail->updated_at) }}</span></li>


                    @endforeach
                  </ul>
            </div>
          </div>
          <div class="col-3"></div>
    </div>
  </div>
@endsection
