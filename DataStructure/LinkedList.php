<?php
/*structure example*/
$a = new stdClass();
$a->name = "Test";
$a->ref = null;
for($i = 1; $i <= 10; $i++){
	$b = new stdClass();
	$b->ref = null;
	$b->name = 'Demo-try '.$i;
	if($a->ref === null){
		$a->ref = $b;
	}else{
		$current = $a->ref;
		while($current->ref !== null){
			$current = $current->ref;
		}
		$current->ref = $b;
	}
}
print_r($a);
echo $a->name.PHP_EOL;
unset($current);
$current = $a->ref;
$i = 0;
while($current !== null){
	$i++;
	echo 'Number of iteration '.$i. PHP_EOL;
	echo $current->name;
	echo PHP_EOL;
	$current = $current->ref;
}
?>