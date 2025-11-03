<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();
        
        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // If recovery email is changed, mark as unverified
        if ($user->isDirty('recovery_email')) {
            $user->recovery_email_verified = false;
            
            // Log recovery email change
            \Illuminate\Support\Facades\Log::info('Recovery email updated', [
                'user_id' => $user->id,
                'email' => $user->email,
                'new_recovery_email' => $user->recovery_email
            ]);
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Verify recovery email address
     */
    public function verifyRecoveryEmail(Request $request): RedirectResponse
    {
        $user = $request->user();
        
        if (!$user->recovery_email) {
            return Redirect::route('profile.edit')->with('error', 'No recovery email set.');
        }
        
        $user->recovery_email_verified = true;
        $user->save();
        
        \Illuminate\Support\Facades\Log::info('Recovery email verified', [
            'user_id' => $user->id,
            'email' => $user->email,
            'recovery_email' => $user->recovery_email
        ]);
        
        return Redirect::route('profile.edit')->with('status', 'recovery-email-verified');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
