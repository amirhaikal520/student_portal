<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSP Student Portal - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header text-center bg-primary text-white">
                    <h3>PSP Student Portal</h3>
                    <p class="mb-0">Student Login</p>
                </div>

                <div class="card-body p-4">
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="index.php?action=login">
                        <div class="mb-3">
                            <label for="no_matrik" class="form-label">No Matrik / Student ID</label>
                            <input
                                type="text"
                                class="form-control"
                                id="no_matrik"
                                name="no_matrik"
                                placeholder="Enter No Matrik (e.g. 10DIT24F2010)"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Enter Password"
                                required
                            >
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center">
                    <small class="text-muted">PSP Student Portal</small>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>