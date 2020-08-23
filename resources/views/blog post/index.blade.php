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
                        <th> Blog title </th>
                        <th> Bolg Detail </th>
                        <th>  featured image </th>
                        <th>Actions </th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th> Blog title </th>
                        <th> Bolg Detail </th>
                        <th>  featured image </th>
                        <th>Actions </th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($allposts as $post)

                        <tr>
                            <td> {{ $post->title }} </td>
                            <td> {{ $post->detail }} </td>
                            <td> <img src="{{$post->featured_image_url }}" height="70"width="50"> </td>
                            <td>
                                <a href="{{URL::to('edit-category')}}/{{$post->id}}" class="btn btn-outline-primary btn-sm"> Edit </a>
                                |
                                <a href="{{URL::to('delete-category')}}/{{$post->id}}" onclick="checkDelete()" class="btn btn-outline-danger btn-sm"> Delete </a>
                            </td>

                        </tr>


                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
       @foreach($allposts as $p)
            <div>
                <img src="
                 {{Storage::url($p->featured_image_url)}}"
                 width="100" height="100">
            </div>


        @endforeach

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
