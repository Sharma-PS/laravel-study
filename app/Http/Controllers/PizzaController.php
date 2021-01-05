<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $pizzas = Pizza::all(); //SELECT * FROM pizza;
        //$pizzas = Pizza::orderBy('name' , 'desc')->get();
        //$pizzas = Pizza::where('type', 'veg')->get();


        $name = request('name');
        $age = request('age');
        return view('pizzas.index', ['shop' => 'pizzahut', 
                    'pizzas' => $pizzas, 
                    'name' => $name,
                    'age' => $age
                ]);
    }

    public function show($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('pizzas.show',['pizza' => $pizza]);
    }

    public function create()
    {
        return view('pizzas.create');
    }

    public function store()
    {

        $name = request('name');
        $type = request('type');
        $base = request('base');
        $price = 2500;

        $pizza = new Pizza;
        $pizza->name = $name;
        $pizza->type = $type;
        $pizza->base = $base;
        $pizza->price = $price;
        $pizza->toppings = request('toppings');
        $pizza->save();
        return redirect('/')->with('msg','Thankyou for your order');
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        return redirect('/pizzas');
    }
}
