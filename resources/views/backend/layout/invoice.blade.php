@extends('backend.master')
@section('content')
<style>
@media (min-width: 1200px)
{
    .col-xl-6 {
        flex: 0 0 auto;
        width: 85%;
}
}

</style>



<!-- Container -->
<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card">
                <div class="card-body">

                    <!-- Header -->
                    <header>
                        <div class="row align-items-center">
                            <div class="col-sm-7 text-center text-sm-start mb-3 mb-sm-0">
                                <img id="logo" src="assets/backend/img/medi.png" style="width: 100px;" title="Logo"
                                    alt="logo" />
                                <h4>Medicine POS</h4>
                            </div>
                            <div class="col-sm-5 text-center text-sm-end">
                                <h4 class="text-7 mb-0">Invoice</h4>
                            </div>
                        </div>
                        <hr>
                    </header>

                    <!-- Main Content -->
                    <main>
                        <div class="row">
                            <div class="col-sm-6"><strong>Date:</strong> 05/12/2020</div>
                            <div class="col-sm-6 text-sm-end"> <strong>Invoice No:</strong> 16835</div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 text-sm-end order-sm-1"> <strong>Pay To:</strong>
                                <address>
                                    Uttara Dhaka<br />
                                    Joynal Market<br />
                                    T.I.C Colony<br />
                                    contact@pharma.com
                                </address>
                            </div>
                            <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
                                <address>
                                    Customer<br />
                                    Uttara Dhaka<br />
                                    Sector-10<br />
                                    Kamarpara
                                </address>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="card-header">
                                            <tr>
                                                <td class="col-1"><strong>#</strong></td>
                                                <td class="col-3"><strong>Medicine</strong></td>
                                                <td class="col-2 text-center"><strong>QTY</strong></td>
                                                <td class="col-2 text-center"><strong>Unit Price</strong></td>
                                                <td class="col-2 text-center"><strong>Price</strong></td>
                                                <td class="col-2 text-end"><strong>Total</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="col-1">1</td>
                                                <td class="col-3 text-1">Napa</td>
                                                <td class="col-2 text-center">20</td>
                                                <td class="col-2 text-center">5</td>
                                                <td class="col-2 text-center">100</td>
                                                <td class="col-2 text-end">100</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="text-1">Napa Extra </td>
                                                <td class="text-center">10</td>
                                                <td class="text-center">6</td>
                                                <td class="text-center">150</td>
                                                <td class="text-end">150</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="card-footer">
                                            <tr>
                                                <td colspan="5" class="text-end border-bottom-0"><strong>Sub
                                                        Total:</strong>
                                                </td>
                                                <td class="text-end border-bottom-0">250.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-end border-bottom-0"><strong>Vat:</strong>
                                                </td>
                                                <td class="text-end border-bottom-0">5.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-end border-bottom-0">
                                                    <strong>Discount:</strong></td>
                                                <td class="text-end border-bottom-0">0.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-end border-bottom-0"><strong>Total:</strong>
                                                </td>
                                                <td class="text-end border-bottom-0">255.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-end border-bottom-0"><strong>Paid:</strong>
                                                </td>
                                                <td class="text-end border-bottom-0">260.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-end"><strong>Change Amount:</strong></td>
                                                <td class="text-end ">5.00</td>

                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-end border-bottom-0"><strong>Due:</strong>
                                                </td>
                                                <td class="text-end border-bottom-0">0.00</td>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </main>
                    <!-- Footer -->
                    <footer class="text-start mt-4">
                        <p class="text-1"><strong>Tk :</strong> Two Hundred Fifty Five Taka Only.</p>
                        <p class="text-1"><strong>NB :</strong> Wish Your Good Health.</p>
                        <div class="text-center">
                            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                                    class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i>
                                    Print</a>
                                <a href="" class="btn btn-light border text-black-50 shadow-none"><i
                                        class="fa fa-download"></i>
                                    Download</a>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection