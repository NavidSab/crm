@extends('notify::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('notify.name') !!}
    </p>
    <!--<a href="{{route('push')}}" class="btn btn-outline-primary btn-block">Make a Push Notification!</a>-->

    @auth
    <script src="{{ Module::asset('notify:js/enable-push.js') }}" defer></script>
@endauth

@endsection
