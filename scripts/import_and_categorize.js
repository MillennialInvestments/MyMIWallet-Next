import fs from "fs";
import path from "path";
import slugify from "slugify";
import natural from "natural";
import { pipeline } from "@xenova/transformers";

// ================== CONFIGURATION =====================

const EXPORT_CONVOS = process.argv[2] || "./chatgpt-export/conversations.json";

const CATEGORY_KEYWORDS = {
  alerts: ["trade alert", "ticker", "open", "scraper", "alpha vantage", "sec", "discord alert"],
  marketing: ["digest", "summary", "tf-idf", "marketing", "zapier", "news"],
  budgeting: ["budget", "income", "expenses", "forecast", "available funds"],
  wallets: ["wallet", "crypto wallet", "bank account", "solana wallet"],
  investments: ["portfolio", "symbols", "stock", "watchlist"],
  predictions: ["model", "prediction", "arima", "forecast", "solana price"],
  discord: ["discord", "channel", "webhook", "bot", "server"],
  devops: ["nginx", "dreamhost", "php-fpm", "502", "server", "deploy"],
  errors: ["error", "exception", "critical", "stack trace", "undefined"],
  misc: []
};

const DOCS_ROOT = path.join(process.cwd(), "docs");
const CAT_ROOT = path.join(DOCS_ROOT, "categorized");
const PROCESSED_INDEX = path.join(DOCS_ROOT, "processed_index.json");

// ================== SEMANTIC MODEL =====================

let embedder;

async function loadEmbedder() {
  embedder = await pipeline("feature-extraction", "Xenova/all-MiniLM-L6-v2");
}

async function embed(text) {
  const normalized = text.length > 6000 ? text.slice(0, 6000) : text;
  const output = await embedder(normalized, { pooling: "mean", normalize: true });
  return output.data;
}

function cosineSim(a, b) {
  let dot = 0;
  let na = 0;
  let nb = 0;
  for (let i = 0; i < a.length; i += 1) {
    dot += a[i] * b[i];
    na += a[i] * a[i];
    nb += b[i] * b[i];
  }
  return dot / (Math.sqrt(na) * Math.sqrt(nb));
}

// ================== UTILITIES ==========================

function ensureCategoryFolders() {
  fs.mkdirSync(CAT_ROOT, { recursive: true });
  Object.keys(CATEGORY_KEYWORDS).forEach((category) => {
    const dir = path.join(CAT_ROOT, category);
    fs.mkdirSync(dir, { recursive: true });
    const keep = path.join(dir, ".gitkeep");
    if (!fs.existsSync(keep)) {
      fs.writeFileSync(keep, "");
    }
  });
}

function loadProcessedIndex() {
  if (fs.existsSync(PROCESSED_INDEX)) {
    return JSON.parse(fs.readFileSync(PROCESSED_INDEX, "utf8"));
  }
  return { processed: [] };
}

function saveProcessedIndex(processed) {
  fs.writeFileSync(PROCESSED_INDEX, JSON.stringify(processed, null, 2));
}

function extractConversationText(convo) {
  let text = "";
  for (const node of Object.values(convo.mapping || {})) {
    if (!node?.message?.content?.parts) continue;
    text += `\n${node.message.content.parts.join("\n")}`;
  }
  return text.trim();
}

function extractTasks(text) {
  const lines = text.split(/\r?\n/);
  const taskSet = new Set();
  const bulletPattern = /^\s*[-*]\s*(?:\[.\]\s*)?(.+)/i;
  const keywordPattern = /(todo|task|fix|implement|create|add|update|deploy|build|configure|debug|investigate|should|need to)/i;

  lines.forEach((line) => {
    const bulletMatch = line.match(bulletPattern);
    if (bulletMatch) {
      const cleaned = bulletMatch[1].trim();
      if (cleaned.length > 3) taskSet.add(cleaned);
      return;
    }

    if (keywordPattern.test(line)) {
      const trimmed = line.trim();
      if (trimmed.length > 10) taskSet.add(trimmed);
    }
  });

  if (taskSet.size === 0) {
    return ["Review this conversation to define actionable tasks."];
  }

  return Array.from(taskSet).slice(0, 10);
}

function getTopKeywords(tfidf, limit = 10) {
  return tfidf
    .listTerms(0)
    .slice(0, limit)
    .map((term) => `${term.term} (${term.tfidf.toFixed(2)})`);
}

function countKeywordHits(text, keyword) {
  const regex = new RegExp(keyword.replace(/[.*+?^${}()|[\]\\]/g, "\\$&"), "gi");
  const matches = text.match(regex);
  return matches ? matches.length : 0;
}

function buildMarkdown({ convo, category, text, tasks, topKeywords }) {
  return `---
title: "${(convo.title || "Untitled").replace(/"/g, '\\"')}"
conversation_id: "${convo.id}"
created_at: "${new Date(convo.create_time * 1000).toISOString()}"
status: "not-complete"
category: "${category}"
---

# ${convo.title || "Untitled"}

## Auto-categorized Topic
> **${category}**

## Top Keywords (TF-IDF)
${topKeywords.map((k) => `- ${k}`).join("\n")}

## Conversation Text
${text}

## Tasks to Complete
${tasks.map((task) => `- [ ] ${task}`).join("\n")}
`;
}

// ================== MAIN ===============================

async function main() {
  ensureCategoryFolders();
  const processed = loadProcessedIndex();
  await loadEmbedder();

  const labelEmbeddings = {};
  for (const label of Object.keys(CATEGORY_KEYWORDS)) {
    labelEmbeddings[label] = await embed(label);
  }

  const raw = JSON.parse(fs.readFileSync(EXPORT_CONVOS, "utf8"));
  const tokenizer = new natural.WordTokenizer();

  for (const convo of raw) {
    if (processed.processed.includes(convo.id)) continue;

    const rawText = extractConversationText(convo);
    const text = rawText.toLowerCase();
    const tokens = tokenizer.tokenize(text);

    const tfidf = new natural.TfIdf();
    tfidf.addDocument(tokens.join(" "));

    const convoVec = await embed(text);
    let bestCategory = "misc";
    let bestScore = Number.NEGATIVE_INFINITY;

    for (const [category, keywords] of Object.entries(CATEGORY_KEYWORDS)) {
      let score = 0;

      for (const keyword of keywords) {
        const hits = countKeywordHits(text, keyword);
        score += hits * 2.0;
      }

      keywords.forEach((keyword) => {
        try {
          score += tfidf.tfidf(keyword, 0) * 1.5;
        } catch (err) {
          // ignore missing terms
        }
      });

      const labelVec = labelEmbeddings[category];
      score += cosineSim(convoVec, labelVec) * 3.0;

      if (score > bestScore) {
        bestScore = score;
        bestCategory = category;
      }
    }

    const date = convo.create_time
      ? new Date(convo.create_time * 1000).toISOString().slice(0, 10)
      : new Date().toISOString().slice(0, 10);
    const slug = slugify(convo.title || "untitled", { lower: true, strict: true });
    const filename = `${date}-${convo.id}-${slug}.md`;

    const filepath = path.join(CAT_ROOT, bestCategory, filename);
    const markdown = buildMarkdown({
      convo,
      category: bestCategory,
      text: rawText,
      tasks: extractTasks(rawText),
      topKeywords: getTopKeywords(tfidf)
    });

    fs.writeFileSync(filepath, markdown, "utf8");
    processed.processed.push(convo.id);
    console.log("Created:", filepath);
  }

  saveProcessedIndex(processed);
}

main().catch((err) => {
  console.error("Failed to import and categorize conversations:", err);
  process.exit(1);
});
