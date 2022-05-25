<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('User.{id}', function ($user, int $id) {
    return $user->id === $id;
});
