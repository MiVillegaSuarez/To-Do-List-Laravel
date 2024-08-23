<?php

namespace App\Resources\Tasks;

use App\Models\TasksModel;

class Manager {
    public function taksList()
    {
        return TasksModel::all();
    }

    public function taskSearch($id)
    {
        return TasksModel::find($id);
    }

    public function taskDelete($id)
    {
        $task = TasksModel::find($id);
        return $task->delete();
    }

    public function taskUpdate($request, $id)
    {
        return TasksModel::where("id", $id)->update([
            'title' => $request->title,
            'details' => $request->details
        ]);
    }

    public function taskCreate($request)
    {
        return TasksModel::create([
            'title' => $request->title,
            'details' => $request->details
        ]);
    }
}