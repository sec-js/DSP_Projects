<?php
$hashfile= "secrethashes.json";
$valOne = "881d7c42df2c994568d9960a1bada0e9";
$valTwo = "a8602db5426d21a7a7c79b3f1ec6577a";


function checkOne($val) {
  global $valOne;
  return strcasecmp($val, $valOne) == 0;
}

function checkTwo($val) {
  global $valTwo;
  return strcasecmp($val, $valTwo) == 0;
}


function writeOne($val) {
  $json = getHashes();
  $json["hashone"] = $val;
  writeHash($json);


}

function writeTwo($val) {
  $json = getHashes();
  $json["hashtwo"] = $val;
  writeHash($json);
}



function getHashes() {
  global $hashfile;
  $json = json_decode(file_get_contents($hashfile), true);
  return $json;
}



function writeHash($json) {
  global $hashfile;
  file_put_contents($hashfile, json_encode($json));
}

?>
