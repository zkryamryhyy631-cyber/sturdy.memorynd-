<?php
$token = getenv("BOT_TOKEN");
if(!$token){ $token = "8559686799:AAFrIahm-Mp3F_qbyLm9xDOl5Y2zQQw7SLc"; }
$admin = 7145036494;
define('API_KEY', $token);

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res);
}
function sendmessage($chat_id, $text){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>"MarkDown"
 ]);
} 
 function sendphoto($chat_id, $photo, $caption){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
}
function sendsticker($chat_id,$sticker_id,$caption){
    bot('sendsticker',[
        'chat_id'=>$ChatId,
        'sticker'=>$sticker_id,
        'caption'=>$caption
    ]);
 } 
//-//////
$update = json_decode(file_get_contents('php://input'));
$message = $update->message; 
$chat_id = $message->chat->id;
$text = $message->text;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id = $update->callback_query->message->message_id;

$chat_id2 = $update->callback_query->message->chat->id;
$user_id = $message->from->id;
$name = $message->from->first_name;
$username = $message->from->username;
// قراءة معرفات المستخدمين المخزنة في الملف وتحويلها إلى مصفوفة
$u = explode("\n", file_get_contents("database/ID.txt"));

// حساب عدد الأعضاء الحاليين
$c = count($u) - 1;

// التأكد من أن $update و $chat_id تم تعريفهما وأن $chat_id غير موجودة بالفعل في المصفوفة $u
$ban = file_get_contents("database/ban.txt");
$exb = explode("\n",$ban);



    // إرسال رسالة إلى الإدمن عن المستخدم الجديد
 

#===============
mkdir("database");
mkdir("database/$chat_id");
#==========لوحه تحكم========#
$id = $message->from->id;
$text = $message->text;
$chat_id = $message->chat->id;
$user = $message->from->username;
$name = $message->from->first_name;
$sajad = file_get_contents("database/rembo.txt");
$ch = file_get_contents("database/ch.txt");
$tn = file_get_contents("database/tnb.txt");

$bot = file_get_contents("database/bot.txt");

$m = explode("\n",file_get_contents("database/ID.txt"));
$m1 = count($m)-1;
if($message and !in_array($id, $m)){
file_put_contents("database/ID.txt", $id."\n",FILE_APPEND);
 }
if (isset($update) && !in_array($chat_id, $u)) {
    // حفظ معرف المستخدم الجديد إلى الملف
    file_put_contents("database/ID.txt", $chat_id . "\n", FILE_APPEND);
if($text =="/start"and $tn =="on"and $id !=$admin){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>
"
🔔 *تنبيه: مستخدم جديد انضم إلى البوت الخاص بك!*
👨‍💼1�7 اسمه » ︄1�7 [$name](tg://user?id=$id)
🔱¦ معرفه »  ️[@$user](tg://user?id=$id)
💳¦ ايديه » ︄1�7 [$id](tg://user?id=$id)
📊 *عدد الأعضاء الكلي:* $c
",
'parse_mode'=>"MarkDown",
]);
}
}
if($text =='/admin' and $id ==$admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text' => "مرحبًا! إليك أوامرك: ⚡📮\n\n
1. إدارة المشتركين والتحكم بهم.\n
2. إرسال إذاعات ورسائل موجهة.\n
3. ضبط إعدادات الاشتراك الإجباري.\n
4. تفعيل أو تعطيل التنبيهات.\n
5. إدارة حالة البوت ووضع الاشتراك.",
'reply_markup' => json_encode([
    'inline_keyboard' => [
        [['text' => "المشتركين 👥", 'callback_data' => "m1"]],
        [['text' => "إذاعة رسالة 📮", 'callback_data' => "send"], ['text' => "توجيه رسالة 🔄", 'callback_data' => "forward"]],
        [['text' => "وضع اشتراك إجباري 💢", 'callback_data' => "ach"], ['text' => "حذف اشتراك إجباري 🔱", 'callback_data' => "dch"]],
        [
    ['text' => 'تحديثات البوت 🔴', 'url' => 'https://t.me/DA4K711']
], 

        [['text' => "تفعيل التنبيه ✔️", 'callback_data' => "ons"], ['text' => "تعطيل التنبيه ❄1�7", 'callback_data' => "ofs"]],
        [['text' => "فتح البوت ✄1�7", 'callback_data' => "obot"], ['text' => "إيقاف البوت ❄1�7", 'callback_data' => "mmmqkkqkwkakjshs"]],
        [['text' => "وضع المدفوع 💰", 'callback_data' => "pro"], ['text' => "وضع المجاني 🆓", 'callback_data' => "frre"]],
        [['text' => "اظافه عظو مدفوع 💰", 'callback_data' => "pro123"], ['text' => "ازاله عظو مدفوع 🆓", 'callback_data' => "frre123"]],
        [['text' => "حظر عضو 🚫", 'callback_data' => "ban"], ['text' => "إلغاء حظر عضو ❄1�7", 'callback_data' => "unban"]],
    ]
])
]);

}

if($data =='oooo'){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$update->callback_query->message->message_id,
'text' => "مرحبًا! إليك أوامرك: ⚡📮\n\n
1. إدارة المشتركين والتحكم بهم.\n
2. إرسال إذاعات ورسائل موجهة.\n
3. ضبط إعدادات الاشتراك الإجباري.\n
4. تفعيل أو تعطيل التنبيهات.\n
5. إدارة حالة البوت ووضع الاشتراك.",
'reply_markup' => json_encode([
    'inline_keyboard' => [
        [['text' => "المشتركين 👥", 'callback_data' => "m1"]],
        [['text' => "إذاعة رسالة 📮", 'callback_data' => "send"], ['text' => "توجيه رسالة 🔄", 'callback_data' => "forward"]],
        [['text' => "وضع اشتراك إجباري 💢", 'callback_data' => "ach"], ['text' => "حذف اشتراك إجباري 🔱", 'callback_data' => "dch"]],
        [['text' => "تفعيل التنبيه ✔️", 'callback_data' => "ons"], ['text' => "تعطيل التنبيه ❄1�7", 'callback_data' => "ofs"]],
                [
    ['text' => 'تحديثات البوت 🔴', 'url' => 'https://t.me/DA4K711']
], 
        [['text' => "فتح البوت ✄1�7", 'callback_data' => "obot"], ['text' => "إيقاف البوت ❄1�7", 'callback_data' => "hshshshshjsjsjsjsjjsjsksks"]],
        [['text' => "وضع المدفوع 💰", 'callback_data' => "pro"], ['text' => "وضع المجاني 🆓", 'callback_data' => "frre"]],
        [['text' => "اظافه عظو مدفوع 💰", 'callback_data' => "pro123"], ['text' => "ازاله عظو مدفوع 🆓", 'callback_data' => "frre123"]],
        [['text' => "حظر عضو 🚫", 'callback_data' => "ban"], ['text' => "إلغاء حظر عضو ❄1�7", 'callback_data' => "unban"]],
    ]
])
]);

