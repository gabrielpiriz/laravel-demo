@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">

                        @if ($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="10" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ $post->content }}</textarea>
                        @if ($errors->has('content'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button class="btn btn-dark">
                        Actualizar
                    </button>

                    <a href="{{URL::previous()}}" class="btn">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection