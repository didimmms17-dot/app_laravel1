<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'name',
    'size' => 18,
    'class' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'name',
    'size' => 18,
    'class' => '',
]); ?>
<?php foreach (array_filter(([
    'name',
    'size' => 18,
    'class' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $attrs = [
        'width' => $size,
        'height' => $size,
        'viewBox' => '0 0 24 24',
        'fill' => 'none',
        'stroke' => 'currentColor',
        'stroke-width' => '2',
        'stroke-linecap' => 'round',
        'stroke-linejoin' => 'round',
        'class' => trim('icon ' . $class),
        'aria-hidden' => 'true',
        'focusable' => 'false',
    ];
?>

<?php switch($name):
    case ('home'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M3 9l9-7 9 7"/><path d="M9 22V12h6v10"/></svg>
        <?php break; ?>
    <?php case ('book'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5z"/></svg>
        <?php break; ?>
    <?php case ('book-open'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M2 3h6a4 4 0 0 1 4 4v14H6a4 4 0 0 0-4 4z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14h6a4 4 0 0 1 4 4z"/></svg>
        <?php break; ?>
    <?php case ('grid'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        <?php break; ?>
    <?php case ('search'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        <?php break; ?>
    <?php case ('sliders'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
        <?php break; ?>
    <?php case ('star'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        <?php break; ?>
    <?php case ('user'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><circle cx="12" cy="7" r="4"/><path d="M5.5 21a7.5 7.5 0 0 1 13 0"/></svg>
        <?php break; ?>
    <?php case ('calendar'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        <?php break; ?>
    <?php case ('check-circle'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="M22 4L12 14.01l-3-3"/></svg>
        <?php break; ?>
    <?php case ('x-circle'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
        <?php break; ?>
    <?php case ('rotate-cw'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><polyline points="23 4 23 10 17 10"/><path d="M20.49 15A9 9 0 1 1 23 10"/></svg>
        <?php break; ?>
    <?php case ('inbox'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg>
        <?php break; ?>
    <?php case ('heart'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"/></svg>
        <?php break; ?>
    <?php case ('eye'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
        <?php break; ?>
    <?php case ('tag'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M20.59 13.41 11 3.83A2 2 0 0 0 9.59 3H4a2 2 0 0 0-2 2v5.59A2 2 0 0 0 2.83 12l9.59 9.59a2 2 0 0 0 2.83 0l5.34-5.34a2 2 0 0 0 0-2.83z"/><circle cx="7.5" cy="7.5" r="1.5"/></svg>
        <?php break; ?>
    <?php case ('info'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
        <?php break; ?>
    <?php case ('lock'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        <?php break; ?>
    <?php case ('message-circle'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5A8.48 8.48 0 0 1 21 11v.5z"/></svg>
        <?php break; ?>
    <?php case ('clipboard'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M9 2h6a2 2 0 0 1 2 2v2H7V4a2 2 0 0 1 2-2z"/><rect x="7" y="6" width="10" height="14" rx="2" ry="2"/></svg>
        <?php break; ?>
    <?php case ('mail'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M4 4h16v16H4z"/><path d="M22 6l-10 7L2 6"/></svg>
        <?php break; ?>
    <?php case ('phone'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.35 12.35 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.35 12.35 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <?php break; ?>
    <?php case ('map-pin'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        <?php break; ?>
    <?php case ('bell'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        <?php break; ?>
    <?php case ('arrow-right'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        <?php break; ?>
    <?php case ('smile'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
        <?php break; ?>
    <?php case ('alert-triangle'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        <?php break; ?>
    <?php case ('menu'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        <?php break; ?>
    <?php case ('file-text'): ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><line x1="10" y1="9" x2="8" y2="9"/></svg>
        <?php break; ?>
    <?php default: ?>
        <svg <?php echo e($attributes->merge($attrs)); ?>><circle cx="12" cy="12" r="10"/></svg>
<?php endswitch; ?>
<?php /**PATH C:\htdocs\app_laravel1\resources\views/components/icon.blade.php ENDPATH**/ ?>