<?php
if (isset($data)){
	echo '<table class="table"><thead><tr><th>Отзыв</th><th>Пользователь</th><th>Дата</th></tr></thead>';
	echo '<tbody>';
	foreach ($data as $v) {
		echo '<tr><td>'.$v['feed'].'</td>';
		echo '<td>'.$v['name'].' '.$v['subname'].'</td>';
		echo '<td>'.date("d.m.Y H:i",$v['time']).'<td></td></tr>';
	}
	echo '</tbody></table>';
}
