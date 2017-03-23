<?php
/*$Id: settings.php 378 2009-11-02 19:36:24Z dmitriy $*/

$dbhost     = 'localhost';
$dbuser     = '<user>';
$dbpassword = '<password>';
$dbname     = 'confa';

$host   = '<hostname>'; // 127.0.0.1 for running locally
$root_dir   = '/';
$server_tz = '-5:00';

$prop_tz_name = 'America/Toronto'; // default user timezone
date_default_timezone_set($prop_tz_name);

$title='<forum title>';
$from_email = '<supportemailaddress>';

// Registration mode (by default, closed)
$reg_type = REG_TYPE_CLOSED; // REG_TYPE_OPEN, REG_TYPE_CONFIRM;

$reactions = array(
  'reactlike' => 0,
  'reactdislike' => 0,
  'reacthaha' => 0,
  'reactwow' => 0,
  'reactsad' => 0,
  'reactmad' => 0,
);

// $google_key = ""; // (optional) specify your Google API key here to enable YouTube metadata
// $tmdb_key = ""; // (optional) specify your The Moview Database API key here to enable IMDB metadata 

// $recaptcha_site_key = ''; // (optional) specify your Google reCAPTCHA site key here to enable bot protection for registration page
// $recaptcha_secret_key = ''; // if you specified $recaptcha_site_key, copy your reCAPTCHA secret key here 

//image gallery support. values: 'postimage', 'local', 'amazon'.
$imageGallery='postimage';


//local dump folder (required when $imageGallery='amazon' or 'local')
$imageGalleryDumpFolder='uploads';

//Amazon auth (required when $imageGallery='amazon';)
$imageGalleryBucket='';

//UPDATE gallery_s3config.php WITH YOUR AWS KEY AND SECRET


?>

