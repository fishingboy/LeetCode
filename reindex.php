<?php
require "bootstrap.php";

use Library\Reindex;

$reindex = new Reindex();
$reindex->exec();