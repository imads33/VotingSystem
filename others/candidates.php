 <?php

    include('_dbconnect.php');

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $etype = $_POST['etype'];
        $pic = $_FILES['file'];

        $imageFilename = $pic['name'];
        $imageFileTemp = $pic['tmp_name'];
        $filenameSep = explode('.', $imageFilename);

        $fileExtensionSep = strtolower($filenameSep[1]);

        $extension = array('jpeg', 'jpg', 'png');
        if (in_array($fileExtensionSep, $extension)) {
            $upload_image = '../images/' . $imageFilename;
            move_uploaded_file($imageFileTemp, $upload_image);

            $sql = "INSERT INTO `candidates`(cname,cAge,cGender,eType,cPic)
            values('$name','$age','$gender','$etype','$upload_image')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("location:../admin/candidates.php");
            }
        }
        return $error;
    }