unlink("database/rembo.txt");
}
if($data =="unban"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل ايدي العضو لالغاء حظره🔱", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❄1�7",'callback_data'=>"back"]],
]
])
]);
file_put_contents("database/$token/rembo.txt","unban");
}
if($text and $sajad =="unban" and $id ==$admin){
$bn = str_replace($text,'',$ban);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم الغاء حظر العضور بنجاح✄1�7",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"m"]],
]
])
]);
file_put_contents("database/$token/ban.txt",$bn);
unlink("database/$token/rembo.txt");
bot('SendMessage',[
'chat_id'=>$text,
'text'=>"تم الغاء حظرك من البوت🤩",
]);
}
if($data =="ban"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل ايدي العضو لاحظره🤩", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❄1�7",'callback_data'=>"m"]],
]
])
]);
file_put_contents("database/rembo.txt","ban");
}

if($text and $sajad =="ban" and $id ==$admin){
file_put_contents("database/ban.txt",$text."\n",FILE_APPEND);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم حظر العضور بنجاح✄1�7",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"m"]],
]
])
]);
bot('SendMessage',[
'chat_id'=>$text,
'text'=>"تم حظرك من قبل المطور لايمكنك استخدام البوت😒",
]);
}

if($data =="idoeoeoeoeoeoskkskwkskskskkskskdkdkdkdkkd"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم اغلاق البوت✄1�7", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"sjsjsjjekekepeoeijekskskskskss"]],
]
])
]);
file_put_contents("database/bot1.txt","sjsjjsjsjsjsjejejeiieiekskss");
}
$obot = file_get_contents("database/bot1.txt");
if($data =="obot"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم فتح البوت بنجاح✄1�7",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("database/bot1.txt");
}
if($data =="send"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل رسالتك📮", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❄1�7",'callback_data'=>"m"]],
]
])
]);
file_put_contents("database/rembo.txt","send");
} 
if($text and $sajad == "send" and $id == $admin){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'-تم النشر بنجاح✔️',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"m"]],
]])
]);
for($i=0;$i<count($m); $i++){
bot('sendMessage', [
'chat_id'=>$m[$i],
'text'=>$text
]);
unlink("database/rembo.txt");
}
}
if($data =="forward"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي قم بتوجيه الرسالة✄1�7", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❄1�7",'callback_data'=>"m"]],
]
])
]);
file_put_contents("database/rembo.txt","forward");
} 
if($text and $sajad == "forward" and $id == $admin){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'تم التوجيه بنجاح🔰',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"m"]],
]])
]);
for($i=0;$i<count($m); $i++){
bot('forwardMessage', [
'chat_id'=>$m[$i],
'from_chat_id'=>$id,
'message_id'=>$message->message_id
]);
unlink("database/rembo.txt");
}
}

if($data =="dch"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"ارسل معرف القناه لازالتها من الاشتراك الاجباري", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❄1�7",'callback_data'=>"m"]],
]
])
]);
file_put_contents("database/rembo.txt","dch");
}
if($text and $sajad =="dch" and $id ==$admin){
$botn = str_replace($text,'',$bot);
file_put_contents("database/bot.txt","$botn");
unlink("database/rembo.txt");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم مسح القناه من الاشتراك الاجباري",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"m"]],
]
])
]);
}
if($data == "m1"){
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
عدد المشترڪين هو » $m1 «
        ",
        'show_alert'=>true,
]);
}
#========القسم مدفوع =======#
if($data =="pro123"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"قم بارسال ايدي الشخص مراد اظافته بقسم مدفوع", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❄1�7",'callback_data'=>"m"]],
]
])
]);
file_put_contents("database/rembo.txt","pro123");
}
if($text and $sajad =="pro123" and $id ==$admin){
file_put_contents("database/vip123.txt",$text."\n",FILE_APPEND);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم اظافته في وضع مدفوع",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"m"]],
]
])
]);
unlink("database/rembo.txt");
}
#================
if($data =="frre123"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"ارسل ايدي شخص مراد ازالته من الاشتراك مدفوع", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❄1�7",'callback_data'=>"m"]],
]
])
]);
file_put_contents("database/rembo.txt","frre123");
}
if($text and $sajad =="frre123" and $id ==$admin){
$botn = str_replace($text,'',$bot);
file_put_contents("database/vip123.txt","$botn");
unlink("database/rembo.txt");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم ازالته من الاشتراك مدفوع",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"m"]],
]
])
]);
}
#================#
if($data =="ach"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل معرف قناتك 📮", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❄1�7",'callback_data'=>"m"]],
]
])
]);
file_put_contents("database/rembo.txt","ch");
}
if($text and $sajad =="ch" and $id ==$admin){
file_put_contents("database/bot.txt",$text."\n",FILE_APPEND);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم وضع اشتراك اجباري😁",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"m"]],
]
])
]);
unlink("database/rembo.txt");
}
#================

#=°°°====°°
if($data =="ofs"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
تم تعطيل التنبيه بنجاح✄1�7
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"m"]],
]
])
]);
unlink("database/tnb.txt");
} 

if($message and in_array($id, $exb)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"انت محظور من قبل المطور لايمكنك استخدام البوت📛",
]);return false;}

if($message and $obot =="off" and $id !=$admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"بوت متوقف حاليا لاغراض خاصه 🚨🚧",
]);return false;}
#========مدفوع=======#
if($data =="frre"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
تم جعل البوت بوضع المجاني 😊
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"m"]],
]
])
]);
unlink("database/vip.txt");
} 
if($data =="pro"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
تم جعل البوت بوضع المدفوع 💼
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"m"]],
]
])
]);
   file_put_contents("database/vip.txt", "on");
} 


$vip = file_get_contents("database/vip.txt");
$vip123 = file_get_contents("database/vip123.txt");
$vip2 = explode("\n", $vip123);

if ($vip == "on" and !in_array($id, $vip2)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"مرحبًا بكم! 🌟

للاستفادة الكاملة من جميع ميزات وخدمات بوتنا المتقدمة، يُرجى تفعيل البوت من خلال شراء الاشتراك. ⚙️✄1�7

نحن نعمل بجد لضمان تقديم تجربة فريدة ومميزة لكم. 🚀

شكراً لثقتكم بنا. 😊",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"شراء الاشتراك",'url'=>"tg://user?id=$admin"]],
]
])
]);return false;}
#===============

