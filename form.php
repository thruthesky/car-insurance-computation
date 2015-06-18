<?php

if ( isset($_GET['unit']) ) $unit = $_GET['unit'];
else $unit = null;


if ( isset($_GET['type']) ) $type = $_GET['type'];
else $type = null;

if ( isset($_GET['price']) ) $price = $_GET['price'];
else $price = 0;

if ( isset($_GET['year']) ) $year = $_GET['year'];
else $year = 0;

if ( isset($_GET['subline']) ) $subline = $_GET['subline'];
else $subline = null;
if ( isset($_GET['pd']) ) $pd = $_GET['pd'];
else $pd = 0;
if ( isset($_GET['bi']) ) $bi = $_GET['bi'];
else $bi = 0;


if ( isset($_GET['passenger']) ) $passenger = $_GET['passenger'];
else $passenger = 0;
if ( isset($_GET['pa']) ) $pa = $_GET['pa'];
else $pa = 0;

if ( isset($_GET['mode']) ) $mode = $_GET['mode'];
else $mode = null;


if ( isset($_GET['aon']) ) $aon = $_GET['aon'];
else $aon = null;





$options_coverage = array();
$options_coverage[] = 50000;
$options_coverage[] = 75000;
$options_coverage[] = 100000;
$options_coverage[] = 150000;
$options_coverage[] = 200000;
$options_coverage[] = 250000;
$options_coverage[] = 300000;
$options_coverage[] = 400000;
$options_coverage[] = 500000;
$options_coverage[] = 750000;
$options_coverage[] = 1000000;


$pd_premium = array();
$pd_premium[50000]['PC'] = 975;
$pd_premium[75000]['PC'] = 1035;
$pd_premium[100000]['PC'] = 1095;
$pd_premium[150000]['PC'] = 1170;
$pd_premium[200000]['PC'] = 1245;
$pd_premium[250000]['PC'] = 1320;
$pd_premium[300000]['PC'] = 1395;
$pd_premium[400000]['PC'] = 1515;
$pd_premium[500000]['PC'] = 1635;
$pd_premium[750000]['PC'] = 1920;
$pd_premium[1000000]['PC'] = 2235;

$pd_premium[50000]['CV'] = 1050;
$pd_premium[75000]['CV'] = 1110;
$pd_premium[100000]['CV'] = 1170;
$pd_premium[150000]['CV'] = 1245;
$pd_premium[200000]['CV'] = 1320;
$pd_premium[250000]['CV'] = 1395;
$pd_premium[300000]['CV'] = 1485;
$pd_premium[400000]['CV'] = 1575;
$pd_premium[500000]['CV'] = 1680;
$pd_premium[750000]['CV'] = 2100;
$pd_premium[1000000]['CV'] = 2535;



$bi_premium = array();
$bi_premium[50000]['PC'] = 195;
$bi_premium[75000]['PC'] = 225;
$bi_premium[100000]['PC'] = 270;
$bi_premium[150000]['PC'] = 345;
$bi_premium[200000]['PC'] = 420;
$bi_premium[250000]['PC'] = 510;
$bi_premium[300000]['PC'] = 585;
$bi_premium[400000]['PC'] = 675;
$bi_premium[500000]['PC'] = 780;
$bi_premium[750000]['PC'] = 915;
$bi_premium[1000000]['PC'] = 1050;

$bi_premium[50000]['CV'] = 225;
$bi_premium[75000]['CV'] = 285;
$bi_premium[100000]['CV'] = 345;
$bi_premium[150000]['CV'] = 420;
$bi_premium[200000]['CV'] = 510;
$bi_premium[250000]['CV'] = 585;
$bi_premium[300000]['CV'] = 660;
$bi_premium[400000]['CV'] = 750;
$bi_premium[500000]['CV'] = 855;
$bi_premium[750000]['CV'] = 945;
$bi_premium[1000000]['CV'] = 1050;


function pd_premium($subline, $pd)
{
	global $pd_premium;
	return $pd_premium[$pd][$subline];
}
function bi_premium($subline, $bi)
{
	global $bi_premium;
	return $bi_premium[$bi][$subline];
}

function pa_premium($passenger, $pa)
{
	return $passenger * $pa * 0.2 / 100;
}




function option_coverage($def)
{
	global $options_coverage;
	$o = null;
	foreach ( $options_coverage as $v ) {
		if ( $v == $def ) $sel = " selected=1";
		else $sel = null;
		$o .= "<option value='$v'$sel>" . number_format($v) . "</option>";
	}
	return $o;
}

function product_rate($year, $subline, $aon)
{
	if ( $year >= 2008 ) {
		if ( $subline == 'PC' ) {
			if ( $aon == 'Y' ) return 2.3;
			else return 2;
		}
		else if ( $subline == 'CV' ) {
			if ( $aon == 'Y' ) return 1.7;
			else return 1.3;
		}
	}
	else {
		
		if ( $subline == 'PC' ) {
			if ( $aon == 'Y' ) return 2.75;
			else return 2.25;
		}
		else if ( $subline == 'CV' ) {
			if ( $aon == 'Y' ) return 2.1;
			else return 1.6;
		}
	}
}


function tax_add($sum)
{
	return $sum + $sum * 25.25 / 100;
}



