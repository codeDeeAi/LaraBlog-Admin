<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index(){
        $pizzas = [
            ['type' => 'yummy', 'data' => 'lovely', 'price' => 12],
            ['type' => 'yummy', 'data' => 'lovely', 'price' => 12],
            ['type' => 'yummy', 'data' => 'lovely', 'price' => 12],
            ['type' => 'yummy', 'data' => 'lovely', 'price' => 12]
        ];
        return view('pizzas', ['pizzas' => $pizzas]);
    }
}
