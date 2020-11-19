@extends('layouts.app')



@section('content')

    <div class="nk-block-head nk-block-head-lg wide-lg">
        @if ($type==1)
            @if (isset($company))
                @include('partials.header',[
                    'header'=>'Directors',
                    'detail_line'=>'You have total 2,595 directors.',
                    'icon_a'=>'ni-building-fill',
                    'display_a'=>'Add New Director',
                    'url'=>"createdirector",
                    'parameter'=>$company,
                ])
            @else
            @include('partials.header',[
                'header'=>'Directors',
                'detail_line'=>'You have total 2,595 directors.',
            ])
            @endif

        @elseif($type==2)
            @if (isset($company))
                @include('partials.header',[
                    'header'=>'Shareholders',
                    'detail_line'=>'You have total 2,595 shareholder.',
                    'icon_a'=>'ni-building-fill',
                    'display_a'=>'Add New Shareholder',
                    'url'=>"createshareholder",
                    'parameter'=>$company,
                ])
            @else
            @include('partials.header',[
                'header'=>'Shareholders',
                'detail_line'=>'You have total 2,595 shareholder.',
            ])
            @endif
        @endif

    </div><!-- .nk-block-head -->
    @include('partials.session')
    <div class="nk-block nk-block-lg">
        <div class="card card-preview">
            <div class="card-inner">
                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Division</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Contact</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Email</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-right">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($directors as $director)
                            
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col">
                                    <div class="user-card">
                                        <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                            <span>AB</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="tb-lead">{{ $director->title.'. '.$director->name }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                            <span>@if ($director->flag==1)
                                                    Director
                                                @elseif($director->flag==2)
                                                    Shareholder
                                                @elseif($director->flag==3)
                                                    Shareholder & Director
                                            @endif </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="nk-tb-col tb-col-mb" >
                                    <span class="tb-lead">{{ $director->ds_division }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                    <span>{{ $director->gs_division }} </span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                    <span class="tb-lead">{{ $director->landline }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                    <span>{{ $director->mobile }} </span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span>{{ $director->email }} </span>
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li class="nk-tb-action-hidden">
                                            <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                <em class="icon ni ni-mail-fill"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{ route('directors.edit',$director->id) }}"><em class="icon ni ni-building-fill"></em><span>Edit</span></a></li>
                                                        <li><a role="button"  onclick="handleDelete({{$director->id}})"><em class="icon ni ni-cross-fill-c"></em><span>Remove</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr><!-- .nk-tb-item  -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->

    <!-- Modal Alert -->
    <div class="modal fade" tabindex="-1"  role="dialog" id="deleteModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post" id="deleteform">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-alert bg-warning"></em>
                            <h4 class="nk-modal-title">Delete Director!</h4>
                            <div class="nk-modal-text">
                                <div class="caption-text">Are you sure, you want to <strong>delete</strong> this director ?</div>
                                <span class="sub-text-sm">This action can not be revert.</span>
                            </div>
                            <div class="nk-modal-action">
                                <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                                <button type="submit" class="btn-lg btn-mw btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </div><!-- .modal-body -->
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function handleDelete(id){
            var form= document.getElementById('deleteform')
            form.action='/directors/'+id
            $('#deleteModal').modal('show')
        }
    </script> 
@endsection