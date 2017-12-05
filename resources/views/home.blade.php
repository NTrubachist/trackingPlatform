@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Klienti
                    <a href="{{ route('clients.create') }}" style="display: inline;" class="btn btn-orange">Pievienot jaunu klientu</a>
                </div>

                <div class="panel-body">
                    @include('layouts.message-block')
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($clients as $client)
                        <div class="alert notification">
                            <p style="margin-bottom: -20px;">{{ $client->name }}</p><br>
                                <div style="text-align: right; margin-top:-45px ">
                                    <form style="margin:0; display: inline;" method="POST" action="{{ route('clients.destroy', $client->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" style="margin-top: 20px;" class="btn btn-orange"><span class="glyphicon glyphicon-remove"></span> Dzēst klientu</button>
                                    </form>
                                    <a href="{{ route('clients.edit', ['id' => $client -> id]) }}" class="btn btn-orange" style="margin-top: 20px;"><span class="glyphicon glyphicon-edit"></span> Rediģēt klientu</a>
                                </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
