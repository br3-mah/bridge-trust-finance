<div class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employees</h4>                
                    <button data-bs-toggle="modal" data-bs-target="#createEmployeeModeling" class="btn btn-square btn-primary">New Employee</button>

                </div>

                <div class="card-body pb-0">

                    <div class="table-responsive">

                        @include('livewire.dashboard.__parts.dash-alerts')
                        <table wire:ignore id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Gender</th>
                                    <th>ID Number</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Joining Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse($users as $user)
                                <tr>
                                    <td style="text-align: center">
                                        @if($user->profile_photo_path == null)
                                            @if($user->fname != null && $user->lname != null)
                                                <span>{{ $user->fname[0].' '.$user->lname[0] }}</span>
                                            @else
                                                <span>{{ $user->name[0] }}</span>
                                            @endif
                                        @else
                                            <img class="rounded-circle" width="35" src="{{ 'public/'.Storage::url($user->profile_photo_path) }}" />
                                        @endif
                                    </td>
                                    <td style="text-align: center; text-transform: camelcase;">{{ $user->fname ?? $user->name.' '.$user->lname ?? '' }} </td>
                                    <td style="text-align: center; text-transform: camelcase;">
                                        @forelse($user->roles as $role)
                                            <span class="capitalize">{{ $role->name }}</span>
                                        @empty
                                            <span>Guest</span>
                                        @endforelse
                                    </td>
                                    <td style="text-align: center">{{ $user->gender }}</td>
                                    <td style="text-align: center">{{ $user->nrc_no ?? 'No ID' }}</td>
                                    <td style="text-align: center"><a href="javascript:void(0);"><strong>{{ $user->phone }}</strong></a></td>
                                    <td style="text-align: center"><a href="javascript:void(0);"><strong>{{ $user->email }}</strong></a></td>
                                    <td style="text-align: center">{{ $user->created_at->toFormattedDateString() }}</td>
                                    <td style="text-align: center">
                                        <div class="d-flex">
                                            <a href="{{ route('client-account', ['key'=>$user->id]) }}" class="btn btn-primary btn-square shadow btn-xs sharp me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>
                                            </a>
                                            <a href="#" class="btn btn-alert btn-square shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target="#updateBorrowerData" wire:click="editUser({{$user->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </a>
                                            <a href="#" wire:click="destory({{$user->id}})" onclick="confirm('Are you sure you want to permanently delete this account.') || event.stopImmediatePropagation();" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($createModal)
    <div wire:ignore class="modal fade bd-example-modal-lg" id="createEmployeeModeling">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                
                <form method="POST" action="{{ route('create-user') }}"  class="needs-validation" validate enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                            <div class="row">
                                                <div class="col-xl-6 col-xxl-6 col-lg-6">
                                                    <div class="mb-2">
                                                        <div class="col-6">
                                                            <div class="border-2 border-dashed shadow-xs border-slate-200/60 dark:border-darkmode-400 rounded-md p-0">
                                                                <div class="h-20 relative image-fit cursor-pointer zoom-in mx-auto">
                                                                    <img class="col-12" alt="" id="preview-image-before-upload_create" src="{{ asset('public/images/noimage.jpg') }}">
                                                                    {{-- <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div> --}}
                                                                </div>
                                                                <div class="mx-auto cursor-pointer relative mt-5">
                                                                    {{-- <button type="button" class="btn btn-square btn-primary">Add Photo</button> --}}
                                                                    <input type="file" id="prof_image_create" name="image_path" class="w-full h-full top-0 left-0"> 
                                                                    {{-- <input type="file" name="image_path" class="w-full h-full"> --}}
                                                                </div>
                                                                <small>
                                                                    {{-- @if ($errors->has('image_path'))
                                                                        <span class="text-danger text-left">{{ $errors->first('image_path') }}</span>
                                                                    @endif --}}
                                                                </small>
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Firstname
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="validationCustom01" name="fname"  placeholder="Enter a firstname.." required>
                                                            <div class="invalid-feedback">
                                                                Please enter a name.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Surname
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="validationCustom01" name="lname"  placeholder="Enter a surname.." required>
                                                            <div class="invalid-feedback">
                                                                Please enter a surname.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="email" id="validationCustom02"  placeholder="Your valid email.." required>
                                                            <div class="invalid-feedback">
                                                                Please enter an Email.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom03">Password
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" disabled class="form-control" id="validationCustom03" placeholder="20230101brigde.@2you" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a password.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom05">Gender
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <select name="gender" class="default-select wide form-control" id="validationCustom05">
                                                                <option  data-display="Select">Please select</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a one.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom06">Basic Pay
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="basic_pay" class="form-control" id="validationCustom06" placeholder="21.60" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a Basic Pay.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom07">NRC
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="nrc" id="validationCustom07"  placeholder="999999/99/9" required>
                                                            <div class="invalid-feedback">
                                                                Please enter an NRC.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Phone (ZM)
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="phone" id="validationCustom08" placeholder="097-999-8888" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a phone no.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom09">Occupation <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="validationCustom09"  placeholder="Ex. Business Administrator" required>
                                                            <div class="invalid-feedback">
                                                                Please enter an Occupation.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="assigned_role" readonly class="form-control invisible" id="validationCustom09" value="employee" placeholder="Employee" required>                                                            
                                                            
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom04">Address <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <textarea name="address" class="form-control" id="validationCustom04"  rows="5" placeholder="Where does the user stay?" required></textarea>
                                                            <div class="invalid-feedback">
                                                                Please enter an Address.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom10">Number <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="validationCustom10" placeholder="5.0" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a num.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom11">Range [1, 5]
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="validationCustom11" placeholder="4" required>
                                                           <div class="invalid-feedback">
                                                                Please select a range.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label"><a
                                                                href="javascript:void(0);">Terms &amp; Conditions</a> <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-8">
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="checkbox" value="" id="validationCustom12" required>
                                                              <label class="form-check-label" for="validationCustom12">
                                                                Agree to terms and conditions
                                                              </label>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="create-employee-toastr-success-bottom-left" data-bs-dismiss="modal">Save changes</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
    @endif


    <div wire:ignore.self wire:poll class="modal fade bd-example-modal-lg" id="updateBorrowerData">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                
                <form method="POST" action="{{ route('update-user') }}"  class="needs-validation" validate enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="form-validation">
                                            <div class="row">
                                                
                                                <div class="col-xl-6 col-xxl-6 col-lg-6">
                                                    <div class="mb-2">
                                                        <div class="col-6">
                                                            
                                                            <div class="border-2 border-dashed shadow-xs border-slate-200/60 dark:border-darkmode-400 rounded-md p-0">
                                                                <div class="h-20 relative image-fit cursor-pointer zoom-in mx-auto">
                                                                    <img class="col-12" alt="" id="preview-image-before-upload_create" src="{{ 'public/'.Storage::url($userEdit->profile_photo_path) }}">
                                                                    {{-- <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div> --}}
                                                                </div>
                                                                <div class="mx-auto cursor-pointer relative mt-5">
                                                                    {{-- <button type="button" class="btn btn-square btn-primary">Add Photo</button> --}}
                                                                    <input type="file" id="prof_image_create" name="image_path" class="w-full h-full top-0 left-0"> 
                                                                    {{-- <input type="file" name="image_path" class="w-full h-full"> --}}
                                                                </div>
                                                                <small>
                                                                    {{-- @if ($errors->has('image_path'))
                                                                        <span class="text-danger text-left">{{ $errors->first('image_path') }}</span>
                                                                    @endif --}}
                                                                </small>
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Firstname 
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">

                                                            <input type="text" class="form-control" value="{{ $userEdit->fname }}" id="validationCustom01" name="fname"  placeholder="Enter a firstname.." required>
                                                            <div class="invalid-feedback">
                                                                Please enter a name.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Surname
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" value="{{ $userEdit->lname }}" id="validationCustom01" name="lname"  placeholder="Enter a surname.." required>
                                                            <div class="invalid-feedback">
                                                                Please enter a surname.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" value="{{ $userEdit->email }}" name="email" id="validationCustom02"  placeholder="Your valid email.." required>
                                                            <div class="invalid-feedback">
                                                                Please enter an Email.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom05">Gender
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <select name="gender" class="default-select wide form-control" id="validationCustom05">
                                                                <option value="{{ $userEdit->gender }}">{{ $userEdit->gender }}</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a one.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom06">Basic Pay
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="basic_pay" value="{{ $userEdit->basic_pay }}" class="form-control" id="validationCustom06" placeholder="21.60" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a Basic Pay.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom06">Net Pay
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="net_pay" value="{{ $userEdit->net_pay }}" class="form-control" id="validationCustom06" placeholder="21.60" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a Basic Pay.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom07">NRC
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" value="{{ $userEdit->nrc_no }}" name="nrc_no" id="validationCustom07"  placeholder="999999/99/9" required>
                                                            <div class="invalid-feedback">
                                                                Please enter an NRC.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Phone (ZM)
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" value="{{ $userEdit->phone }}" name="phone" id="validationCustom08" placeholder="097-999-8888" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a phone no.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom09">Occupation <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" value="{{ $userEdit->occupation }}" id=""  placeholder="Ex. Business Administrator" required>
                                                            <div class="invalid-feedback">
                                                                Please enter an Occupation.
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    {{-- Assigned Borrower Role --}}
                                                    <input type="hidden" value="employee" name="assigned_role" class="default-select wide form-control" placeholder="Borrower" id="validationCustom05">
                                                    <input type="hidden" value="{{$userEdit->id}}" name="user_edit_id" class="default-select wide form-control" placeholder="Borrower" id="validationCustom05">
                                                     
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom04">Address<span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <textarea name="address" class="form-control" value="{{ $userEdit->address }}" id="validationCustom04"  rows="5" placeholder="Where does the person stay?" required></textarea>
                                                            <div class="invalid-feedback">
                                                                Please enter an Address.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="update-employee-toastr-success-bottom-left">Save changes</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
   $('#prof_image_create').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#preview-image-before-upload_create').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    });
});

</script>
