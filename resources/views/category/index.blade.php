@extends('layout')
@section('dashboard-content')
    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('success') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th> Category Name </th>

                        <th>Actions </th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th> Category Name </th>
                        <th>Actions </th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($category as $cat)

                        <tr>
                            <td> {{ $cat->name }} </td>
                            <td>
                                <a href="{{URL::to('edit-category')}}/{{$cat->id}}" class="btn btn-outline-primary btn-sm"> Edit </a>
                                |
                                <a href="{{URL::to('delete-category')}}/{{$cat->id}}" onclick="checkDelete()" class="btn btn-outline-danger btn-sm"> Delete </a>
                            </td>

                        </tr>


                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
    <script>
        function checkDelete(){
            var check= confirm('Are you sure want to delete');
            if(check){
                return  true;
            }
            else return false;

        }

    </script>

@stop
