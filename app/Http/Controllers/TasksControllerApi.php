<?php

namespace App\Http\Controllers;

use App\Resources\Tasks\Manager;
use Illuminate\Http\Request;

class TasksControllerApi extends Controller {
    public $manager;

    function __construct() {
        $this->manager = new Manager();
    }

    public function index() {
        //
        // dd('Hola');
        return response()->json([
            "status" => 200,
            "data" => $this->manager->taksList()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
        return response()->json([
            "status" => 200,
            "data" => $this->manager->taskCreate($request)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
        return response()->json([
            "status" => 200,
            "data" => $this->manager->taskSearch($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
        return response()->json([
            "status" => 200,
            "data" => $this->manager->taskUpdate($request, $id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
        return response()->json([
            "status" => 200,
            "data" => $this->manager->taskDelete($id)
        ]);
    }
}
