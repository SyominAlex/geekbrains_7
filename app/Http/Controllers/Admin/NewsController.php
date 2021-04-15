<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNews;
use App\Http\Requests\UpdateNews;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
    	$news = News::select(['id', 'title', 'text', 'created_at'])->get();
		return view('admin.news.index', [
			'news' => $news,
			'count' => News::count()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
		return view('admin.news.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateNews $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(CreateNews $request)
    {
    	$news = News::create($request->validated());
    	if($news) {
			return redirect()->route('admin.news.index')
				->with('success', __('messages.admin.news.create.success'));
		}

    	return back()->with('error', __('messages.admin.news.create.fail'));
    }

	/**
	 * Display the specified resource.
	 *
	 * @param News $news
	 * @return \Illuminate\Http\Response
	 */
    public function show(News $news)
    {
        //
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param News $news
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
	 */
    public function edit(News $news)
    {
    	$categories = Category::all();
		return view('admin.news.edit', [
			'news' => $news,
			'categories' => $categories
		]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateNews $request
	 * @param News $news
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateNews $request, News $news)
    {
        $news = $news->fill($request->validated());
        $news->category_id = $request->validated()['category_id'];
        if($news->save()) {
			return redirect()->route('admin.news.index')
				->with('success', __('messages.admin.news.update.success'));
		}

        return back()->with('error', __('messages.admin.news.update.fail'));
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param News $news
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
    public function destroy(News $news)
    {
      try {
		  if (request()->ajax()) {
			  $news->delete();

			  return response()->json(['success' => true]);
		  }
	  }catch(\Exception $e) {
		  return response()->json(['success' => false]);
	  }
    }
}
