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
            <button type="button" class="add-user-btn btn btn-dark js-add-user-btn">
                <!-- <i class="fa fa-plus"></i> -->
                Add New users 
            </button>

            <div class="account-table">
                <?php
                    require_once "../config/config.php";

                    $query = "SELECT username, name, email, phone, role FROM Account INNER JOIN UserInfo ON Account.user_id = UserInfo.user_id";
                ?>
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
                                <button:button class="btn btn-success">Reset</button:button>
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
                                <button:button class="btn btn-success">Reset</button:button>
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
                                <button:button class="btn btn-success">Reset</button:button>
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
                                <button:button class="btn btn-success">Reset</button:button>
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

        <!-- <div class="modal js-modal"> -->
            <div class="new-user-modal overlay js-new-user-modal">
                <div class="container js-modal-container">
                    <div class="header">
                        <h3>New User</h3>
                    </div>

                    <form action="admin.php" method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter name" required />
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" />
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" />
                        </div>

                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select name="role" id="role" required >
                                <option value="Staff">Staff</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>

                        <input type="reset" name="closeBtn" value="Close" class="close-btn btn btn-danger js-modal-operations-btn" style="float:right; margin-left: 8px;" />    
                        <input type="submit" name="createBtn" value="Create" class="create-btn btn btn-primary js-modal-operations-btn" style="float:right; " />    
                    </form>
                </div>
            </div>
        <!-- </div> -->
    </body>

    <script>
        const addUserBtn = document.querySelector(".add-user-btn");
        const newUserModal = document.querySelector(".js-new-user-modal");
        const modalOperationsBtn = document.querySelectorAll(".js-modal-operations-btn");
        const modalContainer = document.querySelector('.js-modal-container');

        addUserBtn.addEventListener('click', function () {
            newUserModal.classList.add("open");
        })

        function hideNewUserModal() {
            newUserModal.classList.remove("open");
        }
        for (const modalOperationBtn of modalOperationsBtn)
            modalOperationBtn.addEventListener('click', hideNewUserModal)
        
        newUserModal.addEventListener('click', hideNewUserModal);
        modalContainer.addEventListener('click', function (event) { event.stopPropagation() });
    </script>
</html>