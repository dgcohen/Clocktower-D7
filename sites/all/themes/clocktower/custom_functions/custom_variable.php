<?php

/* this is called by contemplate with <?php include_once('sites/all/themes/artonair/custom_variable.php'); ?>
why don't I use template.php? well, template.php's custom variables only apply to page templates, etc, and won't work within contemplate. */


/* these two variables are the absolute path / http url to the mp3 folder, respectively. */
global $air_mp3s_path;
global $air_mp3s_url;
global $air_xspfs_path;
$air_mp3s_path = "/var/www/vhosts/artonair.org/clocktower.org/audio/mp3"; // no trailing slashes
$air_mp3s_url = "http://clocktower.org/audio/mp3";  // no trailing slashes
$air_xspfs_path = "/var/www/vhosts/artonair.org/clocktower.org/audio/xspf"; // no trailing slashes


?>
