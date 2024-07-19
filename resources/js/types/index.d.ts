import { Config } from 'ziggy-js';

export interface User {
  id: number;
  name: string;
  email: string;
  email_verified_at: string;
}


export interface Task {
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

export interface TasksData {
  data: Task[];
  current_page?: number;
  first_page_url?: string;
  from?: number;
  last_page?: number;
  last_page_url?: string;
  next_page_url?: string;
  path?: string;
  per_page?: number;
  prev_page_url?: string | null;
  to?: number;
  total?: number;
}
export type ColumnData = {
  key: string;
  label: string;
  sortable?: boolean;
  foreignKey?: string;
  type?: string;
  align?: 'left' | 'right' | 'center';
}


export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
  auth: {
    user: User;
  };
  ziggy: Config & { location: string };
};
