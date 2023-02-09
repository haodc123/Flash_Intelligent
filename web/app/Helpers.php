<?php

function shortenStr($str, $n=20) {
	if (strlen($str) > $n+1)
		return substr($str, 0, $n).'...';
	else
		return $str;
	
}

function showVoteStar($vote, $vote_time, $play_time) {
	$vote = round($vote);
	$wrap = '<ul class="vote">';
	$star = '<li><img src="../images/icons/ic-star.png"/></li>';
	for ($i=0; $i<5; $i++) { // Ensure star must <= 5, even if vote > 5 by mistake
		if ($i<$vote) // Ensure star must <= 5, even if vote > 5 by mistake
			$wrap .= str_replace('*', $i, $star);
	}
	if ($vote_time > 0)
		$wrap .= '<li> ('.$vote_time.') </li>';
	if ($play_time > 0)
		$wrap .= '<li>  Play: '.$play_time.'</li>';
	$wrap .= '</ul>';
	return $wrap;
}

function showVoteStar2($vote, $vote_time, $play_time) {
	$vote = round($vote);
	$wrap = '<span class="vote">';
	$star = '<img src="../images/icons/ic-star.png"/>';
	for ($i=0; $i<5; $i++) { // Ensure star must <= 5, even if vote > 5 by mistake
		if ($i<$vote) // Ensure star must <= 5, even if vote > 5 by mistake
			$wrap .= str_replace('*', $i, $star);
	}
	if ($vote_time > 0)
		$wrap .= '<span> ('.$vote_time.') </span>';
	if ($play_time > 0)
		$wrap .= '<span>  P: '.$play_time.'</span>';
	$wrap .= '</span>';
	return $wrap;
}

function getOrientationMode($dimension) {
	if ($dimension == '' || $dimension == 0)
		return 'landscape';
	if ($dimension == 1)
		return 'portrait';
	// dimension : WWW X HHH
	$w = explode(' X ', $dimension)[0];
	$h = explode(' X ', $dimension)[1];
	return $w >= $h ? 'landscape' : 'portrait';
}

function getPathThumb($site, $thumb) {
	$pthumb = '';
	switch ($site) {
		case 'https://gamemonetize.com':
			$pthumb = 'monetize'.'/'.$thumb;
			break;
		case 'https://crazygames.com':
			$pthumb = 'crazygames'.'/'.$thumb;
			break;
		case 'https://trochoi.net':
			$pthumb = 'trochoinet'.'/'.$thumb;
			break;
		case 'https://y8.com':
			$pthumb = 'y8'.'/'.$thumb;
			break;
		case 'https://gamedistribution.com':
			$pthumb = 'distribution'.'/'.$thumb;
			break;
		default:
			$pthumb = 'others'.'/'.$thumb;
			break;
	}
	return $pthumb;
}

function isMobile() {
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
		return 1; // mobile
	} else {
		return 0; // not mobile
	}
}

function slugifyUnicode($title) {
	$replacement = '-';
	$map = array();
	$quotedReplacement = preg_quote($replacement, '/');
	$default = array(
		'/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/' => 'a',
		'/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/' => 'e',
		'/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/' => 'i',
		'/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/' => 'o',
		'/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/' => 'u',
		'/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/' => 'y',
		'/đ|Đ/' => 'd',
		'/ç/' => 'c',
		'/ñ/' => 'n',
		'/ä|æ/' => 'ae',
		'/ö/' => 'oe',
		'/ü/' => 'ue',
		'/Ä/' => 'Ae',
		'/Ü/' => 'Ue',
		'/Ö/' => 'Oe',
		'/ß/' => 'ss',
		'/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
		'/\\s+/' => $replacement,
		sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
	);
	//Some URL was encode, decode first
	$title = urldecode($title);
	$map = array_merge($map, $default);
	return strtolower(preg_replace(array_keys($map), array_values($map), $title));
}

function showCat($cat1, $gtagname, $cat2 = 0, $catyo = 0) {
	if ($gtagname != '0')
		return '<a href="../tag/'.slugifyUnicode($gtagname).'">'.$gtagname.'</a>';
	else {
		switch ($cat1) {
			case 28:
				$cat_name = 'Puzzle';
				$cat_slug = 'Puzzle';
				break;
			case 65:
				$cat_name = 'Board game';
				$cat_slug = 'Board-game';
			  break;
			default:
				$cat_name = 'Puzzle';
				$cat_slug = 'Puzzle';
		}
		return '<a href="../cat/'.$cat_slug.'">'.$cat_name.'</a>';
	}
}

function showAlt($gt_by_id, $gcat_1, $gtagname) {
	$catOrTagName = "";
	if (isset($gtagname) && $gtagname != "0")
		$catOrTagName = $gtagname;
	else {
		switch ($gcat_1) {
			case 28:
				$cat_name = 'Puzzle';
				break;
			case 65:
				$cat_name = 'Board game';
			break;
			default:
				$cat_name = 'Puzzle';
		}
		$catOrTagName = $cat_name;
	}
	return "Game online ".$catOrTagName;
}
function getCatNameByID($cat_id) {
	switch ($cat_id) {
		case 28:
			$cat_name = 'Puzzle';
			break;
		case 65:
			$cat_name = 'Board game';
		break;
		default:
			$cat_name = 'Puzzle';
	}
	return $cat_name;
}

?>