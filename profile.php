<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0 fw-bold">Student Profile</h4>
                    </div>
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <?php 
                            $imagePath = 'uploads/profile_pictures/' . ($student['profile_image'] ?? '');
                            if (!empty($student['profile_image']) && file_exists(__DIR__ . '/' . $imagePath)): 
                            ?>
                                <img src="<?= htmlspecialchars($imagePath) ?>" 
                                     alt="Profile Picture" 
                                     class="rounded-circle img-thumbnail mb-3" 
                                     style="width: 130px; height: 130px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" 
                                     style="width: 130px; height: 130px; font-size: 48px; font-weight: bold;">
                                    <?= strtoupper(substr($student['name'] ?? 'S', 0, 1)) ?>
                                </div>
                            <?php endif; ?>

                            <form action="index.php?action=upload_profile" method="POST" enctype="multipart/form-data" class="mt-2">
                                <p class="text-muted small mb-2">Change Profile Picture (.jpg, .jpeg, .png | Max 2MB)</p>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="profile_image" accept="image/*" required>
                                    <button class="btn btn-outline-primary" type="submit">Upload Photo</button>
                                </div>
                            </form>
                        </div>

                        <hr>

    
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control bg-light" value="<?= htmlspecialchars($student['name'] ?? '') ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">No Matrik</label>
                            <input type="text" class="form-control bg-light" value="<?= htmlspecialchars($student['no_matrik'] ?? '') ?>" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Marks</label>
                            <input type="text" class="form-control bg-light" value="<?= htmlspecialchars($student['marks'] ?? '-') ?>" readonly>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="index.php?action=change_password" class="btn btn-warning fw-bold">Change Password</a>
                            <a href="index.php?action=index" class="btn btn-secondary">Back</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>