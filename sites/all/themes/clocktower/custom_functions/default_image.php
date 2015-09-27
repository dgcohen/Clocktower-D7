<?php 

/*

example:
print defaultImage("show", "teaser"); ===> <img src="......">

print defaultImage("show", "teaser", 142); ===> <a href=".......node/142"><img src="......"></a> (url will be aliased.)

*/

function defaultImage($nodetype, $viewtype, $nid = "") {


/** this is a hack to save httpd! */

  $imagelist = array(
'80sclocktowersmall.jpg',
'air-0018.jpg',
'airchristmascardemail.jpg',
'clocktower.jpg',
'dsc0198.jpg',
'dsc0200.jpg',
'dsc0203.jpg',
'dsc0213.jpg',
'dsc0225.jpg',
'dsc0226.jpg',
'img3668.jpg',
'img9083.jpg',
'lucascranestudio2010cassettes.jpg',
'p1000036.jpg',
'p1010403.jpg',
'p1010454.jpg',
'p1020428.jpg',
'p1020429.jpg',
'p1020433.jpg',
'p1020437.jpg',
'p1020438.jpg',
'p1020440.jpg',
'p1020443.jpg',
'p1020444.jpg',
'p1020446.jpg',
'p1020447.jpg',
'p1020450.jpg',
'p1020454.jpg',
'p1020458.jpg',
'p1020459.jpg',
'p1020460.jpg',
'p1020463.jpg',
'p1020465.jpg',
'p1020469.jpg',
'p1020470.jpg',
'p1020471.jpg',
'p1020472.jpg',
'p1020474.jpg',
'p1020480.jpg',
'p1070085.jpg',
'p1070095.jpg',
'p1070114.jpg',
'p1070118.jpg',
'p1070121.jpg',
'photo4.jpg',
'photocbystarblack8676roof2.jpg',
'picture002.jpg',
'picture004.jpg',
'tonyoursler013.jpg',
'zev2010010.jpg');


/*
  // right now this is pretty simple but this could randomize images, etc. etc. etc.
  $theme_path = drupal_get_path('theme', $GLOBALS['theme_key']);

 //path of page holding default images
  $pagepath = "default_images";

// get the node asked for and load it!
  $pagepathnoalias = preg_split("/\//", drupal_get_normal_path($pagepath)); 
  $pagenode = node_load($pagepathnoalias[1]);

  $default_image_path = $pagenode->field_image[array_rand($pagenode->field_image)]['filepath'];
  
*/


$default_image_path = "sites/default/files/page/9564/" . $imagelist[array_rand($imagelist)];

  if($viewtype == "body") {
    $imgtag = theme('imagecache', 'default_bodyview_thumbnail', $default_image_path);
  }

  if($viewtype == "teaser") { 
    $imgtag = theme('imagecache', 'gallery_condensed', $default_image_path);
  }

   if($nid != "") return l($imgtag, "node/" . $nid, array('html' => 'true'));
   else return $imgtag;
}

?>

