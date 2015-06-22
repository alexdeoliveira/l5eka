<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CategoryRequest;
use App\Course\Repositories\ICategoryRepository as Repository;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{

    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $search = \Request::get('search');

        $categories = $this->repository->categories($search);

        return view('category.index')->with(compact('categories', 'search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $result = $this->repository->store($request->all());

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

        $search = \Request::get('search');

        $categories = $this->repository->categories($search);

        $category = $this->repository->show($id);


        return view('category.edit')
            ->with(compact('category', 'categories', 'search'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(CategoryRequest $request, $id)
    {
        
        $result = $this->repository->update($request->all(), $id);

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
        $result = $this->repository->destroy($id);

        if (! $result) {
            return  redirect()->back()->withInput()->withErrors(['Falha ao remover categoria']);
        }

        return redirect()->back()->with('success', 'Categoria foi removida!');
    }
}
