@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($blogs as $blog)
        <ul>
            <li>
                <a href="#">{{ $blog->title }}</a>
            </li>
        </ul>
    @endforeach
    </div>
@endsection