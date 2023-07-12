<script setup>
// import { DotsHorizontalIcon, PensilIcon, PlusIcon } from "@heroicons/vue/solid";
import { PlusIcon } from "@heroicons/vue/20/solid";
import { useForm } from "@inertiajs/vue3";
import { nextTick } from "vue";
import { ref } from "vue";

const props = defineProps({
  card: Object,
});

const isShowingForm = ref(false);
const inputTitleRef = ref();
const formRef = ref();
const form = useForm({
  title: props.card.title,
});

async function showForm() {
  isShowingForm.value = true;
  await nextTick();
  inputTitleRef.value.focus();
}

function onSubmit() {
  form.put(route("cards.update", { card: props.card.id }), {
    onSubmit: () => {
      isShowingForm.value = false;
    },
  });
}
</script>
<template>
  <li
    class="group relative bg-white p-2 shadow rounded-md border-b border-gray-300 hover:bg-gray-50"
  >
    <form
      @keydown.esc="isShowingForm = false"
      @submit.prevent="onSubmit()"
      v-if="isShowingForm"
    >
      <textarea
        v-model="form.title"
        ref="inputTitleRef"
        rows="3"
        @keydown.enter.prevent="onSubmit()"
        placeholder="Enter card title..."
        class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring-blue-400"
      ></textarea>

      <div class="mt-2 space-x-2">
        <button
          type="submit"
          class="px-4 py-2 text-sm font-medium text-white bg-rose-600 hover:bg-rose-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset focus:ring-rose-500 focus:autline-none"
        >
          Saving card
        </button>
        <button
          type="button"
          @click="isShowingForm = false"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-rose-600 hover:text-black rounded-md focus:ring-2 focus:ring-offset focus:autline-none"
        >
          Cancel
        </button>
      </div>
    </form>

    <template v-if="!isShowingForm">
      <a href="#" class="text-sm">{{ card.title }}</a>
      <button
        v-if="!isShowingForm"
        @click="showForm"
        class="hidden absolute top-1 right-1 w-8 h-8 bg-gray-50 group-hover:grid place-content-center rounded-md text-gray-600 hover:text-black hover:bg-gray-200"
      >
        <PensilIcon class="w-5 h-5" />
      </button>
    </template>
  </li>
</template>
