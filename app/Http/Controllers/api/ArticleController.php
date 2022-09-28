<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = auth()->user()->articles()->orderBy('created_at', 'desc')->paginate(15);

        if(!$articles){
            return response()->json([
                'status' => 'fail',
                'message' => 'Articles failed to get'
            ], 404);
        }else{
            return response()->json([
                'status' => 'success',
                'data' => $articles
            ], 200);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),[
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $articles = new Article();
        $articles->title = $request->title;
        $articles->content = $request->content;
        $articles->image = $request->image;
        $articles->user_id = auth()->user()->id;
        $articles->category_id = $request->category_id;

        if(auth()->user()->articles()->save($articles)){
            return response()->json([
                'status' => 'success',
                'message' => 'articles stored successfully',
                'data' => $articles,
            ], 201);
        }else{
            return response()->json([
                'status' => 'fail',
                'message' => 'articles failed to store'
            ], 500);
        }

        return redirect('/home');
    }
    public function add()
    {
        return view('add');
    }

    public function show($id)
    {
        $articles = Article::find($id);

        if(!$articles){
            return response()->json([
                'status' => 'fail',
                'message' => 'articles failed to get'
            ], 404);
        }else{
            return response()->json([
                'status' => 'success',
                'data' => $articles
            ], 200);
        }
    }

    public function edit($id)
    {
        return view('update');
    }
    public function update(Request $request, $id)
    {
        return view('update');
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $articles = Article::find($id);
        $articles->title = $request->title;
        $articles->content = $request->content;
        $articles->image = $request->image;
        $articles->save();

        return response()->json([
            "success" => true,
            "message" => "Article has been Update",
            "data" => $articles
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $articles = Article::find($id);
       $articles->delete();

    //    return response()->json([
    //     "success" => true,
    //     "message" => "Article has been deleted",
    //     "data" => $articles
    //     ]);

        return redirect('home');
    }
}
