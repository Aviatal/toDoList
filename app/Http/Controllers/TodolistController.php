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

        $todolist = new todolist();

        $todolist->task = $request->task;
        $todolist->is_done = $request->is_done;

        $todolist->save();


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
    public function update(Request $request, $id)
    {
        $task = todolist::find($id);

        if($task->is_done == '1')
        {
            $task->is_done = 0;
        }
        else
        {
            $task->is_done = 1;
        }

        $task->update();

        return back();

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
