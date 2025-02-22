<?php
$moved         = false;                                        // Initialize
$message       = '';                                           // Initialize
$error         = '';                                           // Initialize
$upload_path   = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'uploads'  . DIRECTORY_SEPARATOR; // Upload folder
$max_size      = 5242880;                                      // Max file size
$allowed_types = ['image/jpeg', 'image/png', 'image/gif',];    // Allowed file types
$allowed_exts  = ['jpeg', 'jpg', 'png', 'gif',];               // Allowed file extensions

function create_cropped_thumbnail($source, $thumbpath)
{
    $image = new Imagick($source);                          // Object to represent image
    $image->cropThumbnailImage(200, 200);                   // Create cropped thumbnail
    $image->writeImage($thumbpath);                         // Save file
    
    return true;                                            // Return true to show success
}

function create_filename($filename, $upload_path)              // Function to make filename
{
    $basename   = pathinfo($filename, PATHINFO_FILENAME);      // Get basename
    $extension  = pathinfo($filename, PATHINFO_EXTENSION);     // Get extension
    $basename   = preg_replace('/[^A-z0-9]/', '-', $basename); // Clean basename
    $filename   = $basename . '.' . $extension;                // Add extension to clean basename
    $i          = 0;                                           // Counter
    while (file_exists($upload_path . $filename)) {            // If file exists
        $i        = $i + 1;                                    // Update counter 
        $filename = $basename . $i . '.' . $extension;         // New filepath
    }
    return $filename;                                          // Return filename
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {                    // If form submitted
    $error = ($_FILES['image']['error'] === 1) ? 'too big ' : '';  // Check size error

    if ($_FILES['image']['error'] == 0) {                          // If no upload errors
        $error  .= ($_FILES['image']['size'] <= $max_size) ? '' : 'too big '; // Check size
        // Check the media type is in the $allowed_types array
        $type   = mime_content_type($_FILES['image']['tmp_name']);        
        $error .= in_array($type, $allowed_types) ? '' : 'wrong type ';
        // Check the file extension is in the $allowed_exts array
        $ext    = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $error .= in_array($ext, $allowed_exts) ? '' : 'wrong file extension ';

        // If there are no errors create the new filepath and try to move the file
        if (!$error) {
          $filename    = create_filename($_FILES['image']['name'], $upload_path);
          $destination = $upload_path . $filename;
          $moved       = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
          $thumbpath   = $upload_path . 'thumb_' . $filename;        // Path to thumbnail
          $resized     = create_cropped_thumbnail($destination, $thumbpath); // Create thumbnail
        }
    }
    if ($moved === true and $resized === true) {                                   // If it moved
        $message = 'Uploaded:<br><img src="uploads/thumb_' . $filename . '">';     // Show image
    } else {                                                          // Otherwise
        $message = '<b>Could not upload file:</b> ' . $error;         // Show errors
    }
}
?>
<?php include 'includes/header.php' ?>
<?= $message ?>
  <form method="POST" action="crop-im.php" enctype="multipart/form-data">
    <label for="image"><b>Upload file:</b></label>
    <input type="file" name="image" id="image"><br>
    <input type="submit" value="Upload">
  </form>
<?php include 'includes/footer.php' ?>