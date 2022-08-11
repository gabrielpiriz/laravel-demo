@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">

                        @if ($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="10" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button class="btn btn-dark">
                        Publicar
                    </button>

                    <a href="{{route('posts.index')}}" class="btn">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection