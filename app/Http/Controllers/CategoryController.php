<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CategoryRequest;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = \App\Category::paginate(6);

		return view('category.index')->with('categories', $categories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CategoryRequest $request)
	{
		$category = new \App\Category();
		$category->name = $request->get('name');
		$result = $category->save();

		if (! $result) {
			return  redirect()->back()->withInput()->withErrors(['Flha ao salvar categoria']);
		}

		return redirect()->back()->with('success', 'Categoria salva com sucesso!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = \App\Category::find($id);

		$categories = \App\Category::paginate(6);

		return view('category.edit')
			->with(compact('category', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CategoryRequest $request, $id)
	{
		$category = \App\Category::find($id);
		$category->name = $request->get('name');
		$result = $category->save();

		if (! $result) {
			return  redirect()->back()->withInput()->withErrors(['Falha ao salvar categoria']);
		}

		return redirect()->route('category.index')->with('success', 'Categoria salva com sucesso!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = \App\Category::find($id);
		$result = $category->delete();

		if (! $result) {
			return  redirect()->back()->withInput()->withErrors(['Falha ao remover categoria']);
		}

		return redirect()->back()->with('success', 'Categoria salva com sucesso!');
	}

}
