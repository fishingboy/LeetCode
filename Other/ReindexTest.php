<?php

namespace Other\Reindex;

use Library\Reindex;
use PHPUnit\Framework\TestCase;

class ReindexTest extends TestCase
{
    public function testGetFiles()
    {
        $reindex = new Reindex();
        $files = $reindex->getFiles();

        echo "<pre>files = " . print_r($files, true) . "</pre>\n";

        $this->assertEquals("array", gettype($files));
    }

    public function testGetFileInfo()
    {
        $reindex = new Reindex();
        $files = $reindex->getFileInfo("/mnt/c/Users/Leo/Code/LeetCode/LeetCode/Q1_TwoSum_Test.php");

        echo "<pre>files = " . print_r($files, true) . "</pre>\n";

        $this->assertEquals("array", gettype($files));
    }
}
