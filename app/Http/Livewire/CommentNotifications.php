<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentNotifications extends Component
{
    public $notifications;
    public $notificationCount;
    public $isLoading;

    protected $listeners = ['getNotifications'];

    public function mount()
    {
        $this->notifications = collect([]);
        $this->isLoading = true;
        $this->getNotificationsCount();
    }

    public function getNotificationsCount()
    {
        $this->notificationCount = auth()->user()->unreadNotifications()->count();
    }

    public function getNotifications()
    {
        sleep(2); // for test skeleton loader
        $this->notifications = auth()->user()->unreadNotifications()->latest()->take(3)->get();
        $this->isLoading = false;
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->getNotificationsCount();
        $this->getNotifications();
    }

    public function render()
    {
        return view('livewire.comment-notifications');
    }
}
