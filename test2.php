<?php

$date = new DateTime();
echo $date->getTimestamp();
echo " ".sha1($date->getTimestamp());

?>