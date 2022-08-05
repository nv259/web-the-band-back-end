<?php 
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/admin_style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <header>
            <h1> ADMIN </h1>
        </header>

        <div id="main">
            <button type="button" class="add-user-btn btn btn-dark">
                Add New users 
            </button>

            <div class="account-table">
                <table class="table table-hover">
                    <thead style="background-color: black; color: white; font-style: bold;">
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Operations</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Admin</td>
                            <td>Nguyễn Việt Nhật</td>
                            <td>nguyenvietnhat.03@gmail.com</td>
                            <td>0362 272 805</td>
                            <td>Admin</td>
                            <td>
                                <button:button class="btn btn-success">Update</button:button>
                                <button:button class="btn btn-danger">Delete</button:button>
                            </td>
                        </tr>

                        <tr>
                            <td>Admin</td>
                            <td>Nguyễn Việt Nhật</td>
                            <td>nguyenvietnhat.03@gmail.com</td>
                            <td>0362 272 805</td>
                            <td>Admin</td>
                            <td>
                                <button:button class="btn btn-success">Update</button:button>
                                <button:button class="btn btn-danger">Delete</button:button>
                            </td>
                        </tr>

                        <tr>
                            <td>Admin</td>
                            <td>Nguyễn Việt Nhật</td>
                            <td>nguyenvietnhat.03@gmail.com</td>
                            <td>0362 272 805</td>
                            <td>Admin</td>
                            <td>
                                <button:button class="btn btn-success">Update</button:button>
                                <button:button class="btn btn-danger">Delete</button:button>
                            </td>
                        </tr>

                        <tr>
                            <td>Admin</td>
                            <td>Nguyễn Việt Nhật</td>
                            <td>nguyenvietnhat.03@gmail.com</td>
                            <td>0362 272 805</td>
                            <td>Admin</td>
                            <td>
                                <button:button class="btn btn-success">Update</button:button>
                                <button:button class="btn btn-danger">Delete</button:button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="footer">
            <h2> Number of Accounts: 4 </h2>
        </div>
    </body>
</html>