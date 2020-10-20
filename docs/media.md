# Media Upload

The PHP client library allows for uploading large files for use with APIs such as Drive or YouTube. There are three different methods available.

## Simple Upload

In the simple upload case, the data is passed as the body of the request made to the server. This limits the ability to specify metadata, but is very easy to use.

```php
$file = new Google\Service\Drive\DriveFile();
$result = $service->files->insert($file, array(
  'data' => file_get_contents("path/to/file"),
  'mimeType' => 'application/octet-stream',
  'uploadType' => 'media'
));
```

## Multipart File Upload

With multipart file uploads, the uploaded file is sent as one part of a multipart form post. This allows metadata about the file object to be sent as part of the post as well. This is triggered by specifying the _multipart_ uploadType.

```php
$file = new Google\Service\Drive\DriveFile();
$file->setTitle("Hello World!");
$result = $service->files->insert($file, array(
  'data' => file_get_contents("path/to/file"),
  'mimeType' => 'application/octet-stream',
  'uploadType' => 'multipart'
));
```

## Resumable File Upload

It is also possible to split the upload across multiple requests. This is convenient for larger files, and allows resumption of the upload if there is a problem. Resumable uploads can be sent with separate metadata.

```php
$file = new Google\Service\Drive\DriveFile();
$file->title = "Big File";
$chunkSizeBytes = 1 * 1024 * 1024;

// Call the API with the media upload, defer so it doesn't immediately return.
$client->setDefer(true);
$request = $service->files->insert($file);

// Create a media file upload to represent our upload process.
$media = new Google\Http\MediaFileUpload(
  $client,
  $request,
  'text/plain',
  null,
  true,
  $chunkSizeBytes
);
$media->setFileSize(filesize("path/to/file"));

// Upload the various chunks. $status will be false until the process is
// complete.
$status = false;
$handle = fopen("path/to/file", "rb");
while (!$status && !feof($handle)) {
  $chunk = fread($handle, $chunkSizeBytes);
  $status = $media->nextChunk($chunk);
 }

// The final value of $status will be the data from the API for the object
// that has been uploaded.
$result = false;
if($status != false) {
  $result = $status;
}

fclose($handle);
// Reset to the client to execute requests immediately in the future.
$client->setDefer(false);
```