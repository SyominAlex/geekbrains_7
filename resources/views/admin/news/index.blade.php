@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список новостей (Всего: {{ $count }})</h1>
        <a href="{{ route('admin.news.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Добавить новую </a>
    </div>

    <div class="row">
        <table class="table table-bordered">
        <thead>
        <tr>
          <th>#ID</th>
          <th>Заголовок</th>
          <th>Дата добавления</th>
          <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse($news as $newsItem)
            <tr>
                <td>{{ $newsItem->id }}</td>
                <td>{{ $newsItem->title }}</td>
                <td> {{ $newsItem->created_at }}</td>
                <td><a href="">Ред.</a>&nbsp; <a href="">Уд.</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Новостей нет</td>
            </tr>
        @endforelse
        </tbody>
        </table>
    </div>
@endsection