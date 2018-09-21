<?php
$PATH_FIND = '../../../';
$PATH_TMP  = '../../../../tmp/';



// Does not support flag GLOB_BRACE        
function glob_recursive($pattern, $flags = 0)
{
 $files = glob($pattern, $flags);
 foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir)
 {
   $files = array_merge($files, glob_recursive($dir.'/'.basename($pattern), $flags));
 }
 return $files;
}


 function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   }
 }