<?php
	function codevs_decode($str) {
		include_once 'simple_html_dom.php';
		$html = new simple_html_dom();
		$html->load($str);
		//$titlearr = $html->find('h3 b');
		$titlearr = $html->find('div section #main section section section section header div div h3 b');
		$titlearr = explode(' ',trim($titlearr[0]->innertext));
		$pid = $titlearr[0];
		$ret = array (
			'status'=>false
		);
		if ($pid == sprintf('%d',intval($pid))) {
			//valid
			$title = '';
			for ($i = 1;$i<=count($titlearr);$i++) $title .= $titlearr[$i] . ' ';
			$title = trim($title);
			$divs = $html->find('div section #main section section section section section aside #tab-problem div div div div.panel-body');
			$ret = array (
				'status'=>true,
				'pid'=>$pid,
				'title'=>$title,
				'desc'=>trim($divs[0]->innertext),
				'inf'=>trim($divs[1]->innertext),
				'ouf'=>trim($divs[2]->innertext),
				'sin'=>trim($divs[3]->innertext),
				'sou'=>trim($divs[4]->innertext),
				'hint'=>trim($divs[5]->innertext)
			);
		}
		$html->clear();
		return $ret;
	}
	var_dump(codevs_decode(file_get_contents('http://codevs.cn/problem/1000/')));
?>
