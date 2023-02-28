<div wire:ignore class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Contact Settings</h4>                
                    {{-- <button data-bs-toggle="modal" data-bs-target="#createUserModeling" class="btn btn-square btn-primary">New Borrower</button> --}}
                </div>

                <div wire:ignore class="card-body pb-0">
                    <form wire:submit.prevent="saveContacts()" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-validation">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        {{-- <div class="mb-2">
                                                            <div class="col-8">
                                                                <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                                                    <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                                        <img class="rounded-md" alt="Logo" id="preview-image-before-upload_create" src="{{ asset('dist/images/profile-10.jpg') }}">
                                                                    </div>
                                                                    <div class="mx-auto cursor-pointer relative mt-5">
                                                                    <button type="button" class="btn btn-primary w-full">Add Logo
                                                                        <input wire:ignore.self type="file" id="prof_image_create" name="logo_file" class="w-full h-full top-0 left-0 absolute opacity-0"> 
                                                                    </button>
                                                                    </div>
                                                                </div>
                                                            </div>                                                        
                                                        </div> --}}
                                                        
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom01">Business Name
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="validationCustom01" value="{{ $contacts->name }}" wire:model="name"  placeholder="{{ $contacts->name }}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a name.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom01">Slogan
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="validationCustom01" value="{{ $contacts->slogan ?? '' }}" wire:model="slogan"  placeholder="Enter a Slogan.." required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a slogan.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" value="{{ $contacts->email ?? '' }}" wire:model="email" id="validationCustom02"  placeholder="Your valid email.." required>
                                                                <div class="invalid-feedback">
                                                                    Please enter an Email.
                                                                </div>
                                                            </div>
                                                        </div><div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom05">Legal Structure
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <select value="{{ $contacts->legal_structure ?? '' }}" wire:model="legal_structure" class="default-select wide form-control" id="validationCustom05">
                                                                    <option data-display="Select">Please select</option>
                                                                    <option value="">None</option>
                                                                    <option value="PLc">Private</option>
                                                                    <option value="Ltd">Public</option>
                                                                    <option value="Corp">Corporation</option>
                                                                    <option value="LLC">LLC</option>
                                                                    <option value="Partnership">Partnership</option>
                                                                    <option value="Sole Proprietorship">Sole Proprietorship</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a one.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom07">State/Province
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->state ?? '' }}" type="text" class="form-control" wire:model="state" id="validationCustom07"  placeholder="Ex. Copperbelt" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter State.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom07">City
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->city ?? '' }}" type="text" class="form-control" wire:model="city" id="validationCustom07"  placeholder="Ex. Ndola" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a City.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom05">Business Type
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <select value="{{ $contacts->business_type ?? '' }}" wire:model="business_type" class="default-select wide form-control" id="validationCustom05">
                                                                    <option  data-display="Select">Please select</option>
                                                                    <option value="">None</option>
                                                                    <option value="Banking">Banking Service</option>
                                                                    <option value="Lending">Lending Service</option>
                                                                    <option value="E-Commerce">E-Commerce</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a one.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Phone (+260)
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->phone1 ?? '' }}" type="text" class="form-control" wire:model="phone1" id="validationCustom08" placeholder="097-999-8888" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a phone no.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Phone 2 (+260)
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->phone2 ?? '' }}" type="text" class="form-control" wire:model="phone2" id="validationCustom08" placeholder="097-999-8888" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a phone no.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Phone 3 (+260)
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->phone3 ?? '' }}" type="text" class="form-control" wire:model="phone3" id="validationCustom08" placeholder="097-999-8888" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a phone no.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Facebook Link 
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->facebook ?? '' }}" type="text" class="form-control" wire:model="facebook" id="validationCustom08" placeholder="https://link" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Instagram Link 
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->instagram ?? '' }}" type="text" class="form-control" wire:model="instagram" id="validationCustom08" placeholder="https://link" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Linkedin Link 
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->linkedin ?? '' }}" type="text" class="form-control" wire:model="linkedin" id="validationCustom08" placeholder="https://link" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Twitter Link 
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->twitter ?? '' }}" type="text" class="form-control" wire:model="twitter" id="validationCustom08" placeholder="https://link" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom04">Address 
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <textarea value="{{ $contacts->address ?? '' }}" wire:model="address" class="form-control" id="validationCustom04"  rows="5" placeholder="Where exactly is the business found?" required></textarea>
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
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

