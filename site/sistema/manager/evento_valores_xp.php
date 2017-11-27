<?
include_once('../classes/class.valores.php');
include_once('../classes/service.valores.php');

// Insere variсveis do Form na Classe
$valores = new Valores();

// Se щ uma ediчуo, preenche o objeto com dados do BD
if ($_REQUEST["eval_id"]) {
	$valores->select($_REQUEST["eval_id"]);
}

// Preenche os dados editados
$valores->setID($_REQUEST["eval_id"]);
$valores->setEVEN_ID($_REQUEST["even_id"]);

switch ($_REQUEST["mesData1"]) {
	case "Jan": $mesData1 = 1; break;
	case "Fev": $mesData1 = 2; break;
	case "Mar": $mesData1 = 3; break;
	case "Abr": $mesData1 = 4; break;
	case "Mai": $mesData1 = 5; break;
	case "Jun": $mesData1 = 6; break;
	case "Jul": $mesData1 = 7; break;
	case "Ago": $mesData1 = 8; break;
	case "Set": $mesData1 = 9; break;
	case "Out": $mesData1 = 10; break;
	case "Nov": $mesData1 = 11; break;
	case "Dez": $mesData1 = 12; break;
}

$fim = date("Y-m-d H:i:s",mktime(0,0,0,$mesData1,$_REQUEST["diaData1"],$_REQUEST["anoData1"]));
$valores->setFIM($fim);

function currencyStrClean($currency) {
	$currency = str_replace(".","",$currency);
	$currency = str_replace(",",".",$currency);
	$currency = $currency * 100;
	return $currency;
}

$valores->setACOMP(currencyStrClean($_REQUEST["acomp"]));

$valores->setA1(currencyStrClean($_REQUEST["a1"]));
$valores->setA2(currencyStrClean($_REQUEST["a2"]));
$valores->setA3(currencyStrClean($_REQUEST["a3"]));
$valores->setA4(currencyStrClean($_REQUEST["a4"]));
$valores->setA5(currencyStrClean($_REQUEST["a5"]));
$valores->setA6(currencyStrClean($_REQUEST["a6"]));

$valores->setB1(currencyStrClean($_REQUEST["b1"]));
$valores->setB2(currencyStrClean($_REQUEST["b2"]));
$valores->setB3(currencyStrClean($_REQUEST["b3"]));
$valores->setB4(currencyStrClean($_REQUEST["b4"]));
$valores->setB5(currencyStrClean($_REQUEST["b5"]));
$valores->setB6(currencyStrClean($_REQUEST["b6"]));

$valores->setC1(currencyStrClean($_REQUEST["c1"]));
$valores->setC2(currencyStrClean($_REQUEST["c2"]));
$valores->setC3(currencyStrClean($_REQUEST["c3"]));
$valores->setC4(currencyStrClean($_REQUEST["c4"]));
$valores->setC5(currencyStrClean($_REQUEST["c5"]));
$valores->setC6(currencyStrClean($_REQUEST["c6"]));

$valores->setD1(currencyStrClean($_REQUEST["d1"]));
$valores->setD2(currencyStrClean($_REQUEST["d2"]));
$valores->setD3(currencyStrClean($_REQUEST["d3"]));
$valores->setD4(currencyStrClean($_REQUEST["d4"]));
$valores->setD5(currencyStrClean($_REQUEST["d5"]));
$valores->setD6(currencyStrClean($_REQUEST["d6"]));

$valores->setE1(currencyStrClean($_REQUEST["e1"]));
$valores->setE2(currencyStrClean($_REQUEST["e2"]));
$valores->setE3(currencyStrClean($_REQUEST["e3"]));
$valores->setE4(currencyStrClean($_REQUEST["e4"]));
$valores->setE5(currencyStrClean($_REQUEST["e5"]));
$valores->setE6(currencyStrClean($_REQUEST["e6"]));

$valores->setF1(currencyStrClean($_REQUEST["f1"]));
$valores->setF2(currencyStrClean($_REQUEST["f2"]));
$valores->setF3(currencyStrClean($_REQUEST["f3"]));
$valores->setF4(currencyStrClean($_REQUEST["f4"]));
$valores->setF5(currencyStrClean($_REQUEST["f5"]));
$valores->setF6(currencyStrClean($_REQUEST["f6"]));

