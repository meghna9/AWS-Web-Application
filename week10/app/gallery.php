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
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" href="css/toggles.css" type="text/css">
<link rel="stylesheet" href="css/themes/toggles-modern.css" type="text/css">-->
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="http://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<style>
.upload_form_cont{
margin: 0 auto;
width: 1024px;
}
</style>
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
<?php if($role=='user'){ ?>
 <div class="upload_form_cont">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php">
                    <div>
                        <div><label for="image_file">Please select image file</label></div>
                        <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();" /></div>
                    </div>
                    <div>
                        <input type="button" value="Upload" onclick="startUploading()" />
                    </div>
                    <div id="fileinfo">
                        <div id="filename"></div>
                        <div id="filesize"></div>
                        <div id="filetype"></div>
                        <div id="filedim"></div>
                    </div>
                    <div id="error">You should select valid image files only!</div>
                    <div id="error2">An error occurred while uploading the file</div>
                    <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
                    <div id="warnsize">Your file is very big. We can't accept it. Please select more small file</div>

                    <div id="progress_info">
                        <div id="progress"></div>
                        <div id="progress_percent">&nbsp;</div>
                        <div class="clear_both"></div>
                        <div>
                            <div id="speed">&nbsp;</div>
                            <div id="remaining">&nbsp;</div>
                            <div id="b_transfered">&nbsp;</div>
                            <div class="clear_both"></div>
                        </div>
                        <div id="upload_response"></div>
                    </div>
</form>
<div style="clear: both;"></div>
			</div>
<div style="clear: both;"></div>
<?php }else{ ?>
<div class="togglediv">
Upload Toggle:<input id="toggle-event" type="checkbox" data-toggle="toggle">
</div>
 <div class="upload_form_cont" style="display: none;">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php">
                    <div>
                        <div><label for="image_file">Please select image file</label></div>
                        <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();" /></div>
                    </div>
                    <div>
                        <input type="button" value="Upload" onclick="startUploading()" />
                    </div>
                    <div id="fileinfo">
                        <div id="filename"></div>
                        <div id="filesize"></div>
                        <div id="filetype"></div>
                        <div id="filedim"></div>
                    </div>
                    <div id="error">You should select valid image files only!</div>
                    <div id="error2">An error occurred while uploading the file</div>
                    <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
                    <div id="warnsize">Your file is very big. We can't accept it. Please select more small file</div>

                    <div id="progress_info">
                        <div id="progress"></div>
                        <div id="progress_percent">&nbsp;</div>
                        <div class="clear_both"></div>
                        <div>
                            <div id="speed">&nbsp;</div>
                            <div id="remaining">&nbsp;</div>
                            <div id="b_transfered">&nbsp;</div>
                            <div class="clear_both"></div>
                        </div>
 <div id="upload_response"></div>
                    </div>
</form>
<div style="clear: both;"></div>
                        </div>
<div style="clear: both;"></div>
<?php } ?>
</div>
<hr/>
  <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Gallery</h1>
            </div>
            <?php
if($count > 0){
?>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="gallery/mountain.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="gallery/mountain-bw.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="gallery/eartrumpet.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="gallery/eartrumpet-bw.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="gallery/Knuth.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="gallery/Knuth-bw.jpg" alt="">
                </a>
            </div>
<?php while($row = mysqli_fetch_object($sql)) {
?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="<?php echo $row->s3finishedurl; ?>" alt="image-<?php echo $row->id; ?>">
                </a>
            </div>
<?php }}else{ ?>
<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="gallery/mountain.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="gallery/mountain-bw.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="gallery/eartrumpet.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="gallery/eartrumpet-bw.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="gallery/Knuth.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="gallery/Knuth-bw.jpg" alt="">
                </a>
            </div>
<?php } ?>
        </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--<script src="toggles.min.js"></script>-->
<script src="http://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
$(function() {
    $('#toggle-event').change(function() {
      //$('#console-event').html('Toggle: ' + $(this).prop('checked'))
      if($(this).prop('checked')){
         $(".upload_form_cont").show();
      }
      else{
         $(".upload_form_cont").hide(); 
      }
    });
  });
var iBytesUploaded = 0;
var iBytesTotal = 0;
var iPreviousBytesLoaded = 0;
var iMaxFilesize = 1048576; // 1MB
var oTimer = 0;
var sResultFileSize = '';

function secondsToTime(secs) {
    var hr = Math.floor(secs / 3600);
    var min = Math.floor((secs - (hr * 3600))/60);
    var sec = Math.floor(secs - (hr * 3600) -  (min * 60));

    if (hr < 10) {hr = "0" + hr; }
    if (min < 10) {min = "0" + min;}
    if (sec < 10) {sec = "0" + sec;}
    if (hr) {hr = "00";}
    return hr + ':' + min + ':' + sec;
};

function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB'];
    if (bytes == 0) return 'n/a';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
};

