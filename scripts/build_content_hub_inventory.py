#!/usr/bin/env python3
"""Build the public Knowledge Hub inventory outputs."""
from __future__ import annotations

import csv
import datetime as dt
import re
from pathlib import Path
from typing import Dict, Iterable, List

REPO_ROOT = Path(__file__).resolve().parents[1]
BASE_DOMAIN = "https://www.mymiwallet.com"
FEATURE_INVENTORY = REPO_ROOT / "docs/functional_inventory/feature_inventory.csv"
SEO_INVENTORY_CANDIDATES = [
    REPO_ROOT / "docs/marketing/page_seo_inventory.csv",
    REPO_ROOT / "public/assets/documents/Exports/page_seo_inventory.csv",
    REPO_ROOT / "public/assets/documents/Exports/bf_marketing_page_seo.csv",
]
OUTPUT_DIR = REPO_ROOT / "docs/content_hub_inventory"
CSV_OUTPUT = OUTPUT_DIR / "content_hub_inventory.csv"
MD_OUTPUT = OUTPUT_DIR / "content_hub_inventory.md"
CSV_HEADER = [
    "ContentPage",
    "Slug",
    "RoutePath",
    "FullUrl",
    "Category",
    "SearchIntent",
    "ContentType",
    "Priority",
    "SchemaTypes",
    "TargetKeywords",
    "WordCountGoal",
    "RequiresOGTags",
    "RequiresTwitterCard",
    "RequiresCanonical",
    "InternalLinkTargets",
    "LinkedFromModules",
    "PlannedCTA",
    "IsDraft",
    "Status",
    "Owner",
    "LastUpdated",
    "Notes",
]
PRIORITY_ORDER = {"high": 0, "medium": 1, "low": 2}
CORE_INTERNAL_LINKS = "/Knowledge/What-Is-MyMI-Wallet,/Knowledge/Budgeting-Academy,/Knowledge/Investment-FAQ"
TODAY = dt.date.today().isoformat()


def slugify(value: str) -> str:
    value = value or ""
    value = value.strip().lower()
    value = re.sub(r"[^a-z0-9]+", "-", value)
    return value.strip("-")


def bool_str(value) -> str:
    return "true" if str(value).lower() not in {"false", "0", ""} else "false"


def ensure_route(route: str) -> str:
    route = route or "/"
    if not route.startswith("/"):
        route = f"/{route}"
    return route


def load_csv(path: Path) -> List[Dict[str, str]]:
    if not path.exists():
        return []
    with path.open(newline="", encoding="utf-8") as handle:
        return list(csv.DictReader(handle))


def load_feature_inventory() -> List[Dict[str, str]]:
    return load_csv(FEATURE_INVENTORY)


def load_seo_inventory() -> List[Dict[str, str]]:
    for candidate in SEO_INVENTORY_CANDIDATES:
        if candidate.exists():
            return load_csv(candidate)
    return []


