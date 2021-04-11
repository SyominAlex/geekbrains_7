@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список категорий</h1>
        <a href="{{ route('admin.categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Добавить новую </a>
    </div>

    <div class="row">
        @if(session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
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
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td> {{ $category->updated_at }}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $category]) }}">Ред.</a>&nbsp; <a href="">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Категорий нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div>{{ $categories->links() }}</div>
    </div>
@endsection