@extends('backend.master')
@section('content')
<div class="container-fluid px-0">
    <section class="container-fluid my-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{url('/pharmacist')}}" class="nav-link {{request()->is('pharmacist') ? 'active' : ''}}" id="pharmacist-tab" type="button" role="tab" aria-controls="pharmacist-tab-pane"
                    aria-selected="true">
                    <i class="fa-solid fa-user-doctor"></i>
                    Pharmacist
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{url('/supplier')}}" class="nav-link {{request()->is('supplier') ? 'active' : ''}}" id="supplier-tab"
                    type="button" role="tab" aria-controls="supplier-tab-pane" aria-selected="false">
                    <i class="fa-solid fa-truck-field"></i>
                    Supplier
                </a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show {{request()->is('pharmacist') ? 'active' : ''}}" id="{{url('/pharmacist')}}" role="tabpanel"
                aria-labelledby="pharmacist-tab" tabindex="0">
                <section class="section p-2">
                    <div class="section-header d-flex p-3">
                        <h3 class="mt-3">Pharmacist</h3>
                        <div class="section-header-breadcrumb d-flex p-3">
                            <div class="breadcrumb-item m-2 ">
                                <a href="{{route('dashboard')}}">Home</a>
                            </div>
                            <div class="m-2">/</div>
                            <div class="m-2">
                                <a href="{{route('contact_supplier')}}">Supplier</a>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid section-body ">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                    <div class="card-header d-flex p-3">
                                        <h4>Pharmacist</h4>
                                        <div class="card-header-form">
                                            <button type="button"  data-bs-toggle="modal"  class="btn text-light" style="background-color: #008080;"
                                                data-bs-target="#myModal">
                                                <i class="fa fa-plus"></i>
                                                Add Pharmacist
                                            </button>
                                        </div>
                                    </div>
                                    <!-- modal -->
                                    <form action="{{route('pharma')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal" id="myModal">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Add Pharmacist
                                                        </h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label for="name" class="mb-2">
                                                                    Name
                                                                    <strong class="text-danger">*</strong>
                                                                </label>
                                                                <input type="text" class="form-control mb-4" name="name"
                                                                    placeholder="Name" for="name" id="name" value="">
                                                                <span class="text-danger"> </span>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label for="contact_id" class="mb-2">
                                                                    Pharmacist ID
                                                                    <strong class="text-danger">*</strong>
                                                                </label>
                                                                <input type="text" class="form-control mb-4"
                                                                    name="contact_id" for="contact_id" placeholder="Contact ID"
                                                                    id="contact_id" value="">
                                                                <span class="text-danger"> </span>
                                                            </div>

                                                            <div class="form-group col-lg-6">
                                                                <label for="email" class="mb-2">
                                                                    Email
                                                                    <strong class="text-danger">*</strong>
                                                                </label>
                                                                <input type="email" class="form-control mb-4" name="email"
                                                                    placeholder="Email" for="email" id="email" value="">
                                                                <span class="text-danger"> </span>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label for="password" class="mb-2">
                                                                    Password
                                                                    <strong class="text-danger">*</strong>
                                                                </label>
                                                                <input type="password" class="form-control mb-4"
                                                                    name="password" placeholder="Password" for="password" id="password"
                                                                    value="">
                                                                <span class="text-danger"> </span>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label for="phone" class="mb-2">
                                                                    Phone
                                                                    <strong class="text-danger">*</strong>
                                                                </label>
                                                                <input type="tel" class="form-control mb-4" name="phone"
                                                                    placeholder="Phone" for="phone" id="phone" value="">
                                                                <span class="text-danger"> </span>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label for="image" class="mb-2">
                                                                    Image
                                                                </label>
                                                                <input type="file" class="form-control mb-4" for="image" name="image">
                                                                <span class="text-danger"> </span>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="submit" class="btn text-light" style="background-color:#25aa9e;">Submit</button>
                                                            <button type="button"  data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- pharmacist history -->
                                    <div class="card-body">
                                        <div class="">
                                            <div class="table_section p-3">
                                                <table class="table table-striped text-center"  style="vertical-align: middle;"   >
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="">#</th>
                                                            <th scope="col" class="">Image</th>
                                                            <th scope="col" class="">Contact ID</th>
                                                            <th scope="col" class="">Name</th>
                                                            <th scope="col" class="">Email</th>
                                                            <th scope="col" class="">Phone</th>
                                                            <th scope="col" class="">Status</th>
                                                            <th scope="col" class="">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($pharma as $key=> $contact)
                                                        @if($contact->role_id ==2 )
                                                        <tr class="text-center">
                                                            <td scope="col" class="">{{$key+1}}</td>
                                                            <td>
                                                                @if($contact->image !=null)
                                                                <img class="" src="{{asset('/uploads/pharmacist/'.$contact->image)}}"  alt="image">
                                                                @else
                                                                <img src="{{asset('assets/backend/img/nouser.webp')}}" alt="image">
                                                                @endif
                                                            </td>
                                                            <td scope="col" class="my-auto">{{$contact-> contact_id}}</td>
                                                            <td scope="col" class="my-auto">{{$contact-> name}}</td>
                                                            <td scope="col" class="">{{$contact-> email}}</td>
                                                            <td scope="col" class="">{{$contact-> phone}}</td>
                                                            <td scope="col" class=" ">
                                                            @if($contact->status == 1)
                                                                <div class=" form-switch">
                                                                    <input class="form-check-input " type="checkbox"
                                                                        role="switch" id="flexSwitchCheckDefault">
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckDefault"></label>
                                                                </div>
                                                                @endif
                                                            </td>


                                                            <td colspan="1">
                                                                <button type="button" class="btn editRow float-right text-light"  style="font-size: 0.7rem; background-color: #008080;"data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom"
                                                                    title="Edit">
                                                                    <a href="{{route('editpharma', $contact->id)}}" class="text-light">
                                                                        <i class="fa-solid fa-pencil"></i>
                                                                    </a>
                                                                </button>
                                                                <button type="button" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom"
                                                                    title="Delete" class="btn btn-danger deleteRow float-right" style="font-size: 0.7rem;">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                                <div class="modal fade" id="myModalp">
                                                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header text-center">
                                                                                <h5 class="modal-title ">
                                                                                   Are Your Sure?
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group col-lg-12 p-2">
                                                                                You Want to Delete This Record?

                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-center">
                                                                                <button class="btn text-light"
                                                                                    style="background-color:#25aa9e;"
                                                                                    type="submit">
                                                                                    <a href="{{route('deletepharma', $contact->id)}}" class="text-light" style="text-decoration: none;">
                                                                                    Yes Delete
                                                                                    </a>
                                                                                </button>

                                                                                <button type="button" data-bs-dismiss="modal"
                                                                                    class="btn btn-danger">
                                                                                    Cancel
                                                                                </button>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endif
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
            <div class="tab-pane fade show {{request()->is('supplier') ? 'active' : ''}}" id="{{url('/supplier')}}" role="tabpanel" aria-labelledby="supplier-tab"
                tabindex="0">
                <section class="section p-2">
                    <div class="section-header d-flex p-3">
                        <h3 class="mt-3">Supplier</h3>
                        <div class="section-header-breadcrumb d-flex p-3">
                            <div class="breadcrumb-item m-2 ">
                                <a href="{{route('dashboard')}}">Home</a>
                            </div>
                            <div class="m-2">/</div>
                            <div class="m-2">
                                <a href="{{route('contact_pharmacist')}}">Pharmacist</a>
                            </div>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                    <div class="card-header d-flex p-3">
                                        <h4>Supplier</h4>
                                        <div class="card-header-form">
                                            <button type="button" class="btn text-light " data-bs-toggle="modal" style="background-color: #008080;"
                                                data-bs-target="#myModal2">
                                                <i class="fa fa-plus"></i>
                                                Add Contact
                                            </button>
                                        </div>
                                    </div>
                                    <form action="{{route('supplier')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal" id="myModal2">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Add Contact
                                                        </h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group ">
                                                                    <label for="name" class="mb-2">
                                                                        Name
                                                                        <strong class="text-danger">*</strong>
                                                                    </label>
                                                                    <input type="text" class="form-control mb-4" name="name"
                                                                        placeholder="Name" id="name" value="">
                                                                    <span class="text-danger"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label for="supplier_id" class="mb-2">
                                                                    Supplier ID
                                                                    <strong class="text-danger">*</strong>
                                                                </label>
                                                                <input type="text" class="form-control mb-4"
                                                                    name="supplier_id" placeholder="Supplier ID"
                                                                    id="supplier_id" value="">
                                                                <span class="text-danger"> </span>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group ">
                                                                    <label for="email" class="mb-2">
                                                                        Email
                                                                        <strong class="text-danger">*</strong>
                                                                    </label>
                                                                    <input type="email" class="form-control mb-4"
                                                                        name="email" placeholder="Email" id="email"
                                                                        value="">
                                                                    <span class="text-danger"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="phone" class="mb-2">
                                                                        Phone
                                                                        <strong class="text-danger">*</strong>
                                                                    </label>
                                                                    <input type="tel" class="form-control mb-4" name="phone"
                                                                        placeholder="Phone" id="phone" value="">
                                                                    <span class="text-danger"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group ">
                                                                    <label for="image" class="mb-2">
                                                                        Image
                                                                    </label>
                                                                    <input for="image" type="file" class="form-control mb-4"
                                                                        name="image">
                                                                    <span class="text-danger"> </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="submit" class="btn text-light" style="background-color:#25aa9e;">Submit</button>
                                                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-body">
                                        <div class="">
                                            <div class="table_section p-3">
                                                <table class="table table-striped text-center" style="vertical-align: middle;" >
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="">#</th>
                                                            <th scope="col" class="">Image</th>
                                                            <th scope="col" class="">Name</th>
                                                            <th scope="col" class="">Supplier ID</th>
                                                            <th scope="col" class="">Email</th>
                                                            <th scope="col" class="">Phone</th>
                                                            <th scope="col" class="">Status</th>
                                                            <th scope="col" class="">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($supplier as $key=> $supplied)
                                                        <tr class="text-center">
                                                            <td scope="col" class="">{{$key+1}}</td>
                                                            <td>
                                                                @if($supplied->image !=null)
                                                                <img class="" src="{{asset('/uploads/supplier/'.$supplied->image)}}" alt="image">
                                                                @else
                                                                <img src="{{asset('assets/backend/img/nouser.webp')}}" alt="image">
                                                                @endif
                                                            </td>
                                                            <td scope="col" class="my-auto">{{$supplied->name}}</td>
                                                            <td scope="col" class="my-auto">{{$supplied->supplier_id}}</td>
                                                            <td scope="col" class="">{{$supplied->email}}</td>
                                                            <td scope="col" class="">{{$supplied->phone}}</td>
                                                            <td scope="col" class=" ">
                                                                @if($supplied->status == 1)
                                                                <div class=" form-switch">
                                                                    <input class="form-check-input " type="checkbox"
                                                                        role="switch" id="flexSwitchCheckDefault">
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckDefault"></label>
                                                                <div>
                                                                @endif    
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn editRow float-right text-light"  style="font-size: 0.7rem; background-color: #008080;"data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom"
                                                                    title="Edit">
                                                                    <a href="{{route('editsup', $supplied->id)}}"  class="text-light">
                                                                        <i class="fa-solid fa-pencil"></i>
                                                                    </a>
                                                                </button>
                                                                <button type="button" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom"
                                                                    title="Delete" class="btn btn-danger deleteRow2 float-right" style="font-size: 0.7rem;">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                                <div class="modal fade" id="myModals">
                                                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header text-center">
                                                                                <h5 class="modal-title ">
                                                                                   Are Your Sure?
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group col-lg-12 p-2">
                                                                                You Want to Delete This Record?

                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-center">
                                                                                <button class="btn text-light"
                                                                                    style="background-color:#25aa9e;"
                                                                                    type="submit">
                                                                                    <a href="{{route('deletesup', $supplied->id)}}"  class="text-light" style="text-decoration: none;">
                                                                                    Yes Delete
                                                                                    </a>
                                                                                </button>
                                                                                <button type="button" data-bs-dismiss="modal"
                                                                                    class="btn btn-danger">
                                                                                    Cancel
                                                                                </button>

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
        </div>
    </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
@endsection
@push('custom_script')
<script>
$(document).on('click', '.deleteRow', function() {
    var update_id = $(this).val();
    // alert(update_id);
    $("#myModalp").modal('show');

    $.ajax({
        type: "GET",
        url: "/deleteRow/" + update_id,
        success: function(response) {
            $("#pharm_id").val(update_id);
        }
    });
});

$(document).on('click', '.deleteRow2', function() {
    var update_id = $(this).val();
    // alert(update_id);
    $("#myModals").modal('show');

    $.ajax({
        type: "GET",
        url: "/deleteRow2/" + update_id,
        success: function(response) {
            $("#sup_id").val(update_id);
        }
    });
});
</script>
@endpush