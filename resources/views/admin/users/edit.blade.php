@extends('layouts.app')

@section('content')
@include('admin.users.sidebar')
<div class="container" style="margin-top:-460px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Edit User {{$user->name}}</div>

                <div class="card-body">
                <form action="{{route('admin.users.update',$user)}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                        name="phone" value="{{$user->phone}}" required>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                   <div class="form-group row">
                    <label for="roles" class="col-md-4 col-form-label text-md-right">Role</label>

                    @foreach ($roles as $role)
                    <div class="form-check">
                    <input type="checkbox" name="roles[]" value="{{$role->id}}"
                    @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                    <label>{{$role->name}}</label>

                    </div>

                    @endforeach
                   </div>
                    <button type="submit" class="btn btn-primary">Update</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
