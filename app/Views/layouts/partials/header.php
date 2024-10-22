<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{{ .Page.Params.description | default .Site.Params.description | markdownify }}">
<meta name="author" content="{{ .Site.Params.authors }}">
<meta name="generator" content="Hugo {{ hugo.Version }}">

<link rel="canonical" href="{{ .Permalink }}">


<meta name="robots" content="{{ . }}">

<?php require_once(__DIR__ . '/stylesheet.php') ?>
<?php require_once(__DIR__ . '/favicons.php') ?>
<?php require_once(__DIR__ . '/social.php') ?>
<?php require_once(__DIR__ . '/analytics.php') ?>


<script>
    function applyLightModeStyles() {
    $('.select2-container--default .select2-selection--multiple').attr('style', 
        'background-color: #f9fafb !important; border-color: #d1d5db !important; color: #111827 !important; font-size: 0.875rem !important; border-radius: 0.5rem !important; padding: 0.625rem !important; width: 100% !important; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5) !important;');
}

    // Fonction pour appliquer les styles en mode sombre
    function applyDarkModeStyles() {
        $('.select2-container--default .select2-selection--multiple').attr('style', 
            'background-color: #374151 !important; border-color: #4b5563 !important; color: #f9fafb !important; font-size: 0.875rem !important; border-radius: 0.5rem !important; padding: 0.625rem !important; width: 100% !important; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5) !important;');
    }
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        applyDarkModeStyles();
    } else {
        document.documentElement.classList.remove('dark')
        applyDarkModeStyles()
    }


</script>