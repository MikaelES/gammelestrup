<?php

ini_set('post_max_size', '900K'); 
ini_set('upload_max_filesize', '900K'); 
ini_set("include_path", "../common.inc.php");
require_once( "../common.inc.php" );
checkLogin();
displayPageHeader( "Welcome to the Members' Area", true );

if ( isset( $_POST["sendPhoto"] ) ) {
  processForm();
} else {
  displayForm();
}

function processForm() {
  if ( isset( $_FILES["photo"] ) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK ) {
    if ( $_FILES["photo"]["type"] != "image/jpeg" ) {
      echo "<p>JPEG photos only, thanks!</p>";
    } elseif ( !move_uploaded_file( $_FILES["photo"]["tmp_name"], "photos/" . basename( $_FILES["photo"]["name"] ) ) ) {
      echo "<p>Sorry, there was a problem uploading that photo.</p>" . $_FILES["photo"]["error"] ;
    } else {
      displayThanks();
    }
  } else {
    switch( $_FILES["photo"]["error"] ) {
      case UPLOAD_ERR_INI_SIZE:
        $message = "The photo is larger than the server allows.";
        break;
      case UPLOAD_ERR_FORM_SIZE:
        $message = "The photo is larger than the script allows.";
        break;
      case UPLOAD_ERR_NO_FILE:
        $message = "No file was uploaded. Make sure you choose a file to upload.";
        break;
      default:
        $message = "Please contact your server administrator for help.";
    }
    echo "<p>Sorry, there was a problem uploading that photo. $message</p>";
  }
}

function displayForm() {
?>
    <h1>Uploading a Photo</h1>

    <p>Please enter your name and choose a photo to upload, then click Send Photo.</p>

    <form action="photo_upload.php" method="post" enctype="multipart/form-data">
      <div style="width: 30em;">
        <input type="hidden" name="MAX_FILE_SIZE" value="900000" />

        <label for="visitorName">Your name</label>
        <input type="text" name="visitorName" id="visitorName" value="" />

        <label for="photo">Your photo</label>
        <input type="file" name="photo" id="photo" value="" />

        <div style="clear: both;">
          <input type="submit" name="sendPhoto" value="Send Photo" />
        </div>

      </div>
    </form>
<?php
}

function displayThanks() {
?>
    <h1>Thank You</h1>
    <p>Thanks for uploading your photo<?php if ( $_POST["visitorName"] ) echo ", " . $_POST["visitorName"] ?>!</p>
    <p>Here's your photo:</p>
    <p><img src="photos/<?php echo $_FILES["photo"]["name"] ?>" alt="Photo" /></p>
<?php
}
?>

  </body>
</html>
