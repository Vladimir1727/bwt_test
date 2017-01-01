<?php
echo '<table class="table"><thead><tr><th></th><th></th><th></th></tr></thead>';
	echo '<tbody>';
	
	foreach ($data as $v) {
		echo '<tr><td>'.$v['title'].'</td>';
		echo '<td>'.$v['desc'].' '.$v['subname'].'</td>';
		echo '<td><img src="'.$v['pic'].'" alt=""><td></td></tr>';
	}
	echo '</tbody></table>';
