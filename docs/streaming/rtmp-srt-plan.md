# MyMI Wallet Streaming Readiness & RTMP/SRT Integration Plan

## 1. Current Streaming-Adjacent Capabilities
### 1.1 Marketing automation already produces multi-channel video copy
- `MyMIMarketing` renders post variants for Facebook, LinkedIn, Discord, TikTok, and YouTube, plus supporting voice scripts and hashtags that can seed live stream descriptions or lower-thirds overlays.【F:app/Libraries/MyMIMarketing.php†L5023-L5077】
- The library includes helpers for Discord/Facebook/LinkedIn distribution, a Sora video stub, and Google Text-to-Speech voiceover generation—useful for packaging replays and highlight reels once a live broadcast ends.【F:app/Libraries/MyMIMarketing.php†L4326-L4719】【F:app/Libraries/MyMIMarketing.php†L5260-L5442】
- Buffer/marketing services already call into this library to enrich social posts, so any “We’re live” promo can reuse the existing keyword extraction and campaign tracking infrastructure.【F:app/Services/BufferSchedulerService.php†L1-L54】【F:app/Services/MarketingService.php†L1-L92】

### 1.2 Controllers and cron hooks for rapid distribution
- `MarketingController` exposes cron endpoints for content grouping, email ingestion, and enrichment—ideal for triggering “stream recap” or “go-live alert” workflows from CI4 without new routing conventions.【F:app/Modules/APIs/Controllers/MarketingController.php†L31-L136】【F:app/Modules/APIs/Controllers/MarketingController.php†L173-L214】
- `ManagementController::sendAllDiscordAlerts()` loops through enriched trade alerts and routes each one through the alert manager, providing a blueprint for firing Coffee & Stocks live notifications once the streaming pipeline publishes a new state.【F:app/Modules/APIs/Controllers/ManagementController.php†L1422-L1436】

### 1.3 Alerting & Discord orchestration
- `MyMIAlerts` and `MyMIDiscord` already format Discord payloads (ticker, sentiment, chart link) and push them through a queue with quiet-hour enforcement, so we can piggyback on the same dispatcher for “Live Now” embeds or Stage event reminders.【F:app/Libraries/MyMIAlerts.php†L1564-L1639】【F:app/Libraries/MyMIDiscord.php†L18-L94】
- `DiscordController` exposes enqueue/broadcast/processQueue endpoints protected by cron keys, allowing the streaming backend or marketing ops UI to drop templated announcements into Coffee & Stocks without duplicating webhook logic.【F:app/Modules/APIs/Controllers/DiscordController.php†L1-L66】【F:app/Modules/APIs/Controllers/DiscordController.php†L67-L118】

### 1.4 Existing brand guides emphasize video & community tie-ins
- The YouTube playbook already defines cadence, hooks, CTA overlays, analytics sync jobs, and references to modules that fuel video storylines; the same KPIs can be extended to track live session watch time or premiere conversions.【F:docs/marketing/15-youtube-guide.md†L1-L125】
- The Coffee & Stocks guide explicitly calls out Solana streams via Discord bots plus automated prompts, establishing a community expectation for real-time programming that a live broadcast can satisfy.【F:docs/marketing/09-discord-coffee-and-stocks.md†L2-L138】

### 1.5 Front-end and config touchpoints
- `app/Config/SocialMedia.php` centralizes all public channel URLs (Discord, Facebook, LinkedIn, TikTok, YouTube) and the promotional video ID, so exposing a “Live” destination or ingest key fits the existing configuration approach.【F:app/Config/SocialMedia.php†L1-L18】
- `ytPromoVideo.php` already embeds the configured promo YouTube video; swapping this partial into a dashboard tile with an HLS player or rotating between recorded/live states reuses that structure.【F:app/Views/themes/public/resources/ytPromoVideo.php†L1-L8】
- Current DreamHost nginx virtual host documentation confirms `/public` as the web root with PHP proxied on port 9071, so any local HLS segments should live outside that tree (e.g., `/home/mymiteam/mymistream`) with explicit `location` stanzas to avoid CodeIgniter intercepts.【F:docs/nginx/mymiwallet.md†L1-L44】

## 2. Gap Assessment
1. **No ingest or transcoding tier** – The app can promote content but lacks RTMP/SRT listeners, FFmpeg workers, or storage for live segments.
2. **No stream state machine** – There is no database field, API, or UI toggle indicating “on air,” so marketing automation cannot differentiate between live, scheduled, or archived events.
3. **Limited player experiences** – Views embed static YouTube videos; there is no HLS/DASH player nor governance around Coffee & Stocks voice/video rooms despite the documentation’s “Solana streams” expectations.【F:docs/marketing/09-discord-coffee-and-stocks.md†L33-L72】
4. **Missing cross-post automation** – Buffer + Marketing controllers publish evergreen posts but do not emit specialized live alerts (e.g., Twitch/YouTube Live webhooks, Discord Stage notifications, LinkedIn Live schedule updates).

