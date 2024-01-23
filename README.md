# Telegram-Text-Markdown
Telegram Text Markdown php

This simple php code can convert user's text or caption sent to their markdown html style

Refrences:

    https://core.telegram.org/bots/update56kabdkb12ibuisabdubodbasbdaosd
    https://core.telegram.org/api/entities

The text:
Its Me hello from earth monotext strike underline link BooooooSoooooldssssss

![image](https://github.com/Haj4li/Telegram-Text-Markdown/assets/48994331/7a82c42e-324f-4dbe-a2a4-910c2534f1d0)


Markdown result:
<span class='tg-spoiler'>Its Me</span> hello <i>from</i> <b>earth</b> <code>monotext</code> <s>strike</s> <u>underline</u> <a href='http://google.com/'>link</a> <b>Boooooo</b><b><span class='tg-spoiler'>Sooooold</span></b>ssssss


Example usage:
```
    $update = '{"update_id":0,"message":{"message_id":0,"from":{"id":0,"is_bot":false,"first_name":"0","username":"0","language_code":"en"},"chat":{"id":0,"first_name":"0","username":"0","type":"private"},"date":0,"text":"Its Me hello from earth monotext strike underline link BooooooSoooooldssssss","entities":[{"offset":0,"length":6,"type":"spoiler"},{"offset":13,"length":4,"type":"italic"},{"offset":18,"length":5,"type":"bold"},{"offset":24,"length":8,"type":"code"},{"offset":33,"length":6,"type":"strikethrough"},{"offset":40,"length":9,"type":"underline"},{"offset":50,"length":4,"type":"text_link","url":"http:\/\/google.com\/"},{"offset":55,"length":7,"type":"bold"},{"offset":62,"length":8,"type":"bold"},{"offset":62,"length":8,"type":"spoiler"}],"link_preview_options":{"is_disabled":true}}}';
  $update = json_decode($update);
  
  echo MarkDown($update->message->text,$update->message->entities);
```
