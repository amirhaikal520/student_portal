<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Change Password</h3>
                </div>

                <div class="card-body">

                    <?php if (!empty($message)): ?>
                        <div class="alert alert-<?php echo htmlspecialchars($messageType); ?>">
                            <?php echo htmlspecialchars($message); ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="index.php?action=change_password">

                        <div class="mb-3">
                            <label class="form-label">Old Password</label>
                            <input type="password" name="old_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">
                            Update Password
                        </button>

                        <a href="index.php?action=profile" class="btn btn-secondary">
                            Back
                        </a>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>