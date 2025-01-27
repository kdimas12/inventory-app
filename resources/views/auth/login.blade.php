@extends("layouts.auth")

@section("title", "Login")

@section("content")
  <h1 class="text-lg font-medium text-gray-900">
    Silakan masuk untuk mengakses akun Anda.
  </h1>
  <form
    class="space-y-4 md:space-y-6"
    method="POST"
    action="{{ route("login") }}"
  >
    @csrf
    <div>
      <label
        for="text"
        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
      >
        Username
      </label>
      <input
        type="text"
        name="username"
        id="text"
        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
        placeholder="Masukkan username"
        required=""
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
        type="password"
        name="password"
        id="password"
        placeholder="••••••••"
        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
        required=""
      />
    </div>
    <button
      type="submit"
      class="w-full rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    >
      Masuk
    </button>
  </form>
@endsection
