<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Helpers\SetsJsonResponse;

class TodoController extends Controller
{
    use SetsJsonResponse;
    public function store(Request $request)
    {
        $task = Todo::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'cor' => $request->cor,
            'finalizado' => $request->finalizado,
        ]);

        return $this->setSuccessResponse($task->toArray(), 201);
    }

    public function index()
    {
        $tasks = Todo::all();

        return $this->setSuccessResponse($tasks->toArray());
    }

    public function delete(Request $request, $id)
    {
        $task = Todo::find($id);

        if (!$task) {
            return $this->setErrorResponse('Tarefa não encontrada', 404);
        }

        $task->delete();

        return $this->setSuccessResponse([], 204);
    }

    public function edit(Request $request, $id)
    {
        $task = Todo::find($id);

        if (!$task) {
            return $this->setErrorResponse('Tarefa não encontrada', 404);
        }

        $task->titulo = $request->titulo;
        $task->descricao = $request->descricao;
        $task->cor = $request->cor;
        $task->finalizado = $request->finalizado;

        $task->save();

        return $this->setSuccessResponse($task->toArray());
    }

    public function complete(Request $request, $id)
    {
        $task = Todo::find($id);

        if (!$task) {
            return $this->setErrorResponse('Tarefa não encontrada', 404);
        }

        $task->finalizado = true;

        $task->save();

        return $this->setSuccessResponse($task->toArray());
    } 
}


