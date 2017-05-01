<?php
	function prepare($pid) {
		shell_exec("pdftotext {$pid}.pdf {$pid}.txt; pdftotext p{$pid}.pdf p{$pid}.txt");
	}
	function get_uva_title($pid) {
		prepare($pid);
		$str = file_get_contents("{$pid}.txt");
		$str = explode("\n",$str);
		if (intval($str[0]) == intval($pid) && $str[2] != "") return $str[2];
		else return false;
	}
	function get_uva_content($pid) {
		$title = get_uva_title($pid);
		if ($title === false) return false;
		$str = file_get_contents("p{$pid}.txt");
		$inf = mb_strpos($str,"\nInput\n");
		$ouf = mb_strpos($str,"\nOutput\n");
		$sin = mb_strpos($str,"\nSample Input\n");
		$sou = mb_strpos($str,"\nSample Output\n");
		if ($inf === false || $ouf === false || $sin === false || $sou === false) return false;
		$ret = array(
			'title'=>$title,
			'content'=>trim(mb_substr($str,0,$inf)),
			'inf'=>trim(mb_substr($str,$inf+7,$ouf-$inf-7)),
			'ouf'=>trim(mb_substr($str,$ouf+8,$sin-$ouf-8)),
			'sin'=>trim(mb_substr($str,$sin+14,$sou-$sin-14)),
			'sou'=>trim(mb_substr($str,$sou+15))
		);
		return $ret;
	}
	var_dump(get_uva_content(100));
?>
