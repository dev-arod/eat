@props([
'height' => 'h-6',
'width' => 'w-6'
])
<div {{ $attributes->merge(['class' => '']) }}>
  <svg class="{{$height}} fill-current {{$width}}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9 12c0-.552.448-1 1.001-1s.999.448.999 1-.446 1-.999 1-1.001-.448-1.001-1zm6.2 0l-1.7 2.6-1.3-1.6-3.2 4h10l-3.8-5zm8.8-5v14h-20v-3h-4v-15h21v4h3zm-20 9v-9h15v-2h-17v11h2zm18-7h-16v10h16v-10z"/></svg>
</div>