$valores->setG1(currencyStrClean($_REQUEST["g1"]));
$valores->setG2(currencyStrClean($_REQUEST["g2"]));
$valores->setG3(currencyStrClean($_REQUEST["g3"]));
$valores->setG4(currencyStrClean($_REQUEST["g4"]));
$valores->setG5(currencyStrClean($_REQUEST["g5"]));
$valores->setG6(currencyStrClean($_REQUEST["g6"]));

$valores->setH1(currencyStrClean($_REQUEST["h1"]));
$valores->setH2(currencyStrClean($_REQUEST["h2"]));
$valores->setH3(currencyStrClean($_REQUEST["h3"]));
$valores->setH4(currencyStrClean($_REQUEST["h4"]));
$valores->setH5(currencyStrClean($_REQUEST["h5"]));
$valores->setH6(currencyStrClean($_REQUEST["h6"]));

$valores->setI1(currencyStrClean($_REQUEST["i1"]));
$valores->setI2(currencyStrClean($_REQUEST["i2"]));
$valores->setI3(currencyStrClean($_REQUEST["i3"]));
$valores->setI4(currencyStrClean($_REQUEST["i4"]));
$valores->setI5(currencyStrClean($_REQUEST["i5"]));
$valores->setI6(currencyStrClean($_REQUEST["i6"]));

$valores->setJ1(currencyStrClean($_REQUEST["j1"]));
$valores->setJ2(currencyStrClean($_REQUEST["j2"]));
$valores->setJ3(currencyStrClean($_REQUEST["j3"]));
$valores->setJ4(currencyStrClean($_REQUEST["j4"]));
$valores->setJ5(currencyStrClean($_REQUEST["j5"]));
$valores->setJ6(currencyStrClean($_REQUEST["k6"]));

$valores->setK1(currencyStrClean($_REQUEST["k1"]));
$valores->setK2(currencyStrClean($_REQUEST["k2"]));
$valores->setK3(currencyStrClean($_REQUEST["k3"]));
$valores->setK4(currencyStrClean($_REQUEST["k4"]));
$valores->setK5(currencyStrClean($_REQUEST["k5"]));
$valores->setK6(currencyStrClean($_REQUEST["l6"]));

$valores->setL1(currencyStrClean($_REQUEST["l1"]));
$valores->setL2(currencyStrClean($_REQUEST["l2"]));
$valores->setL3(currencyStrClean($_REQUEST["l3"]));
$valores->setL4(currencyStrClean($_REQUEST["l4"]));
$valores->setL5(currencyStrClean($_REQUEST["l5"]));
$valores->setL6(currencyStrClean($_REQUEST["l6"]));

$valores->setM1(currencyStrClean($_REQUEST["m1"]));
$valores->setM2(currencyStrClean($_REQUEST["m2"]));
$valores->setM3(currencyStrClean($_REQUEST["m3"]));
$valores->setM4(currencyStrClean($_REQUEST["m4"]));
$valores->setM5(currencyStrClean($_REQUEST["m5"]));
$valores->setM6(currencyStrClean($_REQUEST["m6"]));

$valores->setN1(currencyStrClean($_REQUEST["n1"]));
$valores->setN2(currencyStrClean($_REQUEST["n2"]));
$valores->setN3(currencyStrClean($_REQUEST["n3"]));
$valores->setN4(currencyStrClean($_REQUEST["n4"]));
$valores->setN5(currencyStrClean($_REQUEST["n5"]));
$valores->setN6(currencyStrClean($_REQUEST["n6"]));

$valores->setO1(currencyStrClean($_REQUEST["o1"]));
$valores->setO2(currencyStrClean($_REQUEST["o2"]));
$valores->setO3(currencyStrClean($_REQUEST["o3"]));
$valores->setO4(currencyStrClean($_REQUEST["o4"]));
$valores->setO5(currencyStrClean($_REQUEST["o5"]));
$valores->setO6(currencyStrClean($_REQUEST["o6"]));

$valores->setP1(currencyStrClean($_REQUEST["p1"]));
$valores->setP2(currencyStrClean($_REQUEST["p2"]));
$valores->setP3(currencyStrClean($_REQUEST["p3"]));
$valores->setP4(currencyStrClean($_REQUEST["p4"]));
$valores->setP5(currencyStrClean($_REQUEST["p5"]));
$valores->setP6(currencyStrClean($_REQUEST["p6"]));

