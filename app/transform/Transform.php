<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 16-3-15
 * Time: 下午10:22
 */

namespace App\transform;


abstract class Transform
{
    /**
     * @param $items
     * @return array
     */
    public function transformCollection($items)
    {
        return array_map([$this,'transform'],$items);
    }

    /**
     * @return mixed
     */
    public abstract function transform($item);
}