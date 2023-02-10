@extends("layouts.master")
@section("content")
    <div class="container mt-5">
        @include('partials.menu')
        <table class="table table-striped table-bordered table-hover mt-5 mb-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Score</th>
                    <th scope="col">Attended Date and Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scores as $score)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $score->score }}</td>
                    <td>{{ $score->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection