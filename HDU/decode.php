<?php
	function hdu_decode($str) {
		include_once 'simple_html_dom.php';
		$html = new simple_html_dom();
		$html->load($str);
		$titlearr = $html->find('title');
		$titlearr = explode(' - ',trim($titlearr[0]->plaintext));
		$pid = $titlearr[1];
		$ret = array('status'=>false);
		if ($pid != "" && $pid = sprintf("%d",intval($pid))) {
			$titlearr = $html->find('table tbody tr td h1');
			$title = trim($titlearr[0]->plaintext);
			if ($title != "") {
				$divs = $html->find('table tbody tr td div.panel_content');
				$ret = array(
					'status'=>true,
					'pid'=>$pid,
					'title'=>$title,
					'desc'=>$divs[0]->innertext,
					'inf'=>$divs[1]->innertext,
					'ouf'=>$divs[2]->innertext,
					'sin'=>$divs[3]->plaintext,
					'sou'=>$divs[4]->plaintext,
					);
			}
		}
		$html->clear();
		return $ret;
	}
	var_dump(hdu_decode(file_get_contents("http://acm.hdu.edu.cn/showproblem.php?pid=1000")));
?>
