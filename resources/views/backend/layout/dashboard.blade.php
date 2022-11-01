@extends('backend.master')
@section('content')
@if(session()->has('message'))
<div class="alert alert-success" >
    {{ session()->get('message') }}
</div>
@endif
<section id="features" class="text-center">
    <div class="row p-3 mb-3">
        <div class="col-lg-3 col-md-6">
            <div class="features-col" style="background-color: #008ba9; color:white;">
                <h5 class="">Purchase</h5>
                <i class="fa-2x p-2 mb-3 fa-solid fa-cart-shopping"></i>
                <div class="">
                    <h4>4</h4>
                    <h5>Total Purchase</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="features-col" style="background-color: #88ae88; color:white">
                <h5 class="">Expenses</h5>
                <i class="fa-2x p-2 mb-3 fa-solid fa-dollar-sign"></i>
                <div class=" ">
                    <h4>4</h4>
                    <h5>Total Expenses</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 ">
            <div class="features-col" style="background-color: #6768b2; color:white">
                <h5 class="">Sales</h5>
                <i class="fa-2x p-2 mb-3 fa-brands fa-salesforce"></i>
                <div class=" ">
                    <h4>4</h4>
                    <h5>Total Sales</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 ">
            <div class="features-col" style="background-color: #bd7474; color:white">
                <h5 class="">Income</h5>
                <i class="fa-2x p-2 mb-3 fa-solid fa-money-check-dollar"></i>
                <div class=" ">
                    <h4>4</h4>
                    <h5>Total Income</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 ">
            <div class="features-col" style="background-color: #b0968e; color:white">
                <h5 class="">Profit</h5>
                <i class="fa-2x p-2 mb-3 fa-solid fa-hand-holding-dollar"></i>
                <div class=" ">
                    <h4>4</h4>
                    <h5>Total Profit</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 ">
            <div class="features-col" style="background-color: #c78e5c; color:white">
                <h5 class="">Stocked Medicine</h5>
                <i class="fa-2x p-2 mb-3 fa-solid fa-capsules"></i>
                <div class=" ">
                    <h4>4</h4>
                    <h5>Total Stocked Medicine</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 ">
            <div class="features-col" style="background-color: #3fa278; color:white">
                <h5 class="">Batch Wise Medicine</h5>
                <i class="fa-2x p-2 mb-3 fa-solid fa-bookmark"></i>
                <div class=" ">
                    <h4>4</h4>
                    <h5>Total Batched Medicine</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 ">
            <div class="features-col" style="background-color: #16b1ce; color:white">
                <h5 class="">Expired Medicine</h5>
                <i class="fa-2x p-2 mb-3 fa-solid fa-xmark"></i>
                <div class=" ">
                    <h4>4</h4>
                    <h5>Total Expired Medicine</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="features-col" style="background-color: #779685; color:white">
                <h5 class="">Pharmacist</h5>
                <i class="fa-2x p-2 mb-3 fa-solid fa-user-doctor"></i>
                <div class=" ">
                    <h4>4</h4>
                    <h5>Total Pharmacist</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="features-col" style="background-color: #506a8e; color:white">
                <h5 class="">Suppliers</h5>
                <i class="fa-2x p-2 mb-3 fa-solid fa-truck-field"></i>
                <div class=" ">
                    <h4>4</h4>
                    <h5>Total Suppliers</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
@endsection