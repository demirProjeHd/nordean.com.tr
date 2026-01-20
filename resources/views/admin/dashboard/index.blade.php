@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Statistics Cards -->
<div class="row row-deck row-cards mb-4">
    <!-- Sliders -->
    <div class="col-sm-6 col-md-4 col-lg-2">
        <div class="card stats-card stats-card-compact">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="stats-icon-large primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /></svg>
                    </div>
                    <div class="text-end">
                        <div class="stats-value-compact">{{ $stats['sliders'] }}</div>
                    </div>
                </div>
                <div class="stats-label-compact">Slaytlar</div>
                <a href="{{ route('admin.sliders.index') }}" class="stats-link-compact">Yönet →</a>
            </div>
        </div>
    </div>

    <!-- Products -->
    <div class="col-sm-6 col-md-4 col-lg-2">
        <div class="card stats-card stats-card-compact">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="stats-icon-large success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /></svg>
                    </div>
                    <div class="text-end">
                        <div class="stats-value-compact">{{ $stats['products'] }}</div>
                    </div>
                </div>
                <div class="stats-label-compact">Ürünler</div>
                <a href="{{ route('admin.products.index') }}" class="stats-link-compact">Yönet →</a>
            </div>
        </div>
    </div>

    <!-- Solutions -->
    <div class="col-sm-6 col-md-4 col-lg-2">
        <div class="card stats-card stats-card-compact">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="stats-icon-large warning">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12h1m8 -9v1m8 8h1m-15.4 -6.4l.7 .7m12.1 -.7l-.7 .7" /><path d="M9 16a5 5 0 1 1 6 0a3.5 3.5 0 0 0 -1 3a2 2 0 0 1 -4 0a3.5 3.5 0 0 0 -1 -3" /><path d="M9.7 17l4.6 0" /></svg>
                    </div>
                    <div class="text-end">
                        <div class="stats-value-compact">{{ $stats['solutions'] }}</div>
                    </div>
                </div>
                <div class="stats-label-compact">Çözümler</div>
                <a href="{{ route('admin.solutions.index') }}" class="stats-link-compact">Yönet →</a>
            </div>
        </div>
    </div>

    <!-- References -->
    <div class="col-sm-6 col-md-4 col-lg-2">
        <div class="card stats-card stats-card-compact">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="stats-icon-large info">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg>
                    </div>
                    <div class="text-end">
                        <div class="stats-value-compact">{{ $stats['references'] }}</div>
                    </div>
                </div>
                <div class="stats-label-compact">Referanslar</div>
                <a href="{{ route('admin.references.index') }}" class="stats-link-compact">Yönet →</a>
            </div>
        </div>
    </div>

    <!-- Total Messages -->
    <div class="col-sm-6 col-md-4 col-lg-2">
        <div class="card stats-card stats-card-compact">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="stats-icon-large primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                    </div>
                    <div class="text-end">
                        <div class="stats-value-compact">{{ $stats['total_messages'] }}</div>
                    </div>
                </div>
                <div class="stats-label-compact">Mesajlar</div>
                <a href="{{ route('admin.messages.index') }}" class="stats-link-compact">Tümü →</a>
            </div>
        </div>
    </div>

    <!-- Unread Messages -->
    <div class="col-sm-6 col-md-4 col-lg-2">
        <div class="card stats-card stats-card-compact">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="stats-icon-large {{ $stats['unread_messages'] > 0 ? 'warning' : 'success' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                    </div>
                    <div class="text-end">
                        <div class="stats-value-compact {{ $stats['unread_messages'] > 0 ? 'text-warning' : '' }}">{{ $stats['unread_messages'] }}</div>
                    </div>
                </div>
                <div class="stats-label-compact">Okunmamış</div>
                <a href="{{ route('admin.messages.index') }}" class="stats-link-compact">Oku →</a>
            </div>
        </div>
    </div>
</div>

