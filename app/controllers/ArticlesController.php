<?php

class ArticlesController extends \BaseController {

	public function __construct()
    {
        //$this->beforeFilter('admin'); //check for role
        $this->beforeFilter('checkPermission'); //check for permission

    }


	public function index()
	{
		$articles = Article::all();

		return View::make('articles.index', compact('articles'));
	}

	public function create()
	{
		$article = new Article;
		return View::make('articles.create', compact('article'));
	}

	public function store()
	{
		$validator = Validator::make($data = Input::all(), Article::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Article::create($data);

		return Redirect::route('articles.index');
	}

	public function show($id)
	{
		$article = Article::findOrFail($id);

		return View::make('articles.show', compact('article'));
	}


	public function edit($id)
	{
		$article = Article::find($id);

		return View::make('articles.edit', compact('article'));
	}

	public function update($id)
	{
		$article = Article::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Article::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$article->update($data);

		return Redirect::route('articles.index');
	}

	public function destroy($id)
	{
		Article::destroy($id);

		return Redirect::route('articles.index');
	}


}