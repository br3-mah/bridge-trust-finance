<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Repayment Calculator</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" placeholder="1234 Main St">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label>City</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">State</label>
                                        <select id="inputState" class="default-select form-control wide">
                                            <option selected>Choose...</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label class="form-label">Zip</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            Check me out
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Calculate</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Comparision</h4>
                    </div>
                    <div class="card-body">
                        <div id="flotLine1" class="flot-chart"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>