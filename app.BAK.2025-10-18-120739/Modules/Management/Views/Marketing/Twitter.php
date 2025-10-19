<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title title">Twitter Dashboard</h1>
                        <p id="private_key"></p>
                        <p id="address"></p>
                        <a href="<?php echo site_url('/Management'); ?>">Back to Management Dashboard</a>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <div class="col-12">
                        <form onsubmit="fetchTweets(); return false;">
                            <label for="hashtags">Enter Hashtags or Profiles:</label>
                            <input type="text" id="hashtags" name="hashtags" placeholder="#example, #hashtag">
                            <button type="submit">Fetch Tweets</button>
                        </form>

                        <h2>Recent Searches</h2>
                        <ul>
                            <?php foreach ($recentSearches as $search): ?>
                                <li><?= htmlspecialchars($search['hashtags']) ?> (<?= $search['searched_at'] ?>)</li>
                            <?php endforeach; ?>
                        </ul>

                        <h2>Fetched Tweets</h2>
                        <ul id="tweetList">
                            <?php foreach ($tweets as $tweet): ?>
                                <li>
                                    <p><strong>@<?= $tweet['author'] ?>:</strong> <?= $tweet['content'] ?></p>
                                    <p><a href="<?= $tweet['url'] ?>" target="_blank">View on Twitter</a></p>
                                    <form method="post" action="/Management/Marketing/GenerateContentFromTweet">
                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                        <input type="hidden" name="tweet_id" value="<?= $tweet['tweet_id'] ?>">
                                        <button type="submit">Generate Content</button>
                                    </form>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
    async function fetchTweets() {
        const hashtags = document.getElementById('hashtags').value;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const response = await fetch('/Management/Marketing/Twitter', {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json',
                "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
            },
            body: JSON.stringify({ hashtags })
        });

        const data = await response.json();
        const tweetList = document.getElementById('tweetList');
        tweetList.innerHTML = '';

        if (data.tweets && data.tweets.length) {
            data.tweets.forEach(tweet => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `
                    <p><strong>@${tweet.author}:</strong> ${tweet.content}</p>
                    <p><a href="${tweet.url}" target="_blank">View on Twitter</a></p>
                    <form method="post" action="/Management/Marketing/GenerateContentFromTweet">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <input type="hidden" name="tweet_id" value="${tweet.tweet_id}">
                        <button type="submit">Generate Content</button>
                    </form>
                `;
                tweetList.appendChild(listItem);
            });
        }
    }
</script>
