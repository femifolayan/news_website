<?php
include('session.php');
include('db_conn.php');
$id = 1;
$sql="SELECT * FROM guest WHERE id='$id'";
$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
$rows=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php $session_fullname = $row['fullname']; ?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../login/images/onl2.png">

</head>

<body>
<?php
    include ('menu.php');
?>
<div class="row wrapper border-bottom white-bg page-heading">
<div class="col-lg-10">
                    <ol class="breadcrumb">
                        <li class="active">                       
                        <span style="color:green; weight:20px"><a href="news_inventory.php"><i class="fa fa-arrow-circle-o-left col-lg-12"></i>GO BACK</a></span>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Profile Information</h5>
                            </div>
                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <style>
th { text-align:right}
</style>
                           
                          
                           <tr>
                           <th>FULLNAME:</th>
                           <td><?php echo $session_fullname = $row['fullname']; ?></td>
                        
                           <td><a <?php echo "href='update_profile.php?id=" . $row['id'] . "' title='View Profile'"; ?>;>Edit Profile</a></td>
                           </tr>
                           
                           <th>EMAIL:</th>
                           <td><?php echo $session_email = $row['email']; ?></td>
                           </tr>
                           
                           <tr>
                           <th>PHONE:</th>
                           <td colspan="3"><?php echo $session_phone = $row['phone']; ?></td>
                           <tr>
                           <th>DESIGNATION:</th>
                           <td colspan="3"><?php echo $session_designation = $row['designation']; ?></td>

                           <tr>
                           <th>PASSPORT:</th>
                           <td rowspan="2"><img src="../login/upload_passport/<?php echo $session_passport = $row['passport']; ?>" height="300px" ></td>
                            </tr>

                           </table>
                           
                    </div>
                </div>
          </div>
        <?php
        include ('footer.php');
        ?>
    </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    }, {
                        extend: 'csv'
                    }, {
                        extend: 'excel',
                        title: 'ExampleFile'
                    }, {
                        extend: 'pdf',
                        title: 'ExampleFile'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable('../example_ajax.php', {
                "callback": function(sValue, y) {
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function(value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            });


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row"
            ]);

        }
    </script>

</body>

</html>