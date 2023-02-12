<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-0 pb-0">
                <h4 class="card-title">Early Settlement </h4>
                {{$today}}
                {{$next}}
            </div>
            <div class="card-body">
                <div class="col-xl-12">
                    <div class="filter cm-content-box box-primary"> 
                        <div class="content-title">
                            <div class="cpa">
                                <i class="fa-sharp fa-solid fa-filter me-2"></i>Filter
                            </div>
                            <div class="tools">
                                <a href="javascript:void(0);" class="expand SlideToolHeader"><i class="fal fa-angle-down"></i></a>
                            </div>
                        </div>
                        <div class="cm-content-body form excerpt">
                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-xl-3">
                                        <input type="text" class="form-control mb-xl-0 mb-3" id="exampleFormControlInput1" placeholder="Title">
                                    </div> --}}
                                    <div class="col-xl-3">
                                        <select class="from-select w-100 mb-xl-0 mb-3" aria-label="Default select example">
                                            <option selected>Select Status</option>
                                            <option value="published">Published</option>
                                            <option value="2">Draft</option>
                                            <option value="3">Trash</option>
                                            <option value="4">Private</option>
                                            <option value="5">Pending</option>
                                        </select> 
                                    </div>
                                    <div class="col-xl-3">
                                        <input type="date" name="datepicker" class=" form-control mb-xl-0 mb-3">
                                    </div>
                                    <div class="col-xl-3">
                                        <input type="date" name="datepicker" class=" form-control mb-xl-0 mb-3">
                                    </div>
                                    <div class="col-xl-3">
                                        <button class="btn btn-info" title="Click here to Search" type="button"><i class="fa fa-search me-1"></i>Filter</button>
                                        {{-- <button class="btn btn-light" title="Click here to remove filter" type="button">Remove Filter</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Results --}}
                <div class="table-responsive">
                    @if(!empty($results))
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Gender</th>
                                <th>NRC</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Joining Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @forelse($users as $user)
                            <tr>
                                <td>
                                    @if($user->profile_photo_path == null)
                                        @if($user->fname != null && $user->lname != null)
                                            <span class="text-white">{{ $user->fname[0].' '.$user->lname[0] }}</span>
                                        @else
                                            <span>{{ $user->name[0] }}</span>
                                        @endif
                                    @else
                                        <img class="rounded-circle" width="35" src="{{ 'public/'.Storage::url($user->profile_photo_path) }}" />
                                    @endif
                                </td>
                                <td>{{ $user->fname ?? $user->name.' '.$user->lname ?? '' }} </td>
                                <td>
                                    @forelse($user->roles as $role)
                                        <span class="capitalize">{{ $role->name }}</span>
                                    @empty
                                        <span>Guest</span>
                                    @endforelse
                                </td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->nrc ?? 'No ID' }}</td>
                                <td><a href="javascript:void(0);"><strong>{{ $user->phone }}</strong></a></td>
                                <td><a href="javascript:void(0);"><strong>{{ $user->email }}</strong></a></td>
                                <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('client-account', ['key'=>$user->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" wire:click="destory($user->id)" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    </div>												
                                </td>												
                            </tr>
                            @empty
                            <div class="intro-y col-span-12 md:col-span-6">
                                <div class="box text-center">
                                    <p>No User Found</p>
                                </div>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                    @else
                    <p>Search for Range</p>
                    @endif
                    @if (Session::has('attention'))
                    <div class="alert alert-info solid alert-end-icon alert-dismissible fade show">
                        <span><i class="mdi mdi-check"></i></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button> {{ Session::get('attention') }}
                    </div>
                    @elseif (Session::has('error_msg'))
                    <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                        <span><i class="mdi mdi-help"></i></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                        <strong>Error!</strong> {{ Session::get('error_msg') }}
                    </div
                    @endif
                </div>


            </div>
        </div>
    </div>
</div>
