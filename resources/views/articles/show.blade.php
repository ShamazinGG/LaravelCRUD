@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Название: {{ $article->title }}</h3>
            <h3>Тело: {{ $article->body }}</h3>
            <h3>Дата: <?php $today= date("d.m.y"); echo $today ?></h3>
            <h3>Автор: {{ $article->author }}</h3>


        </div>
    </div>

@endsection

