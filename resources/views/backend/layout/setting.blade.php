@extends('backend.master')
@section('content')
<div class="container-fluid px-0">
    <section class="section p-3">
        <div class="section-header d-flex p-3">
            <h3 class="mt-3">Setting</h3>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form method="POST" action="{{route('change')}}">
                            @csrf
                            <div class="card-header p-3">
                                <h4>Setting</h4>
                            </div>
                            <div class="card-body">
                                <div class="row p-2">
                                    <div class="form-group col-lg-4">
                                        <label for="sitename" class="mb-2">
                                            Site Name
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control mb-4" for="sitename" name="sitename"
                                            placeholder="Sitename" id="sitename" value="">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="pharmacyname" class="mb-2">
                                            Pharmacy Name
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control mb-4" for="pharmacyname" name="pharmacyname"
                                            placeholder="Pharmacy Name" id="pharmacyname" value="">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="email" class="mb-2">
                                            Email
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="email" class="form-control mb-4" for="email" name="email" placeholder="Email"
                                            id="email" value="">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="phone" class="mb-2">
                                            Phone
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="tel" class="form-control mb-4" for="phone" name="phone" placeholder="Phone"
                                            id="phone" value="">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="logo" class="mb-2">
                                            Logo
                                        </label>
                                        <input type="file" class="form-control mb-4" for="logo" name="logo">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="favicon" class="mb-2">
                                            Favicon
                                        </label>
                                        <input type="file" class="form-control mb-4" for="favicon" name="favicon">
                                        <span class="text-danger"> </span>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="address" class="mb-2">
                                            Address
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="tel" class="form-control mb-4" for="address" name="address" placeholder="Address"
                                            id="address" value="">
                                        <span class="text-danger"> </span>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn text-light" style="background-color:#25aa9e;" type="submit">
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