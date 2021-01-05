@extends('layouts.app')    

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    <div class="wrapper pizza-details ">
        <h1>Order for {{ $pizza->name }}</h1>
        <p class="type">Type - {{ $pizza->type }}</p>
        <p class="base">Base - {{ $pizza->base }}</p>
        @foreach ($pizza->toppings as $topping)
            <p>{{$topping}}</p>
        @endforeach

        <form action="/pizzas/{{ $pizza->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Complete Order</button>
        </form>
        <a href="/pizzas"><- Back to all Pizzas</a>
    </div>    
</div>
@endsection

