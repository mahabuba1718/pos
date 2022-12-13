@extends('backend.master')
@section('content')
<div class="container-fluid px-0">
    <section class="section p-3">
        <div class="section-header d-flex p-3">
            <h3 class="mt-3">POS</h3>
            <div class="section-header-breadcrumb d-flex p-3">
                <div class="breadcrumb-item m-2 ">
                    <a href="{{route('dashboard')}}">Home</a>
                </div>
                <div class="m-2">/</div>
                <div class="m-2">
                    <a href="{{route('possale')}}">POS Sale</a>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <h4>POS Sale</h4>
                            <!-- <div class="card-header-form">
                                <a href="#" class="btn float-right text-light" style="background-color: #008080;">
                                    <i class="fa fa-list"></i>
                                    Draft List
                                </a>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="table_section p-3">
                                    <table class="table table-striped text-center" style="vertical-align: middle;" >
                                        <thead>
                                            <tr >
                                                <th scope="col" class="" width="4%">#</th>
                                                <th scope="col" class="" width="8%">Date</th>
                                                <th scope="col" class="" width="7%">Invoice No.</th>
                                                <th scope="col" class="" width="8%">Customer</th>
                                                <th scope="col" class="" width="8%">Total Quantity</th>
                                                <th scope="col" class="" width="8%">Total Amount</th>
                                                <th scope="col" class="" width="5%">Vat</th>
                                                <th scope="col" class="" width="8%">Discount </th>
                                                <th scope="col" class="" width="11%">Paid Amount(BDT)</th>
                                                <th scope="col" class="" width="11%">Change Amount(BDT)</th>
                                                <th scope="col" class="" width="5%">Due </th>
                                                <th scope="col" class="" width="7%">Status </th>
                                                <th scope="col" class="" width="9%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td scope="col" class="">1</td>
                                                <td scope="col" class="my-auto">2022-10-03</td>
                                                <td scope="col" class="">INV- 0001</td>
                                                <td scope="col" class="">Walk-In-Customer</td>
                                                <td scope="col" class="">2</td>
                                                <td scope="col" class="">18</td>
                                                <td scope="col" class="">0</td>
                                                <td scope="col" class="">0</td>
                                                <td scope="col" class="">100</td>
                                                <td scope="col" class="">18</td>
                                                <td scope="col" class="">18</td>
                                                <td>
                                                
                                                    <span class="badge bg-danger" style="padding: 7px;">Pending</span>
                                                    
                                                    <!-- <span class="badge bg-success" style="padding: 7px;">Approve</span> -->
                                                   
                                                </td>
                                                <td>

                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle text-light" style="background-color: #008080;"
                                                            data-bs-toggle="dropdown">
                                                            Action
                                                        </button>
                                                        <ul class="dropdown-menu option">
                                                            <li><a class="dropdown-item" href="#">
                                                                <i style="font-size: 10px;"
                                                                        class="fas fa-pencil-alt my-2"> Approve</i>
                                                                </a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">
                                                                    <i style="font-size: 10px;"
                                                                        class="fas fa-trash my-2"> Delete</i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
@endsection