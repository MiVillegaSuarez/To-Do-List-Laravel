<?php

namespace App\Http\Controllers;

use App\Resources\Tasks\Manager;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TasksController extends Controller {
    //
    protected $manager;

    function __construct() {
        $this->manager = new Manager(); 
    }

    public function taskList() {   
        return view("tasks.task-list")
            ->with("tasks", $this->manager->taksList());
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {
        if ($this->manager->taskCreate($request)) {
            Alert::success("Se creo exitosamente el estudiante");
        } else {
            Alert::error("No se pudo crear el estudiante el registro");
        }
        return redirect()->route("task.tasklist");
    }

    public function edit($id) {
        return view("tasks.edit")
            ->with("task", $this->manager->taskSearch($id));
    }

    public function update(Request $request, $id) {
        if ($this->manager->taskUpdate($request, $id)) {
            Alert::success("Se actualizo correctamente el registro");
        } else {
            Alert::error("No se pudo actualizar el registro");
        }
        return redirect()->route("task.tasklist");
    }

    public function delete($id) {
        if($this->manager->taskDelete($id)){
            Alert::success("El registro fue eliminado exitosamente");
            return redirect()->route("task.tasklist");
        }else{
            Alert::error("El registro no pudo ser eliminado");
            return redirect()->route("task.tasklist");
        }
    }

}
