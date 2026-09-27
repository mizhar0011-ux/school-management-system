<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationRequestController extends Controller
{
    /**
     * Display registration requests.
     */
    public function index(Request $request)
    {
        $status = $request->query('status', 'pending');

        if (! in_array($status, ['pending', 'approved', 'declined', 'all'], true)) {
            $status = 'pending';
        }

        $baseQuery = User::query()
            ->whereIn('role', ['student', 'teacher', 'staff']);

        $pendingCount = (clone $baseQuery)
            ->where('status', 'pending')
            ->count();

        $approvedCount = (clone $baseQuery)
            ->where('status', 'approved')
            ->count();

        $declinedCount = (clone $baseQuery)
            ->where('status', 'declined')
            ->count();

        $allCount = (clone $baseQuery)->count();

        $requests = (clone $baseQuery)
            ->when(
                $status !== 'all',
                fn ($query) => $query->where('status', $status)
            )
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.registration-requests', compact(
            'requests',
            'status',
            'pendingCount',
            'approvedCount',
            'declinedCount',
            'allCount'
        ));
    }

    /**
     * Approve a registration.
     */
    public function approve(User $user)
    {
        if (! in_array($user->role, ['student', 'teacher', 'staff'], true)) {
            return back()->with(
                'error',
                'This account cannot be approved from registration requests.'
            );
        }

        // Approve the user's account.
        $user->update([
            'status' => 'approved',
        ]);

        /*
         * Create an incomplete student profile for approved
         * student registrations.
         *
         * The student will complete the remaining profile
         * information from their Student Dashboard.
         */
        if ($user->role === 'student' && ! $user->student) {
            Student::create([
                'user_id' => $user->id,
                'admission_number' => 'REG-'.str_pad(
                    $user->id,
                    5,
                    '0',
                    STR_PAD_LEFT
                ),
                'name' => $user->name,
            ]);

        }

        if ($user->role === 'teacher' && ! $user->teacher) {
            Teacher::create([
                'user_id' => $user->id,
                'employee_number' => 'REG-'.str_pad(
                    $user->id,
                    5,
                    '0',
                    STR_PAD_LEFT
                ),
                'name' => $user->name,
            ]);
        }

        // staff role
        if ($user->role === 'staff' && ! $user->staff) {
            Staff::create([
                'user_id' => $user->id,
                'employee_number' => 'REG-'.str_pad(
                    $user->id,
                    5,
                    '0',
                    STR_PAD_LEFT
                ),
                'name' => $user->name,
            ]);
        }

        // Record the approval in the activity log.
        ActivityLog::create([
            'admin_id' => auth()->id(),
            'action' => 'registration_approved',
            'user_id' => $user->id,
            'description' => "{$user->name}'s registration was approved.",
        ]);

        return back()->with(
            'success',
            "{$user->name}'s registration has been approved."
        );
    }

    /**
     * Decline a registration.
     */
    public function decline(User $user)
    {
        if (! in_array($user->role, ['student', 'teacher', 'staff'], true)) {
            return back()->with(
                'error',
                'This account cannot be declined from registration requests.'
            );
        }

        $user->update([
            'status' => 'declined',
        ]);

        ActivityLog::create([
            'admin_id' => auth()->id(),
            'action' => 'registration_declined',
            'user_id' => $user->id,
            'description' => "{$user->name}'s registration was declined.",
        ]);

        return back()->with(
            'success',
            "{$user->name}'s registration has been declined."
        );
    }

    /**
     * Move an account back to pending.
     */
    public function pending(User $user)
    {
        if (! in_array($user->role, ['student', 'teacher', 'staff'], true)) {
            return back()->with(
                'error',
                'This account cannot be moved to pending.'
            );
        }

        $user->update([
            'status' => 'pending',
        ]);

        ActivityLog::create([
            'admin_id' => auth()->id(),
            'action' => 'registration_pending',
            'user_id' => $user->id,
            'description' => "{$user->name}'s registration was moved back to pending.",
        ]);

        return back()->with(
            'success',
            "{$user->name}'s registration is now pending."
        );
    }

    /**
     * Permanently remove an account.
     */
    public function destroy(User $user)
    {
        if (! in_array($user->role, ['student', 'teacher', 'staff'], true)) {
            return back()->with(
                'error',
                'This account cannot be removed from registration management.'
            );
        }

        $userName = $user->name;

        ActivityLog::create([
            'admin_id' => auth()->id(),
            'action' => 'registration_deleted',
            'user_id' => $user->id,
            'description' => "{$userName}'s registration account was removed.",
        ]);

        $user->delete();

        return back()->with(
            'success',
            "{$userName}'s account has been removed."
        );
    }
}
