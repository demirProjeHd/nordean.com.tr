@extends('admin.layouts.app')

@section('title', 'Slayt Düzenle')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Slayt Düzenle</h3>
    </div>
    <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                <label class="form-label">Mevcut Resim</label>
                <div class="mb-2">
                    <img src="{{ asset($slider->background_image) }}" alt="" style="max-height: 150px;">
                </div>
                <label class="form-label">Resim Değiştir</label>
                <input type="file" name="background_image" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Başlık (Türkçe)</label>
                <input type="text" name="title_tr" class="form-control" value="{{ old('title_tr', $slider->title_tr) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Başlık (İngilizce)</label>
                <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $slider->title_en) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Alt Başlık (Türkçe)</label>
                <textarea name="subtitle_tr" class="form-control" rows="3">{{ old('subtitle_tr', $slider->subtitle_tr) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Alt Başlık (İngilizce)</label>
                <textarea name="subtitle_en" class="form-control" rows="3">{{ old('subtitle_en', $slider->subtitle_en) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Sıra</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $slider->order) }}">
            </div>
            <div class="mb-3">
                <label class="form-check">
                    <input type="checkbox" name="is_active" class="form-check-input" {{ $slider->is_active ? 'checked' : '' }}>
                    <span class="form-check-label">Aktif</span>
                </label>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-link">İptal</a>
            <button type="submit" class="btn btn-primary">Slayt Güncelle</button>
        </div>
    </form>
</div>
@endsection


