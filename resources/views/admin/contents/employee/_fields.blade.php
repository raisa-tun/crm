@extends("admin.layouts.main")
@section('form')


<div class="col-sm-12">
    <!-- Basic Form Inputs card start -->
    <div class="card">
        <div class="card-header">
            <h3>Add Employee</h3>



            <div class="card-header-right">
                <i class="icofont icofont-spinner-alt-5"></i>
            </div>

        </div>
        <div class="card-block">

            <form>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Employee Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter employee name" name="employee_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone no.</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter phone number" name="phone_number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Enter email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Designation</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Enter designation" name="designation">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Hire Date</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Enter hire date" name="hire_date">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Note</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Enter note" name="note">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CV</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="cv"> 
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload File</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Textarea</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="Default textarea"></textarea>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection