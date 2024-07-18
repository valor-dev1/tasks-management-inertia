<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TableTop from '@/Components/TableTop.vue';
import Table from '@/Components/Table.vue';
import { type TasksData } from '@/types/index';

const props = defineProps<{
    tasks: TasksData;
}>();

const columns = <ColumnData>[
    {label: 'Title', key: 'title'},
    {label: 'Priority', key: 'priority'},
    {label: 'Assignee', key: 'assignee'},
]
</script>

<template>
    <Head title="Tasks Management" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Tasks Management</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-8 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <TableTop />

                    <Table :data="tasks.data" :columns="columns" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
