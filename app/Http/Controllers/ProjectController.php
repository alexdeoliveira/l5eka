<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProjectRequest;

use App\Course\Repositories\IProjectRepository as Repository;
use App\Course\Repositories\IUserRepository as UserRepository;
use App\Course\Repositories\ICategoryRepository as CatRepository;

use Illuminate\Http\Request;

use App\Project;

class ProjectController extends Controller
{

    protected $repository;
    protected $userRepository;
    protected $catRepository;

    public function __construct(Repository $repository, UserRepository $userRepository, CatRepository $catRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->catRepository = $catRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $search = \Request::get('search');

        $projects = $this->repository->projects($search);


        return view('project.index')->with(compact('projects', 'search'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProjectRequest $request)
    {
        $result = $this->repository->store($request->all());

        if (! $result) {
            return  redirect()->back()->withInput()->withErrors(['Flha ao salvar projeto']);
        }

        return redirect()->back()->with('success', 'Projeto salva com sucesso!');
    }

    public function create()
    {
        $project = null;

        $usersForSelect = $this->userRepository->usersForSelect();
        $categoriesForSelect = $this->catRepository->categoriesForSelect();
        
        return view('project.form')->with(compact('project', 'usersForSelect', 'categoriesForSelect'));
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

        $projects = $this->repository->projects($search);

        $project = $this->repository->show($id);


        return view('project.edit')
            ->with(compact('project', 'projects', 'search'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ProjectRequest $request, $id)
    {
        
        $result = $this->repository->update($request->all(), $id);

        if (! $result) {
            return  redirect()->back()->withInput()->withErrors(['Falha ao salvar projeto']);
        }

        return redirect()->route('project.index')->with('success', 'Projeto salva com sucesso!');
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
            return  redirect()->back()->withInput()->withErrors(['Falha ao remover projeto']);
        }

        return redirect()->back()->with('success', 'Projeto foi removida!');
    }
}
