<?php
	$arr="n=number&t=text&h=hidden&s=submit";
	var_dump($arr);
	$hrr=parse_str($arr);
	echo $n;
	var_dump($hrr);

	function post_to_add_sql($table){
		$sql="INSERT INTO $table (";
		$sql2=") VALUES (";
		foreach ($_POST as $key => $value) {
			$sql.="$key, ";
			$sql2.="$value, ";
		}
		$sql=rtrim($sql, " ,");
		$sql2=rtrim($sql2, " ,");
		return "$sql" . "$sql2)";
	}

	function post_to_update_sql($table){

	}

	function make_field($txt){
		$txt=explode(".", $txt);
		$c=count($txt);
		if($c){
			echo $txt[1];
			echo "<input type=\"";

			echo $txt[0];//na-ah!
			echo $arr[$txt[0]]

			echo "\"";
			if($c>1){
				echo " name=\"$txt[1]\"";
			}
			if($c>2){
				echo " value=\"$txt[2]\"";
			}
			echo "><br/>\n";
		}
	}

	function make_form($table){
		echo "<form>\n";

	}

	var_dump($_POST);
	if(isset($_POST['table'])){
		$table=$_POST['table'];
		unset($_POST['table']);
		$label=isset($_POST['label']) ? $_POST['label'] : "";
		if(isset($_POST['action'])){
			$action=$_POST['action'];
			unset($_POST['action']);
			if($action=="add"){
				$sql=post_to_add_sql($table);
				var_dump($sql);
				$multiple=isset($_POST['multiple']) ? $_POST['multiple'] : "1";
				unset($_POST['multiple']);
				for($i=0;$i<$multiple;$i++){

				}
			}elseif($action="update"){

			}elseif($action="delete"){

			}else{
				echo "BŁONT!";
			}
		}else{
			echo "zdefiniowałes action?";
		}
	}else{
		echo "nie ma nazwy tablicy";
	}
	var_dump($_POST);
	make_field("h.lala.mama");
	make_field("t.lama");
	make_field("n.lala");

	?>

	<form action="" method="POST">
		<input type="number" name="multiple">
		<input type="text" name="fejm">
		<input type="hidden" name="table" value="game">
		<input type="submit" name="action" value="add">
	</form>