@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add subscriber</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form method="POST" action="{{route('subscriber.store')}}" >
                            @csrf
                            <div class="card mb-3">
                                <div class="card-body pb-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name" class="col-form-label">Name</label>
                                                <input id="name"
                                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                       name="name" value="" required>
                                                @if ($errors->has('name'))
                                                    <span
                                                        class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="lastname" class="col-form-label">Lastname</label>
                                                <input id="lastname"
                                                       class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                                       name="lastname" value="" required>
                                                @if ($errors->has('lastname'))
                                                    <span
                                                        class="invalid-feedback"><strong>{{ $errors->first('lastname') }}</strong></span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-form-label">Email</label>
                                                <input id="email"
                                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                       name="email" value="" required>
                                                @if ($errors->has('email'))
                                                    <span
                                                        class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
