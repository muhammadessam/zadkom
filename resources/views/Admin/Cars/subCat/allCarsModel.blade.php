@extends('Admin.Layout.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-lg-between">
                    <h3 class="card-title">اضافة فرعي </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{route('add.car.sub.post', $carMake)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label> الفرعي</label>
                                    <input name="title" class="form-control" type="text">
                                </div>

                                <button class="btn btn-primary" type="submit">اضافة</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="col-6">الانواع الفرعية</h3>
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
                        @foreach($carMake->carModels as $car)
                            <tr>
                                <td>{{$car->title}}</td>
                                <td style="text-align: center">
                                    <form style="display: inline-block"
                                          action="{{route('delete.car.model', $car)}}"
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
