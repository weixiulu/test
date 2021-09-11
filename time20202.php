<?php
	header("charset=GBK");
	//echo "<title>2020年过年</title>";
	date_default_timezone_set('Asia/Shanghai');
	
	//算法：计算指定某个时间，加上多少（n）天的日期
	//$day100 = date("Y-m-d", strtotime("+99 day",strtotime('2019-10-20')));
	//echo $day100;
	//echo '<br/>';
	
	//$day2 = date("Y-m-d", strtotime("+1 day",strtotime('2019-11-2')));
	//echo $day2;
	//echo '系统时间：'.date('Y-m-d H:i:s',time());
	//echo '<br/>';
	
	$str = "";
	$str.= "元旦：".datediff('d',date('Y-m-d H:i:s',time()),'2020-1-1').'<br/>';
	$str.= "小年夜：".datediff('d',date('Y-m-d H:i:s',time()),'2020-1-17').'<br/>';
	$str.= "除夕：".datediff('d',date('Y-m-d H:i:s',time()),'2020-1-24').'<br/>';
	$str.= "春节：".datediff('d',date('Y-m-d H:i:s',time()),'2020-1-25').'<br/>';
	$str.= "元宵：".datediff('d',date('Y-m-d H:i:s',time()),'2020-2-8').'<br/>';
	//iconv('GB2312','UTF-8',$str);
	//iconv('GB2312','GBK',$str);
	echo $str;
	//echo "test：".datediff('d','2019-10-27 0:0:0','2019-10-29 23:59:59').'<br/>';
	
	
	
	/**
	 * 日期时间比较方法 date2-date1
	 * 返回指定日期单位的数值
	 * @param string	$type y年 m月w周d日h小时M分s秒
	 * @param date	$date1
	 * @param date	$date2
	 */
	function datediff($type='d',$date1,$date2){
		/**
		 * 系统默认时间戳为0的时候是1970-01-01 08:00:00，
		 * 而不是0点开始计算，所以要加上8个小时的28800秒进行修正，
		 * 进而从1970-01-01 00:00:00开始进行时间比较
		 */
		$date1 = parse($date1)+28800; 
		$date2 = parse($date2)+28800;
		
		//$date1 = parse($date1); 
		//$date2 = parse($date2);
		
		//转换成年
		if ($type == 'y'){
			$tmp = date('Y',$date2) - date('Y',$date1);
		}
		//转换成秒
		if ($type == 's'){
			$tmp = $date2 - $date1;
		}
		//转换成分钟
		if ($type == 'M'){
			//$tmp = floor(($date2-$date1)/60);
			$tmp = floor($date2/60)-floor($date1/60);
		}
		//转换成小时
		if ($type == 'h'){
			//$tmp = floor(($date2-$date1)/3600);
			$tmp = floor($date2/3600)-floor($date1/3600);
		}
		//转换成天
		if ($type == 'd'){
			//$tmp = floor(($date2-$date1)/86400);
			$tmp = floor($date2/86400)-floor($date1/86400);
		}
		//转换成周
		if ($type == 'w'){
			//$tmp = floor(($date2-$date1)/604800);
			$tmp = floor($date2/604800)-floor($date1/604800);
		}
		//转换成月
		if ($type == 'm'){
			$m2 = date('Y',$date2)*12+date('m',$date2);
			$m1 = date('Y',$date1)*12+date('m',$date1);
			$tmp = $m2 - $m1;
		}
		
		return $tmp;
			
	}
	
	/**
	* 日期分析
	* 返回时间戳
	* @static
	* @access public
	* @param mixed $date 日期
	* @return string
	*/
	function parse($date) {
		if (is_null($date) || $date==''){
			//为空默认取得当前时间戳
			$tmpdate = time();
		}elseif (is_string($date)){
			if (strtotime($date) == -1){
				$tmpdate = time();
			}else{
				//把字符串转换成UNIX时间戳
				$tmpdate = strtotime($date);
			}
		}elseif (is_numeric($date)){
			$tmpdate = $date;
		}else{
			$tmpdate = time();
		}
		
		return $tmpdate;
	}
?>

