@extends('Admin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header row">

                    <div class="col-6"><h3 class="card-title">جميع التقيمات</h3></div>

                    <div class="col-6 text-left"><a class="col- btn btn-primary" href="{{route('customerRating.create')}}">اضافة</a></div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="ratings" class="table text-center table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>رقم التقيم</th>
                            <th>العميل</th>
                            <th>السائق</th>
                            <th>التقيم</th>
                            <th>اجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($ratings as $rating)
                            <tr>
                                <td>{{$rating->id}}</td>
                                <td>{{$rating->customer->name}}</td>
                                <td>{{$rating->driver->user->name}}</td>
                                <td>
                                    @if($rating->value == 1)
                                        <span class="fa fa-star text-warning"></span>
                                    @elseif($rating->value == 2)
                                        <span class="fa fa-star text-warning"></span>
                                        <span class="fa fa-star text-warning"></span>
                                    @elseif($rating->value == 3)
                                        <span class="fa fa-star text-warning"></span>
                                        <span class="fa fa-star text-warning"></span>
                                        <span class="fa fa-star text-warning"></span>
                                    @elseif($rating->value == 4)
                                        <span class="fa fa-star text-warning"></span>
                                        <span class="fa fa-star text-warning"></span>
                                        <span class="fa fa-star text-warning"></span>
                                        <span class="fa fa-star text-warning"></span>
                                    @elseif($rating->value == 5)
                                        <span class="fa fa-star text-warning"></span>
                                        <span class="fa fa-star text-warning"></span>
                                        <span class="fa fa-star text-warning"></span>
                                        <span class="fa fa-star text-warning"></span>
                                        <span class="fa fa-star text-warning"></span>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    <form class="form-inline" method="post"
                                          action="{{route('customerRating.destroy', $rating)}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            لا توجد بيانات
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(function () {
            $("#ratings").DataTable({
                "language": {
                    "paginate": {
                        "next": "التالي",
                        "previous": "السابق"
                    },
                    "search": "بحث : ",
                    "lengthMenu": "عرض _MENU_ تقيم",
                    "entries": "سائق"
                },
                "info": false,
            });
        });
        $(document).ready(function () {
            $('#ratings_filter').addClass('text-left');
        });

        function myFunction() {
            if (!confirm("هل تريد تاكيد الخذف"))
                event.preventDefault();
        }
    </script>




@endsection