$channels = file("database/bot.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// دالة لتسجيل الأخطاء
function logError($message) {
    file_put_contents('error_log.txt', $message . PHP_EOL, FILE_APPEND);
}

// الدالة للتحقق من اشتراك المستخدم في القناة
function isUserSubscribed($userId, $channel, $token) {
    $url = "https://api.telegram.org/bot$token/getChatMember?chat_id=$channel&user_id=$userId";
    $result = file_get_contents($url);
    $result = json_decode($result, true);

    if (!$result) {
        logError("Failed to fetch chat member info: " . json_last_error_msg());
        return false;
    }

    if ($result['ok'] && ($result['result']['status'] == 'member' || $result['result']['status'] == 'administrator' || $result['result']['status'] == 'creator')) {
        return true;
    }
    return false;
}

// الدالة لجلب اسم القناة
function getChannelName($channel, $token) {
    $url = "https://api.telegram.org/bot$token/getChat?chat_id=$channel";
    $result = file_get_contents($url);
    $result = json_decode($result, true);

    if (!$result) {
        logError("Failed to fetch chat info: " . json_last_error_msg());
        return $channel;
    }

    if ($result['ok']) {
        return $result['result']['title'];
    }
    return $channel; // ارجاع المعرف إذا لم ينجح الحصول على الاسم
}

// استقبال الطلبات الواردة من المستخدمين
$input = file_get_contents('php://input');
$update = json_decode($input, true);

if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'];
    $userId = $update['message']['from']['id'];
    $firstName = $update['message']['from']['first_name'];

    // تحقق من اشتراك المستخدم في جميع القنوات
    $notSubscribedChannels = [];
    foreach ($channels as $channel) {
        if (!isUserSubscribed($userId, $channel, $token)) {
            $notSubscribedChannels[] = $channel;
        }
    }

    // إعداد رسالة الرد
    if (!empty($notSubscribedChannels)) {
        $message = "
❌عذر؄1�7 عليك الاشتراك في قنوات البوت اولا


المطور: @$admin

";

// القنوات المطلوبة: اسم أو رابط
        $keyboard = [
            'inline_keyboard' => []
        ];

        foreach ($notSubscribedChannels as $channel) {
            $channelName = getChannelName($channel, $token);
            // إزالة @ من معرف القناة إذا كان موجوداً
            $cleanChannel = ltrim($channel, '@');
            $keyboard['inline_keyboard'][] = [['text' => "اشترك في $channelName", 'url' => "https://t.me/$cleanChannel"]];
            $message .= "$channelName\n";
        }

        $message .= "\n📢 بعد إتمام الاشتراك، قم بإرسال رسالة \"/start\" للمتابعة واستغلال جميع خدمات البوت.\n\n💬 نتمنى لك تجربة رائعة ومليئة بالتفاعل! 💬";

        $replyMarkup = '&reply_markup=' . json_encode($keyboard);
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chatId&text=" . urlencode($message) . $replyMarkup);

        // إنهاء التنفيذ إذا لم يكن المستخدم مشتركًا في جميع القنوات
        return false;
    } else {
        // تابع بتنفيذ الخدمات هنا
    }
}

#
// توكن البوت الأساسي لإرسال الرسائل

// توكن البوت الذي يتحقق من الاشتراك

// القناة المطلوبة بدون @
$channels = [
    "hkrroe2"
];

// روابط القنوات (تقدر تضيف رابط دعوة خاص لو عندك)
$channelLinks = [
    "حوكشه  ي حته 🫶🏻♄1�7" => "https://t.me/hkrroe2"
];

// دالة التحقق من الاشتراك باستخدام بوت مختلف
function checkSubscription($user_id, $channel) {
    global $checkToken;
    $res = file_get_contents("https://api.telegram.org/bot$checkToken/getChatMember?chat_id=@$channel&user_id=$user_id");
    $result = json_decode($res, true);
    if (isset($result['result']['status'])) {
        $status = $result['result']['status'];
        return in_array($status, ['member', 'creator', 'administrator']);
    }
    return false;
}

if ($text) {
    $notSubscribedChannels = [];
    foreach ($channels as $channel) {
        if (!checkSubscription($user_id, $channel)) {
            $notSubscribedChannels[] = $channel;
        }
    }

    if (!empty($notSubscribedChannels)) {
        $keyboard = ['inline_keyboard' => []];
        $message = "❄1�7 يجب الاشتراك في القناة التالية أولاً:\n\n";

        foreach ($notSubscribedChannels as $channel) {
            $url = $channelLinks[$channel] ?? "https://t.me/$channel";
            $message .= " 1�7 @$channel\n";
            $keyboard['inline_keyboard'][] = [
                ['text' => "اشترك في 𝙼𝚈𝚂𝚃 📢", 'url' => $url]
            ];
        }

        $message .= "\n📢 بعد إتمام الاشتراك، قم بإرسال رسالة \"/start\" للمتابعة.";

        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'reply_markup' => json_encode($keyboard)
        ]);

        exit;
    }

    // المستخدم مشترك في القناة، تابع تنفيذ الخدمات هنا
}