## 3. Proposed NGINX RTMP/SRT Architecture
### 3.1 Components
| Layer | Responsibility |
| --- | --- |
| **OBS/Prism/IRL encoders** | Send primary feed via SRT (`srt://stream.mymiwallet.com:9000/live?streamid=MyMI-TV`) and fallback RTMP for tools that cannot speak SRT. |
| **User-space NGINX (rtmp module + SRT patch)** | Terminates RTMP and forwards SRT via `listen 9000 reuseport; srt_server on;`, writes chunks to a shared `/home/mymiteam/mymistream` volume. |
| **FFmpeg workers** | Transcode to multiple ladders (1080p3.5Mbps, 720p2Mbps, 480p1Mbps) and package into HLS + optional DASH; optionally push a copy to YouTube Live ingest for simulcasting. |
| **Static CDN origin** | Serve `/streams/<event>/index.m3u8` with nginx `location /streams/` using `add_header Cache-Control no-store;` so the CI4 front-end can embed low-latency playback. |
| **Control plane (CI4 module)** | Stores stream metadata, toggles go-live state, writes marketing tasks, drives Discord/YouTube/TikTok announcements, and ingests analytics webhooks. |

### 3.2 Pipeline
1. **Ingest** – Operators feed OBS → SRT or RTMP to the new `stream` listener. NGINX writes `.flv` fragments to `/tmp/streambuffer/<key>.flv` and exposes them to FFmpeg via `exec`. Both `rtmp {}` and `srt {}` blocks share the same `application live` definition for parity.
2. **Transcode & package** – Supervisord/systemd launches FFmpeg per input key to generate ABR HLS ladders plus thumbnails; finished segments land in `/home/mymiteam/mymistream/hls/<stream_key>/`.
3. **Distribution** – The existing nginx vhost mounts `/streams` read-only, enabling `https://www.mymiwallet.com/streams/<event>/index.m3u8`. For third-party simulcast, FFmpeg `-f flv rtmp://a.rtmp.youtube.com/live2/<key>` pushes the same feed to YouTube Live.
4. **State & notifications** – When FFmpeg process starts, a webhook posts to `/API/Streaming/events/heartbeat` updating a `bf_stream_events` table (`status: starting/live/offline`). `MyMIMarketing` listens for `live` transitions to auto-generate Discord + LinkedIn posts, while `MyMIAlerts` attaches the stream URL to high-priority alerts.

### 3.3 Security & Reliability
- Restrict ingest to signed SRT stream IDs or RTMP `on_publish` hooks validating against CI4-issued keys stored alongside user accounts.
- Store raw `.flv` in a short-lived buffer and rely on HLS for playback to keep `/public` stateless; nightly cron prunes archives or moves them to object storage.
- Reuse Discord quiet hours: when a stream is scheduled during quiet hours, automatically queue announcements but mark them as delayed until quiet hours lift.

## 4. Implementation Plan
### Phase 1 – Infrastructure (NGINX + FFmpeg)
1. Build a dedicated nginx user-space instance with the `nginx-rtmp-module` (or SRT module) and configure listeners separate from the main web vhost; reuse the deployment notes from `docs/nginx/mymiwallet.md` for system layout but mount `/home/mymiteam/mymistream` for HLS outputs.【F:docs/nginx/mymiwallet.md†L1-L44】
2. Author `/home/mymiteam/nginx/conf.d/streaming.conf` (see snippet below) with RTMP + SRT blocks, `exec` hooks to call FFmpeg, and `hls` directives pointing to the shared storage.
3. Provision systemd units (`ffmpeg@.service`) that watch for `on_publish` events and cleanly stop on `on_done` callbacks to avoid orphaned encoders.
4. Validate ingest via OBS (RTMP) and Larix Broadcaster (SRT), confirm `/streams/demo/index.m3u8` updates, and benchmark startup latency.

### Phase 2 – CI4 Streaming Module
1. Add tables `bf_stream_events`, `bf_stream_schedules`, `bf_stream_destinations` via migrations; include fields for ingest key, owner, schedule window, overlays, and destination toggles (YouTube simulcast, Discord Stage ID, etc.).
2. Create `App\Modules\Streaming\Controllers\EventsController` for CRUD plus `/API/Streaming/heartbeat` to update status when nginx hooks fire.
3. Extend `app/Config/SocialMedia.php` with `public string $live_page` and optionally per-platform ingest keys so the front-end view knows where to point live players.【F:app/Config/SocialMedia.php†L7-L17】
4. Add a dashboard widget (reuse `ytPromoVideo.php`) that swaps between YouTube embed and HLS `<video>` when `status === 'live'`, along with CTA buttons for Discord Coffee & Stocks rooms.【F:app/Views/themes/public/resources/ytPromoVideo.php†L1-L8】
5. Implement a `StreamingService` that publishes stream states to `MyMIMarketing` + `MyMIAlerts`. When a stream starts, call `MyMIDiscord::dispatch('stream.live', …)` and optionally `BufferSchedulerService::promoteScheduledPosts()` to reprioritize promo posts.【F:app/Services/BufferSchedulerService.php†L20-L54】【F:app/Libraries/MyMIDiscord.php†L18-L76】

