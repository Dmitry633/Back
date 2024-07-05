<?php

declare(strict_types = 1);
include '../public/index.php';

// Your Code
function getTransactionFile(): array {
    $files = [];
    $files = array_diff(scandir(FILES_PATH), ['.','..']);
    return $files;

}
// echo FILES_PATH;
// print_r(scandir(FILES_PATH));
// print_r(array_diff(scandir(FILES_PATH), ['.','..']));
print_r (getTransactionFile());
echo (file_get_contents('../transaction_files/sample_1.csv'));