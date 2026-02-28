CREATE TABLE IF NOT EXISTS bf_gtm_audit_runs (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  run_uuid CHAR(36) NOT NULL,
  created_at DATETIME NOT NULL,
  environment VARCHAR(32) NOT NULL DEFAULT 'production',
  git_commit VARCHAR(64) NULL,
  go_no_go ENUM('GO','NO_GO') NOT NULL DEFAULT 'NO_GO',
  summary_json JSON NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uq_run_uuid (run_uuid),
  KEY idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS bf_gtm_audit_findings (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  run_id BIGINT UNSIGNED NOT NULL,
  gate VARCHAR(64) NOT NULL,
  severity ENUM('CRITICAL','HIGH','MED','LOW') NOT NULL,
  status ENUM('OPEN','FIXED','IGNORED') NOT NULL DEFAULT 'OPEN',
  title VARCHAR(255) NOT NULL,
  evidence_json JSON NULL,
  remediation TEXT NULL,
  patch_ref VARCHAR(255) NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NULL,
  PRIMARY KEY (id),
  KEY idx_run_gate (run_id, gate),
  KEY idx_severity_status (severity, status),
  CONSTRAINT fk_gtm_findings_run
    FOREIGN KEY (run_id) REFERENCES bf_gtm_audit_runs(id)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