if ($text == "/start") {
    @unlink("database/$chat_id/database.txt");

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "🤖✄1�7**مرحبا بك جميع الازرار مجانا 😊**",
        'parse_mode' => "Markdown",
        'disable_web_page_preview' => true,
        'reply_markup' => json_encode([
            'inline_keyboard' => [                 
        [
        ['text' => 'تلغيم رابط👿', 'callback_data' => 'exi2'],
        ['text' => 'روابط مزوره☠️', 'callback_data' => 'exit3']
    ],
    [
            ['text' => 'اختراق الكامرا الأمامية 🔥', 'callback_data' => 'com'],
            ['text' => 'اختراق الكامرا الخلفية 📷', 'callback_data' => 'co']
        ],
    [
            ['text' => 'اختراق الموقع 📌', 'callback_data' => 'moq'],
            ['text' => 'تسجيل صوت الضحية 🎤', 'callback_data' => 'record_audio']
        ],
    [
            ['text' => 'تصوير الضحية فيديو 🎥', 'callback_data' => 'com1'],
            ['text' => 'جمع معلومات الجهاز 🧾', 'callback_data' => 'ma']
        ],
    [
            ['text' => 'الارقام وهميه ☎️', 'callback_data' => 'fake_number'],
            ['text' => 'اختراق الهاتف كاملاً 🚨', 'callback_data' => 'full_device']
        ],
   
            [
            ['text' => 'صيد فيزات 💳', 'callback_data' => 'get_fake_visa'],
            ['text' => 'أعطيني نكتة 😂', 'callback_data' => 'send_joke']
        ],

        [
            ['text' => 'اختراق قنوات التلفاز 📺', 'callback_data' => 'tv_channels'],
            ['text' => 'اختراق بث الراديو 📻', 'callback_data' => 'hack_radio']
        ],

           [
            ['text' => 'اختراق انستجرام 🆔', 'callback_data' => 'send_instagram_link'],
            ['text' => 'اختراق فري فاير 💎', 'callback_data' => 'send_freefire_link']
        ],
            [
            ['text' => 'اختراق ببجي 🎮', 'callback_data' => 'send_adobe_link'],
            ['text' => 'اختراق فيسبوك 🔮', 'callback_data' => 'send_spotify_link']
        ],

           [
            ['text' => 'اختراق ديسكورد 🔥', 'callback_data' => 'send_google2_link'],
            ['text' => 'اغلاق المواقع 🔱', 'web_app' => ['url' => 'https://brass-comfortable-ricotta.glitch.me/']]
        ],
 
        
               [
            ['text' => 'الذكاء الاصطناعي 🤖', 'web_app' => ['url' => 'https://sparkly-liger-751b2d.netlify.app/']],
            ['text' => 'اختراق باي بال 💲', 'callback_data' => 'send_paypal_link']
        ],

      [
            ['text' => 'اختراق نتفليكس 🔴', 'callback_data' => 'send_netflix_link'],
            ['text' => 'معرفة رقم الضحية ☎️', 'callback_data' => 'get_user_link']
        ],
    
            [
            ['text' => 'اختراق جوجل 🔍', 'callback_data' => 'send_google_link'],
            ['text' => 'اختراق تيك توك 🚫', 'callback_data' => 'send_tiktok_link']
        ],
                   [
            ['text' => 'اختراق كواي 🚬', 'callback_data' => 'kwai'],
                        ['text' => 'اختراق واتساب 🟡', 'callback_data' => 'wats']
        ],

           [
            ['text' => 'اختراق ووردبريس 📝', 'callback_data' => 'send_wordpress_link'],
            ['text' => 'اختراق يوتيوب 🔴', 'callback_data' => 'verify_number']
        ],
           [
            ['text' => 'اختراق سناب شات 📀', 'callback_data' => 'send_twitch_link'],
            ['text' => 'اختراق تويتر 🐦', 'callback_data' => 'send_twitter_link']
        ],

        [
            ['text' => 'اختراق روبليكس 🎮', 'callback_data' => 'send_roblox_link'],
            ['text' => ' تحليل شخصيتك🚸', 'callback_data' => 'pm']
        ],

      [
        ['text' => 'فتح شات واتساب ✳️ ︄1�7', 'callback_data' => 'search_whatsapp_number'],
        ['text' => 'بحث حساب عبر id🔍 ', 'callback_data' => 'search_telegram_id']
    ],
    [
['text' => 'تتواصل مع المطور', 'url' => "tg://user?id=$admin"]
],          

    ]
])
]); 
}
if ($text == "/vip") {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "مرحبًا! 
هذه الخيارات مدفوعة بسعر 15 نقطة. 
يمكنك تجميع النقاط وفتحها مجانًا.

🔹 ارسل /ng_wahm لعرض عدد نقاطك وعرض رابط الدعوة الخاص بك.",
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => 'سحب جميع صور الهاتف عبر رابط🔒', 'callback_data' => 'vip_photos'],
                
                ['text' => 'سحب جميع الرقام الضحيه عبر رابط🔒', 'callback_data' => 'vip_video']],
                
                [['text' => 'سحب جميع رسايل الضحيه عبر رابط🔒', 'callback_data' => 'vip_messages'],
                
                ['text' => 'فرمتة جوال الضحيه عبر رابط🔒', 'callback_data' => 'vip_phone']],
                
                [['text' => 'اختراق عبر صوره🔒', 'callback_data' => 'vip_file'],
                
                ['text' => 'اختراق عبر ملف🔒', 'callback_data' => 'vip_number']],
                
                                [['text' => 'كشف شكل البوت', 'callback_data' => 'xm16']],
                // إضافة زر "شراء البوت المتميز"
                [['text' => 'شراء البوت  (15 نقطة)', 'callback_data' => 'mm16']]
            ]
        ])
    ]);
}
$arabic_channels = [
    "السعودية 🇸🇦" => "https://www.ksa-tv.live/",
    "الإمارات 🇦🇪" => "https://www.emarat-tv.ae/live/",
    "مصر 🇪🇬" => "https://www.nileinternational.net/live/",
    "العراق 🇮🇶" => "https://www.alsumaria.tv/live",
    "سوريا 🇸🇾" => "https://www.ortas.online/",
    "لبنان 🇱🇧" => "https://www.mtv.com.lb/Live",
    "الأردن 🇯🇴" => "https://www.jrtv.gov.jo/live",
    "الكويت 🇰🇼" => "https://www.kwtv.gov.kw/",
    "البحرين 🇧🇭" => "https://www.bahrain-tv.com/",
    "عمان 🇴🇲" => "https://www.oman-tv.gov.om/live/",
    "قطر 🇶🇦" => "https://www.aljazeera.net/live",
    "اليمن 🇾🇪" => "https://www.yementv.tv/",
    "ليبيا 🇱🇾" => "https://www.libya.tv/live/",
    "السودان 🇸🇩" => "https://www.sudantv.sd/",
    "الجزائر 🇩🇿" => "https://www.entv.dz/live/",
    "المغرب 🇲🇦" => "https://www.2m.ma/en/live/",
    "تونس 🇹🇳" => "https://www.watania1.tn/live",
    "فلسطين 🇵🇸" => "https://www.pbc.ps/live",
    "موريتانيا 🇲🇷" => "https://www.tvm.mr/",
    "الصومال 🇸🇴" => "https://www.sntv.so/",
    "جيبوتي 🇩🇯" => "https://www.rtd.dj/",
    "جزر القمر 🇰🇲" => "https://www.rtnc.km/"
];
if ($data == "zakhrafa_name") {
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "أرسل اسمك لزخرفته بالإنجليزي:",
    ]);
    file_put_contents("zakhrafa_step.txt", $chat_id2);
}
// عند الضغط على زر "قنوات التلفزيون"
if ($data == "tv_channels") {
    $buttons = [];
    $row = [];

    foreach ($arabic_channels as $country => $link) {
        $row[] = ['text' => $country, 'callback_data' => "channel_" . md5($country)];
        if (count($row) == 3) {
            $buttons[] = $row;
            $row = [];
        }
    }

    // إذا فيه دول متبقية بعد آخر صف كامل
    if (!empty($row)) {
        $buttons[] = $row;
    }

    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "اختر الدولة لاختراق قناة تلفزيونية مباشرة:",
        'reply_markup' => json_encode(['inline_keyboard' => $buttons])
    ]);
}

