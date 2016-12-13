<?php


function genVar(){
	$letters = ['P','Q','R'];
	shuffle($letters);
	$letter = current($letters);
	if(!rand(0,2)){
		$letter = '-'.$letter;
	}
	return $letter;
}

function genOp(){
	$ops = ['->','<->','^','v','x'];
	shuffle($ops);
	return current($ops);
}

function genExpr(){
	if(rand(0,1)){
		return genVar();
	} else {
		$expr = '('.genExpr();
		$expr.= ' '.genOp().' ';
		$expr.= genExpr();
		$expr.= ')';
		if(!rand(0,3)){
			$expr = '-'.$expr;
		}
		return $expr;
	}
}

$stop_at = rand(10,20);
$i = 1;
while(true){
	$expr = genExpr();
	if(strlen($expr) > 10 && strlen($expr) < 50){
		if(substr($expr,0,1)=='('){
			$expr = substr($expr,1,-1);
		}
		echo $expr;
		echo PHP_EOL;
	}
	$i++;
	if($i==$stop_at){
		sleep(1);
		$i = 0;
		$stop_at = rand(10,20);
	}
}

