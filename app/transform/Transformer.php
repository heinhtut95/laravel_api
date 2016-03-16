<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 16-3-16
 * Time: 上午12:18
 */

namespace App\transform;


abstract class Transformer
{
    public function transformCollection($items)
    {
        return array_map([$this,'transform'],$items);
    }

    public abstract function transform($item);
}