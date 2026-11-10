<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    // Show Create User form
    public function create()
    {
        return view('users-create');
    }

    // Save new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:users,username',
            'full_name' => 'required|string|max:100',
        ]);

        User::create($validated);

        return redirect()->route('users')
            ->with('success', 'User account created successfully!');
    }

    // Show Edit User form
    public function edit(User $user)
    {
        return view('users-edit', compact('user'));
    }

    // Update existing user with optional avatar
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'full_name' => 'required|string|max:100',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $oldAvatar = $user->avatar;

        if ($request->hasFile('avatar')) {

            // Create image manager
            $manager = new ImageManager(new Driver());

            // Read uploaded image
            $image = $manager->read(
                $request->file('avatar')->getRealPath()
            );

            // Resize to fit within 300 x 300 pixels
            $image->scaleDown(300, 300);

            // Convert to JPEG
            $encoded = $image->toJpeg(85);

            // Generate a unique filename
            $filename = (string) \Illuminate\Support\Str::uuid()
                . '.jpg';

            $path = 'avatars/' . $filename;

            // Store prepared image on public disk
            Storage::disk('public')->put(
                $path,
                (string) $encoded
            );

            // Save only the path
            $validated['avatar'] = $path;
        }

        $user->update($validated);

        // Remove previous avatar after successful update
        if (
            isset($validated['avatar']) &&
            $oldAvatar &&
            $oldAvatar !== $validated['avatar']
        ) {
            Storage::disk('public')->delete($oldAvatar);
        }

        return redirect()->route('users')
            ->with('success', 'User updated successfully!');
    }
}