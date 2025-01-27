@extends("layouts.app")

@section("content")
  <!-- Breadcrumb -->
  <nav
    class="mb-5 justify-between rounded-lg border border-gray-200 bg-white px-4 py-5 text-gray-700 sm:flex sm:px-5"
    aria-label="Breadcrumb"
  >
    <ol
      class="mb-3 inline-flex items-center space-x-1 sm:mb-0 md:space-x-2 rtl:space-x-reverse"
    >
      <li>
        <div class="flex items-center">
          <a
            href="{{ route("dashboard.index") }}"
            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2"
          >
            Dashboard
          </a>
        </div>
      </li>
      <li>
        <div class="flex items-center">
          <svg
            class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 6 10"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m1 9 4-4-4-4"
            />
          </svg>
          <a
            href="{{ route("user.index") }}"
            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2"
          >
            Manajemen Pengguna
          </a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg
            class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 6 10"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m1 9 4-4-4-4"
            />
          </svg>
          <span
            class="mx-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:mx-2"
          >
            Ubah Pengguna
          </span>
        </div>
      </li>
    </ol>
  </nav>

  <div
    class="mx-auto max-w-screen-md rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 sm:p-6"
  >
    <form action="{{ route("user.update", $user->id) }}" method="POST">
      @csrf
      @method("put")
      <div class="mb-4 grid gap-4 sm:grid-cols-2">
        <div class="sm:col-span-2">
          <label
            for="name"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Nama Pengguna
          </label>
          <input
            type="text"
            name="name"
            id="name"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            placeholder="Tuliskan nama pengguna"
            required=""
            value="{{ $user->name }}"
          />
        </div>
        <div>
          <label
            for="username"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Username
          </label>
          <input
            type="text"
            name="username"
            id="username"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            placeholder="Tuliskan username"
            required=""
            value="{{ $user->username }}"
          />
        </div>
        <div>
          <label
            for="password"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Password
          </label>
          <input
            type="text"
            name="password"
            id="password"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            placeholder="Tuliskan password"
          />
          <p class="mt-2 text-xs text-red-600 dark:text-red-500">
            *Isikan password jika ingin mengubah password
          </p>
        </div>
        <div class="sm:col-span-2">
          <label
            for="role"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Jabatan
          </label>
          <select
            id="role"
            name="role"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
          >
            <option selected>Pilih jabatan</option>
            <option
              value="staff"
              {{ $user->role == "staff" ? "selected" : "" }}
            >
              Staff
            </option>
            <option
              value="admin"
              {{ $user->role == "admin" ? "selected" : "" }}
            >
              Admin
            </option>
            <option
              value="pemilik"
              {{ $user->role == "pemilik" ? "selected" : "" }}
            >
              Pemilik
            </option>
          </select>
        </div>
      </div>
      <button
        type="submit"
        class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      >
        <svg
          class="-ml-1 mr-1 h-5 w-5"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          fill="none"
          viewBox="0 0 24 24"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-width="2"
            d="M11 16h2m6.707-9.293-2.414-2.414A1 1 0 0 0 16.586 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707ZM16 20v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6h8ZM9 4h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V4Z"
          />
        </svg>
        Simpan
      </button>
    </form>
  </div>
@endsection
