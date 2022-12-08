@props([
'height' => 'h-6',
'width' => 'w-6'
])
<div {{ $attributes->merge(['class' => '']) }}>
    <svg class="{{$height}} fill-current {{$width}}" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
        <path d="M20 15.628c0-.713-.154-1.919-1.191-1.98-.493-.03-.89-.414-.936-.904-.055-.581-.186-1.184-.476-1.744h-10.793c-.29.56-.421 1.163-.476 1.743-.046.49-.443.874-.936.904-1.037.062-1.192 1.268-1.192 1.981 0 .316.333 1.613 1.331 1.963.284.1.508.322.61.605.966 2.694 3.628 4.804 6.059 4.804 2.552 0 5.195-2.499 6.063-4.834.108-.29.344-.515.641-.606 1.07-.332 1.296-1.68 1.296-1.932zm-13-7.229v1.601h3v-1.5c0-.276.224-.5.5-.5s.5.224.5.5v1.5h2v-1.5c0-.276.225-.5.5-.5s.5.224.5.5v1.5h3v-1.647c.244-.058 3-.439 3-3.068 0-1.994-1.753-3.58-3.875-3.58-.806 0-1.278.198-1.941.428-1.137-1.123-1.63-1.133-2.184-1.133-.482 0-1.038.002-2.184 1.133-.68-.235-1.134-.428-1.941-.428-2.122 0-3.875 1.586-3.875 3.58 0 2.456 2.662 3.013 3 3.114zm14 7.229c0 .67-.453 2.407-2 2.887-1.023 2.754-3.999 5.485-7 5.485s-5.957-2.557-7-5.466c-1.52-.532-2-2.301-2-2.906 0-1.509.603-2.888 2.132-2.979.098-1.038.412-1.855.868-2.528v-.977c-1.825-.546-3-2.239-3-3.859 0-2.528 2.185-4.58 4.875-4.58.591 0 1.157.099 1.681.28.615-.607 1.483-.985 2.444-.985.961 0 1.828.378 2.443.985.525-.181 1.091-.28 1.682-.28 2.69 0 4.875 2.052 4.875 4.58 0 1.62-1.229 3.442-3 3.859v.976c.456.675.771 1.492.868 2.529 1.527.091 2.132 1.462 2.132 2.979zm-9 1.688c-1.9-1.287-1.351 1.854-4 .566.4 1.78 2.805 2.082 4 1.009 1.195 1.073 3.6.771 4-1.009-2.648 1.289-2.1-1.852-4-.566zm3-4.316c-.552 0-1 .525-1 1.174 0 .647.448 1.174 1 1.174s1-.527 1-1.174c0-.649-.448-1.174-1-1.174zm-5 1.174c0 .647-.448 1.174-1 1.174s-1-.527-1-1.174c0-.649.448-1.174 1-1.174s1 .525 1 1.174z"/>
    </svg>
    
</div>