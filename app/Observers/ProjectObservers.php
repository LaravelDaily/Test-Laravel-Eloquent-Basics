<?php
 
namespace App\Observers;
 
use App\Models\User;
use App\Models\Stat;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        Stat::first()->update(['projects_count' => ''projects_count' + 1']);
    }
 
    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        // ...
    }
 
    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        // ...
    }
 
    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        // ...
    }
 
    /**
     * Handle the User "forceDeleted" event.
     */
    public function forceDeleted(User $user): void
    {
        // ...
    }
}
