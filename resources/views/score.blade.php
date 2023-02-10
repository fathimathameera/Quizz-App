@extends("layouts.master")
@section("content")
    <div class="container mt-5">
        <div class="card-body">
            @include('partials.menu')
            <div>
                <h1 class="text-center mt-5 text-success font-weight-bold">Your Score: {{ $score->score }}</h1>
                <h3 class="mt-4">{{ $score->score }} Correct out of 5</h3>
                <h3 class="mt-5">High Score - {{ $highscore }}</h3>
            </div>
        </div>
    </div>
@endsection
