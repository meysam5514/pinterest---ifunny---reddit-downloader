<?php
error_reporting(false);
header('Content-type: application/json;'); 
$urlside=$_GET['url'];
$data['url'] = $urlside;
//=========================================
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_URL,"https://www.expertsphp.com/facebook-video-downloader.php");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
//curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch, CURLOPT_HEADER, true);
//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
$meysam= curl_exec($ch);
curl_close($ch);    
//=========================================
preg_match_all('#<td><a href="(.*?)"(.*?)>Download Link</a></td>
                  <td><strong>(.*?)</strong></td>
                  <td><strong>(.*?)</strong></td>#is',$meysam,$sidepath1);
                  
                  
                  
                  
$sidepath2 = array();    

for($i=0;$i<=count($sidepath1[1])-1;$i++){
$sidepath2[$i]['url']= $sidepath1[1][$i];  
$sidepath2[$i]['size']= $sidepath1[3][$i];  
$sidepath2[$i]['format']= $sidepath1[4][$i];  
}
//=========================================================
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>$sidepath2], 448);
//=========================================================









