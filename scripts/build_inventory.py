import json
import csv
import os
import re
import subprocess
from collections import defaultdict

ROUTE_JSON = 'route_dump.json'
ROUTE_PARSER = 'scripts/route_parser.php'
OUTPUT_MD = 'docs/functional_inventory/feature_inventory.md'
OUTPUT_CSV = 'docs/functional_inventory/feature_inventory.csv'

CATEGORY_MAP = {
    'APIs': 'API / Backend',
    'API': 'API / Backend',
    'Management': 'Admin / Management',
    'Admin': 'Admin / Management',
    'Support': 'Support / Help',
    'Blog': 'Public',
    'Announcements': 'Public',
    'How-It-Works': 'Public',
    'Docs': 'Public',
}

PUBLIC_CONTROLLERS = {'Home', 'ServiceWorker', 'Health', 'Ops', 'Debug'}

os.makedirs(os.path.dirname(OUTPUT_MD), exist_ok=True)

def method_title(name: str) -> str:
    if not name:
        return 'Index'
    if name.lower() == 'index':
        return 'Index'
    s1 = re.sub('([a-z0-9])([A-Z])', r'\1 \2', name)
    return s1.replace('_', ' ').title()

def path_title(path: str) -> str:
    if path == '/':
        return 'Home'
    parts = [p for p in path.strip('/').split('/') if p and not p.startswith('(:')]
    if not parts:
        return 'Index'
    last = parts[-1]
    last = re.sub(r'\(:[^\)]+\)', 'Parameter', last)
    last = last.replace('-', ' ')
    last = last.replace('_', ' ')
    last = re.sub('([a-z0-9])([A-Z])', r'\1 \2', last)
    return last.title()

def determine_module(controller: str) -> str:
    if controller == 'closure':
        return 'System'
    if controller.startswith('App\\Modules\\'):
        parts = controller.split('\\')
        if len(parts) > 2:
            return parts[2]
    if controller.startswith('App\\Controllers\\'):
        parts = controller.split('\\')
        if len(parts) > 2:
            return parts[2]
        return 'Core'
    return controller.split('\\')[0]

def determine_area(controller: str) -> str:
    if controller == 'closure':
        return 'Utility'
    cls = controller.split('\\')[-1]
    if cls.endswith('Controller'):
        cls = cls[:-10]
    return cls or 'General'

def categorize(module: str, controller: str) -> str:
    if controller != 'closure' and controller.split('\\')[-1].startswith('Auth'):
        return 'Auth / Onboarding'
    if module in CATEGORY_MAP:
        return CATEGORY_MAP[module]
    if module in {'User', 'Finance', 'Exchange', 'Predictions', 'Projects', 'Notifications', 'Marketing_New', 'ScriptStudio', 'Template'}:
        return 'User Dashboard'
    if module in {'System'}:
        return 'API / Backend'
    if module in {'Support', 'Status'}:
        return 'Support / Help'
    return 'Public'

def determine_status(path: str, method_name: str, options) -> str:
    note_path = path.lower()
    if 'cron' in note_path or (method_name and 'cron' in method_name.lower()):
        return 'cron-only'
    if options and isinstance(options, dict):
        filt = options.get('filter')
        if filt and 'cron' in filt.lower():
            return 'cron-only'
    return 'active'

def is_api_endpoint(module: str, path: str, category: str) -> bool:
    if module in {'APIs', 'API'}:
        return True
    if path.upper().startswith('/API'):
        return True
    if category == 'API / Backend':
        return True
    return False

def is_ui_page(module: str, methods, category: str, path: str) -> bool:
    if 'GET' not in methods:
        return False
    if is_api_endpoint(module, path, category):
        return False
    return True

def build_description(path: str, controller: str, method: str, module: str, area: str, category: str, methods) -> str:
    verb = ' and '.join(methods)
    target = f"{controller}::{method}" if controller != 'closure' and method else 'closure handler'
    context = {
        'User Dashboard': f"helping signed-in users work within the {area} tools",
        'Admin / Management': f"supporting staff workflows for {area}",
        'API / Backend': f"providing backend data/services for {area} consumers",
        'Auth / Onboarding': "handling account access and activation",
        'Support / Help': "delivering support content and intake",
        'Public': "sharing public-facing marketing or content",
    }.get(category, 'serving application requests')
    return (
        f"Handles {verb} requests to `{path}` via {target}, {context}."
    )

