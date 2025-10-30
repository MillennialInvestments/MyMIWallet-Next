export async function fetchJSON(url, opts = {}) {
  const response = await fetch(url, Object.assign({
    headers: { 'Accept': 'application/json' },
    credentials: 'same-origin'
  }, opts));

  const contentType = response.headers.get('content-type') || '';
  if (!contentType.includes('application/json')) {
    const text = await response.text();
    const snippet = text.slice(0, 250);
    const error = new Error(`Non-JSON response (${response.status}) from ${url}: ${snippet}`);
    error.status = response.status;
    error.body = snippet;
    throw error;
  }

  const json = await response.json();
  if (!response.ok || (json && json.status === 'error')) {
    const error = new Error((json && json.message) || `Request failed (${response.status}) for ${url}`);
    error.status = response.status;
    error.payload = json;
    throw error;
  }

  return json.data ?? json;
}