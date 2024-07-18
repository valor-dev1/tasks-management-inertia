<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TableTop from '@/Components/TableTop.vue';
import Table from '@/Components/Table.vue';
import { type Tasks } from '@/types/index';

type TasksData = {
    data: Task[];
    current_page?: number;
    first_page_url?: string;
    from?: number;
    last_page?: number;
    last_page_url?: string;
    next_page_url?: string;
    path?: string;
    per_page?: number;
    prev_page_url?: string|null;
    to?: number;
    total?: number;
}

const props = defineProps<{
    tasks: TasksData;
}>();
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

                    <Table :data="tasks.data" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