def base_content_pages() -> List[Dict[str, str]]:
    return [
        {
            "ContentPage": "What is MyMI Wallet?",
            "Slug": "what-is-mymi-wallet",
            "RoutePath": "/Knowledge/What-Is-MyMI-Wallet",
            "Category": "Foundational",
            "SearchIntent": "informational|navigational",
            "ContentType": "Long-Form Article",
            "Priority": "high",
            "SchemaTypes": "Article|FinancialService|WebPage",
            "TargetKeywords": "what is mymi wallet,personal finance dashboard,investment tools overview,crypto portfolio tracker",
            "WordCountGoal": 2000,
            "InternalLinkTargets": "/Knowledge/Budgeting-Academy,/Knowledge/Investment-FAQ,/Knowledge/AI-Trade-Insights",
            "LinkedFromModules": "Marketing,Navigation,Landing",
            "PlannedCTA": "Join MyMI Wallet",
            "IsDraft": "true",
            "Status": "planned",
            "Owner": "Marketing",
            "LastUpdated": TODAY,
            "Notes": "Cornerstone overview for the Knowledge Hub and SEO anchor.",
        },
        {
            "ContentPage": "Budgeting Academy – Beginner Guide",
            "Slug": "budgeting-academy",
            "RoutePath": "/Knowledge/Budgeting-Academy",
            "Category": "Budgeting",
            "SearchIntent": "educational",
            "ContentType": "Step-by-Step Guide",
            "Priority": "high",
            "SchemaTypes": "Article|HowTo|EducationalArticle",
            "TargetKeywords": "budgeting tips,how to budget,personal finance basics,budgeting for beginners,money management guide",
            "WordCountGoal": 2000,
            "InternalLinkTargets": "/Knowledge/What-Is-MyMI-Wallet,/Knowledge/Smart-Savings-Automation,/Knowledge/Investment-FAQ",
            "LinkedFromModules": "Budget,Marketing,Navigation",
            "PlannedCTA": "Start Budgeting",
            "IsDraft": "true",
            "Status": "planned",
            "Owner": "Marketing",
            "LastUpdated": TODAY,
            "Notes": "Series anchor for the budgeting education curriculum.",
        },
        {
            "ContentPage": "Investment Tools FAQ",
            "Slug": "investment-tools-faq",
            "RoutePath": "/Knowledge/Investment-FAQ",
            "Category": "Investments",
            "SearchIntent": "informational",
            "ContentType": "FAQ",
            "Priority": "medium",
            "SchemaTypes": "FAQPage|FinancialService",
            "TargetKeywords": "investment tools faq,how to use investment alerts,mymi investment platform,investment planning questions",
            "WordCountGoal": 800,
            "InternalLinkTargets": "/Knowledge/What-Is-MyMI-Wallet,/Knowledge/AI-Trade-Insights,/Knowledge/Portfolio-Diversification-Strategies",
            "LinkedFromModules": "Investments,Support,Marketing",
            "PlannedCTA": "Track Your Investments",
            "IsDraft": "true",
            "Status": "planned",
            "Owner": "Marketing",
            "LastUpdated": TODAY,
            "Notes": "Answers prioritized questions from investor interviews and support tickets.",
        },
        {
            "ContentPage": "MyMI Alerts Knowledge Base",
            "Slug": "mymi-alerts-knowledge-base",
            "RoutePath": "/Knowledge/Alerts-Knowledge-Base",
            "Category": "Knowledge Base",
            "SearchIntent": "educational",
            "ContentType": "Knowledge Base Entry",
            "Priority": "medium",
            "SchemaTypes": "WebPage|HowTo|Article",
            "TargetKeywords": "trade alerts,mymi alerts,automated trade alerts,stock alert system",
            "WordCountGoal": 1200,
            "InternalLinkTargets": "/Knowledge/AI-Trade-Insights,/Knowledge/Investment-FAQ,/Knowledge/What-Is-MyMI-Wallet",
            "LinkedFromModules": "Alerts,Support,Marketing",
            "PlannedCTA": "Try MyMI Alerts",
            "IsDraft": "true",
            "Status": "planned",
            "Owner": "Product",
            "LastUpdated": TODAY,
            "Notes": "Explain alert tiers, notification cadence, and onboarding flows.",
        },
        {
            "ContentPage": "Crypto Tax Help – Best Practices",
            "Slug": "crypto-tax-help",
            "RoutePath": "/Knowledge/Crypto-Tax-Help",
            "Category": "Crypto",
            "SearchIntent": "informational",
            "ContentType": "Long-Form Article",
            "Priority": "medium",
            "SchemaTypes": "Article|FinancialService",
            "TargetKeywords": "crypto taxes,capital gains tracking,crypto income reporting,defi tax tools",
            "WordCountGoal": 1500,
            "InternalLinkTargets": "/Knowledge/What-Is-MyMI-Wallet,/Knowledge/Investment-FAQ,/Knowledge/Crypto-Security-Essentials",
            "LinkedFromModules": "Crypto,Marketing,Support",
            "PlannedCTA": "Get Crypto Tax Help",
            "IsDraft": "true",
            "Status": "planned",
            "Owner": "Marketing",
            "LastUpdated": TODAY,
            "Notes": "Align with tax-season campaigns and include downloadable checklist.",
        },
        {
            "ContentPage": "AI-Powered Trade Insights",
            "Slug": "ai-powered-trade-insights",
            "RoutePath": "/Knowledge/AI-Trade-Insights",
            "Category": "AI Insights",
            "SearchIntent": "informational",
            "ContentType": "Long-Form Article",
            "Priority": "high",
            "SchemaTypes": "Article|TechArticle|WebPage",
            "TargetKeywords": "ai trading insights,market predictions,fractal analysis,automated trade ideas",
            "WordCountGoal": 1500,
            "InternalLinkTargets": "/Knowledge/Investment-FAQ,/Knowledge/Daily-Financial-News,/Knowledge/Portfolio-Diversification-Strategies",
            "LinkedFromModules": "Alerts,Investments,Marketing",
            "PlannedCTA": "Explore AI Insights",
            "IsDraft": "true",
            "Status": "drafting",
            "Owner": "Product",
            "LastUpdated": TODAY,
            "Notes": "Leverage existing AI alert models and include chart snapshots.",
        },
        {
            "ContentPage": "Daily Financial News Summary",
            "Slug": "daily-financial-news-summary",
            "RoutePath": "/Knowledge/Today-In-Finance",
            "Category": "Financial News",
            "SearchIntent": "informational",
            "ContentType": "Public News Digest",
            "Priority": "medium",
            "SchemaTypes": "NewsArticle",
            "TargetKeywords": "daily financial news,market summary,stock news digest,market highlights",
            "WordCountGoal": 800,
            "InternalLinkTargets": "/Knowledge/AI-Trade-Insights,/Knowledge/What-Is-MyMI-Wallet,/Knowledge/Investment-FAQ",
            "LinkedFromModules": "Marketing,Investments,Navigation",
            "PlannedCTA": "Subscribe to Daily News Digest",
            "IsDraft": "true",
            "Status": "planned",
            "Owner": "Marketing",
            "LastUpdated": TODAY,
            "Notes": "Syndicate MarketAux and AlphaVantage data with commentary.",
        },
        {
            "ContentPage": "MyMI Wallet Getting Started Guide",
            "Slug": "mymi-wallet-getting-started",
            "RoutePath": "/Knowledge/Getting-Started",
            "Category": "Education",
            "SearchIntent": "educational",
            "ContentType": "Tutorial",
            "Priority": "medium",
            "SchemaTypes": "Article|HowTo|EducationalArticle",
            "TargetKeywords": "getting started with mymi wallet,onboarding guide,mymi setup tutorial,personal finance onboarding",
            "WordCountGoal": 2000,
            "InternalLinkTargets": "/Knowledge/What-Is-MyMI-Wallet,/Knowledge/Budgeting-Academy,/Knowledge/Investment-FAQ",
            "LinkedFromModules": "Marketing,Support,Onboarding",
            "PlannedCTA": "Create Your Free Account",
            "IsDraft": "true",
            "Status": "drafting",
            "Owner": "Customer Success",
            "LastUpdated": TODAY,
            "Notes": "Repurpose onboarding flow with annotated screenshots.",
        },
        {
            "ContentPage": "Personal Finance Glossary",
            "Slug": "personal-finance-glossary",
            "RoutePath": "/Knowledge/Personal-Finance-Glossary",
            "Category": "Education",
            "SearchIntent": "informational",
            "ContentType": "Glossary",
            "Priority": "medium",
            "SchemaTypes": "ItemList|WebPage|Article",
            "TargetKeywords": "personal finance glossary,financial terms definitions,investing glossary,money vocabulary",
            "WordCountGoal": 2000,
            "InternalLinkTargets": "/Knowledge/What-Is-MyMI-Wallet,/Knowledge/Budgeting-Academy,/Knowledge/Investment-FAQ",
            "LinkedFromModules": "SEO,Support,Marketing",
            "PlannedCTA": "Bookmark the Glossary",
            "IsDraft": "true",
            "Status": "planned",
            "Owner": "Marketing",
            "LastUpdated": TODAY,
            "Notes": "Alphabetized glossary that powers contextual tooltips.",
        },
        {
            "ContentPage": "Smart Savings Automation Tips",
            "Slug": "smart-savings-automation",
            "RoutePath": "/Knowledge/Smart-Savings-Automation",
            "Category": "Budgeting",
            "SearchIntent": "informational|awareness-building",
            "ContentType": "Long-Form Article",
            "Priority": "medium",
            "SchemaTypes": "Article|HowTo",
            "TargetKeywords": "savings automation,automatic budgeting,mymi automations,bill payment planning",
            "WordCountGoal": 1500,
            "InternalLinkTargets": "/Knowledge/Budgeting-Academy,/Knowledge/Getting-Started,/Knowledge/Investment-FAQ",
            "LinkedFromModules": "Budget,Automation,Marketing",
            "PlannedCTA": "Start Automating Savings",
            "IsDraft": "true",
            "Status": "planned",
            "Owner": "Marketing",
            "LastUpdated": TODAY,
            "Notes": "Highlight ACH rules, envelope budgeting, and automation recipes.",
        },
        {
            "ContentPage": "Portfolio Diversification Strategies",
            "Slug": "portfolio-diversification-strategies",
            "RoutePath": "/Knowledge/Portfolio-Diversification-Strategies",
            "Category": "Investments",
            "SearchIntent": "educational",
            "ContentType": "Long-Form Article",
            "Priority": "medium",
            "SchemaTypes": "Article|EducationalArticle",
            "TargetKeywords": "portfolio diversification strategies,risk management guide,asset allocation,my mi investments",
            "WordCountGoal": 1500,
            "InternalLinkTargets": "/Knowledge/Investment-FAQ,/Knowledge/AI-Trade-Insights,/Knowledge/What-Is-MyMI-Wallet",
            "LinkedFromModules": "Investments,Advisory,Marketing",
            "PlannedCTA": "Build Your Portfolio Plan",
            "IsDraft": "true",
            "Status": "planned",
            "Owner": "Product",
            "LastUpdated": TODAY,
            "Notes": "Showcase comparative analytics and goal tracking dashboards.",
        },
        {
            "ContentPage": "Crypto Security Essentials",
            "Slug": "crypto-security-essentials",
            "RoutePath": "/Knowledge/Crypto-Security-Essentials",
            "Category": "Crypto",
            "SearchIntent": "informational",
            "ContentType": "Tutorial",
            "Priority": "medium",
            "SchemaTypes": "Article|HowTo",
            "TargetKeywords": "crypto security essentials,hardware wallet tips,defi safety guide,crypto portfolio protection",
            "WordCountGoal": 1500,
            "InternalLinkTargets": "/Knowledge/Crypto-Tax-Help,/Knowledge/What-Is-MyMI-Wallet,/Knowledge/Investment-FAQ",
            "LinkedFromModules": "Crypto,Security,Marketing",
            "PlannedCTA": "Secure Your Assets",
            "IsDraft": "true",
            "Status": "planned",
            "Owner": "Security",
            "LastUpdated": TODAY,
            "Notes": "Pair with breach-response SOPs and hardware wallet recommendations.",
        },
        {
            "ContentPage": "AI Insights vs. Manual Research",
            "Slug": "ai-insights-vs-manual-research",
            "RoutePath": "/Knowledge/AI-Insights-Vs-Manual-Research",
            "Category": "AI Insights",
            "SearchIntent": "informational",
            "ContentType": "Explainer",
            "Priority": "low",
            "SchemaTypes": "Article|TechArticle",
            "TargetKeywords": "ai vs manual research,investment research automation,ai trade intelligence,investment workflows",
            "WordCountGoal": 1500,
            "InternalLinkTargets": "/Knowledge/AI-Trade-Insights,/Knowledge/Investment-FAQ,/Knowledge/What-Is-MyMI-Wallet",
            "LinkedFromModules": "AI Insights,Alerts,Marketing",
            "PlannedCTA": "Explore AI Signals",
            "IsDraft": "true",
            "Status": "planned",
            "Owner": "Marketing",
            "LastUpdated": TODAY,
            "Notes": "Contrast AI signal workflows with legacy spreadsheet analysis.",
        },
    ]


