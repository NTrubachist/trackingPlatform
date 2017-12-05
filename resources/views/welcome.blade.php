
@extends('layouts.app')

@section('styles')
    <style>
        #logo
        {
            height: 200px;
            margin-top:7%;
            margin-bottom: 3%;
        }

        html, body {
            background-color: #27ae60;
            color: #f5f8fa;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 64px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-top: 180px;
            margin-bottom: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="title m-b-md">

            Klientu uzskaites platforma
        </div>

        <div class="links">
            <a href="{{ route('login') }}" class="sliding-middle-out">Ienākt</a>
            <a href="{{ route('register') }}" class="sliding-middle-out">Reģistrēties</a>
        </div>
    </div>
@endsection

