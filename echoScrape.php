<?php

require "simple_html_dom.php";

$html=file_get_html("http://stats.allstarlink.org/nodeinfo.cgi?node=47970");

//$html=new simple_html_dom($html);

$rows = array();

$columnNumbers = [0,2];

foreach($html->find('tr.odd-row') as $tr){
    $row = array();
    foreach ($tr->find('td') as $columnNumber => $td){
	if ( in_array( $columnNumber, $columnNumbers ) ) {
          $row[] = $td->plaintext;
	}

    }
$rows[] = $row;     
}




foreach($html->find('tr.even-row') as $tr){
    $row =array();    
    foreach ($tr->find('td') as $columnNumber => $td){
	if ( in_array( $columnNumber, $columnNumbers ) ) {
          $row[] = $td->plaintext;
	}

    }
$rows[] = $row;	
}


print_r($rows);



?>