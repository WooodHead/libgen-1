<?php


function file_read($filename,$mode='r') {
		$handle = fopen($filename, $mode); //print $handle;
		if (!$handle) return false;
		$contents = '';
		while (!feof($handle)) {
  			$contents .= fread($handle, 8192);
			}
		fclose($handle);
		return $contents;
		}

function file_write($filename,$content){
		touch ($filename);
		if (is_writable($filename)) {
		    if (!$handle = fopen($filename, 'w')) {
         	$this->error="�� ���� ������� ���� ($filename)";
         	return false;
    		}
    	if (fwrite($handle, $content) === FALSE) {
        	$this->error="�� ���� ���������� ������ � ���� ($filename)";
        	return false;
    		}
   		fclose($handle);
   		return true;
		} else {
    		$this->error="���� $filename ���������� ��� ������";
    		return false;
			}
		}
		
?>