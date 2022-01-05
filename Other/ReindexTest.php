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
        $files = $reindex->getFileInfo(__DIR__ . "/../LeetCode/Q1_TwoSum_Test.php");

        echo "<pre>files = " . print_r($files, true) . "</pre>\n";

        $this->assertEquals("array", gettype($files));
    }

    public function testGetFilesInfo()
    {
        $reindex = new Reindex();
        $files = $reindex->getFilesInfo([__DIR__ . "/../LeetCode/Q1_TwoSum_Test.php"]);

        echo "<pre>files = " . print_r($files, true) . "</pre>\n";

        $this->assertEquals("array", gettype($files));
    }
}
