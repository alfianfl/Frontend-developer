<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <form action="<?= base_url("/admin/auth/login_action")?>" method="post">
        <input type="text" name="username" placeholder="Username or Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" value="Login">
        <a href="<?= base_url() ?>"><button type="button">back</button></a>
    </form>
    
</body>
</html>