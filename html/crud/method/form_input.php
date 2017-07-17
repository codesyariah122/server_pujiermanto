<?
function form_buka($action=' ',$method=' '){
	$form="<form action='$action' method='$method'>";
	echo $form;
}
function form_tutup(){
	echo "</form>";
}
function label_buka($id=' ',$val=' '){
	if((!empty($id))&&(!empty($val))):
	$label="<label for='$id'>$val";
	echo $label;
	endif;
}
function label_tutup(){
	echo "</label>";
}
function input_index($type=' ',$name=' ',$id_input=' ',$value=' '){
	switch($type):
	case "text":
	$input="<input type='$type' name='$name' id='$id_input' value='$value'>";
	echo $input;
	break;
	case "email":
	$input="<input type='$type' name='$name' id='$id_input' value='$value'>";
	echo $input;
	break;
	case "number":
	$input="<input type='$type' name='$name' id='$id_input' value='$value'>";
	echo $input;
	break;
	case "hidden":
	$input="<input type='$type' name='$name' id='$id_input' value='$value'>";
	echo $input;
	break;
	case "textarea":
	$input="<textarea name='$name' id='$id_input'></textarea>";
	echo $input;
	break;
	case "submit":
	$input="<input type='$type' name='$name' id='$id_input' value='$value'>";
	echo $input;
	break;
	case "reset":
	$input="<input type='$type' name='$name' id='$id_input' value='$value' >";
	echo $input;
	break;
	endswitch;
}
function input_edit($type=' ',$name=' ',$id_input=' ',$value=' ',$disabled=' '){
	if($disabled=="disabled"){
	echo "<input type='$type' name='$name' value='$value' id='$id_input' disabled='$disabled'>";
	}
	elseif($disabled=="no"){
	switch($type):
	case "text":
	$input="<input type='$type' name='$name' value='$value' id='$id_input'>";
	echo $input;
	break;
	case "email":
	$input="<input type='$type' name='$name' value='$value' id='$id_input'>";
	echo $input;
	break;
	case "number":
	$input="<input type='$type' name='$name' id='$id_input' value='$value'>";
	echo $input;
	break;
	case "hidden":
	$input="<input type='$type' name='$name' id='$id_input' value='$value'>";
	echo $input;
	break;
	case "textarea":
	$input="<textarea cols='35' rows='5' name='$name' id='$id_input'>$value</textarea>";
	echo $input;
	break;
	case "submit":
	$input="<input type='$type' name='$name' id='$id_input' value='$value'>";
	echo $input;
	break;
	case "reset":
	$input="<input type='$type' name='$name' id='$id_input' value='$value' >";
	echo $input;
	break;
	endswitch;
	}
}
function select_buka($name=' ',$id=' '){
	if((!empty($name))&&(!empty($id))):
	$select="<select name='$name'>";
	echo $select;
	endif;
}
function select_tutup(){
	echo "</select>";
}

function table($type=' ',$border=' '){
	if($type=="buka"):
	echo "<table border='$border'>";
	elseif($type=="tutup"):
	echo "</table>";
	endif;
}
?>