<?php

namespace Sensiple\Blog\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Sensiple\Blog\App\Models\Form;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('Forms List') == false) {
            abort(401);
        }
        $forms = Form::paginate(20);
        return view('blog::admin.form.list', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('Form Create') == false) {
            abort(401);
        }
        return view('blog::admin.form.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('Form Create') == false) {
            abort(401);
        }
        $request->validate([
            'form_name' => 'required|string|max:255',
            'form_views' => 'required|integer|min:0',
            'form_domain' => 'required|in:cloudsens,docuai',
        ]);
        $form       = new Form();
        $form->form_name = $request->form_name;
        $form->form_url = Str::slug(strtolower($request->form_name), '-');
        $form->form_views = $request->form_views;
        $form->form_domain = $request->form_domain;
        $form->form_fields = $request->form_fields;
        $form->save();
        session()->flash('message', 'Form created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        if (auth()->user()->can('Form Edit') == false) {
            abort(401);
        }
        return view('blog::admin.form.edit', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        if (auth()->user()->can('Form Edit') == false) {
            abort(401);
        }
        $request->validate([
            'form_name' => 'required|string|max:255',
            'form_views' => 'required|integer|min:0',
            'form_domain' => 'required|in:cloudsens,docuai',
        ]);
        $form->form_name = $request->form_name;
        $form->form_url = $request->form_url;
        $form->form_views = $request->form_views;
        $form->form_domain = $request->form_domain;
        $form->form_fields = $request->form_fields;
        $form->save();
        session()->flash('message', 'Form Updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Form $form)
    {
        if (auth()->user()->can('Form Delete') == false) {
            abort(401);
        }
        $form->delete();
        session()->flash('message', 'Form deleted successfully!');
        return redirect()->back();
    }
}
