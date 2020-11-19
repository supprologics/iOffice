@extends('layouts.app')

@section('content')

    @php
        if(isset($director))
        {
            if($director->flag!=2){
                $type=1;
                $usertype='Director';
            }
            if($director->flag!=1){
                $type=2;
                $usertype='Shareholder';
            }
            if($director->flag==3){
                $usertype='Director & Shareholder';
            }
        }
        else{
            if ($type==1)
            {
                $usertype='Director';
            }
            elseif($type==2)
            {
                $usertype='Shareholder';
            }
        }
    @endphp

    <div class="nk-block-head nk-block-head-lg wide-sm">
        <div class="nk-block-head-content">
            <div class="nk-block-head-sub"><a class="back-to" href="{{ route('directors.index') }}"><em class="icon ni ni-arrow-left"></em><span>Back</span></a></div>
            <h2 class="nk-block-title fw-normal">{{ isset($director)?'Edit ':'Add ' .$usertype}}</h2>
            <div class="nk-block-des">
                <p class="">* fields are required.</p>
            </div>
        </div>
    </div><!-- .nk-block -->
    <div class="nk-block nk-block-lg">
        @include('partials.error')
        <div class="card">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">{{ isset($director)?'':'New ' .$usertype}} Setup</h5>
                </div>
                <form action="{{ isset($director)? route('directors.update',$director->id):route('directors.store') }}" class="gy-3" class="is-alter form-validate" method="POST">
                    {{ csrf_field() }}
                    @if (isset($director))
                        {{ method_field('PUT') }}
                    @endif
                    @if (isset($company))
                        <input type="hidden" value="{{ $company }}" name="company_id" id="company_id">
                    @endif
                    <div class="row g-4">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-label">Title *</label>
                                <div class="form-control-wrap">
                                    <select class="form-select form-control form-control-lg"  name="title" id="title">
                                            <option value="Dr" @if (isset($director)) @if ($director->title=='Dr')  selected  @endif @endif >Dr</option>
                                            <option value="Mr" @if (isset($director)) @if ($director->title=='Mr')  selected  @endif @endif >Mr</option>
                                            <option value="Mrs" @if (isset($director)) @if ($director->title=='Mrs')  selected  @endif @endif >Mrs</option>
                                            <option value="Miss" @if (isset($director)) @if ($director->title=='Miss')  selected  @endif @endif >Miss</option>
                                            <option value="Rev" @if (isset($director)) @if ($director->title=='Rev')  selected  @endif @endif >Rev</option>
                                            
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label class="form-label" for="full_name">Full Name *</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="full_name" id="full_name" value="{{ isset($director)?$director->full_name:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Type *</label>
                                <div class="form-control-wrap">
                                    <select class="form-select form-control form-control-lg"  name="flag" id="flag">
                                        @if ($type==1)
                                            <option value="1" @if (isset($director)) @if ($director->title=='1')  selected  @endif @endif >Director</option>
                                        @elseif($type==2)
                                            <option value="2" @if (isset($director)) @if ($director->title=='2')  selected  @endif @endif >Shareholder</option>
                                        @endif
                                            <option value="3" @if (isset($director)) @if ($director->title=='3')  selected  @endif @endif >Director & Shareholder</option>
                                            
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-label" for="occupation">Occupation *</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="occupation" id="occupation" value="{{ isset($director)?$director->occupation:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="nic">NIC *</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="nic" id="nic" value="{{ isset($director)?$director->nic:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="passport">Passport</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="passport" id="passport" value="{{ isset($director)?$director->passport:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label" for="landline">Landline *</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="landline" id="landline" value="{{ isset($director)?$director->landline:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label" for="mobile">Mobile *</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="mobile" id="mobile" value="{{ isset($director)?$director->mobile:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="email">E-mail *</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="email" id="email" value="{{ isset($director)?$director->email:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="ds_division">District Secretary Division *</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="ds_division" id="ds_division" value="{{ isset($director)?$director->ds_division:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="gs_division">Gramaseva Division *</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="gs_division" id="gs_division" value="{{ isset($director)?$director->gs_division:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label class="form-label" for="residential_address">Residential Address *</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="residential_address" id="residential_address" value="{{ isset($director)?$director->residential_address:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-label" for="postal_code">Postal Code *</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ isset($director)?$director->postal_code:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label" for="foreign_address">Foreign Address</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="foreign_address" id="foreign_address" value="{{ isset($director)?$director->foreign_address:'' }}">
                                </div>
                            </div>
                        </div>
                        @if ($type==2)
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="no_of_shares">No of Shares *</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="no_of_shares" id="no_of_shares" value="{{ isset($director)?$director->no_of_shares:'' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="norminal_value">Norminal Value *</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="norminal_value" id="norminal_value" value="{{ isset($director)?$director->norminal_value:'' }}">
                                    </div>
                                </div>
                            </div>
                        @endif
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
