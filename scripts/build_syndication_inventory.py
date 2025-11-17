#!/usr/bin/env python3
"""Builds the syndication & ecosystem inventory artifacts."""
from __future__ import annotations

import csv
from collections import defaultdict
from datetime import date
from pathlib import Path
from typing import Dict, Iterable, List

ROOT = Path(__file__).resolve().parents[1]
FEATURE_INVENTORY = ROOT / "docs" / "functional_inventory" / "feature_inventory.csv"
OUTPUT_DIR = ROOT / "docs" / "syndication_inventory"
OUTPUT_CSV = OUTPUT_DIR / "syndication_inventory.csv"
OUTPUT_MD = OUTPUT_DIR / "syndication_inventory.md"

CSV_HEADERS = [
    "Platform",
    "Category",
    "AudienceSegment",
    "Priority",
    "SubmissionUrl",
    "ProfileUrl",
    "ExpectedProfileSlug",
    "UsesSitemap",
    "RequiresFeed",
    "FeedUrl",
    "ContentSourceModules",
    "ContentTypes",
    "WidgetNeeded",
    "WidgetRoutePath",
    "Status",
    "Owner",
    "LastUpdated",
    "Notes",
]

PRIORITY_ORDER = ["high", "medium", "low"]


def load_feature_modules() -> set[str]:
    modules: set[str] = set()
    if not FEATURE_INVENTORY.exists():
        return modules
    with FEATURE_INVENTORY.open(newline="") as handle:
        reader = csv.DictReader(handle)
        for row in reader:
            module = (row.get("Module") or "").strip()
            area = (row.get("Area") or "").strip()
            if module and area:
                modules.add(f"{module}:{area}")
    return modules


def ensure_modules(requested: Iterable[str], available: set[str]) -> List[str]:
    resolved = [label for label in requested if label in available]
    return resolved or list(requested)


