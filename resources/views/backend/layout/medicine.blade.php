@extends('backend.master')
@section('content')
<style>
    .m-1{
        margin: 0.1rem!important;
    }
    .p-1{
        padding: 1rem!important;
    }
    .p-2{
        padding: 2rem!important;
    }
</style>
<div class="container-fluid px-0">

    <section class="section p-3">
        <div class="section-header d-flex p-3">
            <h3 class="mt-3">Medicine</h3>
            <div class="section-header-breadcrumb d-flex p-3">
                <div class="breadcrumb-item m-2 ">
                    <a href="{{route('dashboard')}}">Home</a>
                </div>
                <div class="m-2">/</div>
                <div class="m-2">
                    <a href="{{route('category')}}">Add Category</a>
                </div>
                <div class="m-2">/</div>
                <div class="m-2">
                    <a href="{{route('purchase')}}">Purchase</a>
                </div>
            </div>
        </div>
        <div class="section-body container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <div class="card-header d-flex p-3">
                            <h4>Medicine</h4>
                            <div class="card-header-form">
                                <button type="button" class="btn text-light" style="background-color: #008080;"
                                    data-bs-toggle="modal" data-bs-target="#myModal">
                                    <i class="fa fa-plus"></i>
                                    Add Medicine
                                </button>
                            </div>
                        </div>
                        <form action="{{route('admedicine')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal" id="myModal">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                Add Medicine
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="name" class="mb-2">
                                                            Name
                                                            <strong class="text-danger">*</strong>
                                                        </label>
                                                        <input type="text" class="form-control mb-4" name="name"
                                                            placeholder="Name" id="name" value="">
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="genericname" class="mb-2">
                                                            Genericname
                                                            <strong class="text-danger">*</strong>
                                                        </label>
                                                        <input type="text" class="form-control mb-4" name="genericname"
                                                            placeholder="Name" id="genericname" value="">
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group ">
                                                        <label for="category" class="mb-2">
                                                            Cetagory
                                                            <strong class="text-danger">*</strong>
                                                        </label>
                                                        <select class="form-select mb-4" name="category_id"
                                                            id="category">

                                                            <option selected>Select One</option>
                                                            @foreach($categories as $key=>$category )
                                                            <option value="{{$category->id}}">{{$category->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="unit" class="mb-2">
                                                            Unit
                                                            <strong class="text-danger">*</strong>
                                                        </label>
                                                        <select class="form-select mb-4" name="unit_id" id="unit">
                                                            <option selected>Select One</option>
                                                            @foreach($units as $key=>$unit)
                                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group ">
                                                        <label for="type" class="mb-2">
                                                            Type
                                                            <strong class="text-danger">*</strong>
                                                        </label>
                                                        <select class="form-select mb-4" name="type_id" id="type">
                                                            <option selected>Select One</option>
                                                            @foreach($types as $key=>$type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group ">
                                                        <label for="price" class="mb-2">
                                                            Price
                                                            <strong class="text-danger">*</strong>
                                                        </label>
                                                        <input type="number" class="form-control mb-4" name="price"
                                                            placeholder="Price" id="price" value="" min="1">
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group ">
                                                        <label for="purchaseprice" class="mb-2">
                                                            Purchase Price
                                                            <strong class="text-danger">*</strong>
                                                        </label>
                                                        <input type="number" class="form-control mb-4"
                                                            name="purchaseprice" placeholder="Purchase Price"
                                                            id="purchaseprice" value="" min="1">
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group ">
                                                        <label class="mb-2" for="image">
                                                            Image
                                                        </label>
                                                        <input type="file" class="form-control mb-4" name="image">
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group ">
                                                        <label for="description" class="mb-2">
                                                            Description
                                                            <strong class="text-danger"> </strong>
                                                        </label>
                                                        <textarea class="form-control mb-4" name="description"
                                                            id="description"
                                                            placeholder="Please add details of the Medicine"></textarea>
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="submit" class="btn text-light"
                                                style="background-color:#25aa9e;">Submit</button>
                                            <button type="button"  data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-body">
                            <div class="">
                                <div class="table_section p-3">
                                    <table class="table table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="" width="5%">#</th>
                                                <th scope="col" class="" width="9%">Image</th>
                                                <th scope="col" class="" width="7%">Name</th>
                                                <th scope="col" class="" width="12%">Generic Name</th>
                                                <th scope="col" class="" width="9%">Category</th>
                                                <th scope="col" class="" width="8%">Unit</th>
                                                <th scope="col" class="" width="9%">Type</th>
                                                <th scope="col" class="" width="9%">Price(BDT)</th>
                                                <th scope="col" class="" width="9%">Purchase Price(BDT)</th>
                                                <th scope="col" class="" width="7%">Status</th>
                                                <th scope="col" class="" width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($admedicine as $key=> $medicine)
                                            <tr class="text-center">
                                                <td scope="col" class="">{{$key+1}}</td>
                                                <td>
                                                    @if($medicine->image != null)
                                                    <img class="" src="{{asset('/uploads/medicine/'.$medicine->image)}}" alt="image">
                                                    @endif
                                                </td>
                                                <td scope="col" class="">{{$medicine->name}}</td>
                                                <td scope="col" class="">{{$medicine->genericname}} </td>
                                                <td scope="col" class="">{{$medicine->category->name}}</td>
                                                <td scope="col" class="">{{$medicine->unit->name}}</td>
                                                <td scope="col" class="">{{$medicine->type->name}}</td>
                                                <td scope="col" class="">{{$medicine->price}}</td>
                                                <td scope="col" class="">{{$medicine->purchaseprice}}</td>
                                                <td scope="col" class=" ">
                                                    @if($medicine->status == 1)
                                                    <div class=" form-switch">
                                                        <input class="form-check-input " type="checkbox" role="switch"
                                                            id="flexSwitchCheckDefault">
                                                        <label class="form-check-label"
                                                            for="flexSwitchCheckDefault"></label>
                                                    </div>
                                                    @endif
                                                </td>
                                                <td scope="col" class="p-1" style="display: flex; flex-wrap: nowrap;">
                                                <button type="button" class="m-1 btn editRow float-right text-light"
                                                        style="font-size: 0.7rem; background-color: #7fa390"
                                                        data-bs-toggle="modal" data-bs-target="#myModal1">                                                    
                                                            <i class="fa-solid fa-eye"></i>
                                                    </button>
                                                <div>
                                                    
                                                    <div class="modal" id="myModal1">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">
                                                                        Medicine Description
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p align="justify">Napa® (Paracetamol) is a fast acting and safe analgesic with marked antipyretic property.

                                                                    It is recommended for the treatment of most painful and febrile conditions, such as headache, toothache, backache, rheumatic and muscle pains, dysmenorrhoea, sore throat, and for relieving the fever, aches and pains of colds and flu.</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                   
                                                                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <button type="button" class="m-1 btn editRow float-right text-light"
                                                        style="font-size: 0.7rem; background-color: #008080;"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Edit">
                                                        <a href="{{route('editmedicine',$medicine->id)}}" class="text-light">
                                                            <i class="fa-solid fa-pencil"></i>
                                                        </a>
                                                    </button>
                                                    <button type="button" class="m-1 btn btn-danger deleteRow float-right"
                                                        style="font-size: 0.7rem;" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Delete"
                                                        >
                                                        <a href="{{route('deletemedicine',$medicine->id)}}" class="text-light">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </button>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
@endsection