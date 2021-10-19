<?php

// $w = stream_get_wrappers();
// echo 'openssl: ',  extension_loaded  ('openssl') ? 'yes':'no', "\n";
// echo 'http wrapper: ', in_array('http', $w) ? 'yes':'no', "\n";
// echo 'https wrapper: ', in_array('https', $w) ? 'yes':'no', "\n";
// echo 'wrappers: ', var_export($w);

$url = "https://api.publicapis.org/entries" ; 


$array=json_decode(file_get_contents($url),false);

print_r($array->entries[0]->Description) ;
// print_r($argv) ;
    

?>