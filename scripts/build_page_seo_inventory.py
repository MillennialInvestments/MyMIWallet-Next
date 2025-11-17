#!/usr/bin/env python3
"""Builds an SEO-focused page inventory derived from the functional inventory."""
from __future__ import annotations

import csv
import itertools
import re
from collections import OrderedDict
from pathlib import Path
from typing import Dict, Iterable, List

REPO_ROOT = Path(__file__).resolve().parents[1]
INPUT_PATH = REPO_ROOT / "docs" / "functional_inventory" / "feature_inventory.csv"
OUTPUT_DIR = REPO_ROOT / "docs" / "page_seo_inventory"
CSV_OUTPUT_PATH = OUTPUT_DIR / "page_seo_inventory.csv"
MD_OUTPUT_PATH = OUTPUT_DIR / "page_seo_inventory.md"
BASE_URL = "https://www.mymiwallet.com"

SCHEMA_PATTERNS: List[tuple[str, List[str]]] = [
    ("landing", ["Organization", "SoftwareApplication", "FinancialService"]),
    ("home", ["Organization", "SoftwareApplication", "FinancialService"]),
    ("budget", ["FinancialProduct", "WebApplication"]),
    ("wallet", ["FinancialProduct", "WebApplication"]),
    ("alert", ["InvestmentOrDeposit", "WebApplication"]),
    ("invest", ["FinancialProduct", "WebApplication"]),
    ("news", ["NewsArticle", "WebPage"]),
    ("blog", ["NewsArticle", "WebPage"]),
    ("marketing", ["WebApplication"]),
    ("support", ["WebPage"]),
    ("help", ["WebPage"]),
    ("doc", ["TechArticle"]),
]

KEYWORD_MAP: Dict[str, str] = {
    "budget": "personal finance dashboard,budgeting tool,monthly budget planner,budget to investment tool",
    "wallets": "crypto wallet dashboard,digital asset tracker,portfolio wallet manager,wallet security tools",
    "alerts": "investment alerts,automated trade alerts,stock alerts,crypto alerts",
    "investments": "investment analysis,portfolio tracker,market insights,investment research",
    "investing": "investment analysis,portfolio tracker,market insights,investment research",
    "marketing": "financial marketing platform,growth marketing tools,campaign analytics,customer acquisition",
    "newsandupdates": "financial news summarizer,market news digest,investment news updates,product announcements",
    "news": "financial news,market updates,investment stories,company announcements",
    "support": "support center,help desk,knowledge base,customer support",
    "knowledgebase": "support articles,help documentation,troubleshooting guides,faq",
    "docs": "api documentation,developer docs,technical reference,implementation guide",
    "howitworks": "how mymi wallet works,platform overview,product explanation,investment automation",
    "home": "personal finance platform,mymiwallet,investment tools,financial planning",
}

LINK_GRAPH = {
    "budget": {
        "modules": "User:Dashboard,User:Budget",
        "routes": "/Dashboard,/Wallets,/Alerts",
    },
    "wallets": {
        "modules": "User:Dashboard,User:Wallets",
        "routes": "/Dashboard,/Budget,/Alerts",
    },
    "alerts": {
        "modules": "User:Dashboard,User:Alerts",
        "routes": "/Dashboard,/Budget,/Wallets",
    },
    "investments": {
        "modules": "User:Dashboard,User:Investments",
        "routes": "/Dashboard,/Budget,/Wallets",
    },
    "marketing": {
        "modules": "Marketing:Landing,Marketing:News",
        "routes": "/,/News-And-Updates",
    },
    "newsandupdates": {
        "modules": "Marketing:Landing,Marketing:News",
        "routes": "/,/News-And-Updates",
    },
    "support": {
        "modules": "Support:HelpCenter,User:Dashboard",
        "routes": "/Support,/Dashboard",
    },
    "knowledgebase": {
        "modules": "Support:HelpCenter,User:Dashboard",
        "routes": "/Support,/Dashboard",
    },
}

CSV_HEADERS = [
    "Module",
    "Area",
    "FeatureName",
    "RoutePath",
    "FullUrl",
    "Category",
    "Status",
    "TargetKeywords",
    "SchemaTypes",
    "HasJsonLd",
    "HasOpenGraph",
    "HasTwitterCard",
    "CanonicalUrl",
    "HasCanonicalTag",
    "InternalLinkPriority",
    "HasFooterLink",
    "HasSidebarLink",
    "HasBreadcrumb",
    "HasRelatedFeaturesBlock",
    "LinkedFromModules",
    "LinkedFromRoutes",
    "Notes",
]


def _is_true(value: str | None) -> bool:
    return str(value).strip().lower() == "true"


