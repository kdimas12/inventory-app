<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manajemen Stok Berbasis FEFO</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
  </head>

  <body>
    <section class="flex h-screen">
      <div
        class="m-auto max-w-screen-xl px-4 py-8 text-center lg:px-12 lg:py-16"
      >
        <h1
          class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl"
        >
          Manajemen Stok Berbasis FEFO
        </h1>
        <p
          class="mb-8 text-lg font-normal text-gray-500 sm:px-16 lg:text-xl xl:px-48"
        >
          Meningkatkan Efisiensi dan Akurasi Penggunaan Stok di UD. Erni dengan
          Sistem yang Mengutamakan Barang Kedaluwarsa Terdekat.
        </p>
        <div
          class="mb-8 flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-x-4 sm:space-y-0 lg:mb-16"
        >
          <a
            href="{{ route("login") }}"
            class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-5 py-3 text-center text-base font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300"
          >
            Mulai
            <svg
              class="-mr-1 ml-2 h-5 w-5"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </a>
        </div>
      </div>
    </section>
  </body>
</html>
