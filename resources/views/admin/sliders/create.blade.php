@extends('admin.layouts.app')

@section('title', 'Slayt Ekle')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Yeni Slayt Oluştur</h3>
    </div>
    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="mb-3">
                <label class="form-label required">Arka Plan Resmi</label>
                <input type="file" name="background_image" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Başlık (Türkçe)</label>
                <input type="text" name="title_tr" class="form-control" value="{{ old('title_tr') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Başlık (İngilizce)</label>
                <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Alt Başlık (Türkçe)</label>
                <textarea name="subtitle_tr" class="form-control" rows="3">{{ old('subtitle_tr') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Alt Başlık (İngilizce)</label>
                <textarea name="subtitle_en" class="form-control" rows="3">{{ old('subtitle_en') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Sıra</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
            </div>
            <div class="mb-3">
                <label class="form-check">
                    <input type="checkbox" name="is_active" class="form-check-input" checked>
                    <span class="form-check-label">Aktif</span>
                </label>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-link">İptal</a>
            <button type="submit" class="btn btn-primary">Slayt Oluştur</button>
        </div>
    </form>
</div>
@endsection


