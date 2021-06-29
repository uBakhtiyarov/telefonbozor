<?php

function foiz( $number, $everything, $decimals=0){
 return round( $number / $everything * 100, $decimals )."%";
 }
 
define('API_KEY','1860083329:AAF7aMXWq-0hc4Vmbsw0sqNu061yzuZfqQQ');

$bot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getme"))->result->username;

@date_default_timezone_set("Asia/Dushanbe");
$php = "php://input";
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function open($str){
    return file_get_contents($str);
    }
    function save($str,$to){
    file_put_contents($str,$to);
    }

$admin="1753021776";
$channel = "@TelefonTestBozor";
$update=json_decode(file_get_contents($php));
$message=$update->message;
if($message){
$text=$message->text;
$chat_id=$message->chat->id;
$message_id=$message->message_id;

$name = $message->from->first_name;
$reply = $update->message->reply_to_message->text;
$mid = $update->message->reply_to_message->message_id;
}$data = $update->callback_query->data;
if($data){
$message_id = $update->callback_query->message->message_id;
$chat_id = $update->callback_query->message->chat->id;
$from_id = $update->callback_query->message->from->id;
$query_id = $update->callback_query->id; 
$base="sys/user/$chat_id/add.ID";
$mp="sys/user/$chat_id/photo.jpg";
$sy="sys/user/$chat_id/sy.ID";
}
@mkdir("sys");
@mkdir("sys/user");
@mkdir("sys/user/$chat_id");
$sys="sys/user/$chat_id";
$base="sys/user/$chat_id/add.ID";
$mp="sys/user/$chat_id/photo.jpg";
$sy="sys/user/$chat_id/sy.ID";
$model = "$sys/model.id";
$color = "$sys/color.id";
$var = "$sys/var.id";
$year = "$sys/year.id";
$gb = "$sys/gb.id";
$camera = "$sys/camera.id";
$selfie = "$sys/selfie.id";
$version = "$sys/version.id";
$battery = "$sys/battery.id";
$buy = "$sys/buy.id";
$call = "$sys/call.id";
$loc = "$sys/location.id";
$info = "$sys/info.id";
$chatting="$sys/chat.id";
$joinchat = open($chatting);

$photo = $message->photo;
$file_id=$message->photo[count($message->photo)-1]->file_id;


$key = json_encode(["inline_keyboard"=>[
[["text"=>"E'lon joylash","callback_data"=>"add"]],]]);


if(isset($text)){
if(strpos(open("sys/users.ID"),"$chat_id")!==false){
}else{
save("sys/users.ID",open("sys/users.ID")."\n$chat_id");
}
}


$ma=file_get_contents("sys/users.ID");
$sm = explode("\n",$ma);
$cn = count($sm);
//sys




    
   if($text=="/static" or $data=="stat"){
    bot("SendMessage",[ 
    'chat_id'=>$chat_id,
    'text'=>"Statistika: ".count($sm),
]);
return false;
}
  
    

/* ADMIN */
if($data=="send" && $chat_id==$admin){
save("sys/admin.id","send");
save("sys/send.ed","0");
save("sys/sed.ed","0");
bot("editMessageText",[
"message_id"=>$message_id,
'chat_id'=>$chat_id,
'text'=>"Forward Yuboring!","reply_markup"=>json_encode([
    "inline_keyboard"=>[
    [["text"=>"Bekor Qilish","callback_data"=>"un"]],
    ]])
    ]);
return false;
}
if($data=="un" && $chat_id==$admin){
save("sys/admin.id","mazza");
save("sys/send.ed","0");
save("sys/sed.ed","0");
bot("editMessageText",[
"message_id"=>$message_id,
'chat_id'=>$chat_id,
'text'=>"Bekor Qilindi","reply_markup"=>json_encode([
    "inline_keyboard"=>[
    [["text"=>"Panel","callback_data"=>"panel"]],
    ]])
    ]);
return false;
}

