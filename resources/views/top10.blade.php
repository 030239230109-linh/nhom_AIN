<!-- Tìm đoạn GRID hiển thị phim trong file top10.blade.php của bạn và thay bằng đoạn này -->
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6">
    @foreach($popularMovies as $movie)
        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden shadow-2xl flex flex-col justify-between">
            
            <!-- Khung ảnh Poster -->
            <div class="aspect-[2/3] bg-gray-800 relative overflow-hidden flex items-center justify-center">
                <div class="absolute top-3 right-3 bg-yellow-500 text-gray-950 text-xs px-2 py-1 rounded-md font-black shadow-md">
                    ★ {{ $movie['score'] }}
                </div>
                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?w=500" class="w-full h-full object-cover" alt="{{ $movie['title'] }}">
            </div>
            
            <!-- Thông tin chi tiết phim -->
            <div class="p-4 space-y-2">
                <h3 class="font-bold text-sm text-gray-100 truncate">
                    {{ $movie['title'] }}
                </h3>
                <div class="flex justify-between items-center text-[11px] text-gray-400">
                    <span class="text-gray-500">ID: {{ $movie['id'] }}</span>
                    <span class="bg-gray-800 px-1.5 py-0.5 rounded text-gray-300">AI Score</span>
                </div>
            </div>

        </div>
    @endforeach
</div>