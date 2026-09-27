<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $role = $request->role;

        $users = User::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->when($role, function ($query) use ($role) {
                $query->where('role', $role);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.users', compact('users', 'search', 'role'));
    }

    public function updateRole(Request $request, User $user)
    {
        if ($user->id === auth()->id() && $request->role !== 'admin') {
            return back()->with(
                'error',
                'You cannot remove your own administrator role.'
            );
        }

        $request->validate([
            'role' => ['required', 'in:student,admin'],
        ]);

        $user->update([
            'role' => $request->role,
        ]);

        ActivityLog::create([
            'admin_id' => auth()->id(),
            'action' => 'role_changed',
            'user_id' => $user->id,
            'description' => "{$user->name}'s role was changed to ".ucfirst($request->role).'.',
        ]);

        $roleName = $request->role === 'admin'
            ? 'Administrator'
            : 'Student';

        return back()->with(
            'success',
            "{$user->name} is now a {$roleName}."
        );
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        if ($user->id === auth()->id() && $request->role !== 'admin') {
            return back()->with(
                'error',
                'You cannot remove your own administrator role.'
            );
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'role' => ['required', 'in:student,admin'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        ActivityLog::create([
            'admin_id' => auth()->id(),
            'action' => 'user_updated',
            'user_id' => $user->id,
            'description' => "{$user->name}'s account was updated.",
        ]);

        return redirect()
            ->route('admin.users')
            ->with('success', "{$user->name}'s account has been updated successfully.");
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $userName = $user->name;

        ActivityLog::create([
            'admin_id' => auth()->id(),
            'action' => 'user_deleted',
            'user_id' => $user->id,
            'description' => "{$userName}'s account was deleted.",
        ]);

        $user->delete();

        return back()->with(
            'success',
            "{$userName} has been removed successfully."
        );
    }
}
