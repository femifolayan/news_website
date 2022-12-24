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
<script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>OnL | News Update</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<link href="css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.fw.png" type="text/javascript">

<link rel="stylesheet" href="vendors/select2-3.5.2/select2.css" />
<link rel="stylesheet" href="vendors/select2-bootstrap/select2-bootstrap.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/froala_editor.css">
<link rel="stylesheet" href="css/froala_style.css">
<link rel="stylesheet" href="css/plugins/code_view.css">
<link rel="stylesheet" href="css/plugins/image_manager.css">
<link rel="stylesheet" href="css/plugins/image.css">
<link rel="stylesheet" href="css/plugins/table.css">
<link rel="stylesheet" href="css/plugins/video.css">
<link rel="stylesheet" href="css/plugins/colors.css">
<link rel="stylesheet" href="css/plugins/file.css">
<link rel="stylesheet" href="css/plugins/image.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <link rel="shortcut icon" href="../login/images/onl2.png">
    <link rel="shortcut icon" href="../login/images/onl2.png">
</head>

<body>
<?php
    include ('menu.php');
?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Update Profile!</h2>
                    <ol class="breadcrumb">
                        <li class="active">                       
                        <span style="color:green; weight:20px"><a href="profile_user.php"><i class="fa fa-arrow-circle-o-left col-lg-12"></i>GO BACK</a></span>
                    </ol>
             </div>
            <div class="col-lg-2">

</div>
            </div>
        <div class="wrapper wrapper-content">
            <div class="row">
            <div class="col-lg-30">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r"><h3 class="m-t-none m-b"></h3>
                              
    <form id="newform" method="post" name="register" enctype="multipart/form-data" id="loginForm">
                                <?php
                           
                             include('db_conn.php');
                              error_reporting(E_ALL);

                              if(isset($_REQUEST['submit'])){
                                $fullname=trim(addslashes($_REQUEST['fullname']));
                                $phone=trim(addslashes($_REQUEST['phone']));
                                
                                                  
                                $sql1 = "UPDATE guest SET fullname='$fullname', phone='$phone' WHERE id='$row[id]'";
                        
                        mysqli_query($conn,$sql1) or die (mysqli_error($conn));
                        $num=mysqli_insert_id($conn);
                                if(mysqli_affected_rows($conn)!=1){
                                                $message= "Error updating profile";
                                                }
                                                
                            echo "<script>alert('Profile updated')
                        location.href='profile_user.php'</script>";
                            
                            
                            mysqli_close($conn);
                            }
                            
                                                   ?>
                            <label>Fullname</label>
                            <input type="text" class="form-control" name="fullname" placeholder="Enter Fullname" value="<?php echo $row['fullname'];?>" required>

                            
                            <label>Phone</label>
                            <input type="tel" class="form-control" name="phone" placeholder="080xxx" value="<?php echo $row['phone'];?>" required><br>

                            
                            <div class="form-button">
                                <button name="submit" class="ibtn">Change</button>
                            </div>
                        </form>

                            </div>
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
    <script type="text/javascript" src="js/froala_editor.min.js"></script>
    <script type="text/javascript" src="js/plugins/align.min.js"></script>
    <script type="text/javascript" src="js/plugins/code_beautifier.min.js"></script>
    <script type="text/javascript" src="js/plugins/code_view.min.js"></script>
    <script type="text/javascript" src="js/plugins/draggable.min.js"></script>
    <script type="text/javascript" src="js/plugins/image.min.js"></script>
    <script type="text/javascript" src="js/plugins/image_manager.min.js"></script>
    <script type="text/javascript" src="js/plugins/link.min.js"></script>
    <script type="text/javascript" src="js/plugins/lists.min.js"></script>
    <script type="text/javascript" src="js/plugins/paragraph_format.min.js"></script>
    <script type="text/javascript" src="js/plugins/paragraph_style.min.js"></script>
    <script type="text/javascript" src="js/plugins/table.min.js"></script>
    <script type="text/javascript" src="js/plugins/video.min.js"></script>
    <script type="text/javascript" src="js/plugins/url.min.js"></script>
    <script type="text/javascript" src="js/plugins/entities.min.js"></script>
    <script type="text/javascript" src="js/plugins/font_family.min.js"></script>
    <script type="text/javascript" src="js/plugins/colors.min.js"></script>
    <script type="text/javascript" src="js/plugins/font_size.min.js"></script>
    <script type="text/javascript" src="js/plugins/forms.min.js"></script>
    <script type="text/javascript" src="js/plugins/inline_style.min.js"></script>
    <script type="text/javascript" src="js/plugins/word_paste.min.js"></script>
    <script type="text/javascript" src="js/plugins/quote.min.js"></script>

    <script>
        $(function() {
            $('#edit')
                .on('froalaEditor.initialized', function(e, editor) {
                    $('#edit').parents('form').on('submit', function() {
                        console.log($('#edit').val());
                        return true;
                    })
                })
                .froalaEditor({
                    enter: $.FroalaEditor.ENTER_P,
                    placeholderText: null
                })
        });
    </script>

