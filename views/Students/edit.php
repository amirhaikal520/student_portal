<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Edit Student</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="index.php?action=edit&id=<?= $student['id'] ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($student['name']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Matrik</label>
                                <input type="text" name="no_matrik" class="form-control" value="<?= htmlspecialchars($student['no_matrik']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Marks</label>
                                <input type="number" name="marks" class="form-control" value="<?= htmlspecialchars($student['marks']) ?>" min="0" max="100" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="index.php?action=index" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>