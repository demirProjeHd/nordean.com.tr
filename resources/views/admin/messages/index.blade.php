@extends('admin.layouts.app')

@section('title', 'İletişim Mesajları')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tüm İletişim Mesajları</h3>
    </div>
    <div class="card-body border-bottom py-3">
        <form method="GET" action="{{ route('admin.messages.index') }}">
            <div class="row g-2">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text"
                               class="form-control"
                               name="search"
                               placeholder="İsim, email, konu veya mesaj ara..."
                               value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                            Ara
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="status" onchange="this.form.submit()">
                        <option value="">Tüm Mesajlar</option>
                        <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Okunmamış</option>
                        <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Okunmuş</option>
                    </select>
                </div>
                @if(request('search') || request('status'))
                <div class="col-md-3">
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary w-100">
                        Filtreleri Temizle
                    </a>
                </div>
                @endif
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>Tarih</th>
                    <th>İsim</th>
                    <th>E-posta</th>
                    <th>Telefon</th>
                    <th>Mesaj</th>
                    <th>Durum</th>
                    <th class="w-1">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                <tr class="{{ !$message->read ? 'table-active' : '' }}">
                    <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->phone }}</td>
                    <td>{{ Str::limit($message->message, 50) }}</td>
                    <td>
                        <span class="badge {{ $message->read ? 'bg-green' : 'bg-yellow' }}">
                            {{ $message->read ? 'Okundu' : 'Okunmadı' }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-list flex-nowrap">
                            <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm">Görüntüle</a>
                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Emin misiniz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Hiç mesaj bulunamadı.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(method_exists($messages, 'links'))
    <div class="card-footer">
        {{ $messages->links() }}
    </div>
    @endif
</div>
@endsection
