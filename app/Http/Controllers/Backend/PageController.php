<?php

namespace App\Http\Controllers\Backend;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = new Page;
        $search = $page->query();

        if ($title = $request->title) {
            $search->where('title', 'like', '%' . $title . '%');
        }
        $pages = $search->orderBy('id', 'desc')->paginate(10);
        return view('backend.page.index', compact('pages', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = 'create';

        return view('backend.page.form', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upload_path = '';
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required'
          
        ]);

        $page = new Page();

        $slug = str_slug($request->title, '-');

        if ($request->hasFile('feature_image')) {
            $fileNameWithExt = $request->file('feature_image')->getClientOriginalName();
             // get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
             // get extension
            $extension = $request->file('feature_image')->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
             // upload
            $upload_path = $request->file('feature_image')->storeAs('feature_images', $fileNameToStore, 'public_upload');
            $upload_path = 'uploads' . '/' . $upload_path;
        }
        $page->title = $request->input('title');
        $page->slug = $slug;
        $page->content = $request->input('content');
        $page->feature_image = $upload_path;
        $page->user_id = $request->user()->id;
        $page->homepage = $request->input('homepage');
        $page->order = $request->input('order');
        $page->save();
        return redirect()->route('page.index')->with('success', 'Page Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $form = 'edit';
        return view('backend.page.form', compact('page', 'form'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
       

        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);



        if ($request->hasFile('feature_image')) {
            $fileNameWithExt = $request->file('feature_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('feature_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $upload_path = $request->file('feature_image')->storeAs('feature_images', $fileNameToStore, 'public_upload');
            $upload_path = 'uploads' . '/' . $upload_path;
            $page->feature_image = $upload_path;
        } else {
            if ($request->input('feature_yes') == 'no') {
                $page->feature_image = '';
            }
        }
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->homepage = $request->input('homepage');
        $page->order = $request->input('order');
        $page->user_id = $request->user()->id;
        $page->update();
        return redirect()->route('page.index')->with('success', 'Page Updated Successsfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('page.index')->with('success', 'Page Deleted Successfully');
    }
}
