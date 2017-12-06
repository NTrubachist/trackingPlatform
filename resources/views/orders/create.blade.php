@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pievienot jaunu pasūtījumu klientam <b>{{$client->name}}</b></div>
                <div class="panel-body">
                    <div class="col-xs-12">
                        @include('layouts.message-block')
                        <form class="form-horizontal" method="POST" action="{{ route('orders.store', ['client' => $client]) }}">
                            @foreach(['name' => 'text', 'describe' => 'text', 'price' => 'number'] as $field => $type)
                                <div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}">
                                    <label for="{{$field}}" class="col-md-4 control-label">@lang('models.order.'.$field)</label>
                                    <div class="col-md-6">
                                        <input id="{{ $field }}" type="{{ $type }}" class="form-control" name="{{ $field }}" placeholder="@lang('models.order.defaults.'.$field)" value="{{ old($field) }}" required autofocus>
                                        @if ($errors->has($field))
                                            <span class="help-block">
                                                <strong>{{ $errors->first($field) }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-orange">Pievienot pasūtījumu</button>
                            <input type="hidden" value="{{ Session::token() }}" name="_token">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
