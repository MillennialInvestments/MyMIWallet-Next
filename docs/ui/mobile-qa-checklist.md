# Mobile QA Checklist — MyMI Wallet

## Devices & Viewports
- iPhone 5/SE (320px)
- iPhone 11/12/13 (375px)
- iPhone 14 Pro Max (414px)
- Android (360px, 412px)
- Portrait + landscape for each

## Global Checks
- No horizontal scroll at 320–480px widths.
- Base font size 16px on mobile; no iOS input zoom.
- Tap targets >= 44px for buttons/inputs/selects.
- Sticky header does not overlap content.
- Safe area (notch) padding respected.

## Authentication
- Login/register/forgot/reset forms stack properly.
- Inputs and submit buttons are full-width and tap-friendly.

## Dashboard & Cards
- All widgets stack vertically.
- Cards and charts fit within viewport without overflow.
- Key CTAs are not hidden behind sticky UI.

## Budget Module
- Income/expense forms are readable and tappable.
- Recurring schedule UI controls remain accessible.
- Lists and add/edit pages do not overflow.

## Investments/Watchlist/Predictions
- Tables and charts are usable on phone widths.
- Filters stack vertically and remain tappable.

## Alerts Module
- Filters and table controls stack on mobile.
- DataTables horizontal scroll stays within wrapper.
- Modals open and scroll properly.

## Marketing Management
- Dashboard cards stack correctly.
- Preview modals remain usable on small screens.

## Management/Admin (DataTables Heavy)
- Search, filter, and pagination controls stack.
- Tables do not create page-level horizontal scroll.

## Modals
- Fullscreen-ish modal layout on phones.
- Scroll in modal body, action buttons visible/sticky.

## Performance
- No layout thrashing; scrolling remains smooth.