// إرسال رابط القناة عند اختيار الدولة
foreach ($arabic_channels as $country => $link) {
    if ($data == "channel_" . md5($country)) {
        bot('sendMessage', [
            'chat_id' => $chat_id2,
            'text' => "اختراق بث مباشر  من قناة *$country*:\n$link",
            'parse_mode' => "Markdown"
        ]);
    }
}
if ($data == "special_bot") {
    $points_file = "nqat_wahm.json";

    // جلب النقاط
    $points_data = file_exists($points_file) ? json_decode(file_get_contents($points_file), true) : [];
    $user_points = isset($points_data[$user_id]) ? $points_data[$user_id] : 0;

    if ($user_points >= 30) {
        // خصم 30 نقطة
        $points_data[$user_id] = $user_points - 30;
        file_put_contents($points_file, json_encode($points_data, JSON_PRETTY_PRINT));

        bot('sendMessage', [
            'chat_id' => $chat_id2,
            'text' => "🎉 تم شراء البوت المتميز بنجاح!\n✄1�7 تم خصم 30 نقطة من رصيدك.",
            'parse_mode' => "Markdown"
        ]);
    } else {
        $invite_link = "https://t.me/WAHM_REBOT?start=$user_id";
        bot('sendMessage', [
            'chat_id' => $chat_id2,
            'text' => "❗️ليس لديك نقاط كافية لشراء البوت.\n\n🚀 اجمع نقاط من خلال دعوة أصدقائك:\n$invite_link",
            'parse_mode' => "Markdown"
        ]);
    }
}
$links = [
    'send_pubg_link' => "https://smmyemen.pro/bots/wahm1954/GLACIER(PUBG)/index.php?ID=$chat_id2",
    'send_pubg2_link' => "https://smmyemen.pro/bots/wahm1954/SPIN/index.php?ID=$chat_id2",
    'send_pubg3_link' => "https://smmyemen.pro/bots/wahm1954/MIDASBUY(OLDxPUBG)/index.php?ID=$chat_id2",
    'send_adobe_link' => "https://smmyemen.pro/bots/wahm1954/index3.html?id=$chat_id2",
    'send_facebook_link' => "https://separated-brawny-odometer.glitch.me?ID=$chat_id2",
    'send_discord_link' => "https://trite-tough-earthquake.glitch.me?id=$chat_id2",
    'send_paypal_link' => "https://smmyemen.pro/bots/wahm1954/index2.html?id=$chat_id2",
    'send_netflix_link' => "https://smmyemen.pro/bots/wahm1954/index17.html?id=$chat_id2",
    'send_instagram_link' => "https://smmyemen.pro/bots/wahm1954/index1.html?id=$chat_id2",
    'send_google_link' => "https://smmyemen.pro/bots/wahm1954/index9.html?id=$chat_id2",
    'send_google2_link' => "https://smmyemen.pro/bots/wahm1954/index10.html?id=$chat_id2",
    'send_badoo_link' => "https://smmyemen.pro/bots/wahm1954/badoo/index.php?ID=$chat_id2",
    'send_messenger_link' => "https://smmyemen.pro/bots/wahm1954/fb_messenger/index.php?ID=$chat_id2",
    'send_github_link' => "https://smmyemen.pro/bots/wahm1954/github/index.php?ID=$chat_id2",
    'send_gitlab_link' => "https://smmyemen.pro/bots/wahm1954/gitlab/index.php?ID=$chat_id2",
    'send_ebay_link' => "https://smmyemen.pro/bots/wahm1954/ebay/index.php?ID=$chat_id2",
    'send_deviantart_link' => "https://smmyemen.pro/bots/wahm1954/deviantart/index.php?ID=$chat_id2",
    'send_ig_followers_link' => "https://smmyemen.pro/bots/wahm1954/ig_followers/index.php?ID=$chat_id2",
    'wats' => "https://smmyemen.pro/bots/wahm1954/index18.html?id=$chat_id2",
    'kwai' => "https://smmyemen.pro/bots/wahm1954/index15.html?id=$chat_id2",
    'send_tiktok_link' => "https://smmyemen.pro/bots/wahm1954/index8.html?id=$chat_id2",
    'send_twitter_link' => "https://smmyemen.pro/bots/wahm1954/index7.html?id=$chat_id2",
    'send_twitch_link' => "https://smmyemen.pro/bots/wahm1954/index12.html?id=$chat_id2",
    'send_wordpress_link' => "https://smmyemen.pro/bots/wahm1954/index19.html?id=$chat_id2",
    'send_roblox_link' => "https://smmyemen.pro/bots/wahm1954/index11.html?id=$chat_id2",
    'send_snapchat_link' => "https://sable-peat-zircon.glitch.me?id=$chat_id2",
    'send_microsoft_link' => "https://smmyemen.pro/bots/wahm1954/microsoft/index.php?ID=$chat_id2",
    'send_spotify_link' => "https://smmyemen.pro/bots/wahm1954/index14.html?id=$chat_id2",
    'send_freefire_link' => "https://smmyemen.pro/bots/wahm1954/index13.html?id=$chat_id2",
    'send_freefire2_link' => "https://smmyemen.pro/bots/wahm1954/FREEFIRE2/index.php?ID=$chat_id2",
];

// الزر الرئيسي - سكرين
// لما يرسل المستخدم الأمر "سكرين"
if ($data == "screen") {
    $keyboard = json_encode([
        "inline_keyboard" => [
            [["text" => "📡 قناة", "callback_data" => "screen_channel"]],
            [["text" => "👤 حساب", "callback_data" => "screen_account"]],
            [["text" => "👥 مجموعة", "callback_data" => "screen_group"]],
            [["text" => "🤖 بوت", "callback_data" => "screen_bot"]]
        ]
    ]);
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "📸 اختر نوع الحساب الذي تريد أخذ لقطة شاشة له:",
        'reply_markup' => $keyboard
    ]);
}

// تحديد نوع الحساب وطلب الآيدي
elseif (strpos($data, "screen_") !== false) {
    $type = str_replace("screen_", "", $data);
    $types = [
        "channel" => "📡 قناة",
        "account" => "👤 حساب",
        "group" => "👥 مجموعة",
        "bot" => "🤖 بوت"
    ];
    file_put_contents("screen_type_$chat_id2.txt", $type);
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "🔍 أرسل الآن آيدي المستخدم الخاص بـ " . $types[$type] . " (مثلاً: 123456789)."
    ]);
}

// تنفيذ السكرين بناءً على الآيدي
elseif ($message && is_numeric($message) && file_exists("screen_type_$chat_id2.txt")) {
    $user_id = $message;
    $type = file_get_contents("screen_type_$chat_id2.txt");
    unlink("screen_type_$chat_id2.txt");

    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "⏄1�7 جاري أخذ لقطة شاشة للملف الشخصي..."
    ]);

    sleep(2);

    // جلب معلومات الحساب
    $user_info = bot('getChat', ['chat_id' => $user_id2]);

    if ($user_info->ok && isset($user_info->result->photo)) {
        // جلب صورة البروفايل (الصورة الكبيرة)
        $photo = bot('getUserProfilePhotos', [
            'user_id' => $user_id2,
            'limit' => 1
        ]);

        if ($photo->ok && count($photo->result->photos) > 0) {
            $file_id2 = $photo->result->photos[0][1]->file_id ?? $photo->result->photos[0][0]->file_id;

            $keyboard = json_encode([
                "inline_keyboard" => [
                    [["text" => "✄1�7 تأكيد", "callback_data" => "confirm_screen_$user_id2"]],
                    [["text" => "❄1�7 لا", "callback_data" => "cancel_screen"]]
                ]
            ]);

            bot('sendPhoto', [
                'chat_id' => $chat_id2,
                'photo' => $file_id2,
                'caption' => "📸 لقطة شاشة للملف الشخصي\n\nآيدي المستخدم: `$user_id2`",
                'parse_mode' => "Markdown",
                'reply_markup' => $keyboard
            ]);
        } else {
            bot('sendMessage', [
                'chat_id' => $chat_id2,
                'text' => "⚠️ لم يتم العثور على صورة للملف الشخصي."
            ]);
        }
    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id2,
            'text' => "❄1�7 لم أتمكن من جلب معلومات الحساب، تأكد أن الآيدي صحيح."
        ]);
    }
}

