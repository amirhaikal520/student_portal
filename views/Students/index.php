<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php?action=index">PSP Student Portal</a>
            <div class="d-flex align-items-center gap-2">
                <a href="index.php?action=profile" class="btn btn-outline-light btn-sm">Profile Saya</a>
                <a href="index.php?action=logout" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container py-2">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Student Management</h2>
            <a href="index.php?action=create" class="btn btn-primary">+ Add New Student</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>No Matrik</th>
                            <th>Marks</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($students)): ?>
                            <?php foreach ($students as $s): ?>
                                <tr>
                                    <td><?= htmlspecialchars($s['id']) ?></td>
                                    <td>
                                        <?php if (!empty($s['profile_image']) && file_exists(__DIR__ . '/../../uploads/profile_pictures/' . $s['profile_image'])): ?>
                                            <img src="uploads/profile_pictures/<?= htmlspecialchars($s['profile_image']) ?>" 
                                                 alt="Profile" 
                                                 class="rounded-circle object-fit-cover" 
                                                 width="40" height="40">
                                        <?php else: ?>
                                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                                 style="width: 40px; height: 40px; font-size: 14px;">
                                                <?= strtoupper(substr($s['name'] ?? 'S', 0, 1)) ?>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($s['name']) ?></td>
                                    <td><?= htmlspecialchars($s['no_matrik']) ?></td>
                                    <td><?= htmlspecialchars($s['marks']) ?></td>
                                    <td class="text-center">
                                        <a href="index.php?action=edit&id=<?= $s['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="index.php?action=delete&id=<?= $s['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this record?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No student records found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>