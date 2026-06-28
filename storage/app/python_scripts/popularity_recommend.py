# storage/app/python_scripts/popularity_recommend.py
import os
import pandas as pd
import json

# Xác định đường dẫn file
current_dir = os.path.dirname(os.path.abspath(__file__))
csv_path = os.path.join(current_dir, 'top_popular_movies.csv')

try:
    # Đọc dữ liệu top phim
   # Tìm dòng này và sửa lại thành:
    df = pd.read_csv(csv_path).head(10)
    
    # Chuyển thành danh sách dictionary để xuất JSON
    movies_list = []
    for index, row in df.iterrows():
        movies_list.append({
            'rank': index + 1,
            'tmdbId': int(row['tmdbId']),
            'title': row['title'],
            'avg_rating': float(round(row['avg_rating'], 2)),
            'rating_count': int(row['rating_count']),
            'score': float(round(row['score'], 4))
        })
        
    print(json.dumps({"status": "success", "data": movies_list}))

except Exception as e:
    print(json.dumps({"status": "error", "message": str(e)}))