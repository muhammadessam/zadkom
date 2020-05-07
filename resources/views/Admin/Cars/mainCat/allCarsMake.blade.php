@extends('Admin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="col-6">انواع السيارات</h3>
                    <div class="col-6 text-left">
                        <a class="btn btn-primary" href="{{route('add.car.main.get')}}">اضافة نوع رئيسي</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table style="text-align: center" id="cars" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>اجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carsmake as $car)
                            <tr>
                                <td>{{$car->title}}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('add.car.sub.get', $car)}}"><i
                                            class="fa fa-plus"></i></a>
                                    <form style="display: inline-block"
                                          action="{{route('delete.car.make', $car)}}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return myFunction();">
                                            <i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection


@section('javascript')
    <script>
        $("#cars").DataTable({
            "language": {
                "paginate": {
                    "next": "التالي",
                    "previous": "السابق"
                },
                "search": "بحث : ",
                "lengthMenu": "عرض _MENU_ سائقين",
                "entries": "سائق"
            },
            "info": false,
        });
        $(document).ready(function () {
            $('#cars_filter').addClass('text-left');
        });
        function myFunction() {
            if (!confirm("هل تريد تاكيد الخذف"))
                event.preventDefault();
        }
    </script>
@endsection
