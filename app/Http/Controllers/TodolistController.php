<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{

    public function index()
    {
        $todolist = todolist::all();
        return view('home', compact('todolist'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'task' => 'required',
            'is_done' => 'required'
        ]);
        // todolist::create([
        //     'task' => $request->task,
        //     'is_done' => false
        // ]);
        todolist::create($data);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(todolist $todolist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, todolist $todolist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(todolist $todolist)
    {
        $todolist->delete();

        return back();
    }
}
