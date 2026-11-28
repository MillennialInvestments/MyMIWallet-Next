#!/usr/bin/env python3
"""
Louisiana Assignment of Contract & Purchase Agreement Generator
Generates an institutional PDF legal contract for wholesale contract dispositions.

Lead Sponsor: Timothy Burks Incorporated, LLC.
Operating Managers: Timothy Burks & AnneAlicia Burks, Bossier City, Louisiana.
"""

import sys
import os
import json
from reportlab.lib.pagesizes import letter
from reportlab.lib import colors
from reportlab.lib.styles import getSampleStyleSheet, ParagraphStyle
from reportlab.platypus import (
    SimpleDocTemplate, Paragraph, Spacer, Table, TableStyle, PageBreak, KeepTogether, HRFlowable
)
from reportlab.pdfgen import canvas

def build_assignment_contract(payload: dict):
    deal = payload.get('deal', {})
    buyer = payload.get('buyer', {})
    sponsor = payload.get('sponsor', {})
    output_path = payload.get('output_path', '/tmp/assignment_contract.pdf')

    os.makedirs(os.path.dirname(output_path), exist_ok=True)

    doc = SimpleDocTemplate(
        output_path,
        pagesize=letter,
        leftMargin=54,
        rightMargin=54,
        topMargin=54,
        bottomMargin=54
    )

    styles = getSampleStyleSheet()

    primary = colors.HexColor("#1A365D")
    secondary = colors.HexColor("#2B6CB0")
    dark = colors.HexColor("#2D3748")
    light_bg = colors.HexColor("#F7FAFC")
    border_col = colors.HexColor("#CBD5E0")

    title_style = ParagraphStyle(
        'ContractTitle',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=15,
        leading=19,
        textColor=primary,
        alignment=1,
        spaceAfter=4
    )

    subtitle_style = ParagraphStyle(
        'ContractSubtitle',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=9.5,
        leading=13,
        textColor=secondary,
        alignment=1,
        spaceAfter=12
    )

    sec_header = ParagraphStyle(
        'SecHeader',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=10,
        leading=13,
        textColor=primary,
        spaceBefore=8,
        spaceAfter=4
    )

    legal_body = ParagraphStyle(
        'LegalBody',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=8.5,
        leading=12,
        textColor=dark,
        spaceAfter=5
    )

    legal_bold = ParagraphStyle(
        'LegalBold',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=8.5,
        leading=12,
        textColor=dark
    )

    story = []

    story.append(Paragraph("LOUISIANA ASSIGNMENT OF REAL ESTATE PURCHASE AGREEMENT", title_style))
    story.append(Paragraph("Governed under Louisiana Law &bull; Official Closing Document &bull; Title Escrow Certified", subtitle_style))

    # Parties Block
    addr = deal.get('address', 'Target Property Address')
    city = deal.get('city', 'Bossier City')
    state = deal.get('state', 'LA')
    zip_code = deal.get('zip', '71111')
    parish = 'Bossier Parish' if 'Bossier' in city or zip_code in ['71111', '71112'] else 'Caddo Parish'

    contract_price = float(deal.get('contract_price', deal.get('purchase_price', 135000.0)))
    assignment_fee = float(deal.get('assignment_fee', 15000.0))
    end_buyer_price = contract_price + assignment_fee
    emd = float(deal.get('earnest_money_deposit', 2500.0))
    days_to_close = int(deal.get('days_to_close', 14))

    buyer_name = buyer.get('full_name', 'Verified Cash Buyer / Assignee')
    buyer_company = buyer.get('company_name', 'Assignee LLC / Nominee')
    buyer_phone = buyer.get('phone', 'Phone on File')
    buyer_email = buyer.get('email', 'buyer@investors.com')

    parties_data = [
        [
            Paragraph("<strong>ASSIGNOR:</strong>", legal_bold),
            Paragraph(f"<strong>Timothy Burks Incorporated, LLC.</strong><br/>Operating Managers: Timothy Burks &amp; AnneAlicia Burks<br/>Bossier City, Louisiana &bull; info@tbisolutions.com", legal_body)
        ],
        [
            Paragraph("<strong>ASSIGNEE:</strong>", legal_bold),
            Paragraph(f"<strong>{buyer_name}</strong> ({buyer_company})<br/>Contact: {buyer_phone} &bull; {buyer_email}", legal_body)
        ],
        [
            Paragraph("<strong>SUBJECT PROPERTY:</strong>", legal_bold),
            Paragraph(f"<strong>{addr}</strong>, {city}, {state} {zip_code} ({parish})", legal_body)
        ],
    ]
    parties_table = Table(parties_data, colWidths=[120, 384])
    parties_table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,-1), light_bg),
        ('BOX', (0,0), (-1,-1), 1, border_col),
        ('INNERGRID', (0,0), (-1,-1), 0.5, border_col),
        ('VALIGN', (0,0), (-1,-1), 'TOP'),
        ('TOPPADDING', (0,0), (-1,-1), 5),
        ('BOTTOMPADDING', (0,0), (-1,-1), 5),
        ('LEFTPADDING', (0,0), (-1,-1), 8),
        ('RIGHTPADDING', (0,0), (-1,-1), 8),
    ]))
    story.append(parties_table)
    story.append(Spacer(1, 8))

    story.append(Paragraph("1. FINANCIAL TERMS &amp; ASSIGNMENT CONSIDERATION", sec_header))
    fin_rows = [
        [Paragraph("Financial Component", legal_bold), Paragraph("Amount ($ USD)", legal_bold), Paragraph("Terms &amp; Escrow Distribution", legal_bold)],
        [Paragraph("Original Purchase Agreement Price", legal_body), Paragraph(f"${contract_price:,.2f}", legal_bold), Paragraph("Payable to Seller at Act of Cash Sale / Closing", legal_body)],
        [Paragraph("<strong>Net Assignment Fee to Assignor</strong>", legal_bold), Paragraph(f"<strong><font color='#C05621'>+${assignment_fee:,.2f}</font></strong>", legal_bold), Paragraph("Disbursed by Title Company to Assignor at closing", legal_body)],
        [Paragraph("<strong>Total Purchase Price to Assignee</strong>", legal_bold), Paragraph(f"<strong>${end_buyer_price:,.2f}</strong>", legal_bold), Paragraph(f"Total cash consideration paid by Assignee ({buyer_name})", legal_body)],
        [Paragraph("Earnest Money Deposit (EMD)", legal_body), Paragraph(f"${emd:,.2f}", legal_bold), Paragraph("Deposited into Title Escrow within 48 hours of execution", legal_body)],
        [Paragraph("Closing Timeline", legal_body), Paragraph(f"<strong>{days_to_close} Calendar Days</strong>", legal_bold), Paragraph("Cash closing on or before statutory deadline", legal_body)],
    ]
    fin_table = Table(fin_rows, colWidths=[170, 110, 224])
    fin_table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), colors.HexColor("#E2E8F0")),
        ('GRID', (0,0), (-1,-1), 0.5, border_col),
        ('VALIGN', (0,0), (-1,-1), 'MIDDLE'),
        ('TOPPADDING', (0,0), (-1,-1), 3),
        ('BOTTOMPADDING', (0,0), (-1,-1), 3),
        ('LEFTPADDING', (0,0), (-1,-1), 6),
        ('RIGHTPADDING', (0,0), (-1,-1), 6),
    ]))
    story.append(fin_table)
    story.append(Spacer(1, 8))

    story.append(Paragraph("2. TERMS &amp; OPERATIONAL COVENANTS", sec_header))
    story.append(Paragraph(
        "<strong>A. Assignment of Rights:</strong> For valuable consideration received, Assignor hereby transfers, conveys, and assigns unto Assignee "
        "all legal and equitable rights, title, interest, and obligations in that certain Purchase Agreement for the Subject Property. "
        "Assignee explicitly accepts and agrees to perform all obligations of Buyer thereunder.",
        legal_body
    ))
    story.append(Paragraph(
        f"<strong>B. Earnest Money Deposit:</strong> Assignee shall deliver an Earnest Money Deposit in the sum of <strong>${emd:,.2f}</strong> "
        f"by certified cashier's check or wire transfer to the designated licensed Louisiana closing title company within forty-eight (48) hours of execution. "
        "Said deposit shall be credited toward the Total Purchase Price at closing.",
        legal_body
    ))
    story.append(Paragraph(
        f"<strong>C. Inspection &amp; Cash Closing:</strong> Assignee acknowledges having conducted satisfactory physical and title due diligence. "
        f"Closing shall occur on or before <strong>{days_to_close} days</strong> from date hereof. Closing shall be cash with zero financing contingencies.",
        legal_body
    ))
    story.append(Paragraph(
        "<strong>D. Indemnification &amp; Authority:</strong> Assignee agrees to hold harmless Assignor, Timothy Burks Incorporated, LLC., and its "
        "operating managers from any disputes arising post-closing regarding property physical condition, liens, or tenant occupancy.",
        legal_body
    ))

    story.append(Spacer(1, 10))
    story.append(Paragraph("3. SIGNATURES &amp; TITLE ESCROW ACKNOWLEDGMENT", sec_header))

    sig_data = [
        [
            Paragraph("<strong>ASSIGNOR:</strong><br/>Timothy Burks Incorporated, LLC.<br/><br/><br/>________________________________________<br/>Timothy Burks / AnneAlicia Burks<br/>Operating Managers<br/>Date: ________________________", legal_body),
            Paragraph(f"<strong>ASSIGNEE:</strong><br/>{buyer_company}<br/><br/><br/>________________________________________<br/>Authorized Representative: {buyer_name}<br/>Title: ________________________<br/>Date: ________________________", legal_body)
        ],
        [
            Paragraph("<strong>TITLE &amp; ESCROW AGENT ACKNOWLEDGMENT:</strong><br/>Licensed Louisiana Closing Title Agency receives $2,500 EMD wire.<br/><br/>Title Officer Signature: ___________________________ Date: ____________", legal_body),
            Paragraph("<strong>CLOSING INSTRUCTION:</strong><br/>Title Agent is instructed to disburse the $15,000 Assignment Fee directly to Timothy Burks Incorporated, LLC. via wire at closing.", legal_body)
        ]
    ]
    sig_table = Table(sig_data, colWidths=[250, 254])
    sig_table.setStyle(TableStyle([
        ('BOX', (0,0), (-1,-1), 1, border_col),
        ('INNERGRID', (0,0), (-1,-1), 0.5, border_col),
        ('VALIGN', (0,0), (-1,-1), 'TOP'),
        ('TOPPADDING', (0,0), (-1,-1), 6),
        ('BOTTOMPADDING', (0,0), (-1,-1), 6),
        ('LEFTPADDING', (0,0), (-1,-1), 8),
        ('RIGHTPADDING', (0,0), (-1,-1), 8),
    ]))
    story.append(sig_table)

    doc.build(story)
    print(f"Successfully generated Assignment Contract: {output_path}")

if __name__ == '__main__':
    if len(sys.argv) > 1:
        payload = json.loads(sys.argv[1])
    else:
        payload = {
            'deal': {
                'address': '1842 Barksdale Blvd',
                'city': 'Bossier City',
                'state': 'LA',
                'zip': '71111',
                'purchase_price': 135000.0,
                'assignment_fee': 15000.0,
                'earnest_money_deposit': 2500.0,
                'days_to_close': 14,
            },
            'buyer': {
                'full_name': 'Ark-La-Tex Turnkey & Rehabbers',
                'company_name': 'Ark-La-Tex Capital Partners, LLC',
                'phone': '318-555-0192',
                'email': 'acquisitions@arklatexcapital.com',
            },
            'output_path': '/tmp/test_assignment_contract.pdf'
        }
    build_assignment_contract(payload)
