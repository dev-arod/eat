<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        @isset($title)
        {{ $title }} -
        @endisset
        {{ config('app.name', 'EAT Rstaurante') }}
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    @livewireStyles


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/notifications.js') }}"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
</head>

<body class="antialiased min-h-screen lg:flex" x-data="{open: false}">
    @php
    $navlinks = [
    [
    "name" => "dashboard",
    "route" => "dashboard",
    "text" => "Dasboard",
    "image" => '<svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
    </svg>'
    ],
    [
    "name" => "users",
    "route" => "admin-users",
    "text" => "Usuarios",
    "image" => '<svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path
            d="M17.997 18h-11.995l-.002-.623c0-1.259.1-1.986 1.588-2.33 1.684-.389 3.344-.736 2.545-2.209-2.366-4.363-.674-6.838 1.866-6.838 2.491 0 4.226 2.383 1.866 6.839-.775 1.464.826 1.812 2.545 2.209 1.49.344 1.589 1.072 1.589 2.333l-.002.619zm4.811-2.214c-1.29-.298-2.49-.559-1.909-1.657 1.769-3.342.469-5.129-1.4-5.129-1.265 0-2.248.817-2.248 2.324 0 3.903 2.268 1.77 2.246 6.676h4.501l.002-.463c0-.946-.074-1.493-1.192-1.751zm-22.806 2.214h4.501c-.021-4.906 2.246-2.772 2.246-6.676 0-1.507-.983-2.324-2.248-2.324-1.869 0-3.169 1.787-1.399 5.129.581 1.099-.619 1.359-1.909 1.657-1.119.258-1.193.805-1.193 1.751l.002.463z" />
    </svg>'
    ],
    [
    "name" => "suppliers",
    "route" => "admin-suppliers",
    "text" => "Provedores",
    "image" => '<svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
        clip-rule="evenodd">
        <path
            d="M7 16.462l1.526-.723c1.792-.81 2.851-.344 4.349.232 1.716.661 2.365.883 3.077 1.164 1.278.506.688 2.177-.592 1.838-.778-.206-2.812-.795-3.38-.931-.64-.154-.93.602-.323.818 1.106.393 2.663.79 3.494 1.007.831.218 1.295-.145 1.881-.611.906-.72 2.968-2.909 2.968-2.909.842-.799 1.991-.135 1.991.72 0 .23-.083.474-.276.707-2.328 2.793-3.06 3.642-4.568 5.226-.623.655-1.342.974-2.204.974-.442 0-.922-.084-1.443-.25-1.825-.581-4.172-1.313-6.5-1.6v-5.662zm-1 6.538h-4v-8h4v8zm15-11.497l-6.5 3.468v-7.215l6.5-3.345v7.092zm-7.5-3.771v7.216l-6.458-3.445v-7.133l6.458 3.362zm-3.408-5.589l6.526 3.398-2.596 1.336-6.451-3.359 2.521-1.375zm10.381 1.415l-2.766 1.423-6.558-3.415 2.872-1.566 6.452 3.558z" />
    </svg>'
    ],
    [
    "name" => "products",
    "route" => "admin-products",
    "text" => "Productos",
    "image" => '<svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
        clip-rule="evenodd">
        <path
            d="M3.114 11c-.066-.316-.104-.64-.112-.972-.062-2.402 1.452-4.495 3.595-5.262.307-2.606 2.574-4.766 5.403-4.766 2.199 0 4.258 1.336 5.082 3.504l2.918-2.918 1.413 1.413-5.94 5.94.001.001-.474.474-1.414-1.414 1.899-1.899c-.219-1.688-1.597-3.101-3.51-3.101-1.731 0-3.183 1.27-3.47 2.819 1.31.291 3.01 1.426 3.021 3.707-.982-2.06-3.533-2.36-4.846-1.604-1.252.721-1.682 1.839-1.679 3.056.001.357.06.7.167 1.022h13.648c.135-.396.2-.824.18-1.268-.041-.944-.402-1.705-.927-2.267l1.38-1.38c.965.988 1.551 2.337 1.551 3.804 0 .381-.039.753-.114 1.111h1.12c.007 3.956-2.216 7.735-7.069 9.206.086.568.96 1.558 1.531 1.794h.538c.611.015.991.413 1 1 .01.524-.439 1.002-1.006 1h-10c-.567.002-1.004-.476-.994-1 .009-.587.389-.985 1-1h.538c.571-.236 1.445-1.226 1.531-1.794-4.853-1.471-7.063-5.25-7.069-9.206h1.108zm16.688 2h-15.592l.002.008c.97 3.448 3.626 5.019 7 5.675.077.799-.014 2.497-.942 3.317h3.472c-.928-.82-1.019-2.518-.942-3.317 3.374-.656 6.03-2.227 7-5.675l.002-.008z" />
    </svg>'
    ],
    [
    "name" => "recipes",
    "route" => "admin-recipes",
    "text" => "Recetas",
    "image" => '<svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 380.721 380.721">
        <path
            d="M380.582 86.414l-17.335-5.949.139-14.826s-38.213-14.715-86.756-14.715c-40.759 0-75.208 10.457-86.234 14.215-11.014-3.759-45.458-14.215-86.222-14.215-48.543 0-85.043 14.43-85.043 14.43l.134 16.516L0 86.978l.093 242.818 12.949-5.438c.436-.186 43.89-18.218 83.992-18.218 34.362 0 74.562 10.12 86.663 13.396l8.081 2.289 7.553-2.416c10.84-3.3 46.602-13.269 80.25-13.269 39.816 0 87.988 18.171 88.476 18.346l12.665 4.799-.14-242.871zM181.472 295.8c-17.236-4.52-50.088-11.932-79.82-11.932-29.006 0-58.604 7.04-74.778 11.606V83.155c15.708-4.188 42.669-9.957 72.837-9.957 36.93 0 69.352 8.685 81.761 12.49V295.8zm172.468 0c-17.242-4.52-50.088-11.932-79.832-11.932-27.792 0-56.002 6.447-72.547 11.002V85.653c12.246-3.782 44.127-12.455 80.656-12.455 29.663 0 56.188 5.722 71.711 9.922V295.8h.012z" />
        <path
            d="M229.702 109.732c.267-.046 27.489-5.007 55.025-5.007 27.467 0 52.121 4.938 52.354 4.996l2.139-7.198c-1.058-.227-25.922-5.211-54.492-5.211-28.535 0-55.816 4.985-56.955 5.188l1.929 7.232zM337.081 129.996l2.139-7.209c-1.058-.227-25.922-5.211-54.492-5.211-28.547 0-55.805 4.984-56.955 5.199l1.93 7.245c.267-.047 27.443-5.02 55.025-5.02 27.442-.012 52.098 4.938 52.353 4.996zM229.702 149.353c.267-.058 27.489-5.02 55.025-5.02 27.443 0 52.099 4.95 52.354 4.996l2.139-7.209c-1.058-.227-25.922-5.211-54.492-5.211-28.547 0-55.839 4.973-56.978 5.199l1.952 7.245zM284.704 164.607c27.467 0 52.122 4.932 52.366 4.984l2.126-7.198c-1.046-.227-25.91-5.211-54.492-5.211-28.559 0-55.815 4.973-56.954 5.2l1.952 7.232c.266-.057 27.42-5.007 55.002-5.007zM284.704 184.203c27.467 0 52.122 4.949 52.366 4.996l2.126-7.198c-1.046-.215-25.91-5.211-54.492-5.211-28.523 0-55.815 4.984-56.954 5.199l1.952 7.244c.266-.058 27.489-5.03 55.002-5.03zM284.704 197.029c-28.535 0-55.793 4.996-56.954 5.206l1.952 7.238c.255-.035 27.443-5.008 55.002-5.008 27.49 0 52.122 4.938 52.366 4.996l2.126-7.204c-1.046-.22-25.899-5.228-54.492-5.228zM227.772 221.533l1.93 7.239c.267-.035 27.443-5.008 55.025-5.008 27.443 0 52.099 4.926 52.354 5.008l2.139-7.216c-1.058-.221-25.922-5.205-54.492-5.205-28.548-.023-55.817 4.973-56.956 5.182zM227.772 240.786l1.93 7.238c.267-.047 27.443-5.02 55.025-5.02 27.467 0 52.121 4.949 52.354 4.996l2.139-7.204c-1.058-.209-25.922-5.205-54.516-5.205-28.524.001-55.793 4.974-56.932 5.195zM227.772 261.315l1.93 7.238c.267-.058 27.501-5.02 55.025-5.02 27.467 0 52.121 4.95 52.354 4.984l2.139-7.203c-1.058-.209-25.922-5.205-54.516-5.205-28.524.001-55.793 4.974-56.932 5.206zM97.881 135.398c-1.714-.087-3.416-.192-5.118-.262-6.019-.261-11.113 4.851-11.764 10.648-4.27 1.139-8.272 2.887-11.624 5.699-3.067 2.579-4.322 6.553-4.032 10.434-10.009 2.841-16.847 8.412-14.349 18.938h-4.607L73.54 238.89h67.388l27.135-58.035h-4.281c-.575-4.531-3.259-8.673-8.4-9.673.157-.354.331-.691.477-1.092 3.567-9.864-3.846-14.872-11.909-17.12.319-3.37-.68-6.937-3.131-9.946-1.906-2.312-4.816-3.712-8.127-4.583-.627-3.009-2.236-5.699-5.327-7.291-1.533-.802-3.084-1.586-4.618-2.371-.662-.343-1.33-.714-1.987-1.069-2.603-10.707-20.048-13.722-22.854-.761-.716 3.215-.646 5.998-.025 8.449zm-19.002 99.939l-17.986-48.828 4.101-.046 18.097 48.595-4.212.279zm11.067-.256l-9.242-48.288 3.793-.104 9.626 48.369h-4.177v.023zm59.157-48.607l3.985.227-17.562 48.659-4.096-.278 17.673-48.608zm-17.347-.07l3.863.285-10.027 48.613-3.689.104 9.853-49.002zm-17.434.285l3.724.261-2.725 48.107h-3.532l2.533-48.368zm-12.548-.285l3.224 48.537-3.735.232-3.224-48.543 3.735-.226z" />
    </svg>'
    ],
    [
    "name" => "kitchen",
    "route" => "admin-kitchen",
    "text" => "Cocina",
    "image" => '<svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 380.709 380.709">
        <path
            d="M135.148 296.393H236.515c53.621 0 87.896-72.942 85.897-112.551.116-.749.186-1.545.186-2.335 0-12.037-13.501-19.629-45.173-25.445-24.027-4.403-55.537-6.901-89.127-7.163v-.052c-.825 0-1.645.041-2.475.041-.825 0-1.633-.041-2.463-.041v.052c-33.613.25-65.106 2.748-89.127 7.163-31.644 5.804-45.162 13.408-45.162 25.445 0 .791.069 1.586.18 2.335-1.986 39.609 32.289 112.551 85.897 112.551zm50.687-130.519c67.818.25 108.053 9.487 118.73 15.622-10.678 6.14-50.912 15.36-118.73 15.627-67.807-.255-108.031-9.487-118.726-15.627 10.695-6.135 50.919-15.36 118.726-15.622zM144.251 90.103c1.296 2.422 2.19 3.114 3.317 4.746l2.928 3.544c.546 1.179 1.43 2.12 1.807 3.416.965 2.452 2.016 5.054 2.324 7.913.941 5.612.865 11.467.627 16.597-.674 10.242-1.661 17.736-1.661 17.736s5.473-5.304 9.835-15.813c1.087-2.614 2.155-5.542 2.835-8.812.703-3.248 1.377-6.809 1.226-10.672 0-3.793-.464-8-1.986-12.078-.587-2.08-1.859-4.008-2.847-6.019-.558-.988-1.307-1.859-1.987-2.771l-1.045-1.371-.523-.656-.133-.174c.064.081.18.186.372.412l-.046-.069-.204-.25c-.906-1.249-2.725-3.032-2.928-3.817-.43-.917-1.045-1.679-1.476-3.084a35.164 35.164 0 01-2.167-8.052c-.831-5.664-.738-11.566-.5-16.696.68-10.265 1.586-17.771 1.586-17.771s-5.426 5.35-9.783 15.836c-2.179 5.211-4.102 11.729-4.2 19.392.099 3.771.157 7.936 1.726 12.037.498 1.962 1.666 4.263 2.903 6.476zM176.517 53.742c1.307 2.44 2.189 3.131 3.322 4.758l2.923 3.521c.552 1.191 1.429 2.144 1.812 3.439.964 2.451 2.01 5.042 2.317 7.9.941 5.618.871 11.479.634 16.597-.68 10.254-1.679 17.736-1.679 17.736s5.472-5.292 9.841-15.796c1.08-2.631 2.149-5.56 2.823-8.83.709-3.248 1.383-6.803 1.243-10.66 0-3.793-.465-8.005-1.987-12.089-.592-2.08-1.87-4.008-2.846-6.019-.57-.976-1.313-1.841-1.987-2.771l-1.046-1.359-.522-.674-.116-.18c.058.082.162.192.365.418l-.046-.064-.203-.261c-.906-1.249-2.725-3.021-2.929-3.805-.424-.918-1.057-1.679-1.475-3.091a34.706 34.706 0 01-2.161-8.046c-.849-5.699-.738-11.566-.5-16.713C184.975 7.494 185.869 0 185.869 0s-5.426 5.356-9.782 15.825c-2.173 5.211-4.102 11.741-4.195 19.38.094 3.782.151 7.959 1.72 12.055.499 1.986 1.678 4.269 2.905 6.482zM216.403 86.699c1.289 2.44 2.173 3.125 3.3 4.77l2.939 3.521c.534 1.179 1.429 2.132 1.812 3.439.941 2.44 1.998 5.048 2.312 7.889.953 5.618.872 11.491.628 16.597-.674 10.253-1.649 17.742-1.649 17.742s5.461-5.298 9.829-15.813c1.092-2.608 2.161-5.548 2.835-8.818.697-3.248 1.371-6.803 1.231-10.66 0-3.782-.465-7.994-1.976-12.078-.604-2.091-1.882-4.02-2.857-6.019-.581-.988-1.325-1.842-1.999-2.771l-1.046-1.359-.511-.674-.151-.18c.082.081.175.203.372.43l-.035-.075-.209-.262c-.906-1.237-2.719-3.021-2.928-3.805-.441-.918-1.046-1.679-1.487-3.096a34.89 34.89 0 01-2.149-8.029c-.849-5.699-.731-11.578-.499-16.713.674-10.271 1.58-17.765 1.58-17.765s-5.438 5.368-9.783 15.836c-2.161 5.211-4.113 11.741-4.194 19.38.081 3.782.151 7.947 1.708 12.043.51 1.973 1.684 4.28 2.927 6.47zM331.614 342.415c-.406-24.062-23.47-37.645-48.531-37.645-25.282.012-43.326 15.209-47.323 28.441-10.166 7.273-34.205 2.498-48.084-2.637-6.628.023-108.245.023-108.245.023v.012c-.069 0-.14-.012-.221-.012-6.21 0-11.259 5.043-11.27 11.27 0 .314.011 1.511 0 1.836.011 6.205 5.042 11.235 11.27 11.235H187.688c13.867-5.124 37.906-9.935 48.096-2.684 3.997 13.269 22.041 28.466 47.323 28.454 25.061 0 48.124-13.605 48.508-37.656.012-.128 0-.535.023-.65 0 .013-.012.013-.024.013zm-29.558-21.971c-1.789-.082-4.345-.163-7.412-.268-6.03-.082-14.244-.547-21.529.58-1.708.221-3.637.803-5.38 1.395a57.652 57.652 0 00-5.321 1.94c-3.462 1.325-6.669 2.788-9.435 4.067-2.741 1.254-5.03 2.404-6.576 3.275-1.58.813-2.254 1.627-2.184 1.686-.093.023.15-1.15 1.348-2.615 1.161-1.51 3.021-3.416 5.46-5.438 2.44-2.045 5.438-4.159 8.924-6.135a65.934 65.934 0 015.577-2.73c2.045-.824 4.031-1.486 6.39-1.928 4.485-.849 8.808-.709 12.781-.244a56.014 56.014 0 0110.596 2.23c3.033.906 5.461 1.964 7.134 2.835 1.696.86 2.498 1.546 2.498 1.546s-1.093-.15-2.871-.196z" />
    </svg>'
    ],
    [
    "name" => "dishes",
    "route" => "admin-dishes",
    "text" => "Platillos",
    "image" => '<svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
        clip-rule="evenodd">
        <path
            d="M20 15.628c0-.713-.154-1.919-1.191-1.98-.493-.03-.89-.414-.936-.904-.055-.581-.186-1.184-.476-1.744h-10.793c-.29.56-.421 1.163-.476 1.743-.046.49-.443.874-.936.904-1.037.062-1.192 1.268-1.192 1.981 0 .316.333 1.613 1.331 1.963.284.1.508.322.61.605.966 2.694 3.628 4.804 6.059 4.804 2.552 0 5.195-2.499 6.063-4.834.108-.29.344-.515.641-.606 1.07-.332 1.296-1.68 1.296-1.932zm-13-7.229v1.601h3v-1.5c0-.276.224-.5.5-.5s.5.224.5.5v1.5h2v-1.5c0-.276.225-.5.5-.5s.5.224.5.5v1.5h3v-1.647c.244-.058 3-.439 3-3.068 0-1.994-1.753-3.58-3.875-3.58-.806 0-1.278.198-1.941.428-1.137-1.123-1.63-1.133-2.184-1.133-.482 0-1.038.002-2.184 1.133-.68-.235-1.134-.428-1.941-.428-2.122 0-3.875 1.586-3.875 3.58 0 2.456 2.662 3.013 3 3.114zm14 7.229c0 .67-.453 2.407-2 2.887-1.023 2.754-3.999 5.485-7 5.485s-5.957-2.557-7-5.466c-1.52-.532-2-2.301-2-2.906 0-1.509.603-2.888 2.132-2.979.098-1.038.412-1.855.868-2.528v-.977c-1.825-.546-3-2.239-3-3.859 0-2.528 2.185-4.58 4.875-4.58.591 0 1.157.099 1.681.28.615-.607 1.483-.985 2.444-.985.961 0 1.828.378 2.443.985.525-.181 1.091-.28 1.682-.28 2.69 0 4.875 2.052 4.875 4.58 0 1.62-1.229 3.442-3 3.859v.976c.456.675.771 1.492.868 2.529 1.527.091 2.132 1.462 2.132 2.979zm-9 1.688c-1.9-1.287-1.351 1.854-4 .566.4 1.78 2.805 2.082 4 1.009 1.195 1.073 3.6.771 4-1.009-2.648 1.289-2.1-1.852-4-.566zm3-4.316c-.552 0-1 .525-1 1.174 0 .647.448 1.174 1 1.174s1-.527 1-1.174c0-.649-.448-1.174-1-1.174zm-5 1.174c0 .647-.448 1.174-1 1.174s-1-.527-1-1.174c0-.649.448-1.174 1-1.174s1 .525 1 1.174z" />
    </svg>'
    ],
    [
    "name" => "orders",
    "route" => "orders",
    "text" => "Ordenes",
    "image" => '<svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
        clip-rule="evenodd">
        <path
            d="M13.403 24h-13.403v-22h3c1.231 0 2.181-1.084 3-2h8c.821.916 1.772 2 3 2h3v9.15c-.485-.098-.987-.15-1.5-.15l-.5.016v-7.016h-4l-2 2h-3.897l-2.103-2h-4v18h9.866c.397.751.919 1.427 1.537 2zm5.097-11c3.035 0 5.5 2.464 5.5 5.5s-2.465 5.5-5.5 5.5c-3.036 0-5.5-2.464-5.5-5.5s2.464-5.5 5.5-5.5zm0 2c1.931 0 3.5 1.568 3.5 3.5s-1.569 3.5-3.5 3.5c-1.932 0-3.5-1.568-3.5-3.5s1.568-3.5 3.5-3.5zm2.5 4h-3v-3h1v2h2v1zm-15.151-4.052l-1.049-.984-.8.823 1.864 1.776 3.136-3.192-.815-.808-2.336 2.385zm6.151 1.052h-2v-1h2v1zm2-2h-4v-1h4v1zm-8.151-4.025l-1.049-.983-.8.823 1.864 1.776 3.136-3.192-.815-.808-2.336 2.384zm8.151 1.025h-4v-1h4v1zm0-2h-4v-1h4v1zm-5-6c0 .552.449 1 1 1 .553 0 1-.448 1-1s-.447-1-1-1c-.551 0-1 .448-1 1z" />
    </svg>'
    ],
    [
    "name" => "cashregister",
    "route" => "cashregister",
    "text" => "Caja",
    "image" => '<svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path
            d="M10.81 11.885h-1.098l.066-.739h1.069l-.037.739zm.613 1.099h1.14l-.007-.739h-1.111l-.022.739zm.085-2.971l-.021.739h1.054l-.007-.739h-1.026zm-1.894 2.971h1.14l.038-.739h-1.112l-.066.739zm1.291-2.971h-1.026l-.066.739h1.054l.038-.739zm6.308 0l.137.739h1.054l-.165-.739h-1.026zm-4.115 0l.023.739h1.054l-.051-.739h-1.026zm1.155 1.872l-.051-.739h-1.069l.022.739h1.098zm3.309-4.885h-7.406l-.204 2h8.058l-.448-2zm-6.107 4.885h1.097l-.007-.739h-1.069l-.021.739zm2.874 1.099l-.051-.739h-1.111l.023.739h1.139zm-5.888-2.971h-1.025l-.134.739h1.054l.105-.739zm10.215 1.872l-.165-.739h-1.069l.136.739h1.098zm-12.074-.739h-1.069l-.179.739h1.097l.151-.739zm.231-1.133h-1.026l-.179.739h1.054l.151-.739zm17.187 4.987v7h-24v-7h24zm-2 2h-20v3h20v-3zm-9 1h-2v1h2v-1zm-7.932-5.016h1.14l.15-.739h-1.111l-.179.739zm11.702-2.233l-.121-.739h-1.026l.093.739h1.054zm.185 1.134l-.121-.739h-1.069l.093.739h1.097zm1.946 1.099l-.165-.739h-2.833l.093.739h2.905zm-10.622-1.838h-1.069l-.134.739h1.098l.105-.739zm-1.402 1.838h1.139l.105-.739h-1.11l-.134.739zm-5.595.016l2.621-9h1.921c.112-.622.322-1.371.668-2h3.427c-.26.57-.499 1.259-.627 2h10.805l2.592 9h-2.221l-1.804-7h-9.42c.071.836.178 1.511-.107 2h-3.456c.292-.431.166-1.111.086-2h-.481l-1.739 7h-2.265zm5.101-6.631h2.298c-.157-1.076-.092-2.782.404-3.786h-2.249c-.553 1.006-.624 2.64-.453 3.786z" />
    </svg>'
    ]
    ];

    @endphp
    <nav
        class="fixed top-0 left-0 inset-0 transform lg:transform-none lg:opacity-100 duration-200 lg:sticky lg:bottom-0 lg:left-0 z-10 w-full md:w-80 bg-eat-fuccia-500 text-white max-h-screen overflow-y-auto p-3" :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0': open === false}">
        <div class="flex justify-between">
            <div class="flex justify-center w-full">
                <img src="{{url('/img/logo_fuccia.png')}}" class="h-20" alt="">
            </div>
            <button class="p-2 focus:outline-none focus:bg-eat-fuccia-700 hover:bg-eat-fuccia-700 rounded-md lg:hidden"
                @click="open = false">
                <x-icons.close></x-icons.close>
            </button>
        </div>
        <ul class="mt-8">
            @foreach ($navlinks as $link)
            <x-utils.menu-item :routeInMenu="$link['route']" class="text-white!important hover:text-white">
                <x-slot name="image">
                    {!! $link['image'] !!}
                </x-slot>
                <x-utils.text-menu>{{$link['text']}}</x-utils.text-menu>
            </x-utils.menu-item>
            @endforeach

            <div class="pb-4 text-white hover:text-eat-pink-500">
                <div class="block px-4 py-2 hover:bg-white rounded-md">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-auth.logout />
                    </form>
                </div>
            </div>
        </ul>
    </nav>
    <div class="relative z-0 lg:flex-grow">
        <header
            class="flex bg-eat-green-500 text-white items-center px-3 text-2xl sm:text-3xl font-bold p-4 justify-end">
            <button class="p-2 focus:outline-none focus:bg-eat-green-500 hover:bg-eat-green-600 rounded-md lg:hidden"
                @click="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>


            <div class=" hidden lg:flex justify-between items-center mr-8">
                <div class="mr-8 relative ">
                    <input
                        class="rounded-lg shadow-lg pl-10 border border-transparent focus:outline-none focus:ring-2 focus:ring-eat-fuccia-600 focus:border-transparent -full bg-eat-white-500"
                        type="text">
                    <x-icons.search />
                </div>
                <x-icons.messages class="text-eat-olive-50 mr-5" />
                <x-icons.notifications />
                <div class="mx-5">
                    <img class=" rounded-full w-12 h-12 bg-cover " src="https://i.pravatar.cc/40" alt="">
                </div>
            </div>


        </header>
        <main class="mx-6 mt-6">
            {{$slot}}
        </main>
    </div>


    {{-- <script src="{{ mix('js/alpine-functions.js') }}"></script> --}}
    @livewireScripts
    @livewire('livewire-ui-modal')
    @stack('modals')
</body>

</html>