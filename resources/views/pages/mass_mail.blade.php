@extends('layouts.app')
@section('content')
<div  class="row bg-dark d-flex justify-content-center">

	<div class="col-8">
		<h2 class="text-white text-center">Рассылка</h2>
		<form method="POST" action="{{ route('massMailSend') }}">
			@csrf
		  <div class="form-group">
			    <!-- <label for="title">Название</label> -->
			    <div class="md-form">
			    	<input type="text" name="title" class="form-control text-white" id="title"  placeholder="Тема">
				</div>
			  <div class="form-group">
			    <!-- <label for="Textarea1">Содержимое</label> -->
			    <div class="md-form">
			    	<textarea name="content" class="form-control md-textarea text-white" id="mail_content" rows="20" placeholder="Содержание"></textarea>
				</div>
			  </div>
		  </div>

		  <button type="submit" class="btn btn-danger text-white">Отравить</button>
		</form>
	</div>
</div>
<hr>
<!-- <div class="container">
    <div class="row text-center">
        <div class="col-12">
            <h1>TinyMCE title</h1>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <form action="" method="post">
                <div class="form-group">
                    <label for="input">Содержание</label>
                    <textarea class="form-control" name="content" id="input" rows="10"></textarea>
                </div>
                {{ csrf_field() }}
                <button type="submit">Вжух</button>
            </form>
        </div>
    </div>
</div> -->
<script src="{{ URL::to('js/tinymce/tinymce.min.js') }}"></script>

<script>
    var editor_config = {
    	language: "ru",
        path_absolute : "{{ URL::to('/') }}/",
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent", // | link image media

        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }
            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };
    tinymce.init(editor_config);
</script>
@endsection


