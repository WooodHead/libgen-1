
<?php
function get_var($var,$type,$def_value){
	if (isset($_GET[$var])) $value=$_GET[$var];
	if (isset($_POST[$var])) $value=$_POST[$var];
	//echo "value=$value ";
	if (!isset($value)) $value = $def_value;
	//echo "value=$value ";
	if ($type=='int'){
	  $value=(int)$value;
		if (!preg_match('/^\d+$/',$value)) $value=$def_value;
		}
	//echo "value=$value ";
	if ($type=='text'){
		$value=htmlspecialchars($value);
		$value=mysql_real_escape_string($value);
	
		}
	return $value;
	}

function revers_date($indate){
	$dt = split(" ",$indate);
	$darr = split('\.',$dt[0]);
	$outdate=$darr[2].".".$darr[1].".".$darr[0];
	return $outdate;
	}
function revers_date2($indate){
	$dt = split(" ",$indate);
	$darr = split('-',$dt[0]);
	$outdate=$darr[2].".".$darr[1].".".$darr[0];
	return $outdate;
	}

function getHumanDate($indate,$type=1) {
       	$months = array('01'=>'������','02'=>'�������','03'=>'�����','04'=>'������','05'=>'���','06'=>'����',
       	'07'=>'����','08'=>'�������','09'=>'��������','10'=>'�������','11'=>'������','12'=>'�������');
       	$comp = split(' ',$indate);
       	$date = split('-',$comp[0]);
       	if ($type==1) $outdate = $date[2].".".$date[1].".".$date[0];
       	if ($type==2) $outdate = $date[2]." ".$months[$date[1]]." ".$date[0];
       	return $outdate;
     }

function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    switch ($errno) {
    case E_USER_ERROR:
        echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
        echo "  Fatal error on line $errline in file $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Aborting...<br />\n";
        exit(1);
        break;

    case E_USER_WARNING:
        echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
        break;

    default:
        echo "Unknown error type: [$errno] $errstr<br />\n";
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}


?>
