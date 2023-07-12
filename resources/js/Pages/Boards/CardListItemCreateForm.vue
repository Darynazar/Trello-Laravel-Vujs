<script setup>
import { PlusIcon } from "@heroicons/vue/20/solid";
import { useForm } from "@inertiajs/vue3";
import { nextTick } from "vue";
import { ref } from "vue";

const props = defineProps({
  list: Object,
});

const emit = defineEmits(['created']);
console.log(props.list.board_id);
const isShowingForm = ref(false);
const inputNameRef = ref();
const formRef = ref();
const form = useForm({
  title: "",
  board_list_id: props.list.id,
  board_id: props.list.board_id,
});

async function showForm() {
  isShowingForm.value = true;
  await nextTick();
  inputNameRef.value.focus();
}

function onSubmit() {
  form.post(route("cards.store"), {
    onSubmit: () => {
      form.reset();
      inputNameRef.value.focus();
      emit('created');
    },
  });
}
</script>

<template>
  <form
  @keydown.esc="isShowingForm = false"
    @submit.prevent="onSubmit()"
    v-if="isShowingForm"
  >
    <textarea
      v-model="form.title"
      ref="inputNameRef"
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
        Add card
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
  <button
    v-if="!isShowingForm"
    @click="showForm"
    class="flex-content item-center p-2 text-sm font-mediume text-gray-600 hover:text-black hover:bg-gray-300 w-full rounded-md"
  >
    <PlusIcon class="h-5 w-5" />
    <span class="ml-1">Add cards</span>
  </button>
</template>
