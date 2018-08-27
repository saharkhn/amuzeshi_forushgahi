@extends('Admin.master')

@section('script')
<script src="/ckeditor/ckeditor.js"></script>
<script>
    $(document).ready(function () {
        $('#course_id').selectpicker();
    })
</script>
<script>
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: '/admin/panel/upload-image',
        filebrowserImageUploadUrl: '/admin/panel/upload-image',
    });
</script>
@endsection

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <div class="page-header head-section">
            <h2>ثبت ویدئو</h2>
            <a href="{{route('episodes.create')}}" class="btn btn-sm btn-primary">ارسال ویدئو جدید</a>
        </div>
        <form class="form-horizontal" action="{{route('episodes.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('Admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label">عنوان ویدئو</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید" value={{old('title')}}>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="course_id" class="control-label">دوره مرتبط</label>
                    <select type="text" class="form-control" name="course_id" id="course_id">
                        @foreach(\App\Course::latest()->get() as $course)
                            <option value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="type" class="control-label">نوع ویدئو</label>
                    <select name="type" id="type" class="form-control">
                        <option value="vip">اعضای ویژه</option>
                        <option value="cash">نقدی</option>
                        <option value="free" selected>رایگان</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">متن</label>
                    <textarea rows="5" class="form-control" name="description" id="description" placeholder="متن ویدئو را وارد کنید">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="time" class="control-label">زمان ویدئو</label>
                    <input type="text" class="form-control" name="time" id="time" placeholder="زمان را وارد کنید" value={{old('price')}}>
                </div>
                <div class="col-sm-6">
                    <label for="number" class="control-label">شماره قسمت</label>
                    <input type="text" class="form-control" name="number" id="number" placeholder="شماره قسمت را وارد کنید" value={{old('tags')}}>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="videoUrl" class="control-label">لینک ویدئو</label>
                    <input type="text" class="form-control" name="videoUrl" id="videoUrl" placeholder="لینک ویدئو را وارد کنید" value={{old('price')}}>
                </div>
                <div class="col-sm-6">
                    <label for="tags" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="تگ ها را وارد کنید" value={{old('tags')}}>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                </div>
            </div>
        </form>
    </div>

@endsection