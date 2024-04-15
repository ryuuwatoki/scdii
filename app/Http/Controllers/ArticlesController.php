<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class ArticlesController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index');
    // }

    // public function index(){
    //     $articles = Article::all();
    //     // return view(view: 'articles.index', ['articles' => $articles]);
    //     // return view('articles.index', ['articles' => $articles]);
    //     return view('articles.index', data: ['articles' => $articles]);
    // }

    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }



    public function create(){
        return view(view: 'articles.create');
    }

    public function store( Request $request){
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:5',
        ]);

        // auth()->user()->articles()->create($content);
        // return redirect()->route(route: 'root');

        auth()->user()->articles()->create($content);
        return redirect()->route('root')->with('notice','追加完了！');
    }

    public function edit($id){
        $article = Article::find($id);
        // $article = auth()->user()-> Article::find($id);
        // return view(view: 'articles.edit',['article'=>$article]);
        return view('articles.edit', ['article' => $article]);
    }


    public function update(Request $request,$id){
        $article = Article::find($id);

        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:5',
        ]);

        $article->update($content);
        return redirect()->route('root')->with('notice','更新完了！');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('root')->with('notice','削除した！');
    }


}
