#!/usr/bin/env python3
"""
MyMI Historic Email Archive Ingestion Helper
Zero-dependency IMAP extraction of historic emails from DreamHost into structured JSON for CodeIgniter database insertion.
"""

import sys
import os
import argparse
import imaplib
import email
from email.header import decode_header
import json
import re
from html import unescape
from datetime import datetime
import hashlib


def decode_mime(header_val):
    if not header_val:
        return ''
    try:
        parts = decode_header(header_val)
        decoded = []
        for part, enc in parts:
            if isinstance(part, bytes):
                decoded.append(part.decode(enc or 'utf-8', errors='ignore'))
            else:
                decoded.append(str(part))
        return ' '.join(decoded).strip()
    except Exception:
        return str(header_val)


def clean_body_text(raw_body):
    if not raw_body:
        return ''
    no_style = re.sub(r'<(style|script)[^>]*>.*?</\1>', '', raw_body, flags=re.DOTALL | re.IGNORECASE)
    no_html = re.sub(r'<[^>]+>', ' ', no_style)
    clean = unescape(re.sub(r'\s+', ' ', no_html)).strip()
    return clean


def parse_date(date_str):
    if not date_str:
        return datetime.utcnow().strftime('%Y-%m-%d %H:%M:%S')
    try:
        import email.utils
        parsed_tuple = email.utils.parsedate_tz(date_str)
        if parsed_tuple:
            ts = email.utils.mktime_tz(parsed_tuple)
            return datetime.utcfromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
    except Exception:
        pass
    return datetime.utcnow().strftime('%Y-%m-%d %H:%M:%S')


def extract_headline_and_ticker(subject, body):
    headline = subject
    ticker = 'SPY'
    
    # Thinkorswim news alert headline extraction
    if 'News alert for all symbols' in subject or 'News alert' in subject:
        m = re.search(r'(?:News alert for all symbols\s+)?([A-Za-z0-9\s,\.\'\-]+:\s+[^\r\n]{10,120}?)(?:\s+Privacy|\s+Log in|\s+Contact Us|\s*$)', body)
        if m:
            headline = m.group(1).strip()
            
    # Ticker matching: $TICKER or TICKER:
    combined = headline + ' ' + body[:500]
    m_tick = re.search(r'\$([A-Z]{1,5})\b', combined)
    if m_tick:
        ticker = m_tick.group(1)
    else:
        m_tick2 = re.search(r'\b([A-Z]{2,5})\s*[:\-\/]', combined)
        if m_tick2:
            ticker = m_tick2.group(1)
            
    return headline, ticker


def load_cursor(cursor_file):
    if os.path.exists(cursor_file):
        try:
            with open(cursor_file, 'r', encoding='utf-8') as f:
                return json.load(f)
        except Exception:
            pass
    return {}


def save_cursor(cursor_file, cursor_data):
    try:
        os.makedirs(os.path.dirname(os.path.abspath(cursor_file)), exist_ok=True)
        with open(cursor_file, 'w', encoding='utf-8') as f:
            json.dump(cursor_data, f, indent=2)
    except Exception as e:
        sys.stderr.write(f"Warning: Failed saving cursor: {e}\n")


