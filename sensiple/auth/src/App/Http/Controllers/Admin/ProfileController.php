<?php

namespace Sensiple\Auth\App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('auth::profile.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'job' => 'nullable|string|max:255',
            'mobile_number' => 'required|string|max:10',
        ]);

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $originalName = $file->getClientOriginalName();

            $storage = new StorageClient([
                'projectId' => env('GOOGLE_CLOUD_PROJECT_ID'),
                'keyFilePath' => base_path('cloudsensai-prod-890d25b6f8d0.json'),
            ]);

            $storage->bucket('cloudsens-cs-001')->upload(fopen($file->getRealPath(), 'r'), [
                'name' => 'admin-profile/' . $originalName,
                'metadata' => [
                    'contentType' => $file->getClientMimeType(),
                ],
            ]);

            $user->profile_image = 'https://storage.googleapis.com/cloudsens-cs-001/admin-profile/' . $originalName;
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->job = $request->job;
        $user->mobile_number = $request->mobile_number;
        $user->save();
        session()->flash('message', 'Profile Updated Successfully!');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'password' => 'required|string',
            'newpassword' => 'required|string|min:8|confirmed',
            'newpassword_confirmation' => 'required|string|min:8|same:newpassword',
        ]);
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Current password is incorrect']);
        }
        if (strlen($request->newpassword) <= 8) {
            return back()->withErrors(['password' => 'password must be at least 8 characters']);
        }

        // Update the password
        $user->password = Hash::make($request->newpassword);
        $user->save();
        session()->flash('message', 'Password Changed Successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
