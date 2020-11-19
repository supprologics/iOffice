@extends('layouts.app')

@section('content')

    <div class="nk-block-head nk-block-head-lg wide-sm">
        <div class="nk-block-head-content">
            <div class="nk-block-head-sub"><a class="back-to" href="{{ route('companies.index') }}"><em class="icon ni ni-arrow-left"></em><span>Back</span></a></div>
            <h2 class="nk-block-title fw-normal">{{ isset($company)?'Edit':'Add'}} Company</h2>
            <div class="nk-block-des">
                <p class="">All fields are required.</p>
            </div>
        </div>
    </div><!-- .nk-block -->
    <div class="nk-block nk-block-lg">
        @include('partials.error')
        <div class="card">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">{{ isset($company)?'':'New'}} Company Setup</h5>
                </div>
                <form action="{{ isset($company)? route('companies.update',$company->id):route('companies.store') }}" class="gy-3" class="is-alter form-validate" method="POST">
                    {{ csrf_field() }}
                    @if (isset($company))
                        {{ method_field('PUT') }}
                    @endif
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ isset($company)?$company->name:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label" for="code">Code</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="code" id="code" value="{{ isset($company)?$company->code:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="objective">Objective</label>
                                <div class="form-control-wrap">
                                    <textarea name="objective" id="objective" class="form-control" cols="30" rows="5">{{ isset($company)?$company->objective:'' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label class="form-label" for="register_address">Register Address</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="register_address" id="register_address"  value="{{ isset($company)?$company->register_address:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-label" for="postal_code">Postal Code</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="postal_code" id="postal_code"  value="{{ isset($company)?$company->postal_code:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="ds_division">DS Division</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="ds_division" id="ds_division" value="{{ isset($company)?$company->ds_division:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="gs_division">GS Division</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="gs_division" id="gs_division" value="{{ isset($company)?$company->gs_division:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label" for="landline">Landline</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="landline" id="landline" value="{{ isset($company)?$company->landline:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label" for="mobile">Mobile</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="mobile" id="mobile" value="{{ isset($company)?$company->mobile:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" name="email" id="email" value="{{ isset($company)?$company->email:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="flag" name="flag" value='1' 
                                @if (isset($company))
                                    @if ($company->flag=='1')
                                        checked
                                    @endif
                                @endif
                                >
                                <label class="custom-control-label" for="flag" >Flag</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- .nk-block -->
                    


@endsection
