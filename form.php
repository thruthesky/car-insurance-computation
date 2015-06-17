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
<form>
<input type='hidden' name='mode' value='submit-computation'>


<? if ( $unit ) { ?>
	<div class='unit'>
		Your Car Model : <?=$unit?>
		<input type='hidden' name='unit' value='<?=$unit?>'>
	</div>
<? } ?>

<? if ( $type ) { ?>
	<div class='type'>
		Your Car Type: <?=$type?>
		<input type='hidden' name='type' value='<?=$type?>'>
	</div>
<? } ?>


<div>


Market Price
<input type='text' name='price' value="<?=$price?>">
<a href='?action=choose-car-brand'>Find Your Car Price</a>

</div>


<div>
	Year of Model : <input type='text' name='year' value="<?=$year?>">
		
</div>


<div>
	Type :
		<input type='radio' name='subline' value='PC' <? if ( $subline == 'PC' ) echo 'checked=1'; ?>> PC
		<input type='radio' name='subline' value='CV' <? if ( $subline == 'CV' ) echo 'checked=1'; ?>> PV &amp; CV
</div>

<div>
	Coverage of Property Damage
	<select name='pd'>
		<?=option_coverage($pd)?>
	</select>
</div>

<div>
	Coverage of Body Injury
	<select name='bi'>
		<?=option_coverage($bi)?>
	</select>
</div>


<div>
	No of Passenger
	<input type='text' name='passenger' value="<?=$passenger?>">
</div>
<div>
	Coverage Limit per Passenger :
	<input type='radio' name='pa' value='20000' <? if ( $pa == 20000 ) echo "checked=1"; ?> > 20,000
	<input type='radio' name='pa' value='50000' <? if ( $pa == 50000 ) echo "checked=1"; ?> > 50,000
</div>


<div>
	Cover Accident of Nature
		<input type='radio' name='aon' value='Y' <? if ( $aon == 'Y' ) echo 'checked=1'; ?>> Yes
		<input type='radio' name='aon' value='N' <? if ( $aon == 'N' ) echo 'checked=1'; ?>> No
</div>



<input type='submit'>
</form>

<?php

	if ( $mode == 'submit-computation' ) {
		
		$pr = product_rate($year, $subline, $aon);
		$pa_premium = pa_premium( $passenger, $pa );
		$sum2 = $price * $pr / 100;
		$sum3 = $sum2 + bi_premium( $subline, $bi );
		$sum4 = $sum3 + pd_premium( $subline, $pd );
		$sum5 = $sum4 + $pa_premium;
		$total = tax_add($sum5);
		echo $total;
	}

?>




<ul>

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
