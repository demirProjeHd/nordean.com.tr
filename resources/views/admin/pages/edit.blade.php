@extends('admin.layouts.app')

@section('title', 'Sayfa İçeriğini Düzenle')

@section('content')
<form action="{{ route('admin.pages.update', $content->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ ucfirst($content->key) }} İçeriğini Düzenle</h3>
            <div class="card-actions">
                <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
                    Geri Dön
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                <strong>Anahtar:</strong> <code>{{ $content->key }}</code>
            </div>

            <div class="mb-3">
                <label class="form-label">Başlık (Türkçe)</label>
                <input type="text"
                       class="form-control @error('title_tr') is-invalid @enderror"
                       name="title_tr"
                       value="{{ old('title_tr', $content->title_tr) }}">
                @error('title_tr')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Başlık (İngilizce)</label>
                <input type="text"
                       class="form-control @error('title_en') is-invalid @enderror"
                       name="title_en"
                       value="{{ old('title_en', $content->title_en) }}">
                @error('title_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">İçerik (Türkçe)</label>
                <textarea name="content_tr"
                          class="form-control @error('content_tr') is-invalid @enderror"
                          rows="6">{{ old('content_tr', $content->content_tr) }}</textarea>
                @error('content_tr')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">İçerik (İngilizce)</label>
                <textarea name="content_en"
                          class="form-control @error('content_en') is-invalid @enderror"
                          rows="6">{{ old('content_en', $content->content_en) }}</textarea>
                @error('content_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if($content->extra_data)
            <div class="alert alert-warning">
                <strong>Not:</strong> Bu içeriğin ekstra verileri var (extra_data). Bu alanı düzenlemek için veritabanından manuel işlem gerekir.
            </div>
            @endif
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg>
                Kaydet
            </button>
        </div>
    </div>
</form>
@endsection


