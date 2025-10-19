<form id="mymiblogger-form">
    <?= csrf_field() ?>
    <div class="mb-2">
        <label>Campaign Name</label>
        <input type="text" name="campaign[name]" class="form-control" />
    </div>
    <div class="mb-2">
        <label>Goal</label>
        <select name="campaign[goal]" class="form-control">
            <option value="acquisition">acquisition</option>
            <option value="activation">activation</option>
            <option value="retention">retention</option>
            <option value="announcement">announcement</option>
            <option value="seo">seo</option>
        </select>
    </div>
    <div class="mb-2">
        <label>Audience</label>
        <input type="text" name="campaign[audience]" class="form-control" />
    </div>
    <div class="mb-2">
        <label>Tone</label>
        <input type="text" name="campaign[tone]" class="form-control" />
    </div>
    <div class="mb-2">
        <label>Channels</label><br>
        <label><input type="checkbox" name="campaign[channels][]" value="blog" /> Blog</label>
        <label><input type="checkbox" name="campaign[channels][]" value="email" /> Email</label>
        <label><input type="checkbox" name="campaign[channels][]" value="x" /> X</label>
        <label><input type="checkbox" name="campaign[channels][]" value="linkedin" /> LinkedIn</label>
    </div>
    <div class="mb-2">
        <label>Length</label>
        <select name="campaign[length]" class="form-control">
            <option value="short">short</option>
            <option value="standard" selected>standard</option>
            <option value="long">long</option>
        </select>
    </div>
    <div class="mb-2">
        <label>Keywords (comma separated)</label>
        <input type="text" name="campaign[keywords]" class="form-control" />
    </div>
    <div class="mb-2">
        <label>CTA URL</label>
        <input type="url" name="campaign[assets][cta_url]" class="form-control" />
    </div>
    <button type="submit" class="btn btn-primary">Generate</button>
</form>