<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import TableTop from '@/Components/TableTop.vue';
import Table from '@/Components/Table.vue';
import { type TasksData, type ColumnData } from '@/types/index';

defineProps<{
    tasks: TasksData;
}>();

const columns = <ColumnData[]>[
    { label: 'Title', key: 'title', sortable: true },
    { label: 'Priority', key: 'priority', type: 'tag' },
    { label: 'Assignee', key: 'assignee', foreignKey: 'name' },
    { label: 'Reporter', key: 'reporter', foreignKey: 'name' },
    { label: 'Status', key: 'status', align: 'right' },
];
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
                    <TableTop :total="tasks.total" text="Tasks" tagline="These are the tasks list based on date." />

                    <Table :data="tasks.data" :columns="columns">
                        <template #status="{ item }">
                            <h2 class="font-medium text-gray-800 dark:text-white capitalize">{{ item.status.replace('_',
                                ' ') }}</h2>
                        </template>
                    </Table>

                    <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            Page <span class="font-medium text-gray-700 dark:text-gray-100">{{ tasks.current_page }} of {{ tasks.last_page }}</span>
                        </div>

                        <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
                            <Link :href="tasks.prev_page_url"
                                v-if="tasks.prev_page_url"
                                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                </svg>

                                <span>
                                    previous
                                </span>
                            </Link>

                            <Link :href="tasks.next_page_url"
                                v-if="tasks.next_page_url"
                                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                                <span>
                                    Next
                                </span>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
