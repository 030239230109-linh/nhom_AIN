<x-laptop-layout title="Laptop Store">

    <!-- SORT -->
    <a href="?sort=asc">Giá tăng dần</a>
    <a href="?sort=desc">Giá giảm dần</a>

    <hr>

    <div class="list-laptop">
        @foreach($laptops as $sp)
            <div class="laptop">
            <img src="{{ asset('storage/'.$sp->hinh_anh) }}">            
    <h4>{{ $sp->tieu_de }}</h4>

                <p style="color:red">
                    {{ number_format($sp->gia) }} VND
                </p>
            </div>
        @endforeach
    </div>

</x-laptop-layout>