<?php
function displayKey($key){
    global $mode;
    
        printf("Value = '%s'",$key);

}
function scramblerData($originalData,$key){
    $original_key='abcdefghijklmnopqrstuvwxyz1234567890';
    $data='';
    $length=strlen($originalData);
    for($i=0;$i<$length;$i++){
        $currentChar=$originalData[$i];
        $position=strpos($original_key,$currentChar);
        if($position!== false){
            $data.=$key[$position];
        }else{
            $data.=$currentChar;
        }
    }
    return $data;
}

function decodeData($originalData,$key){
    $original_key='abcdefghijklmnopqrstuvwxyz1234567890';
    $data='';
    $length=strlen($originalData);
    for($i=0;$i<$length;$i++){
        $currentChar=$originalData[$i];
        $position=strpos($key,$currentChar);
        if($position!== false){
            $data.=$original_key[$position];
        }else{
            $data.=$currentChar;
        }
    }
    return $data;
}

?>