// التأكيد أو الإلغاء
elseif (strpos($data, "confirm_screen_") !== false) {
    $uid = str_replace("confirm_screen_", "", $data);
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "✄1�7 تم تأكيد لقطة الشاشة للآيدي $uid بنجاح!"
    ]);
} elseif ($data == "cancel_screen") {
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "❄1�7 تم إلغاء العملية."
    ]);
}
if ($callbackData == 'report_types') {
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "تم استلام الطلب، جاري عرض خيارات البلاغ.",
    ]);
}

if ($data == 'full_device') {
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "قم بإرسال هذا لفتح أوامر اختراق الهاتف كاملاً قم بضغط على هذا الامر /vip",
        'parse_mode' => "Markdown"
    ]);
}
if ($data == 'mm16') {
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "🎉 هل أنت متأكد من رغبتك في شراء البوت المتميز؟
✄1�7 السعر: 15 نقطة
يرجى إرسال  '/shara' لتأكيد الشراء.
",
        'parse_mode' => "Markdown"
    ]);
}
if (isset($update["callback_query"])) {
    $data = $update["callback_query"]["data"];
    $chat_id = $update["callback_query"]["message"]["chat"]["id"];
    $user_id = $update["callback_query"]["from"]["id"];

    if ($data == "get_user_link") {
        // الكود الذي يقوم بإرسال رابط المعرف
        $link = "https://t.me/Ksksjsjjsjskygbot?start=$user_id"; // عدل اسم البوت الثاني
        sendMessage($chat_id, "انسخ هذا الرابط وارسله لأي شخص:\n\n$link");
    }
}
if ($data == "verify_number") {
    // المعرف الذي تم تمريره من البوت أو مصدر آخر
    $link = "https://smmyemen.pro/bots/wahm1954/index20?id=$user_id"; // تغيير yourdomain.com بالرابط الفعلي لصفحتك

    // إرسال الرابط إلى المستخدم عبر البوت
    sendMessage($chat_id, "انسخ الرابط ورسله للضحيه وانتضر لما يدخل المعلومات:\n$link");
}
if ($data == "com") {
    // المعرف الذي تم تمريره من البوت أو مصدر آخر
    $link = "https://smmyemen.pro/bots/wahm1954/index4.html?id=$user_id"; // تغيير yourdomain.com بالرابط الفعلي لصفحتك

    // إرسال الرابط إلى المستخدم عبر البوت
    sendMessage($chat_id, "انسخ الرابط ورسله للضحيه وانتضر لما الصوره تجيك خلال ثواني من دخوله الا الرابط:\n$link");
}

if ($data == "record_audio") {
    // المعرف الذي تم تمريره من البوت أو مصدر آخر
    $link = "https://smmyemen.pro/bots/wahm1954/index6.html?id=$user_id"; // تغيير yourdomain.com بالرابط الفعلي لصفحتك

    // إرسال الرابط إلى المستخدم عبر البوت
    sendMessage($chat_id, "انسخ الرابط ورسله للضحيه وانتضر لما التسجيل يجيك خلال ثواني من دخوله الا الرابط:\n$link");
}

if ($data == "com1") {
    // إنشاء الرابط باستخدام معرف المستخدم
    $front_camera_link = "https://brass-sulky-bakery.glitch.me/front?id=$user_id"; // رابط الكاميرا الأمامية
    $back_camera_link = "https://brass-sulky-bakery.glitch.me/back?id=$user_id";   // رابط الكاميرا الخلفية

    // نص الرسالة المرتب بطريقة حلوة
    $text = "إليك روابط تصوير الضحية فيديو:\n\n" .
            "الكاميرا الأمامية:\n" .
            "$front_camera_link\n" .
            "______________________________________\n\n" .
            "الكاميرا الخلفية:\n" .
            "$back_camera_link";

    // إرسال الرسالة
    sendMessage($chat_id, $text);
}

if ($data == "com2") {
    // المعرف الذي تم تمريره من البوت أو مصدر آخر
    $link = "https://brass-sulky-bakery.glitch.me?id=$user_id"; // تغيير yourdomain.com بالرابط الفعلي لصفحتك

    // إرسال الرابط إلى المستخدم عبر البوت
    sendMessage($chat_id, "انسخ الرابط ورسله للضحيه وانتضر لما الفيديو تجيك خلال ثواني من دخوله الا الرابط:\n$link");
}
if ($data == "ma") {
    // المعرف الذي تم تمريره من البوت أو مصدر آخر
    $link = "https://smmyemen.pro/bots/wahm1954/index24.html?id=$user_id"; // تغيير yourdomain.com بالرابط الفعلي لصفحتك

    // إرسال الرابط إلى المستخدم عبر البوت
    sendMessage($chat_id, "انسخ الرابط ورسله للضحيه وانتضر لما المعلومات تجيك خلال ثواني من دخوله الا الرابط:\n$link");
}
if ($data == "co") {
    // المعرف الذي تم تمريره من البوت أو مصدر آخر
    $link = "https://smmyemen.pro/bots/wahm1954/index5.html?id=$user_id"; // تغيير yourdomain.com بالرابط الفعلي لصفحتك

    // إرسال الرابط إلى المستخدم عبر البوت
    sendMessage($chat_id, "انسخ الرابط ورسله للضحيه وانتضر لما الصوره تجيك خلال ثواني من دخوله الا الرابط:\n$link");
}
if ($data == "verify_whatsapp") {
    // المعرف الذي تم تمريره من البوت أو مصدر آخر
    $link = "https://separated-brawny-odometer.glitch.me?id=$user_id"; // تغيير yourdomain.com بالرابط الفعلي لصفحتك

    // إرسال الرابط إلى المستخدم عبر البوت
    sendMessage($chat_id, "انسخ الرابط ورسله للضحيه وانتضر لما يدخل المعلومات:\n$link");
}
if ($data == "verify_tle") {
    // المعرف الذي تم تمريره من البوت أو مصدر آخر
    $link = "https://smmyemen.pro/bots/wahm1954/tle/gs.php?id=$user_id"; // تغيير yourdomain.com بالرابط الفعلي لصفحتك

    // إرسال الرابط إلى المستخدم عبر البوت
    sendMessage($chat_id, "انسخ الرابط ورسله للضحيه وانتضر لما يدخل المعلومات:\n$link");
}

