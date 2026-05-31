# AIOps Code Analysis

- Generated: 2026-05-31T19:28:07+00:00
- Repo: current
- Files scanned: 1
- Findings: 25
- Risk score: 100 / 100
- Risk level: CRITICAL

## Executive Summary

Deterministic analysis found issues or review points that may affect security, UX, backend efficiency, or maintainability.

## Files

- `public/assets/js/charts/gd-invest.js`

## Findings

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 3
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
* Allows legacy xAxes/yAxes chart configs to run under Chart.js v4.
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 42
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
if (scales.xAxes && !scales.x) {
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 43
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
scales.x = normalizeAxis(scales.xAxes);
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 44
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
delete scales.xAxes;
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 47
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
if (scales.yAxes && !scales.y) {
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 48
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
scales.y = normalizeAxis(scales.yAxes);
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 49
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
delete scales.yAxes;
```

### HIGH — Potential unsafe browser-side DOM/script behavior.

- Category: `xss-risk`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 125
- Recommendation: Use textContent, safe templating, and avoid eval/document.write.

```
_get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 180
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
yAxes: [{
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 186
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
xAxes: [{
```

### HIGH — Potential unsafe browser-side DOM/script behavior.

- Category: `xss-risk`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 208
- Recommendation: Use textContent, safe templating, and avoid eval/document.write.

```
_get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 268
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
yAxes: [{
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 274
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
xAxes: [{
```

### HIGH — Potential unsafe browser-side DOM/script behavior.

- Category: `xss-risk`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 308
- Recommendation: Use textContent, safe templating, and avoid eval/document.write.

```
_get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 368
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
yAxes: [{
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 371
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
xAxes: [{
```

### HIGH — Potential unsafe browser-side DOM/script behavior.

- Category: `xss-risk`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 426
- Recommendation: Use textContent, safe templating, and avoid eval/document.write.

```
_get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data,
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 487
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
yAxes: [{
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 494
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
xAxes: [{
```

### HIGH — Potential unsafe browser-side DOM/script behavior.

- Category: `xss-risk`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 530
- Recommendation: Use textContent, safe templating, and avoid eval/document.write.

```
_get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data,
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 592
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
yAxes: [{
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 599
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
xAxes: [{
```

### HIGH — Potential unsafe browser-side DOM/script behavior.

- Category: `xss-risk`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 636
- Recommendation: Use textContent, safe templating, and avoid eval/document.write.

```
_get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data,
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 697
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
yAxes: [{
```

### MODERATE — Legacy Chart.js v2 axis syntax detected.

- Category: `chartjs-compat`
- File: `public/assets/js/charts/gd-invest.js`
- Line: 704
- Recommendation: Use Chart.js v4 scales.x/scales.y syntax or a compatibility shim.

```
xAxes: [{
```

## Suggested Next Tasks

- Fix any critical/high findings first.
- Convert repeated controller/model work into cached service methods.
- Remove production debug logs that expose tokens, CSRF hashes, request payloads, or internal model details.
- Add browser validation for affected routes and modal actions.
