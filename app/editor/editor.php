<?php
include('session.php');
include('db_conn.php');
$id = 1;
$sql = "SELECT * FROM staff_id WHERE id='$id'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$rows = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
	 <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $session_business_name; ?> | News Upload</title>

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

</head>

<body>

    <?php include 'menus.php'; ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><b><?php echo $session_business_name; ?> News Upload</b></h2>

        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content">

        <div class="row">
            <form id="newform" method="post" name="register" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" id="loginForm">

                <?php
                include("db_conn.php");
                $rand = rand(1000, 9999);
                $today = date("dmy");
                $ID = "WN" . $today . $rand;

                error_reporting(E_ALL);
                if (isset($_REQUEST['submit'])) {

                    $uin = trim(addslashes($_REQUEST['uin']));
                    $language = trim(addslashes($_REQUEST['language']));
                    $date = trim(addslashes($_REQUEST['date']));
                    $category = implode(', ', $_REQUEST['category']);
                    $headline = trim(addslashes($_REQUEST['headline']));
                    $subheading = trim(addslashes($_REQUEST['subheading']));
                    $content = trim(addslashes($_REQUEST['content']));
                    $photo_credit1 = trim(addslashes($_REQUEST['photo_credit1']));
                    $photo_credit2 = trim(addslashes($_REQUEST['photo_credit2']));
                    $audiomack = trim(addslashes($_REQUEST['audiomack']));
                    $picture = $_FILES["data"]['name'];
                    $target = "cover_image/";
                    $target = $target . $_FILES["data"]['name'];
                    $featured_image = $_FILES["featured_image"]['name'];
                    $target2 = "featured_image/";
                    $target2 = $target2 . $_FILES["featured_image"]['name'];


                    if (move_uploaded_file($_FILES["data"]['tmp_name'], $target) > 0) {
                        if (move_uploaded_file($_FILES["featured_image"]['tmp_name'], $target2) > 0) {
                            $sql = "INSERT INTO news (user, date, uin, language, category, headline, subheading, content, cover_image, photo_credit1, featured_image, photo_credit2, audiomack) VALUES ('$session_fullname','$date','$uin','$language','$category','$headline','$subheading','$content','$picture','$photo_credit1','$featured_image','$photo_credit2','$audiomack')";

                            mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            $num = mysqli_insert_id($conn);
                            if (mysqli_affected_rows($conn) != 1) {
                                $message = "Error inserting the application information.";
                            }
                            echo "<script>alert('News Successfully Uploaded')
	location.href='editor.php'</script>";
                        }
                        mysqli_close($conn);
                    }
                }
                ?>



                <input type="hidden" value="<?php echo $ID; ?>" class="form-control" hidden="true" required name="uin" title="UIN">

                <div class="form-group col-lg-4">
                    <label>Select Date:</label>
                    <input type="date" required class="form-control" name="date" title="News Date">
                </div>

                <div class="form-group col-lg-4">
                    <label>Select Language</label>
                    <select style="width: 100%" class="form-control" required name="language" title="Language">
                        <option value="">--Select Language--</option>
                        <option value="English">English</option>
                        <option value="French">French</option>
                        <option value="Portugues">Portugues</option>
                    </select>
                </div>


                <div class="form-group col-lg-4">
                    <label>Select News Category</label>
                    <select class="js-source-states-2" multiple="multiple" style="width: 100%" class="form-control" required name="category[]" title="News Category">
                        <option value="West_Africa">West Africa</option>
                        <option value="Africa">Africa</option>
                        <option value="World">World</option>
                        <option value="Business">Business</option>
                        <option value="Tech">Tech</option>
                        <option value="Sports">Sports</option>
                        <option value="Entertainment">Entertainment & Arts</option>
                        <option value="Election">Election</option>
                        <option value="News_Link">News Link</option>
                        <option value="">-----------------</option>
                        <option value="">--FRENCH CATEGORY--</option>
                        <option value="Afrique_De_Louest">Afrique De L'ouest</option>
                        <option value="Afrique">Afrique</option>
                        <option value="Monde">Monde</option>
                        <option value="Entreprise">Entreprise</option>
                        <option value="Technologie">Technologie</option>
                        <option value="Des_Sports">Sports</option>
                        <option value="Divertissement">Divertissement/Les Arts</option>
                        <option value="Elections">Elections</option>
                        <option value="Infos_Chez_Vous">Infos Chez Vous</option>
                    </select>
                </div>

                <div class="form-group col-lg-6">
                    <label>News Headline</label>
                    <input type="text" placeholder="News Headline" required class="form-control" name="headline" title="News Headline">
                </div>

                <div class="form-group col-lg-6">
                    <label>News Subheading</label>
                    <input type="text" placeholder="News Subheading" class="form-control" name="subheading" title="News Subheading">
                </div>




                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>News Content</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class="ibox-content no-padding">
							

                            <textarea id="editor" required cols="30" rows="20" name="content" class="form-control" placeholder="News Content" style="font-family:Calibri; text-align:justify">

</textarea>
                        </div>
                    </div>

                    <div class="form-group col-lg-6">
                        <label>News Cover Image</label>
                        <input type="file" required name="data" placeholder="Image Upload" title="Image Upload" accept=".png,.PNG,.jpg,.JPG,.jpeg,.JPEG,.ico,.ICO" class="form-control">
						

                    </div>

                    <div class="form-group col-lg-6">
                        <label>Cover Image (Photo Credit)</label>
                        <input type="text" placeholder="Cover Image (Photo Credit)" class="form-control" name="photo_credit1" title="Cover Image (Photo Credit)">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>News Featured Image</label>
                        <input type="file" name="featured_image" placeholder="News Featured Image" title="Featured Image" accept=".png,.PNG,.jpg,.JPG,.jpeg,.JPEG,.ico,.ICO" class="form-control">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Featured Image (Photo Credit)</label>
                        <input type="text" placeholder="Featured Image (Photo Credit)" class="form-control" name="photo_credit2" title="Featured Image (Photo Credit)">
                    </div>

                    <div class="form-group col-lg-12">
                        <label>Audiomack | SoundCloud | YouTube Embedded Code </label>
                        
				<textarea name="audiomack" placeholder="Audiomack | SoundCloud | YouTube Embedded Code" class="form-control" title="Audiomack"></textarea>

                    </div>


                    <div class="text-center">
                        <input type="submit" name="submit" value="Upload News" class="btn btn-danger">
                    </div>
                </div>
            </form>
        </div>


    </div>
    <?php include 'footer.php'; ?>

    </div>
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