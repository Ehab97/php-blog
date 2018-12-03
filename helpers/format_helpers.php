<?php
    //format function date
    function format_date($date){
        return date('F j,Y,g:j a',strtotime($date));
    }
   //format function short
function format_short($text,$chars=450){
    $text = $text." ";
    $text=substr($text,0,$chars);
    $text=substr($text,0,strrpos($text,' '));
    $text=$text."...";
    return $text;
}
?>