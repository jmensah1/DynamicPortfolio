@extends('admin.admin_master')
@section('admin')
@php 

$getallInvestmentData = App\Models\InvestmentRecord::all();
$total = 0;
@endphp
<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<!-- Google Charts Integration -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Investment Records</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Business Investment</p>
                                <h4 class="mb-2">
                                <h4 ></h4>        
                                </h4> 
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="fas fa-user-tie font-size-24"></i>
                                </span>
                            </div>
                        </div></br>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#AddNewInvestment"><buttone type="button" class="btn form-control btn-primary">Add Another Investments</buttone></a>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-4">
                <div class="card" id = "ShowTeams">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" id="DisplayEmployees" class="dropdown-item">Download Excel Sheet</a>
                                <!-- item-->
                            </div>
                        </div>

                        <h4 class="card-title sm-4">Investment Record</h4>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Type of Investment</th>
                                        <th style="width: 120px;">Amount</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach($getallInvestmentData as $data)
                                    @php $total += (preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $data->amount)); @endphp
                                    <tr>    
                                        <td>
                                            <h6 class="mb-0">{{$data->type_of_investment}}</h6>
                                        </td>
                                        
                                        <td>
                                            {{$data->amount}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">Total</h6>
                                        </td>
                                        <td>
                                            ${{$total}}
                                        </td>
                                    </tr>
                                    <!-- end -->
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div>
                    </div><!-- end card -->
                </div>
                
                <!-- end card -->
            </div>
            


        </div><!-- end row -->
    </div>
    <div id="AddNewInvestment"class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Add New Investment Record</h5>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('companyrecord.savenewInvestmentRecord')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <select class="form-select" name ="InvestmentRecord" alt="InvestmentRecord" required>
                                            <option value="" selected>Please Select Type of Investment</option>
                                            <option value="EquityInvestment">Equity Investment</option>
                                            <option value="DebtFinancing"> Debt Financing</option>
                                            <option value="ConvertibleDebt"> Convertible Debt</option>
                                            <option value="AngelInvestment"> Angel Investment</option>
                                            <option value="VentureCapital"> Venture Capital</option>
                                            <option value="Crowdfunding"> Crowd Funding</option>
                                            <option value="Grants"> Grants</option>
                                            <option value="PropertyInvestments"> Property Investment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" name="InvestmentAmount" placeholder = "Enter the Invested Amount" class="form-control" required/>
                                    </div>
                                </div>
                                <input class="btn btn-primary" name="AddThisRecord" type="submit" value="Add This Record"/>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <small style="color:red">To Update your Investment Record of Business select Sales Investment and submit</small>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
        </div>
    </div>
    @endsection
    