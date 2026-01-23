CREATE TABLE IF NOT EXISTS bf_squeeze_universe (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    symbol VARCHAR(16) NOT NULL,
    as_of_date DATE NOT NULL,
    source VARCHAR(32) DEFAULT 'manual',
    float_shares BIGINT NULL,
    shares_out BIGINT NULL,
    short_interest_shares BIGINT NULL,
    short_interest_pct DECIMAL(10,2) NULL,
    days_to_cover DECIMAL(10,2) NULL,
    cost_to_borrow DECIMAL(10,2) NULL,
    utilization_pct DECIMAL(10,2) NULL,
    avg_volume_30d BIGINT NULL,
    volume_today BIGINT NULL,
    price DECIMAL(12,4) NULL,
    open DECIMAL(12,4) NULL,
    high DECIMAL(12,4) NULL,
    low DECIMAL(12,4) NULL,
    prev_close DECIMAL(12,4) NULL,
    created_at DATETIME NOT NULL,
    UNIQUE KEY uq_symbol_date (symbol, as_of_date),
    KEY idx_date (as_of_date),
    KEY idx_symbol (symbol)
);

CREATE TABLE IF NOT EXISTS bf_squeeze_scorecards (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    symbol VARCHAR(16) NOT NULL,
    as_of_datetime DATETIME NOT NULL,
    score_total INT NOT NULL,
    score_squeeze INT NOT NULL,
    score_sustainability INT NOT NULL,
    score_risk INT NOT NULL,
    flags_json LONGTEXT NULL,
    inputs_json LONGTEXT NULL,
    created_at DATETIME NOT NULL,
    KEY idx_symbol_dt (symbol, as_of_datetime),
    KEY idx_score_total (score_total)
);

CREATE TABLE IF NOT EXISTS bf_squeeze_fade_setups (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    symbol VARCHAR(16) NOT NULL,
    as_of_datetime DATETIME NOT NULL,
    setup_grade VARCHAR(2) NOT NULL,
    entry_type VARCHAR(32) NOT NULL,
    entry_price DECIMAL(12,4) NULL,
    stop_price DECIMAL(12,4) NULL,
    target1 DECIMAL(12,4) NULL,
    target2 DECIMAL(12,4) NULL,
    risk_notes VARCHAR(255) NULL,
    logic_json LONGTEXT NULL,
    created_at DATETIME NOT NULL,
    KEY idx_symbol_dt (symbol, as_of_datetime)
);

CREATE TABLE IF NOT EXISTS bf_squeeze_zoomout (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    symbol VARCHAR(16) NOT NULL,
    as_of_date DATE NOT NULL,
    trend_state VARCHAR(32) NOT NULL,
    dilution_risk VARCHAR(16) NOT NULL,
    fundamentals_state VARCHAR(32) NOT NULL,
    narrative TEXT NULL,
    evidence_json LONGTEXT NULL,
    created_at DATETIME NOT NULL,
    UNIQUE KEY uq_symbol_date (symbol, as_of_date)
);
