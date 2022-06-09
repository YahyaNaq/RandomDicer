<?php

$rolled=[];

function RollRand() {
	$no_of_dice = $_POST["number"];
	$sides = $_POST["dice"];
	for ($dice=1;$dice<=$no_of_dice;$dice++) {
		$rolled[]=rand(1,$sides);
	}
	return $rolled;
}
