<?php


namespace CodePress\CodeUser\Controllers\Admin;


use CodePress\CodeUser\Repository\UserRepositoryInterface;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use CodePress\CodeUser\Controllers\Controller;

class UsersController extends Controller
{
    private $repository;
    private $response;

    public function __construct(ResponseFactory $response, UserRepositoryInterface $repository)
    {
        $this->response = $response;
        $this->repository = $repository;
    }

    public function index()
    {
        $users = $this->repository->all();
        return $this->response->view('codeuser::index', compact('users'));
    }

    public function create()
    {
        $users = [];
        $users = $this->repository->all();
        return $this->response->view('codeuser::create', compact('users'));
    }

    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        $user = $this->repository->find($id);
        return $this->response->view('codeuser::edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $this->repository->update($data, $id);
        return redirect()->route('admin.users.index');
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.users.index');
    }

//    public function deleted()
//    {
//        $users = $this->repository->getDeleted();
//        return $this->response->view('codeuser::deleted', compact('users'));
//    }
}