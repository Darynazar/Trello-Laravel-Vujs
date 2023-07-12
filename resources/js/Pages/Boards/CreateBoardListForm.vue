<script setup>

import { PlusIcon } from '@heroicons/vue/20/solid';
import { useForm } from '@inertiajs/vue3';
import { nextTick } from 'vue';
import { ref } from 'vue';

const props = defineProps({
    board:Object
});

const isShowingForm = ref(false);
const inputNameRef = ref();
const formRef = ref();
const form = useForm({
    name:''
});

async function showForm()
{
    isShowingForm.value = true;
    await nextTick();
    inputNameRef.value.focus();
}

function onSubmit() {
    form.post(route('boardList.store', {board: props.board.id}));

    onSubmit: () => {
        form.reset();
        inputNameRef.value.focus();
        formRef.value.scrollIntoView();
    }
}
</script>

<template>

    <form 
    @keydown.esc="isShowingForm = false"
     ref="formRef"
     @submit.prevent="onSubmit()"
     v-if="isShowingForm"
     class="p-3 bg-gray-200 rounded-md">
    
     <input
     v-model="form.name"
     ref="inputNameRef"
     placeholder="Enter list name..." 
     class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring-blue-400"
     type="text">


     <div class="mt-2 space-x-2">
        <button 
        type="submit"
        class="px-4 py-2 text-sm font-medium text-white bg-rose-600 hover:bg-rose-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset focus:ring-rose-500 focus:autline-none">Add list</button>
        <button 
        type="button"
        @click="isShowingForm = false"
        class="px-4 py-2 text-sm font-medium text-gray-700 bg-rose-600 hover:text-black rounded-md focus:ring-2 focus:ring-offset focus:autline-none">Cancel</button>

     </div>
    
    </form>
    <button 
    v-if="!isShowingForm"
    @click="showForm"
    class="flex item-centr bg-white/10 w-full hover:bg-white/20 text-white">
        <PlusIcon class="w-5 h-5" />
        <span class="ml-1">Add another list</span>
        
    </button>
</template>