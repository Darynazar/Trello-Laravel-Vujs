<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
// import { DotsHorizontalIcon, PensilIcon, PlusIcon } from "@heroicons/vue/solid";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <div class="h-full bg-gray-50 px-4 py-6">
      <div class="max-w-5xl mx-auto">
        <div class="flex item-center mb-4">
          <h3 class="font-black text-gray-700">My boards</h3>
          <button
            class="inline-flex items-center ml-4 py-1 px-3 bg-gray-100 rounded front-medium hover:bg-gray-200"
          >
            <PlusIcon class="-ml-1w-4 h-4" />
            <span class="ml-1">Create board</span>
          </button>
        </div>

        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          <li
            class="relative bg-blue-600 hover:bg-blue-700 rounded-md min-h-[7rem]"
          >
            <a
              class="absolute inset-0 p-2 text-white text-lg font-bold"
              href="#"
            >
              board 1
            </a>
          </li>

          <li
            class="relative bg-blue-600 hover:bg-blue-700 rounded-md min-h-[7rem]"
          >
            <a
              class="absolute inset-0 p-2 text-white text-lg font-bold"
              href="#"
            >
              board 1
            </a>
          </li>

          <li
            class="relative bg-blue-600 hover:bg-blue-700 rounded-md min-h-[7rem]"
          >
            <a
              class="absolute inset-0 p-2 text-white text-lg font-bold"
              href="#"
            >
              board 1
            </a>
          </li>

          <li
            class="relative bg-blue-600 hover:bg-blue-700 rounded-md min-h-[7rem]"
          >
            <a
              class="absolute inset-0 p-2 text-white text-lg font-bold"
              href="#"
            >
              board 1
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div> -->
  </AuthenticatedLayout>
</template>
