@extends('Admin.Layout.layout')
@section('content')
<style>
    form{
        width:100%;
    }
    .tox{
        width:1000px;
        height:400px;
    }
</style>
    <div class="container">
        <div class="row">
            <form action="{{route('settings_save')}}" method="post">
                @csrf
                <div class="row">
                    <h4 class="col-md-12" >حالة الموقع</h4>
                    <div class="form-check form-check-inline">
                        @if($set->is_closed)
                            <input class="form-check-input" checked type="radio" name="is_closed" id="inlineRadio1" value="1">
                        @else
                            <input class="form-check-input"  type="radio" name="is_closed" id="inlineRadio1" value="1">
                        @endif
                        <label class="form-check-label"  for="inlineRadio1"> مغلق</label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if($set->is_closed)
                            <input class="form-check-input"  type="radio" name="is_closed" id="inlineRadio2" value="0">
                        @else
                            <input class="form-check-input" checked  type="radio" name="is_closed" id="inlineRadio2" value="0"> 
                        @endif
                        
                        <label class="form-check-label"  for="inlineRadio2"> مفتوح</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">رسالة الاغلاق</label>
                    <textarea class="form-control" name="close_msg" id="exampleFormControlTextarea1" rows="3">{{$set->close_msg}}</textarea>
                </div>
                <div class="row">
                    <h4 class="col-md-12" >تفعيل السائقين مباشرة</h4>
                    <div class="form-check form-check-inline">
                        @if($set->allow_drivers)
                            <input class="form-check-input" checked type="radio" name="allow_drivers" id="1" value="1"> 
                        @else
                            <input class="form-check-input" type="radio" name="allow_drivers" id="1" value="1">
                        @endif
                        <label class="form-check-label" for="1">نعم</label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if($set->allow_drivers)
                            <input class="form-check-input"  type="radio" name="allow_drivers" id="0" value="0"> 
                        @else
                            <input class="form-check-input" checked type="radio" name="allow_drivers" id="0" value="0">
                        @endif
                        <label class="form-check-label" for="0">لا</label>
                    </div>
                </div>
                <div class="row">
                    <h4 class="col-md-12" >تفعيل المتاجر مباشرة</h4>
                    <div class="form-check form-check-inline">
                        @if($set->allow_stores)
                            <input class="form-check-input" type="radio" checked name="allow_stores" id="11" value="1">
                        @else
                            <input class="form-check-input" type="radio" name="allow_stores" id="11" value="1">
                        @endif
                        
                        <label class="form-check-label" for="11">نعم</label>
                    </div>
                    <div class="form-check form-check-inline">
                        @if($set->allow_stores)
                            <input class="form-check-input" type="radio"  name="allow_stores" id="00" value="0">
                        @else
                            <input class="form-check-input" type="radio" checked name="allow_stores" id="00" value="0">
                        @endif
                        <label class="form-check-label" for="00">لا</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">حساب الكيلومتر</label>
                        <input type="double" class="form-control" value="{{$set->kilo}}" name="kilo" id="inputEmail4" placeholder="">
                    </div>
                </div>
                <div class="row">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">التواصل</label>
                    <textarea class="form-control" name="contact" id="exampleFormControlTextarea1" rows="3">{{$set->contact}}</textarea>
                </div>
                </div>
                <button class="btn btn-block btn-success" type="submit">حفظ</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/3yflwy460rfp4vet4xyw6jn4y26ai7kuxmc5hyzr2mg82ni9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
@endsection