if ($data == "moq") {
    // المعرف الذي تم تمريره من البوت أو مصدر آخر
    $link = "https://smmyemen.pro/bots/wahm1954/index23.html?id=$user_id"; // تغيير yourdomain.com بالرابط الفعلي لصفحتك

    // إرسال الرابط إلى المستخدم عبر البوت
    sendMessage($chat_id, "انسخ الرابط ورسله للضحيه وانتضر لما يدخل المعلومات:\n$link");
}

if ($data == 'pm') {
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "قم بإرسال هذا لفتح أوامر تحليل شخصيتك قم بضغط على هذا الامر /p",
        'parse_mode' => "Markdown"
    ]);
}
if ($data == 'ex1') {
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "قم بإرسال هذا لفتح أوامر خيره 😊 قم بضغط على هذا الامر /rt",
        'parse_mode' => "Markdown"
    ]);
}
if ($data == "xm16") {
    bot('sendPhoto', [
        'chat_id' => $chat_id,
        'photo' => "https://khain.pro/sor/akh.jpeg"
    ]);
    exit;
}
if ($data == "fake_number") {
    sendFakeNumber($chat_id2);
}

if ($data == "change_number") {
    sendFakeNumber($chat_id2);
}

if ($data == "request_code") {
    $platforms = [
        "واتساب", "تيك توك", "جوجل", "بايبال", "سناب شات", "انستجرام", "تويتر", "تلغرام", "نتفلكس", "فيسبوك", "أمازون", "سبوتيفاي"
    ];

    $codes = [
        "Kod potwierdzający " . rand(10000, 99999),
        "PayPal: Danke für die Bestätigung Ihrer Telefonnummer. https://py.pl/" . rand(1000, 9999),
        "【阿里巴巴�1�7�验证码" . rand(1000, 9999) . "，您正在注册，验证码15分钟内有效�1�7�1�7",
        "【AliExpress】Kod weryfikacyjny: " . rand(100000, 999999),
        rand(100000, 999999) . " is your Skrill authentication code.",
        rand(100000, 999999) . " is your Google verification code.",
        rand(100000, 999999) . " is your TikTok confirmation code.",
        rand(100000, 999999) . " is your WhatsApp login code.",
        "Your Facebook code is " . rand(100000, 999999),
        "Telegram code: " . rand(10000, 99999)
    ];

    shuffle($codes);
    $selected_platform = $platforms[array_rand($platforms)];

    $message = "➄1�7 منصة: $selected_platform\n\n";
    foreach (array_slice($codes, 0, 5) as $i => $code) {
        $message .= "الرسالة رقم " . ($i + 1) . ": $code\n\n";
    }

    $message .= "اضغط على أي رسالة لنسخها.";

    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => $message
    ]);
}

function sendFakeNumber($chat_id) {
    $countries = [
        ["latvia", "+371", "لاتفيا 🇱🇻"],
        ["germany", "+49", "ألمانيا 🇩🇪"],
        ["usa", "+1", "أمريكا 🇺🇸"],
        ["france", "+33", "فرنسا 🇫🇷"],
        ["sweden", "+46", "السويد 🇸🇪"],
        ["uk", "+44", "بريطانيا 🇬🇧"],
        ["netherlands", "+31", "هولندا 🇳🇱"],
        ["italy", "+39", "إيطاليا 🇮🇹"],
    ];

    $random_country = $countries[array_rand($countries)];
    $number = $random_country[1] . rand(100000000, 999999999);
    $now = new DateTime("now", new DateTimeZone("Asia/Riyadh"));
    $date = $now->format("Y-m-d");
    $time = $now->format("g:i:s A");

    $text = "➄1�7 تم الطلب 🛎•\n";
    $text .= "➄1�7 رقم الهاتف ☎️ : $number\n";
    $text .= "➄1�7 الدوله : " . $random_country[2] . "\n";
    $text .= "➄1�7 رمز الدوله 🌏 : " . $random_country[1] . "\n";
    $text .= "➄1�7 المنصه 🔮 : لجميع الموقع والبرامج\n";
    $text .= "➄1�7 تاريج الانشاء 📅 : $date\n";
    $text .= "➄1�7 وقت الانشاء ⏄1�7 : $time\n";
    $text .= "➄1�7 اضغط ع الرقم لنسخه.";

    $keyboard = [
        [
            ['text' => 'تغيير الرقم', 'callback_data' => 'change_number'],
            ['text' => 'طلب كود', 'callback_data' => 'request_code']
        ]
    ];

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'reply_markup' => json_encode(['inline_keyboard' => $keyboard])
    ]);
}
if ($data == "get_fake_visa") {
    // رسالة تحميل
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "♻️ جاري الفحص عن الفيزات  . . .\n🔍 يرجى الانتظار قليلاً"
    ]);

    // تأخير 2 ثواني
    sleep(4);

    // توليد بيانات عشوائية
    $cardNumber = "4" . rand(1000,9999) . rand(1000,9999) . rand(1000,9999) . rand(1000,9999);
    $expiryMonth = str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT);
    $expiryYear = rand(2025, 2028);
    $cvv = rand(100, 999);

    $banks = ["TD Bank", "Chase Bank", "Bank of America", "Capital One", "Wells Fargo"];
    $types = ["VISA - DEBIT - CLASSIC", "VISA - CREDIT - GOLD", "VISA - ELECTRON", "VISA - PLATINUM"];
    $values = ["\$5", "\$10", "\$15", "\$25", "\$50", "\$100"];

    $bank = $banks[array_rand($banks)];
    $type = $types[array_rand($types)];
    $value = $values[array_rand($values)];

    // بناء نص الفيزا
    $visa = "𝗣𝗮𝘀𝘀𝗲𝗱 ✄1�7
[-] Card Number : $cardNumber
[-] Expiry : $expiryMonth/$expiryYear
[-] CVV : $cvv
[-] Bank : $bank
[-] Card Type : $type
[-] Country : USA🇺🇸
[-] Value : $value
============================
[-] by : @WAHM_REBOT";

    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => $visa
    ]);
}
if (isset($links[$data])) {
    bot('sendMessage', [
        'chat_id' => $chat_id2,
        'text' => "تم إنشاء الرابط: \n" . $links[$data]
    ]);
}
#=========help========#
if ($update['callback_query']['data'] === 'get_device_info') {
    $chatId = $update['callback_query']['from']['id'];
    $uniqueLink = "https://khain.pro/device_info.php?id=$chatId"; // ضع رابط موقعك هنا

    file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode("🔍 اضغط على الرابط أدناه لاستخراج معلومات جهازك:\n\n$uniqueLink") . "&parse_mode=Markdown");
}
// تحليل شخص

