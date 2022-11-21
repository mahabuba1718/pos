@extends('backend.master')
@section('content')
<div class="container-fluid px-0">

    <section class="section p-3">
        <div class="section-header d-flex p-3">
            <h3 class="mt-3">Supplier</h3>
        </div>
        <div class="section-body container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <form method="POST" action="{{route('updatesup')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$sup->id}}">
                            <div class="card-header p-3">
                                <h5>Edit Supplier</h5>
                            </div>
                            <div class="card-body">
                                <div class="row p-2">
                                    <div class="form-group col-lg-4">
                                        <label for="name" class="mb-2">
                                            Name
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control mb-4" name="name" placeholder="Name"
                                            for="name" id="name" value="{{$sup->name}}">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="supplier_id" class="mb-2">
                                            Supplier ID
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control mb-4" name="supplier_id" for="supplier_id"
                                        placeholder="Contact ID" id="supplier_id" value="{{$sup->supplier_id}}">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="email" class="mb-2">
                                            Email
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="email" class="form-control mb-4" name="email" placeholder="Email"
                                            for="email" id="email" value="{{$sup->email}}">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="phone" class="mb-2">
                                            Phone
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="tel" class="form-control mb-4" name="phone" placeholder="Phone"
                                            for="phone" id="phone" value="{{$sup->phone}}">
                                        <span class="text-danger"> </span>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="image" class="mb-2">
                                            Image
                                        </label>
                                        <input type="file" class="form-control mb-4" for="image" name="image">
                                        <span class="text-danger"> </span>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <img src="{{'/uploads/supplier/'.$sup->image}}" alt="image" width="200" height="200">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn text-light" type="submit" style="background-color:#25aa9e;">
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