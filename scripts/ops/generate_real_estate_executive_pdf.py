#!/usr/bin/env python3
"""
TBI Real Estate Intelligence & Acquisition Engine — Executive Briefing PDF Generator
Generates a publication-grade, institutional PDF briefing suitable for team alignment
and public sharing on investor and community forums.

Lead Sponsor: Timothy Burks Incorporated, LLC.
Operating Managers: Timothy Burks & AnneAlicia Burks, Bossier City, Louisiana.
"""

import os
import sys
from reportlab.lib.pagesizes import letter
from reportlab.lib import colors
from reportlab.lib.styles import getSampleStyleSheet, ParagraphStyle
from reportlab.platypus import (
    SimpleDocTemplate, Paragraph, Spacer, Table, TableStyle, PageBreak, KeepTogether, HRFlowable
)
from reportlab.pdfgen import canvas

class NumberedCanvas(canvas.Canvas):
    """
    Two-pass canvas to dynamically compute and print accurate total page count.
    """
    def __init__(self, *args, **kwargs):
        super().__init__(*args, **kwargs)
        self._saved_page_states = []

    def showPage(self):
        self._saved_page_states.append(dict(self.__dict__))
        self._startPage()

    def save(self):
        num_pages = len(self._saved_page_states)
        for state in self._saved_page_states:
            self.__dict__.update(state)
            self.draw_page_decorations(num_pages)
            super().showPage()
        super().save()

    def draw_page_decorations(self, page_count):
        self.saveState()
        self.setFont("Helvetica", 8)
        self.setFillColor(colors.HexColor("#718096"))

        # Top Running Header (Pages 2+)
        if self._pageNumber > 1:
            self.drawString(54, 755, "Timothy Burks Incorporated, LLC. | Real Estate Acquisition & Intelligence Engine")
            self.drawRightString(558, 755, "Executive Operations Briefing")
            self.setStrokeColor(colors.HexColor("#E2E8F0"))
            self.setLineWidth(0.75)
            self.line(54, 747, 558, 747)

        # Bottom Running Footer (All Pages)
        self.setStrokeColor(colors.HexColor("#E2E8F0"))
        self.setLineWidth(0.75)
        self.line(54, 45, 558, 45)

        self.drawString(54, 32, "Confidential & Public Forum Safe — Strategy Overview & Operational Capabilities")
        page_text = f"Page {self._pageNumber} of {page_count}"
        self.drawRightString(558, 32, page_text)
        self.restoreState()


