<?php
require_once 'simple_html_dom.php';

$html = file_get_html('https://www.tanitjobs.com/jobs/?listing_type%5Bequal%5D=Job&searchId=1581866786.534&action=search&keywords%5Ball_words%5D=stage+informatique&GooglePlace%5Blocation%5D%5Bvalue%5D=&GooglePlace%5Blocation%5D%5Bradius%5D=50?searchId=1581866786.534&action=search&page=3');


$divClass = $title='';
$i =0;
foreach($html->find(".media") as $divClass) {
$h = 'https://www.tanitjobs.com/jobs/?listing_type%5Bequal%5D=Job&searchId=1581866786.534&action=search&keywords%5Ball_words%5D=stage+informatique&GooglePlace%5Blocation%5D%5Bvalue%5D=&GooglePlace%5Blocation%5D%5Bradius%5D=50?searchId=1581866786.534&action=search&page=3';
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

 

//function definition to convert array to xml
//function defination to convert array to xml
function array_to_xml13( $answer, $xml_data ) {
    foreach( $answer as $key => $value ) {

        if( is_array($value) ) {


        

            if( is_numeric($key) ){
                $key = 'stage'; //dealing with <0/>..<n/> issues
                 
            }
            $subnode = $xml_data->addChild($key);

          
    	

            array_to_xml13($value, $subnode);

        
        } else {
            $xml_data->addChild("$key",htmlspecialchars("$value"));echo '</pre>';

        }
     }

}

// initializing or creating array
$data = array('total_stud' => 50000);
 echo '</pre>';
// creating object of SimpleXMLElement
 
$xml_data = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><pfa></pfa>', null, false);



// function call to convert array to xml
array_to_xml13($answer,$xml_data);

//saving generated xml file; 
$xml_data->preserveWhiteSpace = false;
$result = $xml_data->asXML('stage13.xml');



$conn = mysqli_connect("localhost", "root", "", "pfa");

$affectedRow = 0;

$xml = simplexml_load_file("stage13.xml") or die("Error: Cannot create object");

foreach ($xml->children() as $row) {

    $lien = $row->lien;
    $title = $row->title;
    $local = $row->local;
    $content = $row->content;
    
    $sql = "INSERT INTO stage(lien,title,local,content) VALUES ('" . $lien . "','" . $title . "','" . $local . "','" . $content . "')";
    
     $result = mysqli_query($conn, $sql);
    
    if (! empty($result)) {
        $affectedRow ++;
    } else {
        $error_message = mysqli_error($conn) . "\n";
    }
}









?>

