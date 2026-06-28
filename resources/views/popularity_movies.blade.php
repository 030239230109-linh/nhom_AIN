<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Movie Recommender</title>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        /* Style cho phần Banner hiển thị ảnh thật từ storage */
        .hero-banner {
            background: linear-gradient(rgba(3, 37, 65, 0.8), rgba(3, 37, 65, 0.8)), 
                        url("{{ asset('storage/banner.jpg') }}");
            background-size: cover;
            background-position: center;
            color: white;
            padding: 70px 20px;
            text-align: center;
        }
        .search-box {
            max-width: 800px;
            margin: 20px auto 0 auto;
            position: relative;
        }
        .search-box input {
            border-radius: 30px;
            padding: 12px 25px;
            border: none;
            width: 100%;
            outline: none;
        }
        .search-box button {
            position: absolute;
            right: 5px;
            top: 5px;
            border-radius: 25px;
            background: linear-gradient(to right, #c0fecf, #1ed5a9);
            border: none;
            color: #032541;
            font-weight: bold;
            padding: 7px 25px;
        }
        /* Sidebar Top 10 bên trái */
        .sidebar-top10 {
            background-color: #1c1c1c;
            color: white;
            border-radius: 8px;
            padding: 15px 0;
        }
        .sidebar-top10 .list-group-item {
            background-color: transparent;
            color: #ccc;
            border: none;
            border-bottom: 1px solid #2d2d2d;
            padding: 12px 15px;
            font-size: 0.95rem;
        }
        .sidebar-top10 .list-group-item:hover {
            background-color: #2b2b2b;
            color: #1ed5a9;
        }
        
        /* 1. Tối ưu lại thẻ chứa phim */
        .movie-card {
            border: none;
            border-radius: 12px; /* Tăng độ bo tròn cho hiện đại */
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08); /* Đổ bóng mịn hơn */
            transition: all 0.3s ease;
            background: white;
            height: 100%;
        }
        .movie-card:hover {
            transform: translateY(-8px); /* Nhấc cao hơn một chút khi di chuột vào */
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        /* 2. Bo tròn góc ảnh poster khớp với khung hình */
        .movie-poster {
            width: 100%;
            height: 340px;
            object-fit: cover;
            background-color: #032541;
            border-radius: 12px 12px 0 0; /* Bo tròn góc trên của ảnh */
        }

        /* 3. Làm đẹp phần thông tin chữ và tăng tương phản tiêu đề */
        .movie-info {
            padding: 15px; /* Tăng không gian thở cho chữ */
        }
        .movie-title {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 1.05rem;
            font-weight: 700; /* Làm chữ đậm và rõ nét hơn */
            color: #032541;
            margin-top: 2px;
            margin-bottom: 8px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* 4. Làm nổi bật điểm số AI từ Colab */
        .ai-score-box {
            background-color: #f0f7f4;
            border-radius: 6px;
            padding: 6px;
            font-size: 0.85rem;
            color: #1ed5a9;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- 1. HEADER HERO BANNER -->
    <div class="hero-banner">
        <h1 class="fw-bold mb-2">Welcome.</h1>
        <h4 class="fw-normal text-white-50">Millions of movies, TV shows and people to discover. Explore now.</h4>
        
        <!-- Thanh Tìm Kiếm -->
        <div class="search-box">
            <form action="#" method="GET">
                <input type="text" placeholder="Nhập tên bộ phim yêu thích để tìm kiếm...">
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>
    </div>

    <!-- 2. MAIN LAYOUT (SIDEBAR TRÁI + GRID PHẢI) -->
    <div class="container-fluid px-4 py-4">
        <div class="row">
            
            <!-- THANH DỌC BÊN TRÁI: HIỂN THỊ TOP 10 PHIM PHỔ BIẾN -->
            <div class="col-md-3 mb-4">
                <div class="sidebar-top10 shadow">
                    <h5 class="px-3 mb-3 fw-bold text-uppercase" style="color: #1ed5a9;">
                        <i class="fa-solid fa-chart-line me-2"></i> Top 10 Xu Hướng
                    </h5>
                    <div class="list-group list-group-flush">
                        @forelse(collect($movies)->take(10) as $movie)
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                <span class="fw-bold text-warning me-3" style="width: 20px;">
                                    @if($movie['rank'] == 1)
                                        <i class="fa-solid fa-crown text-warning"></i>
                                    @else
                                        #{{ $movie['rank'] }}
                                    @endif
                                </span>
                                <div class="text-truncate">
                                    <div class="text-white fw-semibold text-truncate">{{ $movie['title'] }}</div>
                                    <small style="font-size: 0.8rem; color: #888;">
                                        <i class="fa-solid fa-star text-warning"></i> {{ $movie['avg_rating'] }}
                                    </small>
                                </div>
                            </a>
                        @empty
                            <div class="px-3 text-muted">Không có dữ liệu.</div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- GRID HIỂN THỊ CÁC BỘ PHIM PHỔ BIẾN BÊN PHẢI -->
            <div class="col-md-9">
                <h4 class="fw-bold mb-4 text-dark text-uppercase">
                    <i class="fa-solid fa-fire text-danger me-2"></i> Danh Sách Phim Phổ Biến
                </h4>
                
                @if(isset($error))
                    <div class="alert alert-danger shadow-sm">{{ $error }}</div>
                @endif

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    @forelse($movies as $movie)
                        <div class="col">
                            <div class="movie-card">
                                <!-- Ảnh Poster Phim -->
                                <img src="{{ asset('storage/' . $movie['tmdbId'] . '.jpg') }}" 
                                     class="movie-poster" 
                                     onerror="this.onerror=null; this.src='https://placehold.co/300x450/032541/ffffff?text={{ urlencode($movie['title']) }}';"
                                     alt="{{ $movie['title'] }}">
                                
                                <!-- Thông Tin Chi Tiết Phim -->
                                <div class="movie-info">
                                    <div class="movie-title" title="{{ $movie['title'] }}">{{ $movie['title'] }}</div>
                                    <div class="d-flex justify-content-between align-items-center mt-2 px-1">
                                        <span class="text-muted" style="font-size: 0.85rem;">
                                            <i class="fa-solid fa-users me-1"></i> {{ number_format($movie['rating_count']) }} lượt
                                        </span>
                                        <span class="badge bg-success px-2 py-1">
                                            <i class="fa-solid fa-star text-warning"></i> {{ $movie['avg_rating'] }}
                                        </span>
                                    </div>
                                    
                                    <!-- Phần hiển thị Điểm Gợi Ý đã được làm mới -->
                                    <div class="mt-3 pt-2 border-top text-center">
                                        <div class="ai-score-box">
                                            <i class="fa-solid fa-brain me-1 text-success"></i> AI Score: <span class="text-dark">{{ $movie['score'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5 text-muted">
                            Không có bộ phim nào để hiển thị.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

</body>
</html>