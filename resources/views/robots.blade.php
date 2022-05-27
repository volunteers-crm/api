User-Agent: *
Disallow: /admin
Disallow: /*&yclid*
Disallow: /*&target=*
Disallow: /*utm_block=*
Disallow: /*utm_source=*

User-Agent: Yandex
Disallow: /admin
Disallow: /*&yclid*
Disallow: /*&target=*
Disallow: /*utm_block=*
Disallow: /*utm_source=*

Clean-param: yclid&utm_campaign&utm_medium&utm_source&utm_term /

Host: {{ config('app.url') }}
