# Phase 02B — Authoritative MyMI Alert DB Table Inventory

Generated UTC: 2026-06-09T08:21:05Z
Branch: main
Commit: a271c0ae0 Register TBI CoinVault smoke command (#518)

## Objective

Verify whether Phase 02 missing-table results are real schema gaps or CI4 table prefix/name mismatches.

## Code Change Policy

```text
No production code changes are made by this command.
Known audit/runtime noise is restored only.
```

## Git Status

```text
?? docs/01_Systematic_Standup/
?? docs/_aiops/mymi_alerts/
```

## CI4 DB Inventory

```json
This "system/bootstrap.php" is no longer used. If you are seeing this error message,
the upgrade is not complete. Please refer to the upgrade guide and complete the upgrade.
See https://codeigniter4.github.io/userguide/installation/upgrade_450.html
```

## CI4 DB Inventory Errors

```text
```

## Model Table References

```text
app/Models/Fin/TradeModel.php:8:    protected $table = 'bf_fin_trades';
app/Models/Marketing/AudienceModel.php:10:    protected $table = 'bf_audience';
app/Models/Marketing/EmailOpenTrackingModel.php:10:    protected $table = 'bf_email_open_tracking';
app/Models/Marketing/EmailMarketingModel.php:10:    protected $table = 'bf_marketing_campaigns';
app/Models/Marketing/EmailQueueModel.php:10:    protected $table = 'bf_marketing_email_queue';
app/Models/Marketing/EmailTemplateModel.php:10:    protected $table = 'bf_marketing_email_templates';
app/Models/Marketing/MarketingPublishQueueModel.php:11:    protected $table = 'bf_marketing_publish_queue';
app/Models/Marketing/MarketingVideoAssetModel.php:11:    protected $table = 'bf_marketing_video_assets';
app/Models/Marketing/MarketingVideoContentModel.php:11:    protected $table = 'bf_marketing_video_content';
app/Models/Marketing/MarketingVideoTemplateModel.php:11:    protected $table = 'bf_marketing_video_templates';
app/Models/Marketing/MarketingVideoVersionModel.php:11:    protected $table = 'bf_marketing_video_versions';
app/Models/Predictions/TradesModel.php:7:    protected $table         = 'bf_predictions_trades';
app/Models/AccountsModel.php:135:        return $this->db->table('bf_users_trades')
app/Models/AccountsModel.php:144:        return $this->db->table('bf_users_trades')
app/Models/AccountsModel.php:172:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AccountsModel.php:181:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AccountsModel.php:189:        return $this->db->table('bf_users_trades')
app/Models/AccountsModel.php:197:        return $this->db->table('bf_users_trades')
app/Models/AccountsModel.php:424:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/AccountsModel.php:433:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/AccountsModel.php:442:        $builder = $this->db->table('bf_investment_stock_listing');
app/Models/AccountsModel.php:535:        $builder = $this->db->table('bf_investment_stock_listing');
app/Models/AccountsModel.php:542:        $builder = $this->db->table('bf_investment_stock_listing');
app/Models/SignalFilesModel.php:9:    protected $table         = 'bf_investment_signal_files';
app/Models/AnalyticalModel.php:130:        $activeCampaignsQuery = $this->db->table('bf_marketing_campaigns')
app/Models/AnalyticalModel.php:145:        $activeCampaignsQuery = $this->db->table('bf_marketing_campaigns')
app/Models/AnalyticalModel.php:498:        $totalTradesTrackedQuery = $this->db->table('bf_users_trades')
app/Models/AnalyticalModel.php:513:        return $this->db->table('bf_users_trades')
app/Models/AnalyticalModel.php:579:        $builder = $this->db->table('bf_marketing_scraper')
app/Models/AssetsModel.php:127:        return $this->db->table('bf_users_trades')
app/Models/AssetsModel.php:163:        return $this->db->table('bf_users_trades')
app/Models/CampaignModel.php:9:    protected $table = 'bf_marketing_campaigns';
app/Models/CampaignModel.php:71:        return $this->db->table('bf_marketing_campaigns')
app/Models/CampaignModel.php:126:        $sent = $this->db->table('bf_marketing_email_queue')
app/Models/CampaignModel.php:131:        $opened = $this->db->table('bf_marketing_email_open_tracking')
app/Models/CampaignModel.php:135:        $bounced = $this->db->table('bf_marketing_email_queue')
app/Models/CampaignModel.php:148:        $sent = $this->db->table('bf_marketing_email_queue')
app/Models/CampaignModel.php:152:        $opened = $this->db->table('bf_marketing_email_open_tracking')
app/Models/CampaignModel.php:156:        $bounced = $this->db->table('bf_marketing_email_queue')
app/Models/DashboardModel.php:104:        return $this->db->table('bf_investment_calendar')
app/Models/DiscordModel.php:14:        return $this->db->table('bf_discord_subscriptions')
app/Models/DiscordModel.php:21:        $row = $this->db->table('bf_discord_templates')->where('template_key',$templateKey)->get()->getRowArray();
app/Models/DiscordModel.php:27:        $row = $this->db->table('bf_discord_channels')->where('channel_key',$channelKey)->get()->getRowArray();
app/Models/DiscordModel.php:36:        $builder = $this->db->table('bf_discord_queue');
app/Models/DiscordModel.php:53:        return $this->db->table('bf_discord_queue')
app/Models/DiscordModel.php:65:        $this->db->table('bf_discord_queue')->where('id',$id)->update([
app/Models/DiscordModel.php:72:        $this->db->table('bf_discord_queue')->where('id',$id)->update([
app/Models/DiscordModel.php:79:        $this->db->table('bf_discord_queue')->where('id',$id)->update([
app/Models/DiscordModel.php:87:        $builder = $this->db->table('bf_discord_subscriptions')->where([
app/Models/DiscordModel.php:102:        $exists = $this->db->table('bf_discord_message_history')->where('dedupe_hash',$dedupe)->countAllResults();
app/Models/DiscordModel.php:110:        $fuzzy = $this->db->table('bf_discord_message_history')
app/Models/DiscordModel.php:120:        $this->db->table('bf_discord_queue')->where('id',$id)->update([
app/Models/DiscordModel.php:124:        $row = $this->db->table('bf_discord_queue')->where('id',$id)->get()->getRowArray();
app/Models/DiscordModel.php:127:        $this->db->table('bf_discord_message_history')->insert([
app/Models/DiscordModel.php:138:        $this->db->table('bf_discord_channels')->where('channel_key',$channelKey)->update([
app/Models/DiscordModel.php:145:        $row = $this->db->table('bf_discord_queue')->where('id',$id)->get()->getRowArray();
app/Models/DiscordModel.php:150:        $this->db->table('bf_discord_queue')->where('id',$id)->update([
app/Models/DiscordModel.php:159:        $this->db->table('bf_discord_channels')->where('channel_key',$channelKey)->update([
app/Models/DiscordModel.php:169:        $this->db->table('bf_discord_message_history')->insert([
app/Models/DiscordModel.php:189:        return $this->db->table('bf_discord_channels')->orderBy('channel_key','ASC')->limit(20)->get()->getResultArray();
app/Models/DiscordModel.php:194:        return $this->db->table('bf_discord_templates')->orderBy('template_key','ASC')->limit(20)->get()->getResultArray();
app/Models/DiscordModel.php:199:        return $this->db->table('bf_discord_subscriptions s')
app/Models/DiscordModel.php:226:            return (bool) $this->db->table('bf_discord_channels')->where('id',$id)->update($payload);
app/Models/DiscordModel.php:230:        return (bool) $this->db->table('bf_discord_channels')->insert($payload);
app/Models/DiscordModel.php:235:        return (bool) $this->db->table('bf_discord_channels')->where('id',$id)->delete();
app/Models/DiscordModel.php:252:            return (bool) $this->db->table('bf_discord_templates')->where('id',$id)->update($payload);
app/Models/DiscordModel.php:256:        return (bool) $this->db->table('bf_discord_templates')->insert($payload);
app/Models/DiscordModel.php:261:        return (bool) $this->db->table('bf_discord_templates')->where('id',$id)->delete();
app/Models/DiscordModel.php:291:            return (bool) $this->db->table('bf_discord_subscriptions')->where('id',$id)->update($payload);
app/Models/DiscordModel.php:295:        return (bool) $this->db->table('bf_discord_subscriptions')->insert($payload);
app/Models/DiscordModel.php:300:        return $this->db->table('bf_discord_policies')->orderBy('created_at','DESC')->limit(20)->get()->getResultArray();
app/Models/DiscordModel.php:329:            return (bool) $this->db->table('bf_discord_policies')->where('id',$id)->update($payload);
app/Models/DiscordModel.php:333:        return (bool) $this->db->table('bf_discord_policies')->insert($payload);
app/Models/DiscordModel.php:338:        return (bool) $this->db->table('bf_discord_policies')->where('id',$id)->delete();
app/Models/DiscordModel.php:343:        return (bool) $this->db->table('bf_discord_subscriptions')->where('id',$id)->delete();
app/Models/DiscordModel.php:348:        $rows = $this->db->table('bf_discord_logs')
app/Models/DiscordModel.php:380:        $queued = $this->db->table('bf_discord_queue')->where('status','queued')->countAllResults();
app/Models/DiscordModel.php:381:        $failed = $this->db->table('bf_discord_queue')->where('status','failed')->where('created_at >=', $start24)->countAllResults();
app/Models/DiscordModel.php:382:        $dead   = $this->db->table('bf_discord_queue')->where('status','dead')->where('created_at >=', $start7)->countAllResults();
app/Models/DiscordModel.php:384:        $channels = $this->db->table('bf_discord_channels')
app/Models/DiscordModel.php:416:            $this->db->table('bf_discord_events_log')->insert([
app/Models/DiscordModel.php:429:            $this->db->table('bf_discord_logs')->insert([
app/Models/DiscordModel.php:440:            $this->db->table('bf_error_logs')->insert([
app/Models/EmailModel.php:30:        return $this->db->table('bf_marketing_email_queue')
app/Models/EmailModel.php:46:        $this->db->table('bf_marketing_campaigns')->insert($campaign);
app/Models/EmailModel.php:53:        return $this->db->table('bf_marketing_campaigns')->insert($data);
app/Models/EmailModel.php:89:        return $this->db->table('bf_marketing_campaigns')
app/Models/EmailModel.php:98:        return $this->db->table('bf_marketing_campaigns')
app/Models/EmailModel.php:106:        $sent = $this->db->table('bf_marketing_email_queue')
app/Models/EmailModel.php:111:        $opened = $this->db->table('bf_marketing_email_open_tracking')
app/Models/EmailModel.php:115:        $bounced = $this->db->table('bf_marketing_email_queue')
app/Models/EmailModel.php:126:        $pending = $this->db->table('bf_marketing_email_queue')
app/Models/EmailModel.php:130:        $sent = $this->db->table('bf_marketing_email_queue')
app/Models/EmailModel.php:134:        $opened = $this->db->table('bf_marketing_email_open_tracking')
app/Models/EmailModel.php:141:        $bounced = $this->db->table('bf_marketing_email_queue')
app/Models/EmailModel.php:192:        return $this->db->table('bf_marketing_email_queue')
app/Models/EmailModel.php:202:        return $this->db->table('bf_marketing_email_queue')
app/Models/EmailModel.php:210:        $builder = $this->db->table('bf_marketing_email_queue');
app/Models/EmailModel.php:228:        $builder = $this->db->table('bf_marketing_email_queue');
app/Models/EmailModel.php:251:        return $this->db->table('bf_marketing_email_queue')
app/Models/EmailModel.php:268:        return $this->db->table('bf_marketing_email_queue')->insert($data);
app/Models/EmailModel.php:273:        $this->db->table('bf_marketing_email_queue')->insert([
app/Models/EmailModel.php:295:        return $this->db->table('bf_marketing_campaigns')
app/Models/AlertsModel.php:16:    protected $table       = 'bf_investment_trade_alerts';
app/Models/AlertsModel.php:79:        return $this->db->table('bf_investment_chart_analysis')->insert($data);
app/Models/AlertsModel.php:84:        return $this->db->table('bf_investment_stock_listing')->insert($data);
app/Models/AlertsModel.php:89:        $result = $this->db->table('bf_investment_trade_alerts')->insert($data);
app/Models/AlertsModel.php:111:                $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->update($tickerUpdate);
app/Models/AlertsModel.php:127:                $alertsUpdated = $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->update($alertsUpdate);
app/Models/AlertsModel.php:143:                $historyUpdated = $this->db->table('bf_investment_alert_history')->where('ticker', $symbol)->update($historyUpdate);
app/Models/AlertsModel.php:180:        return $this->db->table('bf_marketing_temp_scraper')->select('id')->where('email_hash', $hash)->limit(1)->get()->getRow();
app/Models/AlertsModel.php:186:        $result = $this->db->table('bf_investment_trade_alerts')->where('id', $id)->update($data);
app/Models/AlertsModel.php:203:        $result = $this->db->table('bf_investment_trade_alerts')->where('id', $id)->delete();
app/Models/AlertsModel.php:220:        $builder = $db->table('bf_investment_tickers');
app/Models/AlertsModel.php:224:            log_message('info', "ensureTickerExists: {$symbol} already exists in bf_investment_tickers.");
app/Models/AlertsModel.php:273:        return (bool) $this->db->table('bf_investment_tickers')->select('symbol')->where('symbol', strtoupper($symbol))->get()->getRow();
app/Models/AlertsModel.php:411:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:450:        $activeTickers = $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:486:                $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:513:                $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:530:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:540:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:550:        return $this->db->table('bf_investment_trade_alerts')->where('id', $id)->get()->getRowArray();
app/Models/AlertsModel.php:555:        $builder = $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->countAllResults();
app/Models/AlertsModel.php:561:        $builder = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:570:        $builder = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:580:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:590:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:591:            ->select('bf_investment_trade_alerts.*, bf_investment_tickers.exchange')
app/Models/AlertsModel.php:592:            ->join('bf_investment_tickers', 'bf_investment_tickers.symbol = bf_investment_trade_alerts.ticker', 'left')
app/Models/AlertsModel.php:593:            ->where('bf_investment_trade_alerts.ticker', $symbol)
app/Models/AlertsModel.php:594:            ->orderBy('bf_investment_trade_alerts.created_on', 'DESC')
app/Models/AlertsModel.php:601:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:611:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:621:        $builder = $this->db->table('bf_investment_alert_history');
app/Models/AlertsModel.php:638:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:648:        return $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->limit(20)->get();
app/Models/AlertsModel.php:653:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/AlertsModel.php:655:        $hasTv = $this->hasColumn('bf_investment_trade_alerts', 'tv_symbol');
app/Models/AlertsModel.php:697:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:707:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:716:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:742:        $builder = $this->db->table('bf_users_comments')
app/Models/AlertsModel.php:753:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:967:        return $this->db->table('bf_investment_alert_enrichment')
app/Models/AlertsModel.php:976:        return $this->db->table('bf_investment_filings')->where('symbol', $symbol)->limit(20)->get()->getResultArray();
app/Models/AlertsModel.php:996:            $tableName = 'bf_investment_trade_alerts';
app/Models/AlertsModel.php:1001:            $base = $this->db->table($tableName . ' a');
app/Models/AlertsModel.php:1145:            $totalBase = $this->db->table($tableName . ' a');
app/Models/AlertsModel.php:1186:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1196:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1210:        $builder = $this->db->table('bf_investment_alert_history')->where('send_alert', 1);
app/Models/AlertsModel.php:1231:        return $this->db->table('bf_investment_filings')->whereIn('symbol', $tickers)->limit(20)->get()->getResultArray();
app/Models/AlertsModel.php:1236:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1245:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1254:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1265:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:1282:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:1292:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1302:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1312:        return $this->db->table('bf_management_alerts')
app/Models/AlertsModel.php:1328:        $builder = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1385:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1408:            if ($this->hasColumn('bf_investment_scraper', $column)) {
app/Models/AlertsModel.php:1413:        $builder = $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1417:        if (! empty($sourceFilter) && $this->hasColumn('bf_investment_scraper', 'source')) {
app/Models/AlertsModel.php:1429:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1441:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1453:            return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1460:            return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1471:        return $this->db->table('bf_investment_trade_alert_changes')
app/Models/AlertsModel.php:1481:        $builder = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1492:        $watchlist = $this->db->table('bf_users_watchlist')
app/Models/AlertsModel.php:1503:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1515:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1532:        return $this->db->table('bf_management_alerts')
app/Models/AlertsModel.php:1542:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1552:        return $this->db->table('users')
app/Models/AlertsModel.php:1562:        return $this->db->table('bf_investment_technical_snapshots')
app/Models/AlertsModel.php:1572:        return $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRow();
app/Models/AlertsModel.php:1586:        $row = $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRowArray();
app/Models/AlertsModel.php:1596:        $row = $this->db->table('bf_investment_tickers')->where('symbol', strtoupper($symbol))->get()->getRowArray();
app/Models/AlertsModel.php:1613:        return $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRow();
app/Models/AlertsModel.php:1618:        return $this->db->table('users')
app/Models/AlertsModel.php:1628:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1638:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1649:        return $this->db->table('bf_investment_trade_alerts')->where('alert_created', 1)->limit(20)->get()->getResultArray();
app/Models/AlertsModel.php:1654:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1664:        return $this->db->table('bf_users_credit_accounts')->where('user_id', $userId)->where('status', 1)->get()->getResultArray();
app/Models/AlertsModel.php:1669:        return $this->db->table('bf_investment_trade_alerts')->where('id', $tradeID)->get()->getRowArray();
app/Models/AlertsModel.php:1674:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:1690:            FROM bf_investment_alert_history h
app/Models/AlertsModel.php:1692:                SELECT DISTINCT ticker FROM bf_investment_alert_history
app/Models/AlertsModel.php:1705:            $first = $this->db->table('bf_investment_alert_history')->select('price')->where('ticker', $r['ticker'])->where('alerted_on', $r['first_date'])->get()->getRowArray();
app/Models/AlertsModel.php:1706:            $last  = $this->db->table('bf_investment_alert_history')->select('price')->where('ticker', $r['ticker'])->where('alerted_on', $r['last_date'])->get()->getRowArray();
app/Models/AlertsModel.php:1725:        $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1760:        $this->db->table('bf_investment_alert_history')->insert($snapshot);
app/Models/AlertsModel.php:1767:        $table  = $this->db->table('bf_investment_filings');
app/Models/AlertsModel.php:1777:        return $this->db->table('bf_investment_fundamentals')->insert($data);
app/Models/AlertsModel.php:1789:        $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->update($tickerUpdate);
app/Models/AlertsModel.php:1805:        $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->where('status', 'Opened')->update($alertsUpdate);
app/Models/AlertsModel.php:1821:        $this->db->table('bf_investment_alert_history')->where('ticker', $symbol)->where('status', 'Opened')->update($historyUpdate);
app/Models/AlertsModel.php:1843:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1855:        $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1863:        $existingTicker = $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRow();
app/Models/AlertsModel.php:1875:        return $this->db->table('bf_investment_tickers')->insert($data);
app/Models/AlertsModel.php:1888:        $existingAlert = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1895:            $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1909:            $result = $this->db->table('bf_investment_trade_alerts')->insert($tradeData);
app/Models/AlertsModel.php:1929:        if (! $this->hasColumn('bf_investment_scraper', 'email_identifier')) {
app/Models/AlertsModel.php:1930:            log_message('warning', 'Email identifier column missing from bf_investment_scraper; duplicate fallback will rely on message_hash.');
app/Models/AlertsModel.php:1934:        $exists = $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1950:        if (! $this->hasColumn('bf_investment_scraper', 'email_identifier')) {
app/Models/AlertsModel.php:1954:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1962:        if (! $this->hasColumn('bf_investment_scraper', 'message_hash') || ! $this->hasColumn('bf_investment_scraper', 'source')) {
app/Models/AlertsModel.php:1966:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1975:        return (bool) $this->db->table('bf_investment_scraper')->insert($data);
app/Models/AlertsModel.php:1988:        return (bool) $this->db->table('bf_investment_scraper')->insert($safeData);
app/Models/AlertsModel.php:2022:        $table = 'bf_investment_scraper';
app/Models/AlertsModel.php:2043:        $row = $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:2070:            $this->db->table('bf_investment_trade_alert_changes')->insert($changeData);
app/Models/AlertsModel.php:2072:            $this->db->table('bf_investment_trade_alert_changes')->insert($changeData);
app/Models/AlertsModel.php:2078:        return $this->db->table('bf_investment_trade_alert_changes')->insert([
app/Models/AlertsModel.php:2091:        return $this->db->table('bf_investment_scraper')->where('id', $id)->update(['status' => 'Processed']);
app/Models/AlertsModel.php:2096:        return $this->db->table('bf_investment_trade_alerts')->where('id', $alertId)->update(['notification_sent' => 1]);
app/Models/AlertsModel.php:2101:        $existing = $this->db->table('bf_investment_scraper')->where('id', $id)->get()->getRow();
app/Models/AlertsModel.php:2107:        return $this->db->table('bf_investment_scraper')->where('id', $id)->update(['status' => 'Processed']);
app/Models/AlertsModel.php:2159:        $existingAlert = $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->get()->getRowArray();
app/Models/AlertsModel.php:2162:            $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2171:            $this->db->table('bf_investment_trade_alerts')->insert([
app/Models/AlertsModel.php:2181:        $this->db->table('bf_investment_alert_history')->insert([
app/Models/AlertsModel.php:2271:        $builder     = $this->db->table('bf_investment_scraper');
app/Models/AlertsModel.php:2285:                    $alertsBuilder = $this->db->table('bf_investment_trade_alerts');
app/Models/AlertsModel.php:2309:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2336:            $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2361:        $this->db->table('bf_investment_trade_alerts')->insert($insert);
app/Models/AlertsModel.php:2409:        if ($this->hasColumn('bf_investment_alert_history', 'status') && isset($snapshot['status'])) {
app/Models/AlertsModel.php:2413:        if ($this->hasColumn('bf_investment_alert_history', 'category') && isset($snapshot['category'])) {
app/Models/AlertsModel.php:2417:        if ($this->hasColumn('bf_investment_alert_history', 'occurrences') && isset($snapshot['occurrences'])) {
app/Models/AlertsModel.php:2421:        if ($this->hasColumn('bf_investment_alert_history', 'email_identifier') && isset($snapshot['email_identifier'])) {
app/Models/AlertsModel.php:2425:        if ($this->hasColumn('bf_investment_alert_history', 'trade_alert_id') && isset($snapshot['trade_alert_id'])) {
app/Models/AlertsModel.php:2429:        if ($this->hasColumn('bf_investment_alert_history', 'execution_id') && isset($snapshot['execution_id'])) {
app/Models/AlertsModel.php:2433:        if ($this->hasColumn('bf_investment_alert_history', 'created_on')) {
app/Models/AlertsModel.php:2438:            $this->db->table('bf_investment_alert_history')->insert($data);
app/Models/AlertsModel.php:2489:        $record = $this->db->table('bf_investment_scraper')->where('id', $recordId)->get()->getRowArray();
app/Models/AlertsModel.php:2731:            $existing = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2746:            $this->db->table('bf_investment_trade_alerts')->insert($payload);
app/Models/AlertsModel.php:2803:        return (bool) $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2811:        $pendingAlerts = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2829:                    $this->db->table('bf_investment_trade_alerts')->where('id', $alert['id'])->update([
app/Models/AlertsModel.php:2865:            $inserted = $this->db->table('bf_investment_scraper')->insert($emailData);
app/Models/AlertsModel.php:2879:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:2893:        return (bool) $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:2903:        return $this->db->table('bf_investment_alert_enrichment')->insert($data);
app/Models/AlertsModel.php:2908:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:2939:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/AlertsModel.php:2955:            $this->db->table('bf_investment_trade_alerts')->where('id', $existing['id'])->update($data);
app/Models/AlertsModel.php:2961:            $this->db->table('bf_investment_trade_alerts')->insert($data);
app/Models/AlertsModel.php:2965:        $alert = $this->db->table('bf_investment_trade_alerts')->where('id', $alertId)->get()->getRowArray();
app/Models/AlertsModel.php:2975:        $this->db->table('bf_investment_alert_history')->insert($hist);
app/Models/AlertsModel.php:2982:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2990:        $table = 'bf_investment_tickers_nw';
app/Models/AlertsModel.php:2991:        $builder = $db->table($table);
app/Models/AlertsModel.php:3051:        $table = 'bf_investment_tickers_nw';
app/Models/AlertsModel.php:3056:        $rows = $this->db->table($table)
app/Models/AlertsModel.php:3068:        $existing = $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:3074:            return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:3080:            return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:3096:            $result = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3117:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3125:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3143:        // ✅ Update bf_investment_alert_history
app/Models/AlertsModel.php:3144:        $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:3148:        // ✅ Update bf_investment_tickers
app/Models/AlertsModel.php:3149:        $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3153:        // ✅ Update bf_investment_trade_alerts
app/Models/AlertsModel.php:3154:        $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3181:        $tickers = $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3190:                $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3217:        $existingTicker = $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3228:        return $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3236:        $ticker = $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3267:            $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:3281:        $builder = $this->db->table('bf_investment_trade_alerts')->where('id', $id);
app/Models/AlertsModel.php:3319:        $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3331:        $existingAlert = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3342:        $updateStatus = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3357:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3428:            $result = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3459:        $builder = $this->db->table('bf_investment_alert_history');
app/Models/AlertsModel.php:3471:        $result = $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:3486:        $exists = $this->db->table('bf_investment_filings')
app/Models/AlertsModel.php:3491:            $this->db->table('bf_investment_filings')->insert($filing);
app/Models/AlertsModel.php:3522:        $existingMessage = $this->db->table('bf_investment_alert_history')->where('symbol', $tradeAlert['ticker']) // If `symbol` is the correct column
app/Models/AlertsModel.php:3527:            $this->db->table('bf_investment_alert_history')->insert([
app/Models/AlertsModel.php:3544:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:3747:    //     $builder = $this->db->table('bf_investment_scraper');
app/Models/AlertsModel.php:3757:    //                 $alertsBuilder = $this->db->table('bf_investment_trade_alerts');
app/Models/AlertsModel.php:3784:    // //     // Query builder to read the bf_investment_scraper data
app/Models/AlertsModel.php:3785:    // //     $builder = $this->db->table('bf_investment_scraper');
app/Models/AlertsModel.php:3820:    // //                 $alertsBuilder = $this->db->table('bf_investment_trade_alerts');
app/Models/AlertsModel.php:3855:            ->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:3875:            ->table('bf_investment_trade_alerts')
app/Models/MarketingModel.php:11:    protected $table = 'bf_marketing_scraper';
app/Models/MarketingModel.php:46:        $builder = $this->db->table('bf_marketing_generated_content');
app/Models/MarketingModel.php:93:        if ($this->db->table('bf_marketing_campaigns')->insert($dbData)) {
app/Models/MarketingModel.php:105:        $this->db->table('bf_marketing_schedule')->insert($data);
app/Models/MarketingModel.php:111:        if ($this->db->table('bf_users_subscribers')->insert($subscriberData)) {
app/Models/MarketingModel.php:148:        return $this->db->table('bf_marketing_content_enrichment_cache')->replace($data);
app/Models/MarketingModel.php:154:            ->table('bf_marketing_content_enrichment_cache')
app/Models/MarketingModel.php:202:        return $this->db->table('bf_marketing_blog_posts')->countAllResults();
app/Models/MarketingModel.php:214:        $existing = $this->db->table('bf_marketing_blog_posts')->where('slug', $slug)->countAllResults();
app/Models/MarketingModel.php:232:        return $this->db->table('bf_marketing_schedule')->where('id', $id)->delete();
app/Models/MarketingModel.php:282:        $builder = $this->db->table('bf_marketing_buffer')
app/Models/MarketingModel.php:289:        $total = $this->db->table('bf_marketing_buffer')
app/Models/MarketingModel.php:312:        $builder = $this->db->table('bf_marketing_buffer')->where('status !=', 'promoted');
app/Models/MarketingModel.php:352:        $this->db->table('bf_marketing_generated_content')->insert($data);
app/Models/MarketingModel.php:358:        return (bool) $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:365:        $this->db->table('bf_marketing_story_updates')->insert($data);
app/Models/MarketingModel.php:371:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:381:        return $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:396:        return (bool) $this->db->table($sourceTable)
app/Models/MarketingModel.php:411:        return (bool) $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:422:        return $this->db->table('bf_marketing_buffer')
app/Models/MarketingModel.php:431:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:442:        return $this->db->table('bf_marketing_buffer')->where('id', $id)->get()->getRowArray();
app/Models/MarketingModel.php:447:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:455:        return $this->db->table('bf_marketing_buffer')->where('id', $id)->get()->getRowArray();
app/Models/MarketingModel.php:460:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:471:        $builder = $this->db->table('bf_marketing_campaigns');
app/Models/MarketingModel.php:486:        $builder = $this->db->table('bf_email_drip_campaigns');
app/Models/MarketingModel.php:501:        $builder = $this->db->table('bf_email_drip_campaigns');
app/Models/MarketingModel.php:515:        $builder = $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:532:        $builder = $this->db->table('bf_email_drip_campaigns');
app/Models/MarketingModel.php:547:        $builder = $this->db->table('bf_email_drip_campaign_steps');
app/Models/MarketingModel.php:561:        $builder = $this->db->table('bf_email_drip_campaign_steps');
app/Models/MarketingModel.php:575:        $builder = $this->db->table('bf_email_drip_campaign_steps');
app/Models/MarketingModel.php:590:        $builder = $this->db->table('bf_email_drip_campaign_steps');
app/Models/MarketingModel.php:603:        return $this->db->table('bf_marketing_ideas')->where('status !=', 'approved')->limit(20)->get()->getResultArray();
app/Models/MarketingModel.php:610:        $builder = $this->db->table('bf_marketing_campaigns');
app/Models/MarketingModel.php:624:            ->table('bf_investment_trade_alerts')
app/Models/MarketingModel.php:636:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:644:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:659:            $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:670:        return $this->db->table('bf_marketing_buffer')
app/Models/MarketingModel.php:682:        return $this->db->table('bf_company_logos')->limit(20)->get()->getResultArray();
app/Models/MarketingModel.php:686:        return $this->db->table('bf_marketing_blog_posts')
app/Models/MarketingModel.php:708:        return $this->db->table('bf_marketing_blog_posts')
app/Models/MarketingModel.php:727:            ->table('bf_marketing_content_enrichment_cache')
app/Models/MarketingModel.php:734:        return $this->db->table('bf_marketing_campaigns')
app/Models/MarketingModel.php:741:        return $this->db->table('bf_marketing_campaigns')
app/Models/MarketingModel.php:749:        return $this->db->table('bf_marketing_generated_content gc')
app/Models/MarketingModel.php:766:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:774:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:782:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:798:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:814:        return $this->db->table('bf_exchanges_assets')->where('id', $id)->get()->getRowArray();
app/Models/MarketingModel.php:819:        return $this->db->table('bf_company_logos')->where('symbol', $symbol)->get()->getRow();
app/Models/MarketingModel.php:824:        return $this->db->table('bf_users_memberships')->where('active', 1)->orderBy('feature_level', 'ASC')->orderBy('feature_name', 'ASC')->limit(20)->get()->getResultArray(); 
app/Models/MarketingModel.php:829:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:839:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:848:        return $this->db->table('bf_marketing_campaigns')
app/Models/MarketingModel.php:857:        $builder = $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:868:        return $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:877:        return $this->db->table('bf_marketing_generated_content')->where('id', $id)->get()->getRowArray();
app/Models/MarketingModel.php:882:        $row = $this->db->table('bf_marketing_scraper')->where('id', $id)->get()->getRowArray();
app/Models/MarketingModel.php:893:        $row = $this->db->table('bf_marketing_scraper')->where('source_id', $id)->get()->getRowArray();
app/Models/MarketingModel.php:904:        return $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:914:        return $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:924:        return $this->db->table('bf_marketing_generated_content')->insert($data);
app/Models/MarketingModel.php:929:        return $this->db->table('bf_marketing_visuals')
app/Models/MarketingModel.php:941:        return $this->db->table('bf_marketing_search_api_log')
app/Models/MarketingModel.php:952:        return $this->db->table('bf_investment_trade_alerts')
app/Models/MarketingModel.php:966:        return $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:976:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:985:        return $this->db->table('bf_marketing_newsletters')
app/Models/MarketingModel.php:993:            ->table('bf_marketing_content_enrichment_cache')
app/Models/MarketingModel.php:1003:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1013:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1036:        $result = $this->db->table('bf_management_positions')
app/Models/MarketingModel.php:1054:        return $this->db->table('bf_marketing_raw_emails')
app/Models/MarketingModel.php:1071:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:1081:        return $this->db->table('bf_marketing_buffer')
app/Models/MarketingModel.php:1092:        $builder = $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:1113:        return $this->db->table('bf_marketing_buffer')
app/Models/MarketingModel.php:1124:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:1134:        return $this->db->table('bf_marketing_schedule')
app/Models/MarketingModel.php:1143:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:1174:        return $this->db->table('bf_marketing_email_queue')
app/Models/MarketingModel.php:1185:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:1194:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1203:        $results = $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:1235:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1244:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:1256:        return $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:1267:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1277:        return $this->db->table('bf_marketing_buffer')
app/Models/MarketingModel.php:1288:        return $this->db->table('bf_marketing_newsletters')
app/Models/MarketingModel.php:1297:        return $this->db->table('bf_marketing_calendar')
app/Models/MarketingModel.php:1303:        return $this->db->table('bf_marketing_schedule')->where('id', $id)->get()->getRow();
app/Models/MarketingModel.php:1308:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1323:            ->table('bf_marketing_scraper')
app/Models/MarketingModel.php:1334:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:1348:                ->table('bf_investment_trade_alerts')
app/Models/MarketingModel.php:1361:            ->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1380:            ->table('bf_marketing_temp_scraper')  // ✅ Make sure this is your temp table
app/Models/MarketingModel.php:1389:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1398:        return $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:1411:            ->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:1453:        return $this->db->table('bf_marketing_content_enrichment_cache')
app/Models/MarketingModel.php:1464:        $todaysStory = $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1487:        return $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:1498:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:1510:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1520:        return $this->db->table('bf_marketing_schedule')
app/Models/MarketingModel.php:1550:        $scraperRows = $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:1558:        $tempRows = $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1603:        $builder = $this->db->table('bf_marketing_temp_scraper');
app/Models/MarketingModel.php:1649:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1663:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:1672:        return $this->db->table('bf_marketing_email_queue')
app/Models/MarketingModel.php:1681:        return $this->db->table('bf_marketing_schedule')
app/Models/MarketingModel.php:1716:        $this->db->table('bf_investment_trade_alert_enrichment')
app/Models/MarketingModel.php:1720:        return $this->db->table('bf_trade_alert_enrichment')->insert([
app/Models/MarketingModel.php:1744:        $existing = $this->db->table('bf_marketing_scraper')->where('hash', $hash)->get()->getRowArray();
app/Models/MarketingModel.php:1764:            $this->db->table('bf_marketing_scraper')->insert($data);
app/Models/MarketingModel.php:1775:        return (bool) $this->db->table('bf_marketing_scraper')->where('hash', $hash)->countAllResults();
app/Models/MarketingModel.php:1783:            $this->db->table('bf_marketing_temp_scraper')->insert($data);
app/Models/MarketingModel.php:1802:            return (bool) $this->db->table('bf_marketing_scraper')->insert($data);
app/Models/MarketingModel.php:1813:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:1834:        $existing = $this->db->table('bf_marketing_scraper')->where('hash', $hash)->get()->getRowArray();
app/Models/MarketingModel.php:1845:            'source_type'  => $data['source_type'] ?? 'investment_scraper',
app/Models/MarketingModel.php:1861:            return (bool) $this->db->table('bf_marketing_scraper')->insert($payload);
app/Models/MarketingModel.php:1880:        return $this->db->table('bf_marketing_generated_content')->insert($data);
app/Models/MarketingModel.php:1885:        return $this->db->table('bf_marketing_generated_posts')->insert([
app/Models/MarketingModel.php:1911:        return $this->db->table('bf_marketing_scraper')->insert($data);
app/Models/MarketingModel.php:1916:        return $this->db->table('bf_marketing_temp_scraper')->insert($data);
app/Models/MarketingModel.php:2004:        return $this->db->table('bf_marketing_search_api_log')->insert([
app/Models/MarketingModel.php:2016:        $this->db->table('bf_marketing_search_engine_usage')->insert([
app/Models/MarketingModel.php:2026:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:2033:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:2047:        $this->db->table('bf_users_subscribers')
app/Models/MarketingModel.php:2056:        $this->db->table('bf_email_list_members')
app/Models/MarketingModel.php:2068:        return $this->db->table('bf_marketing_email_queue')
app/Models/MarketingModel.php:2076:        return $this->db->table('bf_marketing_email_queue')
app/Models/MarketingModel.php:2084:        return $this->db->table('bf_users_subscribers') // <-- Corrected table name
app/Models/MarketingModel.php:2095:            return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:2104:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:2111:        $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:2134:            return $this->db->table('bf_marketing_email_queue')->insert([
app/Models/MarketingModel.php:2165:            $existingLogo = $this->db->table('bf_company_logos')->where('symbol', $symbol)->get()->getRow();
app/Models/MarketingModel.php:2170:                    $this->db->table('bf_company_logos')->where('symbol', $symbol)->update($data);
app/Models/MarketingModel.php:2177:                $this->db->table('bf_company_logos')->insert($data);
app/Models/MarketingModel.php:2187:        return $this->db->table('bf_marketing_scraper')->insert($data);
app/Models/MarketingModel.php:2193:        $existing = $this->db->table('bf_company_logos')->where('symbol', $symbol)->get()->getRow();
app/Models/MarketingModel.php:2199:            $this->db->table('bf_company_logos')->where('symbol', $symbol)->update($data);
app/Models/MarketingModel.php:2203:            $this->db->table('bf_company_logos')->insert($data);
app/Models/MarketingModel.php:2210:        return $this->db->table('bf_marketing_newsletters')->insert($data);
app/Models/MarketingModel.php:2215:        return $this->db->table('bf_marketing_analysis')->insert($data);
app/Models/MarketingModel.php:2268:        return $this->db->table('bf_marketing_scraper')->insert($data);
app/Models/MarketingModel.php:2273:        return $this->db->table('bf_marketing_generated_content')->insert($data);
app/Models/MarketingModel.php:2278:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:2286:        return (bool) $this->db->table('bf_marketing_temp_scraper')->insert($data);
app/Models/MarketingModel.php:2291:        $row = $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:2321:        if ($this->db->table('bf_marketing_campaigns')->insert($campaign)) {
app/Models/MarketingModel.php:2346:        return $this->db->table('bf_marketing_temp_scraper')->insert($data);
app/Models/MarketingModel.php:2351:        return $this->db->table('bf_marketing_newsletters')->insert($data);
app/Models/MarketingModel.php:2357:        return $this->db->table('bf_users_promotional_messages')->insert($data);
app/Models/MarketingModel.php:2361:        return $this->db->table('bf_marketing_temp_scraper')->insert($data);
app/Models/MarketingModel.php:2367:        return $this->db->table('bf_marketing_temp_scraper')->insert($data);
app/Models/MarketingModel.php:2437:        $this->db->table('bf_email_list_members')
app/Models/MarketingModel.php:2441:        $this->db->table('bf_users_subscribers')
app/Models/MarketingModel.php:2450:        return $this->db->table('bf_marketing_buffer')->where('id', $id)->update($data);
app/Models/MarketingModel.php:2455:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:2462:        return $this->db->table('bf_marketing_generated_content')
app/Models/MarketingModel.php:2470:        return $this->db->table('bf_marketing_newsletters')
app/Models/MarketingModel.php:2482:        return $this->db->table('bf_marketing_temp_scraper')
app/Models/MarketingModel.php:2495:        return $this->db->table('bf_marketing_generated_content')->where('id', $id)->update($data);
app/Models/MarketingModel.php:2501:        return $this->db->table('bf_users_promotional_messages')->update($data);
app/Models/MarketingModel.php:2505:        return $this->db->table('bf_marketing_schedule')->where('id', $id)->update($data);
app/Models/MarketingModel.php:2515:        return $this->db->table('bf_marketing_schedule')
app/Models/MarketingModel.php:2527:        return $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:2561:        $currentLog = $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:2574:        return (bool) $this->db->table('bf_marketing_scraper')
app/Models/MarketingModel.php:2593:            $builder = $this->db->table('bf_marketing_platforms');
app/Models/MarketingModel.php:2609:            return $this->db->table('bf_marketing_platforms')
app/Models/MarketingModel.php:2622:        $this->db->table('bf_marketing_platforms')->insert($data);
app/Models/MarketingModel.php:2630:        $result = $this->db->table('bf_marketing_platforms')->where('id', $id)->update($data);
app/Models/MarketingModel.php:2638:        $result = $this->db->table('bf_marketing_platforms')->where('id', $id)->update(['is_active' => 0]);
app/Models/MarketingModel.php:2651:            $builder = $this->db->table('bf_marketing_platform_rules');
app/Models/MarketingModel.php:2675:        $result = $this->db->table('bf_marketing_platform_rules')->replace($data);
app/Models/MarketingModel.php:2683:        $result = $this->db->table('bf_marketing_platform_rules')->where('id', $id)->update(['is_active' => 0]);
app/Models/MarketingModel.php:2693:        $builder = $this->db->table('bf_marketing_taxonomy')->where('is_active', 1);
app/Models/MarketingModel.php:2719:        $this->db->table('bf_marketing_taxonomy')->insert($data);
app/Models/MarketingModel.php:2726:        return $this->db->table('bf_marketing_taxonomy')->where('id', $id)->update($data);
app/Models/MarketingModel.php:2732:        return $this->db->table('bf_marketing_taxonomy')->where('id', $id)->update(['is_active' => 0]);
app/Models/MarketingModel.php:2738:        $builder = $this->db->table('bf_marketing_suggestions')->where('is_active', 1);
app/Models/MarketingModel.php:2755:        $this->db->table('bf_marketing_suggestions')->insert($data);
app/Models/MarketingModel.php:2762:        return $this->db->table('bf_marketing_suggestions')->where('id', $id)->update($data);
app/Models/MarketingModel.php:2768:        return $this->db->table('bf_marketing_suggestions')->where('id', $id)->update(['is_active' => 0]);
app/Models/MarketingModel.php:2776:        $rows = $this->db->table('bf_marketing_scraper')
app/Models/MyMICoinModel.php:91:        $builder = $this->db->table('bf_investments_overview');
app/Models/MyMICoinModel.php:101:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/MyMICoinModel.php:108:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/MyMICoinModel.php:236:        $builder = $this->db->table('bf_investment_stock_listing');
app/Models/MyMICoinModel.php:242:        $builder = $this->db->table('bf_investment_stock_listing');
app/Models/MyMICoinModel.php:249:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/MyMICoinModel.php:256:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/MyMICoinModel.php:263:        $builder = $this->db->table('bf_investment_stock_listing');
app/Models/MyMIGoldModel.php:96:        $builder = $this->db->table('bf_investments_overview');
app/Models/PageSEOModel.php:8:    protected $table         = 'bf_marketing_page_seo';
app/Models/PublicModel.php:44:        return $this->table('bf_marketing_page_seo')
app/Models/PublicModel.php:52:        return $this->table('bf_marketing_page_seo')
app/Models/PublicModel.php:60:        return $this->table('bf_investment_stock_listing')
app/Models/PublicModel.php:74:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:36:        $builder = $this->db->table('bf_investment_stock_listing'); 
app/Models/TrackerModel.php:43:        $builder = $this->db->table('bf_investment_stock_listing'); 
app/Models/TrackerModel.php:51:        $builder = $this->db->table('bf_investment_stock_listing'); 
app/Models/TrackerModel.php:75:        $builder = $this->db->table('bf_users_trades'); 
app/Models/TrackerModel.php:82:        $builder = $this->db->table('bf_users_trades'); 
app/Models/TrackerModel.php:91:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:101:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:111:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:119:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:128:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:137:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:145:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:154:        $builder = $this->db->table('bf_users_trades'); 
app/Models/TrackerModel.php:162:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:171:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:180:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:189:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:199:        return $this->table('bf_users_trades')
app/Models/TrackerModel.php:251:        return $this->db->table('bf_users_trades_configs')
app/Models/SignalsModel.php:9:    protected $table            = 'bf_investment_signals';
app/Models/WalletModel.php:1241:        return $this->db->table('bf_investment_trade_alerts')
app/Models/WalletModel.php:1250:        return $this->db->table('bf_investment_trade_alerts')
app/Models/WalletModel.php:1259:        return $this->db->table('bf_investment_stock_listing')
app/Models/WalletModel.php:1372:        return $this->db->table('bf_investment_stock_listing')
app/Models/WalletModel.php:1380:        return $this->db->table('bf_investment_stock_listing')
app/Models/InvestmentModel.php:8:    protected $table = 'bf_users_trades'; // Update table name as per CI4 database schema
app/Models/InvestmentModel.php:53:        $builder = $this->db->table('users');
app/Models/InvestmentModel.php:59:        $builder = $this->db->table('bf_exchanges_orders');
app/Models/InvestmentModel.php:79:        $builder = $this->db->table('bf_users_coin_purchases');
app/Models/InvestmentModel.php:150:        $builder = $this->db->table('bf_users_watchlist');
app/Models/InvestmentModel.php:172:        $builder = $this->db->table('bf_mymicoin_overview');
app/Models/InvestmentModel.php:178:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:186:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:194:        $builder = $this->db->table($this->table);
app/Models/InvestmentModel.php:208:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:225:        $builder = $this->db->table('bf_exchanges_assets');
app/Models/InvestmentModel.php:295:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:316:        $builder = $this->db->table('bf_users_trades')
app/Models/InvestmentModel.php:347:        $builder =  $this->db->table('bf_investment_calendar')
app/Models/InvestmentModel.php:401:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:426:        $results = $this->db->table('bf_investment_calendar')
app/Models/InvestmentModel.php:438:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:457:        $builder = $this->db->table('bf_company_logos')->where('symbol', $symbol)->get()->getRow();
app/Models/InvestmentModel.php:463:        return $this->db->table('investment_goals')->where('user_id', $userId)->findAll(20);
app/Models/InvestmentModel.php:467:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:479:        $builder = $this->db->table('bf_users_coin_purchases');
app/Models/InvestmentModel.php:486:        $builder = $this->db->table('bf_users_wallet'); 
app/Models/InvestmentModel.php:497:        return $this->db->table('bf_investment_trade_alerts')
app/Models/InvestmentModel.php:512:        $builder = $this->db->table('bf_users_coin_purchases');
app/Models/InvestmentModel.php:519:        $builder = $this->db->table('bf_users_coin_purchases');
app/Models/InvestmentModel.php:528:     * ✅ Check If Ticker Exists in `bf_investment_tickers`
app/Models/InvestmentModel.php:532:        return $this->db->table('bf_investment_tickers')
app/Models/InvestmentModel.php:563:        $results = $this->db->table('bf_investment_calendar')
app/Models/InvestmentModel.php:576:        $results = $this->db->table('bf_investment_calendar')
app/Models/InvestmentModel.php:586:        $builder = $this->db->table('bf_users_watchlist');
app/Models/InvestmentModel.php:596:        return $this->db->table('bf_users_retirement_plans')->where('user_id', $userId)->get()->getRowArray();
app/Models/InvestmentModel.php:600:        $builder = $this->db->table('bf_investment_economic_data');
app/Models/InvestmentModel.php:612:        $existingFiling = $this->db->table('bf_investment_filings')
app/Models/InvestmentModel.php:618:            return $this->db->table('bf_investment_filings')->insert($filing);
app/Models/InvestmentModel.php:625:        $builder = $this->db->table('bf_users_watchlist');
app/Models/InvestmentModel.php:646:            return $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->update($tickerData);
app/Models/InvestmentModel.php:648:            return $this->db->table('bf_investment_tickers')->insert($tickerData);
app/Models/InvestmentModel.php:654:        $this->db->table('investment_goals')->replace($data);
app/Models/InvestmentModel.php:684:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:690:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:696:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:704:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:713:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:722:        $builder = $this->db->table('bf_exchanges_assets');
app/Models/InvestmentModel.php:730:        $builder = $this->db->table('bf_exchanges_assets');
app/Models/InvestmentModel.php:822:        $builder = $this->db->table('bf_exchanges_orders');
app/Models/InvestmentModel.php:828:        $builder = $this->db->table('bf_users_coin_purchases');
app/Models/InvestmentModel.php:842:        $builder = $this->db->table('bf_users_post_likes');
app/Models/InvestmentModel.php:851:        $builder = $this->db->table('bf_investment_economic_data');
app/Models/InvestmentModel.php:860:        $incomeBuilder = $this->db->table('bf_users_budgeting');
app/Models/InvestmentModel.php:865:        $expenseBuilder = $this->db->table('bf_users_budgeting');
app/Models/InvestmentModel.php:879:        $transactionBuilder = $this->db->table('transactions');
app/Models/InvestmentModel.php:948:        return $this->db->table('users')->where('id', $userId)->get()->getRowArray();
app/Models/InvestmentModel.php:953:        return $this->db->table('alerts')->where('user_id', $userId)->findAll(20);
app/Models/InvestmentModel.php:1029:        $this->db->table('alerts')->replace($data);
app/Models/InvestmentModel.php:1084:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1103:    //     $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1116:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1147:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1166:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/InvestmentModel.php:1182:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1195:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/InvestmentModel.php:1211:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/InvestmentModel.php:1273:        $builder = $this->db->table('bf_users_retirement_goals');
app/Models/InvestmentModel.php:1289:        return $this->db->table('bf_users_retirement_plans')
app/Models/InvestmentModel.php:1299:        return $this->db->table('bf_users_retirement_plans')
app/Models/InvestmentModel.php:1307:        $builder = $this->db->table('bf_exchanges_assets');
app/Models/InvestmentModel.php:1319:        $this->db->table('bf_users_retirement_plans')
app/Models/InvestmentModel.php:1327:        $builder = $this->db->table('bf_investment_strategies');
app/Models/InvestmentModel.php:1333:        $builder = $this->db->table('bf_financial_goals');
app/Models/InvestmentModel.php:1339:        $builder = $this->db->table('bf_financial_goals');
app/Models/InvestmentModel.php:1346:        $builder = $this->db->table('bf_investment_strategies');
app/Models/InvestmentModel.php:1356:        $investments = $this->db->table('bf_users_trades')
app/Models/InvestmentModel.php:1376:        $builder = $this->db->table('bf_financial_goals');
app/Models/InvestmentModel.php:1382:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1401:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1444:        $builder = $this->db->table('bf_investment_strategies');
app/Models/InvestmentModel.php:1450:        $builder = $this->db->table('bf_exchanges_assets');
app/Models/InvestmentModel.php:1470:            $this->db->table('bf_investment_trade_alert_changes')->insert($data);
app/Models/InvestmentModel.php:1496:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1518:        $existingPlan = $this->db->table('bf_users_retirement_plans')
app/Models/InvestmentModel.php:1525:            return $this->db->table('bf_users_retirement_plans')->update($existingPlan->id, $retirementData);
app/Models/InvestmentModel.php:1527:            return $this->db->table('bf_users_retirement_plans')->insert($retirementData);
app/Models/InvestmentModel.php:1532:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1544:        $builder = $this->db->table('bf_financial_goals');
app/Models/InvestmentModel.php:1552:        $this->db->table('bf_users_retirement_plans')
app/Models/InvestmentModel.php:1557:        $this->db->table('retirement_progress_logs')
app/Models/InvestmentModel.php:1566:        $builder = $this->db->table('bf_investment_strategies');
app/Models/InvestmentModel.php:1576:        return $this->db->table('bf_investment_alert_history')
app/Models/InvestmentModel.php:1593:        return $this->db->table('bf_investment_trade_alerts')
app/Models/InvestmentModel.php:1606:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1616:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1626:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1636:        $builder = $this->db->table('bf_users_trades');
app/Models/InvestmentModel.php:1646:        $builder = $this->db->table('bf_users_trades');
app/Models/AlertJobModel.php:8:    protected $table = 'bf_investment_alert_jobs';
app/Models/DiscordLinkModel.php:11:    protected $table            = 'bf_discord_links';
app/Models/DiscordAiMessageModel.php:9:    protected $table         = 'bf_discord_ai_messages';
app/Models/DiscordAiNoteModel.php:9:    protected $table         = 'bf_discord_ai_notes';
app/Models/DiscordAiSessionModel.php:9:    protected $table          = 'bf_discord_ai_sessions';
app/Models/MarketingNewsletterModel.php:9:    protected $table            = 'bf_marketing_newsletters';
app/Models/ContentScannerIngestModel.php:11:    protected $table = 'bf_content_scanner_ingest';
app/Models/ContentScannerRowModel.php:11:    protected $table = 'bf_content_scanner_rows';
app/Models/UserModel.php:133:        return $this->db->table('bf_users_comments')->where('ticker', $ticker)->orderBy('created_at', 'DESC')->findAll(20);
app/Models/InvestmentForecastHistoryModel.php:9:    protected $table = 'bf_investment_forecast_history';
app/Models/InvestmentForecastAccuracyModel.php:9:    protected $table = 'bf_investment_forecast_accuracy';
app/Models/InvestmentScannerLineageModel.php:11:    protected $table = 'bf_investment_scanner_lineage';
app/Models/InvestmentScannerLineageModel.php:34:        $builder = $this->db->table($this->table);
app/Models/InvestmentTickerDailyCountModel.php:11:    protected $table = 'bf_investment_ticker_daily_counts';
app/Models/InvestmentTickerDailyCountModel.php:30:        $builder = $this->db->table($this->table);
app/Models/InvestmentTickerDailyCountModel.php:46:        $builder = $this->db->table($this->table);
app/Models/ScannerTaxonomyModel.php:11:    protected $table = 'bf_scanner_taxonomy';
app/Models/ScannerTaxonomyModel.php:43:        $this->db->table($this->table)->ignore(true)->insert($data);
app/Models/TradeAlertScannerMetaModel.php:11:    protected $table = 'bf_trade_alert_scanner_meta';
app/Models/InvestmentPriceForecastModel.php:9:    protected $table = 'bf_investment_price_forecasts';
app/Models/ErrorAlertRuleModel.php:9:    protected $table = 'bf_error_alert_rules';
app/Models/ErrorAlertEventModel.php:9:    protected $table = 'bf_error_alert_events';
app/Models/DiscordRelayAuditModel.php:11:    protected $table = 'bf_discord_relay_audit';
app/Models/DiscordManualMessageModel.php:11:    protected $table = 'bf_discord_manual_messages';
app/Models/MarketingDistributionTargetModel.php:9:    protected $table = 'bf_marketing_distribution_targets';
app/Libraries/Privacy/DataExportService.php:22:            'alerts'       => $this->db->table('bf_investment_trade_alerts')->where('user_id',$userId)
app/Libraries/MyMIAdvisor.php:32:        $existing = $db->table('bf_investment_advisor_log')
app/Libraries/MyMIAdvisor.php:67:        $builder = $db->table('bf_investment_advisor_log');
app/Libraries/test.txt:2976:            $this->db->table('bf_marketing_blog_posts')->insert([
app/Libraries/test.txt:3810:        $builder = $db->table('bf_marketing_temp_scraper');
app/Libraries/test.txt:5847:     * @param array $tradeAlert A record from bf_investment_trade_alerts.
app/Libraries/test.txt:7289:        $this->db->table('bf_marketing_scraper')->insert([
app/Libraries/test.txt:7816:    protected $table = 'bf_marketing_scraper';
app/Libraries/test.txt:7878:        if ($this->db->table('bf_marketing_campaigns')->insert($dbData)) {
app/Libraries/test.txt:7890:        $this->db->table('bf_marketing_schedule')->insert($data);
app/Libraries/test.txt:7933:        return $this->db->table('bf_marketing_blog_posts')->countAllResults();
app/Libraries/test.txt:7945:        $existing = $this->db->table('bf_marketing_blog_posts')->where('slug', $slug)->countAllResults();
app/Libraries/test.txt:7963:        return $this->db->table('bf_marketing_schedule')->where('id', $id)->delete();
app/Libraries/test.txt:8013:        $builder = $this->db->table('bf_marketing_buffer')
app/Libraries/test.txt:8020:        $total = $this->db->table('bf_marketing_buffer')
app/Libraries/test.txt:8043:        $builder = $this->db->table('bf_marketing_buffer')->where('status !=', 'promoted');
app/Libraries/test.txt:8083:        return $this->db->table('bf_marketing_buffer')
app/Libraries/test.txt:8092:        return $this->db->table('bf_marketing_buffer')->where('id', $id)->get()->getRowArray();
app/Libraries/test.txt:8097:        return $this->db->table('bf_marketing_scraper')
app/Libraries/test.txt:8106:        return $this->db->table('bf_marketing_buffer')
app/Libraries/test.txt:8117:        return $this->db->table('bf_marketing_schedule')
app/Libraries/test.txt:8126:        return $this->db->table('bf_marketing_scraper')
app/Libraries/test.txt:8158:        return $this->db->table('bf_marketing_buffer')->where('id', $id)->get()->getRowArray();
app/Libraries/test.txt:8163:        return $this->db->table('bf_marketing_scraper')
app/Libraries/test.txt:8173:        $builder = $this->db->table('bf_marketing_campaigns');
app/Libraries/test.txt:8186:        return $this->db->table('bf_marketing_ideas')->where('status !=', 'approved')->get()->getResultArray();
app/Libraries/test.txt:8193:        $builder = $this->db->table('bf_marketing_campaigns');
app/Libraries/test.txt:8206:        return $this->db->table('bf_marketing_scraper')
app/Libraries/test.txt:8215:        return $this->db->table('bf_marketing_buffer')
app/Libraries/test.txt:8231:        return $this->db->table('bf_marketing_blog_posts')
app/Libraries/test.txt:8253:        return $this->db->table('bf_marketing_blog_posts')
app/Libraries/test.txt:8270:        return $this->db->table('bf_marketing_campaigns')
app/Libraries/test.txt:8277:        return $this->db->table('bf_marketing_campaigns')
app/Libraries/test.txt:8285:        return $this->db->table('bf_marketing_scraper')
app/Libraries/test.txt:8293:        return $this->db->table('bf_marketing_temp_scraper')
app/Libraries/test.txt:8301:        return $this->db->table('bf_marketing_temp_scraper')
app/Libraries/test.txt:8317:        return $this->db->table('bf_marketing_temp_scraper')
app/Libraries/test.txt:8347:        return $this->db->table('bf_marketing_campaigns')
app/Libraries/test.txt:8355:        $row = $this->db->table('bf_marketing_scraper')->where('id', $id)->get()->getRowArray();
app/Libraries/test.txt:8366:        $row = $this->db->table('bf_marketing_scraper')->where('source_id', $id)->get()->getRowArray();
```

## Relevant Migration Files

```text
app/Database/Migrations/2006-04-18-000001_CreateFinancialNewsTable.php
app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php
app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php
app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php
app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php
app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php
app/Database/Migrations/2026-03-20-000105_CreateAiOpsIngestRuns.php
app/Database/Migrations/2026-03-20-000110_CreateScannerTaxonomy.php
app/Database/Migrations/2026-03-20-000120_CreateTradeAlertScannerMeta.php
app/Database/Migrations/2026-03-20-000130_CreateAiOpsManualTodos.php
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php
app/Database/Migrations/2026-03-30-000400_AddTickerToProjects.php
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php
app/Database/Migrations/2026-04-09-120000_EnhanceMarketingGenerationPipeline.php
app/Database/Migrations/2026-04-09-130000_HardenMarketingNewsPipelineSchema.php
app/Database/Migrations/2026-04-12-120050_CreateMarketingDistributionTargets.php
app/Database/Migrations/2026-04-12-221500_AddExternalFieldsToMarketingDistributionTargets.php
app/Database/Migrations/2026-04-13-090000_AddDiscordCategoryFieldsToMarketingGeneratedContent.php
app/Database/Migrations/2026-04-13-120000_CreateDiscordOpsTables.php
app/Database/Migrations/2026-04-14-120000_RenameDiscordManualMessageRecipientFields.php
app/Database/Migrations/2026-04-19-000001_CreateMarketingPageSeoTable.php
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php
app/Database/Migrations/2026-04-23-090000_HardenMarketingDistributionTargetsForReliability.php
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php
app/Database/Migrations/2026-06-15-000110_CreateAiopsChatAdminTable.php
app/Database/Migrations/2026-06-20-000100_CreateAiOpsFormTests.php
app/Database/Migrations/2026-07-01-000100_CreateAiOpsLifecycleTables.php
```

## Relevant Migration Contents

```text
app/Database/Migrations/2026-04-19-000100_CreateMobileAuthTokens.php:13:        $this->forge->addField([
app/Database/Migrations/2026-04-19-000100_CreateMobileAuthTokens.php:26:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-19-000100_CreateMobileAuthTokens.php:27:        $this->forge->addKey('user_id');
app/Database/Migrations/2026-04-19-000100_CreateMobileAuthTokens.php:28:        $this->forge->addKey('token_prefix');
app/Database/Migrations/2026-04-19-000100_CreateMobileAuthTokens.php:30:        $this->forge->createTable('bf_mobile_auth_tokens', true);
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:29:        $this->forge->addField([
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:43:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:44:        $this->forge->createTable('bf_social_platforms', true);
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:49:        $this->forge->addField([
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:63:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:65:        $this->forge->createTable('bf_social_communities', true);
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:70:        $this->forge->addField([
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:85:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:86:        $this->forge->addKey(['platform_id', 'template_key']);
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:88:        $this->forge->createTable('bf_social_post_templates', true);
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:93:        $this->forge->addField([
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:112:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:113:        $this->forge->addKey(['source_type', 'source_id']);
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:117:        $this->forge->createTable('bf_social_generated_posts', true);
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:122:        $this->forge->addField([
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:133:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:135:        $this->forge->createTable('bf_social_distribution_queue', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:17:        $this->forge->addField([
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:27:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:28:        $this->forge->createTable('bf_tax_jurisdictions', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:31:        $this->forge->addField([
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:41:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:43:        $this->forge->createTable('bf_tax_rates', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:46:        $this->forge->addField([
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:56:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:57:        $this->forge->createTable('bf_tax_return_templates', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:60:        $this->forge->addField([
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:72:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:74:        $this->forge->createTable('bf_tax_return_lines', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:77:        $this->forge->addField([
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:91:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:93:        $this->forge->createTable('bf_user_tax_returns', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:96:        $this->forge->addField([
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:105:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:108:        $this->forge->createTable('bf_user_tax_return_values', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:111:        $this->forge->addField([
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:120:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:123:        $this->forge->createTable('bf_user_tax_return_jurisdictions', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:126:        $this->forge->addField([
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:136:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:137:        $this->forge->createTable('bf_tax_audit_log', true);
app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php:13:        $this->forge->addField([
app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php:29:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php:30:        $this->forge->addKey('slug', false, true);
app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php:31:        $this->forge->addKey('state');
app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php:32:        $this->forge->addKey('category');
app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php:33:        $this->forge->addKey('lock_at');
app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php:34:        $this->forge->addKey('created_by');
app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php:36:        $this->forge->createTable('bf_predictions_markets', true);
app/Database/Migrations/2025-09-09-000020_CreatePredictionsOptions.php:13:        $this->forge->addField([
app/Database/Migrations/2025-09-09-000020_CreatePredictionsOptions.php:23:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-09-09-000020_CreatePredictionsOptions.php:24:        $this->forge->addKey(['market_id', 'label']);
app/Database/Migrations/2025-09-09-000020_CreatePredictionsOptions.php:25:        $this->forge->addKey('is_winner');
app/Database/Migrations/2025-09-09-000020_CreatePredictionsOptions.php:27:        $this->forge->createTable('bf_predictions_options', true);
app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:13:        $this->forge->addField([
app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:27:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:28:        $this->forge->addKey('user_id');
app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:29:        $this->forge->addKey('market_id');
app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:30:        $this->forge->addKey('option_id');
app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:31:        $this->forge->addKey(['user_id', 'state']);
app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:32:        $this->forge->addKey(['market_id', 'state']);
app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:36:        $this->forge->createTable('bf_predictions_orders', true);
app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:13:        $this->forge->addField([
app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:25:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:26:        $this->forge->addKey('order_id');
app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:27:        $this->forge->addKey('user_id');
app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:28:        $this->forge->addKey('market_id');
app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:29:        $this->forge->addKey('option_id');
app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:34:        $this->forge->createTable('bf_predictions_trades', true);
app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:13:        $this->forge->addField([
app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:25:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:26:        $this->forge->addKey('user_id');
app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:27:        $this->forge->addKey('market_id');
app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:28:        $this->forge->addKey('option_id');
app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:33:        $this->forge->createTable('bf_predictions_positions', true);
app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:13:        $this->forge->addField([
app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:24:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:25:        $this->forge->addKey(['market_id', 'option_id']);
app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:26:        $this->forge->addKey('provider_user_id');
app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:27:        $this->forge->addKey('state');
app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:31:        $this->forge->createTable('bf_predictions_liquidity', true);
app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:13:        $this->forge->addField([
app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:22:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:23:        $this->forge->addKey('market_id');
app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:24:        $this->forge->addKey('resolver_user_id');
app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:28:        $this->forge->createTable('bf_predictions_settlements', true);
app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:30:        $this->forge->addField([
app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:42:        $this->forge->addKey('id', true);
app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:43:        $this->forge->addKey('user_id');
app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:44:        $this->forge->addKey('market_id');
app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:45:        $this->forge->addKey('position_id');
app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:46:        $this->forge->addKey('status');
app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:50:        $this->forge->createTable('bf_predictions_payouts', true);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:12:        $this->forge->addField([
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:22:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:24:        $this->forge->createTable('bf_ai_ops_caps', true);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:27:        $this->forge->addField([
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:40:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:41:        $this->forge->addKey(['job_key', 'started_at']);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:42:        $this->forge->addKey(['subsystem', 'started_at']);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:43:        $this->forge->createTable('bf_ai_ops_runs', true);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:46:        $this->forge->addField([
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:58:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:60:        $this->forge->createTable('bf_ai_ops_usage', true);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:63:        $this->forge->addField([
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:71:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:72:        $this->forge->addKey(['subsystem', 'created_at']);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:73:        $this->forge->addKey(['event_type', 'created_at']);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:74:        $this->forge->createTable('bf_ai_ops_events', true);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:77:        $this->forge->addField([
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:83:        $this->forge->addKey('setting_key', true);
app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:84:        $this->forge->createTable('bf_site_settings_overrides', true);
app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:12:            $this->forge->addField([
app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:21:            $this->forge->addKey(['user_id', 'month'], true);
app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:22:            $this->forge->addKey('last_plan');
app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:23:            $this->forge->createTable('chat_usage');
app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:27:            $this->forge->addField([
app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:34:            $this->forge->addKey(['workflow_id', 'month'], true);
app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:35:            $this->forge->addKey('workflow_slug');
app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:36:            $this->forge->createTable('bf_aiops_workflow_usage');
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:19:        $this->forge->addField([
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:32:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:34:        $this->forge->createTable('ops_projects', true, $attributes);
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:36:        $this->forge->addField([
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:49:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:51:        $this->forge->addKey('project_id');
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:53:        $this->forge->createTable('ops_subprojects', true, $attributes);
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:55:        $this->forge->addField([
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:77:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:79:        $this->forge->addKey('project_id');
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:80:        $this->forge->addKey('subproject_id');
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:83:        $this->forge->createTable('ops_tasks', true, $attributes);
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:85:        $this->forge->addField([
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:93:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:94:        $this->forge->addKey('task_id');
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:95:        $this->forge->addKey('event_type');
app/Database/Migrations/2026-07-15-000100_CreateOpsManagementTables.php:97:        $this->forge->createTable('ops_task_events', true, $attributes);
app/Database/Migrations/2026-02-15-000210_CreateUserSetupPreferences.php:12:            $this->forge->addField([
app/Database/Migrations/2026-02-15-000210_CreateUserSetupPreferences.php:49:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-15-000210_CreateUserSetupPreferences.php:50:            $this->forge->addKey('user_id');
app/Database/Migrations/2026-02-15-000210_CreateUserSetupPreferences.php:52:            $this->forge->createTable('bf_user_setup_preferences', true);
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:20:        $this->forge->addField([
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:32:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:33:        $this->forge->addKey('job_key', false, true);
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:34:        $this->forge->createTable('bf_ops_jobs', true, $tableAttributes);
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:37:        $this->forge->addField([
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:48:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:49:        $this->forge->addKey('status');
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:50:        $this->forge->addKey('job_key');
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:51:        $this->forge->addKey('locked_until');
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:52:        $this->forge->createTable('bf_ops_queue', true, $tableAttributes);
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:55:        $this->forge->addField([
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:71:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:72:        $this->forge->addKey('job_id');
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:73:        $this->forge->addKey('status');
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:74:        $this->forge->addKey('started_at');
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:75:        $this->forge->createTable('bf_ops_job_runs', true, $tableAttributes);
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:78:        $this->forge->addField([
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:85:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:86:        $this->forge->addKey('config_key');
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:87:        $this->forge->createTable('bf_runtime_config', true, $tableAttributes);
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:90:        $this->forge->addField([
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:102:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:103:        $this->forge->addKey('subsystem');
app/Database/Migrations/2026-01-15-000120_CreateOpsFoundation.php:104:        $this->forge->createTable('bf_ai_usage', true, $tableAttributes);
app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:12:            $this->forge->addField([
app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:49:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:51:            $this->forge->createTable('bf_user_onboarding', true);
app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:55:            $this->forge->addField([
app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:96:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:98:            $this->forge->createTable('bf_user_profiles', true);
app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:102:            $this->forge->addField([
app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:143:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:145:            $this->forge->createTable('bf_user_employment', true);
app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:12:        $this->forge->addField([
app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:29:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:30:        $this->forge->addKey(['week_key']);
app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:32:        $this->forge->createTable('bf_investment_signal_files', true);
app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:35:        $this->forge->addField([
app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:53:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:54:        $this->forge->addKey(['week_key', 'symbol']);
app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:55:        $this->forge->addKey(['category', 'signal_type']);
app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:57:        $this->forge->createTable('bf_investment_signals', true);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:11:        if ($this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:14:            if (! $this->db->fieldExists('source', 'bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:23:            if (! $this->db->fieldExists('account_type', 'bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:32:            if (! $this->db->fieldExists('message_hash', 'bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:42:                $this->forge->addColumn('bf_investment_scraper', $fields);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:45:            $this->addIndexIfMissing('bf_investment_scraper', 'idx_scraper_source_hash', ['source', 'message_hash']);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:48:        if ($this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:51:            if (! $this->db->fieldExists('source', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:60:            if (! $this->db->fieldExists('account_type', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:69:            if (! $this->db->fieldExists('broker_order_id', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:78:            if (! $this->db->fieldExists('execution_id', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:87:            if (! $this->db->fieldExists('filled_qty', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:96:            if (! $this->db->fieldExists('filled_price', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:105:            if (! $this->db->fieldExists('filled_at', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:112:            if (! $this->db->fieldExists('side', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:121:            if (! $this->db->fieldExists('notified_discord', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:131:                $this->forge->addColumn('bf_investment_trade_alerts', $fields);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:134:            $this->addIndexIfMissing('bf_investment_trade_alerts', 'idx_trade_alerts_execution_id', ['execution_id'], true);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:135:            $this->addIndexIfMissing('bf_investment_trade_alerts', 'idx_trade_alerts_notified_discord', ['notified_discord']);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:141:        if ($this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:142:            $this->dropIndexIfExists('bf_investment_trade_alerts', 'idx_trade_alerts_execution_id');
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:143:            $this->dropIndexIfExists('bf_investment_trade_alerts', 'idx_trade_alerts_notified_discord');
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:156:            $existing = array_filter($columns, fn ($column) => $this->db->fieldExists($column, 'bf_investment_trade_alerts'));
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:158:                $this->forge->dropColumn('bf_investment_trade_alerts', $existing);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:162:        if ($this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:163:            $this->dropIndexIfExists('bf_investment_scraper', 'idx_scraper_source_hash');
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:166:            $existing = array_filter($columns, fn ($column) => $this->db->fieldExists($column, 'bf_investment_scraper'));
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:168:                $this->forge->dropColumn('bf_investment_scraper', $existing);
app/Database/Migrations/2026-03-07-170000_CreateResearchInsights.php:11:        $this->forge->addField([
app/Database/Migrations/2026-03-07-170000_CreateResearchInsights.php:58:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-07-170000_CreateResearchInsights.php:59:        $this->forge->addKey(['insight_type', 'symbol']);
app/Database/Migrations/2026-03-07-170000_CreateResearchInsights.php:60:        $this->forge->addKey('insight_date');
app/Database/Migrations/2026-03-07-170000_CreateResearchInsights.php:61:        $this->forge->createTable('bf_research_insights', true);
app/Database/Migrations/2026-03-20-000105_CreateAiOpsIngestRuns.php:12:            $this->forge->addField([
app/Database/Migrations/2026-03-20-000105_CreateAiOpsIngestRuns.php:27:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-20-000105_CreateAiOpsIngestRuns.php:28:            $this->forge->addKey('job');
app/Database/Migrations/2026-03-20-000105_CreateAiOpsIngestRuns.php:29:            $this->forge->addKey('created_at');
app/Database/Migrations/2026-03-20-000105_CreateAiOpsIngestRuns.php:30:            $this->forge->createTable('bf_aiops_ingest_runs');
app/Database/Migrations/2026-02-25-000001_CreateAuthHealthRuns.php:19:        $this->forge->addField([
app/Database/Migrations/2026-02-25-000001_CreateAuthHealthRuns.php:31:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-25-000001_CreateAuthHealthRuns.php:32:        $this->forge->addKey('run_at');
app/Database/Migrations/2026-02-25-000001_CreateAuthHealthRuns.php:33:        $this->forge->createTable('bf_auth_health_runs', true, $tableAttributes);
app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:12:            $this->forge->addField([
app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:57:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:58:            $this->forge->addKey('user_id');
app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:59:            $this->forge->addKey('event_key');
app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:60:            $this->forge->addKey('event_group');
app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:61:            $this->forge->addKey('referral_code');
app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:62:            $this->forge->addKey('created_at');
app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:64:            $this->forge->createTable('bf_user_events', true);
app/Database/Migrations/2026-03-05-000100_CreateEmailOutbox.php:13:        $this->forge->addField([
app/Database/Migrations/2026-03-05-000100_CreateEmailOutbox.php:67:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-05-000100_CreateEmailOutbox.php:68:        $this->forge->addKey('user_id');
app/Database/Migrations/2026-03-05-000100_CreateEmailOutbox.php:69:        $this->forge->addKey('type');
app/Database/Migrations/2026-03-05-000100_CreateEmailOutbox.php:70:        $this->forge->addKey('status');
app/Database/Migrations/2026-03-05-000100_CreateEmailOutbox.php:71:        $this->forge->addKey('created_at');
app/Database/Migrations/2026-03-05-000100_CreateEmailOutbox.php:73:        $this->forge->createTable('bf_email_outbox', true);
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:12:            $this->forge->addField([
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:28:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:29:            $this->forge->addKey(['ticker', 'timeframe']);
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:30:            $this->forge->addKey('alert_id');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:31:            $this->forge->addKey('created_at');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:32:            $this->forge->createTable('bf_investment_price_forecasts');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:36:            $this->forge->addField([
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:49:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:50:            $this->forge->addKey('forecast_id');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:51:            $this->forge->addKey('ticker');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:52:            $this->forge->addKey('recorded_at');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:53:            $this->forge->createTable('bf_investment_forecast_history');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:57:            $this->forge->addField([
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:68:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:69:            $this->forge->addKey('alert_id');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:70:            $this->forge->addKey('status');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:71:            $this->forge->addKey('run_after');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:72:            $this->forge->createTable('bf_investment_forecast_jobs');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:75:        if ($this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:87:                if (! $this->db->fieldExists($name, 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:88:                    $this->forge->addColumn('bf_investment_trade_alerts', [$name => $definition]);
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:93:                $this->db->query('CREATE INDEX latest_forecast_id ON bf_investment_trade_alerts (latest_forecast_id)');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:112:        if ($this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:124:                if ($this->db->fieldExists($column, 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:125:                    $this->forge->dropColumn('bf_investment_trade_alerts', $column);
app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php:12:            $this->forge->addField([
app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php:32:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php:33:            $this->forge->addKey('forecast_id');
app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php:34:            $this->forge->addKey('ticker');
app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php:35:            $this->forge->addKey('timeframe');
app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php:36:            $this->forge->addKey('evaluation_window');
app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php:37:            $this->forge->addKey('created_at');
app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php:38:            $this->forge->createTable('bf_investment_forecast_accuracy');
app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php:12:            $this->forge->addField([
app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php:26:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php:27:            $this->forge->addKey('forecast_id');
app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php:28:            $this->forge->addKey(['ticker', 'timeframe']);
app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php:29:            $this->forge->addKey('evaluation_minutes');
app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php:30:            $this->forge->addKey('recorded_at');
app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php:31:            $this->forge->createTable('bf_investment_forecast_accuracy');
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:23:            $this->forge->addField([
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:39:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:40:            $this->forge->addKey('task_key', false, true);
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:41:            $this->forge->addKey('status');
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:42:            $this->forge->addKey('locked_at');
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:43:            $this->forge->addKey('assigned_to');
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:44:            $this->forge->createTable('bf_aiops_tasks', true, $tableAttributes);
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:49:            $this->forge->addField([
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:60:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:61:            $this->forge->addKey('task_id');
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:62:            $this->forge->addKey('status');
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:63:            $this->forge->addKey('created_at');
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:64:            $this->forge->createTable('bf_aiops_task_runs', true, $tableAttributes);
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:69:            $this->forge->addField([
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:78:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:79:            $this->forge->addKey('task_key', false, true);
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:80:            $this->forge->createTable('bf_aiops_registry', true, $tableAttributes);
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:85:            $this->forge->addField([
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:91:            $this->forge->addKey('setting_key', true);
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:92:            $this->forge->createTable('bf_aiops_settings', true, $tableAttributes);
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:97:            $this->forge->addField([
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:113:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:114:            $this->forge->addKey('status');
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:115:            $this->forge->addKey('received_at');
app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:116:            $this->forge->createTable('bf_ops_command_inbox', true, $tableAttributes);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:13:        $this->forge->addField([
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:71:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:72:        $this->forge->addKey(['item_type', 'category']);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:73:        $this->forge->addKey(['symbol']);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:74:        $this->forge->createTable('bf_research_items', true);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:76:        $this->forge->addField([
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:117:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:118:        $this->forge->addKey(['metric_type', 'metric_key']);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:119:        $this->forge->addKey(['symbol']);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:120:        $this->forge->createTable('bf_research_metrics', true);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:122:        $this->forge->addField([
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:153:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:154:        $this->forge->addKey(['task_name', 'status']);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:155:        $this->forge->createTable('bf_research_runs', true);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:157:        $this->forge->addField([
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:188:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-07-210000_CreateResearchTables.php:190:        $this->forge->createTable('bf_import_files', true);
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:20:            $this->forge->addField([
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:32:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:33:            $this->forge->addKey('chat_file', false, true);
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:34:            $this->forge->addKey('project');
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:35:            $this->forge->addKey('chat_date');
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:36:            $this->forge->addKey('overall_status');
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:37:            $this->forge->createTable('bf_chat_archives', true, $tableAttributes);
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:41:            $this->forge->addField([
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:49:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:50:            $this->forge->addKey('chat_archive_id');
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:51:            $this->forge->addKey(['chat_archive_id', 'step'], false, true);
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:52:            $this->forge->addKey('step');
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:53:            $this->forge->addKey('status');
app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:54:            $this->forge->createTable('bf_chat_steps', true, $tableAttributes);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:22:            $this->forge->addField([
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:39:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:40:            $this->forge->addKey('run_key');
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:41:            $this->forge->addKey('status');
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:42:            $this->forge->addKey('started_at');
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:43:            $this->forge->createTable('bf_aiops_runs', true, $tableAttributes);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:47:            $this->forge->addField([
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:61:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:62:            $this->forge->addKey(['mailbox', 'imap_uid'], false, true);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:63:            $this->forge->addKey('received_at');
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:64:            $this->forge->addKey('from_email');
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:65:            $this->forge->createTable('bf_aiops_email_processed', true, $tableAttributes);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:69:            $this->forge->addField([
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:79:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:80:            $this->forge->addKey(['ticker', 'scan_date', 'source', 'scanner_key'], false, true);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:81:            $this->forge->addKey('scan_date');
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:82:            $this->forge->addKey('scanner_key');
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:83:            $this->forge->createTable('bf_investment_ticker_daily_counts', true, $tableAttributes);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:87:            $this->forge->addField([
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:96:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:97:            $this->forge->addKey(['scanner_key', 'scanner_name', 'source'], false, true);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:98:            $this->forge->addKey('scanner_key');
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:99:            $this->forge->createTable('bf_investment_scanner_lineage', true, $tableAttributes);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:12:            $this->forge->addField([
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:21:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:23:            $this->forge->addKey('created_on', false, false, 'idx_mdit_investor_profiles_created_on');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:24:            $this->forge->addKey('kyc_status', false, false, 'idx_mdit_investor_profiles_kyc_status');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:25:            $this->forge->addKey('accreditation_status', false, false, 'idx_mdit_investor_profiles_accreditation_status');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:26:            $this->forge->createTable('bf_mdit_investor_profiles', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:30:            $this->forge->addField([
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:39:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:41:            $this->forge->addKey('user_id', false, false, 'idx_mdit_wallets_user_id');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:42:            $this->forge->addKey('status', false, false, 'idx_mdit_wallets_status');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:43:            $this->forge->addKey('created_on', false, false, 'idx_mdit_wallets_created_on');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:44:            $this->forge->createTable('bf_mdit_wallets', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:48:            $this->forge->addField([
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:63:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:64:            $this->forge->addKey('user_id', false, false, 'idx_mdit_deposits_user_id');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:65:            $this->forge->addKey('status', false, false, 'idx_mdit_deposits_status');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:66:            $this->forge->addKey('created_on', false, false, 'idx_mdit_deposits_created_on');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:69:            $this->forge->createTable('bf_mdit_deposits', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:73:            $this->forge->addField([
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:86:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:87:            $this->forge->addKey('user_id', false, false, 'idx_mdit_ledger_user_id');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:88:            $this->forge->addKey('status', false, false, 'idx_mdit_ledger_status');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:89:            $this->forge->addKey('source_deposit_id', false, false, 'idx_mdit_ledger_source_deposit_id');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:90:            $this->forge->addKey('source_redemption_id', false, false, 'idx_mdit_ledger_source_redemption_id');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:91:            $this->forge->createTable('bf_mdit_token_ledger', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:95:            $this->forge->addField([
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:108:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:109:            $this->forge->addKey('user_id', false, false, 'idx_mdit_redemptions_user_id');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:110:            $this->forge->addKey('status', false, false, 'idx_mdit_redemptions_status');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:111:            $this->forge->addKey('requested_on', false, false, 'idx_mdit_redemptions_requested_on');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:112:            $this->forge->createTable('bf_mdit_redemptions', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:116:            $this->forge->addField([
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:126:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:128:            $this->forge->addKey('created_on', false, false, 'idx_mdit_nav_snapshots_created_on');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:129:            $this->forge->createTable('bf_mdit_nav_snapshots', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:133:            $this->forge->addField([
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:141:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:142:            $this->forge->addKey('user_id', false, false, 'idx_mdit_disclosures_user_id');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:143:            $this->forge->addKey('accepted_on', false, false, 'idx_mdit_disclosures_accepted_on');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:144:            $this->forge->createTable('bf_mdit_disclosures_acceptance', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:148:            $this->forge->addField([
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:160:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:162:            $this->forge->addKey('status', false, false, 'idx_mdit_webhook_events_status');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:163:            $this->forge->addKey('received_on', false, false, 'idx_mdit_webhook_events_received_on');
app/Database/Migrations/2026-04-01-000105_CreateMditPhase1Tables.php:164:            $this->forge->createTable('bf_mdit_webhook_events', true);
app/Database/Migrations/2026-03-20-000110_CreateScannerTaxonomy.php:12:            $this->forge->addField([
app/Database/Migrations/2026-03-20-000110_CreateScannerTaxonomy.php:21:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-20-000110_CreateScannerTaxonomy.php:22:            $this->forge->addKey('scanner_key');
app/Database/Migrations/2026-03-20-000110_CreateScannerTaxonomy.php:24:            $this->forge->createTable('bf_scanner_taxonomy');
app/Database/Migrations/2026-03-20-000120_CreateTradeAlertScannerMeta.php:12:            $this->forge->addField([
app/Database/Migrations/2026-03-20-000120_CreateTradeAlertScannerMeta.php:22:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-20-000120_CreateTradeAlertScannerMeta.php:23:            $this->forge->addKey('alert_id');
app/Database/Migrations/2026-03-20-000120_CreateTradeAlertScannerMeta.php:24:            $this->forge->addKey('scanner_key');
app/Database/Migrations/2026-03-20-000120_CreateTradeAlertScannerMeta.php:25:            $this->forge->createTable('bf_trade_alert_scanner_meta');
app/Database/Migrations/2026-03-20-000130_CreateAiOpsManualTodos.php:12:            $this->forge->addField([
app/Database/Migrations/2026-03-20-000130_CreateAiOpsManualTodos.php:21:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-20-000130_CreateAiOpsManualTodos.php:22:            $this->forge->addKey('status');
app/Database/Migrations/2026-03-20-000130_CreateAiOpsManualTodos.php:23:            $this->forge->createTable('bf_aiops_manual_todos');
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:12:            $this->forge->addField([
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:25:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:27:            $this->forge->createTable('aiops_scan_state');
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:31:            $this->forge->addField([
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:44:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:45:            $this->forge->addKey('scanner_name');
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:46:            $this->forge->addKey('file_path');
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:48:            $this->forge->createTable('aiops_work_queue');
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:52:            $this->forge->addField([
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:62:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:63:            $this->forge->addKey('scanner_name');
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:64:            $this->forge->addKey('file_path');
app/Database/Migrations/2026-04-20-000100_CreateAiOpsCellDiscoveryTables.php:66:            $this->forge->createTable('aiops_review_ledger');
app/Database/Migrations/2026-02-09-000002_CreateUserIpHistory.php:11:        $this->forge->addField([
app/Database/Migrations/2026-02-09-000002_CreateUserIpHistory.php:24:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-09-000002_CreateUserIpHistory.php:25:        $this->forge->addKey(['user_id', 'ip_address']);
app/Database/Migrations/2026-02-09-000002_CreateUserIpHistory.php:26:        $this->forge->addKey(['email', 'ip_address']);
app/Database/Migrations/2026-02-09-000002_CreateUserIpHistory.php:27:        $this->forge->createTable('bf_user_ip_history', true);
app/Database/Migrations/2026-01-15-000110_CreateChatToolRuns.php:13:        $this->forge->addField([
app/Database/Migrations/2026-01-15-000110_CreateChatToolRuns.php:24:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-01-15-000110_CreateChatToolRuns.php:25:        $this->forge->addKey(['user_id', 'tool']);
app/Database/Migrations/2026-01-15-000110_CreateChatToolRuns.php:26:        $this->forge->createTable('bf_chat_tool_runs', true);
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:12:            $this->forge->addField([
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:30:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:33:            $this->forge->createTable('bf_public_pages_catalog');
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:37:            $this->forge->addField([
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:45:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:47:            $this->forge->createTable('bf_public_pages_runs');
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:51:            $this->forge->addField([
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:63:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:64:            $this->forge->addKey(['run_id', 'page_id']);
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:65:            $this->forge->createTable('bf_public_pages_sources');
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:69:            $this->forge->addField([
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:86:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:87:            $this->forge->addKey(['page_id', 'run_id']);
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:88:            $this->forge->createTable('bf_public_pages_drafts');
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:92:            $this->forge->addField([
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:102:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:103:            $this->forge->addKey('page_id');
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:104:            $this->forge->createTable('bf_public_pages_published');
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:108:            $this->forge->addField([
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:115:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-05-01-000100_CreateAiOpsPublicPagesTables.php:117:            $this->forge->createTable('bf_public_pages_query_presets');
app/Database/Migrations/2026-02-13-120000_CreateEconomicDataTables.php:12:            $this->forge->addField([
app/Database/Migrations/2026-02-13-120000_CreateEconomicDataTables.php:22:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-13-120000_CreateEconomicDataTables.php:24:            $this->forge->createTable('bf_economic_indicators');
app/Database/Migrations/2026-02-13-120000_CreateEconomicDataTables.php:28:            $this->forge->addField([
app/Database/Migrations/2026-02-13-120000_CreateEconomicDataTables.php:35:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-13-120000_CreateEconomicDataTables.php:36:            $this->forge->addKey('indicator_id');
app/Database/Migrations/2026-02-13-120000_CreateEconomicDataTables.php:38:            $this->forge->createTable('bf_economic_data_points');
app/Database/Migrations/2026-06-01-000100_CreateStockFundamentalsTable.php:15:        $this->forge->addField([
app/Database/Migrations/2026-06-01-000100_CreateStockFundamentalsTable.php:23:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-06-01-000100_CreateStockFundamentalsTable.php:24:        $this->forge->addKey('ticker');
app/Database/Migrations/2026-06-01-000100_CreateStockFundamentalsTable.php:25:        $this->forge->createTable('bf_stock_fundamentals');
app/Database/Migrations/2026-02-21-000300_CreateFrontendIncidents.php:11:        $this->forge->addField([
app/Database/Migrations/2026-02-21-000300_CreateFrontendIncidents.php:61:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-21-000300_CreateFrontendIncidents.php:62:        $this->forge->addKey(['incident_type', 'severity']);
app/Database/Migrations/2026-02-21-000300_CreateFrontendIncidents.php:63:        $this->forge->addKey(['status', 'created_at']);
app/Database/Migrations/2026-02-21-000300_CreateFrontendIncidents.php:64:        $this->forge->addKey(['endpoint']);
app/Database/Migrations/2026-02-21-000300_CreateFrontendIncidents.php:65:        $this->forge->createTable('bf_frontend_incidents', true);
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:14:            $this->forge->addField([
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:28:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:30:            $this->forge->addKey(['status', 'created_on']);
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:31:            $this->forge->createTable('bf_scanner_jobs');
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:35:            $this->forge->addField([
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:56:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:57:            $this->forge->addKey('job_id');
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:58:            $this->forge->addKey(['symbol', 'timeframe', 'occurred_on']);
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:59:            $this->forge->addKey(['signal', 'direction', 'occurred_on']);
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:60:            $this->forge->createTable('bf_scanner_results');
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:64:            $this->forge->addField([
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:72:            $this->forge->addKey('symbol', true);
app/Database/Migrations/2026-04-01-000001_CreateScannerTables.php:73:            $this->forge->createTable('bf_scanner_symbol_universe');
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:13:        $this->forge->addField([
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:28:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:29:        $this->forge->addKey('status');
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:30:        $this->forge->addKey('model');
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:31:        $this->forge->createTable('bf_ollama_runs', true);
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:33:        $this->forge->addField([
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:41:        $this->forge->addKey('session_id', true);
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:42:        $this->forge->addKey('updated_at');
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:43:        $this->forge->createTable('bf_ollama_sessions', true);
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:45:        $this->forge->addField([
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:57:        $this->forge->addKey('job_id', true);
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:58:        $this->forge->addKey('status');
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:59:        $this->forge->addKey('created_at');
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:60:        $this->forge->createTable('bf_ollama_queue', true);
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:62:        $this->forge->addField([
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:72:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:73:        $this->forge->addKey('doc_id');
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:74:        $this->forge->addKey('chunk_id');
app/Database/Migrations/2026-07-01-000110_CreateOllamaControlTables.php:75:        $this->forge->createTable('bf_ollama_embeddings', true);
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:12:        $this->forge->addField([
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:32:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:33:        $this->forge->addKey('fingerprint', false, true);
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:34:        $this->forge->createTable('bf_error_patterns', true);
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:37:        $this->forge->addField([
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:50:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:51:        $this->forge->addKey('run_uuid', false, true);
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:52:        $this->forge->createTable('bf_error_learning_runs', true);
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:55:        $this->forge->addField([
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:69:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:70:        $this->forge->createTable('bf_error_alert_rules', true);
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:73:        $this->forge->addField([
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:86:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:87:        $this->forge->addKey('rule_id');
app/Database/Migrations/2026-02-22-000001_AddErrorPatternLearning.php:88:        $this->forge->createTable('bf_error_alert_events', true);
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:13:        if (! $this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:17:        $fields = $this->db->getFieldData('bf_investment_trade_alerts');
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:27:            $this->forge->addColumn('bf_investment_trade_alerts', [
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:37:        $this->db->query("UPDATE bf_investment_trade_alerts SET source = 'scanner' WHERE source IS NULL OR source = ''");
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:40:            $this->db->query('ALTER TABLE bf_investment_trade_alerts ADD UNIQUE KEY uniq_ticker_status_source (ticker, status, source)');
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:48:        if (! $this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:53:            $this->db->query('ALTER TABLE bf_investment_trade_alerts DROP INDEX uniq_ticker_status_source');
app/Database/Migrations/2026-06-20-000100_CreateAiOpsFormTests.php:13:        $this->forge->addField([
app/Database/Migrations/2026-06-20-000100_CreateAiOpsFormTests.php:88:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-06-20-000100_CreateAiOpsFormTests.php:89:        $this->forge->addKey('source_type');
app/Database/Migrations/2026-06-20-000100_CreateAiOpsFormTests.php:90:        $this->forge->addKey('http_method');
app/Database/Migrations/2026-06-20-000100_CreateAiOpsFormTests.php:91:        $this->forge->addKey('error_detected');
app/Database/Migrations/2026-06-20-000100_CreateAiOpsFormTests.php:92:        $this->forge->addKey('patch_job_created');
app/Database/Migrations/2026-06-20-000100_CreateAiOpsFormTests.php:93:        $this->forge->addKey('created_at');
app/Database/Migrations/2026-06-20-000100_CreateAiOpsFormTests.php:95:        $this->forge->createTable('bf_aiops_form_tests', true);
app/Database/Migrations/2006-04-18-000001_CreateFinancialNewsTable.php:11:        $this->forge->addField([
app/Database/Migrations/2006-04-18-000001_CreateFinancialNewsTable.php:45:        $this->forge->addKey('id', true);
app/Database/Migrations/2006-04-18-000001_CreateFinancialNewsTable.php:46:        $this->forge->createTable('bf_financial_news', true);
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:12:            $this->forge->addField([
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:23:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:25:            $this->forge->createTable('bf_api_endpoints');
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:29:            $this->forge->addField([
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:43:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:45:            $this->forge->createTable('bf_api_endpoint_rules');
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:49:            $this->forge->addField([
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:58:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:60:            $this->forge->createTable('bf_api_audit_runs');
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:64:            $this->forge->addField([
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:75:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:76:            $this->forge->addKey('run_id');
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:77:            $this->forge->addKey('endpoint_id');
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:78:            $this->forge->createTable('bf_api_audit_findings');
app/Database/Migrations/2026-07-01-000100_CreateAiOpsLifecycleTables.php:12:            $this->forge->addField([
app/Database/Migrations/2026-07-01-000100_CreateAiOpsLifecycleTables.php:24:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-07-01-000100_CreateAiOpsLifecycleTables.php:25:            $this->forge->addKey('service_name');
app/Database/Migrations/2026-07-01-000100_CreateAiOpsLifecycleTables.php:26:            $this->forge->createTable('bf_aiops_services');
app/Database/Migrations/2026-07-01-000100_CreateAiOpsLifecycleTables.php:33:            $this->forge->addField([
app/Database/Migrations/2026-07-01-000100_CreateAiOpsLifecycleTables.php:39:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-07-01-000100_CreateAiOpsLifecycleTables.php:41:            $this->forge->createTable('bf_aiops_schema_cache');
app/Database/Migrations/2026-07-01-000100_CreateAiOpsLifecycleTables.php:46:            $this->forge->addField([
app/Database/Migrations/2026-07-01-000100_CreateAiOpsLifecycleTables.php:54:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-07-01-000100_CreateAiOpsLifecycleTables.php:55:            $this->forge->createTable('bf_aiops_query_audit');
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:16:            $this->forge->addField([
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:54:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:55:            $this->forge->addKey(['platform', 'status']);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:56:            $this->forge->addKey(['source_type', 'source_id']);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:57:            $this->forge->addKey(['symbol', 'topic']);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:58:            $this->forge->createTable('bf_marketing_video_content', true, $tableAttributes);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:62:            $this->forge->addField([
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:73:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:74:            $this->forge->addKey('video_content_id');
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:76:            $this->forge->createTable('bf_marketing_video_assets', true, $tableAttributes);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:80:            $this->forge->addField([
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:88:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:89:            $this->forge->addKey('video_content_id');
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:91:            $this->forge->createTable('bf_marketing_video_versions', true, $tableAttributes);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:95:            $this->forge->addField([
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:111:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:112:            $this->forge->addKey(['platform', 'video_type']);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:113:            $this->forge->createTable('bf_marketing_video_templates', true, $tableAttributes);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:117:            $this->forge->addField([
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:128:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:129:            $this->forge->addKey(['video_content_id', 'status']);
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php:131:            $this->forge->createTable('bf_marketing_publish_queue', true, $tableAttributes);
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:11:        if (! $this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:15:        if (! $this->db->fieldExists('email_identifier', 'bf_investment_scraper')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:16:            $this->forge->addColumn('bf_investment_scraper', [
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:27:        if (! $this->indexExists('bf_investment_scraper', 'idx_scraper_email_identifier')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:28:            $this->db->query('CREATE INDEX `idx_scraper_email_identifier` ON `bf_investment_scraper` (`email_identifier`)');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:31:        $sourceHashUnique = $this->indexExists('bf_investment_scraper', 'uq_scraper_source_hash');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:32:        if (! $sourceHashUnique && $this->db->fieldExists('source', 'bf_investment_scraper') && $this->db->fieldExists('message_hash', 'bf_investment_scraper')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:34:                if ($this->indexExists('bf_investment_scraper', 'idx_scraper_source_hash')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:35:                    $this->db->query('DROP INDEX `idx_scraper_source_hash` ON `bf_investment_scraper`');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:38:                $this->db->query('CREATE UNIQUE INDEX `uq_scraper_source_hash` ON `bf_investment_scraper` (`source`, `message_hash`)');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:45:        if (! $this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:49:        if ($this->indexExists('bf_investment_scraper', 'uq_scraper_source_hash')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:50:            $this->db->query('DROP INDEX `uq_scraper_source_hash` ON `bf_investment_scraper`');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:53:        if ($this->indexExists('bf_investment_scraper', 'idx_scraper_email_identifier')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:54:            $this->db->query('DROP INDEX `idx_scraper_email_identifier` ON `bf_investment_scraper`');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:62:FROM `bf_investment_scraper`
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:12:            $this->forge->addField([
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:23:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:24:            $this->forge->addKey(['project_id', 'user_id'], false, false, 'idx_project_user');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:25:            $this->forge->addKey('project_id', false, false, 'idx_project');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:26:            $this->forge->addKey('user_id', false, false, 'idx_user');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:27:            $this->forge->createTable('bf_projects_fund_holders');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:31:            $this->forge->addField([
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:46:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:47:            $this->forge->addKey('project_id', false, false, 'idx_project');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:48:            $this->forge->addKey('user_id', false, false, 'idx_user');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:49:            $this->forge->addKey('transaction_type', false, false, 'idx_type');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:50:            $this->forge->createTable('bf_projects_fund_transactions');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:54:            $this->forge->addField([
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:63:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:64:            $this->forge->addKey('project_id', false, false, 'idx_project');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:65:            $this->forge->addKey('created_at', false, false, 'idx_created');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:66:            $this->forge->createTable('bf_projects_fund_nav_history');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:70:            $this->forge->addField([
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:81:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:82:            $this->forge->addKey('project_id', false, false, 'idx_project');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:83:            $this->forge->addKey('status', false, false, 'idx_status');
app/Database/Migrations/2026-03-26-000110_CreateProjectFundLedgerTables.php:84:            $this->forge->createTable('bf_projects_fund_distributions');
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:12:            $this->forge->addField([
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:25:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:26:            $this->forge->addKey(['project_id', 'user_id']);
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:27:            $this->forge->addKey('kyc_status');
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:28:            $this->forge->addKey('investor_eligibility');
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:29:            $this->forge->createTable('bf_projects_fund_investor_profiles');
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:33:            $this->forge->addField([
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:44:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:45:            $this->forge->addKey('project_id');
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:46:            $this->forge->addKey('flow_type');
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:47:            $this->forge->addKey('created_at');
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:48:            $this->forge->createTable('bf_projects_fund_capital_flows');
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:52:            $this->forge->addField([
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:60:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:61:            $this->forge->addKey('project_id');
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:62:            $this->forge->addKey('actor_user_id');
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:63:            $this->forge->addKey('action_type');
app/Database/Migrations/2026-03-26-000120_AddFundComplianceAndOpsTables.php:64:            $this->forge->createTable('bf_projects_fund_audit_logs');
app/Database/Migrations/2026-03-30-000100_CreateRouteErrorHeatmapTable.php:13:        $this->forge->addField([
app/Database/Migrations/2026-03-30-000100_CreateRouteErrorHeatmapTable.php:51:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-30-000100_CreateRouteErrorHeatmapTable.php:53:        $this->forge->createTable('bf_route_error_heatmap', true);
app/Database/Migrations/2026-03-30-000300_CreateSystemErrorsFoundationTables.php:13:        $this->forge->addField([
app/Database/Migrations/2026-03-30-000300_CreateSystemErrorsFoundationTables.php:55:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-30-000300_CreateSystemErrorsFoundationTables.php:56:        $this->forge->addKey('route');
app/Database/Migrations/2026-03-30-000300_CreateSystemErrorsFoundationTables.php:57:        $this->forge->addKey('classification');
app/Database/Migrations/2026-03-30-000300_CreateSystemErrorsFoundationTables.php:58:        $this->forge->createTable('system_errors', true);
app/Database/Migrations/2026-03-30-000300_CreateSystemErrorsFoundationTables.php:60:        $this->forge->addField([
app/Database/Migrations/2026-03-30-000300_CreateSystemErrorsFoundationTables.php:82:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-03-30-000300_CreateSystemErrorsFoundationTables.php:84:        $this->forge->createTable('error_heatmap', true);
app/Database/Migrations/2026-04-01-000100_CreateCalendarAutomationTables.php:11:        $this->forge->addField([
app/Database/Migrations/2026-04-01-000100_CreateCalendarAutomationTables.php:68:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000100_CreateCalendarAutomationTables.php:70:        $this->forge->createTable('calendar_trigger_inbox', true);
app/Database/Migrations/2026-04-01-000100_CreateCalendarAutomationTables.php:72:        $this->forge->addField([
app/Database/Migrations/2026-04-01-000100_CreateCalendarAutomationTables.php:104:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000100_CreateCalendarAutomationTables.php:106:        $this->forge->createTable('automation_routes', true);
app/Database/Migrations/2026-04-01-000100_CreateCalendarAutomationTables.php:108:        $this->forge->addField([
app/Database/Migrations/2026-04-01-000100_CreateCalendarAutomationTables.php:156:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-01-000100_CreateCalendarAutomationTables.php:158:        $this->forge->addKey(['status', 'run_after'], false, false, 'idx_automation_jobs_status_run_after');
app/Database/Migrations/2026-04-01-000100_CreateCalendarAutomationTables.php:159:        $this->forge->createTable('automation_jobs', true);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:11:        if (! $this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:17:        if (! $this->db->fieldExists('email_identifier', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:20:        if (! $this->db->fieldExists('email_sender', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:23:        if (! $this->db->fieldExists('source', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:26:        if (! $this->db->fieldExists('account_type', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:29:        if (! $this->db->fieldExists('email_type', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:32:        if (! $this->db->fieldExists('metadata', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:35:        if (! $this->db->fieldExists('created_on', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:38:        if (! $this->db->fieldExists('updated_at', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:43:            $this->forge->addColumn('bf_investment_scraper', $fields);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:46:        $this->addIndexIfMissing('bf_investment_scraper', 'idx_email_identifier', ['email_identifier']);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:47:        $this->addIndexIfMissing('bf_investment_scraper', 'idx_status', ['status']);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:48:        $this->addIndexIfMissing('bf_investment_scraper', 'idx_email_date', ['email_date']);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:53:        if (! $this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:57:        $this->dropIndexIfExists('bf_investment_scraper', 'idx_email_identifier');
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:58:        $this->dropIndexIfExists('bf_investment_scraper', 'idx_status');
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:59:        $this->dropIndexIfExists('bf_investment_scraper', 'idx_email_date');
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:11:        $this->forge->addField([
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:26:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:27:        $this->forge->addKey('user_id');
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:28:        $this->forge->createTable('bf_marketing_notifications', true);
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:30:        $this->forge->addField([
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:39:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:40:        $this->forge->createTable('bf_marketing_stories', true);
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:42:        $this->forge->addField([
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:52:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:53:        $this->forge->addKey('story_id');
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:54:        $this->forge->addKey('notification_id');
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:55:        $this->forge->createTable('bf_marketing_story_updates', true);
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:57:        $this->forge->addField([
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:65:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:66:        $this->forge->addKey('notification_id');
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:67:        $this->forge->addKey('story_id');
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php:68:        $this->forge->createTable('bf_marketing_generated_content', true);
app/Database/Migrations/2026-04-09-120000_EnhanceMarketingGenerationPipeline.php:35:            $this->forge->addField([
app/Database/Migrations/2026-04-09-120000_EnhanceMarketingGenerationPipeline.php:44:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-09-120000_EnhanceMarketingGenerationPipeline.php:45:            $this->forge->addKey('generated_content_id');
app/Database/Migrations/2026-04-09-120000_EnhanceMarketingGenerationPipeline.php:46:            $this->forge->createTable('bf_marketing_distribution_log', true);
app/Database/Migrations/2026-04-09-120000_EnhanceMarketingGenerationPipeline.php:50:            $this->forge->addField([
app/Database/Migrations/2026-04-09-120000_EnhanceMarketingGenerationPipeline.php:58:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-09-120000_EnhanceMarketingGenerationPipeline.php:59:            $this->forge->addKey('generated_content_id');
app/Database/Migrations/2026-04-09-120000_EnhanceMarketingGenerationPipeline.php:60:            $this->forge->createTable('bf_marketing_generated_content_versions', true);
app/Database/Migrations/2026-04-09-130000_HardenMarketingNewsPipelineSchema.php:25:            $this->forge->addField([
app/Database/Migrations/2026-04-09-130000_HardenMarketingNewsPipelineSchema.php:36:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-09-130000_HardenMarketingNewsPipelineSchema.php:37:            $this->forge->addKey('generated_content_id');
app/Database/Migrations/2026-04-09-130000_HardenMarketingNewsPipelineSchema.php:38:            $this->forge->createTable('bf_marketing_distribution_log', true);
app/Database/Migrations/2026-04-11-120000_AddEmailQueueTrackingColumns.php:12:        $this->ensureColumns('bf_investment_scraper');
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:66:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:72:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:74:        $this->forge->createTable('bf_prop_firms', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:79:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:98:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:99:        $this->forge->addKey('prop_firm_id');
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:102:        $this->forge->createTable('bf_prop_rule_sets', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:107:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:113:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:114:        $this->forge->addKey(['prop_rule_set_id', 'symbol']);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:116:        $this->forge->createTable('bf_prop_allowed_symbols', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:121:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:131:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:133:        $this->forge->addKey(['user_id', 'prop_firm_id']);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:136:        $this->forge->createTable('bf_user_prop_accounts', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:141:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:149:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:150:        $this->forge->addKey('user_prop_account_id');
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:152:        $this->forge->createTable('bf_prop_broker_connections', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:157:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:169:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:170:        $this->forge->addKey(['user_prop_account_id', 'symbol']);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:173:        $this->forge->createTable('bf_prop_orders', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:178:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:186:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:187:        $this->forge->addKey('prop_order_id');
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:189:        $this->forge->createTable('bf_prop_fills', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:194:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:204:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:207:        $this->forge->createTable('bf_prop_positions', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:212:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:219:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:220:        $this->forge->addKey(['user_prop_account_id', 'recorded_at']);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:222:        $this->forge->createTable('bf_prop_equity_history', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:227:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:235:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:236:        $this->forge->addKey(['symbol', 'triggered_at']);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:238:        $this->forge->createTable('bf_prop_signals', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:243:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:250:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:251:        $this->forge->addKey(['user_prop_account_id', 'sequence_no']);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:253:        $this->forge->createTable('bf_prop_replay_events', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:258:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:265:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:266:        $this->forge->addKey('prop_replay_event_id');
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:268:        $this->forge->createTable('bf_prop_replay_diagnostics', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:273:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:281:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:282:        $this->forge->addKey(['channel', 'status']);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:284:        $this->forge->createTable('bf_prop_notifications', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:289:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:297:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:298:        $this->forge->addKey(['user_prop_account_id', 'trade_date']);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:301:        $this->forge->createTable('bf_prop_trade_journal', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:306:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:314:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:315:        $this->forge->addKey(['user_prop_account_id', 'captured_at']);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:317:        $this->forge->createTable('bf_prop_chart_snapshots', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:322:        $this->forge->addField($this->addStandardFields() + [
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:330:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:331:        $this->forge->addKey(['user_prop_account_id', 'started_at']);
app/Database/Migrations/2026-04-11-220000_CreatePropFirmsTables.php:333:        $this->forge->createTable('bf_prop_sync_logs', true);
app/Database/Migrations/2026-04-12-120000_CreateApiResearchRuns.php:13:        $this->forge->addField([
app/Database/Migrations/2026-04-12-120000_CreateApiResearchRuns.php:98:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-12-120000_CreateApiResearchRuns.php:99:        $this->forge->addKey('provider_slug');
app/Database/Migrations/2026-04-12-120000_CreateApiResearchRuns.php:100:        $this->forge->addKey('status');
app/Database/Migrations/2026-04-12-120000_CreateApiResearchRuns.php:101:        $this->forge->createTable('bf_api_research_runs', true);
app/Database/Migrations/2026-04-12-120100_CreateApiResearchPages.php:13:        $this->forge->addField([
app/Database/Migrations/2026-04-12-120100_CreateApiResearchPages.php:78:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-12-120100_CreateApiResearchPages.php:79:        $this->forge->addKey('run_id');
app/Database/Migrations/2026-04-12-120100_CreateApiResearchPages.php:80:        $this->forge->addKey('url_hash');
app/Database/Migrations/2026-04-12-120100_CreateApiResearchPages.php:81:        $this->forge->createTable('bf_api_research_pages', true);
app/Database/Migrations/2026-04-12-120300_CreateApiResearchEndpoints.php:13:        $this->forge->addField([
app/Database/Migrations/2026-04-12-120300_CreateApiResearchEndpoints.php:88:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-12-120300_CreateApiResearchEndpoints.php:89:        $this->forge->addKey('run_id');
app/Database/Migrations/2026-04-12-120300_CreateApiResearchEndpoints.php:90:        $this->forge->addKey('method');
app/Database/Migrations/2026-04-12-120300_CreateApiResearchEndpoints.php:91:        $this->forge->addKey('spec_id');
app/Database/Migrations/2026-04-12-120300_CreateApiResearchEndpoints.php:92:        $this->forge->createTable('bf_api_research_endpoints', true);
app/Database/Migrations/2026-04-12-120400_CreateApiResearchDiffs.php:13:        $this->forge->addField([
app/Database/Migrations/2026-04-12-120400_CreateApiResearchDiffs.php:63:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-12-120400_CreateApiResearchDiffs.php:64:        $this->forge->addKey('provider_slug');
app/Database/Migrations/2026-04-12-120400_CreateApiResearchDiffs.php:65:        $this->forge->createTable('bf_api_research_diffs', true);
app/Database/Migrations/2026-04-13-120000_CreateDiscordOpsTables.php:13:        $this->forge->addField([
app/Database/Migrations/2026-04-13-120000_CreateDiscordOpsTables.php:28:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-13-120000_CreateDiscordOpsTables.php:29:        $this->forge->addKey(['channel_key', 'created_on']);
app/Database/Migrations/2026-04-13-120000_CreateDiscordOpsTables.php:30:        $this->forge->createTable('bf_discord_manual_messages', true);
app/Database/Migrations/2026-04-13-120000_CreateDiscordOpsTables.php:32:        $this->forge->addField([
app/Database/Migrations/2026-04-13-120000_CreateDiscordOpsTables.php:43:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-13-120000_CreateDiscordOpsTables.php:44:        $this->forge->addKey(['relay_type', 'created_on']);
app/Database/Migrations/2026-04-13-120000_CreateDiscordOpsTables.php:45:        $this->forge->createTable('bf_discord_relay_audit', true);
app/Database/Migrations/2026-02-09-000001_CreateSupportTickets.php:11:        $this->forge->addField([
app/Database/Migrations/2026-02-09-000001_CreateSupportTickets.php:26:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-09-000001_CreateSupportTickets.php:27:        $this->forge->addKey(['user_id', 'status']);
app/Database/Migrations/2026-02-09-000001_CreateSupportTickets.php:28:        $this->forge->createTable('bf_support_tickets', true);
app/Database/Migrations/2026-02-09-000001_CreateSupportTickets.php:30:        $this->forge->addField([
app/Database/Migrations/2026-02-09-000001_CreateSupportTickets.php:37:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-02-09-000001_CreateSupportTickets.php:38:        $this->forge->addKey(['ticket_id', 'event_type']);
app/Database/Migrations/2026-02-09-000001_CreateSupportTickets.php:39:        $this->forge->createTable('bf_support_ticket_events', true);
app/Database/Migrations/2026-04-12-120050_CreateMarketingDistributionTargets.php:12:            $this->forge->addField([
app/Database/Migrations/2026-04-12-120050_CreateMarketingDistributionTargets.php:30:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-12-120050_CreateMarketingDistributionTargets.php:31:            $this->forge->addKey('generated_content_id');
app/Database/Migrations/2026-04-12-120050_CreateMarketingDistributionTargets.php:32:            $this->forge->addKey('status');
app/Database/Migrations/2026-04-12-120050_CreateMarketingDistributionTargets.php:34:            $this->forge->createTable('bf_marketing_distribution_targets', true);
app/Database/Migrations/2026-04-12-120050_CreateMarketingDistributionTargets.php:44:            $this->forge->addField([
app/Database/Migrations/2026-04-12-120050_CreateMarketingDistributionTargets.php:54:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-12-120050_CreateMarketingDistributionTargets.php:55:            $this->forge->addKey('generated_content_id');
app/Database/Migrations/2026-04-12-120050_CreateMarketingDistributionTargets.php:56:            $this->forge->createTable('bf_marketing_in_app_notifications', true);
app/Database/Migrations/2026-06-15-000110_CreateAiopsChatAdminTable.php:17:        $this->forge->addField([
app/Database/Migrations/2026-06-15-000110_CreateAiopsChatAdminTable.php:45:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-06-15-000110_CreateAiopsChatAdminTable.php:46:        $this->forge->addKey('instruction_id', false, false, 'idx_instruction_id');
app/Database/Migrations/2026-06-15-000110_CreateAiopsChatAdminTable.php:47:        $this->forge->addKey('created_at', false, false, 'idx_created_at');
app/Database/Migrations/2026-06-15-000110_CreateAiopsChatAdminTable.php:49:        $this->forge->createTable('bf_aiops_chat_admin', true, [
app/Database/Migrations/2026-04-19-000001_CreateMarketingPageSeoTable.php:11:        $this->forge->addField([
app/Database/Migrations/2026-04-19-000001_CreateMarketingPageSeoTable.php:24:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-04-19-000001_CreateMarketingPageSeoTable.php:25:        $this->forge->addKey('page_name');
app/Database/Migrations/2026-04-19-000001_CreateMarketingPageSeoTable.php:26:        $this->forge->addKey('page_internal_url');
app/Database/Migrations/2026-04-19-000001_CreateMarketingPageSeoTable.php:27:        $this->forge->createTable('bf_marketing_page_seo', true);
app/Database/Migrations/2026-05-10-000100_CreateUserAccountCompletionModalState.php:15:        $this->forge->addField([
app/Database/Migrations/2026-05-10-000100_CreateUserAccountCompletionModalState.php:54:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-05-10-000100_CreateUserAccountCompletionModalState.php:56:        $this->forge->addKey('snoozed_until');
app/Database/Migrations/2026-05-10-000100_CreateUserAccountCompletionModalState.php:57:        $this->forge->createTable('bf_user_account_completion_modal_state', true);
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:12:            $this->forge->addField([
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:32:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:34:            $this->forge->addKey('project_id');
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:35:            $this->forge->addKey('symbol');
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:36:            $this->forge->addKey('coin_type');
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:37:            $this->forge->addKey('status');
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:38:            $this->forge->createTable('bf_tbi_project_coins', true);
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:42:            $this->forge->addField([
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:54:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:56:            $this->forge->createTable('bf_tbi_coin_contribution_categories', true);
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:76:            $this->forge->addField([
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:97:            $this->forge->addKey('id', true);
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:99:            $this->forge->addKey('project_id');
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:100:            $this->forge->addKey('coin_id');
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:101:            $this->forge->addKey('user_id');
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:102:            $this->forge->addKey('category_id');
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:103:            $this->forge->addKey('status');
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php:104:            $this->forge->createTable('bf_tbi_coin_contribution_ledger', true);
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:103:        $this->forge->addField([
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:122:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:124:        $this->forge->addKey(['project_id', 'user_id']);
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:125:        $this->forge->addKey('status');
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:126:        $this->forge->createTable('bf_tbi_coin_wallets', true);
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:135:        $this->forge->addField([
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:166:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:167:        $this->forge->addKey('project_id');
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:168:        $this->forge->addKey('coin_id');
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:169:        $this->forge->addKey('wallet_id');
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:170:        $this->forge->addKey('user_id');
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:171:        $this->forge->addKey('status');
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:172:        $this->forge->createTable('bf_tbi_coin_payout_requests', true);
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:181:        $this->forge->addField([
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:201:        $this->forge->addKey('id', true);
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:204:        $this->forge->addKey('status');
app/Database/Migrations/2026-07-16-000000_IntegrateCoinVaultWithTbiProjectCoinTables.php:205:        $this->forge->createTable('bf_tbi_coin_external_event_logs', true);
```

## Migration Status Related

```text
| App                  | 2006-04-18-000001 | CreateFinancialNewsTable                            | default | 2026-04-18 17:35:48 | 22    |
| App                  | 2025-09-09-000040 | CreatePredictionsTrades                             | default | 2026-02-01 14:29:40 | 4     |
| App                  | 2026-01-01-000001 | CreateAiOpsTables                                   | default | 2026-02-01 18:04:01 | 5     |
| App                  | 2026-01-15-000100 | AddChatAndAiOpsUsageTables                          | default | 2026-02-01 18:04:01 | 5     |
| App                  | 2026-01-17-000001 | CreateInvestmentSignalsTables                       | default | 2026-02-01 18:04:02 | 5     |
| App                  | 2026-03-10-000100 | CreateInvestmentForecastingTables                   | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-10-000200 | CreateInvestmentForecastAccuracyTable               | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-12-000100 | CreateInvestmentForecastAccuracy                    | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-15-000100 | CreateAiOpsTaskPipelineTables                       | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-19-000100 | CreateMarketingVideoStudioTables                    | default | 2026-03-31 12:42:06 | 11    |
| App                  | 2026-03-20-000100 | CreateAiOpsEmailScanTables                          | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-20-000105 | CreateAiOpsIngestRuns                               | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-20-000110 | CreateScannerTaxonomy                               | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-20-000120 | CreateTradeAlertScannerMeta                         | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-20-000130 | CreateAiOpsManualTodos                              | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-21-000100 | EnsureInvestmentScraperEmailDedupe                  | default | 2026-03-31 12:42:07 | 11    |
| App                  | 2026-03-30-000400 | AddTickerToProjects                                 | default | 2026-04-01 00:21:49 | 12    |
| App                  | 2026-04-01-000001 | CreateScannerTables                                 | default | 2026-02-23 00:27:05 | 9     |
| App                  | 2026-04-01-000200 | EnsureInvestmentScraperRawEmailColumns              | default | 2026-04-09 10:44:15 | 13    |
| App                  | 2026-04-05-000100 | CreateMarketingNotificationPipelineTables           | default | 2026-04-09 10:53:47 | 14    |
| App                  | 2026-04-09-120000 | EnhanceMarketingGenerationPipeline                  | default | 2026-04-09 10:55:40 | 15    |
| App                  | 2026-04-09-130000 | HardenMarketingNewsPipelineSchema                   | default | 2026-04-11 18:23:44 | 17    |
| App                  | 2026-04-12-120050 | CreateMarketingDistributionTargets                  | default | 2026-04-14 01:31:39 | 19    |
| App                  | 2026-04-12-221500 | AddExternalFieldsToMarketingDistributionTargets     | default | 2026-04-14 11:26:24 | 21    |
| App                  | 2026-04-13-090000 | AddDiscordCategoryFieldsToMarketingGeneratedContent | default | 2026-04-14 11:26:24 | 21    |
| App                  | 2026-04-13-120000 | CreateDiscordOpsTables                              | default | 2026-04-14 11:26:24 | 21    |
| App                  | 2026-04-14-120000 | RenameDiscordManualMessageRecipientFields           | default | 2026-04-14 11:26:24 | 21    |
| App                  | 2026-04-19-000001 | CreateMarketingPageSeoTable                         | default | 2026-05-14 02:08:34 | 23    |
| App                  | 2026-04-20-000100 | CreateAiOpsCellDiscoveryTables                      | default | 2026-02-07 21:35:45 | 7     |
| App                  | 2026-04-23-090000 | HardenMarketingDistributionTargetsForReliability    | default | 2026-05-14 02:08:34 | 23    |
| App                  | 2026-05-01-000100 | CreateAiOpsPublicPagesTables                        | default | 2026-02-15 00:55:25 | 8     |
| App                  | 2026-06-15-000100 | AddScannerSourceToTradeAlerts                       | default | 2026-03-08 14:32:48 | 10    |
| App                  | 2026-06-15-000110 | CreateAiopsChatAdminTable                           | default | 2026-02-23 00:27:05 | 9     |
| App                  | 2026-06-20-000100 | CreateAiOpsFormTests                                | default | 2026-03-08 14:32:48 | 10    |
| App                  | 2026-07-01-000100 | CreateAiOpsLifecycleTables                          | default | 2026-03-08 14:32:48 | 10    |
```

## Alert/Marketing/News Commands

```text
  aiops:alerts-clean                          Delete completed aiops alert queue rows older
  aiops:alerts-check                          Fetch emails and queue them for processing
  aiops:alerts-health                         Run health checks on aiops alert queue and notify
  aiops:alerts-worker                         Process queued alert emails
  aiops:email-scan                            Scan alerts mailbox for new emails and record
  alerts:fetch-raw-emails                     Fetch raw trade alert emails into
  marketing:distribution:assert-sql           Runs SQL-level anomaly assertions for marketing
  marketing:distribution:failure-inject-test  Dev-safe failure injection checks for
  marketing:news:debug                        Diagnose marketing IMAP connectivity, folder
  marketing:news:generate                     Generates clustered story records from pending
  marketing:news:imap-test                    Smoke test for marketing/news IMAP connectivity.
  marketing:news:scrape                       Ingests alert/news emails (or OCR/raw text) into
  marketing:news:seed-test                    Insert synthetic rows into
  marketing:promotions:audit                  Audit promotion source data and campaign
  marketing:promotions:generate               Generate promotion campaign rows from finalized
  marketing:promotions:test                   Run a chained smoke test for promotions audit and
  marketing:regression:smoke                  Runs full marketing pipeline smoke checks and
  news:audit                                  Audit recent marketing news ingestion,
  research:intelligence:signals               Generate trade-signal intelligence from research
  research:news:collect                       
  scanning:run                                Run MyMI liquidity + momentum scanner
```

## Alert/Marketing/News Routes

```text
| GET     | Alerts/Preview/([^/]+)                                                      | »                                              | \App\Modules\User\Controllers\AlertsController::preview/$1                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Preview/Alert/([^/]+)                                                       | »                                              | \App\Modules\User\Controllers\AlertsController::preview/$1                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Investments/News                                                            | »                                              | (Closure)                                                                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Discord/register                                                            | discord-register                               | \App\Controllers\AuthController::register                                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf no-cache                          | no-cache cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| GET     | Discord/register/([^/]+)                                                    | discord-register-referral                      | \App\Controllers\AuthController::register/$1                                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf no-cache                          | no-cache cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| GET     | Trade-Tracker                                                               | mymi-trade-tracker                             | \App\Modules\User\Controllers\InvestmentsController::tradeTracker                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Trade-Tracker/getTradeData                                                  | get-trade-tracker-data                         | \App\Modules\User\Controllers\InvestmentsController::getTradeData                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | API/mobile/investments                                                      | »                                              | \App\Modules\APIs\Controllers\MobileController::investments                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked apiToken                                           | apiToken cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| GET     | API/mobile/alerts                                                           | »                                              | \App\Modules\APIs\Controllers\MobileController::alerts                                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked apiToken                                           | apiToken cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| GET     | API/cronFetchAndGenerateNews                                                | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchAndGenerateNews                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getSymbolsByTradeType/([^/]+)                               | »                                              | \App\Modules\APIs\Controllers\APIController::getSymbolsByTradeType/$1                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getForecastDetails/([^/]+)                                  | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getForecastDetails/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getConfidenceHeatmap                                        | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getConfidenceHeatmap                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getTopConfidenceBySector                                    | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getTopConfidenceBySector                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getConfidenceDistribution                                   | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getConfidenceDistribution                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getForecastAccuracySummary                                  | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getForecastAccuracySummary                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/commandsCatalog                                                 | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::commandsCatalog                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/onboardingSteps                                                 | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::onboardingSteps                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/sharingGuide                                                    | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::sharingGuide                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/health                                                          | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::health                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/lookup/ticker                                                   | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::tickerLookup                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/lookup/crypto                                                   | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::cryptoLookup                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/lookup/quote                                                    | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::quoteLookup                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/process-queue                                                   | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::processQueue                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/coalesce-now                                                    | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::coalesceNow                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Management/distributeTodaysNewsContent                                  | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::distributeTodaysNewsContent                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/fetchAlphaVantageNewsForTradeAlerts                          | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::fetchAlphaVantageNewsForTradeAlerts            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/fetchNewsEmails                                              | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::fetchNewsEmails                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generateCoffeeAndStocksNewsletter                            | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateCoffeeAndStocksNewsletter              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/fetchCoffeeAndStocksNewsletter                               | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::fetchCoffeeAndStocksNewsletter                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/runBackfillAlertsEmails                                      | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::runBackfillAlertsEmails                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/runBackfillMarketingEmails                                   | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::runBackfillMarketingEmails                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getAlerts                                                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::getAlerts                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getNews                                                      | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::getNews                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/processAllTradeAlerts                                        | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::processAllTradeAlerts                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/sendAllDiscordAlerts                                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::sendAllDiscordAlerts                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/updateMarketDataForAlerts                                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::updateMarketDataForAlerts                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/cronAnalyzeContent                                 | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronAnalyzeContent                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/cronFetchAndGenerateNews                           | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchAndGenerateNews                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/generateContent                                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchAndGenerateNews                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/cronFetchInbox                                     | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchInbox                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/cronFetchMarketingEmails                           | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchMarketingEmails                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/generateContentDigestFromStored                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateContentDigestFromStored                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/generateContentFromScraper                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateContentFromScraper                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/generateDailyContentDigest                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateDailyContentDigest                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/massResendActivationEmails                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::massResendActivationEmails                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getSocialPlatforms                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getSocialPlatforms                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getSocialCommunities                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getSocialCommunities                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/saveSocialCommunity                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::saveSocialCommunity                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getPostTemplates                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getPostTemplates                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/savePostTemplate                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::savePostTemplate                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generatePlatformPosts/([0-9]+)                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePlatformPosts/$1                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generatePlatformPosts                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePlatformPosts                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generateDailyCommunityPosts                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateDailyCommunityPosts                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/exportGeneratedPostJson/([0-9]+)                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::exportGeneratedPostJson/$1                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generateRevenueDocs                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateRevenueDocs                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/cronGenerateDailyCommunityPosts                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronGenerateDailyCommunityPosts                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/cronQueueDistribution                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronQueueDistribution                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Alerts/ingestCsvSignals                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::ingestCsvSignals                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/signals                                                          | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getSignals                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/signalFiles                                                      | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getSignalFiles                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/previewSignalFile/([0-9]+)                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::previewSignalFile/$1                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/recalcSignalScores                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::recalcSignalScores                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/addTradeAlert                                                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::addTradeAlert                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/backfillCategories                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::backfillCategories                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/createTradeAlert/([^/]+)                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::addTradeAlert                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/createTradeAlert                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::addTradeAlert                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getFilteredAlerts                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getFilteredAlerts                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/scanner                                                          | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::scanner                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/fetchAutoGeneratedAnalysis                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::fetchAutoGeneratedAnalysis                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/fetchEmailAlerts                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::fetchEmailAlerts                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/fetchMarketAuxNews/([^/]+)                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::fetchMarketAuxNews/$1                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/forceFetchEmails                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::forceFetchEmails                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/forceFetchTickers                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::forceFetchTickers                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateMarketingForAlert/([0-9]+)                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateMarketingForAlert/$1                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateNow                                                      | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateNow                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateTradeAlertSummary                                        | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateTradeAlertSummary                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getEmaComparison/([^/]+)                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getEmaComparison/$1                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateAlertSocialCopy/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateAlertSocialCopy/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getFullMetrics                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getFullMetrics                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getLatestPrices                                                  | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getLatestPrices                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getTechnicalIndicators                                           | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getTechnicalIndicators                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/hideTradeAlert                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::hideTradeAlert                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/manageTradeAlert                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::manageTradeAlert                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/markAlertAsSentAndSendEmail/([^/]+)                              | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::markAlertAsSentAndSendEmail/$1                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processAlerts                                                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processAlerts                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processEmailAlerts                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processEmailAlerts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processTradeAlerts                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processTradeAlerts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processTradeBatch                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processTradeBatch                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/sendAlert                                                        | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sendAlert                                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/sendDiscordAlerts                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sendDiscordAlerts                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/sendDiscordAlertsBySymbol/([^/]+)                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sendDiscordAlertsBySymbol/$1                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/storeMarketingContent                                            | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::storeMarketingContent                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateBatchPrices                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateBatchPrices                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateChartOverride                                              | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateChartOverride                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateExchange                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateExchange                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateStatus/([0-9]+)/(.*)                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateStatus/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateTradeAlerts                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateTradeAlerts                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/submitTradeAlert                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::submitTradeAlert                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getTradeAlertDetails                                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getTradeAlertDetails                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateVoiceoverScript                                          | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateVoiceoverScript                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateVoiceoverAndMarketingContent                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateVoiceoverAndMarketingContent               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateAndStoreVoiceover                                        | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateAndStoreVoiceover                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateSocialMediaPosts                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateSocialMediaPosts                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/postMarketingContentToSocials                                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::postMarketingContentToSocials                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/gen-keys                                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::genKeys                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/sign                                                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sign                                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/investment-accounts                                              | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::investmentAccounts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/fetchPlaidInvestments/([^/]+)                                    | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidInvestments/$1                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/fetchPlaidInvestments                                            | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidInvestments                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Budget/investment-accounts                                              | »                                              | \App\Modules\APIs\Controllers\BudgetAPIController::investmentAccounts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments                                                             | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController:index                                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getInvestmentData/([^/]+)                                   | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getInvestmentData/$1                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/searchTickers                                               | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::searchTickers                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/news                                                        | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::listNews                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/news/([0-9]+)                                               | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getNews/$1                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getForecastHighlights                                       | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getForecastHighlights                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronAnalyzeContent                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronAnalyzeContent                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronAutoPublishGroupedDigest                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronAutoPublishGroupedDigest                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronFetchAndGenerateNews                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronFetchAndGenerateNews                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronFetchInbox                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronFetchInbox                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronFetchMarketingEmails                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronFetchMarketingEmails                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronProcessSMSMarketingIdeas                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronProcessSMSMarketingIdeas                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/downloadVoiceover/(.*)                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::downloadVoiceover/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributeHighScoreContent                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributeHighScoreContent                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/emailPostForApproval/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::emailPostForApproval/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchBufferPaginated                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchBufferPaginated                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchFinalizedSummariesBlock                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchFinalizedSummariesBlock                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchGeneratedSummaries                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchGeneratedSummaries                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchGeneratedSummariesBlock                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchGeneratedSummariesBlock                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchGeneratedSummariesJson                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchGeneratedSummariesJson                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getVideoContent/([0-9]+)                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getVideoContent/$1                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getVideoQueue                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getVideoQueue                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateFromTicker                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromTicker                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateFromTopic                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromTopic                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateFromScrapedSource/([0-9]+)                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromScrapedSource/$1                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/exportVideoPackage/([0-9]+)                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::exportVideoPackage/$1                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getTemplates                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getTemplates                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/saveTemplate                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::saveTemplate                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/forceGenerateFromTemp                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::forceGenerateFromTemp                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/ForceGenerateFromTemp/([0-9]+)                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::ForceGenerateFromTemp/$1                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateCampaignContent                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateCampaignContent                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateDailyMarketCampaign                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateDailyMarketCampaign                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateCampaignStepContent                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateCampaignStepContent                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateContentFromScraper                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateContentFromScraper                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateContentDigestFromStored                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateContentDigestFromStored                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateDailyContentDigest                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateDailyContentDigest                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateKimiSummaries                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateKimiSummaries                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateKimiPosts                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateKimiPosts                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/GenerateFromSimilar/([0-9]+)                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromSimilar/$1                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateFromSimilar                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromSimilar                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateLivePreview                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateLivePreview                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generatePostsFromSummary/([0-9]+)                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePostsFromSummary/$1                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generatePostsFromSummary                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePostsFromSummary                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generatePostMediaContent                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePostMediaContent                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateScheduledPosts                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateScheduledPosts                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getCleanedScrapedContent                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getCleanedScrapedContent                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getScrapeDetails/([0-9]+)                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getScrapeDetails/$1                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateThreadFromSummary/([0-9]+)                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateThreadFromSummary/$1                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getContentPerformanceAnalytics                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getContentPerformanceAnalytics                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getGeneratedPostsPaginated                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getGeneratedPostsPaginated                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getStoryboardPackage/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getStoryboardPackage/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getTopGeneratedPosts                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getTopGeneratedPosts                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getTopKeywordChart/([0-9]+)                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getTopKeywordChart/$1                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/groupSimilarSummariesByCosine                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::groupSimilarSummariesByCosine                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/massResendActivationEmails                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::massResendActivationEmails                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/monitorKeywords                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::monitorKeywordsAndScrape                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/previewBufferItem/([0-9]+)                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::previewBufferItem/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/previewPendingSummaries                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::previewPendingSummaries                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processMarketingTempEmails/([0-9]+)/([^/]+)/([0-9]+)          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processMarketingTempEmails/$1/$2/$3             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processMarketingTempEmails/([0-9]+)/([^/]+)                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processMarketingTempEmails/$1/$2                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/publishGroupedContentDraft                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::publishGroupedContentDraft                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/rankBufferPostsDaily                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::rankBufferPostsDaily                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runNewsScrape                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runNewsScrape                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runNewsGenerate                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runNewsGenerate                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runNewsPipeline                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runNewsPipeline                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/reprocessIncompleteEmails                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::reprocessIncompleteEmails                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runContentGenerationBatch                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runContentGenerationBatch                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runKeywordBackfillBatch                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runKeywordBackfillBatch                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runKeywordEnrichment                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runKeywordEnrichment                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runScheduledTasks                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runScheduledTasks                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Search/([^/]+)/(.*)                                           | »                                              | \App\Modules\APIs\Controllers\ManagementController::index/$1/$2                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/sendWalkthroughEmails                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::sendWalkthroughEmails                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/scheduleApprovedPost/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::scheduleApprovedPost/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/schedulePost/(.*)/(.*)/(.*)                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::schedulePost/$1/$2/$3                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/sharePost/([0-9]+)/([^/]+)                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::sharePost/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Large-Content/Form                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::submitLargeContentForm                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Manual-Content/Form                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::shortLongContentForm                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/testGenerateDailyDigest                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::testGenerateDailyDigest                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/testGenerateFromTempEmail/([0-9]+)                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::testGenerateFromTempEmail/$1                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/testTfIdfEdgeCases                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::testTfIdfEdgeCases                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/testGenerateSummarizerHarness                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::testGenerateSummarizerHarness                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Timeline/([^/]+)                                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::timeline/$1                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Timeline                                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::viewTimelineGrouped                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/triggerBackfill                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::reprocessIncompleteEmails                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/triggerPostAutogenOnEmpty                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::triggerPostAutogenOnEmpty                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processPendingNotifications                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processPendingNotifications                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processPendingTempScraper                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processPendingTempScraper                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processPendingCampaigns                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processPendingCampaigns                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processPendingGeneratedContent                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processPendingGeneratedContent                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributionSummary                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributionSummary                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributionHistory/([0-9]+)                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributionHistory/$1                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributionFailedSummary                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributionFailedSummary                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributionChannelTotals                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributionChannelTotals                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/retryDistributionTargets                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::retryDistributionTargets                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/retryDistributionTargets/([0-9]+)                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::retryDistributionTargets/$1                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runMarketingPipeline                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runMarketingPipeline                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing                                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::index                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Add/([^/]+)                                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::add/$1                                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Approve-Content/([0-9]+)                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::approveContent/$1                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Blog-Creator                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::blogCreator                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Blogs                                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::blogs                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Campaigns                                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::campaigns                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Content-Review                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::contentReview                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Content/Generator                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::contentGenerator                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Content/Listing                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::contentListing                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Daily-Log                                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::viewDailyLogs                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Edit-Content/([0-9]+)                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::editContent/$1                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Email/(.*)/(.*)                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::viewEmail/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchEmails                                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchEmails                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Financial-News                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::financialNews                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateContent                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateContent                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateNewsletter                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateNewsletterContent                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getRecentScrapes                                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getRecentScrapes                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Grouped-Content-Drafts                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateGroupedContentDrafts                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Ideas                                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::ideas                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Post-Creator                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::postCreator                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/previewGeneratedPost/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::previewGeneratedPost/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Promote                                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::promote                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Promote/([^/]+)                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::promote                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Research                                                      | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::research                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/RunContentGeneration                                          | »                                              | \App\Modules\APIs\Controllers\Management\MarketingAPIController::runContentGeneration                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Quick-Scraper                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::standaloneScrape                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Reject-Content/([0-9]+)                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::rejectContent/$1                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Schedule                                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::schedule                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Schedule/([^/]+)                                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::schedule/$1                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/scheduleNewsletters                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::scheduleNewsletterCampaign                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/submitDailyLog                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::submitDailyLog                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/sendNotification                                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::sendNotification                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/sendNewsletter                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::sendScheduleNewsletter                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Communities                                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::communities                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Test                                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::test                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Twitter                                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::twitterDashboard                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Video-Creator                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::videoCreator                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/View-Email/([^/]+)/([^/]+)                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::viewEmail/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/View-Grouped-Summaries                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::View-Grouped-Summaries                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/MyMI-Gold/Tasks/Add                                           | »                                              | \App\Modules\APIs\Controllers\WalletsAPIController::addUserGoldTasks                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Email-Templates/create                                        | »                                              | \App\Modules\APIs\Controllers\EmailTemplateController::create                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Email-Queue                                                   | »                                              | \App\Modules\APIs\Controllers\EmailQueueController::index                                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Email-Queue/create                                            | »                                              | \App\Modules\APIs\Controllers\EmailQueueController::create                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getPlatforms                                                  | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::getPlatforms                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getPlatformRules/([^/]+)                                      | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::getPlatformRules/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/listSuggestions/([^/]+)/([^/]+)                               | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::listSuggestions/$1/$2                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Markets                                                     | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::markets                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Market/([0-9]+)                                             | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::view/$1                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Markets/Create                                              | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::createMarket                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Markets/Settle/([0-9]+)                                     | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::settle/$1                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Fetch-Market-Data                                      | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronFetchMarketData                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Settle-Markets                                         | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronSettleMarkets                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Expire-Markets                                         | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronExpireMarkets                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Update-Market-Prices                                   | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronUpdateMarketPrices                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Update-Market-States                                   | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronUpdateMarketStates                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Process-Expired-Markets                                | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronProcessExpiredMarkets                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Cron/Process-Settled-Markets                                | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::cronProcessSettledMarkets                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getMarketPrice/([^/]+)                                           | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::get/$1                                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getMarketPrice                                                   | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getMarketPrice                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Blog/Investing/Tips-For-Effective-Investment-Portfolio-Management           | »                                              | \App\Modules\Blog\Controllers\InvestingController::TipsForEffectiveInvestmentPortfolioManagement      | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Blog/News-And-Updates                                                       | »                                              | \App\Modules\Blog\Controllers\UpdatesController::index                                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Blog/News-And-Updates/Integrating-With-Plaid                                | »                                              | \App\Modules\Blog\Controllers\NewsAndUpdates::IntegratingWithPlaid                                    | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance                  | »                                              | \App\Modules\Blog\Controllers\NewsAndUpdates::TheRoadmapToTheFutureOfFinance                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts                                                           | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::index                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Add/([^/]+)                                               | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::add                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/addTradeAlert                                             | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::addTradeAlert                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Advisor/Media                                             | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::advisorMedia                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Crypto/([^/]+)/([^/]+)                                    | »                                              | \App\Modules\Management\Controllers\Management\AlertsAdminController::stockOverview/$1/$2             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Audit/Emails                                              | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::auditEmailScraper                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/fetchData                                                 | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::fetchData                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Fetch/Ticker/([^/]+)                                      | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::fetchTickerDetails/$1                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Import/Tickers                                            | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::importTickers                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Stock/([^/]+)/([^/]+)                                     | »                                              | \App\Modules\Management\Controllers\Management\AlertsAdminController::stockOverview/$1/$2             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Tasks/fetchAlerts                                         | »                                              | \App\Modules\Management\Controllers\Management\AlertsAdminController::fetchData                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Submit/TradingView                                        | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::submitTradingView                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Test                                                      | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::test                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Test-Alert-Email                                          | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::testEmail                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Test-Email                                                | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::sendTestEmail                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Trades                                                    | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::trades                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/Top-Performance/Weekly                                    | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::topPerformanceWeekly                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Alerts/weeklyTopPerformance                                      | »                                              | \App\Modules\Management\Controllers\AlertsAdminController::topPerformanceWeekly                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Discord                                                          | »                                              | \App\Modules\Management\Controllers\DiscordAdminController::index                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Investments                                                      | »                                              | \App\Modules\Management\Controllers\InvestmentsAdminController::index                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Investments/News                                                 | »                                              | \App\Modules\Management\Controllers\InvestmentsAdminController::newsIndex                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing                                                        | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::index                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Add/([^/]+)                                            | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::add/$1                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Approve-Content/([0-9]+)                               | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::approveContent/$1                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Blog-Creator                                           | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::blogCreator                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Blogs                                                  | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::blogs                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Campaigns                                              | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::campaigns                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Content-Review                                         | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::contentReview                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Content/Generator                                      | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::contentGenerator                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Content-Studio                                         | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::contentStudio                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Content/Listing                                        | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::contentListing                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Daily-Log                                              | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::viewDailyLogs                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Edit-Content/([0-9]+)                                  | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::editContent/$1                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Email/(.*)/(.*)                                        | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::viewEmail/$1/$2                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/fetchEmails                                            | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::fetchEmails                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Financial-News                                         | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::financialNews                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/generateContent                                        | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::generateContent                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/generateDailyContentDigest                             | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::generateDailyContentDigest              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/generateNewsletter                                     | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::generateNewsletterContent               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/getRecentScrapes                                       | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::getRecentScrapes                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Grouped-Content-Drafts                                 | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::generateGroupedContentDrafts            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Ideas                                                  | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::ideas                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Post-Creator                                           | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::postCreator                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/previewGeneratedPost/([0-9]+)                          | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::previewGeneratedPost/$1                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Promote                                                | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::promote                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Promote/([^/]+)                                        | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::promote                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Research                                               | »                                              | \App\Modules\Management\Controllers\AlertsController::research                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/RunContentGeneration                                   | »                                              | \App\Modules\Management\Controllers\Management\MarketingAdminController::runContentGeneration         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Quick-Scraper                                          | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::standaloneScrape                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Reject-Content/([0-9]+)                                | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::rejectContent/$1                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Schedule                                               | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::schedule                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Schedule/([^/]+)                                       | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::schedule/$1                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/scheduleNewsletters                                    | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::scheduleNewsletterCampaign              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/submitDailyLog                                         | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::submitDailyLog                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/sendNotification                                       | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::sendNotification                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/sendNewsletter                                         | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::sendScheduleNewsletter                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Test                                                   | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::test                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Twitter                                                | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::twitterDashboard                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Video-Creator                                          | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::videoCreator                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/View-Email/([^/]+)/([^/]+)                             | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::viewEmail/$1/$2                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/View-Grouped-Summaries                                 | »                                              | \App\Modules\Management\Controllers\MarketingAdminController::View-Grouped-Summaries                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/MyMI-Gold/Tasks/Add                                    | »                                              | \App\Modules\Management\Controllers\WalletsAdminController::addUserGoldTasks                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Email-Templates/create                                 | »                                              | \App\Modules\Management\Controllers\EmailTemplateController::create                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Email-Queue                                            | »                                              | \App\Modules\Management\Controllers\EmailQueueController::index                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Email-Queue/create                                     | »                                              | \App\Modules\Management\Controllers\EmailQueueController::create                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Email                                                  | »                                              | \App\Modules\Management\Controllers\EmailController::index                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Exchange                                               | »                                              | \App\Modules\Management\Controllers\MarketingController::index                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Exchange/Edit/([^/]+)                                  | »                                              | \App\Modules\Management\Controllers\MarketingController::edit/$1                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Exchange/Top-Communities                               | »                                              | \App\Modules\Management\Controllers\MarketingController::topCommunities                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Exchange/Top-Communities/([^/]+)                       | »                                              | \App\Modules\Management\Controllers\MarketingController::topCommunities/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                                     | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Alerts                                                                      | »                                              | \App\Modules\User\Controllers\AlertsController::index                                                 | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Alerts//Trades                                                              | »                                              | \App\Modules\User\Controllers\AlertsController::trades                                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | My-Investments                                                              | »                                              | \App\Modules\User\Controllers\InvestmentsController::index                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | My-Trades                                                                   | »                                              | \App\Modules\User\Controllers\InvestmentsController::index                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments                                                                 | »                                              | \App\Modules\User\Controllers\InvestmentsController::index                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/forecastModal/([^/]+)                                           | »                                              | \App\Modules\User\Controllers\InvestmentsController::forecastModal/$1                                 | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Add                                                             | »                                              | \App\Modules\User\Controllers\InvestmentsController::add                                              | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Add/([^/]+)                                                     | »                                              | \App\Modules\User\Controllers\InvestmentsController::add                                              | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Autosave                                                        | »                                              | \App\Modules\User\Controllers\InvestmentsController::autoSave                                         | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Overview                                                        | »                                              | \App\Modules\User\Controllers\InvestmentsController::overview                                         | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Retirement                                                      | »                                              | \App\Modules\User\Controllers\InvestmentsController::retirement                                       | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Save                                                            | »                                              | \App\Modules\User\Controllers\InvestmentsController::save                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Services                                                        | »                                              | \App\Modules\User\Controllers\InvestmentsController::services                                         | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Squeezes                                                        | »                                              | \App\Modules\User\Controllers\InvestmentsController::squeezes                                         | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Test                                                            | »                                              | \App\Modules\User\Controllers\InvestmentsController::test                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Watchlist                                                       | »                                              | \App\Modules\User\Controllers\InvestmentsController::watchlist                                        | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Strategies                                                      | »                                              | \App\Modules\User\Controllers\InvestmentController::getStrategies                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Strategies/([0-9]+)                                             | »                                              | \App\Modules\User\Controllers\InvestmentController::getStrategy/$1                                    | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Goals                                                           | »                                              | \App\Modules\User\Controllers\InvestmentController::getGoals                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Goals/([0-9]+)                                                  | »                                              | \App\Modules\User\Controllers\InvestmentController::createGoal/$1                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Crypto-Overview                                                 | »                                              | \App\Modules\User\Controllers\InvestmentsController::cryptoOverview                                   | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Economic-Data                                                   | »                                              | \App\Modules\User\Controllers\InvestmentsController::economicData                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Market-News                                                     | »                                              | \App\Modules\User\Controllers\InvestmentsController::marketNews                                       | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/MyMI-News                                                       | »                                              | \App\Modules\User\Controllers\InvestmentsController::MyMINews                                         | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/MyMI-Research                                                   | »                                              | \App\Modules\User\Controllers\InvestmentsController::MyMIResearch                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Investments/Stock-Overview                                                  | »                                              | \App\Modules\User\Controllers\InvestmentsController::stockOverview                                    | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Predictions/Markets                                                         | »                                              | \App\Modules\User\Controllers\PredictionsController::markets                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Predictions/Market/([0-9]+)                                                 | »                                              | \App\Modules\User\Controllers\PredictionsController::view/$1                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Marketplace                                                                 | »                                              | \App\Modules\ScriptStudio\Controllers\ScriptStudioController::marketplace                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/GetUserWatchlist/([^/]+)                                    | »                                              | \App\Modules\User\Controllers\InvestmentsController::getUserWatchlist/$1                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/Economy/latest                                              | »                                              | \App\Modules\User\Controllers\EconomyController::latest                                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | ScriptStudio/Marketplace                                                    | »                                              | \App\Modules\ScriptStudio\Controllers\ScriptStudioController::marketplace                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | How-It-Works/Daily-Financial-News                                           | »                                              | \App\Modules\Blog\Controllers\HowItWorksController::DailyFinancialNews                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | How-It-Works/Investing                                                      | »                                              | \App\Modules\Blog\Controllers\HowItWorksController::InvestmentPortfolioManagement                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | How-It-Works/Investment-Portfolio-Management                                | »                                              | \App\Modules\Blog\Controllers\HowItWorksController::InvestmentPortfolioManagement                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | How-It-Works/alerts                                                         | »                                              | \App\Modules\Blog\Controllers\HowItWorksController::show/alerts                                       | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Support/Discord                                                             | »                                              | \App\Modules\Support\Controllers\SupportController::discordOnboarding                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                               | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Wallets/Investment/Details/([^/]+)                                          | wallets.investment.details.segment             | \App\Modules\User\Controllers\WalletsController::details/$1                                           | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Wallets/Investments                                                         | wallets.investments                            | \App\Modules\User\Controllers\WalletsController::investments                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Wallets/Investment/Edit/Account/([^/]+)                                     | wallets.investment.edit                        | \App\Modules\User\Controllers\WalletsController::editInvestAccount/$1                                 | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Knowledgebase/Trade-Tracker                                                 | »                                              | \App\Modules\User\Controllers\KnowledgebaseController::tradeTracker                                   | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Subscribe//Daily-Financial-News                                             | »                                              | \App\Modules\Blog\Controllers\SubscribeController::index                                              | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processBrokerEmails                                              | »                                              | \App\Modules\APIs\Controllers\AlertsController::processBrokerEmails                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processAllEmails                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsController::processAllEmails                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/previewScraper/([0-9]+)                                          | »                                              | \App\Modules\APIs\Controllers\AlertsController::previewScraper/$1                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Subscribe/Daily-Financial-News                                              | »                                              | (Closure)                                                                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | investments/economy/update_all                                              | »                                              | \App\Modules\User\Controllers\EconomyController::updateAll                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | investments/fundamentals/([^/]+)                                            | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::fundamentals/$1                               | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Management/Marketing/Blogger                                                | »                                              | \App\Controllers\App\Modules\Management\Controllers\Marketing\BloggerController::index                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck auth                                | auth cspoff sessionTracker requestLifecycle observability jsonException toolbar                            |
| GET     | Management/Marketing/Blogger/preview/(.*)                                   | »                                              | \App\Controllers\App\Modules\Management\Controllers\Marketing\BloggerController::preview/$1           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck auth                                | auth cspoff sessionTracker requestLifecycle observability jsonException toolbar                            |
| GET     | News                                                                        | »                                              | Blog/News-And-Updates                                                                                 |                                                                                                                                |                                                                                                            |
| GET     | Features/Advanced-Investment-Portfoio-Manager                               | »                                              | Features/Advanced-Investment-Portfolio-Manager                                                        |                                                                                                                                |                                                                                                            |
| GET     | Premium-Features/Advanced-Trade-Tracker                                     | »                                              | Investments/Trade-Tracker                                                                             |                                                                                                                                |                                                                                                            |
| GET     | Investments/Reports                                                         | »                                              | Investments/Trade-Tracker                                                                             |                                                                                                                                |                                                                                                            |
| HEAD    | News                                                                        | »                                              | Blog/News-And-Updates                                                                                 |                                                                                                                                |                                                                                                            |
| HEAD    | Features/Advanced-Investment-Portfoio-Manager                               | »                                              | Features/Advanced-Investment-Portfolio-Manager                                                        |                                                                                                                                |                                                                                                            |
| HEAD    | Premium-Features/Advanced-Trade-Tracker                                     | »                                              | Investments/Trade-Tracker                                                                             |                                                                                                                                |                                                                                                            |
| HEAD    | Investments/Reports                                                         | »                                              | Investments/Trade-Tracker                                                                             |                                                                                                                                |                                                                                                            |
| POST    | Auth/link-snaptrade                                                         | »                                              | \App\Controllers\AuthController::linkSnapTrade                                                        | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck no-cache                | no-cache cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| POST    | Discord/register                                                            | discord-register-attempt                       | \App\Controllers\AuthController::attemptRegister                                                      | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf no-cache                          | no-cache cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| POST    | Discord/register/([^/]+)                                                    | »                                              | \App\Controllers\AuthController::attemptRegister                                                      | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf no-cache                          | no-cache cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| POST    | Trade-Tracker/saveTradeData                                                 | save-trade-tracker-data                        | \App\Modules\User\Controllers\InvestmentsController::saveTradeData                                    | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| POST    | Advisor/generateStoryboard                                                  | »                                              | \App\Controllers\AdvisorController::generateNewsStoryboard                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | Advisor/tradeAnalysis/([0-9]+)                                              | »                                              | \App\Controllers\AdvisorController::generateTradeAnalysis                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Discord/interactions                                                    | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::interactions                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/backfillEmailAlerts                                              | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::backfillEmailAlerts                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Management/backfillMarketingEmails                                      | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::backfillMarketingEmails                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Investments/getSymbolsByTradeType/([^/]+)                               | »                                              | \App\Modules\APIs\Controllers\APIController::getSymbolsByTradeType/$1                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Discord/enqueue                                                         | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::enqueue                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Discord/broadcast                                                       | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::broadcast                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Discord/completeOnboardingStep                                          | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::completeOnboardingStep                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Discord/register-guild-commands                                         | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::registerGuildCommands                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Discord/messageHook                                                     | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::messageHook                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Discord/webhook                                                         | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::webhookProxy                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Discord/createLinkToken                                                 | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::createLinkToken                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Discord/test                                                            | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::test                                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Management/saveCoffeeAndStocksNewsletter                                | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::saveCoffeeAndStocksNewsletter                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| POST    | API/Management/Marketing/cronAnalyzeContent                                 | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronAnalyzeContent                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| POST    | API/Management/Marketing/cronFetchAndGenerateNews                           | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchAndGenerateNews                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| POST    | API/Management/Marketing/generateContent                                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchAndGenerateNews                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| POST    | API/Management/Marketing/cronFetchInbox                                     | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchInbox                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| POST    | API/Management/Marketing/cronFetchMarketingEmails                           | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchMarketingEmails                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| POST    | API/Management/Marketing/generateContentDigestFromStored                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateContentDigestFromStored                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| POST    | API/Management/Marketing/generateContentFromScraper                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateContentFromScraper                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| POST    | API/Management/Marketing/generateDailyContentDigest                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateDailyContentDigest                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| POST    | API/Management/Marketing/massResendActivationEmails                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::massResendActivationEmails                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| POST    | API/Management/saveSocialCommunity                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::saveSocialCommunity                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| POST    | API/Management/savePostTemplate                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::savePostTemplate                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| POST    | API/Alerts/addTradeAlert                                                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::addTradeAlert                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/backfillCategories                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::backfillCategories                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/createTradeAlert/([^/]+)                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::addTradeAlert                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/createTradeAlert                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::addTradeAlert                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/getFilteredAlerts                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getFilteredAlerts                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/fetchAutoGeneratedAnalysis                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::fetchAutoGeneratedAnalysis                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/fetchEmailAlerts                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::fetchEmailAlerts                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/forceFetchEmails                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::forceFetchEmails                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/forceFetchTickers                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::forceFetchTickers                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/generateMarketingForAlert/([0-9]+)                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateMarketingForAlert/$1                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/Alerts/generateAdvisorMediaFromAlert/([0-9]+)                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateAdvisorMediaFromAlert/$1                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/Alerts/generateAdvisorMediaFromAlert                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateAdvisorMediaFromAlert                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/generateNow                                                      | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateNow                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/generateTradeAlertSummary                                        | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateTradeAlertSummary                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/getEmaComparison/([^/]+)                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getEmaComparison/$1                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/getFullMetrics                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getFullMetrics                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/getLatestPrices                                                  | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getLatestPrices                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/getTechnicalIndicators                                           | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getTechnicalIndicators                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/hideTradeAlert                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::hideTradeAlert                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/manageTradeAlert                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::manageTradeAlert                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/markAlertAsSentAndSendEmail/([^/]+)                              | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::markAlertAsSentAndSendEmail/$1                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/processAlerts                                                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processAlerts                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/processEmailAlerts                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processEmailAlerts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/processTradeAlerts                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processTradeAlerts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/processTradeBatch                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processTradeBatch                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/sendAlert                                                        | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sendAlert                                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/sendDiscordAlerts                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sendDiscordAlerts                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/sendDiscordAlertsBySymbol/([^/]+)                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sendDiscordAlertsBySymbol/$1                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/storeMarketingContent                                            | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::storeMarketingContent                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/updateBatchPrices                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateBatchPrices                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/updateChartOverride                                              | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateChartOverride                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/updateExchange                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateExchange                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/updateStatus/([0-9]+)/(.*)                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateStatus/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/updateTradeAlerts                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateTradeAlerts                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/submitTradeAlert                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::submitTradeAlert                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/getTradeAlertDetails                                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getTradeAlertDetails                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/generateVoiceoverScript                                          | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateVoiceoverScript                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/generateVoiceoverAndMarketingContent                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateVoiceoverAndMarketingContent               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/generateAndStoreVoiceover                                        | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateAndStoreVoiceover                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/generateSocialMediaPosts                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateSocialMediaPosts                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/postMarketingContentToSocials                                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::postMarketingContentToSocials                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/gen-keys                                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::genKeys                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Alerts/sign                                                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sign                                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Investments/news                                                        | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::createNews                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Investments/news/([0-9]+)                                               | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::updateNews/$1                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Investments/validateSymbol                                              | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::validateSymbol                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Investments/refreshForecasts                                            | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::refreshForecasts                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Investments/reforecastTicker                                            | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::reforecastTicker                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing                                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::index                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/approvePost/([0-9]+)                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::approvePost/$1                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/approveBufferItem/([0-9]+)                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::approveBufferItem/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/autoScheduleNextApproved                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::autoScheduleNextApproved                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/generateVideoContent                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateVideoContent                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/generateTikTokContent                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateTikTokContent                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/saveVideoDraft                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::saveVideoDraft                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/updateVideoContent/([0-9]+)                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::updateVideoContent/$1                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/approveVideoContent/([0-9]+)                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::approveVideoContent/$1                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/archiveVideoContent/([0-9]+)                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::archiveVideoContent/$1                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/duplicateVideoContent/([0-9]+)                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::duplicateVideoContent/$1                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/generateFromTicker                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromTicker                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/generateFromTopic                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromTopic                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/generateFromScrapedSource/([0-9]+)                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromScrapedSource/$1                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/saveTemplate                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::saveTemplate                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/generateCampaignContent                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateCampaignContent                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/generateDailyMarketCampaign                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateDailyMarketCampaign                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/generateCampaignStepContent                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateCampaignStepContent                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/generatePostMediaContent                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePostMediaContent                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/runNewsScrape                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runNewsScrape                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/runNewsGenerate                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runNewsGenerate                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/runNewsPipeline                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runNewsPipeline                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/rejectBufferItem/([0-9]+)                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::rejectBufferItem/$1                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Marketing/submitLargeContent                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::submitLargeContent                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
```

## JSON Decision Summary

```json
{
  "phase": "02B",
  "name": "Authoritative MyMI Alert DB Table Inventory",
  "generated_utc": "2026-06-09T08:21:07.165351+00:00",
  "branch": "main",
  "commit": "a271c0ae0 Register TBI CoinVault smoke command (#518)",
  "git_status_short": "?? docs/01_Systematic_Standup/\n?? docs/_aiops/mymi_alerts/",
  "db_connected": false,
  "database": null,
  "hostname": null,
  "username": null,
  "dbprefix": null,
  "all_table_count": 0,
  "matching_table_count": 0,
  "existing_required": [],
  "missing_required_logical": [
    "investment_scraper",
    "investment_trade_alerts",
    "investment_tickers",
    "investment_alert_history"
  ],
  "decision": "likely_schema_gap_or_wrong_database_connection",
  "report_md": "docs/_aiops/mymi_alerts/PHASE_02B_AUTHORITATIVE_DB_TABLE_INVENTORY.md",
  "code_changes_made": false,
  "next_recommended_phase": "Phase 03A - create schema migration only if decision confirms schema gap; otherwise Phase 03B - create formal GTM smoke command"
}```
