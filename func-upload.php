<?php
/**
 * This is just an example of how a file could be processed from the
 * upload script. It should be tailored to your own requirements.
 */

// Only accept files with these extensions
$whitelist = array('jpg', 'jpeg', 'png', 'gif');
$name      = null;
$error     = '上传失败';
$path      = 'jpg/';

if (isset($_FILES)) {
    if (isset($_FILES['file'])) {
        $tmp_name = $_FILES['file']['tmp_name'];
        $name = basename($_FILES['file']['name']);
        $error = $_FILES['file']['error'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $name = $path . time() . '.' . $extension;

        if ($error === UPLOAD_ERR_OK) {
            if (!in_array($extension, $whitelist)) {
                $error = '上传文件格式错误';
            } else {
                move_uploaded_file( $tmp_name, $name );
            }
        }
    }
}

echo json_encode(array(
    'name'  => $name,
    'error' => $error,
));
die();
