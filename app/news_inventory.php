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

    <title><?php echo $row['fullname'];?></title>

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

<div class="col-lg-10">
                    <h2></h2>
                    <ol class="breadcrumb">
                        <li class="active">                       
                        <span style="color:green; weight:20px"><a href="index.php"><i class="fa fa-arrow-circle-o-left col-lg-12"></i>HOME</a></span>
                    </ol>
                </div>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">

                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                              
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                  
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                       
                                        </li>
                                        
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Date</th>
                                                <th>User</th>
                                                <th>Category</th>
                                                <th>Headline</th>
                                                <th>Content</th>                                              
                                                <th>Photo Credit</th>
                                                <th>Cover Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
include('db_conn.php'); 
$sql = "SELECT * FROM `news` ORDER by id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_array($result)) {
		
?>  
                                            <tr class="gradeX">
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['user']; ?></td>
                                                <td><?php echo $row['category']; ?></td>
                                                <td><?php echo $row['headline']; ?></td>
                                                <td><?php echo $row['content']; ?></td>
                                                <td><?php echo $row['photo_credit']; ?></td>
                                                <td><img src="uploads/cover_photo/<?php echo $row['cover_photo']; ?>" alt="news cover photo" height="50px"></td>
                                                <td><div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a <?php echo "href='view_news.php?id=" . $row['id'] . "' title='View Profile'"; ?>;>View</a></li>                                         
                                        </ul>
                                    </div></td>
                                       
                                            </tr>
                                            <?php  
}
}

mysqli_close($conn);
?>                                           
                                    </table>
                                </div>

                            </div>
                        </div>
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