<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$categories = Category::where('is_visible', true)->paginate(5);

        return view('admin.news.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('admin.news.categories.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateCategory $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(CreateCategory $request)
    {
		$category = Category::create($request->validated());
		if ($category) {
			 return redirect()->route('admin.categories.index')
					->with('success', __('messages.admin.news.create.success'));
		}

			return back()->with('error', __('messages.admin.news.create.fail'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Category $category
	 * @return \Illuminate\Http\Response
	 */
    public function edit(Category $category)
    {
    	return view('admin.news.categories.edit', [
			'category' => $category
		]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateCategory $request
	 * @param Category $category
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateCategory $request, Category $category)
    {
		$status = $category->fill($request->validated())->save();

		if($status) {
			return redirect()->route('admin.categories.index')
				->with('success', __('messages.admin.news.update.success'));
		}

		return back()->with('error', __('messages.admin.news.update.fail'));
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
