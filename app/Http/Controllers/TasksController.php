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

    public function dashboard() {   
        return view("dashboard")
            ->with("tasks", $this->manager->taksList());
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {
        $this->manager->taskCreate($request);

        return redirect()->route("dashboard");
    }

    public function edit($id) {
        return view("tasks.edit")
            ->with("task", $this->manager->taskSearch($id));
    }

    public function update(Request $request, $id) {
        $this->manager->taskUpdate($request, $id);

        return redirect()->route("dashboard");
    }

    public function delete($id) {
        $this->manager->taskDelete($id);

        return redirect()->route("dashboard");
    }

}
