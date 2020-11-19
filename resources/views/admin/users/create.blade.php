@extends('layouts.app')

@section('content')

    <div class="nk-block-head nk-block-head-lg wide-sm">
        <div class="nk-block-head-content">
            <div class="nk-block-head-sub"><a class="back-to" href="{{ route('users.index') }}"><em class="icon ni ni-arrow-left"></em><span>Back</span></a></div>
            <h2 class="nk-block-title fw-normal">{{ isset($user)?'Edit':'Add'}} Staff Member</h2>
            <div class="nk-block-des">
                <p class="">All fields are required.</p>
            </div>
        </div>
    </div><!-- .nk-block -->
    <div class="nk-block nk-block-lg">
        @include('partials.error')
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">{{ isset($user)?'':'New'}} Staff Member Setup</h5>
                </div>
                <form action="{{ isset($user)? route('users.update',$user->id):route('users.store') }}" class="gy-3" class="is-alter form-validate" method="POST">
                    {{ csrf_field() }}
                    @if (isset($user))
                        {{ method_field('PUT') }}
                    @endif
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Role</label>
                                <span class="form-note"></span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <select name="role" id="role" class="form-control" >
                                            <option value="Staff"                                                                                 
                                                @if (isset($user))
                                                    @if ($user->role=='Staff')
                                                        selected
                                                    @endif
                                                @endif
                                            >Staff</option>
                                            <option value="Admin"
                                                @if (isset($user))
                                                    @if ($user->role=='Admin')
                                                        selected
                                                    @endif
                                                @endif
                                            >Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <span class="form-note"></span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($user)?$user->name:'' }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <span class="form-note"></span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ isset($user)?$user->email:'' }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (!isset($user))
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <span class="form-note"></span>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="password" class="form-control" id="password" name="password" value="" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label"></label>
                                <span class="form-note"></span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="online" name="online" value='1'
                                        @if (isset($user))
                                            @if ($user->online=='1')
                                                checked
                                            @endif
                                        @endif
                                    >
                                    <label class="custom-control-label" for="online">Is Active</label>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-lg-7 offset-lg-5">
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">{{ isset($user)?'Update':'Add' }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- card -->
    </div><!-- .nk-block -->
                    


@endsection
