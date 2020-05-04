@extends('Admin.Layout.layout')
@section('content')
<link rel="stylesheet" href="{{asset('sceditor/minified/themes/default.min.css')}}" />
<script src="{{asset('sceditor/minified/sceditor.min.js')}}"></script>
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
                <textarea id="editor" name="pageContent" id="content" class="form-control" rows="50"></textarea>
            </div>
            <button class="btn btn-block btn-success" type="submit">حفظ</button>
        </form>
    </div>
    <script src="{{asset('sceditor/minified/formats/bbcode.min.js')}}"></script>
    <script>
    // Replace the textarea #example with SCEditor
    var textarea = document.getElementById('editor');
    sceditor.create(textarea, {
        format: 'bbcode',
        style: "{{asset('sceditor/minified/themes/content/default.min.css')}}"
    });
    </script>

@endsection
