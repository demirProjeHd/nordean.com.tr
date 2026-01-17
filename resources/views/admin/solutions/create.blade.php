@extends('admin.layouts.app')

@section('title', 'Çözüm Ekle')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Yeni Çözüm Oluştur</h3>
    </div>
    <form action="{{ route('admin.solutions.store') }}" method="POST" enctype="multipart/form-data">
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

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Başlık (Türkçe)</label>
                        <input type="text" name="title_tr" class="form-control" value="{{ old('title_tr') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Başlık (İngilizce)</label>
                        <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Açıklama (Türkçe)</label>
                        <textarea name="description_tr" class="form-control" rows="5">{{ old('description_tr') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Açıklama (İngilizce)</label>
                        <textarea name="description_en" class="form-control" rows="5">{{ old('description_en') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">İkon (SVG Path)</label>
                        <textarea name="icon" class="form-control" rows="3">{{ old('icon') }}</textarea>
                        <small class="form-hint">
                            SVG path kodunu buraya yapıştırın. İkonlar için:
                            <a href="https://heroicons.com/" target="_blank" rel="noopener">Heroicons</a>
                            (Outline seçin, ikona tıklayın, sadece &lt;path&gt; etiketini kopyalayın)
                        </small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Ana Resim</label>
                        <input type="file" name="image" class="form-control">
                        <small class="form-hint">Upload solution main image</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Sıra</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" name="is_active" class="form-check-input" checked>
                            <span class="form-check-label">Aktif</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('admin.solutions.index') }}" class="btn btn-link">İptal</a>
            <button type="submit" class="btn btn-primary">Çözüm Oluştur</button>
        </div>
    </form>
</div>
@endsection
