@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Statistics Cards -->
<div class="row row-deck row-cards mb-3">
    <!-- Sliders -->
    <div class="col-sm-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Slaytlar</div>
                </div>
                <div class="h1 mb-3">{{ $stats['sliders'] }}</div>
                <div class="d-flex mb-2">
                    <div class="ms-auto">
                        <a href="{{ route('admin.sliders.index') }}" class="text-decoration-none">
                            Yönet →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->
    <div class="col-sm-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Ürünler</div>
                </div>
                <div class="h1 mb-3">{{ $stats['products'] }}</div>
                <div class="d-flex mb-2">
                    <div class="ms-auto">
                        <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
                            Yönet →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Solutions -->
    <div class="col-sm-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Çözümler</div>
                </div>
                <div class="h1 mb-3">{{ $stats['solutions'] }}</div>
                <div class="d-flex mb-2">
                    <div class="ms-auto">
                        <a href="{{ route('admin.solutions.index') }}" class="text-decoration-none">
                            Yönet →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- References -->
    <div class="col-sm-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Referanslar</div>
                </div>
                <div class="h1 mb-3">{{ $stats['references'] }}</div>
                <div class="d-flex mb-2">
                    <div class="ms-auto">
                        <a href="{{ route('admin.references.index') }}" class="text-decoration-none">
                            Yönet →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Messages -->
    <div class="col-sm-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Toplam Mesaj</div>
                </div>
                <div class="h1 mb-3">{{ $stats['total_messages'] }}</div>
                <div class="d-flex mb-2">
                    <div class="ms-auto">
                        <a href="{{ route('admin.messages.index') }}" class="text-decoration-none">
                            Tümünü Gör →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Unread Messages -->
    <div class="col-sm-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Okunmamış Mesaj</div>
                </div>
                <div class="h1 mb-3">
                    <span class="{{ $stats['unread_messages'] > 0 ? 'text-red' : '' }}">
                        {{ $stats['unread_messages'] }}
                    </span>
                </div>
                <div class="d-flex mb-2">
                    <div class="ms-auto">
                        <a href="{{ route('admin.messages.index') }}" class="text-decoration-none">
                            Oku →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Visitor Map -->
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ziyaretçi Haritası (Son 15 Gün)</h3>
                <div class="card-subtitle">Toplam Ziyaretçi: <strong>{{ $stats['total_visitors'] }}</strong></div>
            </div>
            <div class="card-body">
                <canvas id="visitor-map" style="height: 400px;"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Recent Messages -->
@if($recentMessages->count() > 0)
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Son Mesajlar</h3>
            </div>
            <div class="list-group list-group-flush">
                @foreach($recentMessages as $message)
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="avatar">{{ substr($message->name, 0, 2) }}</span>
                        </div>
                        <div class="col text-truncate">
                            <a href="{{ route('admin.messages.show', $message->id) }}" class="text-body d-block">
                                <strong>{{ $message->name }}</strong>
                                @if(!$message->read)
                                    <span class="badge bg-red ms-2">Yeni</span>
                                @endif
                            </a>
                            <div class="text-muted text-truncate mt-n1">
                                {{ $message->subject }} - {{ Str::limit($message->message, 60) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="text-muted">{{ $message->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-primary">
                    Tüm Mesajları Gör
                </a>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <p class="text-muted">Henüz mesaj bulunmuyor.</p>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Quick Actions -->
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hızlı Erişim</h3>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-6 col-md-3">
                        <a href="{{ route('admin.sliders.create') }}" class="btn btn-outline-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            Yeni Slayt
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-outline-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            Yeni Ürün
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="{{ route('admin.solutions.create') }}" class="btn btn-outline-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            Yeni Çözüm
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="{{ route('admin.references.create') }}" class="btn btn-outline-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            Yeni Referans
                        </a>
                    </div>
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
