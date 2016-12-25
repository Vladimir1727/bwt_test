<?php
$file = file_get_contents("http://informer.gismeteo.ru/rss/34601.xml");
preg_match_all("#<item.*?>(.*?)</item>#is", $file, $items);
$item=$items[0];
$data=array();
$i=0;
foreach ($item as $v) {
	preg_match("#<description>(.*?)</description>#is", $v,$d);
	preg_match("#<title>(.*?)</title>#is", $v,$t);
	preg_match("#<enclosure url=\"(.*?)\" length=\"2000\" type=\"image/gif\" />#is", $v,$p);
	$data[$i]['title']=$t[1];
	$data[$i]['desc']=$d[1];
	$data[$i]['pic']=$p[1];
	$i++;
}
$_SESSION['weather']=$data;
include_once('v/v_weather.php');