def clean_route(path: str) -> str:
    path = path.strip()
    if not path:
        return "/"
    return "/" + path.lstrip("/")


def infer_schema_types(row: Dict[str, str]) -> List[str]:
    haystack = " ".join(
        [row.get("Area", ""), row.get("Module", ""), row.get("FeatureName", ""), row.get("RoutePath", ""), row.get("Category", "")]
    ).lower()
    for pattern, schemas in SCHEMA_PATTERNS:
        if pattern in haystack:
            return schemas
    return ["WebPage"]


def slugify_words(value: str) -> str:
    cleaned = re.sub(r"[^a-zA-Z0-9\s]", " ", value)
    cleaned = re.sub(r"\s+", " ", cleaned).strip().lower()
    return cleaned


def infer_keywords(row: Dict[str, str]) -> str:
    area_key = row.get("Area", "").strip().lower()
    if area_key in KEYWORD_MAP:
        return KEYWORD_MAP[area_key]
    feature = slugify_words(row.get("FeatureName", ""))
    area = slugify_words(row.get("Area", ""))
    module = slugify_words(row.get("Module", ""))
    description = slugify_words(row.get("Description", ""))
    candidates: List[str] = []
    if feature:
        candidates.append(feature)
    if area:
        candidates.append(f"{area} tools")
    if module:
        candidates.append(f"{module} dashboard")
    if description:
        words = [w for w in description.split(" ") if len(w) > 3]
        if words:
            chunk = " ".join(itertools.islice(words, 0, 4))
            candidates.append(chunk)
    candidates.append("mymiwallet platform")
    # Deduplicate while keeping order
    seen = OrderedDict((item, None) for item in candidates if item)
    return ",".join(seen.keys())


def infer_priority(row: Dict[str, str]) -> str:
    area = row.get("Area", "").lower()
    route = row.get("RoutePath", "").lower()
    feature = row.get("FeatureName", "").lower()
    if area in {"budget", "wallets", "alerts"} or route in {"/", "/dashboard"}:
        return "high"
    if "setting" in feature or "setting" in route:
        return "low"
    return "medium"


def infer_footer_link(row: Dict[str, str]) -> str:
    category = (row.get("Category", "") or "").lower()
    module = (row.get("Module", "") or "").lower()
    area = (row.get("Area", "") or "").lower()
    if "public" in category or module in {"marketing", "support"} or area in {"newsandupdates", "news", "support", "knowledgebase"}:
        return "true"
    return "todo"


def infer_sidebar_link(row: Dict[str, str]) -> str:
    area = (row.get("Area", "") or "").lower()
    menu = (row.get("MenuLocation", "") or "").lower()
    if "sidebar" in menu or area in {"budget", "wallets", "alerts", "investments"}:
        return "true"
    return "todo"


def infer_link_data(row: Dict[str, str]) -> tuple[str, str]:
    area_key = row.get("Area", "").strip().lower()
    config = LINK_GRAPH.get(area_key)
    if config:
        return config["modules"], config["routes"]
    return "", ""


def build_rows(rows: Iterable[Dict[str, str]]) -> List[Dict[str, str]]:
    seo_rows: List[Dict[str, str]] = []
    for row in rows:
        if not (_is_true(row.get("IsUIPage")) and not _is_true(row.get("IsApiEndpoint")) and not _is_true(row.get("IsCronEndpoint"))):
            continue
        route_path = clean_route(row.get("RoutePath", "/"))
        full_url = f"{BASE_URL}{route_path}"
        schema_types = ",".join(infer_schema_types(row))
        target_keywords = infer_keywords(row)
        canonical_url = full_url
        priority = infer_priority(row)
        footer_link = infer_footer_link(row)
        sidebar_link = infer_sidebar_link(row)
        modules_linked, routes_linked = infer_link_data(row)
        seo_rows.append(
            {
                "Module": row.get("Module", ""),
                "Area": row.get("Area", ""),
                "FeatureName": row.get("FeatureName", ""),
                "RoutePath": route_path,
                "FullUrl": full_url,
                "Category": row.get("Category", ""),
                "Status": row.get("Status", ""),
                "TargetKeywords": target_keywords,
                "SchemaTypes": schema_types,
                "HasJsonLd": "todo",
                "HasOpenGraph": "todo",
                "HasTwitterCard": "todo",
                "CanonicalUrl": canonical_url,
                "HasCanonicalTag": "todo",
                "InternalLinkPriority": priority,
                "HasFooterLink": footer_link,
                "HasSidebarLink": sidebar_link,
                "HasBreadcrumb": "todo",
                "HasRelatedFeaturesBlock": "todo",
                "LinkedFromModules": modules_linked,
                "LinkedFromRoutes": routes_linked,
                "Notes": row.get("Notes", ""),
            }
        )
    seo_rows.sort(key=lambda r: (r["Module"], r["Area"], r["FeatureName"]))
    return seo_rows


