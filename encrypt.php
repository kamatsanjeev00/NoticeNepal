<?php
function secured_hash($input){
$output = password_hash($input, PASSWORD_DEFAULT);
return $output;
}
//let the password column be 255 char in size. or we can use PASSWORD_BCRYPT that is always 60 character long.
//the output var can have hash or false if it fails.
echo "<p>".secured_hash('@jaiShambhu$13#')."</p>"
?>