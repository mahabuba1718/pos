@extends('backend.master')
@section('content')

<div class="container-fluid px-0">

    <section class="container-fluid my-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{url('/expense')}}" class="nav-link {{request()->is('expense') ? 'active' : '' }} " id="expense-tab" 
                    type="button" role="tab" aria-controls="expense-tab-pane" aria-selected="true">
                    <i class="fa-solid fa-bag-shopping"></i>
                    Expense
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{url('/income')}}" class="nav-link {{request()->is('income') ? 'active' : '' }} " id="income-tab" 
                    type="button" role="tab" aria-controls="income-tab-pane" aria-selected="false">
                    <i class="fa-solid fa-money-check-dollar"></i>
                    Income
                </a>
            </li>
        </ul>
        <div class="container-fluid tab-content" id="myTabContent">
            <div class="tab-pane fade show {{request()->is('expense') ? 'active' : '' }}" id="{{url('/expense')}}" role="tabpanel" aria-labelledby="expense-tab"
                tabindex="0">
                <section class="section p-2">
                    <div class="section-header d-flex p-3">
                        <h2 class="mt-3">Expense</h2>
                        <div class="section-header-breadcrumb d-flex p-3">
                            <div class="breadcrumb-item m-2 ">
                                <a href="{{route('dashboard')}}">Home</a>
                            </div>
                            <div class="m-2">/</div>
                            <div class="m-2">
                                <a href="{{route('purchase')}}">Purchase</a>
                            </div>
                        </div>
                    </div>
                    <div class="section-body container-fluid">
                        <div class="row ">
                            <div class=" col-lg-12">
                                <div class="card p-5" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                    <table class="table table-striped text-center table-bordered table_reduced">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="">#</th>
                                                <th scope="col" class="">Title</th>
                                                <th scope="col" class="">Amount</th>
                                                <th scope="col" class="">Description</th>
                                                <th scope="col" class="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($expense as $key => $account)
                                            <tr class="text-center">
                                                <td scope="col" class="">{{$key+1}}</td>
                                                <td scope="col" class="">{{$account->title}}</td>
                                                <td scope="col" class="">{{$account->amount}}</td>
                                                <td scope="col" class="">{{$account->description}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle text-light" style="background-color: #008080;"
                                                            data-bs-toggle="dropdown">
                                                            Action
                                                        </button>
                                                        <ul class="dropdown-menu option">
                                                            <li><a class="dropdown-item" href="edit-income.html">
                                                                    <i style="font-size: 10px;"
                                                                        class="fas fa-pencil-alt my-2"> Edit</i>
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
                                            @endforeach
                                        </tbody>                                      
                                        <tfoot>
                                            <tr>
                                                <td colspan="1" class="text-right">Total</td>
                                                <td></td>
                                                <td>3400</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="tab-pane fade show {{request()->is('income') ? 'active' : '' }}" id="{{url('/income')}}"  role="tabpanel" aria-labelledby="income-tab" tabindex="0">
                <section class="section p-2">
                    <div class="section-header d-flex p-3">
                        <h2 class="mt-3">Income</h2>
                        <div class="section-header-breadcrumb d-flex p-3">
                            <div class="breadcrumb-item m-2 ">
                                <a href="{{route('dashboard')}}">Home</a>
                            </div>
                            <div class="m-2">/</div>
                            <div class="m-2">
                                <a href="{{route('pos')}}">POS</a>
                            </div>
                        </div>
                    </div>
                    <div class="section-body container-fluid">
                        <div class="row ">
                            <div class=" col-lg-12">
                                <div class="card p-5" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                    <table class="table table-striped text-center table-bordered table_reduced">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="">#</th>
                                                <th scope="col" class="">Title</th>
                                                <th scope="col" class="">Amount</th>
                                                <th scope="col" class="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td scope="col" class="">1</td>
                                                <td scope="col" class="">Purchase Medicine</td>
                                                <td scope="col" class="">400</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle text-light" style="background-color: #008080;"
                                                            data-bs-toggle="dropdown">
                                                            Action
                                                        </button>
                                                        <ul class="dropdown-menu option">
                                                            <li><a class="dropdown-item" href="edit-income.html">
                                                                    <i style="font-size: 10px;"
                                                                        class="fas fa-pencil-alt my-2"> Edit</i>
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
                                        <tfoot>
                                            <tr>
                                                <td colspan="1" class="text-right">Total</td>
                                                <td></td>
                                                <td>3400</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
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