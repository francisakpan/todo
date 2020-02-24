 @extends('layouts.app')

 @section('content')
    <div class="list">
        <h1 class="header"> {{config('app.name', 'TODO')}} </h1>
        
        @if (count($items) > 0)
            <ul class="items">
                @foreach ($items as $item)
                    <li>
                        <span class="item {{$item->done? 'done' : ''}}">{{$item->name}}</span>
                        <a href="items/{{$item->id}}/update" class="action-button">{{$item->done ? 'Unmark as done': 'Mark as done'}}</a>
                        <a href="items/{{$item->id}}" class="action-button">Delete</a>
                    </li>
                @endforeach
            </ul>   
        @else
            <p>You haven't added any items yet.</p>
        @endif

        {{ Form::Open(['action' => 'ItemsController@save', 'method' => 'POST', 'class' => 'item-add']) }}
            {{ Form::text('name', '', ['class' => 'input', 'placeholder' => 'Type in a new item here.']) }}
            {{ Form::submit('add', ['class' => 'submit'])}}
        {{ Form::close() }}

    </div>
 @endsection