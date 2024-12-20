<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
crossorigin="anonymous">
<title>Posts</title>
</head>
<body>

<h1 style="margin: 50px 50px">Cập nhật thông tin vấn đề</h1>

<form action="{{ route('issues.update', $issues->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="computer_id" class="form-label">Tên máy tính</label>
        <input type="text" class="form-control" id="computer_id" name="computer_id" value="{{ $issues->computer->computer_name }}" required>
    </div>
    <div class="form-group">
        <label for="model" class="form-label">Tên phiên bản</label>
        <select class="form-control" id="model" name="model" required>
            @foreach($computers as $computer)
            <option value="{{ $computer->id }}" {{ $computer->id == $issues->computer_id ? 'selected' : '' }}>{{ $computer->model }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="reported_by" class="form-label">Người báo cáo sự cố</label>
        <input type="text" class="form-control" id="reported_by" name="reported_by" value="{{ $issues->reported_by }}" required>
    </div>
    <div class="form-group">
        <label for="reported_date" class="form-label">Thời gian báo cáo</label>
        <input type="date" class="form-control" id="reported_date" name="reported_date" value="{{ $issues->reported_date }}"  required>
    </div>
    <div class="form-group">
        <label for="urgency" class="form-label">Mức độ sự cố</label>
        <textarea class="form-control" id="urgency" name="urgency" rows="3" value="{{ $issues->urgency }}" required></textarea>
    </div>
    <div class="form-group">
        <label for="status" class="form-label">Trạng thái hiện tại</label>
        <textarea class="form-control" id="status" name="status" rows="3" value="{{ $issues->status }}" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

</body>
