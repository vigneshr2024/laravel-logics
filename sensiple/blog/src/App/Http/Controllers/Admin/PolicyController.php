<?php

namespace Sensiple\Blog\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Sensiple\Blog\App\Models\Policy;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('Policies List') == false) {
            abort(401);
        }
        $policies = Policy::paginate(20);
        return view('blog::admin.policy.list', compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('Policy Create') == false) {
            abort(401);
        }
        return view('blog::admin.policy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('Policy Create') == false) {
            abort(401);
        }
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:1000',
            'type'  => 'required|string|in:terms&conditions,privacy-policy,support-policy',
        ]);
        $policy_url = Str::slug(strtolower($request->title), '-');

        $policy  = new Policy();
        $policy->title = $request->title;
        $policy->policy_url = $policy_url;
        $policy->content = $request->content;
        $policy->type = $request->type;

        $policy->save();

        session()->flash('message', 'Policy created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Policy $policy)
    {
        if (auth()->user()->can('Policy Edit') == false) {
            abort(401);
        }
        return view('blog::admin.policy.edit', compact('policy'));
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
    public function update(Request $request, Policy $policy)
    {
        if (auth()->user()->can('Policy Edit') == false) {
            abort(401);
        }
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:1000',
            'type'  => 'required|string|in:terms&conditions,privacy-policy,support-policy',
        ]);

        $policy->title = $request->title;
        $policy->policy_url = $request->policy_url;
        $policy->content = $request->content;
        $policy->type = $request->type;
        $policy->save();

        session()->flash('message', 'Policy updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Policy $policy)
    {
        if (auth()->user()->can('Policy Delete') == false) {
            abort(401);
        }
        $policy->delete();
        session()->flash('message', 'Policy Deleted Successfully');
        return redirect()->back();
    }
}
