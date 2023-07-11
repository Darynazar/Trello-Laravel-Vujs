<script setup>
// import { DotsHorizontalIcon, PensilIcon, PlusIcon } from "@heroicons/vue/solid";

import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import AuthenticatedLayoutVue from "@/Layouts/AuthenticatedLayout.vue";
// import BoardNameForm from "./Boards/BoardNameForm.vue";
// import CreateBoardListForm from "./Boards/CreateBoardListForm.vue";
import BoardNameForm from "./BoardNameForm.vue";
import CreateBoardListForm from "./CreateBoardListForm.vue";
import CardList from "./CardList.vue";

const props = defineProps({
  board:Object
});

</script>

<template>
  <AuthenticatedLayoutVue>
        <div class="flex flex-col h-full bg-blue-500">
          <div class="shrink-0 flex flex-wrap justify-between item-center p-4">
            <!-- <h1 class="text-2xl text- font-bold">{{ props.board.name }}</h1> -->
            <BoardNameForm :board="board"></BoardNameForm>
            <div class="">
              <button
                class="inline-flex item-center bg-white/10 hover:bg-white/20 py-2 font-medium text-sm text-white rounded-md"
              >
                <DotsHorizontalIcon class="w-5 h-5" />
                <span class="ml-1">Setting</span>
              </button>
            </div>
          </div>
          <div class="flex-1 overflow-x-auto">
            <div class="inline-flex h-full items-start px-4 pb-4 space-x-4">
              <CardList
              v-for="list in board.lists"
                :key="list.id"
                :list="list"
                class="w-72 bg-gray-200 max-h-full flex flex-col rounded-md"
              >
                
              </CardList>

              <div class="w-72">
               <CreateBoardListForm :board="board"/>
              </div>
            </div>
          </div>
        </div>
      
   
  </AuthenticatedLayoutVue>
</template>
