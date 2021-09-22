@extends('admin.layouts.admin')
@section('content')
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-user"></i>
                        User
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab"
                            aria-controls="v-pills-all"><i class="icon icon-home2"></i>All User</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel"
                aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                            <tr class="no-b">
                                                <th>Nama</th>
                                                <th>Role</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($user as $item)
                                            <tr>
                                                <td>
                                                    <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                        <span class="avatar-letter avatar-letter-u  avatar-md circle">
                                                            
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <strong>{{$item->name}}</strong>
                                                        </div>
                                                        <small>{{$item->email}}</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($item->role == 'admin')
                                                        
                                                    <span class="r-3 badge badge-success ">{{$item->role}}</span>
                                                    @else
                                                    <span class="r-3 badge badge-warning ">{{$item->role}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#"><i class="icon-eye mr-3"></i></a>
                                                    <a href="#"><i class="icon-pencil"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            

                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add New Message Fab Button-->
    <a href="{{route('guest.create')}}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i
            class="icon-add"></i></a>

@endsection