if($text=="/panel" or $data=="panel" && $chat_id==$admin){
    bot("SendMessage",[ 
    "chat_id"=>$chat_id,
    "text"=>"Panel",
    "reply_markup"=>json_encode([
    "inline_keyboard"=>[
    [["text"=>"Xabar yuborish","callback_data"=>"send"],["text"=>"Statistika","callback_data"=>"stat"]],
    ]])
    ]);
    }


if(open("sys/admin.id")=="send" && $chat_id==$admin){
$send2=bot("SendMessage",[ 
		"chat_id"=>$admin,
		"text"=>"Yuborish boshlandi!",
		]);
foreach($sm as $value) {
		    $send=bot('ForwardMessage', [
		         'chat_id' => $value,
		         'from_chat_id' => $chat_id,
		         'message_id'=>$message_id,
		    ]);//$send->ok, 1 = true, 0 = false.
		if($send->ok=="1"){
			$ok="Yuborildi";
			}
			if($send->ok=="0"){
			$ok="Yuborilmadi.";
			}
			$yuborildi = open("sys/sed.ed");
$yuborilmadi = open("sys/send.ed");
 if($ok == "Yuborilmadi."){
  save("sys/send.ed",$yuborilmadi+1);
 }
 if($ok=="Yuborildi."){
save("sys/sed.ed",$yuborildi+1);
 }

$yuborildi = open("sys/sed.ed");
$yuborilmadi = open("sys/send.ed");
$b_1 = $cn-$yuborilmadi;
$b_2 = $cn-$yuborildi;
$jami = $b_1+$b_2;
$ls = $cn-jami;
$all = $ls;


bot("editmessagetext",[
		"chat_id"=>$admin,
		"message_id"=>$send2->result->message_id,
		"text"=>"
Message ID: *".$send->result->message_id."*
Chat ID: *".$send->result->chat->id."*
Result -> *".$ok."*

Yuborildi: *$yuborildi*
Yuborilmadi: *$yuborilmadi*
Qoldi: *$ls*

Yuborildi *".foiz($jami,$all)."*

_Iltimos xabar yuborish yakulanmagunicha botga hech qanday xabar yubormang!_
Time: ".date('H:i:s'), 'parse_mode'=>"markdown"]);
if($cn==$yuborildi+$yuborilmadi){
   save("sys/admin.id","mazza");
   bot("editmessagetext",[
		"chat_id"=>$admin,
		"message_id"=>$send2->result->message_id,
		"text"=>"

Yuborildi: *$yuborildi*
Yuborilmadi: *$yuborilmadi*

Yuborildi *".foiz($jami,$all)."*

_Xabar yuborish yakunlandi!_
Time: ".date('H:i:s'), 'parse_mode'=>"markdown"]);
   }
}
}

/* USER */
if($text=="/start" or $text=="start"){
    bot("SendMessage",[ 
    "chat_id"=>$chat_id,
    "text"=>"Assalomu alaykum, botimizga xush kelibsiz! Ushbu bot orqali siz telefoningizni sotishingiz mumkin. Buning uchun quyidagi tugmani bosing.","parse_mode"=>html,
"reply_markup"=>$key
]);
save($chatting,null);
return false;
}

if(strpos(strtolower($text),"start")!==false){
$ex = explode(" ",$text);
$ex = $ex[1];
if($chat_id==$ex){
}else{
$ex = explode(" ",$text);
$ex = $ex[1];
save($chatting,$ex);
bot("SendMessage",[ 
"chat_id"=>$ex,
"text"=>"$name chatga qo'shildi! 
Xabariga javob qaytarish uchun uning xabariga reply qiling",
]);
bot("SendMessage",[ 
"chat_id"=>$chat_id,
"text"=>"Chat boshlandi!",
]);
}
}

if($message){
if($joinchat){
$text = str_replace(":",null,$text);
$name = str_replace(":",null,$name);
$name = str_replace("*",null,$name);
$name = str_replace("_",null,$name);
$name = str_replace("`",null,$name);
$text = str_replace("*",null,$text);
$text = str_replace("_",null,$text);
$name = str_replace("[",null,$name);
$name = str_replace("]",null,$name);
$text = str_replace("[",null,$text);
$text = str_replace("]",null,$text);
$name = str_replace("(",null,$name);
$name = str_replace(")",null,$name);
$text = str_replace("(",null,$text);
$text = str_replace(")",null,$text);
$text = str_replace("`",null,$text);
$de = ["1","2","3","4","5","6","7","8","9","0"];
$to = ["☀️","🌤️","⛅","🌥️","🌦️","☁️","🌨️","⛈️","🌩️","🌧️"];
$chatid = str_replace($de,$to,$chat_id);
$de = ["1","2","3","4","5","6","7","8","9","0"];
$to = ["☀️","🌤️","⛅","🌥️","🌦️","☁️","🌨️","⛈️","🌩️","🌧️"];
$messageid = str_replace($de,$to,$message_id);
bot('SendMessage',[
'chat_id'=>$joinchat,
'text'=>"

_$name _

*$text *

`hash:$chatid:$messageid`

","parse_mode"=>"markdown"
]);
return false;
}
}

if(strpos($reply,"hash")!==false){
$ex = explode(":",$reply);
$to = ["1","2","3","4","5","6","7","8","9","0"];
$de = ["☀️","🌤️","⛅","🌥️","🌦️","☁️","🌨️","⛈️","🌩️","🌧️"];
$decchat = str_replace($de,$to,$ex[1]);
$to = ["1","2","3","4","5","6","7","8","9","0"];
$de = ["☀️","🌤️","⛅","🌥️","🌦️","☁️","🌨️","⛈️","🌩️","🌧️"];
$decmessage = str_replace($de,$to,$ex[2]);
if(isset($message->audio)){
$file_id=$message->audio->file_id;
$type="audio";
}
if(isset($message->video)){
$file_id=$message->video->file_id;
$type="video";
}
if(isset($message->voice)){
$file_id=$message->voice->file_id;
$type="voice";
}
if(isset($message->photo)){
$file_id=$message->photo[count($message->photo)-1]->file_id;
$type="photo";
}
if(isset($message->sticker)){
$file_id=$message->sticker->file_id;
$type="sticker";
}
if(isset($message->video_note)){
$file_id=$message->video_note->file_id;
$type="video_note";
}
if(isset($message->document)){
$file_id=$message->document->file_id;
$type="document";
}
if(isset($message->animation)){
$file_id=$message->animation->file_id;
$type="animation";
}
if(isset($message->dice)){
$file_id=$message->dice->file_id;
$type="dice";
}

bot('Send'.$type.'',[
        "chat_id"=>$decchat,
        "$type"=>$file_id,
        'caption'=>$message->caption,
       "reply_to_message_id"=>$decmessage
	]);
bot('SendMessage',[
        "chat_id"=>$decchat,
        "text"=>$text,
       "reply_to_message_id"=>$decmessage
	]);
	return false;
	}

if($message or $data){
 $azo = bot("getchatmember",[
    "chat_id"=>$channel,
    "user_id"=>$chat_id,])->result->status;
    if($azo=="administrator" or $azo=="member" or $azo == "creator"){
        }else{
            bot("SendMessage",[ 
            "chat_id"=>$chat_id,
            "text"=>"Botdan to'liq foydalanish uchun $channel kanaliga obuna bo'lishingiz kerak! 
            Obuna bo'ling va qayta /start bosing! 
            ","reply_markup"=>json_encode(["inline_keyboard"=>[
            [["text"=>"Obuna bo'lish","url"=>"t.me/".str_replace('@',null,$channel)]]
            ]]),
            ]);
            return false;
            }
            }
////////


	




if($data=="add"){
    bot('editmessagetext',[
    'chat_id'=>$chat_id,
    "message_id"=>$message_id,
    "text"=>"Telefoningiz rasmini yuboring. Eslatma rasm tiniq formatda bo'lishi kerak va rasmda telefoningizni orqa va oldini aniq ko'rsatishga harakat qiling.",
    ]);
    save("sys/user/$chat_id/add.ID","add");
    }
    
    if(open($base)=="add" and isset($photo)){
$get = bot('getfile',['file_id'=>$file_id]);
$patch = $get->result->file_path;
save($mp, open('https://api.telegram.org/file/bot'.API_KEY.'/'.$patch));
    save($sy,"model");
    save($base,"error");
    bot("sendPhoto",[ 
    "chat_id"=>$chat_id,
    "photo"=>$file_id,
    "caption"=>"Rasm yuklab olindi! Endi Telefon modelini yozib yuboring:"]);
    }
    if(open($sy)=="model" and isset($text)){
        save($model,$text);
     save($sy,"gb");
    bot("sendPhoto",[ 
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
📱 Telefon: <b>$text</b>
Endi telefon xotirasini yozing:","parse_mode"=>html,
]);
return false;
}
    if(open($sy)=="gb" and isset($text)){
     save($sy,"color");
     save($gb,$text);
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b> $text </b>
Endi telefon rangini yozing:","parse_mode"=>html,
]);
return false;
}
    if(open($sy)=="color" and isset($text)){
        save($color,$text);
     save($sy,"var");
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>$text </b>
Endi telefon holatini yozing:","parse_mode"=>html,
]);
return false;
}
    if(open($sy)=="var" and isset($text)){
        save($var,$text);
     save($sy,"year");
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
    📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>$text </b>
Endi telefoningiz chiqqan yilini yozing:","parse_mode"=>html,
]);
return false;
}
    if(open($sy)=="year" and isset($text)){
        save($year,$text);
     save($sy,"camera");
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
        📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>$text</b>
Endi telefoningiz orqa kamera pikselini yozing:","parse_mode"=>html,
]);
return false;
}
    if(open($sy)=="camera" and isset($text)){
        save($camera,$text);
     save($sy,"selfie");
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
   📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>$text </b>
Endi telefoningiz selfi kamerasi pikselini yozing:","parse_mode"=>html,
]);
return false;
}
    if(open($sy)=="selfie" and isset($text)){
        save($selfie,$text);
     save($sy,"version");
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
       📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>$text </b>
Endi telefoningiz versiyasini yozing: (Misol uchun Android 11 yoki iOS 14)","parse_mode"=>html,
]);
return false;
}
    if(open($sy)=="version" and isset($text)){
        save($version,$text);
     save($sy,"battery");
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
         📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>$text </b>
Endi telefon batareykasini yozing (mAh) bilan:","parse_mode"=>html,
]);
return false;
}
    if(open($sy)=="battery" and isset($text)){
        save($battery,$text);
     save($sy,"info");
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
             📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>$text </b>
Endi telefoningiz haqida qo'shimcha izoh yozing:","parse_mode"=>html,
]);
return false;
}
    if(open($sy)=="info" and isset($text)){
        $d="2000";
    if(strlen($text) > $d){
          save($sy,"info");
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
             📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>$text </b>


Siz juda ko'p yozib yubordingiz!
Qayta izoh yozing!","parse_mode"=>html,
]);
return false;
}else{
    save($info,$text);
     save($sy,"buy");
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
               📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>$text </b>

Endi telefon narxini yozing:","parse_mode"=>html,
]);
return false;
}
}
    if(open($sy)=="buy" and isset($text)){
        save($buy,$text);
     save($sy,"loc");
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>".open($info)."</b>

💰Narxi <b> $text</b>
Yashash manzilingizni yozing:","parse_mode"=>html,
]);
return false;
}

    if(open($sy)=="loc" and isset($text)){
        save($loc,$text);
     save($sy,"call");
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
                 📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>".open($info)."</b>

💰Narxi <b>".open($buy)."</b>
🌍Manzil: <b>$text </b>

Ishlab turgan telefon raqamingizni yozib yuboring: (siz bilan bog'lanish uchun)
","parse_mode"=>html,]);
return false;
}

    if(open($sy)=="call" and isset($text)){
        save($call,$text);
     save($sy,"be together");
     save($base,"be together");
    bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
"photo"=>new CURLFile($mp),
    "caption"=>"
📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>".open($info)."</b>

💰Narxi <b>".open($buy)."</b>
🌍Joylashuv: <b>".open($loc)." </b>
📞Bog'lanish: <b>$text </b>

Ma'lumotlar saqlandi! 
Agarda hammasi tog'ri bo'lsa yuborish tugmasini bosing!
","parse_mode"=>html,"reply_markup"=>json_encode(["inline_keyboard"=>[
[["text"=>"✅Yuborish","callback_data"=>"send"],["text"=>"❌Bekor qilish","callback_data"=>"can"]],
]]),
]);
return false;
}


