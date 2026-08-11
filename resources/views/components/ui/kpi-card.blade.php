@props([
    'title' => 'Metric',
    'icon' => 'fa-chart-line',
    'id' => 'kpi-val',
    'subId' => '',
    'subLabel' => '',
    'subColor' => 'text-primary'
])
<div class="col-6 col-md-4 col-lg-2">
    <div class="kpi-card">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <small class="text-muted fw-bold text-uppercase">{{ $title }}</small>
            <div class="kpi-icon"><i class="fas {{ $icon }}"></i></div>
        </div>
        <h3 class="fw-bold mb-0 text-dark" id="{{ $id }}">-</h3>
        @if($subId)
            <small class="text-muted">{{ $subLabel }}: <span id="{{ $subId }}" class="fw-bold {{ $subColor }}">-</span></small>
        @elseif($subLabel)
            <small class="text-muted">{{ $subLabel }}</small>
        @endif
    </div>
</div>
