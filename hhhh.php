<?php
require_once 'simple_html_dom.php';

$html = file_get_html('https://www.tanitjobs.com/jobs/?listing_type%5Bequal%5D=Job&searchId=1581866786.534&action=search&keywords%5Ball_words%5D=stage+informatique&GooglePlace%5Blocation%5D%5Bvalue%5D=&GooglePlace%5Blocation%5D%5Bradius%5D=50?searchId=1581866786.534&action=search&page=2');


$divClass = $title='';
$i =0;
foreach($html->find(".media") as $divClass) {
$h = 'https://www.tanitjobs.com';
$answer[$i]['lien'] = $h;
//title
foreach($divClass->find(".media-heading") as $title ) {
$text = html_entity_decode($title->plaintext);
$text = preg_replace('/((?<!.)\/(?=.))?((?<=.)\/(?!.))?/i', '', $text);
$answer[$i]['title'] = html_entity_decode($text);
$trimmed = trim($title);
}
//ipl-ratings-bar
foreach($divClass->find(".listing-item__info--item") as $location ) {
$answer[$i]['local'] = $location->plaintext;
$trimmed = trim($location);
}

//description
foreach($divClass->find(".listing-item__desc") as $desc) {
$text = html_entity_decode($desc->plaintext);
$text = preg_replace('/((?<!.)\/(?=.))?((?<=.)\/(?!.))?/i', '', $text);
$answer[$i]['content'] = html_entity_decode($text);
$trimmed = trim($text);

///

}
$i++;
}


print_r($answer);



