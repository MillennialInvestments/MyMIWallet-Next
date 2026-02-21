async function safeFetchJson(url) {
    const response = await fetch(url);

    if (!response.ok) {
        console.error('Fetch failed:', response.status);
        return null;
    }

    const contentType = response.headers.get('content-type') || '';

    if (!contentType.includes('application/json')) {
        console.error('Invalid JSON response');
        return null;
    }

    return response.json();
}
