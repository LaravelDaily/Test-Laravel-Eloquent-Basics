<?php

namespace App\Observers;

use App\Models\Stat;

class ProjectObserver
{
    public function created(): void
    {
        (new Stat)->increment('projects_count', 1);
    }
}
