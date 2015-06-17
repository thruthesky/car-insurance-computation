<?php
list($brand,$data) = get_data();

$model = 0;
$subline_code = 1;
$passenger = 3;
$unit = 5;
$type = 14;


$y2015 = 6;
$y2014 = 7;
$y2013 = 8;
$y2012 = 9;
$y2011 = 10;
$y2010 = 11;
$y2009 = 12;
$y2008 = 13;

if ( isset($_GET['keyword']) ) $keyword = $_GET['keyword'];
else $keyword = null;

?>
<div class='choose-car-brand'>
	<div class='title'><?=ln('title choose a car')?></div>
	<div class='note'><?=ln('note choose a car')?></div>
	<div class='caption'>
		<form>
			<input type='hidden' name='action' value='choose-car-brand'>
			<input type='text' name='keyword' placeholder="<?=ln('search your car')?>">
			<input type='submit' value="<?=ln('submit search')?>">
			<a href='./'><?=ln('submit cancel')?></a>
		</form>
	</div>
	
	<div class='value brand'>
		<? foreach ( $brand as $name => $sub ) { ?>
			<a href='?action=choose-car-brand&keyword=<?=$name?>'><span><?=$name?></span></a>
		<? } ?>
	</div>
	<? if ( $keyword ) { ?>
		<div class='search-result'>
		
			<?=ln('select price')?>
			
			<table>
				<tr>
					<td>Model</td>
					<td>Seats</td>
					<td>Type</td>
					<td>SC</td>
					<td>2015</td>
					<td>2014</td>
					<td>2013</td>
					<td>2012</td>
					<td>2011</td>
					<td>2010</td>
					<td>2009</td>
					<td>2008</td>
				</tr>
				<?
					foreach ( $data as $car ) {
						if ( stripos($car[$model], $keyword) !== false || stripos($car[$unit], $keyword) !== false ) {
				?>
					<tr>
						<td><span><?=$car[$unit]?></span></td>
						<td><span><?=$car[$passenger]?></span></td>
						<td><span><?=$car[$type]?></span></td>
						<td><span><?=$car[$subline_code]?></span></td>
						<td><a href="?unit=<?=$car[$unit]?>&passenger=<?=$car[$passenger]?>&type=<?=$car[$type]?>&subline=<?=$car[$subline_code]?>&year=2015&price=<?=$car[$y2015]?>"><span class='price'><? if ( $car[$y2015] ) echo number_format($car[$y2015])?></span></a></td>
						<td><a href="?unit=<?=$car[$unit]?>&passenger=<?=$car[$passenger]?>&type=<?=$car[$type]?>&subline=<?=$car[$subline_code]?>&year=2014&price=<?=$car[$y2014]?>"><span class='price'><? if ( $car[$y2014] ) echo number_format($car[$y2014])?></span></a></td>
						<td><a href="?unit=<?=$car[$unit]?>&passenger=<?=$car[$passenger]?>&type=<?=$car[$type]?>&subline=<?=$car[$subline_code]?>&year=2013&price=<?=$car[$y2013]?>"><span class='price'><? if ( $car[$y2013] ) echo number_format($car[$y2013])?></span></a></td>
						<td><a href="?unit=<?=$car[$unit]?>&passenger=<?=$car[$passenger]?>&type=<?=$car[$type]?>&subline=<?=$car[$subline_code]?>&year=2012&price=<?=$car[$y2012]?>"><span class='price'><? if ( $car[$y2012] ) echo number_format($car[$y2012])?></span></a></td>
						<td><a href="?unit=<?=$car[$unit]?>&passenger=<?=$car[$passenger]?>&type=<?=$car[$type]?>&subline=<?=$car[$subline_code]?>&year=2011&price=<?=$car[$y2011]?>"><span class='price'><? if ( $car[$y2011] ) echo number_format($car[$y2011])?></span></a></td>
						<td><a href="?unit=<?=$car[$unit]?>&passenger=<?=$car[$passenger]?>&type=<?=$car[$type]?>&subline=<?=$car[$subline_code]?>&year=2010&price=<?=$car[$y2010]?>"><span class='price'><? if ( $car[$y2010] ) echo number_format($car[$y2010])?></span></a></td>
						<td><a href="?unit=<?=$car[$unit]?>&passenger=<?=$car[$passenger]?>&type=<?=$car[$type]?>&subline=<?=$car[$subline_code]?>&year=2009&price=<?=$car[$y2009]?>"><span class='price'><? if ( $car[$y2009] ) echo number_format($car[$y2009])?></span></a></td>
						<td><a href="?unit=<?=$car[$unit]?>&passenger=<?=$car[$passenger]?>&type=<?=$car[$type]?>&subline=<?=$car[$subline_code]?>&year=2008&price=<?=$car[$y2008]?>"><span class='price'><? if ( $car[$y2008] ) echo number_format($car[$y2008])?></span></a></td>
					</tr>
					<? } ?>
				<? } ?>
			</table>
		</div>
	<? } ?>
</div>

<?php






function get_data_file() {
	return "table_of_car_market_price.csv";
}
function get_data() {
	$row = 1;
	$brands = array();
	$datas = array();
	if ( ( $handle = fopen(get_data_file(), "r") ) !== FALSE) {
		while ( ($data = fgetcsv($handle, 1000, ",")) !== FALSE ) {
			$num = count($data);
			$row++;
			if ( $row < 3 ) continue;
			$brand = $data[0];
			if ( empty($brand) ) continue;
			if ( ! isset($brands[$brand]) ) $brands[$brand] = 0;
			$brands[$brand] ++;
			$datas[] = $data;
		}
		fclose($handle);
	}
	return array($brands, $datas);
}

?>