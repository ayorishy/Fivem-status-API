<?php

/* 在这里更新你的服务器信息 */

$server_settings['title'] = "Default"; /*  服务器名字 */
$server_settings['ip'] = "localhost"; /*  服务器IP */
$server_settings['port'] = "30120"; /*  服务器端口 */
$server_settings['max_slots'] = 64;/*  服务器最大人数 */

$content = json_decode(file_get_contents("http://".$server_settings['ip'].":".$server_settings['port']."/info.json"), true);  /*  检测服务器状态 */
if($content):
    $fivem_players = file_get_contents("http://".$server_settings['ip'].":".$server_settings['port']."/players.json");  /*  检测完毕,读取服务器人数 */
    $content = json_decode($fivem_players, true);
    $player_count = count($content);
    $SERVER_STATUS = "<font style='color: green;'>在线</font>";  

    else:
        $SERVER_STATUS = "<font style='color: red;'>离线</font>";
endif;



?>

<html>


<span>服务器状态 : <?php echo "$SERVER_STATUS"; ?> </span> 
<span>在线玩家 : <?php echo "$player_count / $server_settings[max_slots]"; ?></span>

</html>