if($data=="send"){
 if(open("$sys/ok.id")=="ok"){
             bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
    "photo"=>new CURLFile($mp),
    "caption"=>"
    📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>".open($info)."</b>

💰Narxi <b>".open($buy)."</b>
🌍Joylashuv: <b>".open($loc)."</b>
📞Bog'lanish: <b>".open($call)."</b>

Sizning ma'lumotlaringiz tekshiruvga yuborildi, 10-15 daqiqada administratorlar tomonidan tekshirilib kanalga joylanadi!","parse_mode"=>"Mardkdown"
]);
     }else{
    save("$sys/ok.id","ok");
        bot("sendPhoto",[ //  
    "chat_id"=>$chat_id,
    "photo"=>new CURLFile($mp),
    "caption"=>"
    📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>".open($info)."</b>

💰Narxi <b>".open($buy)."</b>
🌍Joylashuv: <b>".open($loc)."</b>
📞Bog'lanish: <b>".open($call)."</b>

Sizning ma'lumotlaringiz tekshiruvga yuborildi, 10-15 daqiqada administratorlar tomonidan tekshirilib kanalga joylanadi!","parse_mode"=>"Mardkdown"
]);
    bot("sendPhoto",[ //  
    "chat_id"=>$admin,
    "photo"=>new CURLFile($mp),
    "caption"=>"
    📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>".open($info)."</b>

💰Narxi <b>".open($buy)."</b>
🌍Joylashuv: <b>".open($loc)."</b>
📞Bog'lanish: <b>".open($call)."</b>
","parse_mode"=>html,
"reply_markup"=>json_encode(["inline_keyboard"=>[
[["text"=>"Aloqa","url"=>"tg://user?id=$chat_id"]],
[["text"=>"Kanalga yuborish","callback_data"=>"go|$chat_id"]],
[["text"=>"Bekor qilish","callback_data"=>"cancel|$chat_id"]],
]]),
]);
}
}

