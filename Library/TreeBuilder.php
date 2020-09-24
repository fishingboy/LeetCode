<?php

namespace Library;

use Library\TreeNode;

class TreeBuilder
{
    /**
     * @var TreeNode
     */
    private $root;

    public function __construct($nums)
    {
        $this->buildTree($nums);
    }

    public function buildTree($nums)
    {
        $num = array_shift($nums);
        $root = new TreeNode($num);
        $node_queue[] = $root;
        while (count($nums)) {
            $node = array_shift($node_queue);
            $left_value = array_shift($nums);
            $right_value = array_shift($nums);
            if (null !== $left_value) {
                $left_node = new TreeNode($left_value);
                $node->left = $left_node;
                $node_queue[] = $left_node;
            }
            if (null !== $right_value) {
                $right_node = new TreeNode($right_value);
                $node->right = $right_node;
                $node_queue[] = $right_node;
            }
        }
        $this->root = $root;
    }

    public function getRoot()
    {
        return $this->root;
    }
}