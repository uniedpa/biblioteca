<?php
define('FPDF_FONTPATH','../font');
require_once('../vendor/fpdf/fpdf.php');
require_once('../vendor/fpdf/exfpdf.php');
require_once('../vendor/fpdf/easyTable.php');
$pdf = new exFPDF('L','mm','letter');
$pdf-> SetMargins(0,0,0);
$pdf-> AddPage();
$pdf-> SetAutoPageBreak(false,0);
$pdf-> SetFont('Arial', '',9);
$table=new easyTable($pdf,'{60,10,60,5}', 'width:133; font-size:9; align:R{CCCC}; valign:M; border:0; split-row:false; l-margin:147;');
//https://gist.github.com/oevl/84f7df43187a675b10ed9e31e799a497
    function db_connect() {

        // Define connection as a static variable, to avoid connecting more than once 
        static $connection;

        // Try and connect to the database, if a connection has not been established yet
        if(!isset($connection)) {
             // Load configuration as an array. Use the actual location of your configuration file
            $config = parse_ini_file('etiquetas-config.ini'); 
            $connection = mysqli_connect('127.0.0.1',$config['username'],$config['password'],$config['dbname']);
        }

        // If connection was not successful, handle the error
        if($connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return mysqli_connect_error(); 
        }
        return $connection;
    }
    function db_query($query) {
    // Connect to the database
    $connection = db_connect();
    // Query the database
    $result = mysqli_query($connection,$query);

    return $result;
  }
       function db_select($query) {
        $rows = array();
        $result = db_query($query);

        // If query failed, return `false`
        if($result === false) {
            return false;
        }

        // If query was successful, retrieve all the rows into an array
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function db_error() {
      $connection = db_connect();
      return mysqli_error($connection);
  } 
// Query the database
//FOR SPECIFIC CALL NUMBERS ADD -> AND biblio.call_nmbr1 LIKE '001%'
//(call_nmbr2='UN58 vol.1 no.1' AND call_nmbr3='2014') AND (call_nmbr2='UN58 vol.1 no.2' AND call_nmbr3='2015'))
$query = "
SELECT DISTINCT biblio.bibid,biblio.call_nmbr1 cn1,biblio.call_nmbr2 cn2,biblio.call_nmbr3 cn3
FROM biblio, biblio_copy 
WHERE biblio.bibid=biblio_copy.bibid AND biblio_copy.status_cd=10 AND 
(biblio.title LIKE 'Uniedpa%' OR biblio.bibid=1649 OR biblio.bibid=1650 OR biblio.bibid=1651 OR biblio.bibid=1411 OR biblio.bibid=1652 OR biblio.bibid=1653 OR biblio.bibid=1654 OR biblio.bibid=1005 OR biblio_copy.copy_desc='Por etiquetar 2017' OR biblio_copy.copy_desc='Por etiquetar 2018' OR biblio_copy.copy_desc='Por etiquetar')
ORDER BY call_nmbr1 ASC, call_nmbr2 ASC
";


$rows = db_select($query);
if($rows === false) {
  $error = db_error();
    // Send the error to an administrator, log to a file, etc.
    // Handle failure - log the error, notify administrator, etc.
} else {
    // We successfully inserted a row into the database
if (count($rows) > 0) {
//GitHub - mpdf/mpdf: mPDF is a PHP library generating PDF files from UTF-8 encoded HTML https://github.com/mpdf/mpdf
$count = count($rows);
$label_array=array();
$row_limit=8;
$pattern='/^(?:.*?\K\s){2}/s';
for ($r = 0; $r <= $count-1; $r++) {
$bibid = $rows[$r]["bibid"];
$query = "SELECT COUNT(*) count FROM biblio_copy WHERE bibid=$bibid AND biblio_copy.status_cd=10";
    $copy_count_result = db_select($query);
    $copy_count = $copy_count_result["0"]["count"];
    $cn2=$rows[$r]["cn2"];
    $cn3=$rows[$r]["cn3"];
$query = "SELECT barcode_nmbr barcode FROM biblio_copy WHERE bibid=$bibid ORDER BY barcode DESC";
$barcode="";
$barcodes = db_select($query);
$barcode_count = count($barcodes);
//echo $barcodes[1]["barcode"]."\n";
if( preg_match_all( '/^(?:.*?\K\s){1}/s' , $cn2 , $matches )
        && isset( $matches[0] )
        && count( $matches[0] ) == 1){

          $cn2=preg_replace('/^(?:.*?\K\s){1}/s', "\n", $cn2, 1);

      }else{
      
    }
    if( preg_match_all( '/^(?:.*?\K\s){1}/s', $cn3 , $matches )
        && isset( $matches[0] )
        && count( $matches[0] ) == 1){

          $cn3=preg_replace('/^(?:.*?\K\s){1}/s', "\n", $cn3, 1);

      }else{
      
    }
    if ($copy_count > 1) {
      $i = $copy_count;
      while ($i > 0) {
        $barcode = $barcodes[$i-1]["barcode"];
        $label = $rows[$r]["cn1"]."\n".$cn2."\n".$cn3."\n".$barcode;
        array_push($label_array,$label);
        $i --;
      }
    } else {
      $barcode = $barcodes[0]["barcode"];
      $label = $rows[$r]["cn1"]."\n".$cn2."\n".$cn3."\n".$barcode;
      array_push($label_array,$label);
  }
} //for loop thru all bibids
//print_r($label_array);
$labels_per_row=2;
$label_chunked = array_chunk($label_array, $labels_per_row);
$label_count = count($label_chunked);
$label_html="";
if ($label_count > 0) {
  //echo $label_count-1;
  for ($l = 0; $l <= $label_count-1; $l++) {
  // print count($label_chunked[$l]);
   $table->rowStyle('min-height:7; align:C;valign:M');
   $table->easyCell('','colspan:4;');
   $table->printRow();
   $table->rowStyle('min-height:28; align:C{CCCC};valign:M; paddingY:0');
   $table->easyCell($label_chunked[$l][0]);
   $table->easyCell('');
   if (count($label_chunked[$l])>1)
	{
   	$table->easyCell($label_chunked[$l][1]);
	};
   $table->printRow(); 
  }
}
} // if count($rows)>0 end
//echo $label_html;
} //$rows not false else end
//print_r($rows);
$table->endTable();
$pdf->Output();
?>