def normalize_entry(entry: Dict[str, str]) -> Dict[str, str]:
    route = ensure_route(entry.get("RoutePath", "/"))
    entry["RoutePath"] = route
    entry.setdefault("Slug", slugify(route.strip("/").split("/")[-1]))
    entry["FullUrl"] = f"{BASE_DOMAIN}{route}"
    entry["SearchIntent"] = entry.get("SearchIntent", "informational").lower()
    entry["Priority"] = entry.get("Priority", "medium").lower()
    entry.setdefault("Category", "Education")
    entry.setdefault("ContentType", "Long-Form Article")
    entry.setdefault("SchemaTypes", "Article|WebPage")
    entry.setdefault("TargetKeywords", "")
    entry.setdefault("WordCountGoal", "1200")
    entry["WordCountGoal"] = str(entry["WordCountGoal"])
    entry.setdefault("InternalLinkTargets", CORE_INTERNAL_LINKS)
    entry.setdefault("LinkedFromModules", "Marketing,Navigation")
    entry.setdefault("PlannedCTA", "Join MyMI Wallet")
    entry["IsDraft"] = "true" if str(entry.get("IsDraft", "true")).lower() in {"true", "1", "yes"} else "false"
    entry["Status"] = entry.get("Status", "planned").lower()
    entry.setdefault("Owner", "Marketing")
    entry.setdefault("LastUpdated", TODAY)
    entry.setdefault("Notes", "")
    entry["RequiresOGTags"] = bool_str(entry.get("RequiresOGTags", True))
    entry["RequiresTwitterCard"] = bool_str(entry.get("RequiresTwitterCard", True))
    entry["RequiresCanonical"] = bool_str(entry.get("RequiresCanonical", True))
    return entry


