<?php

namespace App\Middleware;

class UserMiddleware
{
    public function handle()
    {
        echo "UserMiddleware çalıştı\n";
    }
}