?>

<div class='form title'>
<div class='text'><?=ln('title form')?></div>
<div class='image'><img src='form-title.png'></div>
<div class='line' style='clear:both;'></div>
</div>
<div class='form note'>
알림 : 본 '자동자 종합 보험 견적서'는 이용자 편의를 위해서 필고에서 제공하는 임시 견적서이며
실제 견적서는 본 양식과 틀릴 수 있으며 계산 방식에 따라 비용의 차이가 있을 수 있습니다. 
</div>

<form>
<input type='hidden' name='mode' value='submit-computation'>

<table>

<? if ( $unit ) { ?>
	<tr>
		<td><?=ln('your car model')?></td>
		<td><?=$unit?><input type='hidden' name='unit' value='<?=$unit?>'></td>
	</tr>
<? } ?>

<? if ( $type ) { ?>
	<tr>
		<td><?=ln('your car type')?></td>
		<td><?=$type?><input type='hidden' name='type' value='<?=$type?>'></td>
	</tr>
<? } ?>

<tr>
	<td><?=ln('market price')?></td>
	<td>
		<input type='text' name='price' value="<?=$price?>">
		<a href='?action=choose-car-brand'><?=ln('find your car price')?></a>
	</td>
</tr>

<tr>
	<td><?=ln('year of model')?></td>
	<td><input type='text' name='year' value="<?=$year?>"></td>
</tr>



<tr>
	<td><?=ln('type')?></td>
	<td>
		<input type='radio' name='subline' value='PC' <? if ( $subline == 'PC' ) echo 'checked=1'; ?>> PC
		<input type='radio' name='subline' value='CV' <? if ( $subline == 'CV' ) echo 'checked=1'; ?>> PV &amp; CV
	</td>
</tr>



<tr>
	<td><?=ln('Coverage of Property Damage')?></td>
	<td>
		<select name='pd'>
			<?=option_coverage($pd)?>
		</select>
	</td>
</tr>


<tr>
	<td><?=ln('Coverage of Body Injury')?></td>
	<td>
		<select name='bi'>
			<?=option_coverage($bi)?>
		</select>
	</td>
</tr>
<tr>
	<td><?=ln('No of Passenger')?></td>
	<td>
		<input type='text' name='passenger' value="<?=$passenger?>">
	</td>
</tr>


<tr>
	<td><?=ln('Coverage Limit per Passenger')?></td>
	<td>
		<input type='radio' name='pa' value='20000' <? if ( $pa == 20000 ) echo "checked=1"; ?> > 20,000
		<input type='radio' name='pa' value='50000' <? if ( $pa == 50000 ) echo "checked=1"; ?> > 50,000
	</td>
</tr>


<tr>
	<td><?=ln('Cover Accident of Nature')?></td>
	<td>
		<input type='radio' name='aon' value='Y' <? if ( $aon == 'Y' ) echo 'checked=1'; ?>> Yes
		<input type='radio' name='aon' value='N' <? if ( $aon == 'N' ) echo 'checked=1'; ?>> No
	</td>
</tr>





<tr>
	<td></td>
	<td><input type='submit' value='<?=ln('submit compute')?>'></td>
</tr>

</table>

</form>

<?php

	if ( $mode == 'submit-computation' ) {
		
		$pr = product_rate($year, $subline, $aon);
		$pa_premium = pa_premium( $passenger, $pa );
		$sum2 = $price * $pr / 100;
		$sum3 = $sum2 + bi_premium( $subline, $bi );
		$sum4 = $sum3 + pd_premium( $subline, $pd );
		$sum5 = $sum4 + $pa_premium;
		$total = number_format(round(tax_add($sum5)));
		$ln = ln('comment total');
		echo "<div class='note result'>$ln $total</div>";
	}

?>




<ul>

<li> 자동차 및 각종 보험에 대해 궁금하시면 필고 컨설팅 : 070-7529-1749 로 연락주십시오.

<li> 자연재해 AON(Act Of Nature)는 지진과 자연재해를 말하는데, 필리핀에서는 '홍수'로 인한 침수가 일반적입니다.
자연재해 옵션을 선택하는 것과 하지 않는 것에 비용 차이가 다소 큽니다.

<li> 2008 년식 이전의 차량은 가급적 '자동차 모델 검색'을 통해서 검색을 해 주십시오.

<li> 손상 배상액과 신체 손상 배상액은 각 각 10 만 페소 정도가 적당합니다.

따라서 홍수 지역에 거주하지 않는다면 자연재해 옵션은 권장하지 않습니다.




<li> PC – Private Car
	like Sedan (e.g., Toyota Vios, Mits. Lancer, Ford Focus, Honda Civic)
	or like hatch body type.
<li> PV - Private Vehicle.
<li> CV – Commercial Vehicle.  The vehicles under this classifications are SUVs,  vans, pick-ups, wagons and AUVs

<li>

			SC -
				Subline Code for 2008 and above. PC 2%, PC w/ AON 2.3%, PV/CV 1.3%, PV/CV w/ AON 1.7%
				Subline Code for 2007 and below. PC 2.25%, PC w/ AON 2.75%, PV/CV 1.6%, PV/CV w/ AON 2.1%
				

</ul>

