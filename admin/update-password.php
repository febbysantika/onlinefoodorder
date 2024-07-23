<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Ganti Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Password saat ini: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Password Saat Ini">
                    </td>
                </tr>

                <tr>
                    <td>Password Baru:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="Password Baru">
                    </td>
                </tr>

                <tr>
                    <td>Konfirmasi Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Konfirmasi Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Ganti Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php 

            if(isset($_POST['submit']))
            {
                $id=$_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirm_password = md5($_POST['confirm_password']);

                $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        if($new_password==$confirm_password)
                        {
                            $sql2 = "UPDATE tbl_admin SET 
                                password='$new_password' 
                                WHERE id=$id
                            ";

                            $res2 = mysqli_query($conn, $sql2);

                            if($res2==true)
                            {
                                $_SESSION['change-pwd'] = "<div class='success'>Kata Sandi Berhasil Diubah. </div>";
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                            else
                            {
                                $_SESSION['change-pwd'] = "<div class='error'>Gagal Mengubah Kata Sandi. </div>";
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                        }
                        else
                        {
                            $_SESSION['pwd-not-match'] = "<div class='error'>Kata Sandi Tidak Menambal. </div>";
                            header('location:'.SITEURL.'admin/manage-admin.php');

                        }
                    }
                    else
                    {
                        $_SESSION['user-not-found'] = "<div class='error'>Pengguna Tidak Ditemukan. </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }

            }

?>


<?php include('partials/footer.php'); ?>