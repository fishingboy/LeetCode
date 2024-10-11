<?php

namespace Library;

use PHPUnit\Framework\TestCase;

class TestBase extends TestCase
{
    public function buildTree($nums): TreeNode
    {
        $builder = new TreeBuilder($nums);
        return $builder->getRoot();
    }
}