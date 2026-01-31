<?php

namespace App\Helpers;

class FileUploader
{
    private array $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    private int $maxSize = 10 * 1024 * 1024; // 10MB in bytes
    private string $uploadDir = '/var/www/html/public/uploads/posts/';

    public function upload(array $file): ?string
    {
        if (!isset($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
            throw new \Exception('The file could not be uploaded or an error occurred.');
        }

        if ($file['size'] > $this->maxSize) {
            throw new \Exception('File size should not exceed 10MB.');
        }

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mimeType, $this->allowedTypes)) {
            throw new \Exception('Only image files (JPG, PNG, GIF, WebP) are allowed.');
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid('post_', true) . '.' . $extension;

        $destination = $this->uploadDir . $filename;

        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            throw new \Exception('An error occurred while saving the file.');
        }

        return '/uploads/posts/' . $filename;
    }

    public function delete(string $url): bool
    {
        if (empty($url)) {
            return false;
        }

        $filename = basename($url);
        $filepath = $this->uploadDir . $filename;

        if (file_exists($filepath)) {
            return unlink($filepath);
        }

        return false;
    }
}
