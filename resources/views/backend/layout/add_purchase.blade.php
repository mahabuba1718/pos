@extends('backend.master')
@section('content')
<div class="container-fluid px-0">
    <section class="section container-fluid my-3">
        <div class="section-header d-flex p-3">
            <h3 class="mt-3">Purchase</h3>
            <div class="section-header-breadcrumb d-flex p-3">
                <div class="breadcrumb-item m-2 ">
                    <a href="{{route('dashboard')}}">Home</a>
                </div>
                <div class="m-2">/</div>
                <div class="m-2">
                    <a href="{{route('purchase')}}">Purchase</a>
                </div>
                <div class="m-2">/</div>
                <div class="m-2">
                    <a href="{{route('medicine')}}">Medicine</a>
                </div>
            </div>
        </div>
        <div class="section-body container-fluid">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <form method="POST" action="{{route('adpurchase')}}">
                            @csrf
                            <div class="card-header p-3">
                                <h4>Add Purchase</h4>
                            </div>
                            <div class="card-body">
                                <div class="row p-2">
                                    <div class="form-group col-lg-3">
                                        <label for="date" class="mb-2">
                                            Date
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input class="form-control mb-4" type="date" name="date" id="date" />
                                        <span class="text-danger"> </span>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="time" class="mb-2">
                                            Time
                                            <strong class="text-danger"> </strong>
                                        </label>
                                        <input class="form-control mb-4" type="time" name="time" id="time" />
                                        <span class="text-danger"> </span>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="supplier" class="mb-2">
                                            Supplier
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <select class="form-select mb-4" for="supplier" name="supplier" id="supplier">
                                            <option selected>Select One</option>
                                            @foreach($supplier as $key=> $supplied)
                                            <option value="{{$supplied->supplier_id}}">{{$supplied->supplier_id}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"> </span>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="purchase_no" class="mb-2">
                                            Purchase No.
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control mb-4" for="purchase_no" name="purchase_no"
                                            placeholder="PO-01" id="purchase_no" value="">
                                        <span class="text-danger"> </span>
                                    </div>
                                </div>
                            </div>
                      
                            <div class="container-fluid">
                                <div class="card-header d-flex p-2">
                                    <h4>Purchase Medicine</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class=" table_section p-3">
                                        <table id="table1" class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="" width="5%">#</th>
                                                    <th scope="col" class="" width="17%">Medicine</th>
                                                    <th scope="col" class="" width="14%">Expiry Date</th>
                                                    <th scope="col" class="" width="13%">Batch ID</th>
                                                    <th scope="col" class="" width="11%">Price</th>
                                                    <th scope="col" class="" width="11%">Quantity</th>
                                                    <th scope="col" class="" width="11%">Sub Total</th>
                                                    <th scope="col" class="" width="9%">Add</th>
                                                    <th scope="col" class="" width="9%">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="1" class="tbl_id"  >1</td>
                                                    <td colspan="1" class="">
                                                        <select class="form-select" name="medicine[]" id="medicine">
                                                            <option>Select One</option>
                                                            @foreach($admedicine as $key => $medicine)
                                                            <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td colspan="1" class="">
                                                    
                                                        <input class="form-control" type="date" for="expire_date" name="expire_date[]" id="expire_date" />
                                                    </td>
                                                    <td colspan="1" class="">
                                                        <div class="input-group">
                                                        <label for="batch_id" class="mb-2"></label>
                                                            <input type="text" name="batch_id[]" for="batch_id" placeholder="BI-01"
                                                                class="form-control batch_id">
                                                        </div>
                                                    </td>
                                                    <td colspan="1">
                                                        <div class="input-group">
                                                        <label for="price" class="mb-2"></label>
                                                            <input type="number"  step="0.1" min="0.1" id="price" value="{{}}" name="price[]"
                                                                class="form-control total_amount" readonly>
                                                        </div>
                                                    </td>
                                                    <td colspan="1">
                                                        <div class="input-group">
                                                        <label for="quantity" class="mb-2"></label>
                                                            <input type="number" step="1" min="1" id="quantity" name="quantity[]"
                                                                class="form-control vat_amount" value="">
                                                        </div>
                                                    </td>
                                                    <td colspan="1">
                                                        <input type="number" step="0.1" min="0.1" id="sub_total" name="sub_total[]"
                                                            class="form-control sub_total border-0" readonly>
                                                    </td>
                                                    <td colspan="1">
                                                    
                                                    <input type="button" value=" + " class="text-light border-0 m-2 rounded-2"  onclick="ob_adRows.addRow(this)" style="background-color:#25aa9e; " />
                                                        <!-- <i class="fa fa-plus"></i> -->
                                                    </td>
                                                    <td colspan="1">
                                                    <input type="button" value=" - " class="text-light border-0 m-2 bg-danger  rounded-2" onclick="ob_adRows.delRow(this)"  />
                                                    <!-- <i class="fa-solid fa-trash"></i> -->
                                                    
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td colspan="6" style="text-align: end;" >Net Total</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="number" min="1" name="net_total"
                                                                class="form-control net_total" readonly>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr >
                                                    <td colspan="6" style="text-align: end;" >Vat(5%)</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="number" min="0" name="vat" id="vat"
                                                                class="form-control vat" value="" readonly>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" style="text-align: end;" >Discount</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="number" step="0" min="0" name="discount_amount" id="discount_amount"
                                                                class="form-control discount_amount" value="">
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" style="text-align: end;" >Total</td>
                                                    <td>
                                                        <input type="number" step="0.1" min="0.1" name="total_amount" id="total_amount"
                                                            class="form-control total_amount border-0" value="" readonly>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr >
                                                    <td colspan="6" style="text-align: end;" >Paid</td>
                                                    <td>
                                                        <input type="number" step="0.1" min="0.1" name="paid_amount"
                                                            class="form-control paid_amount border-0" id="paid_amount">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr >
                                                    <td colspan="6" style="text-align: end;" >Change Amount</td>
                                                    <td>
                                                        <input type="number" step="0" min="0" name="change_amount" id="change_amount"
                                                            class="form-control change_amount border-0" readonly>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr >
                                                    <td colspan="6" style="text-align: end;" >Due</td>
                                                    <td>
                                                        <input type="number" step="0" min="0" name="due_amount" id="due_amount"
                                                            class="form-control due_amount border-0" readonly>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="form-group col-lg-12 p-2" >
                                            <label for="description" class="mb-2" >
                                                Description
                                                <strong class="text-danger"> </strong>
                                            </label>
                                            <textarea class="form-control mb-4" for="description" name="description" id="description"
                                                placeholder="Please add details, about the Purchase"></textarea>
                                            <span class="text-danger"> </span>
                                        </div>
                                        <tfoot>
                                            <div class="card-footer text-center">
                                                <button class="btn text-light" style="background-color:#25aa9e;"
                                                    type="submit">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </tfoot>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>


@endsection

@push('custom_script')
<script>

  //JS class to add/delete rows in html table - https://coursesweb.net/javascript/ 
    //receives table id
    function adRowsTable(id) {
        var table = document.getElementById(id);
        var me = this;
        if (document.getElementById(id)) {
            var row1 = table.rows[1].outerHTML;

            //adds index-id in cols with class .tbl_id
            function setIds() {
                var tbl_id = document.querySelectorAll('#' + id + ' .tbl_id');
                for (var i = 0; i < tbl_id.length; i++) tbl_id[i].innerHTML = i + 1;
            }

            //add row after clicked row; receives clicked button in row
            me.addRow = function(btn) {
                btn ? btn.parentNode.parentNode.insertAdjacentHTML('afterend', row1) : table.insertAdjacentHTML(
                    'beforeend', row1);
                setIds();
            }

            //delete clicked row; receives clicked button in row
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

<script>
    $(document).ready(function(){
        $(document).on('change','#medicine',function(){
            var $option = $(this).find('option:selected');
            var value = $option.val();
            $.ajax({
                type: "GET",
                url: "/purchase/find_med/" + value,
                success: function(response) {
                    $("#price").val(response.med.purchaseprice);
                }
            }); 
        });

        $(document).on('change','#quantity',function(){
            var qty = $(this).val();
            var price = $("#price").val();
            var sub_total = price * qty;
            var vat = (parseInt(sub_total)*5)/100;
            // console.log(qty,price,sub_total);
            $("#sub_total").val(sub_total);
            $("#vat").val(vat);
        });

        $(document).on('change','#discount_amount',function(){
            var discount = $(this).val();
            var sub_total = $("#sub_total").val();
            var vat = $("#vat").val();
            var total = (parseFloat(sub_total) + parseFloat(vat)) - discount;
            $("#total_amount").val(total);
        });

        $(document).on('change','#paid_amount',function(){
            var paid_amount = parseFloat($(this).val());
            var total = parseFloat($("#total_amount").val());
            if(total < paid_amount){
                var change = paid_amount - total;
                $("#change_amount").val(change);
                $("#due_amount").val('0');
            }else{
                var due = total - paid_amount;
                $("#due_amount").val(due.toFixed(2));
                $("#change_amount").val('0');
            }
        });
    });
</script>

@endpush