CREATE TABLE IF NOT EXISTS bf_squeeze_scorecards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    symbol VARCHAR(16) NOT NULL,
    short_interest FLOAT DEFAULT 0,
    float_shares BIGINT DEFAULT 0,
    borrow_rate FLOAT DEFAULT 0,
    squeeze_score FLOAT DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
