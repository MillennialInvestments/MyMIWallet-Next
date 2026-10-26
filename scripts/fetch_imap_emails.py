#!/usr/bin/env python3
"""
MyMI Multi-Mailbox IMAP Intake Helper
Zero-dependency IMAP client using Python standard library (imaplib, email, json, re).
Extracts latest messages from DreamHost / standard IMAP servers and returns clean JSON.
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
    # Strip <style> and <script>
    no_style = re.sub(r'<(style|script)[^>]*>.*?</\1>', '', raw_body, flags=re.DOTALL | re.IGNORECASE)
    # Strip HTML tags
    no_html = re.sub(r'<[^>]+>', ' ', no_style)
    # Unescape HTML entities and normalize whitespace
    clean = unescape(re.sub(r'\s+', ' ', no_html)).strip()
    return clean


def fetch_emails(host, port, user, password, limit=10):
    report = {
        "status": "error",
        "mailbox": user,
        "scanned": 0,
        "messages": [],
        "error": None
    }
    
    try:
        M = imaplib.IMAP4_SSL(host, int(port))
        M.login(user, password)
        
        # Select INBOX in readonly mode
        res, count_data = M.select('INBOX', readonly=True)
        if res != 'OK':
            report["error"] = f"Failed to select INBOX: {res}"
            return report
            
        typ, data = M.search(None, 'ALL')
        if typ != 'OK' or not data or not data[0]:
            report["status"] = "success"
            return report
            
        uids = data[0].split()
        target_uids = uids[-limit:] if len(uids) > limit else uids
        report["scanned"] = len(target_uids)
        
        # Reverse to process newest first
        target_uids.reverse()
        
        for uid in target_uids:
            try:
                typ, msg_data = M.fetch(uid, '(RFC822)')
                if typ != 'OK' or not msg_data or not msg_data[0]:
                    continue
                
                raw = msg_data[0][1]
                msg = email.message_from_bytes(raw)
                
                subject = decode_mime(msg.get('Subject', ''))
                from_addr = decode_mime(msg.get('From', ''))
                date_str = msg.get('Date', '')
                msg_id = msg.get('Message-ID', f"uid-{uid.decode()}-{user}")
                
                body = ""
                if msg.is_multipart():
                    # Look for text/plain first, then fallback to text/html
                    plain_body = ""
                    html_body = ""
                    for part in msg.walk():
                        ctype = part.get_content_type()
                        try:
                            payload = part.get_payload(decode=True)
                            if not payload:
                                continue
                            decoded_part = payload.decode(part.get_content_charset() or 'utf-8', errors='ignore')
                            if ctype == 'text/plain' and not plain_body:
                                plain_body = decoded_part
                            elif ctype == 'text/html' and not html_body:
                                html_body = decoded_part
                        except Exception:
                            continue
                    body = plain_body if plain_body else html_body
                else:
                    try:
                        payload = msg.get_payload(decode=True)
                        if payload:
                            body = payload.decode(msg.get_content_charset() or 'utf-8', errors='ignore')
                    except Exception:
                        body = str(msg.get_payload())
                
                cleaned = clean_body_text(body)
                
                report["messages"].append({
                    "uid": uid.decode(),
                    "message_id": msg_id,
                    "subject": subject,
                    "from": from_addr,
                    "date": date_str,
                    "body": cleaned[:4000] # Cap text snippet for performance
                })
            except Exception as e:
                continue
                
        try:
            M.close()
            M.logout()
        except Exception:
            pass
            
        report["status"] = "success"
        return report

    except Exception as e:
        report["error"] = str(e)
        return report


def main():
    parser = argparse.ArgumentParser(description="Fetch latest IMAP emails as JSON")
    parser.add_argument("--host", default="imap.dreamhost.com", help="IMAP Host")
    parser.add_argument("--port", type=int, default=993, help="IMAP Port")
    parser.add_argument("--user", required=True, help="IMAP Username / Email")
    parser.add_argument("--password", required=True, help="IMAP Password")
    parser.add_argument("--limit", type=int, default=10, help="Max emails to fetch")
    parser.add_argument("--output", default=None, help="Output JSON file path")
    
    args = parser.parse_args()
    
    result = fetch_emails(args.host, args.port, args.user, args.password, args.limit)
    out_json = json.dumps(result, indent=2)
    
    if args.output:
        with open(args.output, "w", encoding="utf-8") as f:
            f.write(out_json)
    else:
        print(out_json)


if __name__ == "__main__":
    main()
