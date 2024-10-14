<!doctype html>
<html {{ if eq .Page.Params.direction "rtl" }}lang="ar" dir="rtl"{{ else }}lang="en"{{ end }}{{ with .Page.Params.html_class }} class="{{ . }}"{{ end }}>
  <head>
    <link rel="canonical" href="{{ .Permalink }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="{{ .Site.Params.authors }}">
    <meta name="generator" content="Hugo {{ hugo.Version }}">
    <title>{{ .Page.Title | markdownify }} · {{ .Site.Title | markdownify }} v{{ .Site.Params.docs_version }}</title>

    {{ partial "stylesheet" . }}
    {{ partial "favicons" . }}

    {{ with .Params.robots -}}
    <meta name="robots" content="{{ . }}">
    {{- end }}

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    {{ range .Page.Params.extra_css }}
    {{ "<!-- Custom styles for this template -->" | safeHTML }}
    <link href="{{ . }}" rel="stylesheet">
    {{- end }}
  </head>
  <body{{ with .Page.Params.body_class }} class="{{ . }}"{{ end }}>
    {{ .Content }}
  </body>
</html>
