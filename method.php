<?php 
// BY BROK - @x_BRK - @i_BRK //
if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
  }
  define('MADELINE_BRANCH', 'deprecated');
  include 'madeline.php';
  $settings['app_info']['api_id'] = 18336033;
  $settings['app_info']['api_hash'] = '3fef8d363a0e78e6610b4d146a1c2074';
  $MadelineProto = new \danog\MadelineProto\API('brok.madeline', $settings);
$MadelineProto->start();
function curlGet($url) {
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$res = curl_exec($ch);
return $res;
}
$admin = "@zZzZr7"; 
$user = readline('- Enter Username => @');
$type = readline('- Moved To ( Account / Channel / OldChannel ) => ');
if($type == "Channel"){
$updates = $MadelineProto->channels->createChannel(['broadcast' => true, 'megagroup' => false, 'title' => "- BROK .", 'about' => "- @zZzZr7 & @zZzZr7 .", ]);
}
if($type == "OldChannel"){
$brokold = readline('- Enter Channel Username => @');
}
$x = 0;
while(true){
$get = curlGet("https://telegram.me/$user");
      preg_match("/(.*)(og:title)(.*)(content\=\")(.*)(\">)/i", $get,$name);
      $name = $name[5];
      echo '@'.$user." => ".$x." => ".date('i:s')."\n";  
$x++;
      if(preg_match("/^Telegram\: Contact.*/", $name)){
          if($type == 'Account'){
              $MadelineProto->account->updateUsername(['username' => $user]);
}
if($type == 'Channel'){
$MadelineProto->channels->updateUsername(['channel' =>$updates['updates'][1], 'username' => $user, ]);
$MadelineProto->messages->sendMessage(['peer' => $updates['updates'][1], 'message' => "- Moved BY @zZzZr7 ."]);
}
if($type == "OldChannel"){
$MadelineProto->channels->updateUsername(['channel' => $brokold, 'username' => $user, ]);
$MadelineProto->messages->sendMessage(['peer' => $brokold, 'message' => "- Moved BY @zZzZr7 ."]);
}
$MadelineProto->messages->sendMessage(['peer' => "$admin", 'message' => "- Request Done . 
- ID => 〔 @$user 〕 .
- Clicks => 〔 $x 〕 .
- - - - - -
- BY => @zZzZr7 ."]);  
file_put_contents('brokmove', '');
exit; 
}
}