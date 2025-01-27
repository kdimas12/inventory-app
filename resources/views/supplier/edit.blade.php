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
            href="{{ route("supplier.index") }}"
            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2"
          >
            Supplier
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
            Ubah
          </span>
        </div>
      </li>
    </ol>
  </nav>

  <div
    class="mx-auto max-w-screen-md rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 sm:p-6"
  >
    <form action="{{ route("supplier.update", $supplier->id) }}" method="POST">
      @csrf
      @method("put")
      <div class="mb-4 grid gap-4 sm:grid-cols-2">
        <div class="sm:col-span-2">
          <label
            for="name"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Nama
          </label>
          <input
            type="text"
            name="name"
            id="name"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            placeholder="Tuliskan nama supplier"
            required=""
            value="{{ $supplier->name }}"
          />
        </div>
        <div>
          <label
            for="contact_person"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Kontak Person
          </label>
          <input
            type="text"
            name="contact_person"
            id="contact_person"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            placeholder="Tuliskan nama kontak"
            required=""
            value="{{ $supplier->contact_person }}"
          />
        </div>
        <div>
          <label
            for="phone"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            No. Telp
          </label>
          <input
            type="text"
            name="phone"
            id="phone"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            placeholder="0813xxxx"
            required=""
            value="{{ $supplier->phone }}"
          />
        </div>
        <div class="sm:col-span-2">
          <label
            for="address"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Alamat
          </label>
          <textarea
            id="address"
            rows="4"
            name="address"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            placeholder="Tuliskan alamat disini"
          >
{{ $supplier->address }}</textarea
          >
        </div>
        <div class="sm:col-span-2">
          <label
            for="status"
            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
          >
            Status
          </label>
          <select
            id="status"
            name="status"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
          >
            <option selected>Pilih status</option>
            <option
              value="aktif"
              {{ $supplier->status == "aktif" ? "selected" : "" }}
            >
              Aktif
            </option>
            <option
              value="non-aktif"
              {{ $supplier->status == "non-aktif" ? "selected" : "" }}
            >
              Non-aktif
            </option>
          </select>
        </div>
      </div>
      <button
        type="submit"
        class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      >
        Simpan
      </button>
    </form>
  </div>
@endsection
