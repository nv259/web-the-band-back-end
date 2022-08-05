<!DOCTYPE html>
<html>
    <head>
        <title> Admin </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/admin_style.css">
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

                    $query = "SELECT Account.user_id, username, name, email, phone, role FROM Account INNER JOIN UserInfo ON Account.user_id = UserInfo.user_id";
                    if ($result = $mysqli->query($query)) 
                    {
                        if ($result->num_rows > 0)
                        {
                            echo '<table class="table table-hover">';
                                echo '<thead style="background-color: black; color: white; font-style: bold;">';
                                    echo '<tr>';
                                        echo '<th>Index</th>';
                                        echo '<th>Username</th>';
                                        echo '<th>Name</th>';
                                        echo '<th>Email</th>';
                                        echo '<th>Phone</th>';
                                        echo '<th>Role</th>';
                                        echo '<th>Operations</th>';
                                    echo '</tr>';
                                echo '</thead>';

                                echo '<tbody>';
                                $i = 1;
                                while ($row = $result->fetch_array())
                                {
                                    echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        switch ($row['role'])
                                        {
                                            case -1: 
                                                echo "<td> Staff </td>";
                                                break;
                                            case 0;
                                                echo "<td> User </td>";
                                                break;
                                            case 1:
                                                echo "<td> Admin </td>";
                                                break;
                                            default:
                                                echo "<td> darfur role?? </td>";
                                                break;
                                        }
                                        echo "<td>";
                                            echo '<a class="btn btn-success" id="reset-btn" href="reset.php?id=' . $row['user_id'] .'"> Reset </a>';
                                            echo '<a class="btn btn-danger" id="delete-btn" href="delete.php?id=' . $row['user_id'] .'" style="margin-left: 4px;"> Delete </a>';
                                        echo "</td>";
                                    echo "</tr>";

                                    $i++;
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else {
                            echo '<div class="alert alert-danger"><em?>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    $mysqli->close();
                ?>
            </div>
        </div>

        <div id="footer">
            <h2> Number of Accounts: <?php echo $i-1 ?> </h2>
        </div>

        <!-- <div class="modal js-modal"> -->
            <div class="new-user-modal overlay js-new-user-modal">
                <div class="container js-modal-container">
                    <div class="header">
                        <h3>New User</h3>
                    </div>

                    <form action="admin.php" method="post">
                        <div class="form-group">
                            <label for="username">Username: <i style="color: red;">*</i> </label>
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