$valores->setQ1(currencyStrClean($_REQUEST["q1"]));
$valores->setQ2(currencyStrClean($_REQUEST["q2"]));
$valores->setQ3(currencyStrClean($_REQUEST["q3"]));
$valores->setQ4(currencyStrClean($_REQUEST["q4"]));
$valores->setQ5(currencyStrClean($_REQUEST["q5"]));
$valores->setQ6(currencyStrClean($_REQUEST["q6"]));

$valores->setR1(currencyStrClean($_REQUEST["r1"]));
$valores->setR2(currencyStrClean($_REQUEST["r2"]));
$valores->setR3(currencyStrClean($_REQUEST["r3"]));
$valores->setR4(currencyStrClean($_REQUEST["r4"]));
$valores->setR5(currencyStrClean($_REQUEST["r5"]));
$valores->setR6(currencyStrClean($_REQUEST["r6"]));

$valores->setS1(currencyStrClean($_REQUEST["s1"]));
$valores->setS2(currencyStrClean($_REQUEST["s2"]));
$valores->setS3(currencyStrClean($_REQUEST["s3"]));
$valores->setS4(currencyStrClean($_REQUEST["s4"]));
$valores->setS5(currencyStrClean($_REQUEST["s5"]));
$valores->setS6(currencyStrClean($_REQUEST["s6"]));

$valores->setT1(currencyStrClean($_REQUEST["t1"]));
$valores->setT2(currencyStrClean($_REQUEST["t2"]));
$valores->setT3(currencyStrClean($_REQUEST["t3"]));
$valores->setT4(currencyStrClean($_REQUEST["t4"]));
$valores->setT5(currencyStrClean($_REQUEST["t5"]));
$valores->setT6(currencyStrClean($_REQUEST["t6"]));

$valores->setU1(currencyStrClean($_REQUEST["u1"]));
$valores->setU2(currencyStrClean($_REQUEST["u2"]));
$valores->setU3(currencyStrClean($_REQUEST["u3"]));
$valores->setU4(currencyStrClean($_REQUEST["u4"]));
$valores->setU5(currencyStrClean($_REQUEST["u5"]));
$valores->setU6(currencyStrClean($_REQUEST["u6"]));

$valores->setV1(currencyStrClean($_REQUEST["v1"]));
$valores->setV2(currencyStrClean($_REQUEST["v2"]));
$valores->setV3(currencyStrClean($_REQUEST["v3"]));
$valores->setV4(currencyStrClean($_REQUEST["v4"]));
$valores->setV5(currencyStrClean($_REQUEST["v5"]));
$valores->setV6(currencyStrClean($_REQUEST["v6"]));

$valores->setW1(currencyStrClean($_REQUEST["w1"]));
$valores->setW2(currencyStrClean($_REQUEST["w2"]));
$valores->setW3(currencyStrClean($_REQUEST["w3"]));
$valores->setW4(currencyStrClean($_REQUEST["w4"]));
$valores->setW5(currencyStrClean($_REQUEST["w5"]));
$valores->setW6(currencyStrClean($_REQUEST["w6"]));

$valores->setX1(currencyStrClean($_REQUEST["x1"]));
$valores->setX2(currencyStrClean($_REQUEST["x2"]));
$valores->setX3(currencyStrClean($_REQUEST["x3"]));
$valores->setX4(currencyStrClean($_REQUEST["x4"]));
$valores->setX5(currencyStrClean($_REQUEST["x5"]));
$valores->setX6(currencyStrClean($_REQUEST["x6"]));

$valores->setY1(currencyStrClean($_REQUEST["y1"]));
$valores->setY2(currencyStrClean($_REQUEST["y2"]));
$valores->setY3(currencyStrClean($_REQUEST["y3"]));
$valores->setY4(currencyStrClean($_REQUEST["y4"]));
$valores->setY5(currencyStrClean($_REQUEST["y5"]));
$valores->setY6(currencyStrClean($_REQUEST["y6"]));

$valores->setZ1(currencyStrClean($_REQUEST["z1"]));
$valores->setZ2(currencyStrClean($_REQUEST["z2"]));
$valores->setZ3(currencyStrClean($_REQUEST["z3"]));
$valores->setZ4(currencyStrClean($_REQUEST["z4"]));
$valores->setZ5(currencyStrClean($_REQUEST["z5"]));
$valores->setZ6(currencyStrClean($_REQUEST["z6"]));

$valores->save();

header("Location: evento_valores.php?even_id=".$_REQUEST["even_id"]);

?>