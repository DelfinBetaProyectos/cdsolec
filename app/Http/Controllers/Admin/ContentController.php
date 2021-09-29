<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use App\Http\Controllers\Controller;
use App\Queries\ContentFilter;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Instantiate a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Queries\ContentFilter   $filters
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ContentFilter $filters)
    {
        $contents = Content::query()
            ->filterBy($filters, $request->only(['search', 'from', 'to']))
            ->orderBy('name', 'ASC')
            ->paginate();

        $contents->appends($filters->valid());

        return view('admin.contents.index')->with('contents', $contents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content = new Content;

        return view('admin.contents.create')->with('content', $content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        return view('admin.contents.edit')->with('content', $content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
