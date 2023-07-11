<script setup>
// import { DotsHorizontalIcon, PensilIcon, PlusIcon } from "@heroicons/vue/solid";

import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import AuthenticatedLayoutVue from "@/Layouts/AuthenticatedLayout.vue";
// import BoardNameForm from "./Boards/BoardNameForm.vue";
// import CreateBoardListForm from "./Boards/CreateBoardListForm.vue";
import BoardNameForm from "./BoardNameForm.vue";
import CreateBoardListForm from "./CreateBoardListForm.vue";


const props = defineProps({
    list: Object
});
</script>
<template>
    <div>
                <div class="flex item-center justify-between px-3 py-2">
                  <h3 class="text-sm font-semibold text-gray-700">{{ list.name }}</h3>
                  <button
                    class="hover:bg-gray-300 w-8 h-8 rounded-md grid place-content-center"
                  >
                    <DotsHorizontalIcon class="w-5 h-5" />
                  </button>

                  <Menu as="div" class="relative z-10">
                    <MenuButton
                      class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black rounded-full"
                    >
                      <img
                        class="w-10 h-10 inline rounded-full"
                        src="https://pbs.twimg.com/profile_images/1333896976602193922/MtWztkxt_400x400.jpg"
                        alt=""
                      />
                    </MenuButton>

                    <transition
                      enter-active-class="transition transform duration-100 ease-out"
                      enter-from-class="opacity-0 scale-90"
                      enter-to-class="opacity-100 scale-100"
                      leave-active-class="transition transform duration-100 ease-in"
                      leave-from-class="opacity-100 scale-100"
                      leave-to-class="opacity-0 scale-90"
                    >
                      <MenuItems
                        class="origin-top-left mt-2 focus:outline-none absolute left-0 bg-white overflow-hidden rounded-md shadow-lg border w-48"
                      >
                        <MenuItem v-slot="{ active }">
                          <a
                            href="#"
                            :class="{ 'bg-gray-100': active }"
                            class="block px-4 py-2 text-sm text-gray-700"
                            >Add card</a
                          >
                        </MenuItem>

                        <MenuItem v-slot="{ active }">
                          <a
                            href="#"
                            :class="{ 'bg-gray-100': active }"
                            class="block px-4 py-2 text-sm text-red-600"
                            >delete</a
                          >
                        </MenuItem>
                      </MenuItems>
                    </transition>
                  </Menu>
                </div>
                <div class="pb-3 pb-3 flex flex-col overflow-hidden">
                  <div class="px-3 flex-1 overflow-y-auto">
                    <ul class="space-y-3">
                      <li
                        v-for="card in list.cards"
                        :key="card.id"
                        class="group relative bg-white p-3 shadow rounded-md border-b border-gray-300 hover:bg-gray-50"
                      >
                        <a href="#" class="text-sm">{{ card.title }}</a>
                        <button
                          class="hidden absolute top-1 right-1 w-8 h-8 bg-gray-50 group-hover:grid place-content-center rounded-md text-gray-600 hover:text-black hover:bg-gray-200"
                        >
                          <PensilIcon class="w-5 h-5" />
                        </button>
                      </li>

                      <li
                        class="group relative bg-white p-3 shadow rounded-md border-b border-gray-300 hover:bg-gray-50"
                      >
                        <a href="#" class="text-sm">card item</a>
                        <button
                          class="hidden absolute top-1 right-1 w-8 h-8 bg-gray-50 group-hover:grid place-content-center rounded-md text-gray-600 hover:text-black hover:bg-gray-200"
                        >
                          <PensilIcon class="w-5 h-5" />
                        </button>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="px-3 mt-3">
                  <button
                    class="flex-content item-center p-2 text-sm font-mediume text-gray-600 hover:text-black hover:bg-gray-300 w-full rounded-md"
                  >
                    <PlusIcon class="h-5 w-5" />
                    <span class="ml-1">Add cards</span>
                  </button>
                </div>
              </div>

</template>

