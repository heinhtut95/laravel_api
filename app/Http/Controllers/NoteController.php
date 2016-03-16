<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return Response::json([
            'status'=>'success',
            'status_code'=>200,
            'data'=>$this->transformCollection($lessons->toArray())
        ]);
    }

    public function transformCollection($lessons)
    {
        return array_map([$this,"transform"],$lessons);
    }
    public function transform($lesson)
    {
            return [
                'title'=>$lesson['title'],
                'content'=>$lesson['body'],
                'is_free'=>(boolean)$lesson['free'],
            ];
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
        $lesson =Lesson::find($id);
        if(!$lesson){
            return Response::json([
                'status'=>'failed',
                'status_code'=>404,
                'message'=>'Not found'
            ]);
        }
        return Response::json([
            'status'=>'success',
            'status_code'=>200,
            'data'=>$this->transform($lesson)
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
