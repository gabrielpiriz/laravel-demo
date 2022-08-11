@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="title m-0">
                        Posts
                    </h4> 
                    
                    @auth
                        <a href="{{ route('posts.create') }}" class="btn btn-dark btn-sm"> 
                            <i class="fa fa-plus"></i>
                            Crear
                        </a>
                    @endauth
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @forelse($posts as $post)
                            <a class="text-dark" href="{{ route('posts.show', $post->id) }}">
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <span>
                                        {{$post->title}}
                                    </span>

                                    <i class="fas fa-chevron-right float-right"></i>
                                </li>
                            </a>
                        @empty
                            <li class="list-group-item">
                                Todavía no hay ningún post creado, ¡crea el primero!
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection