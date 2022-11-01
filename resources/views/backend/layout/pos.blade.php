@extends('backend.master')
@section('content')
<!-- <style>
            .mr-2{
                margin-left: 0.5rem !important;
            }
        </style> -->

<div class="container-fluid px-0">
    <section class="section p-3">
        <div class="section-header d-flex p-3">
            <h2 class="mt-3">POS</h2>
            <div class="section-header-breadcrumb d-flex p-3">
                <div class="breadcrumb-item m-2 ">
                    <a href="{{route('dashboard')}}">Home</a>
                </div>
                <div class="m-2">/</div>
                <div class="m-2">
                    <a href="{{route('possale')}}">POS Sale</a>
                </div>
                <div class="m-2">/</div>
                <div class="m-2">
                    <a href="{{route('medicine')}}">Medicine</a>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="from-group">
                                <input class="form-control mb-3" type="text" placeholder="Enter Medicine Name"
                                    name="medicine_name">
                                <div class="row pos_div">
                                    @foreach($medicines as $medicine)
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                                        <div class="card">
                                            <img class="card-img-top" src="" alt="image">
                                            <div class="card-body">
                                                <h6 class="card-title ">
                                                    {{$medicine->name}}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                                        <div class="card">
                                            <img class="card-img-top" src="" alt="image">
                                            <div class="card-body">
                                                <h6 class="card-title ">
                                                    Medicine
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                                        <div class="card">
                                            <img class="card-img-top" src="" alt="image">
                                            <div class="card-body">
                                                <h6 class="card-title ">
                                                    Medicine
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                                        <div class="card">
                                            <img class="card-img-top" src="" alt="image">
                                            <div class="card-body">
                                                <h6 class="card-title ">
                                                    Medicine
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                                        <div class="card">
                                            <img class="card-img-top" src="" alt="image">
                                            <div class="card-body">
                                                <h6 class="card-title ">
                                                    Medicine
                                                </h6>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="purchase" value="0">
                </div>
            
                <div class="col-lg-6 ">
                    <form action="" method="post">

                        <div class="card">
                            <div class="card-header">
                                <div class="form-group">
                                    <select name="contact_id" id="contact_id" class="form-control">
                                        <option value="1">Walk In Customer</option>
                                        <option value="2">Customer</option>
                                        <option value="4">Mahabuba</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table ">
                                    <table id="table1" class="table table-bordered pos_table table_reduced">
                                        <thead>
                                            <tr>
                                                <th scope="col">Medicine</th>
                                                <th scope="col">QTY</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Sub Total</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>

                                                <td colspan="1">
                                                    <div class="input-group">
                                                        <input type="number" step="1" min="1" name="quantity"
                                                            class="form-control vat_amount">
                                                    </div>
                                                </td>

                                                <td colspan="1">
                                                    <div class="input-group">
                                                        <input type="number" step="0.1" min="0.1" name="price"
                                                            class="form-control vat_amount">
                                                    </div>
                                                </td>

                                                <td colspan="1">
                                                    <input type="number" step="0.1" readonly value="0" name="net_total"
                                                        class="form-control net_total border-0" placeholder="Net Total">
                                                </td>
                                                <td colspan="1">
                                                    <input type="button" value=" - "
                                                        class="text-light border-0 m-2 bg-danger  rounded-2"
                                                        onclick="ob_adRows.delRow(this)" />
                                                    <!-- <i class="fa-solid fa-trash"></i> -->

                                                </td>
                                            </tr>
                                            <tr>

                                                <td colspan="3" style="text-align: end;">Net Total</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="number" readonly value="0" name="net_total"
                                                            class="form-control sub_total border-0" placeholder="Net Total">
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>

                                                <td colspan="3" style="text-align: end;">Vat</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="number" min="0.1" name="net_total"
                                                            class="form-control vat_amount">
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: end;">Discount</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="number" step="0.1" min="0.1" name="discount_amount"
                                                            class="form-control discoount_amount">
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: end;">Total</td>
                                                <td>
                                                    <input type="number" step="0.1" value="0" readonly name="total_amount"
                                                        name="total_amount" class="form-control total_amount border-0"
                                                        placeholder="Total">
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: end;">Paid</td>
                                                <td>
                                                    <input type="number" step="0.1" value="0" readonly name="paid_amount"
                                                        name="paid_amount" class="form-control paid_amount border-0"
                                                        placeholder="Paid">
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: end;">Change Amount</td>
                                                <td>
                                                    <input type="number" step="0.1" value="0" readonly name="change_amount"
                                                        name="change_amount" class="form-control change_amount border-0"
                                                        placeholder="change_amount">
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: end;">Due</td>
                                                <td>
                                                    <input type="number" step="0.1" value="0" readonly name="due_amount"
                                                        name="due_amount" class="form-control due_amount border-0"
                                                        placeholder="Due">
                                                </td>
                                                <td></td>
                                            </tr>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pb-3">
                                <a href="#" class="btn btn-danger mr-2">
                                    Cancel
                                </a>
                                <button class="btn btn-success mr-2" type="submit">Pay Now</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
//JS class to add/delete rows in html table - https://coursesweb.net/javascript/ 
//receives table id
function adRowsTable(id) {
    var table = document.getElementById(id);
    var me = this;
    if (document.getElementById(id)) {
        var row1 = table.rows[1].outerHTML;

        me.delRow = function(btn) {
            btn.parentNode.parentNode.outerHTML = '';
            setIds();
        }
    }
}

//create object of adRowsTable(), pass the table id
var ob_adRows = new adRowsTable('table1');
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>

@endsection