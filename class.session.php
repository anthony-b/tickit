<?php

function logout(){
	session_unset();
	unset($_COOKIE['tick-it']);
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
}

?>