<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
    
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];

    
        
        $uploadFileDir = './uploads/';
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }
        $destPath = $uploadFileDir . basename($fileName);

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            echo "File uploaded successfully.<br>";
            echo "File name: " . htmlspecialchars($fileName);
        } else {
            echo "There was an error moving the uploaded file.";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }
} else {
    
    echo '
    <form method="POST" action="" enctype="multipart/form-data">
        Select a file to upload: <input type="file" name="uploadedFile" required><br><br>
        <input type="submit" value="Upload">
    </form>';
}
?>
