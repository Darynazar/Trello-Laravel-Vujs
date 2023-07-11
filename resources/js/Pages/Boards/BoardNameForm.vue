<script setup>
import { useForm } from '@inertiajs/vue3';
import { nextTick } from 'vue';
import { watch } from 'vue';
import { ref } from 'vue';


const props = defineProps({
    board:Object
});

const form = useForm({
    name: props.board.name
});
const heading = ref();
const input = ref();

const isEditing = ref(false);

function resize(){
    input.value.style.width = `${heading.value.offsetWidth}px`;
}

watch(() => form.name, async () => {
    await nextTick();
    // resize();
});

async function edit() {
    isEditing.value = true;
    await nextTick();
    input.value.select();
    // resize();
}

function onSubmit() {
    isEditing.value = false;

    console.log(props?.board?.id);
    form.put(route('boards.update', {board:props.board.id}), {
        onError: () => form.reset()
    });
}

</script>

<template>

<div class="flex flex-col items-start max-w-full relative">
    <h1 
    @click="edit()"
    :class="[isEditing ? 'invisible': '']"
    class="hover:bg-white/20 whitespace-pre-wrap overflow-hidden text-ellipsis border dorder-transparent rounded-md cursor-pointer px-3 py-1.5 text-white font-bold">
    {{ form.name ? form.name : ' ' }}
</h1>
    <form 
        v-show="isEditing"
        @focusout="onSubmit()"
        @submit.prevent="onSubmit">

        <input 
        ref="input" placeholder="Board Name" 
          v-model="form.name"
          type="text"
          class="absolute inset-0 text-2xl max-w-full font-bold placeholder-gray-400 px-3 py-1.5 rounded-md focus:ring-2 focus:ring-blue-900">
    </form>
</div>

</template>