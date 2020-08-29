<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Route;
use Session;
use App\ToDo;
use App\Traits\SlugHelper;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;


class ToDoController extends Controller
{
    use SlugHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['breadcrumb'] = 'To-Do';
        $data['breadcrumb_icon'] = 'far fa-list-alt';
        $data['breadcrumb_brief'] = 'Manage your to-do list from this page.';
        $data['todos'] = ToDo::get_todos(Auth::user()->id);
        return view('backend.todo.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $route = Route::currentRouteName();
        Session::flash('create_route', $route);
        $request->validate([
            'title' => 'required|string',
        ]);

        $todo = new ToDo;
        $todo->user_id = Auth::user()->id;
        $todo->title = $request->title;
        $todo->slug = $this->str_slug($request->title);
        $todo->save();
        Toastr::success('To-do added to list successfully', 'To-do item added');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ToDo  $to_do
     * @return \Illuminate\Http\Response
     */
    public function mark_complete(ToDo $to_do)
    {
        $to_do->status = 'completed';
        $to_do->save();
        Toastr::success('To-do item has been marked as completed.', 'Marked completed');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ToDo  $to_do
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDo $to_do)
    {
        return $to_do;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ToDo  $to_do
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToDo $to_do)
    {
        if($to_do->user_id == Auth::user()->id){
            $request->validate([
                'title' => 'required|string',
            ]);
            $to_do->title = $request->title;
            $to_do->slug = $this->str_slug($request->title);
            $to_do->save();
            Toastr::success('To-do list item updated successfully', 'To-do item updated');
            return back();
        }else{
            Toastr::warning('Sorry, you do not have permission to edit this content.', 'Permission denied!');
            return back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ToDo  $to_do
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDo $to_do)
    {
        if($to_do->user_id == Auth::user()->id){
            $to_do->delete();
            Toastr::success('To-Do list item deleted successfully', 'To-Do item deleted');
            return back();
        }else{
            Toastr::warning('Sorry, you do not have permission to delete this content.', 'Permission denied!');
            return back();
        }
        
    }
}
