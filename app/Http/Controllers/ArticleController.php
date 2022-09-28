<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // get blogs data
        $articles = auth()->user()->articles()->orderBy('created_at', 'desc')->paginate(15);

        return view('dashboard.article.index', compact('articles'));
    }

    public function create()
    {
        // get all category
        $categories = Category::all();
        return view('dashboard.article.add', compact('categories'));
    }

    public function edit($id)
    {
        // get all category
        $articles = Article::find($id);
        
        $categories = Category::get();

        return view('dashboard.article.edit', compact('articles', 'categories'));
    }

    public function store(Request $request)
    {
        // validate data input
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $file = $request->file('image');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('image', $nama_file);

        $post = new Article();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $nama_file;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;

        auth()->user()->articles()->save($post);

        return redirect('/article');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $file = $request->file('image');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('image', $nama_file);


        $articles = Article::find($id);
        $articles->title = $request->input('title');
        $articles->category_id = $request->category_id;
        $articles->content = $request->input('content');
        $articles->image = $nama_file;
        

        $articles->update();
        return redirect('/article');
    }

    public function delete(Article $articles, $id)
    {
        $articles = auth()->user()->articles()->find($id);

        Storage::delete('public/image/'.$articles->image);

        $articles->delete();

        return redirect('/article');
    }
}