@extends('admin.layouts.app')

@section('title', 'Ürün Düzenle')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ürün Düzenle</h3>
    </div>
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" onsubmit="console.log('Form submitting...', this); return true;">
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
                        <input type="text" name="name_tr" class="form-control" value="{{ old('name_tr', $product->name_tr) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">İsim (İngilizce)</label>
                        <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $product->name_en) }}" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Ürün Kategorisi</label>
                <select name="category_id" class="form-select" required>
                    <option value="">Kategori Seçin</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name_tr }} / {{ $category->name_en }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Kısa Açıklama (Türkçe)</label>
                        <textarea name="short_description_tr" class="form-control" rows="3">{{ old('short_description_tr', $product->short_description_tr) }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Kısa Açıklama (İngilizce)</label>
                        <textarea name="short_description_en" class="form-control" rows="3">{{ old('short_description_en', $product->short_description_en) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Açıklama (Türkçe)</label>
                        <textarea name="description_tr" class="form-control" rows="5">{{ old('description_tr', $product->description_tr) }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Açıklama (İngilizce)</label>
                        <textarea name="description_en" class="form-control" rows="5">{{ old('description_en', $product->description_en) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Uygulama Alanları (Türkçe)</label>
                        <textarea name="applications_tr" class="form-control" rows="4">{{ old('applications_tr', $product->applications_tr) }}</textarea>
                        <small class="form-hint">List of applications for this product</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Uygulama Alanları (İngilizce)</label>
                        <textarea name="applications_en" class="form-control" rows="4">{{ old('applications_en', $product->applications_en) }}</textarea>
                        <small class="form-hint">List of applications for this product</small>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Ana Resim</label>
                @if($product->image)
                <div class="mb-2">
                    <img src="{{ asset($product->image) }}" alt="" style="max-height: 100px;">
                </div>
                @endif
                <input type="file" name="image" class="form-control">
                <small class="form-hint">Upload new image to replace current one</small>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Teknik Dökümanlar (PDF)</label>

                        @if($product->pdfs && count($product->pdfs) > 0)
                        <div class="mb-2">
                            <div class="list-group list-group-flush">
                                @foreach($product->pdfs as $index => $pdf)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-red me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                                        <a href="{{ asset('storage/' . $pdf) }}" target="_blank" class="text-decoration-none">
                                            {{ basename($pdf) }}
                                        </a>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-ghost-danger" onclick="if(confirm('Bu PDF\'i silmek istediğinizden emin misiniz?')) { document.getElementById('delete-pdf-{{ $index }}').submit(); }">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    </button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <input type="file" name="pdfs[]" class="form-control" multiple accept=".pdf">
                        <small class="form-hint">Yeni PDF'ler ekleyebilirsiniz. Maksimum dosya boyutu: 5MB. Mevcut PDF'ler silinmez.</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Sıra</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $product->order) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" name="is_active" class="form-check-input" {{ $product->is_active ? 'checked' : '' }}>
                            <span class="form-check-label">Aktif</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('admin.products.index') }}" class="btn btn-link">İptal</a>
            <button type="submit" class="btn btn-primary">Ürün Güncelle</button>
        </div>
    </form>
</div>

@if($product->pdfs && count($product->pdfs) > 0)
    @foreach($product->pdfs as $index => $pdf)
    <form id="delete-pdf-{{ $index }}" action="{{ route('admin.products.delete-pdf', [$product->id, $index]) }}" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
    @endforeach
@endif

@endsection
