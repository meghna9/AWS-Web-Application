
<?php
session_start();
include 'dbtest.php';
mysqli_select_db($link,'mp1-db');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$role = $_SESSION['role'];
if($role=='admin'){
$sql = mysqli_query($link,"select * from items where userid=$userid");
$count = mysqli_num_rows($sql);
}
else{

$sql = mysqli_query($link,"select * from items where userid in (".$userid.",1)");
$count = mysqli_num_rows($sql);
}
?>
<?php

/**
 * The demo page with bootstrap front end, also handles upload of images and queueing
 *
 * @package     PhpSqsTutorial
 * @author      George Webb <george@webb.uno>
 * @license     http://opensource.org/licenses/MIT MIT License
 * @link        http://george.webb.uno/posts/aws-simple-queue-service-php-sdk
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/autoload.php';

use Gaw508\PhpSqsTutorial\Message;
use Gaw508\PhpSqsTutorial\Queue;

// Array of messages to be displayed to the user.
$warnings = array();

if ( !empty($_FILES)) {
    // check number of files to upload
    $number_of_images = count($_FILES['images']['name']);

    // Only upload a max of 10 files
    if ($number_of_images > 10) {
        $warnings[] = array(
            'class' => 'alert-danger',
            'text' => 'Too many images, please upload a maximum of 10 images.'
        );
    } else {
        $successes = 0;

        // For each upload, check if an image and valid etc.
        for ($i = 0; $i < $number_of_images; $i++) {
            if ($_FILES['images']['error'][$i] > 0) {
                $warnings[] = array('class' => 'alert-danger', 'text' => 'Error uploading file.');
            } elseif ( !filesize($_FILES['images']['tmp_name'][$i])) {
                $warnings[] = array('class' => 'alert-danger', 'text' => 'Error uploading file.');
            } elseif ($_FILES['images']['type'][$i] != 'image/png' and $_FILES['images']['type'][$i] != 'image/jpeg') {
                $warnings[] = array('class' => 'alert-danger', 'text' => 'Invalid file type.');
            } elseif ($_FILES['images']['size'][$i] > 2000000) {
                $warnings[] = array('class' => 'alert-danger', 'text' => 'File too big.');
            } else {
                // Create a new filename for the uploaded image and move it there
                $extension = $_FILES['images']['type'][$i] == 'image/png' ? '.png' : '.jpg';
                $new_name = uniqid() . $extension;

                if ( !move_uploaded_file($_FILES['images']['tmp_name'][$i], __DIR__ . '/images/queued/' . $new_name)) {
                    $warnings[] = array('class' => 'alert-danger', 'text' => 'Error uploading file.');
                } else {
                    // Create a new message with processing instructions and push to SQS queue
                    $message = new Message(array(
                        'input_file_path' => __DIR__ . '/images/queued/' . $new_name,
                        'output_file_path' => __DIR__ . '/images/watermarked/' . $new_name
                    ));
                    $queue = new Queue(QUEUE_NAME, unserialize(AWS_CREDENTIALS));
                    if ($queue->send($message)) {
                        $successes++;
                    } else {
                        $warnings[] = array('class' => 'alert-danger', 'text' => 'Error adding file to queue.');
                    }
                }
            }
        }

        if ($successes > 0) {
            $warnings[] = array('class' => 'alert-success', 'text' => "$successes images uploaded successfully.");
            $warnings[] = array('class' => 'alert-info', 'text' => "Uploaded images added to queue...");
$path = "http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/".$new_name;
$sql2 = mysqli_query($link,"insert into items(userid,email,phone,s3rawurl,s3finishedurl,status,issubscribed) values($userid,'".$email."','".$phone."','".$new_name."','".$path."',1,1)");
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP SQS Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="http://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Welcome <?php echo ucfirst($username); ?></a>
    </div>
    <ul class="nav navbar-nav pull-right">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="gallery.php">Gallery</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

    <div class="container">
        <div class="page-header">
            <h1>
                Gallery
            </h1>
        </div>

        <?php foreach ($warnings as $warning) : ?>
            <?php if ( !empty($warning)) : ?>
                <div class="alert <?php echo $warning['class']; ?>"><?php echo $warning['text']; ?></div>
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Upload multiple images to have them watermarked</h3>
                    </div>

                    <div class="panel-body">
<?php if($role=='user'){ ?>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="imageUpload">File input</label>
                                <input type="file" multiple="multiple" id="imageUpload" name="images[]">
                                <p class="help-block">Choose multiple jpg or png files.</p>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
<?php }else{ ?>
<div class="togglediv">
Upload Toggle:<input id="toggle-event" type="checkbox" data-toggle="toggle">
</div>

<form class="upload_form_cont" style="display: none;" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="imageUpload">File input</label>
                                <input type="file" multiple="multiple" id="imageUpload" name="images[]">
                                <p class="help-block">Choose multiple jpg or png files.</p>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
<?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Watermarked images</h3>
                    </div>

                    <div class="panel-body">
                        <div class="alert alert-warning">
                            <strong>Heads up!</strong> Images are deleted after one hour
                        </div>

                        <div class="watermarked-images">
                            Loading ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Poll the server every 2 seconds to look for newly uploaded and processed files.

 $('#toggle-event').change(function() {
      //$('#console-event').html('Toggle: ' + $(this).prop('checked'))
      if($(this).prop('checked')){
         $(".upload_form_cont").show();
      }
      else{
         $(".upload_form_cont").hide();
      }
    });


            setInterval(function() {
                $.ajax({
                    url: 'images.php',
                    method: 'get',
                    dataType: 'json'
                })
                    .done(function(data) {
                        // Display image files on page, show placeholder for unprocessed files.

                        var total = 0;
                        var output = '<div class="row">';

                        for (var i = 0; i < data.waiting.length; i++) {
                            if (data.waiting[i].indexOf(".jpg") > -1) {
                                output += '<div class="col-xs-6 col-xs-3">' +
                                '<img class="img-responsive" src="images/placeholder.png">' +
                                '</div>';
                                total++;
                            }
                        }

                        for (var i = 0; i < data.watermarked.length; i++) {
                            if (data.watermarked[i].indexOf(".jpg") > -1) {
                                output += '<div class="col-xs-6 col-xs-3">' +
                                '<img class="img-responsive" src="images/watermarked/' + data.watermarked[i] + '">' +
                                '</div>';
                                total++;
                            }
                        }

                        output += '</div>';

                        if (total <= 0) {
                            output = 'No images yet...';
                        }

                        $('.watermarked-images').html(output);
                    });
            }, 2000);
        });
    </script>
</body>
</html>
