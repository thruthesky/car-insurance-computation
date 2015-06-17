<?php


$language = array();

$language['en']['title choose a car'] = 'Car Search';
$language['ko']['title choose a car'] = '자동차 검색';

$language['en']['note choose a car'] = 'If the year of the model of your car is 2007 and below, you cannot search your car here. You have to set the form manually.';
$language['ko']['note choose a car'] = "
	
	<ul>
		<li> 자동차의 년식이 2007 년 이하이면 수동으로 양식을 채워서 계산해야 합니다.
		<li> 자동차 모델을 입력하십시오. 예) starex, carnival, camry
		<li> 또는 자동차 회사명을 선택 하셔도 됩니다.
	</ul>
	
";


$language['en']['search your car'] = 'Please, search your car.';
$language['ko']['search your car'] = '차종을 검색하십시오.';

$language['en']['submit search'] = 'Search';
$language['ko']['submit search'] = '검색';

$language['en']['submit cancel'] = 'Cancel';
$language['ko']['submit cancel'] = '취소';

$language['en']['select price'] = 'Cancel';
$language['ko']['select price'] = '자동차 모델의 년도에 해당하는 금액을 클릭하십시오.';




function ln($code)
{
	global $language;
	$bl = browser_language();
	return $language[$bl][$code];
}

function browser_language()
{
	if ( isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ) {
		return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	}
	else {
		return 'en';
	}
}