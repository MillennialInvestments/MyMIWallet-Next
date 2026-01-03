# Management Docs Browser

The management Docs Browser exposes a lightweight UI for viewing Markdown content stored under `/docs`.

## Routes
- `GET /Management/Docs` — lists the root docs directory.
- `GET /Management/Docs/browse/{path}` — lists subfolders and Markdown files for the given relative path.
- `GET /Management/Docs/view/{path}` — renders a Markdown file to HTML. `.md` is implied in the URL.

## Security rules
- Paths are sanitized to strip traversal (`..`), absolute paths, and unsafe characters.
- Only files under `ROOTPATH/docs` are read, and only `.md` files are rendered.
- Parsedown is used in safe mode to avoid executing unsafe HTML.
- Invalid paths or missing files return a 404 response.

## Adding new docs
1. Create or edit Markdown files anywhere under the `/docs` directory (nested folders are supported).
2. Navigate to `/Management/Docs` to browse folders, or use `/Management/Docs/view/{relative-path}` to open a specific file (omit `.md` in the URL if you prefer).
3. Use breadcrumb links in the UI to move between folders and files quickly.