def derive_from_feature_inventory(features: Iterable[Dict[str, str]]) -> List[Dict[str, str]]:
    derived: List[Dict[str, str]] = []
    for row in features:
        route = row.get("RoutePath", "").strip()
        if not route or "/Knowledgebase" not in route:
            continue
        original_route = route
        public_route = route.replace("/Knowledgebase", "/Knowledge")
        public_route = ensure_route(public_route)
        end_segment = public_route.strip("/").split("/")[-1]
        if end_segment.lower() in {"knowledge", "knowledgebase"}:
            slug = "knowledge-hub-overview"
            route_for_entry = "/Knowledge"
            title_suffix = "Knowledge Hub Overview"
        else:
            slug = slugify(end_segment)
            route_for_entry = public_route
            feature_name = row.get("FeatureName", "Knowledgebase")
            if "–" in feature_name:
                title_suffix = feature_name.split("–", 1)[1].strip()
            else:
                title_suffix = feature_name.strip() or end_segment.replace("-", " ").title()
        content_page = f"{title_suffix} – Knowledge Base"
        keywords = f"mymi {title_suffix.lower().replace(' ', '-')},mymi knowledge base {title_suffix.lower()},knowledge hub {slug}"
        menu_location = row.get("MenuLocation", "").strip()
        module_context = row.get("Module", "User").strip()
        linked_modules: List[str] = []
        seen = set()
        for value in [menu_location, module_context, "Support", "Knowledgebase"]:
            if value and value not in seen:
                linked_modules.append(value)
                seen.add(value)
        description = row.get("Description", "").strip()
        notes = f"Ported from feature inventory route {original_route}. {description}".strip()
        derived.append(
            {
                "ContentPage": content_page,
                "Slug": slug,
                "RoutePath": route_for_entry,
                "Category": "Knowledge Base",
                "SearchIntent": "educational",
                "ContentType": "Knowledge Base Entry",
                "Priority": "medium",
                "SchemaTypes": "WebPage|HowTo|FAQPage",
                "TargetKeywords": keywords,
                "WordCountGoal": 1200,
                "InternalLinkTargets": CORE_INTERNAL_LINKS,
                "LinkedFromModules": ",".join(linked_modules),
                "PlannedCTA": "Explore Knowledge Hub",
                "IsDraft": "true",
                "Status": "planned",
                "Owner": "Support",
                "LastUpdated": TODAY,
                "Notes": notes,
            }
        )
    return derived


