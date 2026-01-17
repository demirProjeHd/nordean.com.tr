@extends('admin.layouts.app')

@section('title', 'Sayfa İçerikleri')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sayfa İçerikleri</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>Anahtar</th>
                    <th>Başlık (TR)</th>
                    <th>Başlık (EN)</th>
                    <th class="w-1">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $page)
                <tr>
                    <td>
                        <span class="badge bg-blue-lt">{{ $page->key }}</span>
                    </td>
                    <td>{{ Str::limit($page->title_tr ?? '-', 50) }}</td>
                    <td>{{ Str::limit($page->title_en ?? '-', 50) }}</td>
                    <td>
                        <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-sm btn-primary">
                            Düzenle
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Hiç içerik bulunamadı.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


