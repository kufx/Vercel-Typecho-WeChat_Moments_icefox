<?php

// 设置时区
date_default_timezone_set('Asia/Shanghai');

/**
 * 秒转时间，格式 年 月 日 时 分 秒
 * 
 * @author Roogle
 * @return html
 */
function getBuildTime(){
	// 本站创建的时间
	$site_create_time = strtotime('2012-06-26 00:00:00');
	$time = time() - $site_create_time;
	
	if(is_numeric($time)){
		$value = array(
			"years" => 0, "days" => 0, "hours" => 0,
			"minutes" => 0, "seconds" => 0,
		);
		if($time >= 31556926){
			$value["years"] = floor($time/31556926);
			$time = ($time%31556926);
		}
		if($time >= 86400){
			$value["days"] = floor($time/86400);
			$time = ($time%86400);
		}
		if($time >= 3600){
			$value["hours"] = floor($time/3600);
			$time = ($time%3600);
		}
		if($time >= 60){
			$value["minutes"] = floor($time/60);
			$time = ($time%60);
		}
		$value["seconds"] = floor($time);
		
		echo '<span style="color:red;">'.$value['years'].'年'.$value['days'].'天'.$value['hours'].'小时'.$value['minutes'].'分</span>';
	}else{
		echo '';
	}
}


/**
 * 分类文章数量控制 
 */
function themeInit($archive) { 
    if ($archive->is('index')) { 
        $archive->parameter->pageSize = 18; // 自定义条数 
    } else if ($archive->is('category', 'manage')) {
		$archive->parameter->pageSize = 18; // 自定义条数
	} else if ($archive->is('category', 'diary')) {
		$archive->parameter->pageSize = 18; // 自定义条数
	} else if ($archive->is('category', 'mind')) {
		$archive->parameter->pageSize = 18; // 自定义条数
	} else if ($archive->is('category', 'psychic')) {
		$archive->parameter->pageSize = 18; // 自定义条数
	} else if ($archive->is('category', 'thinking')) {
		$archive->parameter->pageSize = 18; // 自定义条数
	}
}