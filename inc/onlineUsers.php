<?php 
$rip = $_SERVER['REMOTE_ADDR'];

$sd  = time();

$onlineUsers = 1;



$file1 = "ip.txt";

$lines = file($file1);

$line2 = "";



foreach ($lines as $line_num => $line)

{

    $fp = strpos($line,'****');

    $nam = substr($line,0,$fp);

    $sp = strpos($line,'++++');

    $val = substr($line,$fp+4,$sp-($fp+4));

    $diff = $sd-$val;

    if($diff < 30000 && $nam != $rip)

    {

        $onlineUsers = $onlineUsers+1;

        $line2 = $line2.$line;

    }

}

$my = $rip."****".$sd."++++n";

$open1 = fopen($file1, "w");

fwrite($open1,"$line2");

fwrite($open1,"$my");

fclose($open1);
 echo $onlineUsers;
?>