def write_csv(rows: List[Dict[str, str]]) -> None:
    OUTPUT_DIR.mkdir(parents=True, exist_ok=True)
    with CSV_OUTPUT_PATH.open("w", newline="", encoding="utf-8") as csv_file:
        writer = csv.DictWriter(csv_file, fieldnames=CSV_HEADERS)
        writer.writeheader()
        writer.writerows(rows)


def checkbox(value: str) -> str:
    return "☑" if value.strip().lower() == "true" else "☐"


def code_list(csv_values: str) -> str:
    parts = [part.strip() for part in csv_values.split(",") if part.strip()]
    return ", ".join(f"`{part}`" for part in parts) if parts else "`—`"


def write_markdown(rows: List[Dict[str, str]]) -> None:
    modules: Dict[str, Dict[str, List[Dict[str, str]]]] = OrderedDict()
    for row in rows:
        modules.setdefault(row["Module"], OrderedDict()).setdefault(row["Area"], []).append(row)

    lines: List[str] = []
    lines.append("# MyMI Wallet – Page SEO Inventory")
    lines.append("")
    lines.append("This document tracks SEO implementation per major UI page, built from the functional inventory and enriched with schema + meta requirements.")
    lines.append("")
    lines.append("## Legend")
    lines.append("")
    lines.append("- **JSON-LD**: Page has correct structured data (schema.org) injected.")
    lines.append("- **OG/Twitter**: Page has OpenGraph and Twitter Card metadata.")
    lines.append("- **Canonical**: Page defines a rel=\"canonical\" URL.")
    lines.append("- **Internal Links**: Page participates in footer/sidebar/breadcrumb/related-links graph.")
    lines.append("")
    lines.append("---")
    lines.append("")

    for module, area_map in modules.items():
        lines.append(f"## {module} Module")
        lines.append("")
        for area, items in area_map.items():
            lines.append(f"### {area} Area")
            lines.append("")
            for item in items:
                route = item["RoutePath"]
                feature = item["FeatureName"]
                lines.append(f"- [ ] **{feature}** (`{route}`)")
                lines.append(f"  - **Full URL**: {item['FullUrl']}")
                lines.append(f"  - **Target Keywords**: {code_list(item['TargetKeywords'])}")
                lines.append(f"  - **Schema Types**: {code_list(item['SchemaTypes'])}")
                lines.append(f"  - **JSON-LD**: {checkbox(item['HasJsonLd'])} {item['HasJsonLd']}")
                lines.append(f"  - **OG/Twitter**: {checkbox(item['HasOpenGraph'])}/{checkbox(item['HasTwitterCard'])} {item['HasOpenGraph']} / {item['HasTwitterCard']}")
                lines.append(
                    f"  - **Canonical**: {checkbox(item['HasCanonicalTag'])} {item['HasCanonicalTag']} (should be `{item['CanonicalUrl']}`)"
                )
                lines.append("  - **Internal Links**:")
                lines.append(f"    - Footer: {checkbox(item['HasFooterLink'])}")
                lines.append(f"    - Sidebar: {checkbox(item['HasSidebarLink'])}")
                lines.append(f"    - Breadcrumb: {checkbox(item['HasBreadcrumb'])}")
                lines.append(f"    - Related Features Block: {checkbox(item['HasRelatedFeaturesBlock'])}")
                if item["LinkedFromModules"]:
                    lines.append(f"    - Linked from Modules: {item['LinkedFromModules']}")
                if item["LinkedFromRoutes"]:
                    lines.append(f"    - Linked from Routes: {item['LinkedFromRoutes']}")
                if item["Notes"]:
                    lines.append(f"    - Notes: {item['Notes']}")
                lines.append("")
        lines.append("---")
        lines.append("")

    OUTPUT_DIR.mkdir(parents=True, exist_ok=True)
    MD_OUTPUT_PATH.write_text("\n".join(lines).rstrip() + "\n", encoding="utf-8")


def main() -> None:
    if not INPUT_PATH.exists():
        raise FileNotFoundError(f"Missing input inventory: {INPUT_PATH}")
    with INPUT_PATH.open(newline="", encoding="utf-8") as source:
        reader = csv.DictReader(source)
        rows = list(reader)
    seo_rows = build_rows(rows)
    write_csv(seo_rows)
    write_markdown(seo_rows)
    print(f"Generated {len(seo_rows)} SEO rows -> {CSV_OUTPUT_PATH}")
    print(f"Markdown summary written to {MD_OUTPUT_PATH}")


if __name__ == "__main__":
    main()