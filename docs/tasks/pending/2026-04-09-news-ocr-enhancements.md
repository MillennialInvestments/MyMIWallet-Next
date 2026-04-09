# Pending: News OCR enhancements

## remaining work
- Add multi-block OCR parsing for image regions and rotated text.
- Add provider templates for Thinkorswim screenshot layouts.

## blockers
- Need sample corpus of production screenshots per provider.

## dependencies
- OCR confidence scoring utility and false-positive filters.

## recommended next implementation order
1. Collect samples.
2. Build confidence thresholding.
3. Add provider-specific regex maps.