def build_platform_rows(available_modules: set[str]) -> List[Dict[str, str]]:
    today = date.today().isoformat()

    rows: List[Dict[str, str]] = []

    def add_row(**kwargs):
        row = {header: "" for header in CSV_HEADERS}
        row.update(kwargs)
        row["UsesSitemap"] = str(kwargs.get("UsesSitemap", "false")).lower()
        row["RequiresFeed"] = str(kwargs.get("RequiresFeed", "false")).lower()
        row["WidgetNeeded"] = str(kwargs.get("WidgetNeeded", "false")).lower()
        row["ContentSourceModules"] = ", ".join(kwargs.get("ContentSourceModules", []))
        row["ContentTypes"] = ", ".join(kwargs.get("ContentTypes", []))
        row["LastUpdated"] = kwargs.get("LastUpdated", today)
        rows.append(row)

    news_modules = ensure_modules(["Blog:NewsAndUpdates", "Blog:HowItWorks", "APIs:Alerts"], available_modules)
    alerts_modules = ensure_modules(["APIs:Alerts", "APIs:Management"], available_modules)
    marketing_modules = ensure_modules(["Blog:NewsAndUpdates", "APIs:API"], available_modules)

    add_row(
        Platform="MarketWatch / Financial News Aggregators",
        Category="News Aggregator",
        AudienceSegment="Retail Investors, Traders",
        Priority="high",
        SubmissionUrl="",
        ProfileUrl="",
        ExpectedProfileSlug="MyMIWallet",
        UsesSitemap=False,
        RequiresFeed=True,
        FeedUrl="https://www.mymiwallet.com/news/feed.xml; https://www.mymiwallet.com/alerts/feed.xml",
        ContentSourceModules=news_modules,
        ContentTypes=["News Summaries", "Trade Alerts"],
        WidgetNeeded=False,
        WidgetRoutePath="",
        Status="not-started",
        Owner="Marketing",
        LastUpdated=today,
        Notes=(
            "Feed should blend Blog:News-And-Updates headlines with high-signal trade alerts "
            "for downstream news bots."
        ),
    )

    add_row(
        Platform="Owlin",
        Category="News Aggregator",
        AudienceSegment="Institutional Monitoring Teams",
        Priority="high",
        SubmissionUrl="https://owlin.com/contact/",
        ProfileUrl="",
        ExpectedProfileSlug="MyMIWallet",
        UsesSitemap=False,
        RequiresFeed=True,
        FeedUrl="https://www.mymiwallet.com/news/feed.xml",
        ContentSourceModules=news_modules,
        ContentTypes=["News Summaries", "Risk Alerts"],
        WidgetNeeded=False,
        WidgetRoutePath="",
        Status="not-started",
        Owner="Marketing",
        LastUpdated=today,
        Notes="Provide curated compliance-friendly feed for fintech monitoring partners.",
    )

    add_row(
        Platform="Yahoo Finance Developer Directory",
        Category="Developer Ecosystem",
        AudienceSegment="Developers, API Partners",
        Priority="high",
        SubmissionUrl="https://developer.yahoo.com/contact/",
        ProfileUrl="",
        ExpectedProfileSlug="MyMIWallet",
        UsesSitemap=True,
        RequiresFeed=False,
        FeedUrl="",
        ContentSourceModules=ensure_modules(["APIs:API", "APIs:Management", "Blog:HowItWorks"], available_modules),
        ContentTypes=["API Docs", "Product Overview", "Integration Guides"],
        WidgetNeeded=False,
        WidgetRoutePath="",
        Status="not-started",
        Owner="Marketing",
        LastUpdated=today,
        Notes="Position MyMI Wallet as a fintech data + alerts platform for Yahoo Finance partners.",
    )

    add_row(
        Platform="Investopedia Tools Directory",
        Category="Financial Directory",
        AudienceSegment="Retail Investors, Finance Learners",
        Priority="high",
        SubmissionUrl="https://www.investopedia.com/suggestions",
        ProfileUrl="",
        ExpectedProfileSlug="MyMIWallet",
        UsesSitemap=True,
        RequiresFeed=False,
        FeedUrl="",
        ContentSourceModules=ensure_modules(["Blog:HowItWorks", "Blog:NewsAndUpdates"], available_modules),
        ContentTypes=["Educational Articles", "Product Updates"],
        WidgetNeeded=False,
        WidgetRoutePath="",
        Status="not-started",
        Owner="Marketing",
        LastUpdated=today,
        Notes="Highlight budgeting-to-investing workflow; include screenshots + video walkthroughs.",
    )

    add_row(
        Platform="TradingView",
        Category="Social Finance",
        AudienceSegment="Active Traders",
        Priority="high",
        SubmissionUrl="https://www.tradingview.com/accounts/signup/",
        ProfileUrl="https://www.tradingview.com/u/MyMIWallet",
        ExpectedProfileSlug="MyMIWallet",
        UsesSitemap=False,
        RequiresFeed=False,
        FeedUrl="",
        ContentSourceModules=alerts_modules,
        ContentTypes=["Trade Alerts", "Chart Ideas"],
        WidgetNeeded=True,
        WidgetRoutePath="/Widgets/TradingView",
        Status="in-progress",
        Owner="Marketing",
        LastUpdated=today,
        Notes="Create TradingView idea posts that reference automated alerts and embed widget publicly.",
    )

    add_row(
        Platform="StockTwits",
        Category="Social Finance",
        AudienceSegment="Traders, FinTwit",
        Priority="high",
        SubmissionUrl="https://stocktwits.com/register",
        ProfileUrl="https://stocktwits.com/MyMIWallet",
        ExpectedProfileSlug="MyMIWallet",
        UsesSitemap=False,
        RequiresFeed=False,
        FeedUrl="",
        ContentSourceModules=alerts_modules,
        ContentTypes=["Trade Alerts", "Market Commentary"],
        WidgetNeeded=True,
        WidgetRoutePath="/Widgets/StockTwits",
        Status="not-started",
        Owner="Marketing",
        LastUpdated=today,
        Notes="Push automated alert teasers + news headlines and surface embed on marketing pages.",
    )

    add_row(
        Platform="Google Search Console",
        Category="Search Engine",
        AudienceSegment="General Public",
        Priority="high",
        SubmissionUrl="https://search.google.com/search-console",
        ProfileUrl="https://search.google.com/search-console?resource_id=https://www.mymiwallet.com/",
        ExpectedProfileSlug="mymiwallet.com",
        UsesSitemap=True,
        RequiresFeed=False,
        FeedUrl="",
        ContentSourceModules=marketing_modules,
        ContentTypes=["Site Pages", "Structured Data"],
        WidgetNeeded=False,
        WidgetRoutePath="",
        Status="live",
        Owner="DevOps",
        LastUpdated=today,
        Notes="Sitemap + page inventory already integrated; monitor coverage + Core Web Vitals.",
    )

    add_row(
        Platform="Bing Webmaster Tools",
        Category="Search Engine",
        AudienceSegment="General Public",
        Priority="high",
        SubmissionUrl="https://www.bing.com/webmasters/about",
        ProfileUrl="https://www.bing.com/webmasters/home?siteUrl=https://www.mymiwallet.com/",
        ExpectedProfileSlug="mymiwallet.com",
        UsesSitemap=True,
        RequiresFeed=False,
        FeedUrl="",
        ContentSourceModules=marketing_modules,
        ContentTypes=["Site Pages", "Structured Data"],
        WidgetNeeded=False,
        WidgetRoutePath="",
        Status="submitted",
        Owner="DevOps",
        LastUpdated=today,
        Notes="Verify ownership + submit sitemap; monitor index coverage + Bing Discover signals.",
    )

    add_row(
        Platform="Yandex Webmaster",
        Category="Search Engine",
        AudienceSegment="General Public",
        Priority="medium",
        SubmissionUrl="https://webmaster.yandex.com/sites/",
        ProfileUrl="",
        ExpectedProfileSlug="mymiwallet.com",
        UsesSitemap=True,
        RequiresFeed=False,
        FeedUrl="",
        ContentSourceModules=marketing_modules,
        ContentTypes=["Site Pages", "Structured Data"],
        WidgetNeeded=False,
        WidgetRoutePath="",
        Status="not-started",
        Owner="DevOps",
        LastUpdated=today,
        Notes="Add sitemap + ownership verification for international search coverage.",
    )

    add_row(
        Platform="Product Hunt",
        Category="Product Discovery",
        AudienceSegment="Founders, Early Adopters",
        Priority="medium",
        SubmissionUrl="https://www.producthunt.com/posts/new",
        ProfileUrl="https://www.producthunt.com/products/mymi-wallet",
        ExpectedProfileSlug="mymi-wallet",
        UsesSitemap=False,
        RequiresFeed=False,
        FeedUrl="",
        ContentSourceModules=ensure_modules(["Blog:HowItWorks", "Blog:NewsAndUpdates"], available_modules),
        ContentTypes=["Launch Summary", "Screenshots", "Video"],
        WidgetNeeded=False,
        WidgetRoutePath="",
        Status="not-started",
        Owner="Marketing",
        LastUpdated=today,
        Notes="Plan staged launch tied to dashboard milestone; collect testimonials + pricing info.",
    )

    add_row(
        Platform="Indie Hackers",
        Category="Community",
        AudienceSegment="Founders, Bootstrappers",
        Priority="medium",
        SubmissionUrl="https://www.indiehackers.com/post/new",
        ProfileUrl="https://www.indiehackers.com/product/mymi-wallet",
        ExpectedProfileSlug="MyMI Wallet",
        UsesSitemap=False,
        RequiresFeed=False,
        FeedUrl="",
        ContentSourceModules=ensure_modules(["Blog:HowItWorks", "Blog:NewsAndUpdates"], available_modules),
        ContentTypes=["Build Log", "Product Updates"],
        WidgetNeeded=False,
        WidgetRoutePath="",
        Status="not-started",
        Owner="Teddy",
        LastUpdated=today,
        Notes="Use as build-in-public log; share revenue milestones + roadmap polls.",
    )

    add_row(
        Platform="Hacker News",
        Category="Community",
        AudienceSegment="Developers, Tech Enthusiasts",
        Priority="medium",
        SubmissionUrl="https://news.ycombinator.com/submit",
        ProfileUrl="https://news.ycombinator.com/user?id=mymiwallet",
        ExpectedProfileSlug="mymiwallet",
        UsesSitemap=False,
        RequiresFeed=False,
        FeedUrl="",
        ContentSourceModules=marketing_modules,
        ContentTypes=["Product Updates", "Technical Deep Dives"],
        WidgetNeeded=False,
        WidgetRoutePath="",
        Status="not-started",
        Owner="Teddy",
        LastUpdated=today,
        Notes="Prepare launch-ready post highlighting tech stack + automated alert pipelines.",
    )

    return rows


