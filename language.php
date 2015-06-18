<?php


$language = array();

$language['en']['title choose a car'] = 'Car Search';
$language['ko']['title choose a car'] = '자동차 검색';

$language['en']['note choose a car'] = 'If the year of the model of your car is 2007 and below, you cannot search your car here. You have to set the form manually.';
$language['ko']['note choose a car'] = "
	
	<ul>
		<li> 본 자료는 2015년 필리핀의 Mapfre 자동차 보험 회사가 제공한 평균 시장 가격입니다.
		<li> 자동차의 년식이 2007 년 이하이면 수동으로 양식을 채워서 계산해야 합니다.
		<li> 자동차 모델(예: starex, carnival, camry)하시거나 자동차 회사명을 선택하십시오.
	</ul>
	
";




$language['en']['form note'] = "Note: We provide this 'Car Insurance Computation From' for your convinience. This form is different from the actual Statement of Account and the amount may differ depending on the conditions.";
$language['ko']['form note'] = "알림 : 본 '자동자 종합 보험 견적서'는 이용자 편의를 위해서 필고에서 제공하는 임시 견적서이며
실제 견적서는 본 양식과 틀릴 수 있으며 계산 방식에 따라 비용의 차이가 있을 수 있습니다.";

$language['en']['search your car'] = 'Please, search your car.';
$language['ko']['search your car'] = '차종을 검색하십시오.';

$language['en']['submit search'] = 'Search';
$language['ko']['submit search'] = '검색';

$language['en']['submit cancel'] = 'Cancel';
$language['ko']['submit cancel'] = '취소';

$language['en']['select price'] = 'Please select the price of the car';
$language['ko']['select price'] = '자동차 모델의 년도에 해당하는 금액을 클릭하십시오.';

$language['en']['title form'] = 'Car Insurance';
$language['ko']['title form'] = '자동차 종합 보험 견적서';

$language['en']['your car model'] = 'Your Car Model';
$language['ko']['your car model'] = '자동차 모델';

$language['en']['your car type'] = 'Your Car Type';
$language['ko']['your car type'] = '자동차 타입';

$language['en']['market price'] = 'Market Price';
$language['ko']['market price'] = '시장 가격';

$language['en']['find your car price'] = 'Find Your Car Price';
$language['ko']['find your car price'] = '자동차 모델 검색';


$language['en']['year of model'] = 'Year of Model';
$language['ko']['year of model'] = '자동차 년식';


$language['en']['type'] = 'Type';
$language['ko']['type'] = '자동차 분류';


$language['en']['Coverage of Property Damage'] = 'Coverage of Property Damage';
$language['ko']['Coverage of Property Damage'] = '재물 손상 배상액';


$language['en']['Coverage of Body Injury'] = 'Coverage of Body Injury';
$language['ko']['Coverage of Body Injury'] = '신체 손상 배상액';


$language['en']['No of Passenger'] = 'No of Passenger';
$language['ko']['No of Passenger'] = '좌석 수';


$language['en']['Coverage Limit per Passenger'] = 'Coverage Limit per Passenger';
$language['ko']['Coverage Limit per Passenger'] = '1명당 최대 배상액';


$language['en']['Cover Accident of Nature'] = 'Cover Accident of Nature';
$language['ko']['Cover Accident of Nature'] = '자연재해';



$language['en']['submit compute'] = 'Compute Insurance';
$language['ko']['submit compute'] = '보험료 계산';


$language['en']['comment total'] = 'Approximately :';
$language['ko']['comment total'] = '예상 보험료 약 :';
















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