function fileSelected() {

    
    document.getElementById('upload_response').style.display = 'none';
    document.getElementById('error').style.display = 'none';
    document.getElementById('error2').style.display = 'none';
    document.getElementById('abort').style.display = 'none';
    document.getElementById('warnsize').style.display = 'none';

    
    var oFile = document.getElementById('image_file').files[0];

    
    var rFilter = /^(image\/bmp|image\/gif|image\/jpeg|image\/png|image\/tiff)$/i;
    if (! rFilter.test(oFile.type)) {
        document.getElementById('error').style.display = 'block';
        return;
    }

    
    if (oFile.size > iMaxFilesize) {
        document.getElementById('warnsize').style.display = 'block';
        return;
    }

    
    var oImage = document.getElementById('preview');

    
    var oReader = new FileReader();
        oReader.onload = function(e){

            oImage.src = e.target.result;

        oImage.onload = function () { 

            
            sResultFileSize = bytesToSize(oFile.size);
            document.getElementById('fileinfo').style.display = 'block';
            document.getElementById('filename').innerHTML = 'Name: ' + oFile.name;
            document.getElementById('filesize').innerHTML = 'Size: ' + sResultFileSize;
            document.getElementById('filetype').innerHTML = 'Type: ' + oFile.type;
            document.getElementById('filedim').innerHTML = 'Dimension: ' + oImage.naturalWidth + ' x ' + oImage.naturalHeight;
        };
    };

    
    oReader.readAsDataURL(oFile);
}

function startUploading() {
    
    iPreviousBytesLoaded = 0;
    document.getElementById('upload_response').style.display = 'none';
    document.getElementById('error').style.display = 'none';
    document.getElementById('error2').style.display = 'none';
    document.getElementById('abort').style.display = 'none';
    document.getElementById('warnsize').style.display = 'none';
    document.getElementById('progress_percent').innerHTML = '';
    var oProgress = document.getElementById('progress');
    oProgress.style.display = 'block';
    oProgress.style.width = '0px';

    
    var file = document.getElementById("image_file");
     
           var formData = new FormData();
      
      formData.append("image_file", file.files[0]);
     var oXHR = new XMLHttpRequest();
    oXHR.upload.addEventListener('progress', uploadProgress, false);
    oXHR.addEventListener('load', uploadFinish, false);
    oXHR.addEventListener('error', uploadError, false);
    oXHR.addEventListener('abort', uploadAbort, false);
oXHR.open('POST', 'upload.php',true);
    //oXHR.setRequestHeader("Content-Type", "multipart/form-data");
    oXHR.send(formData);  

    
    oTimer = setInterval(doInnerUpdates, 300);
}

function doInnerUpdates() { 
    var iCB = iBytesUploaded;
    var iDiff = iCB - iPreviousBytesLoaded;

    
    if (iDiff == 0)
        return;

    iPreviousBytesLoaded = iCB;
    iDiff = iDiff * 2;
    var iBytesRem = iBytesTotal - iPreviousBytesLoaded;
    var secondsRemaining = iBytesRem / iDiff;

    
    var iSpeed = iDiff.toString() + 'B/s';
    if (iDiff > 1024 * 1024) {
        iSpeed = (Math.round(iDiff * 100/(1024*1024))/100).toString() + 'MB/s';
    } else if (iDiff > 1024) {
        iSpeed =  (Math.round(iDiff * 100/1024)/100).toString() + 'KB/s';
    }

    document.getElementById('speed').innerHTML = iSpeed;
    document.getElementById('remaining').innerHTML = '| ' + secondsToTime(secondsRemaining);
}

function uploadProgress(e) {
    if (e.lengthComputable) {
        iBytesUploaded = e.loaded;
        iBytesTotal = e.total;
        var iPercentComplete = Math.round(e.loaded * 100 / e.total);
        var iBytesTransfered = bytesToSize(iBytesUploaded);

        document.getElementById('progress_percent').innerHTML = iPercentComplete.toString() + '%';
        document.getElementById('progress').style.width = (iPercentComplete * 4).toString() + 'px';
        document.getElementById('b_transfered').innerHTML = iBytesTransfered;
        if (iPercentComplete == 100) {
            var oUploadResponse = document.getElementById('upload_response');
            oUploadResponse.innerHTML = '<h1>Please wait...processing</h1>';
            oUploadResponse.style.display = 'block';
        }
    } else {
        document.getElementById('progress').innerHTML = 'unable to compute';
    }
}

function uploadFinish(e) { 
    var oUploadResponse = document.getElementById('upload_response');
    oUploadResponse.innerHTML = e.target.responseText;
    oUploadResponse.style.display = 'block';

    document.getElementById('progress_percent').innerHTML = '100%';
    document.getElementById('progress').style.width = '400px';
    document.getElementById('filesize').innerHTML = sResultFileSize;
    document.getElementById('remaining').innerHTML = '| 00:00:00';

    clearInterval(oTimer);
window.location.href="gallery.php";
}

function uploadError(e) { 
    document.getElementById('error2').style.display = 'block';
    clearInterval(oTimer);
}  

function uploadAbort(e) { 
    document.getElementById('abort').style.display = 'block';
    clearInterval(oTimer);
}

</script>
</body>
</html>
