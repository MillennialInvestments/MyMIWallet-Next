#!/usr/bin/env python3
import json
import math
import re
import sys
from collections import Counter, defaultdict


def tokenize(text: str):
    return [w for w in re.findall(r"[a-zA-Z0-9][a-zA-Z0-9\-']+", text.lower()) if len(w) > 2]


def tfidf_keywords(text: str, max_k: int = 20):
    sentences = [s.strip() for s in re.split(r"[.!?\n]+", text) if s.strip()]
    if len(sentences) < 2:
        words = tokenize(text)
        return [w for w, _ in Counter(words).most_common(max_k)]

    docs = [tokenize(s) for s in sentences]
    docs = [d for d in docs if d]
    if not docs:
        return []

    df = defaultdict(int)
    for doc in docs:
        for token in set(doc):
            df[token] += 1

    n_docs = len(docs)
    scores = defaultdict(float)
    for doc in docs:
        tf = Counter(doc)
        length = max(len(doc), 1)
        for token, freq in tf.items():
            idf = math.log((1 + n_docs) / (1 + df[token])) + 1
            scores[token] += (freq / length) * idf

    ranked = sorted(scores.items(), key=lambda x: x[1], reverse=True)
    return [k for k, _ in ranked[:max_k]]


def rake_keywords(text: str, max_k: int = 20):
    try:
        from rake_nltk import Rake  # type: ignore

        r = Rake()
        r.extract_keywords_from_text(text)
        phrases = r.get_ranked_phrases()[:max_k]
        return [p.strip().lower() for p in phrases if p.strip()]
    except Exception:
        # fallback: n-gram frequency
        words = tokenize(text)
        bigrams = [f"{words[i]} {words[i+1]}" for i in range(len(words)-1)]
        counts = Counter(bigrams)
        if not counts:
            return []
        return [k for k, _ in counts.most_common(max_k)]


def merge_ranked(*ranked_lists):
    scores = defaultdict(float)
    for idx, keywords in enumerate(ranked_lists):
        weight = 2.0 if idx == 0 else 1.0
        for rank, kw in enumerate(keywords):
            key = re.sub(r"\s+", " ", kw.strip().lower())
            if not key:
                continue
            scores[key] += weight / (rank + 1)
    merged = sorted(scores.items(), key=lambda x: x[1], reverse=True)
    return [k for k, _ in merged]


def main():
    if len(sys.argv) < 2:
        print(json.dumps({"keywords": []}))
        return

    file_path = sys.argv[1]
    try:
        with open(file_path, "r", encoding="utf-8") as f:
            text = f.read()
    except Exception:
        print(json.dumps({"keywords": []}))
        return

    tfidf = tfidf_keywords(text)
    rake = rake_keywords(text)
    keywords = merge_ranked(tfidf, rake)[:20]
    print(json.dumps({"keywords": keywords}))


if __name__ == "__main__":
    main()
