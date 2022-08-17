@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="content">Comentario</label>
                        <textarea name="content" id="content" rows="10" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button class="btn btn-dark">
                        Publicar Comentario
                    </button>

                    <a href="{{URL::previous()}}" class="btn">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection