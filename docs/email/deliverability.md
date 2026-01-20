# Email Deliverability (DreamHost)

## Overview
This document outlines the DNS steps for SPF, DKIM, and DMARC when sending transactional mail from MyMI Wallet via DreamHost SMTP.

## SPF (Sender Policy Framework)
1. Open your DreamHost panel and locate the domain used in the `From` address.
2. Add or edit the SPF TXT record for that domain.
3. Include DreamHost’s sending infrastructure using DreamHost’s recommended include value.
4. Keep the record minimal and avoid multiple SPF records.
5. After saving, allow DNS propagation and verify using an SPF checker.

> ✅ Tip: If a third-party email provider is also used, add their include to the same SPF record.

## DKIM (DomainKeys Identified Mail)
1. In DreamHost, navigate to **Mail** → **Manage Email**.
2. Locate the sending domain and enable DKIM signing.
3. DreamHost will provide a DKIM TXT record (selector + public key).
4. Add the DKIM TXT record to DNS for the domain.
5. Verify DKIM status in the DreamHost panel and with a DKIM checker.

## DMARC (Domain-based Message Authentication, Reporting & Conformance)
1. Create a TXT record at `_dmarc.yourdomain.com`.
2. Start with a monitoring-only policy:
   - `v=DMARC1; p=none; rua=mailto:postmaster@yourdomain.com; ruf=mailto:postmaster@yourdomain.com; fo=1`
3. Once you confirm alignment, update the policy to `p=quarantine` or `p=reject`.

## Verification Checklist
- [ ] SPF record includes DreamHost SMTP sender infrastructure.
- [ ] DKIM is enabled in DreamHost and the DNS record is published.
- [ ] DMARC record exists and reports are received.
- [ ] `From` and `Reply-To` domains match the authenticated domain.
- [ ] Test emails land in inbox and pass SPF/DKIM/DMARC checks.

## References
- DreamHost Knowledge Base: Email DNS and DKIM setup
- MyMI Wallet Email CLI: `php spark mail:verify you@example.com`
