<h2 class="i-name">Users Details</h2>
<div class="admin-content">
    <a class="addBtn" href="createUser.php"><i class="fa fa-plus"></i> Add New</a>
    <p><?= $message ?></p>
    <table class="data-table">
        <tr>
            <th>Username</th>
            <th>Action</th>
        </tr>
        <?php foreach($user->getUsers() as $row){
            $userName = $row["userName"];
            $userId = $row["userId"];
            ?>
            <tr>
                <td><?= $userName?></td>
                <td>
                    <a class="updateBtn" href="updateUser.php?id=<?= $userId ?>">Update</a>
                    <?php if($_SESSION["username"]=="admin"){?>
                        <a class="addBtn" href="replacePassword.php?id=<?= $userId ?>">Reset Password</a>
                    <?php }?>
                    <a class="deleteBtn" href="deleteUser.php?id=<?= $userId ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>