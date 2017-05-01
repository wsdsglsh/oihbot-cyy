<?php
	//This script is used for generate download link
	//php download.php > 1.txt; wget -i 1.txt
	for ($i = 100;$i<=1748;$i++) {
		echo "https://uva.onlinejudge.org/external/" . substr($i,0,strlen($i)-2) . "/" . $i . ".pdf\n";
		echo "https://uva.onlinejudge.org/external/" . substr($i,0,strlen($i)-2) . "/p" . $i . ".pdf\n";
	}
	for ($i = 10000;$i<=13194;$i++) {
		echo "https://uva.onlinejudge.org/external/" . substr($i,0,strlen($i)-2) . "/" . $i . ".pdf\n";
		echo "https://uva.onlinejudge.org/external/" . substr($i,0,strlen($i)-2) . "/p" . $i . ".pdf\n";
	}
?>
