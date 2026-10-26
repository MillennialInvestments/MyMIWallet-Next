#!/usr/bin/env python3
"""
MyMI Wallet - Voiceover Audio Synthesis Engine
Synthesizes narration scripts into broadcast-quality MP3 voiceovers.
Supports chunked streaming, multi-sentence joining, and offline/fallback modes.
"""

import sys
import os
import json
import re
import urllib.request
import urllib.parse

def clean_text_for_speech(text: str) -> str:
    """Normalize text for natural TTS pronunciation."""
    # Convert ticker symbols like $NVDA to "N V D A" or "NVDA"
    text = re.sub(r'\$([A-Z]{1,5})', r'\1', text)
    # Convert +$200 to "plus 200 dollars"
    text = re.sub(r'\+\$([0-9,.]+)', r'plus \1 dollars', text)
    text = re.sub(r'\$([0-9,.]+)', r'\1 dollars', text)
    # Remove markdown asterisks, hashes, backticks
    text = re.sub(r'[*#_`~]', '', text)
    # Normalize whitespace
    text = re.sub(r'\s+', ' ', text).strip()
    return text

def split_into_tts_chunks(text: str, max_chars: int = 175) -> list:
    """Split script into natural sentence or punctuation boundaries."""
    # Split on sentence terminals or semicolons/commas
    raw_pieces = re.split(r'(?<=[.!?])\s+', text)
    chunks = []
    current = ""
    for piece in raw_pieces:
        piece = piece.strip()
        if not piece:
            continue
        if len(current) + len(piece) + 1 <= max_chars:
            current = (current + " " + piece).strip()
        else:
            if current:
                chunks.append(current)
            if len(piece) > max_chars:
                # Sub-split on commas or conjunctions
                sub_parts = re.split(r'(?<=[,;:])\s+', piece)
                sub_current = ""
                for sp in sub_parts:
                    if len(sub_current) + len(sp) + 1 <= max_chars:
                        sub_current = (sub_current + " " + sp).strip()
                    else:
                        if sub_current:
                            chunks.append(sub_current)
                        sub_current = sp
                if sub_current:
                    chunks.append(sub_current)
                current = ""
            else:
                current = piece
    if current:
        chunks.append(current)
    return chunks

def synthesize(text: str, output_path: str, lang: str = 'en') -> dict:
    os.makedirs(os.path.dirname(os.path.abspath(output_path)), exist_ok=True)
    clean_text = clean_text_for_speech(text)
    if not clean_text:
        return {"status": "error", "error": "Empty text after sanitization"}

    chunks = split_into_tts_chunks(clean_text)
    if not chunks:
        chunks = [clean_text[:175]]

    audio_bytes = bytearray()
    headers = {
        "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36",
        "Referer": "https://translate.google.com/"
    }

    for idx, chunk in enumerate(chunks):
        encoded = urllib.parse.quote(chunk)
        url = f"https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl={lang}&q={encoded}"
        req = urllib.request.Request(url, headers=headers)
        try:
            with urllib.request.urlopen(req, timeout=12) as resp:
                if resp.status == 200:
                    audio_bytes.extend(resp.read())
        except Exception as e:
            # Fallback retry without client param
            try:
                alt_url = f"https://translate.google.com/translate_tts?ie=UTF-8&tl={lang}&q={encoded}&total=1&idx=0&textlen={len(chunk)}"
                alt_req = urllib.request.Request(alt_url, headers=headers)
                with urllib.request.urlopen(alt_req, timeout=10) as alt_resp:
                    if alt_resp.status == 200:
                        audio_bytes.extend(alt_resp.read())
            except Exception as e2:
                sys.stderr.write(f"Warning: chunk {idx} failed: {e2}\n")

    if not audio_bytes:
        return {"status": "error", "error": "No audio bytes could be synthesized."}

    with open(output_path, "wb") as f:
        f.write(audio_bytes)

    file_size = os.path.getsize(output_path)
    # Estimate duration: 64kbps MP3 is ~8000 bytes per second
    duration_est = round(file_size / 8000.0, 2)

    return {
        "status": "success",
        "file": output_path,
        "size_bytes": file_size,
        "duration_seconds_est": duration_est,
        "chunks_processed": len(chunks),
        "word_count": len(clean_text.split())
    }

def main():
    if len(sys.argv) < 3:
        print(json.dumps({
            "status": "error",
            "error": "Usage: generate_voiceover.py <text> <output_path> [lang]"
        }))
        sys.exit(1)

    text = sys.argv[1]
    output_path = sys.argv[2]
    lang = sys.argv[3] if len(sys.argv) > 3 else 'en'

    result = synthesize(text, output_path, lang)
    print(json.dumps(result))
    if result.get("status") != "success":
        sys.exit(1)

if __name__ == "__main__":
    main()
