<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>

        @if (session('status') === 'recovery-email-verified')
            <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                ✓ {{ __('Recovery email verified successfully! Password reset emails will now be sent to this address.') }}
            </div>
        @endif
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Recovery Email -->
        <div class="border-t pt-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <x-input-label for="recovery_email" :value="__('Recovery Email (Optional)')" class="!mb-0" />
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Add a real email to receive password reset and important notifications.') }}
                    </p>
                </div>
                @if($user->recovery_email && $user->recovery_email_verified)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        ✓ Verified
                    </span>
                @elseif($user->recovery_email)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                        Not Verified
                    </span>
                @endif
            </div>
            
            <x-text-input 
                id="recovery_email" 
                name="recovery_email" 
                type="email" 
                class="mt-1 block w-full" 
                :value="old('recovery_email', $user->recovery_email)" 
                placeholder="your-real-email@gmail.com"
                autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('recovery_email')" />
            
            @if($user->recovery_email && !$user->recovery_email_verified)
                <p class="mt-2 text-sm text-amber-600">
                    ⚠️ {{ __('This recovery email has not been verified yet. Password reset emails will be sent to your primary email until verified.') }}
                </p>
            @endif

            @if($user->recovery_email && $user->recovery_email_verified)
                <p class="mt-2 text-sm text-green-600">
                    ✓ {{ __('Password reset emails will be sent to this address.') }}
                </p>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    <!-- Verify Recovery Email Form (separate from profile update form) -->
    @if($user->recovery_email && !$user->recovery_email_verified)
        <form method="POST" action="{{ route('profile.verify-recovery-email') }}" class="mt-4">
            @csrf
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Verify Recovery Email
            </button>
        </form>
    @endif
</section>