### Phase 3 – Marketing & Community Automation
1. Update `MyMIMarketing::distributeContent()` to accept a `live_url` payload so Discord/LinkedIn/Facebook posts can include the embedded HLS link; extend the YouTube script generator to append “Live Now” CTAs.【F:app/Libraries/MyMIMarketing.php†L4326-L4712】【F:app/Libraries/MyMIMarketing.php†L5432-L5442】
2. Teach `MarketingController` to schedule `marketing:stream-countdown` cron jobs that hit Discord, email, and in-app prompts 30/10/5 minutes before air time, aligning with the YouTube analytics + premiere reminders in the existing video playbook.【F:app/Modules/APIs/Controllers/MarketingController.php†L58-L136】【F:docs/marketing/15-youtube-guide.md†L101-L125】
3. Extend `MyMIAlerts::sendDiscordNotification()` to optionally append a `stream_link` (if an event is live) so trade alerts double as watch-party prompts.【F:app/Libraries/MyMIAlerts.php†L1564-L1639】
4. Use the Coffee & Stocks automation checklist to trigger `/gold-upgrade` prompts after each live segment recap, reinforcing the community workflows described in the Discord guide.【F:docs/marketing/09-discord-coffee-and-stocks.md†L61-L138】

## 5. Reference Config & Snippets
### 5.1 nginx streaming block
```nginx
# /home/mymiteam/nginx/conf.d/streaming.conf
rtmp {
    server {
        listen 1935 reuseport;
        chunk_size 4096;

        application live {
            live on;
            record off;
            allow publish 127.0.0.1;
            allow publish 10.0.0.0/8;
            deny publish all;

            on_publish http://127.0.0.1:9071/index.php/API/Streaming/onPublish;
            on_done    http://127.0.0.1:9071/index.php/API/Streaming/onDone;

            hls on;
            hls_path /home/mymiteam/mymistream/hls;
            hls_fragment 4s;
            hls_playlist_length 24s;
            hls_variant _1080p bandwidth=3500000;
            hls_variant _720p  bandwidth=2000000;
            hls_variant _480p  bandwidth=1000000;

            exec ffmpeg -i rtmp://localhost/live/$name \
                -c:v libx264 -preset veryfast -g 48 -sc_threshold 0 \
                -map 0:v -map 0:a -c:a aac -b:a 128k \
                -f hls -hls_time 4 -hls_playlist_type event \
                -hls_segment_filename /home/mymiteam/mymistream/hls/$name/%03d.ts \
                /home/mymiteam/mymistream/hls/$name/index.m3u8;
        }
    }
}

srt_server {
    listen 0.0.0.0:9000;
    latency 120;
    pass rtmp://127.0.0.1/live;
}
```

### 5.2 CI4 heartbeat endpoint sketch
```php
public function onPublish()
{
    $key = $this->request->getGet('name');
    $stream = $this->streamModel->markStatus($key, 'live');
    if ($stream) {
        service('mymimarketing')->distributeContent('discord', sprintf('🔴 %s is live: %s', $stream['title'], $stream['live_url']));
        $this->alertManager->broadcastStreamState($stream);
    }
    return $this->respond(['ok' => true]);
}
```
This hook ties the RTMP server lifecycle back into existing marketing + alert services.

### 5.3 Dashboard embed toggle
```php
<?php if ($stream && $stream['status'] === 'live'): ?>
  <video controls autoplay playsinline poster="<?= esc($stream['poster_url']) ?>">
    <source src="/streams/<?= esc($stream['key']) ?>/index.m3u8" type="application/vnd.apple.mpegurl">
  </video>
<?php else: ?>
  <?= view('themes/public/resources/ytPromoVideo', ['socialMedia' => config('SocialMedia')]); ?>
<?php endif; ?>
```
Reusing the promo partial ensures a fallback video is always available when no live HLS feed exists.【F:app/Views/themes/public/resources/ytPromoVideo.php†L1-L8】

## 6. Success Criteria & Next Checks
1. Live ingest reaches nginx and produces HLS manifests within 5 seconds.
2. CI4 streaming module updates `status` within 2 seconds of `on_publish` and triggers Discord + marketing automation using existing libraries (see sections 1.1–1.3).
3. Coffee & Stocks and YouTube dashboards reflect live/scheduled states, keeping parity with the marketing goals in both playbooks.【F:docs/marketing/15-youtube-guide.md†L101-L125】【F:docs/marketing/09-discord-coffee-and-stocks.md†L61-L138】
4. All assets stay outside `/public` except the exposed `/streams` alias, preserving the main CodeIgniter routing contract documented in the nginx guide.【F:docs/nginx/mymiwallet.md†L1-L44】
