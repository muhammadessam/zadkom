@extends('Admin.Layout.layout')
@section('content')
    <div class="container">
        <h3>انشاء صفحة جديدة</h3>
        <form action="{{route('pages.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">عنوان الصفحة</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="content">محتوي الصفحة</label>
                <textarea name="content" id="content" class="form-control" rows="50"></textarea>
            </div>
            <button class="btn btn-block btn-success" type="submit">حفظ</button>
        </form>
    </div>
    <script src="https://cdn.tiny.cloud/1/3yflwy460rfp4vet4xyw6jn4y26ai7kuxmc5hyzr2mg82ni9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode image  casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
@endsection