def ingest_segment(host, port, user, password, limit, cursor_file, direction='newest_first'):
    report = {
        "status": "success",
        "mailbox": user,
        "scanned": 0,
        "cursor_seq": 0,
        "total_mailbox": 0,
        "messages": [],
        "errors": []
    }
    
    # Load cursor
    all_cursors = load_cursor(cursor_file)
    mb_cursor = all_cursors.get(user, {"last_seq": 0, "total": 0})
    
    try:
        M = imaplib.IMAP4_SSL(host, int(port))
        M.login(user, password)
        res, count_data = M.select('INBOX', readonly=True)
        if res != 'OK':
            report["status"] = "error"
            report["errors"].append(f"Failed selecting INBOX: {res}")
            return report
            
        typ, data = M.search(None, 'ALL')
        if typ != 'OK' or not data or not data[0]:
            return report
            
        all_uids = data[0].split()
        total_uids = len(all_uids)
        report["total_mailbox"] = total_uids
        
        # Calculate window based on cursor
        last_seq = mb_cursor.get("last_seq", 0)
        if direction == 'newest_first':
            start_idx = max(0, total_uids - last_seq - limit)
            end_idx = max(0, total_uids - last_seq)
            batch_uids = all_uids[start_idx:end_idx]
            batch_uids.reverse()
        else:
            start_idx = last_seq
            end_idx = min(total_uids, last_seq + limit)
            batch_uids = all_uids[start_idx:end_idx]
            
        if not batch_uids:
            report["message"] = "All messages in mailbox already ingested according to cursor."
            return report
            
        report["scanned"] = len(batch_uids)
        
        for uid in batch_uids:
            try:
                typ, msg_data = M.fetch(uid, '(RFC822)')
                if typ != 'OK' or not msg_data or not msg_data[0]:
                    continue
                
                raw = msg_data[0][1]
                msg = email.message_from_bytes(raw)
                
                subject = decode_mime(msg.get('Subject', 'No Subject'))
                from_addr = decode_mime(msg.get('From', 'unknown'))
                date_str = msg.get('Date', '')
                sql_date = parse_date(date_str)
                msg_id = msg.get('Message-ID', f"uid-{uid.decode()}-{user}")
                
                identifier = hashlib.md5(f"{msg_id}|{user}".encode('utf-8')).hexdigest()
                
                body = ""
                if msg.is_multipart():
                    for part in msg.walk():
                        if part.get_content_type() == 'text/plain':
                            body = part.get_payload(decode=True).decode(part.get_content_charset() or 'utf-8', errors='ignore')
                            break
                        elif part.get_content_type() == 'text/html' and not body:
                            body = part.get_payload(decode=True).decode(part.get_content_charset() or 'utf-8', errors='ignore')
                else:
                    body = msg.get_payload(decode=True).decode(msg.get_content_charset() or 'utf-8', errors='ignore')
                    
                clean_body = clean_body_text(body)
                headline, ticker = extract_headline_and_ticker(subject, clean_body)
                
                report["messages"].append({
                    "email_identifier": identifier,
                    "source_type": "historic_email_archive",
                    "source_provider": "thinkorswim" if "thinkorswim" in from_addr.lower() else "news_feed",
                    "sender_email": from_addr[:250],
                    "source_message_id": msg_id[:250],
                    "ticker": ticker[:20],
                    "title": headline[:250],
                    "content": clean_body[:5000],
                    "email_date": sql_date,
                    "email_sender": from_addr[:250],
                    "email_subject": subject[:490],
                    "email_body": clean_body[:5000],
                    "source_mailbox": user[:250],
                    "imap_uid": int(uid.decode()) if uid.decode().isdigit() else 0,
                    "date_scraped": sql_date,
                    "status": "pending",
                    "processed": 0
                })
                    
            except Exception as item_err:
                report["errors"].append(f"UID {uid.decode()} error: {item_err}")
                continue
                
        # Update cursor
        new_seq = last_seq + len(batch_uids)
        all_cursors[user] = {
            "last_seq": new_seq,
            "total": total_uids,
            "last_updated": datetime.utcnow().strftime('%Y-%m-%dT%H:%M:%SZ')
        }
        save_cursor(cursor_file, all_cursors)
        report["cursor_seq"] = new_seq
        
        try:
            M.close()
            M.logout()
        except Exception:
            pass
            
        return report

    except Exception as e:
        report["status"] = "error"
        report["errors"].append(str(e))
        return report


def main():
    parser = argparse.ArgumentParser(description="Ingest segmented historic emails")
    parser.add_argument("--host", default="imap.dreamhost.com")
    parser.add_argument("--port", type=int, default=993)
    parser.add_argument("--user", required=True)
    parser.add_argument("--password", required=True)
    parser.add_argument("--limit", type=int, default=50)
    parser.add_argument("--cursor", default="/apps/TBI/www/mymiwallet/shared/writable/aiops/historic_email_cursor.json")
    parser.add_argument("--reset-cursor", action="store_true")
    
    args = parser.parse_args()
    
    if args.reset_cursor and os.path.exists(args.cursor):
        try:
            c = load_cursor(args.cursor)
            if args.user in c:
                del c[args.user]
                save_cursor(args.cursor, c)
        except Exception:
            pass
            
    res = ingest_segment(args.host, args.port, args.user, args.password, args.limit, args.cursor)
    print(json.dumps(res, indent=2))


if __name__ == '__main__':
    main()
