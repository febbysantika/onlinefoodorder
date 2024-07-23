<?php 
    include('../config/constants.php');


    if(isset($_GET['id']) && isset($_GET['image_name'])) 
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        if($image_name != "")
        {
            $path = "../images/food/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error'>Gagal Menghapus Berkas Gambar.</div>";

                header('location:'.SITEURL.'admin/manage-food.php');

                die();
            }

        }

        $sql = "DELETE FROM tbl_food WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Menu Berhasil Dihapus.</div>";\
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Gagal Menghapus Menu.</div>";\
            header('location:'.SITEURL.'admin/manage-food.php');
        }

        

    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error'>Akses tidak sah.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>