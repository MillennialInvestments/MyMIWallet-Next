# Vendor Assets

This directory stores third-party front-end dependencies that were previously referenced from CDN paths. Shipping the files with the application prevents production pages from failing when the CDN is unreachable or blocked by CSP rules.

## Bundled Libraries

| Library | Version | Path | Source |
| --- | --- | --- | --- |
| Bootstrap | 5.3.3 | `bootstrap5/bootstrap.bundle.min.js`, `bootstrap5/bootstrap.min.css` | https://github.com/twbs/bootstrap/tree/v5.3.3/dist |
| jQuery | 3.6.0 | `jquery/jquery-3.6.0.min.js` | https://github.com/jquery/jquery/tree/3.6.0/dist |
| Bootstrap Select | 1.14.0-beta3 | `bootstrap-select/bootstrap-select.min.js` | https://github.com/snapappointments/bootstrap-select/tree/1.14.0-beta3/dist |
| DataTables core | 1.11.5 | `datatables/1.11.5/js/jquery.dataTables.min.js`, `datatables/1.11.5/css/jquery.dataTables.min.css` | https://www.npmjs.com/package/datatables.net/v/1.11.5 |
| DataTables Bootstrap 5 skin | 1.11.5 | `datatables/1.11.5/js/dataTables.bootstrap5.min.js`, `datatables/1.11.5/css/dataTables.bootstrap5.min.css` | https://www.npmjs.com/package/datatables.net-bs5/v/1.11.5 |
| Chart.js | 2.1.2 | `chart.js/2.1.2/Chart.min.js` | https://github.com/chartjs/Chart.js/tree/v2.1.2/dist |
| AOS (Animate On Scroll) | 2.3.4 | `aos/aos.js`, `aos/aos.css` | https://github.com/michalsnik/aos/tree/v2.3.4/dist |
| Font Awesome Free | 5.15.1 | `fontawesome/css/all.min.css` (uses existing fonts in `public/assets/fonts`) | https://fontawesome.com/how-to-use/on-the-web/setup/hosting-font-awesome-yourself |

When updating any library, please refresh both the script/style files here and this table so that the provenance remains clear.
