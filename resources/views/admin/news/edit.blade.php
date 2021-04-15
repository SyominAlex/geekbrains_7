@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <h2 id="name">Редактировать новость</h2>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="category">Категория</label>
                    <select class="form-control" id="category" name="category_id">
                        <option value="0">Выбрать</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                            @if($category->id === $news->category_id) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Наименование</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $news->title }}">
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="text">Описание</label>
                    <textarea  id="description" name="text" class="form-control">{!! $news->text !!}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

