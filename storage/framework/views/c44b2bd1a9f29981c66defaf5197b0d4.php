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

    <?php $__currentLoopData = $topMovies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($movie->id); ?></td>
        <td><?php echo e($movie->title); ?></td>
        <td><?php echo e(number_format($movie->avg_rating,2)); ?></td>
        <td><?php echo e($movie->total_ratings); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>

</body>
</html><?php /**PATH D:\laravel\giaodien ain\resources\views/ratings/top10.blade.php ENDPATH**/ ?>