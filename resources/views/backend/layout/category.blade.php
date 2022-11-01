@extends('backend.master')
@section('content')

<div class="container-fluid px-0">

    <section class="container-fluid my-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{url('/category')}}" class="nav-link {{request()->is('category') ? 'active' : '' }} " id="category-tab"  type="button" role="tab" aria-controls="category-tab-pane"
                    aria-selected="true">
                    <i class="fa-solid fa-square-poll-horizontal"></i>
                    Category
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{url('/unit')}}"  class="nav-link {{request()->is('unit') ? 'active' : '' }} " id="unit-tab" 
                    type="button" role="tab" aria-controls="unit-tab-pane" aria-selected="false">
                    <i class="fa-solid fa-pen-fancy"></i>
                    Unit
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{url('/type')}}"  class="nav-link {{request()->is('type') ? 'active' : '' }} " id="type-tab" 
                    type="button" role="tab" aria-controls="type-tab-pane" aria-selected="false">
                    <i class="fa-solid fa-cube"></i>
                    Type
                </a>
            </li>
        </ul>
        <div class="container-fluid tab-content" id="myTabContent">
            <div class="tab-pane fade show {{request()->is('category') ? 'active' : '' }}" id="{{url('/category')}}" role="tabpanel" aria-labelledby="category-tab"
                tabindex="0">
                <section class="section p-2">
                    <div class="section-header d-flex p-3">
                        <h3 class="mt-3">Category</h3>
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
                            <div class=" col-lg-4 ">
                                <form method="POST" action="{{route('categories')}}" class="border" >
                                 @csrf
                                  
                                    <div class="card" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                        <div class="card-header p-2">
                                            <h4>Add Category</h4>
                                            <div class="form-group col-lg-12 p-2">
                                                <label for="category" class="mb-2">
                                                    Category
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <input for="category"  type="text" class="form-control mb-4" name="name"
                                                    placeholder="Category" id="category" value="">
                                                <span class="text-danger"> </span>
                                            </div>
                                            <div class="form-group col-lg-12 p-2">
                                                <label for="description" class="mb-2">
                                                    Description
                                                    <strong class="text-danger"> </strong>
                                                </label>
                                                <textarea for="description" class="form-control mb-4" name="description" id="description"
                                                    placeholder="Please add Category details"></textarea>
                                                <span class="text-danger"> </span>
                                            </div>

                                        </div>

                                        <div class="card-footer text-center mb-3">
                                            <button class="btn text-light" style="background-color:#25aa9e;" type="submit">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="  col-lg-8 ">
                                <div class="card  p-3" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                    <table class="table table-striped text-center  table-bordered table_reduced">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="">No.</th>
                                                <th scope="col" class="">Name</th>
                                                <th scope="col" class="">Description</th>
                                                <th scope="col" class="">Status</th>
                                                <th scope="col" class="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $key=>$category )
                                            <tr class="text-center">
                                                <td scope="col" class="">{{$key+1}}</td>
                                                <td scope="col" class="">{{$category->name}}</td>
                                                <td scope="col" class="">{{$category->description}}</td>
                                                <td scope="col" class=" ">
                                                    @if($category->status == 1)
                                                    <div class=" form-switch">
                                                        <input class="form-check-input " type="checkbox" role="switch"
                                                            id="flexSwitchCheckDefault">
                                                        <label class="form-check-label"
                                                            for="flexSwitchCheckDefault"></label>
                                                        <div>
                                                            @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn text-light dropdown-toggle " style="background-color: #008080;"
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
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade show {{request()->is('unit') ? 'active' : '' }} " id="{{url('/unit')}}" role="tabpanel" aria-labelledby="unit-tab" tabindex="0">
                <section class="section p-2">
                    <div class="section-header d-flex p-3">
                        <h3 class="mt-3">Unit</h3>
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
                            <div class=" col-lg-4">
                                <form method="POST" action="{{route('units')}}" class="border" >
                                    @csrf
                                    <div class="card" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                        <div class="card-header p-2">
                                            <h4>Add Unit</h4>
                                            <div class="form-group col-lg-12 p-2">
                                                <label for="unit" class="mb-2">
                                                    Unit
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <input type="text" class="form-control mb-4" name="name"
                                                    placeholder="Unit" id="unit" value="">
                                                <span class="text-danger"> </span>
                                            </div>
                                            <div class="form-group col-lg-12 p-2">
                                                <label for="description" class="mb-2">
                                                    Description
                                                    <strong class="text-danger"> </strong>
                                                </label>
                                                <textarea class="form-control mb-4" name="description" id="description"
                                                    placeholder="Please add unit details"></textarea>
                                                <span class="text-danger"> </span>
                                            </div>

                                        </div>

                                        <div class="card-footer text-center mb-3">
                                            <button class="btn text-light" style="background-color:#25aa9e;" type="submit">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="  col-lg-8">
                                <div class="card p-3" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                    <table class="table table-striped text-center  table-bordered table_reduced">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="">No.</th>
                                                <th scope="col" class="">Name</th>
                                                <th scope="col" class="">Description</th>
                                                <th scope="col" class="">Status</th>
                                                <th scope="col" class="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($units as $key=>$unit)
                                            <tr class="text-center">
                                                <td scope="col" class="">{{$key+1}}</td>
                                                <td scope="col" class="">{{$unit->name}}</td>
                                                <td scope="col" class="">{{$unit->description}}</td>
                                                <td scope="col" class=" ">
                                                    @if($unit-> status == 1)
                                                    <div class=" form-switch">
                                                        <input class="form-check-input " type="checkbox" role="switch"
                                                            id="flexSwitchCheckDefault">
                                                        <label class="form-check-label"
                                                            for="flexSwitchCheckDefault"></label>
                                                        <div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn text-light dropdown-toggle " style="background-color: #008080;"
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
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade show {{request()->is('type') ? 'active' : '' }} " id="{{url('/type')}}" role="tabpanel" aria-labelledby="type-tab" tabindex="0">
                <section class="section p-2">
                    <div class="section-header d-flex p-3">
                        <h3 class="mt-3">Type</h3>
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
                            <div class=" col-lg-4">
                                <form method="POST" action="{{route('types')}}" class="border">
                                    @csrf
                                    <div class="card" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                        <div class="card-header p-2">
                                            <h4>Add Type</h4>
                                            <div class="form-group col-lg-12 p-2">
                                                <label for="name" class="mb-2">
                                                    Type
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <input type="text" class="form-control mb-4" name="name"
                                                    placeholder="Type" id="type" value="">
                                                <span class="text-danger"> </span>
                                            </div>
                                            <div class="form-group col-lg-12 p-2">
                                                <label for="description" class="mb-2">
                                                    Description
                                                    <strong class="text-danger"> </strong>
                                                </label>
                                                <textarea class="form-control mb-4" name="description" id="description"
                                                    placeholder="Please add type details"></textarea>
                                                <span class="text-danger"> </span>
                                            </div>

                                        </div>

                                        <div class="card-footer text-center mb-3">
                                            <button class="btn text-light" style="background-color:#25aa9e;" type="submit">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="  col-lg-8">
                                <div class="card p-3" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                    <table class="table table-striped text-center  table-bordered table_reduced">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="">#</th>
                                                <th scope="col" class="">Name</th>
                                                <th scope="col" class="">Description</th>
                                                <th scope="col" class="">Status</th>
                                                <th scope="col" class="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($types as $key=>$type)
                                            <tr class="text-center">
                                                <td scope="col" class="">{{$key+1}}</td>
                                                <td scope="col" class="">{{$type->name}}</td>
                                                <td scope="col" class="">{{$type->description}}</td>
                                                <td scope="col" class=" ">
                                                    @if($type-> status == 1)
                                                    <div class=" form-switch">
                                                        <input class="form-check-input " type="checkbox" role="switch"
                                                            id="flexSwitchCheckDefault">
                                                        <label class="form-check-label"
                                                            for="flexSwitchCheckDefault"></label>
                                                    <div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn text-light dropdown-toggle " style="background-color: #008080;"
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