def feature_name(area: str, path: str, method: str) -> str:
    label = path_title(path) if method.lower() == 'index' else method_title(method)
    if not label:
        label = 'Feature'
    return f"{area} – {label}"

subprocess.run(['php', ROUTE_PARSER], check=True)

routes = json.load(open(ROUTE_JSON))
records = []
for entry in routes:
    methods = entry['methods']
    path = entry['path']
    controller = entry['controller']
    method = entry['method'] or 'index'
    options = entry.get('options')
    module = determine_module(controller)
    area = determine_area(controller)
    category = categorize(module, controller)
    status = determine_status(path, method, options)
    api_flag = is_api_endpoint(module, path, category)
    ui_flag = is_ui_page(module, methods, category, path)
    feature = feature_name(area, path, method)
    description = build_description(path, controller, method, module, area, category, methods)
    notes = []
    if options and isinstance(options, dict):
        if 'filter' in options:
            notes.append(f"requires filter {options['filter']}")
        if 'as' in options:
            notes.append(f"alias: {options['as']}")
    record = {
        'Module': module,
        'Area': area,
        'FeatureName': feature,
        'RoutePath': path,
        'HttpMethod': '|'.join(methods),
        'ControllerClass': controller,
        'ControllerMethod': method,
        'Category': category,
        'Status': status,
        'Description': description,
        'IsUIPage': str(ui_flag).lower(),
        'IsCronEndpoint': str(status == 'cron-only').lower(),
        'IsApiEndpoint': str(api_flag).lower(),
        'MenuLocation': f"{module} > {area}",
        'Notes': '; '.join(notes),
    }
    records.append(record)

records.sort(key=lambda r: (r['Module'], r['Area'], r['RoutePath'], r['HttpMethod']))

with open(OUTPUT_CSV, 'w', newline='') as csvfile:
    writer = csv.DictWriter(csvfile, fieldnames=[
        'Module','Area','FeatureName','RoutePath','HttpMethod','ControllerClass','ControllerMethod',
        'Category','Status','Description','IsUIPage','IsCronEndpoint','IsApiEndpoint','MenuLocation','Notes'
    ])
    writer.writeheader()
    for rec in records:
        writer.writerow(rec)

md_lines = []
md_lines.append('# MyMI Wallet – Functionality Inventory')
md_lines.append('')
md_lines.append('This document lists all known functionality in the MyMI Wallet CI4 application, grouped by module and route.')
md_lines.append('')
md_lines.append('## Legend')
md_lines.append('')
md_lines.append('- **Category**: Public, User Dashboard, Admin / Management, API / Backend, Auth / Onboarding, Support / Help')
md_lines.append('- **Status**: active, legacy, cron-only, experimental')
md_lines.append('')
md_lines.append('---')
md_lines.append('')

module_groups = defaultdict(lambda: defaultdict(list))
for rec in records:
    module_groups[rec['Module']][rec['Area']].append(rec)

for module in sorted(module_groups.keys()):
    md_lines.append(f"## {module} Module")
    md_lines.append('')
    areas = module_groups[module]
    for area in sorted(areas.keys()):
        md_lines.append(f"### {area}")
        md_lines.append('')
        for rec in areas[area]:
            md_lines.append(f"- [ ] **{rec['FeatureName']}**")
            md_lines.append(f"  - **Route**: `{rec['RoutePath']}`")
            md_lines.append(f"  - **Methods**: `{rec['HttpMethod']}`")
            if rec['ControllerClass'] != 'closure':
                md_lines.append(f"  - **Controller**: `{rec['ControllerClass']}::{rec['ControllerMethod']}`")
            else:
                md_lines.append(f"  - **Controller**: `closure`")
            md_lines.append(f"  - **Category**: {rec['Category']}")
            md_lines.append(f"  - **Status**: {rec['Status']}")
            md_lines.append(f"  - **Description**: {rec['Description']}")
            md_lines.append('')
    md_lines.append('')

with open(OUTPUT_MD, 'w') as mdfile:
    mdfile.write('\n'.join(md_lines).strip() + '\n')

if os.path.exists(ROUTE_JSON):
    os.remove(ROUTE_JSON)

print(f"Wrote {len(records)} records to {OUTPUT_MD} and {OUTPUT_CSV}")