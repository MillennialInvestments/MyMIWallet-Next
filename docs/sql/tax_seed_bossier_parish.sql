-- Seed data for Bossier Parish Sales and Use Tax template.

INSERT INTO `bf_tax_return_templates` (`name`, `authority`, `frequency`, `notes`, `active`, `created_at`)
VALUES ('Bossier Parish Sales and Use Tax', 'Bossier Parish', 'monthly', 'Seeded template', 1, NOW());

SET @template_id = LAST_INSERT_ID();

-- Lines 1 through 12 and 26
INSERT INTO `bf_tax_return_lines` (`template_id`, `line_number`, `label`, `type`, `calc_rule`, `requires_explain`, `sort_order`, `created_at`)
VALUES
(@template_id, 1, 'Gross Sales', 'input', NULL, 0, 1, NOW()),
(@template_id, 2, 'Deductions - Cash Discounts', 'input', NULL, 0, 2, NOW()),
(@template_id, 3, 'Deductions - Sales for Resale', 'input', NULL, 0, 3, NOW()),
(@template_id, 4, 'Deductions - Sales to Governments', 'input', NULL, 0, 4, NOW()),
(@template_id, 5, 'Deductions - Sales to Exempt Organizations', 'input', NULL, 0, 5, NOW()),
(@template_id, 6, 'Deductions - Exported Goods', 'input', NULL, 0, 6, NOW()),
(@template_id, 7, 'Deductions - Returned Goods', 'input', NULL, 0, 7, NOW()),
(@template_id, 8, 'Other Deductions', 'input', NULL, 1, 8, NOW()),
(@template_id, 9, 'Bad Debts Charged Off', 'input', NULL, 1, 9, NOW()),
(@template_id, 10, 'Other Allowable Deductions', 'input', NULL, 1, 10, NOW()),
(@template_id, 11, 'Total Deductions (2..10)', 'calc', 'sum(2..10)', 0, 11, NOW()),
(@template_id, 12, 'Taxable Sales (1 - 11)', 'calc', 'line1-line11', 0, 12, NOW()),
(@template_id, 26, 'Total Tax Remitted', 'calc', 'sum(jurisdiction tax due)', 0, 26, NOW());

-- Jurisdictions A–G
INSERT INTO `bf_tax_jurisdictions` (`state`, `parish`, `name`, `code`, `active`, `created_at`) VALUES
('LA', 'Bossier', 'Bossier City', 'A', 1, NOW()),
('LA', 'Bossier', 'Benton', 'B', 1, NOW()),
('LA', 'Bossier', 'Haughton', 'C', 1, NOW()),
('LA', 'Bossier', 'Plain Dealing', 'D', 1, NOW()),
('LA', 'Bossier', 'Unincorporated', 'E', 1, NOW()),
('LA', 'Bossier', 'Bossier Parish School Board', 'F', 1, NOW()),
('LA', 'Bossier', 'Bossier Parish Police Jury', 'G', 1, NOW());

-- Rates with effective dates
INSERT INTO `bf_tax_rates` (`jurisdiction_id`, `rate_total`, `rate_components`, `effective_start`, `effective_end`, `created_at`) VALUES
((SELECT id FROM bf_tax_jurisdictions WHERE code='A'), 5.0000, NULL, '2024-01-01', NULL, NOW()),
((SELECT id FROM bf_tax_jurisdictions WHERE code='B'), 5.2500, NULL, '2024-01-01', NULL, NOW()),
((SELECT id FROM bf_tax_jurisdictions WHERE code='C'), 2.5000, NULL, '2024-01-01', NULL, NOW()),
((SELECT id FROM bf_tax_jurisdictions WHERE code='D'), 4.2500, NULL, '2024-01-01', NULL, NOW()),
((SELECT id FROM bf_tax_jurisdictions WHERE code='E'), 4.7500, NULL, '2024-01-01', NULL, NOW()),
((SELECT id FROM bf_tax_jurisdictions WHERE code='F'), 1.0000, '{"school_board":1.0}', '2024-01-01', NULL, NOW()),
((SELECT id FROM bf_tax_jurisdictions WHERE code='G'), 1.5000, '{"police_jury":1.5}', '2024-01-01', NULL, NOW());
