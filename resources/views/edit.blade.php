<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Task</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">➕ Edit Task</h4>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('update',$data->id) }}">
                            @csrf
                            @method('put')
                            <!-- Task Title -->
                            <div class="mb-3">
                                <label class="form-label">Task Name</label>
                                <input type="text" name="task" value="{{ $data->task }}" class="form-control" placeholder="Enter task name">
                                @error('task')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Task Description -->
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="des" rows="4" placeholder="Enter task description">{{ $data->des }}</textarea>
                                @error('des')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="0" selected>Pending</option>
                                    <option value="1">Completed</option>
                                </select>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('index') }}" class="btn btn-secondary">⬅ Back</a>
                                <button type="submit" class="btn btn-success">💾 Save Task</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
