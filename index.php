<?php
/**
 * Start debug session
 * http://localhost/rightsub/index.php?XDEBUG_SESSION_START=xdebug
 */

include_once "access/OpenSubtitlesAccess.php";
header('Content-Type: text/javascript');


echo 'TEST';

$openSubsAccess = new OpenSubtitlesAccess();

$openSubsAccess->getSubs();
