<?php

namespace Library;

class Reindex
{
    public function exec()
    {
        $files = $this->getFiles();
        $files = $this->getFilesInfo($files);
        echo "<pre>files = " . print_r($files, true) . "</pre>\n";
    }

    /**
     * 取得所有檔案
     * @return array
     */
    public function getFiles(): array
    {
        $dir = opendir(__DIR__ . "/../LeetCode");
        $files = [];
        while ($file = readdir($dir)) {
            if (preg_match("/^Q([0-9]+).*\.php/" , $file, $matches)) {
                $no = intval($matches[1]);
                $files[$no] = $file;
            }
        }
        return $files;
    }

    public function getFileInfo($file): array
    {
        $info = [];
        $content = file_get_contents($file);

        // 題號
        preg_match("/Q([0-9]+).*\.php/" , $file, $matches);
        $info['no'] = intval($matches[1]);

        // TAG
        if (preg_match("/\* @tag (.*)/", $content, $matches)) {
            $info['tag'] = $matches[1];
        }
        return $info;
    }

    public function getFilesInfo(array $files)
    {
        foreach ($files as $key => $file) {
            $files[$key] = $this->getFileInfo($file);
        }
        return $files;
    }
}

