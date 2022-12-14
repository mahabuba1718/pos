@extends('backend.master')
@section('content')
<style>
    .d-flex{
        display: flex!important;
        justify-content: space-between;
    }
</style>
<div class="container-fluid px-0">
    <section class="container-fluid my-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{url('/stock_report')}}" class="nav-link {{request()->is('stock_report') ? 'active' : '' }} "
                    id="stock_batch-tab" type="button" role="tab" aria-controls="stock_batch-tab-pane"
                    aria-selected="false">
                    <i class="fa-solid fa-money-bill-trend-up"></i>
                    Stock Report
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{url('/expiry_report')}}"
                    class="nav-link {{request()->is('expiry_report') ? 'active' : '' }} " id="expiry-tab" type="button"
                    role="tab" aria-controls="expiry-tab-pane" aria-selected="false">
                    <i class="fa-solid fa-xmark"></i>
                    Expiry Report
                </a>
            </li>
        </ul>
        <div class="container-fluid tab-content" id="myTabContent">

            <div class="tab-pane fade show {{request()->is('stock_report') ? 'active' : '' }}"
                id="{{url('/stock_report')}}" role="tabpanel" aria-labelledby="stock_batch-tab" tabindex="0">
                <section class="section p-3">
                    <div class="section-header d-flex p-3">
                        <h3 class="mt-3">Stock Report</h3>
                        <div class="section-header-breadcrumb d-flex p-3">
                            <div class="breadcrumb-item m-2 ">
                                <a href="{{route('dashboard')}}">Home</a>
                            </div>
                            <div class="m-2">/</div>
                            <div class="m-2">
                                <a href="{{route('stock_report')}}">Stock Report</a>
                            </div>
                        </div>
                    </div>
                    <div class="section-body container-fluid">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header d-flex p-3">
                                        <h4>Stock Report</h4>
                                        <input class="d-flex"  type="text" placeholder="Search" style="border-radius: 5px; padding:5px ">
                                    </div>

                                    <div class="card-body">
                                        <div class="">
                                            <div class="table_section p-3">
                                                <table class="table table-striped text-center" style="vertical-align: middle;" >
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="">#</th>
                                                            <th scope="col" class="">Medicine Name</th>
                                                            <th scope="col" class="">Available Stock</th>
                                                            <th scope="col" class="">Stock Alert</th>
                                                            <th scope="col" class="">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($adpurchase as $key=> $stock_b)
                                                        <tr class="text-center">
                                                            <td scope="col" class="">{{$key+1}}</td>
                                                            <td scope="col" class="">{{$stock_b->name}}</td>
                                                            <td scope="col" class="">{{$stock_b->stock}}</td>
                                                            <td scope="col" class="">{{$stock_b->stock_alert}}</td>
                                                            <td scope="col" class="">
                                                                @if($stock_b->status == 1)
                                                                    <p>Active</p>
                                                                @else
                                                                    <p>Inactive</p>
                                                                @endif
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

            <div class="tab-pane fade show {{request()->is('expiry_report') ? 'active' : '' }} " id="expiry-tab-pane"
                role="tabpanel" aria-labelledby="expiry-tab" tabindex="0">
                <section class="section p-3">
                    <div class="section-header d-flex p-3">
                        <h3 class="mt-3">Expiry Report</h3>
                        <div class="section-header-breadcrumb d-flex p-3">
                            <div class="breadcrumb-item m-2 ">
                                <a href="{{route('dashboard')}}">Home</a>
                            </div>
                            <div class="m-2">/</div>
                            <div class="m-2">
                                <a href="{{route('expiry_report')}}">Expiry Report</a>
                            </div>
                        </div>
                    </div>
                    <div class="section-body container-fluid">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header d-flex p-3">
                                        <h4>Expiry Medicine Report</h4>
                                        <input class="d-flex"  type="text" placeholder="Search" style="border-radius: 5px; padding:5px ">
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <div class="table_section p-3">
                                                <table class="table table-striped text-center" style="vertical-align: middle;" >
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="">#</th>
                                                            <th scope="col" class="">Medicine Name</th>
                                                            <th scope="col" class="">Supplier ID</th>
                                                            <th scope="col" class="">Purchase Date</th>
                                                            <th scope="col" class="">Expire Date</th>
                                                            <th scope="col" class="">Purchase No.</th>
                                                            <th scope="col" class="">Stock</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td scope="col" class=""></td>
                                                            <td scope="col" class=""></td>
                                                            <td scope="col" class="my-auto"></td>
                                                            <td scope="col" class="my-auto"></td>
                                                            <td scope="col" class=""></td>
                                                            <td scope="col" class=""></td>
                                                            <td scope="col" class=""></td>
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
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
@endsection