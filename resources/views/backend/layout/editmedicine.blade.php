@extends('backend.master')
@section('content')
<div class="container-fluid px-0">

    <section class="section p-3">
        <div class="section-header d-flex p-3">
            <h3 class="mt-3">Medicine</h3>
        </div>
        <div class="section-body container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <div class="card-header p-3">
                            <h5>Edit Medicine</h5>
                        </div>
                        <form method="POST" action="{{route('updatemedicine')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="medicine_id" value="{{$med->id}}">
                            <div class="card-body">
                                <div class="row p-2">
                                    <div class="form-group col-lg-4">
                                        <label for="name" class="mb-2">
                                            Name
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control mb-4" name="name" placeholder="Name"
                                            id="name" value="{{$med->name}}">
                                        <span class="text-danger"> </span>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="genericname" class="mb-2">
                                            Genericname
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control mb-4" name="genericname" placeholder="Name"
                                            id="genericname" value="{{$med->genericname}}">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="category" class="mb-2">
                                            Cetagory
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <select class="form-select mb-4" name="category" id="category" value="">
                                            <option selected>Select One</option>
                                            @foreach($categories as $key=>$category )
                                            <option value="{{$category->id}}"
                                                {{ $med->category_id == $category->id ? 'selected' : ''}}>
                                                {{$category->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="type" class="mb-2">
                                            Type
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <select class="form-select mb-4" name="type" id="type" value="">
                                            <option selected>Select One</option>
                                            @foreach($types as $key=>$type)
                                            <option value="{{$type->id}}" {{$med->type_id == $type->id ? 'selected' : ''}}>
                                                {{$type->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="unit" class="mb-2">
                                            Unit
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <select class="form-select mb-4" name="unit" id="unit" value="">
                                            <option selected>Select One</option>
                                            @foreach($units as $key=>$unit)
                                            <option value="{{$unit->id}}" {{$med->unit_id == $unit->id ? 'selected' : ''}}>
                                                {{$unit->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"> </span>
                                    </div>


                                    <div class="form-group col-lg-4">
                                        <label for="price" class="mb-2">
                                            Price
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="number" class="form-control mb-4" name="price" placeholder="Price"
                                            id="price" value="{{$med->price}}" min="1">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="purchaseprice" class="mb-2">
                                            Purchase Price
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="number" class="form-control mb-4" name="purchaseprice"
                                            placeholder="Purchase Price" id="purchaseprice" value="{{$med->purchaseprice}}"
                                            min="1">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="image" class="mb-2">
                                            Image
                                        </label>
                                        <input type="file" class="form-control mb-4" name="image">
                                        <span class="text-danger"> </span>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <img src="{{'/uploads/medicine/'.$med->image}}" alt="image" width="100">
                                    </div>

                                </div>

                                <div class="form-group col-lg-12 p-2">
                                    <label for="description" class="mb-2">
                                        Description
                                        <strong class="text-danger"> </strong>
                                    </label>
                                    <textarea class="form-control mb-4" name="description" id="description"
                                        placeholder="Please add details of the Medicine">{{$med->description}}</textarea>
                                    <span class="text-danger"> </span>
                                </div>

                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn text-light" style="background-color:#25aa9e;">
                                    Save Changes
                                </button>
                            </div>
                        </form>
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