def apply_seo_overrides(entries: Dict[str, Dict[str, str]], seo_rows: Iterable[Dict[str, str]]) -> None:
    url_to_entry = {value["FullUrl"]: key for key, value in entries.items()}
    for row in seo_rows:
        page_url = row.get("page_url") or row.get("page_internal_url")
        if not page_url:
            continue
        page_url = page_url.strip()
        if not page_url:
            continue
        if page_url in url_to_entry:
            slug = url_to_entry[page_url]
            entry = entries[slug]
            entry["Status"] = "published" if row.get("active", "1") == "1" else entry["Status"]
            entry["IsDraft"] = "false"
            note_suffix = row.get("page_title") or row.get("page_name")
            if note_suffix:
                entry["Notes"] = f"SEO inventory mapped: {note_suffix}. {entry['Notes']}".strip()


def normalize_entries(entries: Iterable[Dict[str, str]]) -> List[Dict[str, str]]:
    normalized = []
    for entry in entries:
        normalized.append(normalize_entry(entry))
    return normalized


def write_csv(rows: List[Dict[str, str]]) -> None:
    OUTPUT_DIR.mkdir(parents=True, exist_ok=True)
    with CSV_OUTPUT.open("w", newline="", encoding="utf-8") as handle:
        writer = csv.DictWriter(handle, fieldnames=CSV_HEADER)
        writer.writeheader()
        for row in rows:
            writer.writerow(row)


