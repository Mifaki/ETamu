<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('dashboard-updates', function ($user) {
    return $user->hasAnyRole(['Super Admin', 'Admin OPD']);
});
