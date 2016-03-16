<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\transform\ArticleTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class ArticleController extends BasicController
{
    protected $articleTransformer;

    public function __construct(ArticleTransformer $articleTransformer)
    {
        $this->articleTransformer = $articleTransformer;
        $this->middleware('auth.basic');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return $this->response([
            'status'=>'success',
            'status_code'=>200,
            'data'=>$this->articleTransformer->transformCollection($lessons->toArray())
        ]);
    }

//    public function transform($lesson)
//    {
//       return [
//           'title'=>$lesson['title'],
//           'content'=>$lesson['body'],
//           'is_free'=>(boolean)$lesson['free']
//       ];
//    }

//    public function transformCollection($lessons)
//    {
//        return array_map([$this,'transform'],$lessons);
//    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        if(!$lesson){
            return $this->responseNotFound();
        }
        return $this->response([
            'status'=>"success",
            'status_code'=>200,
            'data'=>$this->articleTransformer->transform($lesson->toArray())
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
