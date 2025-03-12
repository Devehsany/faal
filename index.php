<?php
error_reporting(0);

require __DIR__ . '/vendor/autoload.php';

use NanoTel\NanoTel;
use NanoTel\Event\Events;


$BOT_TOKEN = "7864086627:AAH3j9TiWEveBvLSUnZpktfO0968qggd8VA"; 
$BOT_NAME  = "FaalBot";         

$nt = new NanoTel($BOT_TOKEN);
$event = Events::getEvents();

if (!Events::has("message")) {
    exit;
}

$text    = mb_strtolower(trim($event->message->text));
$chat_id = $event->message->chat->id;
$tc      = $event->message->chat->type;



function fetchFaal()
{
    $api_url = "https://api.daradege.ir/faal";

    $ch = curl_init($api_url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 10
    ]);

    $image_data = curl_exec($ch);
    $error      = curl_errno($ch);
    curl_close($ch);

    if ($error || !$image_data) {
        return false;
    }

    $file_path = __DIR__ . "/faal_" . time() . ".jpg";
    file_put_contents($file_path, $image_data);
    
    return $file_path;
}


if ($text === "/start") {
    $message = "🎭 <b>به ربات فال‌گیر {$BOT_NAME} خوش آمدید!</b>\n\n";
    $message .= ($tc === "private") ?
        "✨ برای دریافت فال، فقط کلمه <b>فال</b> را ارسال کنید!" :
        "🪄 در گروه‌ها می‌توانید با ارسال دستور <code>فال</code> فال خود را دریافت کنید.";

    $nt->sendMessage(
        chat_id: $chat_id,
        text: $message,
        parse_mode: "HTML"
    );
    exit;
}


if ($text === "فال" || $text === "فال بگیر") {
    $image_path = fetchFaal();

    if ($image_path) {
        $nt->sendPhoto(
            chat_id: $chat_id,
            photo: $image_path,
            caption: "🔮 این هم فال شما! چه رازی در انتظار شماست؟ 🤔"
        );
    } else {
        $nt->sendMessage(
            chat_id: $chat_id,
            text: "❌ متأسفم! در دریافت فال مشکلی پیش آمد. لطفاً بعداً دوباره امتحان کنید."
        );
    }
    exit;
}
?>

