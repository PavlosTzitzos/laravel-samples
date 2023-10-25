@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @can('isAdmin')
                        <h4 class="text-center">This is Admin</h4>
                    @endcan
                    
                    @can('isEditor')
                        <h4 class="text-center">This is Editor</h4>
                    @endcan
                    
                    @can('isUser')
                        <h4 class="text-center">This is User</h4>
                    @endcan

                    <h3>Posts</h3>
                    <a href="{{ route('post.index') }}" class="btn btn-success">See Posts</a>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