<!-- Visitor Map, Recent Messages & Quick Actions -->
<div class="row mb-4">
    <!-- Visitor Map (50% width) -->
    <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="card h-100">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="card-title mb-1">Ziyaretçi Haritası</h3>
                        <div class="text-muted small">Son 15 Gün - Toplam Ziyaretçi: <strong class="text-primary">{{ $stats['total_visitors'] }}</strong></div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <canvas id="visitor-map" style="height: 400px;"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Messages (25% width) -->
    <div class="col-lg-3 mb-4 mb-lg-0">
        @if($recentMessages->count() > 0)
        <div class="card h-100">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="card-title mb-0">Son Mesajlar</h3>
                </div>
            </div>
            <div class="card-body p-0" style="max-height: 400px; overflow-y: auto;">
                <div class="list-group list-group-flush">
                    @foreach($recentMessages as $message)
                    <a href="{{ route('admin.messages.show', $message->id) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-start gap-2">
                            <span class="avatar avatar-sm avatar-rounded flex-shrink-0" style="background: var(--primary); color: var(--primary-foreground);">
                                {{ strtoupper(substr($message->name, 0, 2)) }}
                            </span>
                            <div class="flex-fill" style="min-width: 0;">
                                <div class="d-flex align-items-center gap-1 mb-1">
                                    <div class="fw-semibold text-truncate small">{{ $message->name }}</div>
                                    @if(!$message->read)
                                        <span class="badge bg-danger badge-sm">Yeni</span>
                                    @endif
                                </div>
                                <div class="small text-muted mb-1 fw-medium" style="font-size: 0.75rem;">{{ Str::limit($message->subject, 22) }}</div>
                                <div class="small text-muted text-truncate" style="font-size: 0.7rem;">
                                    {{ Str::limit($message->message, 35) }}
                                </div>
                                <div class="small text-muted mt-1" style="font-size: 0.65rem;">
                                    {{ $message->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="card-footer text-center py-2">
                <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-primary w-100">
                    Tümünü Gör
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right ms-1" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M13 18l6 -6" /><path d="M13 6l6 6" /></svg>
                </a>
            </div>
        </div>
        @else
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title mb-0">Son Mesajlar</h3>
            </div>
            <div class="card-body d-flex align-items-center justify-content-center text-center py-5">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-opened mb-3" width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="color: var(--muted-foreground);"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 9l9 6l9 -6l-9 -6l-9 6" /><path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" /><path d="M3 19l6 -6" /><path d="M15 13l6 6" /></svg>
                    <p class="text-muted mb-0 small">Henüz mesaj bulunmuyor.</p>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Quick Actions (25% width) -->
    <div class="col-lg-3">
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title mb-0">Hızlı Erişim</h3>
            </div>
            <div class="card-body p-2">
                <div class="d-flex flex-column gap-2">
                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-outline-primary d-flex align-items-center gap-2 justify-content-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /></svg>
                        <span class="fw-semibold">Yeni Slayt</span>
                    </a>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-outline-primary d-flex align-items-center gap-2 justify-content-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /></svg>
                        <span class="fw-semibold">Yeni Ürün</span>
                    </a>
                    <a href="{{ route('admin.solutions.create') }}" class="btn btn-outline-primary d-flex align-items-center gap-2 justify-content-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12h1m8 -9v1m8 8h1m-15.4 -6.4l.7 .7m12.1 -.7l-.7 .7" /><path d="M9 16a5 5 0 1 1 6 0a3.5 3.5 0 0 0 -1 3a2 2 0 0 1 -4 0a3.5 3.5 0 0 0 -1 -3" /><path d="M9.7 17l4.6 0" /></svg>
                        <span class="fw-semibold">Yeni Çözüm</span>
                    </a>
                    <a href="{{ route('admin.references.create') }}" class="btn btn-outline-primary d-flex align-items-center gap-2 justify-content-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg>
                        <span class="fw-semibold">Yeni Referans</span>
                    </a>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary d-flex align-items-center gap-2 justify-content-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4h6v6h-6z" /><path d="M14 4h6v6h-6z" /><path d="M4 14h6v6h-6z" /><path d="M14 14h6v6h-6z" /></svg>
                        <span class="fw-semibold">Yeni Kategori</span>
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2 justify-content-start mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
                        <span class="fw-semibold">Ayarlar</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-chart-geo@4.2.6/build/index.umd.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Loading visitor map...');

    // Fetch both visitor data and topology with ISO codes
    Promise.all([
        fetch('{{ route('admin.dashboard.visitor-map') }}').then(r => r.json()),
        fetch('https://cdn.jsdelivr.net/npm/world-atlas@2/countries-110m.json').then(r => r.json())
    ])
    .then(([visitorData, topology]) => {
        console.log('Visitor data:', visitorData);
        console.log('Topology loaded');

        // Prepare countries from topology
        const countries = ChartGeo.topojson.feature(topology, topology.objects.countries).features;

        // Create ISO code mapping (id to ISO-2)
        const isoCodeMap = {
            '4': 'AF', '8': 'AL', '12': 'DZ', '20': 'AD', '24': 'AO', '28': 'AG', '32': 'AR', '51': 'AM',
            '36': 'AU', '40': 'AT', '31': 'AZ', '44': 'BS', '48': 'BH', '50': 'BD', '52': 'BB', '112': 'BY',
            '56': 'BE', '84': 'BZ', '204': 'BJ', '64': 'BT', '68': 'BO', '70': 'BA', '72': 'BW', '76': 'BR',
            '96': 'BN', '100': 'BG', '854': 'BF', '108': 'BI', '116': 'KH', '120': 'CM', '124': 'CA', '132': 'CV',
            '140': 'CF', '148': 'TD', '152': 'CL', '156': 'CN', '170': 'CO', '174': 'KM', '178': 'CG', '180': 'CD',
            '188': 'CR', '191': 'HR', '192': 'CU', '196': 'CY', '203': 'CZ', '208': 'DK', '262': 'DJ', '212': 'DM',
            '214': 'DO', '218': 'EC', '818': 'EG', '222': 'SV', '226': 'GQ', '232': 'ER', '233': 'EE', '231': 'ET',
            '242': 'FJ', '246': 'FI', '250': 'FR', '266': 'GA', '270': 'GM', '268': 'GE', '276': 'DE', '288': 'GH',
            '300': 'GR', '308': 'GD', '320': 'GT', '324': 'GN', '624': 'GW', '328': 'GY', '332': 'HT', '340': 'HN',
            '348': 'HU', '352': 'IS', '356': 'IN', '360': 'ID', '364': 'IR', '368': 'IQ', '372': 'IE', '376': 'IL',
            '380': 'IT', '388': 'JM', '392': 'JP', '400': 'JO', '398': 'KZ', '404': 'KE', '296': 'KI', '408': 'KP',
            '410': 'KR', '414': 'KW', '417': 'KG', '418': 'LA', '428': 'LV', '422': 'LB', '426': 'LS', '430': 'LR',
            '434': 'LY', '438': 'LI', '440': 'LT', '442': 'LU', '450': 'MG', '454': 'MW', '458': 'MY', '462': 'MV',
            '466': 'ML', '470': 'MT', '584': 'MH', '478': 'MR', '480': 'MU', '484': 'MX', '583': 'FM', '498': 'MD',
            '492': 'MC', '496': 'MN', '499': 'ME', '504': 'MA', '508': 'MZ', '104': 'MM', '516': 'NA', '520': 'NR',
            '524': 'NP', '528': 'NL', '554': 'NZ', '558': 'NI', '562': 'NE', '566': 'NG', '807': 'MK', '578': 'NO',
            '512': 'OM', '586': 'PK', '585': 'PW', '275': 'PS', '591': 'PA', '598': 'PG', '600': 'PY', '604': 'PE',
            '608': 'PH', '616': 'PL', '620': 'PT', '634': 'QA', '642': 'RO', '643': 'RU', '646': 'RW', '659': 'KN',
            '662': 'LC', '670': 'VC', '882': 'WS', '674': 'SM', '678': 'ST', '682': 'SA', '686': 'SN', '688': 'RS',
            '690': 'SC', '694': 'SL', '702': 'SG', '703': 'SK', '705': 'SI', '90': 'SB', '706': 'SO', '710': 'ZA',
            '728': 'SS', '724': 'ES', '144': 'LK', '729': 'SD', '740': 'SR', '748': 'SZ', '752': 'SE', '756': 'CH',
            '760': 'SY', '762': 'TJ', '834': 'TZ', '764': 'TH', '626': 'TL', '768': 'TG', '776': 'TO', '780': 'TT',
            '788': 'TN', '792': 'TR', '795': 'TM', '798': 'TV', '800': 'UG', '804': 'UA', '784': 'AE', '826': 'GB',
            '840': 'US', '858': 'UY', '860': 'UZ', '548': 'VU', '862': 'VE', '704': 'VN', '887': 'YE', '894': 'ZM',
            '716': 'ZW'
        };

        // Add ISO codes to features
        countries.forEach(country => {
            const isoCode = isoCodeMap[country.id];
            if (isoCode) {
                country.properties.iso_a2 = isoCode;
            }
        });

        // Create a map of country code to visitor count
        const visitorMap = {};
        let maxVisits = 0;

        visitorData.forEach(country => {
            // Store with both 2 and 3 letter codes for better matching
            visitorMap[country.country_code] = country.visits;
            if (country.visits > maxVisits) {
                maxVisits = country.visits;
            }
        });

        console.log('Visitor map:', visitorMap);
        console.log('Max visits:', maxVisits);

        // Match countries with visitor data
        const chartData = countries.map(country => {
            // Try multiple code formats
            const iso_a2 = country.properties.iso_a2;
            const iso_a3 = country.properties.iso_a3;
            const id = country.id;

            // Find matching visitor count
            let value = visitorMap[iso_a2] || visitorMap[iso_a3] || visitorMap[id] || 0;

            if (value > 0) {
                console.log('Match found:', country.properties.name, iso_a2, 'visits:', value);
            }

            return {
                feature: country,
                value: value
            };
        });

        console.log('Chart data prepared, countries with visits:', chartData.filter(d => d.value > 0).length);

        // Create the chart
        const ctx = document.getElementById('visitor-map').getContext('2d');
        new Chart(ctx, {
            type: 'choropleth',
            data: {
                labels: countries.map(d => d.properties.name),
                datasets: [{
                    label: 'Ziyaretçiler',
                    data: chartData,
                    backgroundColor: function(context) {
                        const value = context.raw?.value || 0;
                        if (value === 0) return '#e4e6eb';
                        const intensity = value / maxVisits;
                        // Gradient from light to dark purple
                        const r = Math.floor(102 + (197 - 102) * (1 - intensity));
                        const g = Math.floor(126 + (220 - 126) * (1 - intensity));
                        const b = Math.floor(234 + (249 - 234) * (1 - intensity));
                        return `rgb(${r}, ${g}, ${b})`;
                    },
                    borderColor: '#ffffff',
                    borderWidth: 0.5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                showOutline: true,
                showGraticule: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                return context[0].raw.feature.properties.name;
                            },
                            label: function(context) {
                                const code = context.raw.feature.properties.iso_a2;
                                const visits = visitorMap[code] || 0;
                                return 'Ziyaretçi: ' + visits;
                            }
                        }
                    }
                },
                scales: {
                    projection: {
                        axis: 'x',
                        projection: 'equalEarth'
                    }
                }
            }
        });

        console.log('Map initialized successfully');
    })
    .catch(error => {
        console.error('Failed to load visitor map:', error);
        document.getElementById('visitor-map').innerHTML = '<div class="alert alert-warning">Harita yüklenemedi: ' + error.message + '</div>';
    });
});
</script>
@endpush
