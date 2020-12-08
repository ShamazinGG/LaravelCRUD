@extends('layouts.app')

@section('title', 'Страница со статьями')

@section('content')
    <a href="{{ route('article.create') }}" class="btn btn-success">Создать статью</a>

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table mt-3"  >
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Тело статьи</th>
            <th scope="col">Дата</th>
            <th scope="col">Автор статьи</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->body }}</td>
                <td><?php $today= date("d.m.y"); echo $today ?></td>
                <td>{{ $article->author }}</td>

                <td class="table-buttons">
                    <a href="{{ route('article.show', $article) }}" class="btn btn-success">Показать</a>
                    <a href="{{ route('article.edit', $article) }}" class="btn btn-primary">Редактировать</a>
                    <form method="post" action =  "{{ route('article.destroy', $article) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
