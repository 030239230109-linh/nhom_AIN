<!DOCTYPE html>
<html>
<head>
    <title>Top 10 Movies</title>
</head>
<body>

<h2>Top 10 phim rating cao nhất</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên phim</th>
        <th>Rating TB</th>
        <th>Số lượt đánh giá</th>
    </tr>

    @foreach($topMovies as $movie)
    <tr>
        <td>{{ $movie->id }}</td>
        <td>{{ $movie->title }}</td>
        <td>{{ number_format($movie->avg_rating,2) }}</td>
        <td>{{ $movie->total_ratings }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>