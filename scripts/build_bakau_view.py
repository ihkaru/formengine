#!/usr/bin/env python3
"""
Builder: Sungai Bakau Kecil dashboard view.
Reads HTML template and injects live Google Sheets data as JSON inside
<script type="application/json"> tags — zero escaping issues.
"""
import json
import urllib.request
import csv
import io
import os

SHEET_ID = "1kIn0Xn_R2C8HWznUruetLRAOeOjCzboslR0k1EDQBFI"
TEMPLATE = os.path.join(os.path.dirname(__file__), "sungaibakaukecil_template.html")
OUTPUT   = os.path.join(os.path.dirname(__file__), "..", "resources", "views", "cantik", "sungaibakaukecil.blade.php")

def fetch_sheet(sheet_name):
    url = f"https://docs.google.com/spreadsheets/d/{SHEET_ID}/gviz/tq?tqx=out:csv&sheet={sheet_name}"
    req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0"})
    with urllib.request.urlopen(req, timeout=15) as resp:
        text = resp.read().decode("utf-8")
    reader = csv.DictReader(io.StringIO(text))
    # Strip whitespace from keys
    return [{k.strip(): v for k, v in row.items()} for row in reader]

print("Fetching Appsheet_RT ...")
rt_data = fetch_sheet("Appsheet_RT")
print(f"  -> {len(rt_data)} records")

print("Fetching Appsheet_Fasilitas ...")
fas_data = fetch_sheet("Appsheet_Fasilitas")
print(f"  -> {len(fas_data)} records")

rt_json  = json.dumps(rt_data,  ensure_ascii=False)
fas_json = json.dumps(fas_data, ensure_ascii=False)

with open(TEMPLATE, encoding="utf-8") as f:
    template = f.read()

output = template.replace("%%RT_DATA%%", rt_json).replace("%%FAS_DATA%%", fas_json)

with open(OUTPUT, "w", encoding="utf-8") as f:
    f.write(output)

print(f"\nDone! Written to: {os.path.abspath(OUTPUT)}")
print(f"RT records embedded  : {len(rt_data)}")
print(f"Fasilitas embedded   : {len(fas_data)}")
