@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Producers') }}</div>
                <div>
                    @if(session()->has('success'))
                    <div>
                        {{session('success')}}
                    </div>
                    @endif
                </div>

                <div>
                    <table class="table">
                        <tr>
                            <th>{{ __('First Name') }}</th>
                            <th>{{ __('Second Name') }}</th>
                            <th>{{ __('Last Name') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Photo') }}</th>
                        </tr>

                        @foreach($producers as $producer)
                        <tr>
                            <th>{{$producer->first_name}}</th>
                            <th>{{$producer->second_name}}</th>
                            <th>{{$producer->last_name}}</th>
                            <th>{{$producer->description}}</th>
                            <th>
                                <img src="{{ url('public/producerImage/'.$producer->image) }}" style="height: 100px; width: 150px;">
                            </th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
