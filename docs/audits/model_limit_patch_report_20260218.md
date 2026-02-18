# Model Limit Patch Report

Date: 20260218

| File | Method | Before | After | Risk Level | Notes |
|---|---|---|---|---|---|
| `app/Services/OpsCommandService.php:43` | `(patched)` | `return $builder->findAll();` | `return $builder->findAll(20);` | High | Temporary limit cap added |
| `app/Services/ProjectsService.php:203` | `(patched)` | `return $this->db->table('project_assets')->where('project_id', $projectId)->get()->getResultArray();` | `return $this->db->table('project_assets')->where('project_id', $projectId)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Services/WalletSummaryService.php:180` | `(patched)` | `return $builder->get()->getResultArray() ?? [];` | `return $builder->limit(20)->get()->getResultArray() ?? [];` | High | Temporary limit cap added |
| `app/Services/WeeklyStreamService.php:119` | `(patched)` | `$results = $builder->get()->getResultArray();` | `$results = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Services/MarketingService.php:399` | `(patched)` | `$existing = $this->socialPlatformModel->findAll();` | `$existing = $this->socialPlatformModel->findAll(20);` | High | Temporary limit cap added |
| `app/Services/MarketingService.php:409` | `(patched)` | `$platforms = $this->socialPlatformModel->findAll();` | `$platforms = $this->socialPlatformModel->findAll(20);` | High | Temporary limit cap added |
| `app/Services/MarketingService.php:433` | `(patched)` | `return $this->socialPlatformModel->findAll();` | `return $this->socialPlatformModel->findAll(20);` | High | Temporary limit cap added |
| `app/Services/OnboardingService.php:8` | `(patched)` | `return db_connect()->table('bf_onboarding_steps')->orderBy('code')->get()->getResultArray();` | `return db_connect()->table('bf_onboarding_steps')->orderBy('code')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Services/OnboardingService.php:13` | `(patched)` | `$rows = db_connect()->table('bf_onboarding_progress')->where('user_id',$userId)->get()->getResultArray();` | `$rows = db_connect()->table('bf_onboarding_progress')->where('user_id',$userId)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/BlogModel.php:45` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/BlogModel.php:54` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/BlogModel.php:66` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentPriceForecastModel.php:76` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentPriceForecastModel.php:91` | `(patched)` | `return $builder->orderBy('updated_at', 'DESC')->findAll();` | `return $builder->orderBy('updated_at', 'DESC')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/DripCampaignModel.php:77` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/DripCampaignModel.php:92` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/DripCampaignModel.php:101` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/CampaignModel.php:26` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/CampaignModel.php:106` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/CampaignModel.php:114` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/CampaignModel.php:121` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/CampaignModel.php:205` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/CampaignModel.php:212` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AuctionBidModel.php:112` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InstitutesModel.php:34` | `(patched)` | `return $this->findAll();` | `return $this->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InstitutesModel.php:39` | `(patched)` | `return $this->where('specialty', $specialty)->findAll();` | `return $this->where('specialty', $specialty)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/TransactionModel.php:50` | `(patched)` | `return $this->where('user_id', $userID)->findAll();` | `return $this->where('user_id', $userID)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/APIModel.php:75` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/APIModel.php:85` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/PlaidModel.php:144` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnnouncementsModel.php:50` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnnouncementsModel.php:68` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/ExchangeModel.php:52` | `(patched)` | `return $this->where('blockchain', $blockchain)->findAll();` | `return $this->where('blockchain', $blockchain)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/ExchangeModel.php:59` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/ExchangeModel.php:65` | `(patched)` | `$result = $builder->get();` | `$result = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/ExchangeModel.php:79` | `(patched)` | `$result = $builder->get();` | `$result = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/ExchangeModel.php:101` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/ExchangeModel.php:121` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/ExchangeModel.php:143` | `(patched)` | `return $this->db->table('bf_exchanges_assets_ledger')->where('suspicious', 1)->findAll();` | `return $this->db->table('bf_exchanges_assets_ledger')->where('suspicious', 1)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/ExchangeModel.php:168` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/ExchangeModel.php:247` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/ExchangeModel.php:292` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/ExchangeModel.php:321` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/ExchangeModel.php:337` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/GoalsModel.php:27` | `(patched)` | `return $this->where('user_id', $userId)->findAll();` | `return $this->where('user_id', $userId)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/GoalsModel.php:52` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/GoalsModel.php:60` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:92` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:123` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:133` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:142` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:151` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:160` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:429` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:438` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:500` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:509` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:516` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:524` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:545` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:565` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:582` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:630` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:645` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:653` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:669` | `(patched)` | `return $this->db->table('bf_users_wallet')->where('id', $walletID)->get()->getResultArray();` | `return $this->db->table('bf_users_wallet')->where('id', $walletID)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:754` | `(patched)` | `$rows = $b->get()->getResultArray();` | `$rows = $b->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:890` | `(patched)` | `return $b->get()->getResultArray();` | `return $b->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:925` | `(patched)` | `return $b->orderBy('created_on','DESC')->get()->getResultArray();` | `return $b->orderBy('created_on','DESC')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:935` | `(patched)` | `return $b->orderBy('created_on','DESC')->get()->getResultArray();` | `return $b->orderBy('created_on','DESC')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:1284` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/WalletModel.php:1789` | `(patched)` | `$wallets = $this->db->table('bf_users_wallet')->get()->getResultArray();` | `$wallets = $this->db->table('bf_users_wallet')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AdvisorModel.php:63` | `(patched)` | `return $this->findAll();` | `return $this->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AdvisorModel.php:73` | `(patched)` | `return $this->where('specialty', $specialty)->findAll();` | `return $this->where('specialty', $specialty)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/ProjectTaskRegistryModel.php:67` | `(patched)` | `return $builder->findAll();` | `return $builder->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AuctionLotModel.php:58` | `(patched)` | `$rows = $builder->get()->getResultArray();` | `$rows = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AuctionLotModel.php:69` | `(patched)` | `$rows = $builder->get()->getResultArray();` | `$rows = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AuctionLotModel.php:83` | `(patched)` | `$rows = $builder->get()->getResultArray();` | `$rows = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/SocialDistributionQueueModel.php:24` | `(patched)` | `return $this->where('status', 'pending')->findAll();` | `return $this->where('status', 'pending')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/UserModel.php:133` | `(patched)` | `return $this->db->table('bf_users_comments')->where('ticker', $ticker)->orderBy('created_at', 'DESC')->findAll();` | `return $this->db->table('bf_users_comments')->where('ticker', $ticker)->orderBy('created_at', 'DESC')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/UserModel.php:220` | `(patched)` | `return $this->where('active', 1)->get()->getResultArray();` | `return $this->where('active', 1)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/UserModel.php:225` | `(patched)` | `return $this->where('active', 1)->get()->getResultArray();` | `return $this->where('active', 1)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/UserModel.php:237` | `(patched)` | `return $this->where('active', 0)->get()->getResultArray();` | `return $this->where('active', 0)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/UserModel.php:253` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/SignalsModel.php:52` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/SignalsModel.php:81` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/SignalsModel.php:89` | `(patched)` | `$signals = $this->where('week_key', $weekKey)->findAll();` | `$signals = $this->where('week_key', $weekKey)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/OpsCommandInboxModel.php:41` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/DiligenceModel.php:28` | `(patched)` | `return $this->orderBy('id', 'DESC')->findAll();` | `return $this->orderBy('id', 'DESC')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/DiligenceModel.php:48` | `(patched)` | `return $this->where('user_id !=', $cuID)->orderBy('id', 'DESC')->findAll();` | `return $this->where('user_id !=', $cuID)->orderBy('id', 'DESC')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/DiligenceModel.php:53` | `(patched)` | `return $this->where('approved', 'Yes')->orderBy('id', 'DESC')->findAll();` | `return $this->where('approved', 'Yes')->orderBy('id', 'DESC')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/DiligenceModel.php:58` | `(patched)` | `return $this->where('stock', $symbol)->where('approved', 'Yes')->orderBy('id', 'DESC')->findAll();` | `return $this->where('stock', $symbol)->where('approved', 'Yes')->orderBy('id', 'DESC')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/DashboardModel.php:91` | `(patched)` | `return $this->db->table('bf_users_memberships')->where('active', 1)->orderBy('feature_level', 'ASC')->orderBy('feature_name', 'ASC')->get()->getResultArray();` | `return $this->db->table('bf_users_memberships')->where('active', 1)->orderBy('feature_level', 'ASC')->orderBy('feature_name', 'ASC')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/DashboardModel.php:112` | `(patched)` | `return $this->like('keywords', $keyword)->findAll();` | `return $this->like('keywords', $keyword)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/DashboardModel.php:148` | `(patched)` | `return $completionTable->where('user_id', $userId)->orderBy('completion_date', 'DESC')->get()->getResult();` | `return $completionTable->where('user_id', $userId)->orderBy('completion_date', 'DESC')->limit(20)->get()->getResult();` | High | Temporary limit cap added |
| `app/Models/SocialPostTemplateModel.php:28` | `(patched)` | `return $this->where('platform_id', $platformId)->orderBy('template_key', 'ASC')->findAll();` | `return $this->where('platform_id', $platformId)->orderBy('template_key', 'ASC')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/OpsRunsModel.php:112` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/DiscordModel.php:16` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/DiscordModel.php:189` | `(patched)` | `return $this->db->table('bf_discord_channels')->orderBy('channel_key','ASC')->get()->getResultArray();` | `return $this->db->table('bf_discord_channels')->orderBy('channel_key','ASC')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/DiscordModel.php:194` | `(patched)` | `return $this->db->table('bf_discord_templates')->orderBy('template_key','ASC')->get()->getResultArray();` | `return $this->db->table('bf_discord_templates')->orderBy('template_key','ASC')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/DiscordModel.php:205` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/DiscordModel.php:300` | `(patched)` | `return $this->db->table('bf_discord_policies')->orderBy('created_at','DESC')->get()->getResultArray();` | `return $this->db->table('bf_discord_policies')->orderBy('created_at','DESC')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/DiscordModel.php:352` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/DiscordModel.php:387` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/SupportModel.php:71` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/SupportModel.php:79` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:38` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:52` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:86` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:101` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:116` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:133` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:149` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:164` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:180` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:194` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:208` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:223` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:239` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:253` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:262` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:275` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:291` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:318` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:344` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:422` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:471` | `(patched)` | `return $builder->get()->getResult();` | `return $builder->limit(20)->get()->getResult();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:479` | `(patched)` | `return $builder->get()->getResult();` | `return $builder->limit(20)->get()->getResult();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:486` | `(patched)` | `return $builder->get()->getResult();` | `return $builder->limit(20)->get()->getResult();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:494` | `(patched)` | `return $builder->get()->getResult();` | `return $builder->limit(20)->get()->getResult();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:563` | `(patched)` | `$result = $builder->get()->getResultArray();` | `$result = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AnalyticalModel.php:573` | `(patched)` | `$result = $builder->get()->getResultArray();` | `$result = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AccountsModel.php:120` | `(patched)` | `return $this->where('created_by', $cuID)->findAll();` | `return $this->where('created_by', $cuID)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AccountsModel.php:280` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AccountsModel.php:288` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AccountsModel.php:429` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AccountsModel.php:438` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AccountsModel.php:444` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AccountsModel.php:451` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AccountsModel.php:512` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AccountsModel.php:538` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/BiddingModel.php:28` | `(patched)` | `return $this->where('auction_id', $auctionId)->findAll();` | `return $this->where('auction_id', $auctionId)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/BiddingModel.php:38` | `(patched)` | `return $this->where('user_id', $userId)->findAll();` | `return $this->where('user_id', $userId)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/BiddingModel.php:48` | `(patched)` | `return $this->findAll();` | `return $this->findAll(20);` | High | Temporary limit cap added |
| `app/Models/SocialCommunityModel.php:27` | `(patched)` | `return $this->where('platform_id', $platformId)->orderBy('is_primary', 'DESC')->findAll();` | `return $this->where('platform_id', $platformId)->orderBy('is_primary', 'DESC')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AssetsModel.php:16` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AssetsModel.php:42` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AssetsModel.php:57` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AssetsModel.php:64` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AssetsModel.php:71` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AssetsModel.php:79` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AssetsModel.php:86` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AssetsModel.php:111` | `(patched)` | `return $this->findAll();` | `return $this->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AssetsModel.php:122` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/SolanaModel.php:117` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/SolanaModel.php:234` | `(patched)` | `$builder->where('market', $market)->where('active', 'Yes')->where('default_wallet', 'Yes')->where('wallet_type', 'Crypto')->get()->getResultArray();` | `$builder->where('market', $market)->where('active', 'Yes')->where('default_wallet', 'Yes')->where('wallet_type', 'Crypto')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/SolanaModel.php:346` | `(patched)` | `$builder->where('wallet_id', $signature)->get()->getResultArray();` | `$builder->where('wallet_id', $signature)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/SolanaModel.php:418` | `(patched)` | `$builder = $this->db->table('bf_exchanges_assets')->where('id', $tokenID)->get()->getResultArray();` | `$builder = $this->db->table('bf_exchanges_assets')->where('id', $tokenID)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/SolanaModel.php:454` | `(patched)` | `$result = $builder->where('user_id', $cuID)->where('market', 'SOL')->where('active', 'No')->get()->getResultArray();` | `$result = $builder->where('user_id', $cuID)->where('market', 'SOL')->where('active', 'No')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/SolanaModel.php:483` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/SolanaModel.php:500` | `(patched)` | `$result = $builder->where('user_id', $cuID)->where('market', 'SOL')->get()->getResultArray();` | `$result = $builder->where('user_id', $cuID)->where('market', 'SOL')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/EsportsModel.php:77` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/EsportsModel.php:193` | `(patched)` | `return $this->db->table('bf_esports_payouts')->where('event_id', $eventId)->get()->getResultArray();` | `return $this->db->table('bf_esports_payouts')->where('event_id', $eventId)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/EsportsModel.php:261` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/EsportsModel.php:311` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AlertJobModel.php:50` | `(patched)` | `$jobs = $builder->get()->getResultArray();` | `$jobs = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MyMIGoldModel.php:60` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AuctionModel.php:28` | `(patched)` | `return $this->findAll();` | `return $this->findAll(20);` | High | Temporary limit cap added |
| `app/Models/AuctionModel.php:38` | `(patched)` | `return $this->where('user_id', $userId)->findAll();` | `return $this->where('user_id', $userId)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:181` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:189` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:200` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:228` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:301` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:307` | `(patched)` | `return $this->findAll();` | `return $this->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:312` | `(patched)` | `//     return $this->where('user_id', $userId)->findAll();` | `//     return $this->where('user_id', $userId)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:319` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:365` | `(patched)` | `return $this->where('user_id', $userId)->findAll();` | `return $this->where('user_id', $userId)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:371` | `(patched)` | `return $this->where('status', 1)->findAll();` | `return $this->where('status', 1)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:376` | `(patched)` | `return $this->where('trading_account', $walletID)->findAll();` | `return $this->where('trading_account', $walletID)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:412` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:420` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:452` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:463` | `(patched)` | `return $this->db->table('investment_goals')->where('user_id', $userId)->findAll();` | `return $this->db->table('investment_goals')->where('user_id', $userId)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:474` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:480` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:514` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:523` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:544` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:557` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:590` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:699` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:708` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:717` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:725` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:882` | `(patched)` | `$transactions = $transactionBuilder->get()->getResultArray();` | `$transactions = $transactionBuilder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:953` | `(patched)` | `return $this->db->table('alerts')->where('user_id', $userId)->findAll();` | `return $this->db->table('alerts')->where('user_id', $userId)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1087` | `(patched)` | `$trades = $builder->get()->getResultArray();` | `$trades = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1106` | `(patched)` | `//     $trades = $builder->get()->getResultArray();` | `//     $trades = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1120` | `(patched)` | `$assets = $builder->get()->getResultArray();` | `$assets = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1151` | `(patched)` | `$assets = $builder->get()->getResultArray();` | `$assets = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1172` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1190` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1201` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1217` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1310` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1361` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1378` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1385` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1404` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1446` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1452` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1502` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1538` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1611` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1621` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1631` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1641` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestmentModel.php:1650` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/EmailModel.php:223` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:407` | `(patched)` | `$result = $builder->where('status', 1)->get()->getResultArray();` | `$result = $builder->where('status', 1)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:422` | `(patched)` | `$result = $builder->where('is_active', 1)->get()->getResultArray();` | `$result = $builder->where('is_active', 1)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:437` | `(patched)` | `$result = $builder->where('is_active', 1)->get()->getResultArray();` | `$result = $builder->where('is_active', 1)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:455` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:468` | `(patched)` | `$result = $builder->get()->getResultArray();` | `$result = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:483` | `(patched)` | `$result = $builder->where('id', $stepID)->get()->getResultArray();` | `$result = $builder->where('id', $stepID)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:497` | `(patched)` | `$result = $builder->where('campaign_id', $campaignID)->get()->getResultArray();` | `$result = $builder->where('campaign_id', $campaignID)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:511` | `(patched)` | `$result = $builder->where('is_active', 1)->get()->getResultArray();` | `$result = $builder->where('is_active', 1)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:526` | `(patched)` | `$result = $builder->where('is_active', 1)->where('campaign_id', $campaignID)->get()->getResultArray();` | `$result = $builder->where('is_active', 1)->where('campaign_id', $campaignID)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:533` | `(patched)` | `return $this->db->table('bf_marketing_ideas')->where('status !=', 'approved')->get()->getResultArray();` | `return $this->db->table('bf_marketing_ideas')->where('status !=', 'approved')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:546` | `(patched)` | `$result = $builder->where('status', 1)->where('escalated', 1)->get()->getResultArray();` | `$result = $builder->where('status', 1)->where('escalated', 1)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:612` | `(patched)` | `return $this->db->table('bf_company_logos')->get()->getResultArray();` | `return $this->db->table('bf_company_logos')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:732` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:754` | `(patched)` | `return $this->db->table('bf_users_memberships')->where('active', 1)->orderBy('feature_level', 'ASC')->orderBy('feature_name', 'ASC')->get()->getResultArray();` | `return $this->db->table('bf_users_memberships')->where('active', 1)->orderBy('feature_level', 'ASC')->orderBy('feature_name', 'ASC')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:962` | `(patched)` | `return $this->where('page_name', $pageTitle)->get()->getResultArray();` | `return $this->where('page_name', $pageTitle)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:1090` | `(patched)` | `$results = $builder->get()->getResultArray();` | `$results = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:1229` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:1246` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:1297` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:1537` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:2519` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:2580` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MarketingModel.php:2670` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/BudgetModel.php:164` | `(patched)` | `$rows = $builder->get()->getResultArray();` | `$rows = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/BudgetModel.php:353` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/BudgetModel.php:433` | `(patched)` | `$accounts = $builder->get()->getResultArray();` | `$accounts = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/BudgetModel.php:916` | `(patched)` | `$result = $builder->get()->getResultArray();` | `$result = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/BudgetModel.php:1020` | `(patched)` | `$result = $builder->get()->getResultArray();` | `$result = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/BudgetModel.php:1031` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/BudgetModel.php:1088` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/BudgetModel.php:1130` | `(patched)` | `$result = $builder->get()->getResultArray();` | `$result = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/BudgetModel.php:1142` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/BudgetModel.php:1245` | `(patched)` | `->groupBy('name')->get()->getResultArray();` | `->groupBy('name')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MyMICoinModel.php:104` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MyMICoinModel.php:152` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MyMICoinModel.php:162` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MyMICoinModel.php:172` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MyMICoinModel.php:238` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/MyMICoinModel.php:245` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AlertsModel.php:613` | `(patched)` | `$rows  = $builder->get()->getResultArray();` | `$rows  = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AlertsModel.php:633` | `(patched)` | `return $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->get();` | `return $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/AlertsModel.php:961` | `(patched)` | `return $this->db->table('bf_investment_filings')->where('symbol', $symbol)->get()->getResultArray();` | `return $this->db->table('bf_investment_filings')->where('symbol', $symbol)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AlertsModel.php:1019` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AlertsModel.php:1225` | `(patched)` | `return $this->db->table('bf_investment_filings')->whereIn('symbol', $tickers)->get()->getResultArray();` | `return $this->db->table('bf_investment_filings')->whereIn('symbol', $tickers)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AlertsModel.php:1608` | `(patched)` | `return $this->db->table('bf_investment_trade_alerts')->where('alert_created', 1)->get()->getResultArray();` | `return $this->db->table('bf_investment_trade_alerts')->where('alert_created', 1)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AlertsModel.php:2146` | `(patched)` | `$results     = $builder->select('email_body')->get()->getResultArray();` | `$results     = $builder->select('email_body')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AlertsModel.php:3567` | `(patched)` | `//     $results = $builder->select('email_body')->get()->getResultArray();` | `//     $results = $builder->select('email_body')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/AlertsModel.php:3605` | `(patched)` | `// //     $results = $builder->select('email_body')->get()->getResultArray();` | `// //     $results = $builder->select('email_body')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/SecurityModel.php:40` | `(patched)` | `return $this->db->table('bf_security_log')->where('user_id', $userId)->get()->getResultArray();` | `return $this->db->table('bf_security_log')->where('user_id', $userId)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/SecurityModel.php:45` | `(patched)` | `return $this->db->table('bf_security_log')->get()->getResultArray();` | `return $this->db->table('bf_security_log')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/SecurityModel.php:55` | `(patched)` | `return $this->db->table('bf_security_settings')->get()->getResultArray();` | `return $this->db->table('bf_security_settings')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/ReferralModel.php:204` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Models/InvestorModel.php:62` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/ProjectsModel.php:75` | `(patched)` | `return $this->orderBy('created_at', 'desc')->findAll();` | `return $this->orderBy('created_at', 'desc')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/ProjectsModel.php:80` | `(patched)` | `return $this->byUser($userId)->orderBy('created_at', 'desc')->findAll();` | `return $this->byUser($userId)->orderBy('created_at', 'desc')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/ProjectsModel.php:85` | `(patched)` | `return $this->pending()->orderBy('created_at', 'desc')->findAll();` | `return $this->pending()->orderBy('created_at', 'desc')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/SocialGeneratedPostModel.php:35` | `(patched)` | `])->findAll();` | `])->findAll(20);` | High | Temporary limit cap added |
| `app/Models/TrackerModel.php:38` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/TrackerModel.php:46` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/TrackerModel.php:53` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/TrackerModel.php:62` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/TrackerModel.php:70` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/TrackerModel.php:77` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/TrackerModel.php:86` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/TrackerModel.php:157` | `(patched)` | `return $builder->get()->getResultArray();` | `return $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Models/TrackerModel.php:210` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/TrackerModel.php:217` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/TrackerModel.php:226` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/TrackerModel.php:241` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIMarketing.php:2716` | `(patched)` | `])->get()->getResultArray();` | `])->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Libraries/MyMIMarketing.php:4153` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIMarketing.php:4949` | `(patched)` | `$users = $userModel->where('group', $targetGroup)->findAll();` | `$users = $userModel->where('group', $targetGroup)->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIMarketing.php:4951` | `(patched)` | `$users = $userModel->findAll();` | `$users = $userModel->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIMarketing.php:6470` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIDiscord.php:188` | `(patched)` | `$rules = $db->table('bf_discord_policies')->where('is_enabled', 1)->get()->getResultArray();` | `$rules = $db->table('bf_discord_policies')->where('is_enabled', 1)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Libraries/MyMIDiscord.php:217` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Libraries/MyMIDiscord.php:239` | `(patched)` | `->get()->getResultArray();` | `->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Libraries/EconomicDataService.php:119` | `(patched)` | `$indicators = $this->indicatorModel->findAll();` | `$indicators = $this->indicatorModel->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMILogger.php:97` | `(patched)` | `public function get() { return $this->dbCleanResult($this->getQueryMaker($this->db->table($this->tableName))->get()->getResult()); }` | `public function get() { return $this->dbCleanResult($this->getQueryMaker($this->db->table($this->tableName))->limit(20)->get()->getResult()); }` | High | Temporary limit cap added |
| `app/Libraries/MyMILogger.php:103` | `(patched)` | `$query = $builder->select('type_id')->get();` | `$query = $builder->select('type_id')->limit(20)->get();` | High | Temporary limit cap added |
| `app/Libraries/MyMIProjects.php:243` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIProjects.php:301` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIProjects.php:362` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIProjects.php:383` | `(patched)` | `$payouts = $this->payouts->where('distribution_id', $distributionId)->where('status', 'pending')->findAll();` | `$payouts = $this->payouts->where('distribution_id', $distributionId)->where('status', 'pending')->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIProjects.php:437` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIProjects.php:455` | `(patched)` | `$projects = $this->projects->findAll();` | `$projects = $this->projects->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIProjects.php:645` | `(patched)` | `return $this->allocations->byUser($userId)->findAll();` | `return $this->allocations->byUser($userId)->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIProjects.php:650` | `(patched)` | `$records = $this->commitments->byUser($userId)->findAll();` | `$records = $this->commitments->byUser($userId)->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIProjects.php:660` | `(patched)` | `return $this->payouts->byUser($userId)->findAll();` | `return $this->payouts->byUser($userId)->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMIPredictions.php:325` | `(patched)` | `$winners = $this->positions->where(['market_id'=>$marketId,'option_id'=>$winningOptionId])->findAll();` | `$winners = $this->positions->where(['market_id'=>$marketId,'option_id'=>$winningOptionId])->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMISecurity.php:167` | `(patched)` | `return $securityModel->findAll();` | `return $securityModel->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/MyMISecurity.php:400` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Libraries/MyMISecurity.php:533` | `(patched)` | `$roles = $rolesModel->findAll();` | `$roles = $rolesModel->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/SiteSettingsOverride.php:29` | `(patched)` | `$overrides = $this->db->table('bf_site_settings_overrides')->get()->getResultArray();` | `$overrides = $this->db->table('bf_site_settings_overrides')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Libraries/MyMIInvestments.php:1501` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Libraries/MyMIInvestments.php:1559` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Libraries/MyMIInvestments.php:1581` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Libraries/MyMIInvestments.php:1595` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Libraries/MyMIInvestments.php:1619` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Libraries/MyMIInvestments.php:1627` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Libraries/MyMIInvestments.php:1635` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Libraries/MyMIInvestments.php:1651` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Libraries/MyMIInvestments.php:1659` | `(patched)` | `$query = $builder->get();` | `$query = $builder->limit(20)->get();` | High | Temporary limit cap added |
| `app/Libraries/MyMINotifications.php:47` | `(patched)` | `$subscriptions = $builder->get()->getResultArray();` | `$subscriptions = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Libraries/MyMIWallets.php:276` | `(patched)` | `$rows = $builder->get()->getResultArray();` | `$rows = $builder->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Libraries/MyMIUser.php:183` | `(patched)` | `$users = $this->userModel->findAll();` | `$users = $this->userModel->findAll(20);` | High | Temporary limit cap added |
| `app/Services/Forecasting/MyMIForecaster.php:68` | `(patched)` | `$alerts = $alertsQuery->limit($limit)->findAll();` | `$alerts = $alertsQuery->limit($limit)->findAll(20);` | High | Temporary limit cap added |
| `app/Services/Forecasting/MyMIForecaster.php:142` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Services/Forecasting/MyMIForecaster.php:149` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Services/Forecasting/MyMIForecaster.php:155` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Services/Forecasting/ForecastAccuracyEvaluator.php:44` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Services/Forecasting/ForecastAccuracyEvaluator.php:283` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Models/Marketing/EmailTemplateModel.php:23` | `(patched)` | `return $this->findAll();` | `return $this->findAll(20);` | High | Temporary limit cap added |
| `app/Models/Marketing/EmailQueueModel.php:23` | `(patched)` | `return $this->where('status', 'pending')->findAll();` | `return $this->where('status', 'pending')->findAll(20);` | High | Temporary limit cap added |
| `app/Models/Marketing/EmailMarketingModel.php:35` | `(patched)` | `return $this->where('stage', $stage)->findAll();` | `return $this->where('stage', $stage)->findAll(20);` | High | Temporary limit cap added |
| `app/Models/Predictions/OptionsModel.php:16` | `(patched)` | `return $this->where('market_id',$marketId)->orderBy('id','ASC')->findAll();` | `return $this->where('market_id',$marketId)->orderBy('id','ASC')->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/ContentEngine/ScannerScoringService.php:46` | `(patched)` | `$rows = $this->rowModel->where('ingest_id', $ingestId)->findAll();` | `$rows = $this->rowModel->where('ingest_id', $ingestId)->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/ContentEngine/ScannerScoringService.php:188` | `(patched)` | `$records = $this->ideaModel->where('ingest_id', $ingestId)->orderBy('score_total', 'DESC')->findAll();` | `$records = $this->ideaModel->where('ingest_id', $ingestId)->orderBy('score_total', 'DESC')->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/ContentEngine/PostDraftService.php:30` | `(patched)` | `$rows = $this->rowModel->where('ingest_id', $ingestId)->findAll();` | `$rows = $this->rowModel->where('ingest_id', $ingestId)->findAll(20);` | High | Temporary limit cap added |
| `app/Libraries/AiOps/AiOpsManager.php:268` | `(patched)` | `->get();` | `->limit(20)->get();` | High | Temporary limit cap added |
| `app/Libraries/Privacy/DataExportService.php:18` | `(patched)` | `->get()->getResultArray(),` | `->limit(20)->get()->getResultArray(),` | High | Temporary limit cap added |
| `app/Libraries/Privacy/DataExportService.php:21` | `(patched)` | `->get()->getResultArray(),` | `->limit(20)->get()->getResultArray(),` | High | Temporary limit cap added |
| `app/Libraries/Privacy/DataExportService.php:24` | `(patched)` | `->get()->getResultArray(),` | `->limit(20)->get()->getResultArray(),` | High | Temporary limit cap added |
| `app/Libraries/Auth/Gate.php:60` | `(patched)` | `$roleIds = array_column($rum->where('user_id', $userId)->findAll(), 'role_id');` | `$roleIds = array_column($rum->where('user_id', $userId)->findAll(20), 'role_id');` | High | Temporary limit cap added |
| `app/Libraries/Backups/BackupService.php:107` | `(patched)` | `$rows = db_connect()->table('bf_backup_manifests')->get()->getResultArray();` | `$rows = db_connect()->table('bf_backup_manifests')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Libraries/Backups/BackupService.php:122` | `(patched)` | `$rows = $db->table($table)->get()->getResultArray();` | `$rows = $db->table($table)->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
| `app/Modules/User/Models/BudgetModuleModel.php:53` | `(patched)` | `return $this->where(['created_by' => $cuID, 'status' => 1, 'deleted' => 0])->findAll();` | `return $this->where(['created_by' => $cuID, 'status' => 1, 'deleted' => 0])->findAll(20);` | High | Temporary limit cap added |
| `app/Modules/User/Models/BudgetModuleModel.php:171` | `(patched)` | `->findAll();` | `->findAll(20);` | High | Temporary limit cap added |
| `app/Modules/Marketing_New/Models/MarketingModel.php:26` | `(patched)` | `return $this->db->table('emails')->get()->getResultArray();` | `return $this->db->table('emails')->limit(20)->get()->getResultArray();` | High | Temporary limit cap added |
