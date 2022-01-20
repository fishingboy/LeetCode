<?php

namespace Library;

class Reindex
{
    public function exec()
    {
        $files = $this->getFiles();
        $files = $this->getFilesInfo($files);
        $this->rebuildReadMe($files);
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

    /**
     * 取得檔案資訊
     * @param $file
     * @return array
     */
    public function getFileInfo($file): array
    {
        $info = [
            "no" => 0,
            "title" => "",
            "tag" => "",
        ];
        $content = file_get_contents(__DIR__ . "/../LeetCode/" . $file);

        // 題號
        preg_match("/Q([0-9]+)_(.*)_Test.*\.php/" , $file, $matches);
        $info['no'] = intval($matches[1]);

        // 題目
        $info['title'] = $this->convertTitle($matches[2]);

        // TAG
        if (preg_match("/\* @tag (.*)/", $content, $matches)) {
            $info['tag'] = trim($matches[1]);
        }
        return $info;
    }

    /**
     * 取得所有檔案資訊
     * @param array $files
     * @return array
     */
    public function getFilesInfo(array $files)
    {
        foreach ($files as $key => $file) {
            $files[$key] = $this->getFileInfo($file);
        }

        usort($files, function ($a, $b) {
            return $a['no'] <=> $b['no'];
        });

        return $files;
    }

    public function rebuildReadMe($files)
    {
        $content  = "| 題號 | 標題 | 類型 |\n";
        $content .= "|----:|:----|:----|\n";
        foreach ($files as $i => $file) {
            $content .= "| {$file['no']} | {$file['title']} | {$file['tag']} |\n";
        }

        //
        file_put_contents("README.md", $content);

        return $content;
    }

    private function convertTitle($string)
    {
        $len = strlen($string);
        $output = "";
        for ($i=0; $i<$len; $i++) {
            if (65 <= ord($string[$i]) && ord($string[$i]) <= 90) {
                $output .= " ";
            } else if ($string[$i] == "_") {
                continue;
            }
            $output .= $string[$i];
        }
        return $output;
    }
}