def build_pdf(output_path: str):
    doc = SimpleDocTemplate(
        output_path,
        pagesize=letter,
        leftMargin=54,
        rightMargin=54,
        topMargin=54,
        bottomMargin=54
    )

    styles = getSampleStyleSheet()

    # Custom Color Palette
    primary = colors.HexColor("#1A365D")    # Deep Navy
    secondary = colors.HexColor("#2B6CB0")  # Slate Blue
    accent = colors.HexColor("#22543D")     # Emerald Green
    warning = colors.HexColor("#C05621")    # Amber Bronze
    dark = colors.HexColor("#2D3748")       # Charcoal
    light_bg = colors.HexColor("#F7FAFC")   # Light Background
    border_col = colors.HexColor("#E2E8F0")

    # Typography Styles
    title_style = ParagraphStyle(
        'DocTitle',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=20,
        leading=24,
        textColor=primary,
        spaceAfter=4
    )

    subtitle_style = ParagraphStyle(
        'DocSubtitle',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=11,
        leading=15,
        textColor=secondary,
        spaceAfter=12
    )

    meta_style = ParagraphStyle(
        'DocMeta',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=8.5,
        leading=12,
        textColor=dark
    )

    h1_style = ParagraphStyle(
        'SectionH1',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=13,
        leading=17,
        textColor=primary,
        spaceBefore=10,
        spaceAfter=6
    )

    h2_style = ParagraphStyle(
        'SectionH2',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=10.5,
        leading=14,
        textColor=secondary,
        spaceBefore=6,
        spaceAfter=4
    )

    body_style = ParagraphStyle(
        'BodyDark',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=9,
        leading=13,
        textColor=dark,
        spaceAfter=6
    )

    body_bold = ParagraphStyle(
        'BodyDarkBold',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=9,
        leading=13,
        textColor=dark
    )

    callout_style = ParagraphStyle(
        'CalloutText',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=8.5,
        leading=12.5,
        textColor=dark
    )

    table_header = ParagraphStyle(
        'TH',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=8.5,
        leading=11,
        textColor=colors.white,
        alignment=1
    )

    table_cell = ParagraphStyle(
        'TD',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=8,
        leading=11,
        textColor=dark
    )

    table_cell_bold = ParagraphStyle(
        'TDBold',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=8,
        leading=11,
        textColor=dark
    )

    story = []

    # =========================================================================
    # PAGE 1: EXECUTIVE OVERVIEW & DISTRESSED SOURCING RADAR
    # =========================================================================
    story.append(Paragraph("TBI Real Estate Intelligence &amp; Acquisition Engine", title_style))
    story.append(Paragraph("Strategic Operations Briefing: Automated Sourcing, Government-Guaranteed Cashflow &amp; Rapid Disposition", subtitle_style))

    # Sponsor & Governance Meta Block
    meta_data = [
        [
            Paragraph("<strong>Lead Sponsor:</strong> Timothy Burks Incorporated, LLC.<br/><strong>Operating Managers:</strong> Timothy Burks &amp; AnneAlicia Burks", meta_style),
            Paragraph("<strong>Headquarters:</strong> Bossier City, Louisiana<br/><strong>Platform:</strong> MyMI Wallet Real Estate Syndications", meta_style),
            Paragraph("<strong>Focus Market:</strong> Ark-La-Tex &amp; Sunbelt High-Yield Corridors<br/><strong>Document Classification:</strong> Strategic Team Briefing / Public Forum Safe", meta_style)
        ]
    ]
    meta_table = Table(meta_data, colWidths=[180, 160, 164])
    meta_table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,-1), light_bg),
        ('BOX', (0,0), (-1,-1), 1, border_col),
        ('VALIGN', (0,0), (-1,-1), 'MIDDLE'),
        ('TOPPADDING', (0,0), (-1,-1), 6),
        ('BOTTOMPADDING', (0,0), (-1,-1), 6),
        ('LEFTPADDING', (0,0), (-1,-1), 8),
        ('RIGHTPADDING', (0,0), (-1,-1), 8),
    ]))
    story.append(meta_table)
    story.append(Spacer(1, 10))

    # KPI Ribbon Table
    kpi_data = [
        [
            Paragraph("<font size=7 color='#718096'>CONNECTED PLATFORMS</font><br/><strong><font size=12 color='#1A365D'>5 Portals</font></strong><br/><font size=7 color='#4A5568'>Live Multi-Site Radar</font>", meta_style),
            Paragraph("<font size=7 color='#718096'>TARGET ACQUISITION</font><br/><strong><font size=12 color='#22543D'>&lt; $50K</font></strong><br/><font size=7 color='#4A5568'>Sub-Market Deep Discount</font>", meta_style),
            Paragraph("<font size=7 color='#718096'>PROPERTY FOOTPRINT</font><br/><strong><font size=12 color='#2B6CB0'>1,700+ SqFt</font></strong><br/><font size=7 color='#4A5568'>3+ Bed High-FMR Assets</font>", meta_style),
            Paragraph("<font size=7 color='#718096'>SEC. 8 DIRECT YIELD</font><br/><strong><font size=12 color='#22543D'>31.0% Gross</font></strong><br/><font size=7 color='#4A5568'>Govt Direct Wire Deposit</font>", meta_style),
            Paragraph("<font size=7 color='#718096'>WHLESALE DISPO SPREAD</font><br/><strong><font size=12 color='#C05621'>+$15,000</font></strong><br/><font size=7 color='#4A5568'>14-Day Rapid Cash Flip</font>", meta_style),
        ]
    ]
    kpi_table = Table(kpi_data, colWidths=[100, 100, 104, 100, 100])
    kpi_table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,-1), colors.white),
        ('BOX', (0,0), (-1,-1), 1, border_col),
        ('INNERGRID', (0,0), (-1,-1), 0.5, border_col),
        ('ALIGN', (0,0), (-1,-1), 'CENTER'),
        ('TOPPADDING', (0,0), (-1,-1), 6),
        ('BOTTOMPADDING', (0,0), (-1,-1), 6),
    ]))
    story.append(kpi_table)
    story.append(Spacer(1, 10))

    story.append(Paragraph("1. Executive Mission &amp; System Capabilities", h1_style))
    story.append(Paragraph(
        "Timothy Burks Incorporated, LLC. (TBI) has launched a centralized real estate acquisition, underwriting, and monetization engine "
        "designed to systematically identify undervalued real property, stress-test multi-strategy cashflow, structure non-dilutive financing, "
        "and either syndicate for high-yield passive investor income or execute rapid 14-day wholesale contract dispositions. "
        "The architecture unifies distressed off-market discovery with institutional capital structures, providing our team with an end-to-end "
        "competitive advantage in securing assets at 50% to 70%+ discounts below physical replacement value.",
        body_style
    ))

    story.append(Paragraph("2. Automated Multi-Portal Sourcing Radar", h1_style))
    story.append(Paragraph(
        "Rather than relying on congested retail MLS channels, our automated radar scans 5 specialized distressed acquisition networks "
        "simultaneously, pre-filtering opportunities against rigorous quantitative parameters:",
        body_style
    ))

    sourcing_rows = [
        [
            Paragraph("Platform", table_header),
            Paragraph("Asset Classes Covered", table_header),
            Paragraph("Strategic Acquisition Target", table_header),
            Paragraph("Execution Path", table_header)
        ],
        [
            Paragraph("<strong>Foreclosure.com</strong>", table_cell_bold),
            Paragraph("Pre-foreclosures, Sheriff Sales, Bankruptcy, Tax Deeds", table_cell),
            Paragraph("Single Family Homes &lt; $50,000 in Northwest Louisiana", table_cell),
            Paragraph("Direct owner outreach &amp; pre-auction buyout", table_cell)
        ],
        [
            Paragraph("<strong>Auction.com</strong>", table_cell_bold),
            Paragraph("Bank-Owned (REO) &amp; Live Cash Foreclosure Auctions", table_cell),
            Paragraph("1,700+ SqFt properties with cosmetic repair profiles", table_cell),
            Paragraph("Online cash bidding &amp; fast assignment", table_cell)
        ],
        [
            Paragraph("<strong>Equator.com</strong>", table_cell_bold),
            Paragraph("Institutional Servicer Direct REO &amp; Short Sales", table_cell),
            Paragraph("Lender-direct portfolios from major servicers", table_cell),
            Paragraph("Direct servicer purchase agreements", table_cell)
        ],
        [
            Paragraph("<strong>Xome.com</strong>", table_cell_bold),
            Paragraph("Exclusive Bank REO &amp; Foreclosure Auctions", table_cell),
            Paragraph("Sub-$50k single-family homes with high ARV spreads", table_cell),
            Paragraph("Online auction closing with clear title", table_cell)
        ],
        [
            Paragraph("<strong>RealtyTrac.com</strong>", table_cell_bold),
            Paragraph("Nationwide Default Filings &amp; Distressed Intel", table_cell),
            Paragraph("Off-market equity spreads across target ZIP codes", table_cell),
            Paragraph("Pre-notice off-market contract locking", table_cell)
        ],
    ]
    sourcing_table = Table(sourcing_rows, colWidths=[95, 145, 145, 119])
    sourcing_table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), primary),
        ('GRID', (0,0), (-1,-1), 0.5, border_col),
        ('ROWBACKGROUNDS', (0,1), (-1,-1), [colors.white, light_bg]),
        ('TOPPADDING', (0,0), (-1,-1), 4),
        ('BOTTOMPADDING', (0,0), (-1,-1), 4),
        ('LEFTPADDING', (0,0), (-1,-1), 6),
        ('RIGHTPADDING', (0,0), (-1,-1), 6),
    ]))
    story.append(sourcing_table)

    story.append(PageBreak())

    # =========================================================================
    # PAGE 2: GOVERNMENT-GUARANTEED CASHFLOW (HUD SECTION 8 ARBITRAGE)
    # =========================================================================
    story.append(Paragraph("3. Government-Guaranteed Cashflow: HUD Section 8 Arbitrage", h1_style))
    story.append(Paragraph(
        "A cornerstone of the TBI acquisition engine is coupling ultra-low acquisition bases (&lt; $50k) with guaranteed "
        "direct-deposit rental payments administered through the <strong>U.S. Department of Housing and Urban Development (HUD)</strong> "
        "and local Public Housing Authorities (PHAs). By targeting 3-bedroom and 4-bedroom homes exceeding 1,700 square feet, "
        "we unlock maximum Fair Market Rent (FMR) voucher reimbursement rates that dramatically outperform traditional open-market rents.",
        body_style
    ))

    # HUD FMR Schedule Table
    hud_rows = [
        [
            Paragraph("Target Jurisdiction / ZIP", table_header),
            Paragraph("3-Bedroom FMR (Monthly)", table_header),
            Paragraph("3-Bedroom FMR (Annual)", table_header),
            Paragraph("4-Bedroom FMR (Monthly)", table_header),
            Paragraph("PHA Guarantee Security", table_header)
        ],
        [
            Paragraph("<strong>Bossier City, LA (71111)</strong>", table_cell_bold),
            Paragraph("<font color='#22543D'><strong>$1,485 / mo</strong></font>", table_cell),
            Paragraph("$17,820 / yr", table_cell),
            Paragraph("<font color='#2B6CB0'><strong>$1,720 / mo</strong></font>", table_cell),
            Paragraph("Direct PHA ACH Deposit", table_cell)
        ],
        [
            Paragraph("<strong>South Bossier, LA (71112)</strong>", table_cell_bold),
            Paragraph("<font color='#22543D'><strong>$1,460 / mo</strong></font>", table_cell),
            Paragraph("$17,520 / yr", table_cell),
            Paragraph("<font color='#2B6CB0'><strong>$1,690 / mo</strong></font>", table_cell),
            Paragraph("Direct PHA ACH Deposit", table_cell)
        ],
        [
            Paragraph("<strong>Shreveport Downtown (71101)</strong>", table_cell_bold),
            Paragraph("<font color='#22543D'><strong>$1,440 / mo</strong></font>", table_cell),
            Paragraph("$17,280 / yr", table_cell),
            Paragraph("<font color='#2B6CB0'><strong>$1,680 / mo</strong></font>", table_cell),
            Paragraph("Direct PHA ACH Deposit", table_cell)
        ],
        [
            Paragraph("<strong>North Market Corridor (71107)</strong>", table_cell_bold),
            Paragraph("<font color='#22543D'><strong>$1,450 / mo</strong></font>", table_cell),
            Paragraph("$17,400 / yr", table_cell),
            Paragraph("<font color='#2B6CB0'><strong>$1,680 / mo</strong></font>", table_cell),
            Paragraph("Direct PHA ACH Deposit", table_cell)
        ],
        [
            Paragraph("<strong>Cross Lake Corridor (71109)</strong>", table_cell_bold),
            Paragraph("<font color='#22543D'><strong>$1,420 / mo</strong></font>", table_cell),
            Paragraph("$17,040 / yr", table_cell),
            Paragraph("<font color='#2B6CB0'><strong>$1,650 / mo</strong></font>", table_cell),
            Paragraph("Direct PHA ACH Deposit", table_cell)
        ],
    ]
    hud_table = Table(hud_rows, colWidths=[130, 95, 85, 95, 99])
    hud_table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), primary),
        ('GRID', (0,0), (-1,-1), 0.5, border_col),
        ('ROWBACKGROUNDS', (0,1), (-1,-1), [colors.white, light_bg]),
        ('TOPPADDING', (0,0), (-1,-1), 4),
        ('BOTTOMPADDING', (0,0), (-1,-1), 4),
        ('LEFTPADDING', (0,0), (-1,-1), 6),
        ('RIGHTPADDING', (0,0), (-1,-1), 6),
    ]))
    story.append(hud_table)
    story.append(Spacer(1, 8))

    story.append(Paragraph("Financial Underwriting of a Representative $42,500 Asset", h2_style))
    story.append(Paragraph(
        "When an off-market 1,820 sqft 3-bed home is acquired at $42,500 with a $15,000 cosmetic turn budget ($57,500 total capitalization), "
        "the financial dynamics deliver institutional-grade yield metrics unreachable in standard residential real estate:",
        body_style
    ))

    # Underwriting Economics Breakdown Table
    econ_rows = [
        [
            Paragraph("Underwriting Metric", table_header),
            Paragraph("Financial Benchmark", table_header),
            Paragraph("Operational Reality &amp; Strategic Protection", table_header)
        ],
        [
            Paragraph("<strong>Total Capital Outlay</strong>", table_cell_bold),
            Paragraph("<strong>$57,500</strong> All-In", table_cell),
            Paragraph("$42,500 purchase + $15,000 cosmetic turn (funded via 0% business credit lines)", table_cell)
        ],
        [
            Paragraph("<strong>Gross Guaranteed Revenue</strong>", table_cell_bold),
            Paragraph("<strong>$17,820 / yr</strong> ($1,485/mo)", table_cell),
            Paragraph("100% direct deposit from Public Housing Authority (zero tenant collection risk)", table_cell)
        ],
        [
            Paragraph("<strong>Gross Annual Cash Yield</strong>", table_cell_bold),
            Paragraph("<font color='#22543D'><strong>31.00%</strong></font>", table_cell),
            Paragraph("Annual gross rent divided by total capital capitalization ($17,820 / $57,500)", table_cell)
        ],
        [
            Paragraph("<strong>Net Operating Income (NOI)</strong>", table_cell_bold),
            Paragraph("<font color='#22543D'><strong>$13,260 / yr</strong></font>", table_cell),
            Paragraph("After property taxes, hazard insurance, and 12% reserves/management allowance", table_cell)
        ],
        [
            Paragraph("<strong>Net Cash-on-Cash Return</strong>", table_cell_bold),
            Paragraph("<font color='#22543D'><strong>23.06% CoC</strong></font>", table_cell),
            Paragraph("Net distributable cashflow to capital partners (all-equity basis)", table_cell)
        ],
        [
            Paragraph("<strong>Appraised Conservative ARV</strong>", table_cell_bold),
            Paragraph("<strong>$125,000</strong>", table_cell),
            Paragraph("Instant built-in equity cushion of <strong>+$67,500</strong> (117% unrealized capital gain)", table_cell)
        ],
    ]
    econ_table = Table(econ_rows, colWidths=[130, 110, 264])
    econ_table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), secondary),
        ('GRID', (0,0), (-1,-1), 0.5, border_col),
        ('ROWBACKGROUNDS', (0,1), (-1,-1), [colors.white, light_bg]),
        ('TOPPADDING', (0,0), (-1,-1), 4),
        ('BOTTOMPADDING', (0,0), (-1,-1), 4),
        ('LEFTPADDING', (0,0), (-1,-1), 6),
        ('RIGHTPADDING', (0,0), (-1,-1), 6),
    ]))
    story.append(econ_table)
    story.append(Spacer(1, 8))

    # Callout Highlight Box
    callout_data = [
        [
            Paragraph(
                "<strong>Strategic Invariant — Zero Tenant Collection Risk:</strong> In conventional long-term renting, the primary downside risk "
                "is tenant unemployment or non-payment leading to costly evictions. Under HUD Section 8, rent subsidies are disbursed via direct "
                "government electronic deposit on the first of every month, establishing a guaranteed downside floor regardless of macroeconomic volatility.",
                callout_style
            )
        ]
    ]
    callout_box = Table(callout_data, colWidths=[504])
    callout_box.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,-1), colors.HexColor("#EBF8FF")),
        ('BOX', (0,0), (-1,-1), 1, colors.HexColor("#90CDF4")),
        ('TOPPADDING', (0,0), (-1,-1), 6),
        ('BOTTOMPADDING', (0,0), (-1,-1), 6),
        ('LEFTPADDING', (0,0), (-1,-1), 8),
        ('RIGHTPADDING', (0,0), (-1,-1), 8),
    ]))
    story.append(callout_box)

    story.append(PageBreak())

    # =========================================================================
    # PAGE 3: TRI-STRATEGY MONETIZATION & RAPID WHOLESALE DISPOSITION
    # =========================================================================
    story.append(Paragraph("4. Tri-Strategy Underwriting: Dynamic Monetization Matrix", h1_style))
    story.append(Paragraph(
        "Every asset sourced by TBI is automatically evaluated across three distinct monetization pathways simultaneously. "
        "Our team selects the optimal execution route based on immediate capital requirements, market velocity, and risk-adjusted return profiles:",
        body_style
    ))

    # Tri-Strategy Comparison Table
    tri_rows = [
        [
            Paragraph("Execution Strategy", table_header),
            Paragraph("Capital Required", table_header),
            Paragraph("Target Yield / Cash Spread", table_header),
            Paragraph("Hold Period / Liquidity", table_header),
            Paragraph("Ideal Execution Profile", table_header)
        ],
        [
            Paragraph("<strong>Strategy A: STR<br/>(Airbnb / VRBO)</strong>", table_cell_bold),
            Paragraph("Purchase + Rehab + $20k Furnishing", table_cell),
            Paragraph("<font color='#22543D'><strong>$2,900/mo NOI</strong></font><br/>9.3% - 14.5% CoC", table_cell),
            Paragraph("Long-Term Passive Hold<br/>(Monthly Distributions)", table_cell),
            Paragraph("Prime hospitality corridors (Barksdale AFB, Cyber Center, Shreveport Casinos)", table_cell)
        ],
        [
            Paragraph("<strong>Strategy B: LTR<br/>(HUD Section 8)</strong>", table_cell_bold),
            Paragraph("Purchase + Rehab<br/>(<strong>$0 Furnishing</strong>)", table_cell),
            Paragraph("<font color='#22543D'><strong>$1,485/mo NOI</strong></font><br/>23.0% - 31.0% Yield", table_cell),
            Paragraph("Multi-Year Stable Cashflow<br/>(Direct Deposit)", table_cell),
            Paragraph("High-FMR residential neighborhoods seeking recession-proof guaranteed yield", table_cell)
        ],
        [
            Paragraph("<strong>Strategy C: Flip<br/>(Tranchi Dispo)</strong>", table_cell_bold),
            Paragraph("<strong>$2,500 EMD</strong><br/>(Zero Debt/Rehab)", table_cell),
            Paragraph("<font color='#C05621'><strong>+$15,000 Cash Fee</strong></font><br/>600% CoC on EMD", table_cell),
            Paragraph("<strong>14-Day Fast Close</strong><br/>(Rapid Liquidity)", table_cell),
            Paragraph("Distressed contracts locked under market assigned to active local cash buyers", table_cell)
        ],
    ]
    tri_table = Table(tri_rows, colWidths=[90, 100, 105, 95, 114])
    tri_table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), primary),
        ('GRID', (0,0), (-1,-1), 0.5, border_col),
        ('ROWBACKGROUNDS', (0,1), (-1,-1), [colors.white, light_bg]),
        ('TOPPADDING', (0,0), (-1,-1), 5),
        ('BOTTOMPADDING', (0,0), (-1,-1), 5),
        ('LEFTPADDING', (0,0), (-1,-1), 5),
        ('RIGHTPADDING', (0,0), (-1,-1), 5),
    ]))
    story.append(tri_table)
    story.append(Spacer(1, 8))

    story.append(Paragraph("5. The Tranchi-Style Rapid Contract Flip Model", h1_style))
    story.append(Paragraph(
        "When market conditions or capital efficiency favor immediate liquidity over property management, TBI executes a rapid "
        "wholesale contract assignment (modeled after Tranchi.ai dispo operations). This model eliminates holding risk and renovation debt entirely:",
        body_style
    ))

    # Wholesale Economics Breakdown
    ws_rows = [
        [
            Paragraph("Contract Assignment Metric", table_header),
            Paragraph("Value (Model Run)", table_header),
            Paragraph("Strategic Function &amp; Market Advantage", table_header)
        ],
        [
            Paragraph("<strong>Contract Lock Price</strong>", table_cell_bold),
            Paragraph("<strong>$135,000 - $145,000</strong>", table_cell),
            Paragraph("Secured via assignable purchase agreement directly from motivated seller / bank portal", table_cell)
        ],
        [
            Paragraph("<strong>After-Repair-Value (ARV)</strong>", table_cell_bold),
            Paragraph("<strong>$210,000</strong>", table_cell),
            Paragraph("Supported by verified local comps within 0.75-mile radius (1975+ construction)", table_cell)
        ],
        [
            Paragraph("<strong>TBI Net Assignment Fee</strong>", table_cell_bold),
            Paragraph("<font color='#C05621'><strong>+$15,000 Cash</strong></font>", table_cell),
            Paragraph("Wire collected directly at closing title company within 14 days (zero holding cost)", table_cell)
        ],
        [
            Paragraph("<strong>End-Buyer Purchase Price</strong>", table_cell_bold),
            Paragraph("<strong>$150,000 - $160,000</strong>", table_cell),
            Paragraph("Assigned to pre-screened cash buyer well below market value", table_cell)
        ],
        [
            Paragraph("<strong>End-Buyer Net Profit</strong>", table_cell_bold),
            Paragraph("<font color='#22543D'><strong>+$22,500 (11.9% ROI)</strong></font>", table_cell),
            Paragraph("Healthy profit margin left for end-buyer rehabber to ensure immediate deal absorption", table_cell)
        ],
        [
            Paragraph("<strong>Capital at Risk / Velocity</strong>", table_cell_bold),
            Paragraph("<strong>$2,500 EMD / 14 Days</strong>", table_cell),
            Paragraph("600% Cash-on-Cash return on earnest money deposit held safely in title escrow", table_cell)
        ],
    ]
    ws_table = Table(ws_rows, colWidths=[130, 110, 264])
    ws_table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), warning),
        ('GRID', (0,0), (-1,-1), 0.5, border_col),
        ('ROWBACKGROUNDS', (0,1), (-1,-1), [colors.white, light_bg]),
        ('TOPPADDING', (0,0), (-1,-1), 4),
        ('BOTTOMPADDING', (0,0), (-1,-1), 4),
        ('LEFTPADDING', (0,0), (-1,-1), 6),
        ('RIGHTPADDING', (0,0), (-1,-1), 6),
    ]))
    story.append(ws_table)
    story.append(Spacer(1, 8))

    story.append(Paragraph("Pre-Screened Cash Buyer Matching &amp; 1-Click Dispo Generators", h2_style))
    story.append(Paragraph(
        "TBI maintains an active, pre-screened cash buyer registry segmented into 4 institutional and private profiles across Northwest Louisiana: "
        "<strong>1) Ark-La-Tex Turnkey &amp; Rehabbers</strong> (94% match, looking for &gt;15% ROI), "
        "<strong>2) Red River Buy &amp; Hold Landlords</strong> (91% match, 10%+ Cap target), "
        "<strong>3) Bayou Hospitality STR Operators</strong> (88% match, targeting Barksdale AFB corridors), and "
        "<strong>4) Sunbelt Institutional SFR Desks</strong> (85% match, buying clean-title single-family homes under $250k). "
        "Our engine generates instant 1-click high-converting SMS Deal Blasts and Investor Memorandums for immediate execution.",
        body_style
    ))

    story.append(PageBreak())

    # =========================================================================
    # PAGE 4: FINANCING ARCHITECTURE & COMMUNITY SYNDICATION
    # =========================================================================
    story.append(Paragraph("6. Institutional Financing Architecture: Zero-Personal Debt Stacking", h1_style))
    story.append(Paragraph(
        "To scale property acquisitions without tapping personal W-2 guarantees or encumbering corporate balance sheets, "
        "TBI utilizes a three-tier institutional financing playbook:",
        body_style
    ))

    # Financing Architecture Table
    fin_rows = [
        [
            Paragraph("Financing Layer", table_header),
            Paragraph("Underwriting Criteria", table_header),
            Paragraph("Capital Function &amp; Strategic Benefit", table_header)
        ],
        [
            Paragraph("<strong>Tier 1: 0% Business CC Lines</strong><br/>(Intro APR Cards)", table_cell_bold),
            Paragraph("$25,000 - $50,000 limits<br/>12 - 18 months 0% APR", table_cell),
            Paragraph("Funds 100% of sub-$50k acquisitions or cosmetic turns. <strong>$0 interest carrying cost</strong> during the 30-day renovation period.", table_cell)
        ],
        [
            Paragraph("<strong>Tier 2: DSCR Loans</strong><br/>(Debt Service Coverage)", table_cell_bold),
            Paragraph("1.20x lender minimum<br/><strong>TBI yields 2.4x - 2.7x</strong>", table_cell),
            Paragraph("Qualified 100% on HUD Section 8 voucher rent ($1,485/mo vs $550/mo PITI). <strong>Zero personal income or tax returns required.</strong>", table_cell)
        ],
        [
            Paragraph("<strong>Tier 3: 70% Appraisal Rule</strong><br/>(Downside Equity Cap)", table_cell_bold),
            Paragraph("MAO = (ARV &times; 0.70) - Rehab<br/>TBI secures &gt;35% below MAO", table_cell),
            Paragraph("Guarantees an immediate 30%+ instant equity cushion on day one, shielding capital partners against housing market pullbacks.", table_cell)
        ],
    ]
    fin_table = Table(fin_rows, colWidths=[130, 110, 264])
    fin_table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), primary),
        ('GRID', (0,0), (-1,-1), 0.5, border_col),
        ('ROWBACKGROUNDS', (0,1), (-1,-1), [colors.white, light_bg]),
        ('TOPPADDING', (0,0), (-1,-1), 5),
        ('BOTTOMPADDING', (0,0), (-1,-1), 5),
        ('LEFTPADDING', (0,0), (-1,-1), 6),
        ('RIGHTPADDING', (0,0), (-1,-1), 6),
    ]))
    story.append(fin_table)
    story.append(Spacer(1, 10))

    story.append(Paragraph("7. Community Co-Investment &amp; Audited USDC Distributions", h1_style))
    story.append(Paragraph(
        "For assets held in our long-term portfolio (both Short-Term Rental conversions and Section 8 traditional leased properties), "
        "TBI syndicates fractional co-ownership through the <strong>MyMI Wallet Real Estate Platform</strong>. "
        "This democratizes high-yield institutional real estate while automating distribution transparency:",
        body_style
    ))

    synd_rows = [
        [
            Paragraph("Syndication Feature", table_header),
            Paragraph("Operational Standard", table_header),
            Paragraph("Investor Value &amp; Security Protection", table_header)
        ],
        [
            Paragraph("<strong>Unit Denomination</strong>", table_cell_bold),
            Paragraph("<strong>$100.00 USDC</strong> per Unit", table_cell),
            Paragraph("Low barrier to entry enabling broad community participation and portfolio diversification", table_cell)
        ],
        [
            Paragraph("<strong>Sponsor Alignment</strong>", table_cell_bold),
            Paragraph("<strong>10% Retained Equity</strong>", table_cell),
            Paragraph("Timothy Burks Incorporated retains 10% unencumbered equity (mandatory skin-in-the-game)", table_cell)
        ],
        [
            Paragraph("<strong>Monthly Distributions</strong>", table_cell_bold),
            Paragraph("<strong>Direct USDC Electronic Payouts</strong>", table_cell),
            Paragraph("Audited Net Operating Income pooled monthly and distributed pro-rata directly to investor wallets", table_cell)
        ],
        [
            Paragraph("<strong>Legal Governance</strong>", table_cell_bold),
            Paragraph("<strong>LREC &amp; SEC Reg D 506(c) Compliant</strong>", table_cell),
            Paragraph("Operating agreement governed under Louisiana law with audited title escrow and hash-chained ledgers", table_cell)
        ],
    ]
    synd_table = Table(synd_rows, colWidths=[130, 110, 264])
    synd_table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), secondary),
        ('GRID', (0,0), (-1,-1), 0.5, border_col),
        ('ROWBACKGROUNDS', (0,1), (-1,-1), [colors.white, light_bg]),
        ('TOPPADDING', (0,0), (-1,-1), 5),
        ('BOTTOMPADDING', (0,0), (-1,-1), 5),
        ('LEFTPADDING', (0,0), (-1,-1), 6),
        ('RIGHTPADDING', (0,0), (-1,-1), 6),
    ]))
    story.append(synd_table)
    story.append(Spacer(1, 10))

    story.append(Paragraph("8. Corporate Governance &amp; Partner Inquiries", h1_style))
    story.append(Paragraph(
        "Timothy Burks Incorporated, LLC. welcomes accredited co-investors, capital partners, and regional property sellers. "
        "For property submissions, joint venture underwriting, or wholesale cash buyer enrollment, contact the operating managers:",
        body_style
    ))

    contact_box = [
        [
            Paragraph(
                "<strong>Lead Sponsor:</strong> Timothy Burks Incorporated, LLC.<br/>"
                "<strong>Operating Managers:</strong> Timothy Burks &amp; AnneAlicia Burks<br/>"
                "<strong>Operations Hub:</strong> Bossier City, Louisiana &bull; <strong>Platform Portal:</strong> mymiwallet.com/Projects<br/>"
                "<strong>Direct Inquiries:</strong> info@tbisolutions.com | Telephone: 318-706-9694",
                body_style
            )
        ]
    ]
    contact_table = Table(contact_box, colWidths=[504])
    contact_table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,-1), light_bg),
        ('BOX', (0,0), (-1,-1), 1, primary),
        ('TOPPADDING', (0,0), (-1,-1), 8),
        ('BOTTOMPADDING', (0,0), (-1,-1), 8),
        ('LEFTPADDING', (0,0), (-1,-1), 10),
        ('RIGHTPADDING', (0,0), (-1,-1), 10),
    ]))
    story.append(contact_table)

    # Build PDF with dynamic NumberedCanvas
    doc.build(story, canvasmaker=NumberedCanvas)
    print(f"Successfully generated executive briefing PDF: {output_path}")

if __name__ == '__main__':
    out_dir = 'public/assets/docs'
    os.makedirs(out_dir, exist_ok=True)
    pdf_filename = os.path.join(out_dir, 'TBI_Real_Estate_Acquisition_Engine_Executive_Briefing.pdf')
    build_pdf(pdf_filename)
