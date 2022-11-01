<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add more</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-dark">
    <table id="table1" border="1">
        <tr>
            <th>ID</th>
            <th>Col-1</th>
            <th>Col-2</th>
            <th>Delete</th>
            <th>Add Rows</th>
        </tr>
        <tr>
            <td class="tbl_id">1</td>
            <td><input type="text" name="tm1[]" /></td>
            <td><input type="text" name="nm2[]" /></td>
            <td><input type="button" value="Delete" onclick="ob_adRows.delRow(this)" /></td>
            <td><input type="button" value="Add Row" onclick="ob_adRows.addRow(this)" /></td>
        </tr>
    </table>
    <div>
        <input type="button" value="Add Row at end" onclick="ob_adRows.addRow()" /></div>
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
    <!-- <div class="container">
        <div class="row my-4">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Add Items</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="#" method=" POST" id="add_form">
                            <div class="show-item">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="product_name[]" class="form-control" placeholder="Item-name" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="product_price[]" class="form-control" placeholder="Item-price" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="product_qty[]" class="form-control" placeholder="Item QTY" required>
                                    </div>

                                    <div class="col-md-2 mb-2 d-grid">
                                        <button class="btn btn-success add_item_btn">
                                            Add More
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" value="Add" class="btn btn-danger w-25" id="add_btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" ></script>
    <script>
        $(document).ready(function()
        {
        $(".add_item_btn").click(function(e)
        {
            e.preventDefault();
            $("#show_item").prepend(` <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="product_name[]" class="form-control" placeholder="Item-name" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="product_price[]" class="form-control" placeholder="Item-price" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="product_qty[]" class="form-control" placeholder="Item QTY" required>
                                    </div>

                                    <div class="col-md-2 mb-2 d-grid">
                                        <button class="btn btn-success remove_item_btn">
                                           Remove
                                        </button>
                                    </div>
                                </div>`)
        }
        );

        $(document).on('click', '.remove_item_btn', function(e)
        {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });
        $("#add_form").submit(function(e)
        {
            e.preventDefault();
            $("#add_btn").val('Adding...');
            s.$.ajax({
                type: "method",
                url: "action.php",
                data: $(this).serialize(),
                method: 'post',
                dataType: "dataType",
                success: function (response) {
                    console.log(response);
                }
            });
        });
         });
    </script> -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>

</html>