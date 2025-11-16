import csv
from datetime import date
from xml.etree.ElementTree import Element, SubElement, ElementTree

BASE_URL = "https://www.mymiwallet.com"

def main():
    urlset = Element('urlset', {
        'xmlns': "http://www.sitemaps.org/schemas/sitemap/0.9"
    })

    with open('docs/functional_inventory/feature_inventory.csv', newline='') as f:
        reader = csv.DictReader(f)
        for row in reader:
            # Filter what should be indexed
            if row['IsUIPage'] != 'true':
                continue
            if row['Category'] not in ('Public', 'User Dashboard', 'Support / Help'):
                continue

            path = row['RoutePath']
            if not path.startswith('/'):
                path = '/' + path

            url = SubElement(urlset, 'url')
            loc = SubElement(url, 'loc')
            loc.text = BASE_URL + path

            lastmod = SubElement(url, 'lastmod')
            lastmod.text = date.today().isoformat()

    tree = ElementTree(urlset)
    tree.write('public/sitemap.xml', encoding='utf-8', xml_declaration=True)

if __name__ == "__main__":
    main()