def write_markdown(rows: List[Dict[str, str]]) -> None:
    OUTPUT_DIR.mkdir(parents=True, exist_ok=True)
    lines: List[str] = []
    lines.append("# MyMI Wallet – Public Content Hub Inventory\n")
    lines.append("This document tracks all long-form public content that powers the Knowledge Hub, SEO acquisition, and investor education.\n")
    for priority in ["high", "medium", "low"]:
        priority_rows = [row for row in rows if row["Priority"] == priority]
        if not priority_rows:
            continue
        lines.append(f"## {priority.title()} Priority Content\n")
        for idx, row in enumerate(priority_rows, 1):
            lines.append(f"### {idx}. {row['ContentPage']}\n")
            lines.append(f"- **Route**: `{row['RoutePath']}`")
            lines.append(f"- **URL**: {row['FullUrl']}")
            lines.append(f"- **Category**: {row['Category']}")
            lines.append(f"- **Search Intent**: {row['SearchIntent']}")
            lines.append(f"- **Content Type**: {row['ContentType']}")
            lines.append(f"- **Schema**: `{row['SchemaTypes']}`")
            lines.append(f"- **Target Keywords**: `{row['TargetKeywords']}`")
            lines.append(f"- **Word Count Goal**: {row['WordCountGoal']}")
            lines.append(f"- **Linked From Modules**: {row['LinkedFromModules']}")
            lines.append(f"- **CTA**: {row['PlannedCTA']}")
            lines.append(f"- **Status**: {row['Status']} | **Draft?** {row['IsDraft']} | **Owner**: {row['Owner']} | **Last Updated**: {row['LastUpdated']}")
            if row['Notes']:
                lines.append(f"- **Notes**: {row['Notes']}")
            lines.append("- **Needs**:")
            lines.append("  - [ ] JSON-LD Schema")
            lines.append("  - [ ] OpenGraph + Twitter Card")
            lines.append("  - [ ] Canonical URL")
            lines.append(f"  - [ ] Internal linking to {row['InternalLinkTargets']}")
            lines.append("")
        lines.append("---\n")
    with MD_OUTPUT.open("w", encoding="utf-8") as handle:
        handle.write("\n".join(lines).strip() + "\n")


def main() -> None:
    features = load_feature_inventory()
    seo_rows = load_seo_inventory()
    base_entries = base_content_pages()
    derived_entries = derive_from_feature_inventory(features)
    combined: Dict[str, Dict[str, str]] = {}
    for entry in normalize_entries(base_entries + derived_entries):
        combined.setdefault(entry["Slug"], entry)
    apply_seo_overrides(combined, seo_rows)
    ordered_rows = sorted(
        combined.values(),
        key=lambda row: (PRIORITY_ORDER.get(row["Priority"], 3), row["ContentPage"].lower()),
    )
    write_csv(ordered_rows)
    write_markdown(ordered_rows)
    print(f"Wrote {len(ordered_rows)} content entries to {CSV_OUTPUT} and {MD_OUTPUT}.")


if __name__ == "__main__":
    main()