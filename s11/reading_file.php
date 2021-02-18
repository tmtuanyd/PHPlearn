<?php
$file = "example.txt";
if($handle =  fopen($file, 'r')){
    echo $content = fread($handle, filesize($file)); //each bite equals a character
    fclose($handle);
} else {
    echo "the file could not written";
};
?>