def write_csv(rows: List[Dict[str, str]]) -> None:
    OUTPUT_DIR.mkdir(parents=True, exist_ok=True)
    with OUTPUT_CSV.open("w", newline="") as handle:
        writer = csv.DictWriter(handle, fieldnames=CSV_HEADERS)
        writer.writeheader()
        writer.writerows(rows)


def bool_icon(value: str) -> str:
    return "☑ Yes" if value == "true" else "☐ No"


def status_checkbox(status: str) -> str:
    return "[x]" if status in {"live", "submitted"} else "[ ]"


def build_markdown(rows: List[Dict[str, str]]) -> str:
    grouped: Dict[str, Dict[str, List[Dict[str, str]]]] = defaultdict(lambda: defaultdict(list))
    for row in rows:
        priority = row["Priority"]
        category = row["Category"]
        grouped[priority][category].append(row)

    lines: List[str] = []
    lines.append("# MyMI Wallet – Syndication & Ecosystem Inventory")
    lines.append("")
    lines.append("This document tracks where MyMI Wallet is registered, listed, or syndicated across financial and product ecosystems.")
    lines.append("")
    lines.append("## Legend")
    lines.append("")
    lines.append("- **Priority**: high / medium / low")
    lines.append("- **Status**: not-started / in-progress / submitted / live")
    lines.append("- **Feed**: Whether a news/alerts feed is required.")
    lines.append("- **Widget**: Whether an embeddable widget/page is needed in MyMI Wallet.")
    lines.append("")
    lines.append("---")
    lines.append("")

    for priority in PRIORITY_ORDER:
        categories = grouped.get(priority)
        if not categories:
            continue
        lines.append(f"## {priority.title()} Priority Platforms")
        lines.append("")
        for category in sorted(categories.keys()):
            lines.append(f"### {category}")
            lines.append("")
            for row in sorted(categories[category], key=lambda item: item["Platform"]):
                status_box = status_checkbox(row["Status"])
                lines.append(f"- {status_box} **{row['Platform']}**")
                lines.append(f"  - **Audience**: {row['AudienceSegment']}")
                lines.append(f"  - **Priority**: {row['Priority']}")
                if row.get("SubmissionUrl"):
                    lines.append(f"  - **Submission URL**: {row['SubmissionUrl']}")
                if row.get("ProfileUrl"):
                    lines.append(f"  - **Profile URL**: {row['ProfileUrl']}")
                if row.get("ExpectedProfileSlug"):
                    lines.append(f"  - **Expected Profile Slug**: `{row['ExpectedProfileSlug']}`")
                lines.append(f"  - **Uses Sitemap**: {bool_icon(row['UsesSitemap'])}")
                feed_line = f"{bool_icon(row['RequiresFeed'])}"
                if row.get("FeedUrl"):
                    feed_line = f"{feed_line} – `{row['FeedUrl']}`"
                lines.append(f"  - **Requires Feed**: {feed_line}")
                if row.get("ContentSourceModules"):
                    lines.append(f"  - **Content Sources**: `{row['ContentSourceModules']}`")
                if row.get("ContentTypes"):
                    lines.append(f"  - **Content Types**: `{row['ContentTypes']}`")
                widget_line = bool_icon(row["WidgetNeeded"])
                if row.get("WidgetRoutePath"):
                    widget_line = f"{widget_line} – `{row['WidgetRoutePath']}`"
                lines.append(f"  - **Widget Needed**: {widget_line}")
                lines.append(f"  - **Status**: {row['Status']}")
                lines.append(f"  - **Owner**: {row['Owner']}")
                lines.append(f"  - **Last Updated**: {row['LastUpdated']}")
                if row.get("Notes"):
                    lines.append(f"  - **Notes**: {row['Notes']}")
                lines.append("")
            lines.append("")
        lines.append("---")
        lines.append("")

    return "\n".join(lines).rstrip() + "\n"


def write_markdown(rows: List[Dict[str, str]]) -> None:
    content = build_markdown(rows)
    OUTPUT_MD.write_text(content)


def main() -> None:
    modules = load_feature_modules()
    rows = build_platform_rows(modules)
    write_csv(rows)
    write_markdown(rows)


if __name__ == "__main__":
    main()
