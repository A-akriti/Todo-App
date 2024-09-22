<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TodoRepositoryInterface;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function index()
    {
        return $this->todoRepository->all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return $this->todoRepository->create($request->only(['title', 'description']));
    }

    public function show($id)
    {
        return $this->todoRepository->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = $this->todoRepository->find($id);
        $this->authorize('update', $todo);

        return $this->todoRepository->update($id, $request->only(['title', 'description']));
    }

    public function destroy($id)
    {
        $todo = $this->todoRepository->find($id);
        $this->authorize('delete', $todo);

        return response()->json(['success' => $this->todoRepository->delete($id)]);
    }
}
namespace App\Http\Controllers;

use App\Repositories\Interfaces\TodoRepositoryInterface;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function index()
    {
        return $this->todoRepository->all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return $this->todoRepository->create($request->only(['title', 'description']));
    }

    public function show($id)
    {
        return $this->todoRepository->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = $this->todoRepository->find($id);
        $this->authorize('update', $todo);

        return $this->todoRepository->update($id, $request->only(['title', 'description']));
    }

    public function destroy($id)
    {
        $todo = $this->todoRepository->find($id);
        $this->authorize('delete', $todo);

        return response()->json(['success' => $this->todoRepository->delete($id)]);
    }
}
