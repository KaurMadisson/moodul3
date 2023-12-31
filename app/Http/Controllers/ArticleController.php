<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$articles = User::find(3)->articles()->latest()->paginate();
        $articles = auth()->user()->articles()->latest()->paginate();
        return view('articles.index', compact('articles'));
    }

    /**
     * Display a listing of the deleted resource.
     */
    public function deleted()
    {
        $articles = Article::onlyTrashed()->orderBy('deleted_at')->paginate();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article($request->validated());
        if($request->file('image')) {
            $file = $request->file('image')->store('/public');
            $article->image = Storage::url($file);
        }
        $article->user()->associate(auth()->user());
        $article->save();
        return redirect()->route('articles.index');
        $article = new Article($request->validated());
       

    }
    
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->spiciness_level = $request->input('spiciness_level',1);
        $article->meaty_burger = $request->has('meaty_burger') ? 1 : 0;
        $article->vegetarian_burger = $request->has('vegetarian_burger') ? 1 : 0;
        $article->vegan_burger = $request->has('vegan_burger') ? 1 : 0;
    $article->save();
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
//        $article->title = $request->validated('title');
//        $article->body = $request->validated('body');
        $article->fill($request->validated());
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    
}

