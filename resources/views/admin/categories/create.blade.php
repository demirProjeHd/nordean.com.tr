@extends('admin.layouts.app')

@section('title', 'Kategori Ekle')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Yeni Kategori Oluştur</h3>
    </div>
    <form action="{{ route('admin.categories.store') }}" method="POST">
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
                        <label class="form-label">İsim (Türkçe)</label>
                        <input type="text" name="name_tr" class="form-control" value="{{ old('name_tr') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">İsim (İngilizce)</label>
                        <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">İkon (SVG Path)</label>
                <textarea name="icon" class="form-control" rows="3">{{ old('icon') }}</textarea>
                <small class="form-hint">
                    SVG path kodunu buraya yapıştırın. İkonlar için:
                    <a href="https://heroicons.com/" target="_blank" rel="noopener">Heroicons</a>
                    (Outline seçin, ikona tıklayın, sadece &lt;path&gt; etiketini kopyalayın)
                </small>
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
            <a href="{{ route('admin.categories.index') }}" class="btn btn-link">İptal</a>
            <button type="submit" class="btn btn-primary">Kategori Oluştur</button>
        </div>
    </form>
</div>
@endsection
