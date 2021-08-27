<?php
require_once('site.initializer.php');
// Create connection
$conn = new mysqli($GLOBALS['SITE_SPECIFIC']['DB']['Admin']['Host'], $GLOBALS['SITE_SPECIFIC']['DB']['Admin']['User'], $GLOBALS['SITE_SPECIFIC']['DB']['Admin']['Password'], $GLOBALS['SITE_SPECIFIC']['DB']['Admin']['Name']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




// Count total files
$countfiles = count($_FILES['files']['name']);

// Upload directory
$upload_location = "uploads/resorts/multiple/";

// To store uploaded files path
$files_arr = array();

// Loop all files
for ($index = 0; $index < $countfiles; $index++) {

    // File name
    $filename = $_FILES['files']['name'][$index];

    // Get extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    // Valid image extension
    $valid_ext = array("png", "jpeg", "jpg");

    // Check extension
    if (in_array($ext, $valid_ext)) {

        // File path
        $path = $upload_location . $filename;

        $insertsubscriber = "INSERT INTO `d_mba_image_definition` 
        (`TableID`, `SubscriberName`, `SubscriberEmail`, `ActiveFlag`, `TimeStamp`) 
        VALUES (NULL, '$subscriber_name', '$filename', '0', current_timestamp())";

        if ($conn->query($insertsubscriber) === TRUE) {
            echo "Thank you for subscription.";
        } else {
            echo "Error: " . $insertsubscriber . "<br>" . $conn->error;
        }

        $conn->close();

        // Upload file
        if (move_uploaded_file($_FILES['files']['tmp_name'][$index], $path)) {
            $files_arr[] = $path;
        }
    }
}

echo json_encode($files_arr);
die;


if ((empty($_POST["subscriber_name"]))) {
    echo "Please enter Name ";
} else if ((empty($_POST["subscriber_email"]))) {
    echo "Please enter Email Id ";
} else {
    $subscriber_name = $_POST['subscriber_name'];
    $subscriber_email = $_POST['subscriber_email'];
    $unsubscribe_url = "https://audacitytowin.com/unsubscribe?unsubscribe=" . $subscriber_email;
    $htmlmsg = "Subscription request \n\n" .
        "Name: " . $_POST['subscriber_name'] . "\n" .
        "Email: " . $_POST['subscriber_email'] . "\n" .
        "This message created on " . date('l, M j, Y \a\t H:i:sa') . " local server time. \n\n" .
        "<a href=" . $unsubscribe_url . " target='_blank'>UnSubscribe</a>\n\n";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <' . $SITECLASS->DefaultContactEmail . '>' . "\r\n";
    mail($SITECLASS->DefaultContactEmail, 'Subscription request from Suite Vacations', $htmlmsg, $headers);
}
