<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = task::all()->where('user_id', auth()->id());
        return view('welcome', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required',
            'des' => 'required',
        ]);
        task::create([
            'task' => $request->task,
            'des' => $request->des, 
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('index')->with('success', 'Data Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task, $id)
    {
        $data = task::find($id);
        return view('show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task, $id)
    {
        $data = task::find($id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $id)  // Capital T
    {
        $request->validate([
            'task' => 'required',
            'des' => 'required',
            'status' => 'required',
        ]);

        $id->update($request->only('task', 'des', 'status')); // safer

        return redirect()->route('index')->with('success', 'Data Updated Successfully!');
    }
    public function fav(Task $id)
    {
        $id->update([
            'fav' => $id->fav == 0 ? 1 : 0
        ]);

        return redirect()->route('index')
            ->with('success', 'Favorite status updated!');
    }
    public function status(Task $id)
    {
        $id->update([
            'status' => $id->status == 0 ? 1 : 0
        ]);

        return redirect()->route('index')
            ->with('success', 'Congratulations Task Completed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $id)
    {
        $id->delete();
        return redirect()->route('index')->with('success', 'Data Deleted');
    }
}
