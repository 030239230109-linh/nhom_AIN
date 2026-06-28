<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PopularityMovieController extends Controller
{
    public function index()
    {
        $scriptPath = storage_path('app/python_scripts/popularity_recommend.py');
        
        // Chạy script Python để lấy dữ liệu BXH
        $output = shell_exec("python " . $scriptPath);
        $result = json_decode($output, true);

        if ($result && isset($result['status']) && $result['status'] === 'success') {
            return view('popularity_movies', ['movies' => $result['data']]);
        } else {
            $errorMsg = $result['message'] ?? 'Không thể tải danh sách phim phổ biến. Chi tiết lỗi hệ thống: ' . $output;
            return view('popularity_movies', ['error' => $errorMsg, 'movies' => []]);
        }
    }
}