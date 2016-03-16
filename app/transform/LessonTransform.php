<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 16-3-15
 * Time: 下午10:24
 */

namespace App\transform;


class LessonTransform extends Transform
{
    public function transform($lesson)
    {
        return [
            'id'=>$lesson['id'],
            'title'=>$lesson['title'],
            'content'=>$lesson['body'],
            'is_free'=>(boolean)$lesson['free']
        ];
    }

}