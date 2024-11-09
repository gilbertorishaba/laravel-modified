<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LogoutOtherBrowserSessions extends Component
{
    public $password = '';
    public $confirmingLogout = false;

    public function confirmLogout()
    {
        $this->resetErrorBag();
        $this->confirmingLogout = true;
    }

    public function logoutOtherBrowserSessions()
    {
        // Validate the entered password
        $this->validate([
            'password' => ['required', 'current_password'],
        ]);

        // Log out other sessions
        Auth::logoutOtherDevices($this->password);

        // Reset confirmation and notify the user
        $this->confirmingLogout = false;
        session()->flash('status', 'Logged out from other sessions successfully.');
    }

    public function render()
    {
        return view('livewire.logout-other-browser-sessions');
    }
}
