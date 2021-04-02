@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <h2 id="name">Добавить новость</h2>
          @if($errors->any())
              @foreach($errors->all() as $error)
                  <div class="alert alert-danger">{{ $error }}</div>
              @endforeach
          @endif
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label for="category">Категория</label>
                <select class="form-control" id="category" name="category_id">
                    <option value="0">Выбрать</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="slug">Слаг</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea type="text" id="description" name="description" class="form-control">{!! old('description') !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
    </div>
@endsection

@push('js')
    <script>
        $(function() {
            // $("#name span").html("{{ \Str::random(10) }}");
        });
    </script>
@endpush