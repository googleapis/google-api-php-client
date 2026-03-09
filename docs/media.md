# Media Upload

The client library supports uploading large files to APIs that accept media. Three patterns are available:

- **Simple upload** — data as the request body (`uploadType=media`).
- **Multipart upload** — file plus metadata in one request (`uploadType=multipart`).
- **Resumable upload** — split across multiple requests; use `Appning\Http\MediaFileUpload` with `$client->setDefer(true)`, then stream chunks with `$media->nextChunk($chunk)`.

The resumable flow uses `Appning\Http\MediaFileUpload` with the client, the request object, content type, and chunk size. For Android Publisher, refer to the API documentation for endpoints that support file upload and the exact parameters they expect.
