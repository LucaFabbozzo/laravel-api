import { reactive } from "vue";

export const store = reactive({
    projects: [],
    types: [],
    technologies: [],
    links: [],
    show_paginate: true,
    main_title: 'List Projects'

});
