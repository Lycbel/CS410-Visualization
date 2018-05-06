<?php
$adr =$_POST['adr'];
$drug =$_POST['drug'];
$last_line=system("generateGraph.py ".$drug." ".$adr,$result);
if($last_line=='1'){
    echo("okrrlyc");
}else{
    echo($last_line);
}

?>