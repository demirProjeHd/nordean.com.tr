@extends('admin.layouts.app')

@section('title', 'Ürünler')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tüm Ürünler</h3>
        <div class="card-actions">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                Ürün Ekle
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>Sıra</th>
                    <th>Resim</th>
                    <th>İsim (TR)</th>
                    <th>Kategori</th>
                    <th>Kısa Açıklama (TR)</th>
                    <th>Durum</th>
                    <th class="w-1">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->order }}</td>
                    <td>
                        @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="" style="max-height: 50px;">
                        @endif
                    </td>
                    <td>{{ Str::limit($product->name_tr, 40) }}</td>
                    <td>
                        @if($product->category)
                        <span class="badge bg-azure-lt">{{ $product->category->name_tr }}</span>
                        @endif
                    </td>
                    <td>{{ Str::limit($product->short_description_tr, 50) }}</td>
                    <td>
                        <span class="badge {{ $product->is_active ? 'bg-green' : 'bg-red' }}">
                            {{ $product->is_active ? 'Aktif' : 'Pasif' }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-list flex-nowrap">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm">Düzenle</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Emin misiniz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Hiç ürün bulunamadı.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
