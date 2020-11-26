
<?php

// hapus session
session_start();
// Hapus semua session
session_destroy();

// Redirect ke halaman index
$url = "index.php";
header('Location:' . $url);
exit();
