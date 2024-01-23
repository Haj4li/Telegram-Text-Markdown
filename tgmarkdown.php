<?php


// Telegram text markdown
// Coded By Ali Nakhaee
// https://github.com/Haj4li

function MarkDown($string, $entities) {
    $stringfinal = $string;
    $offsetCorrection = 0;
    $prevst = 0;
    $prevlen = 0;
    foreach ($entities as $entity) {

        $start = $entity->offset + $offsetCorrection;
        if ( $entity->offset == $prevst)
        {
            $start -= $prevlen;
        }
        
        $text = substr($stringfinal, $start, $entity->length);
        $frmt = "";
        switch ($entity->type) {
            case 'text_link':
                $frmt = "<a href='".$entity->url."'>".$text."</a>";
                $prevlen = strlen("</a>");
                break;
            case 'code':
                $frmt = "<code>".$text."</code>";
                break;
            case 'spoiler':
                $frmt = "<span class='tg-spoiler'>".$text."</span>";
                $prevlen = strlen("</span>");
                break;
            case 'bold':
                $frmt = "<b>".$text."</b>";
                $prevlen = strlen("</b>");
                break;
            case 'italic':
                $frmt = "<i>".$text."</i>";
                $prevlen = strlen("</i>");
                break;
            case 'underline':
                $frmt = "<u>".$text."</u>";
                $prevlen = strlen("</u>");
                break;
            case 'blockquote':
                $frmt = "<blockquote>".$text."</blockquote>";
                $prevlen = strlen("</blockquote>");
                break;
            case 'strikethrough':
                $frmt = "<s>".$text."</s>";
                $prevlen = strlen("</s>");
                break;
            case 'pre':
                $frmt = "<pre  language='".$entity->language."'>".$text."</pre>";
                $prevlen = strlen("</pre>");
                break;
            default:
                continue 2;
        }
        $stringfinal = substr_replace($stringfinal, $frmt, $start, $entity->length);
        $offsetCorrection += strlen($frmt) - $entity->length;
        $prevst =  $entity->offset;
    }
    return $stringfinal;
}

$update = '{"update_id":0,"message":{"message_id":0,"from":{"id":0,"is_bot":false,"first_name":"0","username":"0","language_code":"0"},"chat":{"id":0,"first_name":"0","username":"0","type":"0"},"date":0,"text":"Its Me hello from earth  monotext strike  underline link \nBooooooSoooooldssssss","entities":[{"offset":0,"length":6,"type":"spoiler"},{"offset":13,"length":4,"type":"italic"},{"offset":18,"length":5,"type":"bold"},{"offset":25,"length":8,"type":"code"},{"offset":34,"length":6,"type":"strikethrough"},{"offset":42,"length":9,"type":"underline"},{"offset":52,"length":4,"type":"text_link","url":"http:\/\/google.com\/"},{"offset":57,"length":7,"type":"bold"},{"offset":64,"length":13,"type":"bold"},{"offset":64,"length":8,"type":"spoiler"}],"link_preview_options":{"is_disabled":true}}}';
$update = json_decode($update);

echo MarkDown($update->message->text,$update->message->entities);


?>
