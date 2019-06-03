<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="/ckeditor/ckeditor.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script> -->
    <!-- <link href="../ckeditor/plugins/codesnippet/lib/highlight/styles/monokai_sublime.css" rel="stylesheet">
    <script src="../ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script> -->
    <script src="../ckeditor/ckeditor.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/monokai-sublime.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</head>
<body>
	<h1 class="text-center">Edit Post</h1>
    <div class="row col-md-12 centered d-flex justify-content-center">
		<div class="container">
			<form method='POST' action="{{route('new.update',[$new->id])}}" enctype="multipart/form-data">
				{{ csrf_field() }}
                {{ method_field('PUT') }}
			    <div class="form-group">
			        <label for="tieude">Tiêu đề</label>
			        <input type="text" class="form-control" id="tieude" placeholder="Enter title" name="tieude" value ="{{ old('tieude') ? old('tieude') : $new->tieude }}">
			    </div>
			    <div class="form-group">
			        <label for="tomtat">Tóm tắt</label>
			        <input type="text" class="form-control" id="tomtat" placeholder="Enter summary" name="tomtat" value ="{{ old('tomtat') ? old('tomtat') : $new->tomtat }}">
			    </div>
			    <div class="form-group">
			        <label for="noidung">Nội dung</label>
			        <textarea name="noidung" id="editor1" rows="10"  class="form-control" >{{ old('noidung') ? old('noidung') : $new->noidung }}</textarea>
			    </div>
		        {!! Html::image(
                    config('custom.path_hinh') . $new['hinh'],
                    'new image',
                    [
                        'id' => 'new-image',
                        'with' => '150',
                        'height' => '150',
                    ]
                ) !!}
                
                {!! Form::file(
                    'hinh',
                    [
                        'id' => 'file-upload',
                        'accept' => 'image/*',
                    ]
                ) !!}
			    <button type="submit" class="btn btn-primary" name="submitbtn">Submit</button>
			</form>
		</div>
    </div>
    <script type="text/javascript" >
      var options = {
        height: 500,   
        extraPlugins: 'codesnippet',
        codeSnippet_theme: 'monokai_sublime',
      };
      CKEDITOR.replace('editor1');
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>