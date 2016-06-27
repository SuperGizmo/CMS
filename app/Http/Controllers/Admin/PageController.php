<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.list.pages', ['pages' =>Page::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create.page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'url' => 'required|unique:pages|max:255'
        ]);

        $page = new Page;
        $page->fill($request->only('title','url','linkName','content'));
        $page->save();

        return redirect(route('pages'))->with('success', $request->input('title').' has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.edit.page', ['page' => Page::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->input('url') != $request->input('oldUrl')) {
            $this->validate($request, [
                'url' => 'required|unique:pages|max:255'
            ]);
        }

        $page = Page::findOrFail($id)->update($request->only('title','url','linkName','content'));

        return redirect(route('pages'))->with('success', $request->input('title').' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $page = Page::findOrFail($id);

        if ($page->url != 'Home') {
            $page->delete();
            return redirect(route('pages'))->with('success', 'The page has been deleted!');
        }else{
            return redirect(route('pages'))->with('error', 'You cannot delete the home page!');
        }

    }
}
