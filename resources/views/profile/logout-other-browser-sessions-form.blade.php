<div>
    <x-jet-action-section>
        <x-slot name="title">
            {{ __('Browser Sessions') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Manage your active sessions on other browsers and devices.') }}
        </x-slot>

        <x-slot name="content">
            <div class="max-w-xl text-sm text-gray-600">
                {{ __('If necessary, you may log out of all your other browser sessions on your devices. The sessions below may not be exhaustive. Please change your password if you believe your account has been compromised.') }}
            </div>

            <div class="mt-5">
                <button wire:click="confirmLogout" class="btn btn-danger">
                    {{ __('Log Out Other Browser Sessions') }}
                </button>
            </div>
        </x-slot>
    </x-jet-action-section>

    <!-- Log Out Other Devices Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingLogout">
        <x-slot name="title">
            {{ __('Log Out Other Browser Sessions') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Please enter your password to confirm you want to log out of your other sessions.') }}

            <div class="mt-4">
                <x-jet-input type="password" wire:model="password" class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />

                <x-jet-input-error for="password" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingLogout')">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="logoutOtherBrowserSessions">
                {{ __('Log Out Other Browser Sessions') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
