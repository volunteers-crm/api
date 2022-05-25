<?php

use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\Api\Users\UserController;

app('router')
    ->middleware('auth:sanctum')
    ->get('/user', [UserController::class, 'me']);

app('router')->get('/', IndexController::class);
