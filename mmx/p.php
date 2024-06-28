<?php
//kfdls
@array_shift($argv);
if(!$argv) exit("ERR");
//require __DIR__."/vendor/autoload.php";

foreach($argv as $imgpath){

if(file_exists($imgpath) && ($imgType = exif_imagetype($imgpath)) !== false){
$d = explode("-", pathinfo($imgpath, PATHINFO_FILENAME));
$ipath = __DIR__."/file/".($d[0]);
$name = $d[0];
$dir = "{$d[3]}-{$d[2]}-{$d[1]}";
$hash = hash_file('crc32b', $imgpath);
$md5 = md5_file($imgpath);
$size = filesize($imgpath);
$data = [$name, $dir, $size, $md5, $hash];
//var_dump($data);
rename($imgpath, $ipath);
file_put_contents("xx", join("|", $data).PHP_EOL, FILE_APPEND | LOCK_EX);
exec("echo {$ipath} >> done");
}

}