<script>



       $(function() {
          $('#editor').froalaEditor({
            toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', '|', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', 'specialCharacters', 'emoticons', '|', 'quote', 'insertHR', 'undo', 'redo', 'clearFormatting', 'selectAll', 'print', 'html', 'fullscreen'],
            pluginsEnabled: null,
            // Set the image upload parameter.
            imageUploadParam: 'image_param',

            // Set the image upload URL.
            imageUploadURL: 'upload_image.php',

            // Additional upload params.
            imageUploadParams: {id: 'my_editor'},

            // Set request type.
            imageUploadMethod: 'POST',

            // Set max image size to 5MB.
            imageMaxSize: 5 * 1024 * 1024,

            // Allow to upload PNG and JPG.
            imageAllowedTypes: ['jpeg', 'jpg', 'png']
          })
          .on('froalaEditor.image.beforeUpload', function (e, editor, images) {
            // Return false if you want to stop the image upload.
            return true;
          })
          .on('froalaEditor.image.uploaded', function (e, editor, response) {
            // Image was uploaded to the server.
            // console.log(response);
            return true;
          })
          .on('froalaEditor.image.inserted', function (e, editor, $img, response) {
            // Image was inserted in the editor.
            console.log($img);
            console.log(response);
            return true;
          })
          .on('froalaEditor.image.replaced', function (e, editor, $img, response) {
            // Image was replaced in the editor.
            return true;
          })
          .on('froalaEditor.image.error', function (e, editor, error, response) {
            // Bad link.
            if (error.code == 1) {
                console.log('Bad link');
            }

            // No link in upload response.
            else if (error.code == 2) {
                console.log('No link in upload response');
            }

            // Error during image upload.
            else if (error.code == 3) {
                console.log('Error during image upload');
            }

            // Parsing response failed.
            else if (error.code == 4) {
                console.log(response);
                console.log(error);
                console.log('Parsing reponse failed');
            }

            // Image too text-large.
            else if (error.code == 5) {
                console.log('Image too text-large');
            }

            // Invalid image type.
            else if (error.code == 6) {
                console.log('Invalid image type');
            }

            // Image can be uploaded only to same domain in IE 8 and IE 9.
            else if (error.code == 7) {
                console.log('Image can be uploaded to same domain in IE 8 and IE 9');
            }

            // Response contains the original server response to the request if available.
          });
        });




   </script>


    <script src="vendors/select2-3.5.2/select2.min.js"></script>
    <script>
        $(".js-source-states").select2();
        $(".js-source-states-2").select2();
    </script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote.min.js"></script>

    <script>
        $(document).ready(function() {

            $('.summernote').summernote();

        });
        var edit = function() {
            $('.click2edit').summernote({
                focus: true
            });
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };
    </script>
</body>

</html>
