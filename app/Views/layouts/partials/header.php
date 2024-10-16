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
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }

</script>