@extends('admin.layouts.app')

@section('title', 'Kategori Düzenle')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Kategori Düzenle</h3>
    </div>
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
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

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">İsim (Türkçe)</label>
                        <input type="text" name="name_tr" class="form-control" value="{{ old('name_tr', $category->name_tr) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">İsim (İngilizce)</label>
                        <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $category->name_en) }}" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">İkon (SVG Path)</label>
                @if($category->icon)
                <div class="mb-2">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <svg style="width: 48px; height: 48px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            {!! $category->icon !!}
                        </svg>
                    </div>
                </div>
                @endif
                <textarea name="icon" class="form-control" rows="3">{{ old('icon', $category->icon) }}</textarea>
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
                        <input type="number" name="order" class="form-control" value="{{ old('order', $category->order) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" name="is_active" class="form-check-input" {{ $category->is_active ? 'checked' : '' }}>
                            <span class="form-check-label">Aktif</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-link">İptal</a>
            <button type="submit" class="btn btn-primary">Kategori Güncelle</button>
        </div>
    </form>
</div>
@endsection
