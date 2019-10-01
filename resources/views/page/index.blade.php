@extends('layouts.app')
@section('content')
    <pages search_path="{{route('allPages')}}" inline-template>
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-sm-12 col-md-10">
                    <div class="card">
                        <div class="card-header">Pages</div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table" v-if="pagination.total > 0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Url</th>
                                        <th>Parsed date</th>
                                        <th>Status</th>
                                        <th>User</th>
                                        <th>Created date</th>
                                        <th>Updated date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in items">
                                        <th>@{{ item.id }}</th>
                                        <td>@{{ item.url }}</td>
                                        <td>@{{ item.parsed_at }}</td>
                                        <td>@{{ item.status }}</td>
                                        <td><span class="btn btn-link tableLink" @click="showUser(item.user)">@{{ item.user.name }}</span></td>
                                        <td>@{{ item.created_at }}</td>
                                        <td>@{{ item.updated_at }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <pagination :pagination="pagination" :offset="3"></pagination>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="show-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-lg-10 text-center">
                                <h2>User info</h2>
                            </div>
                            <button type="button" class="col-lg-2 close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="col-lg-12">
                                    <label class="col-lg-3">ID</label>
                                    <span>@{{ currentUser.id }}</span>
                                </div>
                                <div class="col-lg-12">
                                    <label class="col-lg-3">Username</label>
                                    <span>@{{ currentUser.name }}</span>
                                </div>
                                <div class="col-lg-12">
                                    <label class="col-lg-3">Email</label>
                                    <span>@{{ currentUser.email }}</span>
                                </div>
                                <div class="col-lg-12">
                                    <label class="col-lg-3">Created at</label>
                                    <span>@{{ currentUser.created_at }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </pages>
@endsection