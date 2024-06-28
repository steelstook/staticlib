<?PHP
unset($argv[0]);
$file = 
//basename
($argv[1]);
/*$j = json_decode(file_get_contents($argv[1]), true);
//{:"দিপতী তরিপুরা",:"তসারাই ত্রিপুরা",:"","জন্ম তারিখ":"১০-১২-১৯৮০",:"",:"","মোবাইল নং":"","অন্য কর্মসূচির ভাতাভোগী কি?":"","নাম (ইংরেজি)":"Dipti Tripura",
//:"তাজনি ত্রিপুরা",:"আব্রাহাম ত্রিপুরা",:"বান্দরবান",:"খ্রিস্টানধর্ম",:"","জাতীয় পরিচয় পত্র নং":"১৯৯৬০৩১৯৫৩৮০০০০২৭",:"চট্রগ্রাম",:"বান্দরবান",
//:"থান্‌চি",:"তিন্দু",:"৯",:"৪৬৩০",:"BADUNIYA PARA",:"","আপনার গৃহস্থালীর মালিকাধীন ব্যবহৃত জমির পরিমান কত?":"১৫ শতকের নীচে",
//"খানা প্রধানের পেশা":"কৃষি শ্রমিক","আপনার স্বামীর মাসিক আয় কত ?":"৮০০০ টাকার নীচে অথবা সমান","আপনার বাড়ীতে কি নিজস্ব পায়খানা আছে?":"না",
//"আপনার বাড়িতে কি বিদ্যুৎ সুবিধা আছে?":"না",
//"আপনার বাড়িতে কি একটি বৈদ্যুতিক পাখা আছে?":"না",
//"আপনার বাড়ীতে কি নিজস্ব টিউব ওয়েল আছে?":"না","আপনার বাড়ীর প্রধান শোয়ার ঘরের দেয়াল গুলো কিসের তৈরী?":"পাট\/স্টিক\/বাঁশ\/কাদা",
//"প্রতিবন্ধী":"কেউ না",
//:"ব্যাংকিং",:"সোনালী ব্যাংক লিমিটেড",:"থানচি",:"সঞ্চয়ী হিসাব",
//:"Dipti Tripura",:"১১০৭২০১০০৯০৮৪","link":[{"Dipti 2.jpg":"\/mcbp\/getFile\/19960319538000027\/Dipti 2.jpg\/anc"},{"Dipti 3.jpg":"\/mcbp\/getFile\/19960319538000027\/Dipti 3.jpg\/others"}]}

$dob = $j["জন্ম তারিখ"];
$d = explode('-', bn2en($dob));
$dob = "{$d[2]}-{$d[1]}-{$d[0]}";

$data = [
'id' => (int) basename($file, ".txt"),
'name_bn' => $j["নাম (বাংলা)"],
'name_en' => $j["নাম (ইংরেজি)"],
'name' => trim($j["যে নামে পরিচিত"]),
'nid' => bn2en($j["জাতীয় পরিচয় পত্র নং"]),
'dob' => bn2en($dob),
'mobile' => bn2en( $j["মোবাইল নং"]),
'father' => $j["পিতার নাম"],
'mother' => $j["মাতার নাম"],
'education' => $j["শিক্ষাগত যোগ্যতা"],
'blood_group' => $j["রক্তের গ্রুপ"],
'spouse' => $j["স্বামীর নাম"],
'birthplace' => $j["জন্মস্থান"],
'religion' => $j["ধর্ম"],
'married' => $j["বৈবাহিক তথ্য"],
'bibag' => $j["বিভাগ"],
'zilla' => $j["জেলা"],
'upzilla' => $j["উপজেলা"],
'union' => $j["ইউনিয়ন"],
'wordno' => $j["ওয়ার্ড নং"],
'postcode' => $j["পোস্ট কোড"],
'bari_gram' => $j["বাড়ি/গ্রাম"],
'rasta_block_sector' => $j["রাস্তা/ব্লক/সেক্টর"],
'profession' => $j["খানা প্রধানের পেশা"],
'payment_type' => $j["পেমেন্টের ধরন"],
'payment_title' => $j["হিসাবের নাম"],
'payment_account' => $j["হিসাব নং"],
'moblie_banking_provider' => $j["মোবাইল ব্যাংকিং সেবা প্রদানকারী"] ?? null,
'bank_name' => $j["ব্যাংক"] ?? null,
'bank_branch' => $j["শাখা"] ?? null,
'bank_account_type' => $j["হিসাবের ধরণ"] ?? null,
'electricty' => $j["আপনার বাড়িতে কি বিদ্যুৎ সুবিধা আছে?"] ?? false,
'disabled' => $j["প্রতিবন্ধী"] ?? false,
'tubewell' => $j["আপনার বাড়ীতে কি নিজস্ব টিউব ওয়েল আছে?"] ?? null,
//'basic_info' => json_encode($j,JSON_UNESCAPED_UNICODE),
];
//var_dump($data); exit;
if(empty($data['id']) || empty($data['nid'])){
exit($file);
}*/
$CONFIG = array(
    'DB_HOST' => 'localhost', // '94.250.203.146',
    'DB_USER' => 'stook',
    'DB_PASSWORD' => '0y779VjA7TOuFVLl',
    'DB_NAME' => 'stook_storage'
);
require '../wapka_ecosystem/lib/class/mysqlidb.php';
$db = new Mysqlidb(['host' => $CONFIG['DB_HOST'], 'username' => $CONFIG['DB_USER'], 
 'password' => $CONFIG['DB_PASSWORD'], 'db' => $CONFIG['DB_NAME'], 'charset' => 'utf8mb4']);
$data = [
'id' => (int) pathinfo($file, PATHINFO_FILENAME),
'filename' => (int) pathinfo($file, PATHINFO_FILENAME),
'md5sum' => md5_file($file),
'crc32sum' => hash_file('crc32b', $file),
'filesize' => filesize($file),
];
var_dump($db->setQueryOption("IGNORE")->insert('mcbp_sign', $data));


//var_dump($db->setQueryOption("IGNORE")->insert('mcbpe', $data));






//var_dump($data);


function bn2en($bn){
return str_replace(['০','১','২','৩','৪','৫','৬','৭', '৮','৯'], [0,1,2,3,4,5,6,7,8,9], $bn);
}
//rename($argv[1], "img/".bn2en($nid).'-'.bn2en($dob).".txt");
