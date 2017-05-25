<?php session_start(); ?>
<?php
    $folder=$_SESSION["folder"];
    $targetfolder = "uploads/".$folder."/";
    $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
    $file_type=$_FILES['file']['type'];
    $servername = "localhost";
    $username = "root";
    $dbname = "webdev";

    $conn = new mysqli($servername, $username,'', $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username=$_SESSION["username"];
    $sql = "SELECT projectID FROM projects WHERE student1='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $projectID=$row["projectID"];
        }
    } else {
        echo "0 results";
    }
    $file=$_FILES['file']['name'];
    echo $projectID." ".$folder." ".$file." ".$username;
    $sql = "INSERT INTO `uploads`( `uploader`, `project`, `date_creation`, `folder`, `file`) VALUES ('$username','$projectID',CURRENT_DATE,'$folder','$file')";
    $conn->query($sql);
    $conn->close();
    if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)){
            echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
        }
        else {
            echo "Problem uploading file";
        }
    }
    else {
        echo "You may only upload PDFs, JPEGs or GIF files.<br>";
    }
?>