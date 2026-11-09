@props([
    'number',
    'title',
    'description',
    'href' => '#',
    'badge' => null,
    'locked' => false,
])

@if ($locked)
    <div class="menu-card is-locked">
        <span class="menu-number">{{ $number }}</span>
        <span class="menu-body">
            <span class="menu-title">{{ $title }}</span>
            <span class="menu-desc">{{ $description }}</span>
            @if ($badge)
                <span class="menu-badge">{{ $badge }}</span>
            @endif
            <span class="menu-locked-note">Hanya dapat dibuka oleh petugas.</span>
        </span>
    </div>
@else
    <a href="{{ $href }}" class="menu-card">
        <span class="menu-number">{{ $number }}</span>
        <span class="menu-body">
            <span class="menu-title">{{ $title }}</span>
            <span class="menu-desc">{{ $description }}</span>
            @if ($badge)
                <span class="menu-badge">{{ $badge }}</span>
            @endif
        </span>
        <span class="menu-arrow" aria-hidden="true">&rarr;</span>
    </a>
@endif
