@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <h2 id="name">Редактировать категорию</h2>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Наименование</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $category->title }}">
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea type="text" id="description" name="description" class="form-control">{!! $category->description !!}</textarea>
                </div>

                <div class="form-group">
                    <label for="is_visible">Отображать</label>
                    <input type="checkbox" id="is_visible" name="is_visible" value="1"
                           @if( $category->is_visible === true ) checked @endif">
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