if(strpos($data,"go")!==false and $chat_id==$admin){
$ex=explode("|",$data);
$sys="sys/user/$ex[1]";
$mp="sys/user/$ex[1]/photo.jpg";
$sy="sys/user/$chat_id/sy.ID";
$model = "$sys/model.id";
$color = "$sys/color.id";
$var = "$sys/var.id";
$year = "$sys/year.id";
$gb = "$sys/gb.id";
$camera = "$sys/camera.id";
$selfie = "$sys/selfie.id";
$version = "$sys/version.id";
$battery = "$sys/battery.id";
$buy = "$sys/buy.id";
$call = "$sys/call.id";
$loc = "$sys/location.id";
$info = "$sys/info.id";
save("$sys/ok.id",null);
        bot("sendPhoto",[ //  
    "chat_id"=>$admin,
    "photo"=>new CURLFile($mp),
    "caption"=>"
    📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>".open($info)."</b>

💰Narxi <b>".open($buy)."</b>
🌍Joylashuv: <b>".open($loc)."</b>
📞Bog'lanish: <b>".open($call)."</b>

YUBORILDI!
","parse_mode"=>html,
"reply_markup"=>json_encode(["inline_keyboard"=>[
[["text"=>"Sotib olish","url"=>"tg://user?id=$ex[1]"]],
]]),
]);
bot("sendPhoto",[ //  
    "chat_id"=>$ex[1],
    "photo"=>new CURLFile($mp),
    "caption"=>"
    📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>".open($info)."</b>

💰Narxi <b>".open($buy)."</b>
🌍Joylashuv: <b>".open($loc)."</b>
📞Bog'lanish: <b>".open($call)."</b>

Sizning e'loningiz muvaffaqqiyatli kanalga yuborildi!
","parse_mode"=>html,
]);
bot("sendPhoto",[ //  
    "chat_id"=>$channel,
    "photo"=>new CURLFile($mp),
    "caption"=>"
    📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>".open($info)."</b>

💰Narxi <b>".open($buy)."</b>
🌍Joylashuv: <b>".open($loc)."</b>
📞Bog'lanish: <b>".open($call)."</b>
","parse_mode"=>html,
"reply_markup"=>json_encode(["inline_keyboard"=>[
[["text"=>"Sotib olish","url"=>"tg://user?id=$ex[1]"]],
]]),
]);
}
if(strpos($data,"cancel")!==false and $chat_id==$admin){
$ex=explode("|",$data);
$sys="sys/user/$ex[1]";
$mp="sys/user/$ex[1]/photo.jpg";
$base="sys/user/$chat_id/add.ID";
$sy="sys/user/$chat_id/sy.ID";
$model = "$sys/model.id";
$color = "$sys/color.id";
$var = "$sys/var.id";
$year = "$sys/year.id";
$gb = "$sys/gb.id";
$camera = "$sys/camera.id";
$selfie = "$sys/selfie.id";
$version = "$sys/version.id";
$battery = "$sys/battery.id";
$buy = "$sys/buy.id";
$call = "$sys/call.id";
$loc = "$sys/location.id";
$info = "$sys/info.id";
save("$sys/ok.id",null);
        bot("sendPhoto",[ //  
    "chat_id"=>$admin,
    "photo"=>new CURLFile($mp),
    "caption"=>"
    📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>".open($info)."</b>

💰Narxi <b>".open($buy)."</b>
🌍Joylashuv: <b>".open($loc)."</b>
📞Bog'lanish: <b>".open($call)."</b>

YUBORILDI!
","parse_mode"=>html,
"reply_markup"=>json_encode(["inline_keyboard"=>[
[["text"=>"Sotib olish","url"=>"tg://user?id=$chat_id"]],
]]),
]);
bot("sendPhoto",[ //  
    "chat_id"=>$ex[1],
    "photo"=>new CURLFile($mp),
    "caption"=>"
    📱Telefon: <b>".open($model)."</b>
🗂️Xotira: <b>".open($gb)."</b>
🎨Rangi: <b>".open($color)."</b>
🧰Holati: <b>".open($var)."</b>
🗓️Chiqqan yili: <b>".open($year)."</b>
📸Orqa kamerasi: <b>".open($camera)."</b>
🤳🏻Selfi kamerasi <b>".open($selfie)."</b>
🆚Versiyasi: <b>".open($version)."</b>
🔋Batareykasi: <b>".open($battery)."</b>

ℹ️Qo'shimcha ma'lumot: <b>".open($info)."</b>

💰Narxi <b>".open($buy)."</b>
🌍Joylashuv: <b>".open($loc)."</b>
📞Bog'lanish: <b>".open($call)."</b>

Sizning e'loningizda xatolik aniqlandi. Qaytda tekshirib yuboring. Qanday muammo bo'lsa adminga xabar bering!
","parse_mode"=>html,
]);
}
    
    
 


