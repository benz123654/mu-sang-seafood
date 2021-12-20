<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
        <div class="container" style="font-family: 'Fahkwang', sans-serif;"><div>
        <input type="hidden" id="hfRowIndex" value="" />
        <h1 align=center class = "Bgarea">Mu sang yeaw Seafood</h1>
        <table class="table">
                <tr>
                    <td><input type="text" class="form-control" id="txtId" placeholder="id "/></td>
                    <td><input type="text" class="form-control" id="txtName" placeholder="Menu" /></td>
                    <td><input type="text" class="form-control" id="txtPrice" placeholder="Price - Rates"/></td>
                    <td>
                        <button class="btn btn-primary" type='button' id='btnAdd'>Add</button>
                        <button class="btn btn-primary" type='button' id='btnUpdate'
                            style="display: none;">Update</button>
                        <button class="btn btn-danger" type='button' id='btnClear'>Clear</button>
                    </td>
                </tr>
        </table>
        <table id="tblCustomers" class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price - Rates</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</body>

<script>
    $(function () {
        $('#btnAdd').on('click', function () {
            var name, Price, id;
            id = $("#txtId").val();
            name = $("#txtName").val();
            Price = $("#txtPrice").val();

            var edit = "<a class='edit' href='JavaScript:void(0);' >Edit</a>";
            var del = "<a class='delete' href='JavaScript:void(0);'>Delete</a>";

            if (name == "" || Price == "") {
                alert("Name and Country fields required!");
            } else {
                var table = "<tr><td>" + id + "</td><td>" + name + "</td><td>" + Price + "</td><td>" + edit + "</td><td>" + del + "</td></tr>";
                $("#tblCustomers").append(table);
            }
            id = $("#txtId").val("");
            name = $("#txtName").val("");
            Price = $("#txtPrice").val("");
            Clear();
        });

        $('#btnUpdate').on('click', function () {
            var name, Price, id;
            id = $("#txtId").val();
            name = $("#txtName").val();
            Price = $("#txtPrice").val();

            $('#tblCustomers tbody tr').eq($('#hfRowIndex').val()).find('td').eq(1).html(name);
            $('#tblCustomers tbody tr').eq($('#hfRowIndex').val()).find('td').eq(2).html(country)

            $('#btnAdd').show();
            $('#btnUpdate').hide();
            Clear();
        });

        $("#tblCustomers").on("click", ".delete", function (e) {
            if (confirm("Are you sure want to delete this record!")) {
                $(this).closest('tr').remove();
            } else {
                e.preventDefault();
            }
        });

        $('#btnClear').on('click', function () {
            Clear();
        });

        $("#tblCustomers").on("click", ".edit", function (e) {
            var row = $(this).closest('tr');
            $('#hfRowIndex').val($(row).index());
            var td = $(row).find("td");
            $('#txtId').val($(td).eq(0).html());
            $('#txtName').val($(td).eq(1).html());
            $('#txtPrice').val($(td).eq(2).html());
            $('#btnAdd').hide();
            $('#btnUpdate').show();
        });
    });
    function Clear() {
        $("#txtId").val("");
        $("#txtName").val("");
        $("#txtPrice").val("");
        $("#hfRowIndex").val("");
    }
</script>
</script>

</html>
