<?php
namespace App\Repository;

use App\Models\Todo;
use App\Repository\Interfaces\TodoRepositoryInterface;

class TodoRepository implements TodoRepositoryInterface
{
    public function all()
    {
        return Todo::where('user_id', auth()->id())->get();
    }

    public function find($id)
    {
        return Todo::where('user_id', auth()->id())->findOrFail($id);
    }

    public function create(array $data)
    {
        $data['user_id'] = auth()->id(); // Set the authenticated user as owner
        return Todo::create($data);
    }

    public function update($id, array $data)
    {
        $todo = $this->find($id);
        $todo->update($data);
        return $todo;
    }

    public function delete($id)
    {
        $todo = $this->find($id);
        $todo->delete();
        return true;
    }
}
