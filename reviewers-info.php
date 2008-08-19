<?php
/*
Plugin Name: Reviewers_Info
Plugin URI: http://photozero.net/reviewers_info/
Description: Display commenters' OS and  browser infomation on the next to Comments form.Usage:Place `&lt;?php display_commenter_info($comment); ?&gt;` between `&lt;?php foreach ($comments as $comment) : ?&gt;` and `&lt;?php endforeach;?&gt;` ALSO after `&lt;?php comment_author_link() ?&gt;`  in your current theme's `comments.php` file
Version: 2.0
Author: Neekey
Author URI: http://photozero.net/
*/

function display_commenter_info($comment){
	
	$reviewers_info = analyse_user_agent($comment->comment_agent);
	
	//Display style. You can edit.
	echo '(<img src="http://dev.neekey.com/flag.php?s='.$comment->comment_author_IP.'" alt="Nation Flag" title="Nation Flag" />&nbsp;'; 
	echo '<img src="' .get_bloginfo('url'). '/wp-content/plugins/reviewers-info/icon/' .$reviewers_info['os_icon']. '.gif" title="'.$reviewers_info['os'].'" alt="'.$reviewers_info['os'].'"/>&nbsp;'; 
	echo '<img src="' .get_bloginfo('url'). '/wp-content/plugins/reviewers-info/icon/' .$reviewers_info['browser_icon']. '.gif" title="'.$reviewers_info['browser'].'" alt="'.$reviewers_info['browser'].'"/>)'; 

}



function analyse_user_agent($str){
	$str = strtolower($str);
	
	
	
	if(strpos($str,'msie') !== false){ //IE
	
		$pattern = '/msie\s*(.+?);/';
		preg_match($pattern,$str,$versions);
		$version = $versions[1]; //IE VERSION
		
		//Based on IE
		$result['browser_base'] = 'ie';
		
		if(strpos($str,'maxthon') !== false){ // MAXTHON
			$result['browser_icon'] = 'maxthon';
			
			if(strpos($str,'maxthon 2.0') !== false){ // MAXTHON 2.0
				$subversion = '2.0';
			}else{ //MAXTHON 1.0
				$subversion = '1.0';
			}
			
			$result['browser'] = "Maxthon $subversion based on IE $version";
			
		}elseif(strpos($str,'theworld') !== false){ //The World
		
			$result['browser_icon'] = 'theworld';
			$result['browser'] = "TheWorld based on IE $version";
			
		}elseif(strpos($str,'greenbrowser') !== false){ // GreenBrowser
		
			$result['browser_icon'] = 'greenbrowser';
			$result['browser'] = "GreenBrowser based on IE $version";
			
		}elseif(strpos($str,'tencenttravel') !== false){ // TT
		
			$result['browser_icon'] = 'tt';
			$result['browser'] = "TencentTravel based on IE $version";
			
		}else{
		
			$result['browser_icon'] = 'ie';
			$result['browser'] = "Internet Explorer $version";
			
		}
		
	}elseif(strpos($str,'firefox') !== false){ //Firefox
	
		$pattern = '/firefox\/\\s?([\\d\\.]+)/';
		preg_match($pattern,$str,$versions);
		$version = $versions[1]; //Firefox VERSION
		$result['browser_base'] = 'firefox';
		$result['browser_icon'] = 'firefox';
		$result['browser'] = "Firefox $version";
		
	}elseif(strpos($str,'opera') !== false){ //Opera
	
		$pattern = '/opera\/\\s?([\\d\\.]+)/';
		preg_match($pattern,$str,$versions);
		$version = $versions[1]; //OPERA VERSION
		
		$result['browser_base'] = 'opera';
		$result['browser_icon'] = 'opera';
		$result['browser'] = "Opera $version";
		
	}elseif(strpos($str,'webkit') !== false){ //Safari
		
		$pattern = '/version\/\\s?([\\d\\.]+)/';
		preg_match($pattern,$str,$versions);
		$version = $versions[1]; //SAFARI VERSION
		
		$result['browser_base'] = 'safari';
		$result['browser_icon'] = 'safari';
		$result['browser'] = "Safari $version";
		
	}else{
		
		$result['browser_base'] = 'other';
		$result['browser_icon'] = 'other';
		$result['browser'] = 'Unknow';
	}
	
	
	if(strpos($str,'windows') !== false || strpos($str,'win') !== false){
		
		$result['os_base'] = 'windows';
		$result['os_icon'] = $result['os_base'];
		
		if(strpos($str,'windows nt 5.1') !== false){
			$result['os'] = 'Windows XP';
		}elseif(strpos($str,'nt 5.0') !== false){
			$result['os'] = 'Windows 2000';
		}elseif(strpos($str,'nt 5.2') !== false){
			$result['os'] = 'Windows Server 2003';
		}elseif(strpos($str,'nt 6.0') !== false){
			$result['os'] = 'Windows Vista';
		}elseif(strpos($str,'win 9x 4.90') !== false){
			$result['os'] = 'Windows Me';
		}elseif(strpos($str,'win98') !== false){
			$result['os'] = 'Windows 98';
		}elseif(strpos($str,'win95') !== false){
			$result['os'] = 'Windows 95';
		}elseif(strpos($str,'windows 98') !== false){
			$result['os'] = 'Windows 98';
		}elseif(strpos($str,'windows me') !== false){
			$result['os'] = 'Windows Me';
		}else{
			$result['os'] = 'Windows other version';
		}
		
		
	}elseif(strpos($str,'mac') !== false){
		
		$result['os_base'] = 'mac';
		$result['os_icon'] = $result['os_base'];
		$result['os'] = 'Mac OS X';
		
	}elseif(strpos($str,'linux') !== false){
		
		$result['os_base'] = 'linux';
		if(strpos($str,'ubuntu') !== false){
			$result['os'] = 'Ubuntu';
			$result['os_icon'] = 'ubuntu';
		}elseif(strpos($str,'debian') !== false){
			$result['os'] = 'Debian';
			$result['os_icon'] = 'debian';
		}elseif(strpos($str,'red hat') !== false){
			$result['os'] = 'Red Hat';
			$result['os_icon'] = 'linux';
		}else{
			$result['os'] = 'Linux';
			$result['os_icon'] = 'linux';
		}
		
	}elseif(strpos($str,'freebsd') !== false){
		
		$result['os_base'] = 'freebsd';
		$result['os_icon'] = $result['os_base'];
		$result['os'] = 'FreeBSD';
		
	}elseif(strpos($str,'sunos') !== false){
		
		$result['os_base'] = 'sunos';
		$result['os_icon'] = $result['os_base'];
		$result['os'] = 'SunOS';
		
	}elseif(strpos($str,'os/2') !== false){
		
		$result['os_base'] = 'os2';
		$result['os_icon'] = $result['os_base'];
		$result['os'] = 'OS/2';
		
	}else{
		
		$result['os_base'] = 'other';
		$result['os_icon'] = $result['os_base'];
		$result['os'] = 'Unknow';
		
	}
	return $result;
}

?>