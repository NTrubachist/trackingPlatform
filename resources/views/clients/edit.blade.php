@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Rediģēt kientu
                </div>

                <div class="panel-body" style="">

                        @include('layouts.message-block')

                    <form class="form-horizontal" method="POST" action="{{ route('clients.update',$client->id) }}">
                        @foreach(['name' => 'text', 'phone' => 'text', 'email' => 'text', 'register_number' => 'text'] as $field => $type)
                            <div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}">
                                <label for="{{$field}}" class="col-md-4 control-label">@lang('models.client.'.$field)</label>

                                <div class="col-md-6">
                                    <input id="{{ $field }}" type="{{ $type }}" class="form-control" name="{{ $field }}" value="{{$client->$field}}" required autofocus>

                                    @if ($errors->has($field))
                                        <span class="help-block">
                                                <strong>{{ $errors->first($field) }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button type="submit" class="btn btn-orange" style="margin-left: 25px;"><span class="glyphicon glyphicon-save"></span> Saglabāt izmaiņas</button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                    </form>
                    <hr>
                    <a href="{{ route('orders.create', ['client' => $client->id]) }}" style="margin-bottom: 15px; margin-left: 25px;" class="btn btn-orange"><span class="glyphicon glyphicon-plus"></span> Pievienot jaunu pasūtījumu</a>
                    <div class="col-xs-12">

                            @foreach($client->orders as $index => $order)
                            <div class="alert notification">

                                <div class="row">
                                    <h4>Pasūtījums nr. {{$index+1}}</h4>
                                    <h5>Nosaukums: {{$order->name}} <i style="font-size: 14px;">{{$order->created_at->format('d.m.Y')}}</i></h5>
                                    <p>Apraksts: {{$order->describe}}</p>
                                    <p>Cena: {{$order->price}} eur</p>
                                </div>

                                <form style="margin:0; display: inline;" method="POST" action="{{ route('orders.destroy', $order->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" style="margin-top: 20px;" class="btn btn-orange"><span class="glyphicon glyphicon-remove"></span> Dzēst pasūtījumu</button>
                                </form>

                                <a href="{{ route('orders.edit', ['id' => $order -> id, 'client' => $client -> id]) }}" class="btn btn-orange" style="margin-top: 20px;"><span class="glyphicon glyphicon-edit"></span> Rediģēt pasūtījumu</a>

                            </div>

                            @endforeach
                        </div>



                </div>
            </div>
        </div>
    </div>
@endsection
