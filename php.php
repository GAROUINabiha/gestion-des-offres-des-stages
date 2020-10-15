<?php
require 'simple_html_dom.php';

$html = file_get_html('https://www.optioncarriere.tn/emploi-stage-en-informatique.html');
//$type = $html->find('.title', 0);
$doc = new DOMDocument;
$doc->loadHTML('$html');
$xpath = new DOMXpath($doc);
$nodeList = $xpath->query(' //*[@id="container_ee57a49ae4117f27bbfef7759922b24d"]/span[0]');
foreach($nodeList as $node)
{
    echo trim($node->textContent);
}
?>