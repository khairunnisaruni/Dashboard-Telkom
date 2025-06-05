import pandas as pd
import sys
import os
import json
from collections import defaultdict
from datetime import datetime

def extract_occ_data(file_path):
    extension = os.path.splitext(file_path)[1].lower()

    if extension == '.csv':
        df = pd.read_csv(file_path)
    elif extension in ['.xlsx', '.xls']:
        df = pd.read_excel(file_path, engine='openpyxl' if extension == '.xlsx' else None)
    else:
        print("Unsupported file type.")
        return []

    needed_columns = ['AVAI', 'Telkom Datel', 'OCC 1', 'UPDATE DATE']
    missing_columns = [col for col in needed_columns if col not in df.columns]
    if missing_columns:
        print(f"Missing columns: {missing_columns}")
        return []

    df = df[needed_columns]

    grouped = defaultdict(lambda: {
        'occ_sum': 0.0,
        'occ_count': 0,
        'idle_sum': 0,
        'latest_updated': None
    })

    for _, row in df.iterrows():
        telda = str(row['Telkom Datel']).strip()

        try:
            occ = float(row['OCC 1'])
        except (ValueError, TypeError):
            occ = 0.0

        try:
            idle = int(row['AVAI']) if pd.notna(row['AVAI']) else 0
        except (ValueError, TypeError):
            idle = 0

        updated = str(row['UPDATE DATE']).strip()
        group = grouped[telda]
        group['occ_sum'] += occ
        group['occ_count'] += 1
        group['idle_sum'] += idle

        updated_time = None
        if updated:
            for fmt in ("%Y-%m-%d %H:%M:%S", "%Y-%m-%d", "%d/%m/%Y %H:%M:%S", "%d/%m/%Y"):
                try:
                    updated_time = datetime.strptime(updated, fmt)
                    break
                except ValueError:
                    continue

        if updated_time:
            if not group['latest_updated'] or updated_time > group['latest_updated']:
                group['latest_updated'] = updated_time

    final_data = []
    for telda, values in grouped.items():
        avg_occ = (values['occ_sum'] / values['occ_count']) if values['occ_count'] > 0 else 0
        final_data.append({
            'telda': telda,
            'occ': f"{round(avg_occ * 100, 2)}%",
            'idle': values['idle_sum'],
            'updated': values['latest_updated'].strftime("%Y-%m-%d %H:%M:%S") if values['latest_updated'] else ''
        })

    return final_data

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python extract_occ.py <file_path>")
        sys.exit(1)

    file_path = sys.argv[1]
    result = extract_occ_data(file_path)
    print(json.dumps(result, indent=2))
