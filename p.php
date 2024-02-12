<?php

if (isset($_POST["uploads"])) {
    $upfilepath = "emp/";
    if (!file_exists($upfilepath)) {
        mkdir($upfilepath);
    }
    $fileTemp = $_FILES["pdf"]["tmp_name"];
    $pdf = $_FILES["pdf"]["name"];
    $expdfp = explode('.', $pdf);
    $pdfexptype = $expdfp[1];
    $fileContect = file_get_contents($fileTemp);
    $fileUniqID = md5($fileContect);
    $filePath = "emp/" . $fileUniqID . "." . $pdfexptype;
    if (move_uploaded_file($fileTemp, $filePath)) {
        $pdf = $filePath;
        echo "path - " . $_SERVER['SERVER_NAME'] . "/" . $pdf . " - [" . $_SERVER['REQUEST_URI'] . "]";
    } else {
        echo "error to upload check your file";
    }
}

?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" id="input-file-now-custom-2" name="pdf" hidden class="dropify" data-height="500" />
    <button type="submit" name="uploads" class="btn btn-primary px-4" hidden>Upload</button>
</form>