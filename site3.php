 <?php
require_once 'simple_html_dom.php';

$html = file_get_html('https://emploi.mitula.tn/emploi-stage-informatique-tunisie');


$divClass = $title='';
$i =0;
foreach($html->find(".lis_ting_Ad") as $divClass) {
$h = 'https://emploi.mitula.tn/emploi-stage-informatique-tunisie';
$answer[$i]['lien'] = $h;
//title
foreach($divClass->find(".title") as $title ) {
$text = html_entity_decode($title->plaintext);
$text = preg_replace('/((?<!.)\/(?=.))?((?<=.)\/(?!.))?/i', '', $text);
$answer[$i]['title'] = html_entity_decode($text);
$trimmed = trim($title);
}
//ipl-ratings-bar
foreach($divClass->find(".aLocation") as $location ) {
$answer[$i]['local'] = $location->plaintext;
$trimmed = trim($location);
}

//description
foreach($divClass->find(".adTeaser") as $desc) {
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
function array_to_xml2( $answer, $xml_data ) {
    foreach( $answer as $key => $value ) {

        if( is_array($value) ) {


        

            if( is_numeric($key) ){
                $key = 'stage'; //dealing with <0/>..<n/> issues
                 
            }
            $subnode = $xml_data->addChild($key);

          
    	

            array_to_xml2($value, $subnode);

        
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
array_to_xml2($answer,$xml_data);

//saving generated xml file; 
$result = $xml_data->asXML('site3.xml');


$conn = mysqli_connect("localhost", "root", "", "pfa");

$affectedRow = 0;

$xml = simplexml_load_file("site3.xml") or die("Error: Cannot create object");

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