import { Config } from 'ziggy-js';

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}


export interface Tasks {
    id: number;
    assignee_id?: number;
    user_id?: number;
    assignee?: User;
    reporter?: User;
    title: string;
    description: string;
    priority: string;
    status: string;
    due_date: DateConstructor;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
    ziggy: Config & { location: string };
};
