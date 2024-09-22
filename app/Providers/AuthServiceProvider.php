<?php
use App\Models\Todo;
use App\Policies\TodoPolicy;

protected $policies = [
    Todo::class => TodoPolicy::class,
];
