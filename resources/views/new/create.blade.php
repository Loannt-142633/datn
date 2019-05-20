<!DOCTYPE html>
<html>
<head>
    <title>Add New Post</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<h1 class="text-center">Add New Post</h1>
    <div class="row col-md-12 centered d-flex justify-content-center">
		<div class="container">
			<form method='POST' action="{{ route('new.store') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
			    <div class="form-group">
			        <label for="tieude">Tiêu đề</label>
			        <input type="text" class="form-control" id="tieude" placeholder="Enter title" name="tieude">
			    </div>
			    <div class="form-group">
			        <label for="tomtat">Tóm tắt</label>
			        <input type="text" class="form-control" id="tomtat" placeholder="Enter summary" name="tomtat">
			    </div>
			    <div class="form-group">
			        <label for="noidung">Nội dung</label>
			        <input type="text" class="form-control" id="noidung" placeholder="Enter a content" name="noidung">
			    </div>
			    <div class="form-group">
			        <label for="hinh">Chọn Ảnh</label>
			        <input type="file" name="hinh" id="fileSelect">
			    </div>
			    <button type="submit" class="btn btn-primary" name="submitbtn">Submit</button>
			</form>
		</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>