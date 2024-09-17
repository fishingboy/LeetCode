<?php

// 要轉換的測試類所在的目錄路徑
$directory = './LeetCode/';

// 獲取目錄中的所有文件
$files = scandir($directory);

$testCases = [];

foreach ($files as $file) {
    // 只處理以 .php 結尾的文件，並且不處理 . 和 .. 的特殊條目
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php'
        && !in_array($file, ['.', '..'])
        && preg_match('/^Q[0-9]+/', $file)
    ) {
        echo "file => $file\n";

        // 構造測試類的完整路徑
        $filePath = $directory . $file;

        // 將文件內容讀入字符串
        $fileContent = file_get_contents($filePath);

        // 轉換過的就不要再做一次
        if (strpos($fileContent, 'testFromTestData') !== false) {
            echo "find!";
            continue;
        }

        // 取得題號
        $questionNo = explode("_", basename($file))[0];

        // 使用正則表達式匹配測試方法名和預期結果
//        preg_match_all('/public function\s+test.*?\((.*?)\)\s*{\s*\$.*?->.*?(\(.*?\));.*?\$this->assertEquals\s*\((.*?),\s*\$response.*?;\s*}/s', $fileContent, $matches, PREG_SET_ORDER);

        $lines = explode("\n", $fileContent);
        $i = 0;

        while (true) {
            $i++;
            if (!isset($lines[$i])) {
                break;
            }

            if (strpos($lines[$i], "public function test_")) {
                $name = str_replace("public function test_", "", $lines[$i]);
                $name = str_replace("()", "", $name);

                $testCase = [
                    'name' => trim($name),
                    'args' => '$args',
                    'expected' => '$expected'
                ];
                $testCases[] = $testCase;
            }

        }

        echo "break;";
        break;
    }
}

// 將測試用例轉換為 JSON 格式並輸出
$jsonOutput = json_encode($testCases, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

file_put_contents("../TestData/{$questionNo}.json", $jsonOutput);

echo "output: {$questionNo}.json \n";
echo $jsonOutput;
