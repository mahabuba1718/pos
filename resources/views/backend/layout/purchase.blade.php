@extends('backend.master')
@section('content')
<div class="container-fluid px-0">
    <section class="section p-3">
        <div class="section-header d-flex p-3">
            <h3 class="mt-3">Purchase</h3>
            <div class="section-header-breadcrumb d-flex p-3">
                <div class="breadcrumb-item m-2 ">
                    <a href="{{route('dashboard')}}">Home</a>
                </div>
                <div class="m-2">/</div>
                <div class="m-2">
                    <a href="{{route('medicine')}}">Medicine</a>
                </div>
            </div>
        </div>
        <div class="section-body container-fluid">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <div class="card-header d-flex p-3">
                            <h4>Purchase</h4>
                            <div class="card-header-form">
                                <a href="{{route('add_purchase')}}" class="btn text-light float-right" style="background-color: #008080;">
                                    <i class="fa fa-plus"></i>
                                    Add Purchase
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="table_section p-3">
                                    <table class="table table-striped text-center" style="vertical-align: middle;">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="" width="4%">#</th>
                                                <th scope="col" class="" width="7%">Purchase No.</th>
                                                <th scope="col" class="" width="7%">Purchase Date</th>
                                                <th scope="col" class="" width="7%">Supplier ID</th>
                                                <th scope="col" class="" width="7%">Vat(BDT)</th>
                                                <th scope="col" class="" width="7%">Discount(BDT) </th>
                                                <th scope="col" class="" width="7%">Total Amount(BDT) </th>
                                                <th scope="col" class="" width="7%">Paid Amount(BDT)</th>
                                                <th scope="col" class="" width="7%">Due Amount(BDT) </th>
                                                <th scope="col" class="" width="7%">Change Amount(BDT) </th>
                                                <th scope="col" class="" width="7%">Status</th>
                                                <th scope="col" class="" width="7%">Action</th>
                                                <th scope="col" class="" width="7%">View Purchase</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($adpurchase as $key=> $purchase)
                                            <tr class="text-center">
                                                <td scope="col" class="">{{$key+1}}</td>
                                                <td scope="col" class="my-auto">{{$purchase->purchase_no}}</td>
                                                <td scope="col" class="">{{$purchase->date}}</td>
                                                <td scope="col" class="my-auto">{{$purchase->supplier}}</td>
                                                <td scope="col" class="">{{$purchase->vat}}</td>
                                                <td scope="col" class="">{{$purchase->discount_amount}}</td>
                                                <td scope="col" class="">{{$purchase->total_amount}}</td>
                                                <td scope="col" class="">{{$purchase->paid_amount}}</td>
                                                <td scope="col" class="">{{$purchase->due_amount}}</td>
                                                <td scope="col" class="">{{$purchase->change_amount}}</td>

                                                <td>
                                                    <span class="badge bg-danger rounded-pill p-2">Pending</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn text-light dropdown-toggle " style="background-color: #008080;" data-bs-toggle="dropdown">
                                                            Action
                                                        </button>
                                                        <ul class="dropdown-menu option">
                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <i style="font-size: 10px;" class="fas fa-pencil-alt my-2"> Approve</i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <i style="font-size: 10px;" class="fas fa-trash my-2"> Delete</i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" data-bs-toggle="modal" class="btn text-light view" style=" background-color:#25aa9e;" data-bs-target="#myModal{{$purchase->id}}">
                                                        View
                                                    </button>
                                                    <div class="modal" id="myModal{{$purchase->id}}">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">
                                                                        View Purchase for Purchase No.
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body" id="viewPurch">
                                                                        <div class="">
                                                                            <div class="table_section p-3">
                                                                                <table class="table table-striped text-center" style="vertical-align: middle;">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th scope="col" class="" width="6%">#</th>
                                                                                            <th scope="col" class="" width="12%">Purchase No.</th>
                                                                                            <th scope="col" class="" width="14%">Image</th>
                                                                                            <th scope="col" class="" width="14%">Medicine Name</th>
                                                                                            <th scope="col" class="" width="14%">Purchase Date</th>
                                                                                            <th scope="col" class="" width="14%">Expire Date</th>
                                                                                            <th scope="col" class="" width="14%">Batch ID</th>
                                                                                            <th scope="col" class="" width="12%">Total Quantity</th>
                                                                                            <th scope="col" class="" width="12%">Price(BDT) </th>
                                                                                            <th scope="col" class="" width="12%">Sub Total(BDT) </th>

                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach($subpurchase as $key=> $subpurchases)
                                                                                        @if($subpurchases -> purchase_id == $purchase -> id)
                                                                                        <tr class="text-center">
                                                                                            <td scope="col" class="">{{$key+1}}</td>
                                                                                            <td scope="col" class="my-auto">{{$subpurchases->purchase_no}}</td>
                                                                                            <td scope="col" class="">
                                                                                                <img class="" src="{{asset('/uploads/medicine/'.$subpurchases->medicine->image)}}" alt="image">
                                                                                            </td>
                                                                                            <td scope="col" class="">{{$subpurchases->medicine->name}}</td>
                                                                                            <td scope="col" class="">{{$subpurchases->date}}</td>
                                                                                            <td scope="col" class="">{{$subpurchases->expire_date}}</td>
                                                                                            <td scope="col" class="">{{$subpurchases->batch_id}}</td>
                                                                                            <td scope="col" class="">{{$subpurchases->quantity}}</td>
                                                                                            <td scope="col" class="">{{$subpurchases->price}}</td>
                                                                                            <td scope="col" class="">{{$subpurchases->sub_total}}</td>
                                                                                        </tr>
                                                                                        @endif
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-center">
                                                                                <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Close</button>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
@endsection