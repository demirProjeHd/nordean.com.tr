@extends('admin.layouts.app')

@section('title', 'Slaytlar')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tüm Slaytlar</h3>
        <div class="card-actions">
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                Slayt Ekle
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>Sıra</th>
                    <th>Resim</th>
                    <th>Başlık (TR)</th>
                    <th>Alt Başlık (TR)</th>
                    <th>Durum</th>
                    <th class="w-1">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sliders as $slider)
                <tr>
                    <td>
                        <input type="number"
                               class="form-control form-control-sm order-input"
                               style="width: 70px;"
                               value="{{ $slider->order }}"
                               data-slider-id="{{ $slider->id }}"
                               min="0">
                    </td>
                    <td>
                        <img src="{{ asset($slider->background_image) }}" alt="" style="max-height: 50px;">
                    </td>
                    <td>{{ Str::limit($slider->title_tr, 50) }}</td>
                    <td>{{ Str::limit($slider->subtitle_tr, 50) }}</td>
                    <td>
                        <span class="badge {{ $slider->is_active ? 'bg-green' : 'bg-red' }}">
                            {{ $slider->is_active ? 'Aktif' : 'Pasif' }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-list flex-nowrap">
                            <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm">Düzenle</a>
                            <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" class="d-inline" onsubmit="return confirm('Emin misiniz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Hiç slayt bulunamadı.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const orderInputs = document.querySelectorAll('.order-input');
    let debounceTimer;

    orderInputs.forEach(input => {
        input.addEventListener('change', function() {
            const sliderId = this.getAttribute('data-slider-id');
            const newOrder = this.value;

            // Clear previous timer
            clearTimeout(debounceTimer);

            // Set new timer
            debounceTimer = setTimeout(() => {
                updateOrder(sliderId, newOrder, this);
            }, 300);
        });
    });

    function updateOrder(sliderId, order, inputElement) {
        fetch(`/admin/sliders/${sliderId}/update-order`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ order: order })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success feedback
                inputElement.classList.add('is-valid');
                setTimeout(() => {
                    inputElement.classList.remove('is-valid');
                }, 1000);
            } else {
                // Show error feedback
                inputElement.classList.add('is-invalid');
                setTimeout(() => {
                    inputElement.classList.remove('is-invalid');
                }, 2000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            inputElement.classList.add('is-invalid');
            setTimeout(() => {
                inputElement.classList.remove('is-invalid');
            }, 2000);
        });
    }
});
</script>
@endpush


