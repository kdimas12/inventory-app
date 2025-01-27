<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield("title", "Dashboard")</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
  </head>

  <body class="bg-gray-50">
    <div class="antialiased">
      @include("layouts.navbar")
      <div class="flex overflow-hidden pt-16">
        {{-- Navigation --}}

        {{-- Sidebar --}}
        @include("layouts.sidebar")

        {{-- Page Content --}}
        <main class="relative h-full w-full overflow-y-auto px-5 lg:ml-64">
          @yield("content")
        </main>
      </div>
    </div>
    @include("sweetalert::alert")
    @stack("scripts")
  </body>
</html>
