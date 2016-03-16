<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\transform\LessonTransform;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class LessonController extends ApiController
{
    protected $lessonTransform;

    public function __construct(LessonTransform $lessonTransform)
    {
        $this->lessonTransform = $lessonTransform;
        $this->middleware("auth.basic");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return $this->response( [
            'status'=>'success',
            'status_code'=>$this->getStatusCode(),
            'data'=>$this->lessonTransform->transformCollection($lessons->toArray())
        ]);
    }

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
        $lesson =  Lesson::find($id);
        if(!$lesson){
            return $this->setStatusCode('404')->responseNotFound('Lesson Not Found');
        }
        return $this->response([
            'status'=>'success',
//            'status_code'=>200,
            'data'=>$this->lessonTransform->transform($lesson)
        ]);
    }

    public function sho()
    {
        
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
