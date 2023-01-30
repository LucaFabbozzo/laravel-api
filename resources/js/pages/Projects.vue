<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';
import ProjectItem from '../components/ProjectItem.vue'
import FormSearch from '../components/FormSearch.vue'
export default {
    name: 'Projects',
    data() {
        return {
            projects: {},
            pagination: {
                current: null,
                last: null
            }
        }
    },
    components: { ProjectItem, FormSearch },
    methods: {
        getApi(page) {
            this.pagination.current = page;
            axios.get(BASE_URL + 'projects', {
                params: {
                    page: this.pagination.current
                }
            })
                .then(result => {
                    this.projects = result.data.projects.data;
                    this.pagination.current = result.data.projects.current_page
                    this.pagination.last = result.data.projects.last_page
                    console.log(this.projects)
                })
        },
    },
    mounted() {
        this.getApi(1);
    }
}
</script>

<template>

    <h1>Projects List</h1>

    <FormSearch />

    <ProjectItem v-for="project in projects" :key="project.id" :project="project"/>

    <div class="paginate">
        <button :disabled="pagination.current === 1" @click="getApi(1)"> | &lt;
        </button>


        <button :disabled="pagination.current === 1" @click="getApi(pagination.current - 1)">
            &larr;
        </button>
        <button v-for="i in pagination.last" :key="i" :disabled="pagination.current === 1" @click="getApi(i)">
            {{ i }} </button>
        <button :disabled="pagination.current === pagination.last" @click="getApi(pagination.current + 1)"> &rarr;
        </button>
        <button :disabled="pagination.current === pagination.last" @click="getApi(pagination.last)"> >|
        </button>
     </div>

</template>


<style lang="scss">
    h1 {
        padding-bottom: 40px;
        text-transform: uppercase;
        font-size: 1.5rem;
        text-align: center;
    }
    .paginate {
        button {
            padding: 5px 8px;
            margin: 2px;
        }
    }
</style>