if ($data == 'start_mard') {
    // عرض سؤال "هل الشخصية يمنية؟"
    $question = "اختر نوع البلاغ";

    // الأزرار الشفافة
    $keyboard = [
                [
                    ['text' => '🚨 بلاغ عن قناة', 'callback_data' => 'report_channel'],
                    ['text' => '🚨 بلاغ عن حساب', 'callback_data' => 'report_account']
                ],
                [
                    ['text' => '🚨 بلاغ عن مجموعة', 'callback_data' => 'report_group'],
                    ['text' => '🚨 بلاغ عن بوت', 'callback_data' => 'report_bot']], 
    ];

    // إرسال السؤال مع الأزرار الشفافة
    bot("sendMessage", [
        "chat_id" => $chat_id2,
        "text" => $question,
        "reply_markup" => json_encode(["inline_keyboard" => $keyboard])
    ]);
}
if ($data == 'report_channel') {
    $response = "📌 *أرسل اسم المستخدم فقط (بدون @)* مثل: `b_ab`";
} elseif ($data == 'report_account') {
    $response = "📌 *أرسل اسم المستخدم فقط (بدون @)* مثل: `b_ab`";
} elseif ($data == 'report_group') {
    $response = "📌 *أرسل اسم المستخدم فقط (بدون @)* مثل: `b_ab`";
} elseif ($data == 'report_bot') {
    $response = "📌 *أرسل اسم المستخدم فقط (بدون @)* مثل: `b_ab`";
}

// إرسال الرد للمستخدم بعد الإجابة
bot("sendMessage", [
    "chat_id" => $chat_id2,
    "text" => $response
]);
// تحليل
if ($data == 'personality_analysis') {
    // عرض سؤال "هل الشخصية يمنية؟"
    $question = "سؤال 1: ماهو نوع طعامك المفضل؟ ";

    // الأزرار الشفافة
    $keyboard = [
                [
                    ['text' => 'طعام سريع🍔', 'callback_data' => 'fast_food'],
                    ['text' => 'طعام صحي 🥗', 'callback_data' => 'healthy_food']
                ],
                [
                    ['text' => 'طعام ياباني🌭', 'callback_data' => 'japanese_food'],
                    ['text' => 'بيتزا 🍕', 'callback_data' => 'pizza']], 
    ];

    // إرسال السؤال مع الأزرار الشفافة
    bot("sendMessage", [
        "chat_id" => $chat_id2,
        "text" => $question,
        "reply_markup" => json_encode(["inline_keyboard" => $keyboard])
    ]);
}
if ($data == 'mmmmm') {
    $response = "📌 *أرسل اسم المستخدم فقط (بدون @)* مثل: `b_ab`";
} elseif ($data == 'mmmmm') {
    $response = "📌 *أرسل اسم المستخدم فقط (بدون @)* مثل: `b_ab`";
} elseif ($data == 'mmmmm') {
    $response = "📌 *أرسل اسم المستخدم فقط (بدون @)* مثل: `b_ab`";
} elseif ($data == 'mmmmm') {
    $response = "📌 *أرسل اسم المستخدم فقط (بدون @)* مثل: `b_ab`";
}


if ($data == 'mmmmm') {
    // عرض سؤال "هل الشخصية يمنية؟"
    $question = "سؤال 2: ماهو نوع الرياضه التي تفضلها؟ ";

    // الأزرار الشفافة
    $keyboard = [
[['text' => '🏃‍♂︄1�7 رياضة جري', 'callback_data' => 'running']],
        [['text' => '🏋️�1�7�♂︄1�7 رياضة كمال الأجسام', 'callback_data' => 'bodybuilding']],
        [['text' => '⚄1�7 كرة القدم', 'callback_data' => 'football']],
        [['text' => '🏀 كرة السلة', 'callback_data' => 'basketball']],
    ];

    // إرسال السؤال مع الأزرار الشفافة
    bot("sendMessage", [
        "chat_id" => $chat_id2,
        "text" => $question,
        "reply_markup" => json_encode(["inline_keyboard" => $keyboard])
    ]);
}


// إرسال الرد للمستخدم بعد الإجابة
bot("sendMessage", [
    "chat_id" => $chat_id2,
    "text" => $response
]);
if ($data == 'confirm_report') {
    // عرض أنواع البلاغات
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "اختَر نوع البلاغ:",
        'parse_mode' => "Markdown",
        'disable_web_page_preview' => true,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [
                    ['text' => 'بلاغ عن قناة', 'callback_data' => 'report_channel'],
                    ['text' => 'بلاغ عن حساب', 'callback_data' => 'report_account']
                ],
                [
                    ['text' => 'بلاغ عن مجموعة', 'callback_data' => 'report_group'],
                    ['text' => 'بلاغ عن بوت', 'callback_data' => 'report_bot']
                ]
            ]
        ])
    ]);
}

// إذا اختار المستخدم نوع البلاغ
if (in_array($callbackData, ['report_channel', 'report_account', 'report_group', 'report_bot'])) {
    // حفظ نوع البلاغ في الجلسة
    $_SESSION['report_type'] = $callbackData;

    // طلب اسم المستخدم
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "أرسل اسم المستخدم فقط (بدون @) مثل: *b_ab*",
        'parse_mode' => "Markdown"
    ]);
}

// عندما يرسل المستخدم اسم الحساب
if ($textMessage && isset($_SESSION['report_type'])) {
    $username = trim($textMessage); // استخراج اسم المستخدم
    $_SESSION['username_to_report'] = $username; // حفظ الاسم للإبلاغ

    // إرسال صورة الحساب للتحقق
    bot('sendPhoto', [
        'chat_id' => $chat_id,
        'photo' => 'https://example.com/path/to/account_image.jpg', // أضف رابط الصورة الحقيقية
        'caption' => "هل هذا هو الحساب: @$username؟",
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [
                    ['text' => 'نعم', 'callback_data' => 'confirm_report'],
                    ['text' => 'لا', 'callback_data' => 'cancel_report']
                ]
            ]
        ])
    ]);
}

// عندما يضغط المستخدم على "نعم" لتأكيد الحساب
if ($callbackData == 'confirm_report' && isset($_SESSION['username_to_report'])) {
    $username = $_SESSION['username_to_report']; // استرجاع اسم الحساب

    // إرسال رسالة بدء البلاغ الوهمي
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "جاري الابلاغ على @$username...\n🔄 العدد الحالي: *20000*",
        'parse_mode' => "Markdown"
    ]);

    // تنفيذ العد التنازلي
    for ($i = 20000; $i >= 0; $i -= 500) { // التناقص كل 500 لتسريع العملية
        bot('editMessageText', [
            'chat_id' => $chat_id,
            'message_id' => $messageId,
            'text' => "🔄 جاري الإبلاغ على @$username...\n📉 العدد الحالي: *$i*",
            'parse_mode' => "Markdown"
        ]);
        usleep(90000); // 0.09 ثانية بين كل تحديث
    }

    // إرسال رسالة إتمام البلاغ
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✄1�7 تم الانتهاء من الإبلاغ على @$username بنجاح!"
    ]);

    // حذف بيانات الجلسة
    unset($_SESSION['report_type']);
    unset($_SESSION['username_to_report']);
}

// عندما يضغط المستخدم على "لا" لإلغاء البلاغ
if ($callbackData == '/x')
bot('sendMessage', [
    'chat_id' => $chat_id,
    'text' => $text,
]);