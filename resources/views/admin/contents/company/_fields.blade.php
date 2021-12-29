

<div class="col-sm-12">
    <!-- Basic Form Inputs card start -->
    <div class="card">
        <div class="card-header">
            <h3>Add Company</h3>



            <div class="card-header-right">
                <i class="icofont icofont-spinner-alt-5"></i>
            </div>

        </div>
        <div class="card-block">

           
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter company name" name="company_name" value="{{ isset($company->company_name) ? $company->company_name : old('company_name') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter company address" name="address" value="{{ isset($company->address) ? $company->address : old('address') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone no.</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter phone number" name="phone_no" value="{{ isset($company->phone_no) ? $company->phone_no : old('phone_no') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ isset($company->email) ? $company->email : old('email') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Summery</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="Summery" name="summery" value="{{ isset($company->summery) ? $company->summery : old('summery') }}"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="logo">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="file">
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success" data-container="body" data-toggle="popover" title="Success color states" style="float:right">
                            Submit
                        </button>
                    </div>
                </div>

          


        </div>
    </div>
</div>
