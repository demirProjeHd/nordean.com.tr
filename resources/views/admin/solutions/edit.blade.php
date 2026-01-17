@extends('admin.layouts.app')

@section('title', 'Çözüm Düzenle')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Çözüm Düzenle</h3>
    </div>
    <form action="{{ route('admin.solutions.update', $solution) }}" method="POST" enctype="multipart/form-data">
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
                        <label class="form-label">Başlık (Türkçe)</label>
                        <input type="text" name="title_tr" class="form-control" value="{{ old('title_tr', $solution->title_tr) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Başlık (İngilizce)</label>
                        <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $solution->title_en) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Açıklama (Türkçe)</label>
                        <textarea name="description_tr" class="form-control" rows="5">{{ old('description_tr', $solution->description_tr) }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Açıklama (İngilizce)</label>
                        <textarea name="description_en" class="form-control" rows="5">{{ old('description_en', $solution->description_en) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">İkon (SVG Path)</label>
                        @if($solution->icon)
                        <div class="mb-2">
                            <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <svg style="width: 48px; height: 48px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    {!! $solution->icon !!}
                                </svg>
                            </div>
                        </div>
                        @endif
                        <textarea name="icon" class="form-control" rows="3">{{ old('icon', $solution->icon) }}</textarea>
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
                        @if($solution->image)
                        <div class="mb-2">
                            <img src="{{ asset($solution->image) }}" alt="" style="max-height: 100px;">
                        </div>
                        @endif
                        <input type="file" name="image" class="form-control">
                        <small class="form-hint">Upload new image to replace current one</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Sıra</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $solution->order) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" name="is_active" class="form-check-input" {{ $solution->is_active ? 'checked' : '' }}>
                            <span class="form-check-label">Aktif</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('admin.solutions.index') }}" class="btn btn-link">İptal</a>
            <button type="submit" class="btn btn-primary">Çözüm Güncelle</button>
        </div>
    </form>
</div>
@endsection
