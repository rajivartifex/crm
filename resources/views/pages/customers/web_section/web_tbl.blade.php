<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Social Media</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Media Name</th>
                            <th>Media Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#</td>
                            <td>Facebook</td>
                            <td>www.facebook.com</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('customer-web-index')}}" class="btn btn-primary btn-sm">View</a>
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <tr>
                                <th>Id</th>
                                <th>Media Name</th>
                                <th>Media Link</th>
                                <th>Action</th>
                            </tr>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
