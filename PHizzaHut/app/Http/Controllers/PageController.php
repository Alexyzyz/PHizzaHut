<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Pizza;

class PageController extends Controller
{
    public function login() {
        return view('auth/login');
    }

    public function register() {
        return view('auth/register');
    }

    public function home() {
        $pizzas_top = Pizza::paginate(6);
        $pizzas_bottom = $pizzas_top->splice(3);
        $bottom_is_empty = count($pizzas_bottom) == 0;
        return view('home', compact('pizzas_top', 'pizzas_bottom', 'bottom_is_empty'));
    }

    public function history() {
        $users = User::all();
        return view('history', compact('users'));
    }
}
