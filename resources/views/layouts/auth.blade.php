<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield("title")</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
  </head>

  <body>
    <section class="bg-gray-50 dark:bg-gray-900">
      <div
        class="mx-auto flex flex-col items-center justify-center px-6 py-8 md:h-screen lg:py-0"
      >
        <p
          class="mb-6 mr-4 flex items-center justify-between text-gray-700 dark:text-white"
        >
          <svg
            class="mr-2 h-8 w-8"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            fill="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              fill-rule="evenodd"
              d="M14 7h-4v3a1 1 0 0 1-2 0V7H6a1 1 0 0 0-.997.923l-.917 11.924A2 2 0 0 0 6.08 22h11.84a2 2 0 0 0 1.994-2.153l-.917-11.924A1 1 0 0 0 18 7h-2v3a1 1 0 1 1-2 0V7Zm-2-3a2 2 0 0 0-2 2v1H8V6a4 4 0 0 1 8 0v1h-2V6a2 2 0 0 0-2-2Z"
              clip-rule="evenodd"
            />
          </svg>
          <span class="self-center whitespace-nowrap text-3xl font-bold">
            {{ config("app.name") }}
          </span>
        </p>
        <div
          class="w-full rounded-lg bg-white shadow dark:border dark:border-gray-700 dark:bg-gray-800 sm:max-w-md md:mt-0 xl:p-0"
        >
          <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
            @yield("content")
          </div>
        </div>
      </div>
    </section>
    @include("sweetalert::alert")
  </body>
</html>
