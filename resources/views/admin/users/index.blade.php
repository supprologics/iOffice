@extends('layouts.app')



@section('content')

    <div class="nk-block-head nk-block-head-lg wide-lg">
        <div class="nk-block-head-content">
            <div class="nk-block-head-sub"><a class="back-to" href="html/components.html"><em class="icon ni ni-arrow-left"></em><span>Back</span></a></div>
        </div>
        @include('partials.header',[
            'header'=>'Staff & Admins',
            'detail_line'=>'You have total 2,595 users.',
            'icon_a'=>'ni-users-fill',
            'display_a'=>'Add New Staff',
            'url'=>'users.create'
        ])
    </div><!-- .nk-block-head -->
    @include('partials.session')
    <div class="nk-block nk-block-lg">
        <div class="card card-preview">
            <div class="card-inner">
                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">User</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Role</span></th>
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-right">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col">
                                    <div class="user-card">
                                        <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                            <span>AB</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="tb-lead">{{ $user->name }}<span class="dot dot-success d-md-none ml-1"></span></span>
                                            
                                        </div>
                                    </div>
                                </td>
                                <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                    <span>{{ $user->email }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                    <span>{{ $user->role }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                        @if ($user->online==1)
                                            <span class="tb-status text-success">Active
                                        @else
                                            <span class="tb-status text-warning">Suspend
                                        @endif </span>
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li class="nk-tb-action-hidden">
                                            <form action="{{ route('users.togglestatus',$user->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Toggle Status"><em class="icon ni ni-repeat"></em></button>
                                            </form>
                                        </li>
                                        <li class="nk-tb-action-hidden">
                                            <form action="{{ route('users.togglerole',$user->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Toggle Role"><em class="icon ni ni-user-check-fill"></em></button>
                                            </form>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{ route('users.edit',$user->id) }}"><em class="icon ni ni-account-setting-fill"></em><span>Edit</span></a></li>
                                                        <li><a role="button" onclick="handleDelete({{$user->id}})"><em class="icon ni ni-user-cross-fill"></em><span>Remove</span></a></li>
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
                            <h4 class="nk-modal-title">Delete User!</h4>
                            <div class="nk-modal-text">
                                <div class="caption-text">Are you sure, you want to <strong>delete</strong> this user ?</div>
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
            form.action='/users/'+id
            $('#deleteModal').modal('show')
        }
    </script> 
@endsection