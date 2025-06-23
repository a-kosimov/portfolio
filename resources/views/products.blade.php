@extends('layouts.app')

@section('title', 'Продукция — Нефтепродукттехника')

@section('content')
    <h1 class="mb-4">Каталог продукции</h1>

    <div class="mb-4">
        <input type="text" id="product-search" class="form-control" placeholder="Search products...">
    </div>

    {{-- Контейнер для продуктов --}}
    <div id="product-wrapper">
        {{-- По умолчанию: серверная пагинация --}}
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($product->description, 100) }}</p>
                            @if($product->price)
                                <p class="card-text fw-bold">Цена: {{ number_format($product->price, 2, ',', ' ') }} ₽</p>
                            @endif
                            <a href="#" class="btn btn-primary mt-auto">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Пагинация --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('product-search');
            const wrapper = document.getElementById('product-wrapper');
            let originalHTML = wrapper.innerHTML;

            input.addEventListener('input', async function () {
                const term = this.value.trim();

                if (term === '') {
                    wrapper.innerHTML = originalHTML;
                    return;
                }

                try {
                    const res = await fetch(`/products/search?term=${encodeURIComponent(term)}`);
                    const products = await res.json();

                    if (products.length === 0) {
                        wrapper.innerHTML = '<p class="text-muted">No products found.</p>';
                        return;
                    }

                    // Собираем HTML карточек
                    let html = '<div class="row row-cols-1 row-cols-md-3 g-4">';
                    products.forEach(product => {
                        const image = product.image.startsWith('http') ? product.image : '/' + product.image;
                        html += `
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <img src="${image}" class="card-img-top" alt="${product.name}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">${product.name}</h5>
                                    <p class="card-text flex-grow-1">${product.description.substring(0, 100)}...</p>
                                    ${product.price ? `<p class="card-text fw-bold">Цена: ${parseFloat(product.price).toLocaleString()} ₽</p>` : ''}
                                    <a href="#" class="btn btn-primary mt-auto">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    `;
                    });
                    html += '</div>';
                    wrapper.innerHTML = html;
                } catch (e) {
                    wrapper.innerHTML = '<p class="text-danger">Ошибка при загрузке результатов.</p>';
                }
            });
        });
    </script>
@endpush
