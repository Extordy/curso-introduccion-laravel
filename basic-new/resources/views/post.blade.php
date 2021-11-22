<!-- blade para retornar un post-->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <!-- campo para imagen-->
                    @if ($post->image)
                        <img src="{{ $post->get_image }}" class="card-img-top">
                    @endif
                    <!--campo donde recibe el titulo -->
                    <h5 class="card-title">{{ $post->title }}</h5>
                    @elseif ($post->iframe)
                        <div class="embed-responsive embed-responsive-16by9">
                        {!! $post->iframe !!}
                    </div>
                    <p class="card-text">
                        {{ $post->body }}
                    </p>
                    <p class="text-muted mb-0">
                        <em>
                            &ndash; {{ $post->user->name }}
                        </em>
                        {{ $post->created_at->format('d M Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
