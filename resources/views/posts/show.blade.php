@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h2 class="d-inline-block m-0">
                        {{ $post->title }}
                    </h2>

                    @if(Auth::check() && $post->owner->is(Auth::user()))
                    <form class="float-right" action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-link" title="Eliminar">
                            <i class="fas fa-trash"></i>
                            Eliminar
                        </button>
                    </form>

                    <a href="{{ route('posts.edit', $post) }}" class="float-right mr-2">
                        <button class="btn btn-dark" title="Editar">
                            <i class="fas fa-edit"></i>
                            Editar
                        </button>
                    </a>
                    @endcan
                </div>

                <div class="card-body">
                {!! nl2br(e($post->content)) !!}
                </div>
                <div class="card-footer">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="title m-0">
                        Comentarios
                    </h4> 
                
                    @auth
                        <a href="{{ route('posts.comments.create', $post -> id) }}" class="btn btn-dark btn-sm"> 
                            <i class="fa fa-plus"></i>
                            Agregar
                        </a>
                    @endauth
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection