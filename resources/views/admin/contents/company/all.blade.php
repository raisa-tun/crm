@extends("admin.layouts.main")
@section('employee')

<div class="card">
    <div class="card-header">
        <h3>Company Management</h3>

        <button type="button" class="btn btn-success" data-container="body" data-toggle="popover" title="Success color states" style="float:right">
            <a href="{{route('company.create')}}">Add</a>
        </button>

    </div>
    <div class="card-block">
        <table id="demo-foo-filtering" class="table table-striped">
            <thead>
                <tr>

                    <th data-breakpoints="xs">Comapany Name</th>
                    <th data-breakpoints="xs">Address</th>
                    <th data-breakpoints="xs">Phone number</th>
                    <th data-breakpoints="xs">Email</th>
                    <th data-breakpoints="xs">Summery</th>
                    <th data-breakpoints="xs">Logo</th>
                    <th data-breakpoints="xs">Documents</th>
                    <th data-breakpoints="xs">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{$company->company_name}}</td>
                    <td>{{$company->address}}</td>
                    <td>{{$company->phone_no}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->summery}}</td>
                    <td><img src="{{ url('storage/'.$company->logo) }}" width="60" height="60" class="rounded-circle mr-2" /></td>

                    <td>
                        @foreach($company->file as $company_file)
                        <a href="{{ url('storage/'.$company_file->file_attachment) }}" width="60" height="60">Doc file</a>
                        @endforeach
                    </td>


                    <td class="text-center">
                        <a href="{{route('company.edit',['company' => $company->id])}}">
                            <span class="icofont icofont-ui-edit">
                        </a>
                        <button type="button" class="btn btnDelete text-danger" data-id="{{ $company->id }}"><span class="icofont icofont-ui-delete"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{$companies->links()}}
    </div>
</div>
<div class="modal modal- fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <form method="post" action="{{route('company.delete')}}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="company_id" class="company-id">
                    <button type="submit" class="btn btn-outline" id="modalBtnDelete">Delete</button>
                </form>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@endsection

@section('script')
<script>
    $(function() {
        let selectedId;
        $('.btnDelete').click(function() {
            $('#modal-delete').modal('show');
            selectedId = $(this).data('id');
            $('.company-id').val(selectedId);
        });

    })
</script>

@endsection