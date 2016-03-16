<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 16-3-16
 * Time: 上午12:20
 */

namespace App\transform;


use Illuminate\Support\Facades\Response;

class ArticleTransformer extends Transformer
{
   public function transform($lesson)
   {
       return [
           'title'=>$lesson['title'],
           'content'=>$lesson['body'],
           'is_free'=>(boolean)$lesson['free']
       ];
   }
}