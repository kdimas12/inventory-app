@extends("layouts.app")

@section("content")
  <!-- Breadcrumb -->
  <nav
    class="mb-5 justify-between rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-700 sm:flex sm:px-5"
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
            Barang
          </span>
        </div>
      </li>
    </ol>
    <div>
      <a
        href="{{ route("product.create") }}"
        class="inline-flex items-center rounded rounded-lg bg-blue-500 px-3 py-2 text-center text-sm font-normal text-white hover:bg-blue-600"
      >
        Tambah Barang
      </a>
    </div>
  </nav>

  <div class="rounded-lg border border-gray-200 bg-white p-3">
    <table id="product-table">
      <thead>
        <tr>
          <th>
            <span class="flex items-center">
              Kode Barang
              <svg
                class="ms-1 h-4 w-4"
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
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
          <th data-type="date" data-format="YYYY/DD/MM">
            <span class="flex items-center">
              Nama Barang
              <svg
                class="ms-1 h-4 w-4"
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
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Kategori
              <svg
                class="ms-1 h-4 w-4"
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
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Unit
              <svg
                class="ms-1 h-4 w-4"
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
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Harga Beli
              <svg
                class="ms-1 h-4 w-4"
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
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Harga Jual
              <svg
                class="ms-1 h-4 w-4"
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
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Aksi
              <svg
                class="ms-1 h-4 w-4"
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
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td class="whitespace-nowrap font-medium text-gray-900">
              {{ $product->code }}
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->unit }}</td>
            <td>
              {{ "Rp " . number_format($product->buy_price, 2, ",", ".") }}
            </td>
            <td>
              {{ "Rp " . number_format($product->sell_price, 2, ",", ".") }}
            </td>
            <td>
              <div class="flex flex-row space-x-2">
                <a
                  href="{{ route("product.edit", $product->id) }}"
                  class="rounded-lg bg-blue-500 px-4 py-1 text-sm text-white hover:bg-blue-600"
                >
                  Edit
                </a>
                <a
                  href="{{ route("product.destroy", $product->id) }}"
                  class="rounded-lg bg-red-500 px-4 py-1 text-sm text-white hover:bg-red-600"
                  data-confirm-delete="true"
                >
                  Delete
                </a>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@push("scripts")
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
  <script>
    if (
      document.getElementById('product-table') &&
      typeof simpleDatatables.DataTable !== 'undefined'
    ) {
      const dataTable = new simpleDatatables.DataTable('#product-table', {
        searchable: false,
        perPageSelect: false,
      });
    }
  </script>
@endpush
